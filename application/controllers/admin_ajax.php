<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_ajax extends MY_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->User->id){
            redirect($this->config->item('base_url'));
            exit;
        }

        if($this->User->user_type != 'admin'){
            redirect($this->config->item('base_url'));
            exit;
        }
    }

    public function setting_change(){
        $this->load->model('setting');
        $this->load->model('setting_db');
        $id = abs(intval($_POST['id']));

        $this->setting_db->read($id);
        $this->setting_db->Item->value = $_POST['value'];
        $this->setting_db->Item->sort  = $_POST['sort'];
        $this->setting_db->update();

        $a_return = array(
            'is_error' => 0,
            'msg' => "",
        );

        echo json_encode($a_return);
        exit;
    }

    public function offer_check(){
        if(strlen($_POST['title']) <= 0) exit(json_encode(array('is_error' => 1, 'msg' => "Заполните поле title")));
        if(strlen($_POST['link']) <= 0) exit(json_encode(array('is_error' => 1, 'msg' => "Заполните поле link")));

        exit(json_encode(array('is_error' => 0, 'msg' => "")));
    }


    public function offer_change(){
        $this->load->model('offer');
        $this->load->model('offer_db');
        $id = abs(intval($_POST['id']));

        $this->offer_db->read($id);
        $this->offer_db->Item->title = $_POST['title'];
        $this->offer_db->Item->link = $_POST['link'];
        $this->offer_db->Item->is_active = $_POST['is_active'];
        $this->offer_db->Item->type = $_POST['type'];
        $this->offer_db->Item->sort = $_POST['sort'];
        $this->offer_db->update();

        $a_return = array(
            'is_error' => 0,
            'msg' => "",
        );

        echo json_encode($a_return);
        exit;
    }

    public function del_offer(){
        $this->load->model('offer');
        $this->load->model('offer_db');
        $this->offer_db->Item->id = abs(intval($_POST['id']));
        $this->offer_db->delete();
        exit(json_encode(array('is_error' => 0, 'msg' => "")));
    }


    public function update_email_pass(){
        $this->load->model('personal_data');
        $this->load->model('personal_data_db');
        $id = $this->User->id;

        if(strlen($_POST['email'])<=0 || strlen($_POST['pass'])<=0){
            exit(json_encode(array('is_error' => 1, 'msg' => "введите email и пароль")));
        }

        /*
        if($this->personal_data_db->isHaveEmailNPhone($_POST['email'], '142351423514235')){
            exit(json_encode(array('is_error' => 1, 'msg' => "данный email уже зарегистрирован")));
        }
        */

        $this->personal_data_db->readByUserId($id);
        $this->personal_data_db->Item->email = $_POST['email'];
        $this->personal_data_db->Item->password_hash  = md5($_POST['pass']);
        $this->personal_data_db->update();

        $a_return = array(
            'is_error' => 0,
            'msg' => "",
        );

        echo json_encode($a_return);
        exit;
    }
}