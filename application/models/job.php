<?php
class Job{
    public $id;
    public $user_id;
    public $company_name;
    public $city;
    public $street;
    public $building;
    public $phone;
    public $prof_status;
    public $month_amount;

    function setAttrFromRow($row){
        $this->id 	= @$row['id'];
        $this->user_id 	= @$row['user_id'];
        $this->company_name = @$row['company_name'];
        $this->city 	= @$row['city'];
        $this->street 	= @$row['street'];
        $this->building = @$row['building'];
        $this->phone 	= @$row['phone'];
        $this->prof_status = @$row['prof_status'];
        $this->month_amount = @$row['month_amount'];
    }

    function setAttrFromPost($post){
        $this->id 	    = @$post['id'];
        $this->user_id 	= @$post['user_id'];
        $this->company_name = @$post['company_name'];
        $this->city 	= @$post['city'];
        $this->street 	= @$post['street'];
        $this->building = @$post['building'];
        $this->phone 	= @$post['phone'];
        $this->prof_status = @$post['prof_status'];
        $this->month_amount = @$post['month_amount'];
    }

    function checkEmpty(){
        $a_err = array();
        if(strlen($this->company_name) <= 0 ) $a_err[] = "введите название компании";
        if(strlen($this->city) <= 0 ) $a_err[] = "введите город";
        if(strlen($this->street) <= 0 ) $a_err[] = "введите название улицы";
        if(strlen($this->building) <= 0 ) $a_err[] = "введите номер дома";
        if(strlen($this->phone) <= 0 )   $a_err[] = "введите телефон";
        if(strlen($this->prof_status) <= 0 )  $a_err[] = "введите должность";
        if(strlen($this->month_amount) <= 0 )  $a_err[] = "введите месячный заработок";
        return $a_err;
    }

    function validateBeforeCreate(){
        $a_err = array();
        if(!preg_match('/^[\w\s\-]+$/u', $this->city, $patt))       $a_err[] = "город содержит недопустимые символы";
        if(!preg_match('/^[\w\s\.\-]+$/u', $this->street, $patt))   $a_err[] = "название улицы содержит недопустимые символы";
        if(!preg_match('/^[\w\s\.\-\/]+$/u', $this->building, $patt))    $a_err[] = "номер дома содержит недопустимые символы";
        if(!preg_match('/^[\d]+$/u', $this->phone, $patt))          $a_err[] = "телефон содержит недопустимые символы";
        if(!preg_match('/^[\w\s\.\-]+$/u', $this->prof_status, $patt)) $a_err[] = "должность содержит недопустимые символы";
        if(!preg_match('/^[\d]+$/u', $this->month_amount, $patt))       $a_err[] = "заработок должен содержать только цифры";
        return $a_err;
    }

}

