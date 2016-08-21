<?php
class Addition_data{
    public $id;
    public $user_id;
    public $add_document;
    public $document_number;
    public $is_have_car;
    public $credit_amount;
    public $credit_period;

    function setAttrFromRow($row){
        $this->id 	    = @$row['id'];
        $this->user_id  = @$row['user_id'];
        $this->add_document 	= @$row['add_document'];
        $this->document_number 	= @$row['document_number'];
        $this->is_have_car 	    = @$row['is_have_car'];
        $this->credit_amount 	= @$row['credit_amount'];
        $this->credit_period 	= @$row['credit_period'];
    }

    function setAttrFromPost($post){
        $this->id 	    = @$post['id'];
        $this->user_id  = @$post['user_id'];
        $this->add_document 	= @$post['add_document'];
        $this->document_number 	= @$post['document_number'];
        $this->is_have_car 	    = @$post['is_have_car'];
        $this->credit_amount 	= @$post['credit_amount'];
        $this->credit_period 	= @$post['credit_period'];
    }

    function checkEmpty(){
        $a_err = array();
        if(strlen($this->document_number) <= 0 ) $a_err[] = "введите номер документа";
        if(strlen($this->credit_amount) <= 0 ) $a_err[] = "введите сумму займа";
        if(strlen($this->credit_period) <= 0 ) $a_err[] = "введите срок займа";
        return $a_err;
    }

    function validateBeforeCreate(){
        $a_err = array();
        if(!preg_match('/^[\w\s\.\-\/]+$/u', $this->credit_amount, $patt))    $a_err[] = "номер содержит недопустимые символы";
        if(!preg_match('/^[\d]+$/u', $this->credit_period, $patt))    $a_err[] = "используйте цифры для указания срока займа";
        if(!preg_match('/^[\d]+$/u', $this->credit_period, $patt))    $a_err[] = "используйте цифры для указания срока займа";
        return $a_err;
    }
}