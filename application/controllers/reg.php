<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends MY_Controller {

    public function __construct() {
        session_start();
        parent::__construct();
    }

    public function test(){
        $from_email = 'webmaster@devzy.ru';
        $to = 'boxonline@mail.ru';
        $site_title = 'Super Site';
        $mess = 'Купите слона! 123qwe';
        Utills::sendEmail($from_email, $to, 'Регистрация на сайте '.$site_title, $mess);
    }

    public function index(){
        $this->step_1();
    }

    public function step_1(){
        $d = array('top' => '', 'content' => 'reg/step_1');
        $this->load->view('main', $d);
    }

    public function step_2(){
        $this->check_user_id();
        $d = array('top' => '', 'content' => 'reg/step_2');
        $this->load->view('main', $d);
    }

    public function step_3(){
        $this->check_user_id();
        $d = array('top' => '', 'content' => 'reg/step_3');
        $this->load->view('main', $d);
    }

    public function step_4(){
        $this->check_user_id();
        $d = array('top' => '', 'content' => 'reg/step_4');
        $this->load->view('main', $d);
    }

    public function step_5(){
        $this->check_user_id();
        $d = array('top' => '', 'content' => 'reg/step_5');
        $this->load->view('main', $d);
    }

    public function step_6(){
        $this->check_user_id();

        // меняем пользователю статус на active
        // влогиниваем
        // редирект в back
        //

        $user_id = $_SESSION['in_progress']['user_id'];
        unset($_SESSION['in_progress']['user_id']);
        $this->user_db->Item->id = $user_id;
        $this->user_db->updateField('status', 'active');

        $this->load->model('personal_data');
        $this->load->model('personal_data_db');
        $this->personal_data_db->Item->id = $user_id;
        $this->personal_data_db->read($user_id);
        $to = $this->personal_data_db->Item->email;

        $this->load->model('setting');
        $this->load->model('setting_db');
        $from_email = $this->setting_db->readValueByName('from_email');
        $site_title = $this->setting_db->readValueByName('site_title');
        $site_url = $this->setting_db->readValueByName('site_url');

        $pass = Utills::genPassword();

        $this->personal_data_db->updateField('password_hash', md5($pass));

        $mess = 'Регистрация на сайте '.$site_url.'. Ваш пароль: '.$pass;
        Utills::sendEmail($from_email, $to, 'Регистрация на сайте '.$site_title, $mess);

        $this->session->set_userdata(array('login_id' => $user_id));

        //redirect($this->config->item('back_url'));
        redirect('/back');
        exit;

    }

    private function check_user_id(){
        // проверяем имеется ли user_id в сессии
        // если нет - редирект на первый шаг регистрации
        if(!isset($_SESSION['in_progress']['user_id'])){
            redirect($this->config->item('base_url'));
            exit;
        }
    }

    public function ajax_step_0(){
        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }

    public function ajax_step_1(){
        /*
            [name_1] => Имя
            [name_2] => Фамилия
            [name_3] => Отчество
            [sex] => male
            [birthday] => 1978-12-11
            [email] => toastral@gmail.com
            [phone] => +7-(988)-888-11-22
            [option_18_year] => true
            [option_accept_rules] => true
            [option_accept_email] => true
        */
        $p = $_POST;

        $a_err = array();
        if(!$p['option_18_year']) $a_err[] = 'Вы должны подтвердить Ваш возраст';
        if(!$p['option_accept_rules']) $a_err[] = 'Вы должны принять условия публичной оферты';

        $p['b_year']    = 0;
        $p['b_month']   = 0;
        $p['b_day']     = 0;
        if(preg_match('/(\d+)\-(\d+)\-(\d+)/', $p['birthday'], $patt)){
            $p['b_year']    = $patt[1];
            $p['b_month']   = $patt[2];
            $p['b_day']     = $patt[3];
        }
        $p['phone'] = preg_replace("/[\D]+/", "", $p['phone']);

        $this->load->model('personal_data');
        $this->load->model('personal_data_db');

        $Personal_data = new Personal_data();
        $Personal_data->setAttrFromPost($p);

        $a_err2 = $Personal_data->checkEmpty();
        if(!count($a_err2)) $a_err2 = $Personal_data->validateBeforeCreate();
        $a_err = array_merge($a_err, $a_err2);

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }

        // проверить что email и phone не являются данными активного пользователя ('reg_complete','active','banned')
        // если это так выводить ошибку
        if($this->personal_data_db->isHaveEmailNPhone($p['email'], $p['phone'])){
            $a_return = array('is_error' => 1, 'msg' => "Пользователь с таким email или телефоном уже зарегистрирован");
            echo json_encode($a_return);exit;
        }

        // удалить все записи (во всех таблицах) имеющие статус 'in_progress' и введенные email и phone
        $this->user_db->clearInProgressEmailPhone($p['email'], $p['phone']);

        unset($_SESSION['in_progress']['user_id']);

        $Personal_data->user_id = 0;
        $this->personal_data_db->Item = $Personal_data;
        $this->personal_data_db->create();

        $User_DB = new User_DB();
        $User_DB->Item->status = 'in_progress';
        $User_DB->Item->created = time();
        $User_DB->create();
        $user_id = $User_DB->Item->id;
        $_SESSION['in_progress']['user_id'] = $user_id;

        $this->personal_data_db->updateField('user_id', $user_id);

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }

    public function ajax_step_2(){

        // получаем из сессии user_id
/*
    [serial] => 1233
    [number] => 333311
    [date] => 1978-01-01
    [code] => 123123
    [organ] => 4234234234
 * */

        if(!isset($_SESSION['in_progress']['user_id'])){
            $a_return = array('is_error' => 1, 'msg' => "Сессия истекла. Начините регистрацию заново");
            echo json_encode($a_return);exit;
        }

        $user_id = $_SESSION['in_progress']['user_id'];
        $p = $_POST;

        $this->load->model('passport_data');
        $this->load->model('passport_data_db');

        $p['year']    = 0;
        $p['month']   = 0;
        $p['day']     = 0;
        if(preg_match('/(\d+)\-(\d+)\-(\d+)/', $p['date'], $patt)){
            $p['year']    = $patt[1];
            $p['month']   = $patt[2];
            $p['day']     = $patt[3];
        }

        $Passport_data = new Passport_data();
        $Passport_data->setAttrFromPost($p);

        $a_err = $Passport_data->checkEmpty();
        if(!count($a_err)) $a_err = $Passport_data->validateBeforeCreate();

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }

        $Passport_data->user_id = $user_id;
        $this->passport_data_db->Item = $Passport_data;
        $this->passport_data_db->createOrUpdateByUserId();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }

    public function ajax_step_3(){
/*
    [get_region] => регион
    [get_city] => город
    [region] => регион
    [city] => москва
    [street] => петровская
    [building] => 123
    [apartment] => 345
 * */
        if(!isset($_SESSION['in_progress']['user_id'])){
            $a_return = array('is_error' => 1, 'msg' => "Сессия истекла. Начините регистрацию заново");
            echo json_encode($a_return);exit;
        }

        $user_id = $_SESSION['in_progress']['user_id'];
        $p = $_POST;

        $this->load->model('address');
        $this->load->model('address_db');

        $Address = new Address();
        $Address->setAttrFromPost($p);

        $a_err = $Address->checkEmpty();
        if(!count($a_err)) $a_err = $Address->validateBeforeCreate();

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }

        $Address->user_id = $user_id;
        $this->address_db->Item = $Address;
        $this->address_db->createOrUpdateByUserId();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }

    public function ajax_step_4(){
/*
    [company_name] => компания
    [city] => таганрог
    [street] => петровская
    [building] => 23
    [phone] => 234234234
    [prof_status] => менеджер
    [month_amount] => 19000
 * */
        if(!isset($_SESSION['in_progress']['user_id'])){
            $a_return = array('is_error' => 1, 'msg' => "Сессия истекла. Начините регистрацию заново");
            echo json_encode($a_return);exit;
        }

        $user_id = $_SESSION['in_progress']['user_id'];
        $p = $_POST;
        $p['phone'] = preg_replace("/[\D]+/", "", $p['phone']);

        $this->load->model('job');
        $this->load->model('job_db');

        $Job = new Job();
        $Job->setAttrFromPost($p);

        $a_err = $Job->checkEmpty();
        if(!count($a_err)) $a_err = $Job->validateBeforeCreate();

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }

        $Job->user_id = $user_id;
        $this->job_db->Item = $Job;
        $this->job_db->createOrUpdateByUserId();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;

    }

    public function ajax_step_5(){
/*
    [add_document] => foreign
    [document_number] => 123123
    [is_have_car] => 1
    [credit_amount] => 19000
    [credit_period] => 123
 * */

        if(!isset($_SESSION['in_progress']['user_id'])){
            $a_return = array('is_error' => 1, 'msg' => "Сессия истекла. Начините регистрацию заново");
            echo json_encode($a_return);exit;
        }

        $user_id = $_SESSION['in_progress']['user_id'];
        $p = $_POST;

        $this->load->model('addition_data');
        $this->load->model('addition_data_db');

        $Addition_data = new Addition_data();
        $Addition_data->setAttrFromPost($p);

        $a_err = $Addition_data->checkEmpty();
        if(!count($a_err)) $a_err = $Addition_data->validateBeforeCreate();

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }

        $Addition_data->user_id = $user_id;
        $this->addition_data_db->Item = $Addition_data;
        $this->addition_data_db->createOrUpdateByUserId();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }
}
