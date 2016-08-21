<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    public $user_id;
	public $User;
    public $P_data;
    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
		$this->load->model('abstract_db');
        $this->load->model('user');
        $this->load->model('user_db');
        $this->load->model('personal_data');
        $this->load->model('personal_data_db');
        $this->User = $this->user_db->Item;
        
        if($this->session->userdata('login_id')){
            $this->user_id = $this->session->userdata('login_id');
            $this->user_db->read($this->user_id);
            $this->User = $this->user_db->Item;

            $this->personal_data_db->readByUserId($this->user_id);
            $this->P_data = $this->personal_data_db->Item;
        }
    }
}
?>