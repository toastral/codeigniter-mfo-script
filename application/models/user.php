<?php
class User{
    public $id = 0;
    public $status;
    public $created;
    public $pay_status;
    public $is_ajax_offer_list;
    public $is_pay_karma;
    public $delay;
    public $total_overdue;
    public $max_deleay;
    public $closed_negative;
    public $user_type;

    function setAttrFromRow($row){
        $this->id 		    = @$row['id'];
        $this->status 		= @$row['status'];
        $this->created 		= @$row['created'];
        $this->pay_status   = @$row['pay_status'];
        $this->is_ajax_offer_list = @$row['is_ajax_offer_list'];
        $this->is_pay_karma 	 = @$row['is_pay_karma'];
        $this->delay 		     = @$row['delay'];
        $this->total_overdue 	 = @$row['total_overdue'];
        $this->max_deleay 		 = @$row['max_deleay'];
        $this->closed_negative   = @$row['closed_negative'];
        $this->user_type         = @$row['user_type'];
    }
}