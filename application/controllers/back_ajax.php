<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Back_ajax extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->User->id) {
            redirect($this->config->item('base_url'));
            exit;
        }

        if ($this->User->user_type == 'admin') {
            redirect($this->config->item('admin_url'));
            exit;
        }
    }

    public function ajax_personal_data(){
        $p = $_POST;
        $a_err = array();

        $p['b_year']    = abs(intval($p['b_year']));
        $p['b_month']   = abs(intval($p['b_month']));
        $p['b_day']     = abs(intval($p['b_day']));

        $this->load->model('personal_data');
        $this->load->model('personal_data_db');
        $this->personal_data_db->readByUserId($this->User->id);

        $Personal_data = $this->personal_data_db->Item;

        $Personal_data->b_year = $p['b_year'];
        $Personal_data->b_month = $p['b_month'];
        $Personal_data->b_day = $p['b_day'];

        $Personal_data->sex = $p['sex'];

        $Personal_data->name_1 = $p['name_1'];
        $Personal_data->name_2 = $p['name_2'];
        $Personal_data->name_3 = $p['name_3'];

        $a_err2 = $Personal_data->checkEmpty();
        if(!count($a_err2)) $a_err2 = $Personal_data->validateBeforeCreate();
        $a_err = array_merge($a_err, $a_err2);

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }

        $this->personal_data_db->Item = $Personal_data;
        $this->personal_data_db->update();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }


    public function ajax_passport_data(){
        $p = $_POST;
        $a_err = array();

        $p['year']    = abs(intval($p['year']));
        $p['month']   = abs(intval($p['month']));
        $p['day']     = abs(intval($p['day']));

        $this->load->model('passport_data');
        $this->load->model('passport_data_db');
        $this->passport_data_db->readByUserId($this->User->id);

        $Passport_data = $this->passport_data_db->Item;

        $Passport_data->serial  = $p['serial'];
        $Passport_data->number  = $p['number'];
        $Passport_data->code    = $p['code'];
        $Passport_data->organ   = $p['organ'];
        $Passport_data->year    = $p['year'];
        $Passport_data->month   = $p['month'];
        $Passport_data->day     = $p['day'];
        $Passport_data->marital_status = $p['marital_status'];

        $a_err2 = $Passport_data->checkEmpty();
        if(!count($a_err2)) $a_err2 = $Passport_data->validateBeforeCreate();
        $a_err = array_merge($a_err, $a_err2);

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }
        $this->passport_data_db->Item = $Passport_data;
        $this->passport_data_db->update();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }

    function ajax_address(){
        $p = $_POST;
        $a_err = array();

        $this->load->model('address');
        $this->load->model('address_db');
        $this->address_db->readByUserId($this->User->id);

        $Address = $this->address_db->Item;

        $Address->get_region   = $p['get_region'];
        $Address->get_city     = $p['get_city'];
        $Address->region       = $p['region'];
        $Address->city         = $p['city'];
        $Address->street       = $p['street'];
        $Address->building     = $p['building'];
        $Address->apartment    = $p['apartment'];

        $a_err2 = $Address->checkEmpty();
        if(!count($a_err2)) $a_err2 = $Address->validateBeforeCreate();
        $a_err = array_merge($a_err, $a_err2);

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }
        $this->address_db->Item = $Address;
        $this->address_db->update();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }

    function ajax_job(){
        $p = $_POST;
        $a_err = array();

        $this->load->model('job');
        $this->load->model('job_db');
        $this->job_db->readByUserId($this->User->id);

        $Job = $this->job_db->Item;

        $Job->company_name  = $p['company_name'];
        $Job->city          = $p['city'];
        $Job->street        = $p['street'];
        $Job->building      = $p['building'];
        $Job->phone         = $p['phone'];
        $Job->prof_status   = $p['prof_status'];
        $Job->month_amount  = $p['month_amount'];

        $a_err2 = $Job->checkEmpty();
        if(!count($a_err2)) $a_err2 = $Job->validateBeforeCreate();
        $a_err = array_merge($a_err, $a_err2);

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }

        $this->job_db->Item = $Job;
        $this->job_db->update();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }

    function ajax_addition_data(){
        $p = $_POST;
        $a_err = array();

        $this->load->model('addition_data');
        $this->load->model('addition_data_db');
        $this->addition_data_db->readByUserId($this->User->id);

        $Addition_data = $this->addition_data_db->Item;

        $Addition_data->add_document    = $p['add_document'];
        $Addition_data->document_number = $p['document_number'];
        $Addition_data->is_have_car     = $p['is_have_car'];
        $Addition_data->credit_amount   = $p['credit_amount'];
        $Addition_data->credit_period   = $p['credit_period'];

        $a_err2 = $Addition_data->checkEmpty();
        if(!count($a_err2)) $a_err2 = $Addition_data->validateBeforeCreate();
        $a_err = array_merge($a_err, $a_err2);

        if(count($a_err)){
            $a_return = array('is_error' => 1, 'msg' => Utills::madeErrReport($a_err));
            echo json_encode($a_return);exit;
        }

        $this->addition_data_db->Item = $Addition_data;
        $this->addition_data_db->update();

        $a_return = array('is_error' => 0, 'msg' => "");
        echo json_encode($a_return);exit;
    }

}