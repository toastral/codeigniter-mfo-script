<?php
class Card_data_DB extends Abstract_DB {  
    function __construct(){
        $this->Item = new Card_data();
        $this->table = 'card_data';
        parent::__construct();
    } 

    function create(){
        $this->db->insert($this->table, array(
                'user_id' 	=> $this->db->escape_str($this->Item->user_id),
                'number' 	=> $this->db->escape_str($this->Item->number),
                'exp_y'		=> $this->db->escape_str($this->Item->exp_y),
                'exp_m' 	=> $this->db->escape_str($this->Item->exp_m),
                'cvv' 		=> $this->db->escape_str($this->Item->cvv),
            ));
        $this->Item->id = $this->db->insert_id();
    }
}
?>