<?php
class Address{
    public $id;
    public $user_id;
    public $get_region;
    public $get_city;
    public $region;
    public $city;
    public $street;
    public $building;
    public $apartment;

    function setAttrFromRow($row){
        $this->id 	    = @$row['id'];
        $this->user_id 	= @$row['user_id'];
        $this->get_region	= @$row['get_region'];
        $this->get_city 	= @$row['get_city'];
        $this->region 	= @$row['region'];
        $this->city 	= @$row['city'];
        $this->street 	= @$row['street'];
        $this->building = @$row['building'];
        $this->apartment= @$row['apartment'];
    }

    function setAttrFromPost($post){
        $this->id 	    = @$post['id'];
        $this->user_id 	= @$post['user_id'];
        $this->get_region 	= @$post['get_region'];
        $this->get_city 	= @$post['get_city'];
        $this->region 	= @$post['region'];
        $this->city 	= @$post['city'];
        $this->street 	= @$post['street'];
        $this->building = @$post['building'];
        $this->apartment= @$post['apartment'];
    }

    function checkEmpty(){
        $a_err = array();
        if(strlen($this->get_region) <= 0 ) $a_err[] = "введите регион, в котором желаете получить деньги";
        if(strlen($this->get_city) <= 0 ) $a_err[] = "введите город, в котором желаете получить деньги";
        if(strlen($this->region) <= 0 ) $a_err[] = "введите регион регистрации";
        if(strlen($this->city) <= 0 ) $a_err[] = "введите город регистрации";
        if(strlen($this->street) <= 0 )   $a_err[] = "введите название улицы";
        if(strlen($this->building) <= 0 )  $a_err[] = "введите номер здания";
        if(strlen($this->apartment) <= 0 )  $a_err[] = "введите номер квартиры";
        return $a_err;
    }

    function validateBeforeCreate(){
        $a_err = array();
        if(!preg_match('/^[\w\s\.\-]+$/u', $this->get_region, $patt))    $a_err[] = "регион содержит недопустимые символы";
        if(!preg_match('/^[\w\s\-]+$/u', $this->get_city, $patt))    $a_err[] = "город содержит недопустимые символы";
        if(!preg_match('/^[\w\s\.\-]+$/u', $this->region, $patt))    $a_err[] = "регион содержит недопустимые символы";
        if(!preg_match('/^[\w\s\-]+$/u', $this->city, $patt))    $a_err[] = "город содержит недопустимые символы";
        if(!preg_match('/^[\w\s\.\-]+$/u', $this->street, $patt))    $a_err[] = "название улицы содержит недопустимые символы";
        if(!preg_match('/^[\w\s\.\-\/]+$/u', $this->building, $patt))    $a_err[] = "номер дома содержит недопустимые символы";
        if(!preg_match('/^[\w\s\.\-\/]+$/u', $this->apartment, $patt))    $a_err[] = "номер квартиры содержит недопустимые символы";
        return $a_err;
    }
}

