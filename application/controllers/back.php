<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Back extends MY_Controller {
    public $d = array();
    public function __construct() {
        parent::__construct();
        $this->load->model('setting');
        $this->load->model('setting_db');
        $this->d['User'] = $this->User;
        $this->d['P_data'] = $this->P_data;
        /*
        if(!$this->User->id){
            redirect($this->config->item('base_url'));
            exit;
        }

        if($this->User->user_type == 'admin'){
            redirect($this->config->item('admin_url'));
            exit;
        }
        */
    }

    public function index(){
        $this->loans();
    }

    public function loans($pay_result = ''){
        $this->load->model('offer');
        $this->load->model('offer_db');

        $d = $this->d;
        $d['pay_result'] = $pay_result;
        /*
        if(strlen($pay_result)>0){
            if($pay_result == 'success'){
                echo '<p class="bg-success lead" style="padding:10px">Оплата успешно произведена!</p>';
            }
            if($pay_result == 'fail'){
                echo '<p class="bg-danger lead" style="padding:10px">Во время операции оплаты возникла ошибка</p>';
            }
        }
        */
        $d['content'] = 'back/index';

        $d['a_offer'] = array();

        if( $this->User->pay_status == 'try_pay'){
            $d['a_offer'] = $this->offer_db->getActivePartnerList();
        }
        if( $this->User->pay_status == 'payed_full'){
            $d['a_offer'] = $this->offer_db->getActiveList();
        }
        // debug
        $d['a_offer'] = $this->offer_db->getActivePartnerList();

        $this->load->model('addition_data');
        $this->load->model('addition_data_db');

        $this->addition_data_db->Item->user_id = $this->User->id;
        $this->addition_data_db->readByUserId($this->user_id);
        $d['Addition_data'] = $this->addition_data_db->Item;

        $a_setting = $this->setting_db->getList();
        $d['a_setting'] = $a_setting;

        if($a_setting['cur_payment'] == 'yandex'){
            // заменим цену на значение pay_sum_activation
            $a_setting['payform_yandex'] = preg_replace('default-sum=[\d]+&', 'default-sum='.$a_setting['pay_sum_activation'].'&', $a_setting['payform_yandex']);
        }

        $this->load->view('back', $d);
    }

    public function profile_edit(){

        $this->load->model('personal_data');
        $this->load->model('personal_data_db');

        $this->load->model('passport_data');
        $this->load->model('passport_data_db');

        $this->load->model('address');
        $this->load->model('address_db');

        $this->load->model('job');
        $this->load->model('job_db');

        $this->load->model('addition_data');
        $this->load->model('addition_data_db');

        $id = $this->User->id;
        $this->user_db->read($id);
        $this->personal_data_db->readByUserId($id);
        $this->passport_data_db->readByUserId($id);
        $this->address_db->readByUserId($id);
        $this->job_db->readByUserId($id);
        $this->addition_data_db->readByUserId($id);

        $d = $this->d;
        $d['User']          = $this->user_db->Item;
        $d['Personal_data'] = $this->personal_data_db->Item;
        $d['Passport_data'] = $this->passport_data_db->Item;
        $d['Address']       = $this->address_db->Item;
        $d['Job']           = $this->job_db->Item;
        $d['Addition_data'] = $this->addition_data_db->Item;

        $a_setting = $this->setting_db->getList();
        $d['content'] = 'back/profile_edit';
        $d['a_setting'] = $a_setting;

        $this->load->view('back', $d);
    }

    public function profile(){
        $d = $this->d;
        $a_setting = $this->setting_db->getList();

        $this->load->model('address');
        $this->load->model('address_db');
        $this->address_db->readByUserId($this->User->id);

        $this->load->model('passport_data');
        $this->load->model('passport_data_db');
        $this->passport_data_db->readByUserId($this->User->id);

        $this->load->model('job');
        $this->load->model('job_db');
        $this->job_db->readByUserId($this->User->id);

        $d['Job'] = $this->job_db->Item;
        $d['Passport_data'] = $this->passport_data_db->Item;
        $d['Address'] = $this->address_db->Item;
        $d['content'] = 'back/profile';
        $d['a_setting'] = $a_setting;

        $this->load->view('back', $d);
    }

    /*
    public function karma(){
        $d = array();
        $a_setting = $this->setting_db->getList();
        $d['a_setting'] = $a_setting;
        $d['content'] = 'back/karma';
        $this->load->view('back', $d);
    }
    */
}