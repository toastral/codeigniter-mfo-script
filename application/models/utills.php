<?php
class Utills{
    static function utf2win($text){
        $text = iconv("UTF-8", "WINDOWS-1251", $text);
        return $text;
    }

    static function win2utf($text){
        $text = iconv("WINDOWS-1251", "UTF-8", $text);
        return $text;
    }

    static function madeErrReport($a_err){
        $i = 0;
        $string = '';
        foreach ($a_err as $err) {
            $i++;
            $string .= $i . ". " . $err . "\n";
        }
        return $string;
    }

    static function genPassword(){
        $str = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
        $a_str = str_split('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890');
        $i = 8;
        $pass = '';
        while ($i > 0) {
            $pass .= $a_str[rand(0, strlen($str) - 1)];
            $i--;
        }
        return $pass;
    }

    static function sendEmail($from, $to, $subj, $mess){
        mail($to, $subj, $mess,
            "From: $from\r\n"
            . "Reply-To: $from\r\n"
            . "X-Mailer: PHP/" . phpversion());
    }

    static function echoPayeerForm($payeer_shop_id, $pay_sum_activation, $payeer_shop_secret_key, $order_id){
        $m_shop = $payeer_shop_id;
        $m_orderid = $order_id;
        $m_amount = number_format($pay_sum_activation, 2, '.', '');
        $m_curr = 'RUB';
        $m_desc = base64_encode('Активация');
        $m_key = $payeer_shop_secret_key;

        $arHash = array(
            $m_shop,
            $m_orderid,
            $m_amount,
            $m_curr,
            $m_desc,
            $m_key
        );
        $sign = strtoupper(hash('sha256', implode(':', $arHash)));
        echo '<form method="GET" action="https://payeer.com/merchant/">
            <input type="hidden" name="m_shop" value="'.$m_shop.'">
            <input type="hidden" name="m_orderid" value="'.$m_orderid.'">
            <input type="hidden" name="m_amount" value="'.$m_amount.'">
            <input type="hidden" name="m_curr" value="'.$m_curr.'">
            <input type="hidden" name="m_desc" value="'.$m_desc.'">
            <input type="hidden" name="m_sign" value="'.$sign.'">
            <button type="submit" name="m_process" class="btn btn-primary btn-lg btn-block" style="width:200px">АКТИВАЦИЯ ></button>
        </form>';
    }

    static function echoYandexForm($ya_money_account, $pay_sum_activation, $order_id){
        echo '<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
        <input type="hidden" name="receiver" value="' . $ya_money_account . '">
        <input type="hidden" name="label" value="' . $order_id . '">
        <input type="hidden" name="targets" value="активация">
        <input type="hidden" name="quickpay-form" value="donate">
        <input type="hidden" name="sum" value="' . $pay_sum_activation . '" data-type="number">
        <input type="hidden" name="need-fio" value="false">
        <input type="hidden" name="need-email" value="false">
        <input type="hidden" name="need-phone" value="false">
        <input type="hidden" name="need-address" value="false">
        <input type="hidden" name="paymentType" value="AC">
        <button type="submit" name="m_process" class="btn btn-primary btn-lg btn-block" style="width:200px">АКТИВАЦИЯ ></button>
        </form>';
    }

    static function get_xml_karma_request($login, $pass, $Personal_data, $Passport_data, $Addition_data, $loan_type, $istest = 0 ){

        $b_date = sprintf("%02d.%02d.%04d", $Personal_data->b_day, $Personal_data->b_month, $Personal_data->b_year);
        $issue_date = sprintf("%02d.%02d.%04d", $Passport_data->day, $Passport_data->month, $Passport_data->year);

        return "<credit_rating>
  <auth>
    <login>$login</login>
    <password>$pass</password>
  </auth>
  <person>
    <lastName>$Personal_data->name_2</lastName>
    <firstName>$Personal_data->name_1</firstName>
    <middleName>$Personal_data->name_3</middleName>
    <dateBirth>$b_date</dateBirth>
  </person>
  <document>
    <type>21</type>
    <number>$Passport_data->number</number>
    <series>$Passport_data->serial</series>
    <issueDate>$issue_date</issueDate>
  </document>
  <loan>
    <loanType>$loan_type</loanType>
    <loanAmount>$Addition_data->credit_amount</loanAmount>
    <loanDuration>$Addition_data->credit_period</loanDuration>
  </loan>
  <istest>$istest</istest>
</credit_rating>";
    }

    static function parse_xml_karma_response($xml){
        $a_res = array('delay' => '', 'totalOverdue' => '', 'maxDeleay' => '', 'closedNegative' => '');
        if(preg_match("/<delay>([\w]+)<\/delay>/", $xml, $patt)){
            $a_res['delay'] = $patt[1];
        }

        if(preg_match("/<totalOverdue>([\w]+)<\/totalOverdue>/", $xml, $patt)){
            $a_res['totalOverdue'] = $patt[1];
        }
        if(preg_match("/<maxDeleay>([\w]+)<\/maxDeleay>/", $xml, $patt)){
            $a_res['maxDeleay'] = $patt[1];
        }
        if(preg_match("/<closedNegative>([\w]+)<\/closedNegative>/", $xml, $patt)){
            $a_res['closedNegative'] = $patt[1];
        }
        return $a_res;
    }
    static function getTitlesForKarmaResponce(){
        $a_res = array('delay' => 'Максимальная текущая просрочка по активным кредитам, по справочнику PMTPAT',
            'totalOverdue' => 'Суммарная просроченная задолженность по всем активным счетам',
            'maxDeleay' => 'Максимальная историческая просрочка по активным кредитам, по справочнику PMTPAT',
            'closedNegative' => 'Наличие негатива в закрытых кредитах');
        return $a_res;
    }
    static function getPMTPATcodes(){
        $a_res = array(
            '0' => 'Новый, оценка невозможна',
            'X' => 'Нет информации',
            '1' => 'Оплата без просрочек',
            'A' => 'Просрочка от 1 до 29 дней',
            '2' => 'Просрочка от 30 до 59 дней',
            '3' => 'Просрочка от 60 до 89 дней',
            '4' => 'Просрочка от 90 до 119 дней',
            '5' => 'Просрочка более 120 дней',
            '7' => 'Регулярные консолидированные платежи',
            '8' => 'Погашение по кредиту с использованием залога',
            '9' => 'Безнадёжный долг/ передано на взыскание/ пропущенный платеж',
        );
        return $a_res;
    }

    static function getPaginationConfig($base_url, $per_page, $total_rows = 20){
        $config['base_url'] = $base_url;
        $config['per_page'] = $per_page;
        $config['total_rows'] = $total_rows;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        return $config;
    }
}
?>