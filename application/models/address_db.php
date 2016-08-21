<?php
class Address_DB extends Abstract_DB {  
    function __construct(){
        $this->Item = new Address();
        $this->table = 'address';
        parent::__construct();
    } 

    function create(){
        $this->db->insert($this->table, array(
                'user_id' 	=> $this->db->escape_str($this->Item->user_id),
                'get_region'=> $this->db->escape_str($this->Item->get_region),
                'get_city' 	=> $this->db->escape_str($this->Item->get_city),
                'region' 	=> $this->db->escape_str($this->Item->region),
                'city'		=> $this->db->escape_str($this->Item->city),
                'street' 	=> $this->db->escape_str($this->Item->street),
                'building' 	=> $this->db->escape_str($this->Item->building),
                'apartment' 	=> $this->db->escape_str($this->Item->apartment),
            ));
        $this->Item->id = $this->db->insert_id();
    }

    function update(){
        $this->db->update($this->table,
            array(
                'user_id' 	=> $this->db->escape_str($this->Item->user_id),
                'get_region'=> $this->db->escape_str($this->Item->get_region),
                'get_city' 	=> $this->db->escape_str($this->Item->get_city),
                'region' 	=> $this->db->escape_str($this->Item->region),
                'city'		=> $this->db->escape_str($this->Item->city),
                'street' 	=> $this->db->escape_str($this->Item->street),
                'building' 	=> $this->db->escape_str($this->Item->building),
                'apartment' 	=> $this->db->escape_str($this->Item->apartment),
            ),
            array('id' => $this->Item->id));
    }
}
?>