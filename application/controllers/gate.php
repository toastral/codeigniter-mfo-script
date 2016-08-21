<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gate extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $d = array('top' => '', 'content' => 'guest/index');
        $this->load->view('index_main', $d);

        if($this->User->id){
            redirect($this->config->item('back_url'));
            exit;
        }
    }


    public function login_form(){
        $d = array('top' => '', 'content' => 'guest/login_form');
        $this->load->view('main', $d);
    }

    public function ajax_login(){
        $this->load->model('personal_data');
        $this->load->model('personal_data_db');

        if(strlen(trim($_POST['password'])) <=0 ||  strlen(trim($_POST['password'])) <=0)
            exit(json_encode(array('is_error' => 1, 'msg' => "Необходимо ввести данные")));

        if($this->personal_data_db->isValidUser($_POST['email'], $_POST['password'])){
            $id = $this->personal_data_db->getUserIdByEmail($_POST['email']);
            $data = array(
                'login_id' => $id
            );
            $this->session->set_userdata($data);

            exit(json_encode(array('is_error' => 0, 'msg' => "")));
        }

        exit(json_encode(array('is_error' => 1, 'msg' => "Неправильный email или пароль")));
    }

    public function logout(){
        $this->session->unset_userdata('login_id');
        redirect($this->config->item('base_url'));
        exit;
    }
}
