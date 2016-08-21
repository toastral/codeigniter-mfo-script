<?php
class Job_DB extends Abstract_DB {  
    function __construct(){
        $this->Item = new Job();
        $this->table = 'job';
        parent::__construct();
    } 

    function create(){
        $this->db->insert($this->table, array(
                'user_id' 	=> $this->db->escape_str($this->Item->user_id),
                'company_name' 	=> $this->db->escape_str($this->Item->company_name),
                'city'		=> $this->db->escape_str($this->Item->city),
                'street'		=> $this->db->escape_str($this->Item->street),
                'building' 	=> $this->db->escape_str($this->Item->building),
                'phone' 	=> $this->db->escape_str($this->Item->phone),
                'prof_status' 	=> $this->db->escape_str($this->Item->prof_status),
                'month_amount' 	=> $this->db->escape_str($this->Item->month_amount),
            ));
        $this->Item->id = $this->db->insert_id();
    }

    function update(){
        $this->db->update($this->table,
            array(
                'user_id' 	=> $this->db->escape_str($this->Item->user_id),
                'company_name' 	=> $this->db->escape_str($this->Item->company_name),
                'city'		=> $this->db->escape_str($this->Item->city),
                'street'		=> $this->db->escape_str($this->Item->street),
                'building' 	=> $this->db->escape_str($this->Item->building),
                'phone' 	=> $this->db->escape_str($this->Item->phone),
                'prof_status' 	=> $this->db->escape_str($this->Item->prof_status),
                'month_amount' 	=> $this->db->escape_str($this->Item->month_amount),
            ),
            array('id' => $this->Item->id));
    }
}
?>