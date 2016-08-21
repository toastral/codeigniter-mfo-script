<?php
class Passport_data{
    public $id;
    public $user_id;
    public $serial;
    public $number;
    public $code;
    public $organ;
    public $year;
    public $month;
    public $day;
    public $marital_status;

    function setAttrFromRow($row){
        $this->id 	= @$row['id'];
        $this->user_id 	= @$row['user_id'];
        $this->serial 	= @$row['serial'];
        $this->number 	= @$row['number'];
        $this->code 	= @$row['code'];
        $this->organ 	= @$row['organ'];
        $this->year 	= @$row['year'];
        $this->month 	= @$row['month'];
        $this->day 	= @$row['day'];
        $this->marital_status 	= @$row['marital_status'];
    }

    function setAttrFromPost($post){
        $this->id 	= @$post['id'];
        $this->user_id 	= @$post['user_id'];
        $this->serial 	= @$post['serial'];
        $this->number 	= @$post['number'];
        $this->code 	= @$post['code'];
        $this->organ 	= @$post['organ'];
        $this->year 	= @$post['year'];
        $this->month 	= @$post['month'];
        $this->day 	= @$post['day'];
        $this->marital_status = @$post['marital_status'];
    }

    function checkEmpty(){
        $a_err = array();
        if(strlen($this->serial) <= 0 ) $a_err[] = "введите 'Серию'";
        if(strlen($this->number) <= 0 ) $a_err[] = "введите 'Номер'";
        if(strlen($this->code) <= 0 )   $a_err[] = "введите 'Код'";
        if(strlen($this->organ) <= 0 )  $a_err[] = "введите 'Организацию'";
        if($this->year <=0 ) $a_err[] = "введите год выдачи";
        if($this->month <=0 ) $a_err[] = "введите месяц выдачи";
        if($this->day <=0 ) $a_err[] = "введите день выдачи";
        return $a_err;
    }

    function validateBeforeCreate(){
        $a_err = array();
        if(!preg_match('/^[\d]{6}$/u', $this->number, $patt)) $a_err[] = "поле 'Номер' должно содержать 6 цифр";
        if(!preg_match('/^[\d]{4}$/u', $this->serial, $patt)) $a_err[] = "поле 'Серия' должно содержать 4 цифры";
        if(!preg_match('/^[\w\d\.\-\s№]+$/u', $this->organ, $patt))    $a_err[] = "поле 'Организация' содержит недопустимые символы";
        if(!preg_match('/^[\d]{3}-[\d]{3}$/u', $this->code, $patt)) $a_err[] = "поле 'Код' должно содержать цифры и тире в формате 123-456";
        return $a_err;
    }
}

