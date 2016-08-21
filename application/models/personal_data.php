<?php
class Personal_data{
    public $id;
    public $user_id;
    public $name_1;
    public $name_2;
    public $name_3;
    public $sex;
    public $b_year;
    public $b_month;
    public $b_day;
    public $email;
    public $phone;
    public $is_accept_email;
    public $password_hash;

    function setAttrFromRow($row){
        $this->id 	= @$row['id'];
        $this->user_id 	= @$row['user_id'];
        $this->name_1 	= @$row['name_1'];
        $this->name_2 	= @$row['name_2'];
        $this->name_3 	= @$row['name_3'];
        $this->sex 	= @$row['sex'];
        $this->b_year 	= @$row['b_year'];
        $this->b_month 	= @$row['b_month'];
        $this->b_day 	= @$row['b_day'];
        $this->email 	= @$row['email'];
        $this->phone 	= @$row['phone'];
        $this->is_accept_email 	= @$row['is_accept_email'];
        $this->password_hash 	= @$row['password_hash'];
    }

    function setAttrFromPost($post){
        $this->id 	= @$post['id'];
        $this->user_id 	= @$post['user_id'];
        $this->name_1 	= @$post['name_1'];
        $this->name_2 	= @$post['name_2'];
        $this->name_3 	= @$post['name_3'];
        $this->sex 	    = @$post['sex'];
        $this->b_year 	= @$post['b_year'];
        $this->b_month 	= @$post['b_month'];
        $this->b_day 	= @$post['b_day'];
        $this->email 	= @$post['email'];
        $this->phone 	= @$post['phone'];
        $this->is_accept_email 	= @$post['is_accept_email'];
    }

    function checkEmpty(){
        $a_err = array();
        if(strlen($this->name_1) <= 0 ) $a_err[] = "введите 'Имя'";
        if(strlen($this->name_2) <= 0 ) $a_err[] = "введите 'Фамилию'";
        if(strlen($this->name_3) <= 0 ) $a_err[] = "введите 'Отчество'";
        if(strlen($this->email) <= 0 ) $a_err[] = "введите 'Email'";
        if(strlen($this->phone) <= 0 ) $a_err[] = "введите 'Телефон'";
        if($this->b_year <=0 ) $a_err[] = "введите год рождения";
        if($this->b_month <=0 ) $a_err[] = "введите месяц рождения";
        if($this->b_day <=0 ) $a_err[] = "введите день рождения";
        return $a_err;
    }

    function validateBeforeCreate(){
        $a_err = array();
        $name_1 = $this->name_1;
        $name_2 = $this->name_2;
        $name_3 = $this->name_3;

        //$name_1 = Utills::utf2win($name_1);
        //$name_2 = Utills::utf2win($name_2);
        //$name_3 = Utills::utf2win($name_3);
        if(!preg_match('/^[\w]+$/u', $name_1, $patt)) $a_err[] = "поле 'Имя' содержит недопустимые символы";
        if(!preg_match('/^[\w]+$/u', $name_2, $patt)) $a_err[] = "поле 'Фамилия' содержит недопустимые символы";
        if(!preg_match('/^[\w]+$/u', $name_3, $patt)) $a_err[] = "поле 'Отчество' содержит недопустимые символы";
        if(!in_array($this->sex, array('male', 'female'))) $a_err[] = "поле 'Пол' содержит недопустимые символы";
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) $a_err[] = "'Email' имеет недопустимый формат";
        if(!preg_match('/^[\d]+$/', $this->phone, $patt)) $a_err[] = "недопустимый формат телефона";
        return $a_err;
    }
}