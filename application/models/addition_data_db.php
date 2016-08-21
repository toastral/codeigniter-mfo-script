<?php
class Addition_data_DB extends Abstract_DB {
    function __construct(){
        $this->Item = new Addition_data();
        $this->table = 'addition_data';
        parent::__construct();
    }

    function create(){
        $this->db->insert($this->table, array(
            'user_id' 	        => $this->db->escape_str($this->Item->user_id),
            'add_document'      => $this->db->escape_str($this->Item->add_document),
            'document_number' 	=> $this->db->escape_str($this->Item->document_number),
            'is_have_car' 	    => $this->db->escape_str($this->Item->is_have_car),
            'credit_amount'		=> $this->db->escape_str($this->Item->credit_amount),
            'credit_period' 	=> $this->db->escape_str($this->Item->credit_period),
        ));
        $this->Item->id = $this->db->insert_id();
    }

    function update(){
        $this->db->update($this->table,
            array(
                'user_id' 	        => $this->db->escape_str($this->Item->user_id),
                'add_document'      => $this->db->escape_str($this->Item->add_document),
                'document_number' 	=> $this->db->escape_str($this->Item->document_number),
                'is_have_car' 	    => $this->db->escape_str($this->Item->is_have_car),
                'credit_amount'		=> $this->db->escape_str($this->Item->credit_amount),
                'credit_period' 	=> $this->db->escape_str($this->Item->credit_period),
            ),
            array('id' => $this->Item->id));
    }
}
?>