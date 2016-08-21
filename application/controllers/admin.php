<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller{
    private $limit=20;
    public $d = array();
    public function __construct(){
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->d['User'] = $this->User;
        $this->d['P_data'] = $this->P_data;
        if(!$this->User->id){
            redirect($this->config->item('base_url'));
            exit;
        }

        if($this->User->user_type != 'admin'){
            redirect($this->config->item('base_url'));
            exit;
        }
    }

    public function index(){
        $this->setting();
    }


    public function upacc(){
        $this->load->model('personal_data');
        $this->load->model('personal_data_db');

        $this->personal_data_db->readByUserId($this->User->id);

        $d = $this->d;
        $d['Personal_data'] = $this->personal_data_db->Item;
        $d['content'] = 'admin/upacc';
        $this->load->view('admin', $d);
    }

    public function setting(){
        $this->load->model('setting');
        $this->load->model('setting_db');

        $d = $this->d;
        $d['a_list'] = $this->setting_db->getList();
        $d['content'] = 'admin/setting';
        $this->load->view('admin', $d);
    }

    public function trans_log($offset = 0){
        $this->load->model('trans_log');
        $this->load->model('trans_log_db');

        $offset = abs(intval($offset));
        $limit = $this->limit;
        $count = $this->trans_log_db->get_count();
        $config = Utills::getPaginationConfig('/admin/trans_log/', $limit, $count);
        $this->pagination->initialize($config);

        $d = $this->d;
        $d['a_list'] = $this->trans_log_db->getList($limit, $offset);
        $d['content'] = 'admin/trans_log';
        $d['pagination'] = $this->pagination;
        $this->load->view('admin', $d);
    }

    public function offer($offset = 0){
        $this->load->model('offer');
        $this->load->model('offer_db');

        $offset = abs(intval($offset));
        $limit = $this->limit;
        $count = $this->offer_db->get_count();
        $config = Utills::getPaginationConfig('/admin/offer/', $limit, $count);
        $this->pagination->initialize($config);

        $d = $this->d;
        $d['a_list'] = $this->offer_db->getList($limit, $offset);
        $d['content'] = 'admin/offer';
        $d['pagination'] = $this->pagination;
        $this->load->view('admin', $d);
    }

    public function user($offset = 0){
        $offset = abs(intval($offset));
        $limit = $this->limit;
        $count = $this->user_db->get_count();
        $config = Utills::getPaginationConfig('/admin/user/', $limit, $count);
        $this->pagination->initialize($config);

        $d = $this->d;
        $d['a_list'] = $this->user_db->getList($limit, $offset);
        $d['content'] = 'admin/user';
        $d['pagination'] = $this->pagination;
        $this->load->view('admin', $d);
    }


    public function user_item($id = 0){
        $id = abs(intval($id));

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

        $d['content'] = 'admin/user_item';
        $this->load->view('admin', $d);
    }

    public function setting_edit($setting_id){
        $setting_id = abs(intval($setting_id));

        $this->load->model('setting');
        $this->load->model('setting_db');

        $d = $this->d;
        $this->setting_db->read($setting_id);
        $d['Setting'] = $this->setting_db->Item;
        $d['content'] = 'admin/setting_edit';
        $this->load->view('admin', $d);
    }

    public function offer_add(){
        $this->load->model('offer');
        $this->load->model('offer_db');

        $d = $this->d;

        if(isset($_POST['send_offer'])){
            $this->offer_db->Item->setAttrFromPost($_POST);
            $this->offer_db->create();
            $this->__offer_edit_banner($this->offer_db->Item->id);
            redirect('/admin/offer');
            exit;
        }

        $d['Offer'] = $this->offer_db->Item;
        $d['content'] = 'admin/offer_add';
        $this->load->view('admin', $d);
    }

    public function offer_edit($offer_id){
        $offer_id = abs(intval($offer_id));

        $this->load->model('offer');
        $this->load->model('offer_db');

        $d = $this->d;
        $this->offer_db->read($offer_id);
        $d['Offer'] = $this->offer_db->Item;
        $d['content'] = 'admin/offer_edit';
        $this->load->view('admin', $d);
    }

    public function offer_edit_banner($offer_id){
        $this->__offer_edit_banner($offer_id);
        redirect('/admin/offer');
        exit;
    }

    public function __offer_edit_banner($offer_id){
        $offer_id = abs(intval($offer_id));
        $this->load->model('offer');
        $this->load->model('offer_db');

        //удалим старый баннер
        @unlink($this->config->item('file_path_img')."offer/".$this->offer_db->Item->img);

        if($_FILES['userfile']['error']){
            echo "при загрузки файла произошла ошибка";
            exit;
        }

        $name = strtolower($_FILES['userfile']['name']);
        $tmp = explode(".", $name);
        $ext = array_pop($tmp);
        $new_img = $offer_id.".".$ext;

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $this->config->item('file_path_img')."offer/".$new_img)) {
            //echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "move_uploaded_file - не получается загрузить файл \n";
        }

        $this->offer_db->Item->id = $offer_id;
        $this->offer_db->updateField('img', $new_img);
        redirect('/admin/offer');
        exit;
    }


}