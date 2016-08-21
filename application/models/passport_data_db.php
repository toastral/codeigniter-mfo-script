<?php
class Passport_data_DB extends Abstract_DB {  
    function __construct(){
        $this->Item = new Passport_data();
        $this->table = 'passport_data';
        parent::__construct();
    }

    function create(){
        $this->db->insert($this->table, array(
                'user_id'   => $this->db->escape_str($this->Item->user_id),
                'serial'    => $this->db->escape_str($this->Item->serial),
                'number'    => $this->db->escape_str($this->Item->number),
                'code'      => $this->db->escape_str($this->Item->code),
                'organ'     => $this->db->escape_str($this->Item->organ),
                'year' 	    => $this->db->escape_str($this->Item->year),
                'month'     => $this->db->escape_str($this->Item->month),
                'day' 	    => $this->db->escape_str($this->Item->day),
                'marital_status' => $this->db->escape_str($this->Item->marital_status),
            ));
        $this->Item->id = $this->db->insert_id();
    }


    function update(){
        $this->db->update($this->table,
            array(
                'user_id'   => $this->db->escape_str($this->Item->user_id),
                'serial'    => $this->db->escape_str($this->Item->serial),
                'number'    => $this->db->escape_str($this->Item->number),
                'code'      => $this->db->escape_str($this->Item->code),
                'organ'     => $this->db->escape_str($this->Item->organ),
                'year' 	    => $this->db->escape_str($this->Item->year),
                'month'     => $this->db->escape_str($this->Item->month),
                'day' 	    => $this->db->escape_str($this->Item->day),
                'marital_status'=> $this->db->escape_str($this->Item->marital_status),
            ),
            array('id' => $this->Item->id));
    }
}
?>