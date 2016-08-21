<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->ogovorka();
    }

    public function ogovorka(){
        $d = array('top' => '', 'content' => 'rules/ogovorka');
        $this->load->view('main', $d);
    }

    public function uslovia(){
        $d = array('top' => '', 'content' => 'rules/uslovia');
        $this->load->view('main', $d);
    }

    public function info(){
        $d = array('top' => '', 'content' => 'rules/info');
        $this->load->view('main', $d);
    }

    public function contacts(){
        $d = array('top' => '', 'content' => 'rules/contacts');
        $this->load->view('main', $d);
    }

    public function about(){
        $d = array('top' => '', 'content' => 'rules/about');
        $this->load->view('main', $d);
    }

    public function help(){
        $d = array('top' => '', 'content' => 'rules/help');
        $this->load->view('main', $d);
    }

    public function faq(){
        $d = array('top' => '', 'content' => 'rules/faq');
        $this->load->view('main', $d);
    }

    public function feedback(){
        $d = array('top' => '', 'content' => 'rules/feedback');
        $this->load->view('main', $d);
    }

    public function public_offer(){
        $d = array('top' => '', 'content' => 'rules/public_offer');
        $this->load->view('main', $d);
    }

    public function police(){
        $d = array('top' => '', 'content' => 'rules/police');
        $this->load->view('main', $d);
    }
}