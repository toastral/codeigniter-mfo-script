<?php
class Card_data{
    public $id;
    public $user_id;
    public $number;
    public $exp_y;
    public $exp_m;
    public $cvv;

    function setAttrFromRow($row){
        $this->id 	= @$row['id'];
        $this->user_id  = @$row['user_id'];
        $this->number 	= @$row['number'];
        $this->exp_y 	= @$row['exp_y'];
        $this->exp_m 	= @$row['exp_m'];
        $this->cvv 	= @$row['cvv'];
    }
}