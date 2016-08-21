<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payhandler extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('setting');
        $this->load->model('setting_db');

        $this->load->model('trans_log');
        $this->load->model('trans_log_db');
    }

    public function index(){
    }

    private function dump_post_to_log($from, $attribute){
        ob_start();
        print_r($_POST);
        $content = ob_get_contents();
        ob_end_clean();

        $Trans_log = new Trans_log();
        $Trans_log->user_id = 0;
        $Trans_log->tstamp = time();
        $Trans_log->body = $content;
        $Trans_log->type = $from;
        $Trans_log->attribute = $attribute;
        $this->trans_log_db->Item = $Trans_log;
        $this->trans_log_db->create();
    }

    function ya_http_notice(){

        $a_setting = $this->setting_db->getList();
        $notification_secret = $a_setting['ya_http_notice_secret']->value;
        $str = sprintf("%s&%s&%s&%s&%s&%s&%s&%s&%s",$_POST['notification_type'], $_POST['operation_id'], $_POST['amount'], $_POST['currency'], $_POST['datetime'], $_POST['sender'], $_POST['codepro'], $notification_secret, $_POST['label']);
        //$_POST['str'] = $str;
        $this->user_db->Item->id = intval($_POST['label']);
        if($_POST['sha1_hash'] == sha1($str)){
            $_POST['my_var_result'] = 'ok';
            $this->user_db->updateField('pay_status', 'payed_full');

        }else{
            $_POST['my_var_result'] = 'not_valid_sha1';
            $this->user_db->updateField('pay_status', 'try_pay');
        }

        $this->dump_post_to_log('from_ya', 'notice');
        /*
        $a_setting = $this->setting_db->getList();
        $str = $_POST['notification_type'].'&'.$_POST['operation_id'].'&'.$_POST['amount'].'&'.$_POST['currency'].'&'.$_POST['datetime'].'&'.$_POST['sender'].'&'.$_POST['codepro'].'&'.$_POST['notification_secret'].'&'.$_POST['label']
        if(sha1($str) != $_POST['sha1_hash']){
            // ошибка ->
            exit;
        }
        */
    }

    /*
    function payeer_success(){
        $this->dump_post_to_log('from_payeer', 'success');
        echo "success";
    }
    function payeer_fail(){
        $this->dump_post_to_log('from_payeer', 'fail');
        echo "fail";
    }
    */

    function payeer_status(){
        $this->dump_post_to_log('from_payeer', 'status');
        if (!in_array($_SERVER['REMOTE_ADDR'], array('185.71.65.92', '185.71.65.189'))) return;
        if (isset($_POST['m_operation_id']) && isset($_POST['m_sign'])) {

            $a_setting = $this->setting_db->getList();
            $m_key = $a_setting['payeer_shop_secret_key']->value;
            $arHash = array($_POST['m_operation_id'],
                $_POST['m_operation_ps'],
                $_POST['m_operation_date'],
                $_POST['m_operation_pay_date'],
                $_POST['m_shop'],
                $_POST['m_orderid'],
                $_POST['m_amount'],
                $_POST['m_curr'],
                $_POST['m_desc'],
                $_POST['m_status'],
                $m_key);
            $sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));
            $this->user_db->Item->id = abs(intval($_POST['m_orderid']));
            if ($_POST['m_sign'] == $sign_hash && $_POST['m_status'] == 'success') {
                $this->user_db->updateField('pay_status', 'payed_full');
                echo $_POST['m_orderid'].'|success';
                exit;
            }
            $this->user_db->updateField('pay_status', 'try_pay');
            echo $_POST['m_orderid'].'|error';
        }

    }

    function test(){
    }
}
?>
