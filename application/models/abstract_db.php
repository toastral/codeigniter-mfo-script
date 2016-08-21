<?php
class Abstract_DB extends CI_Model {
    public $Item;
    public $table;

    function __construct(){
        parent::__construct();
    }

    function read($id){
        $this->db->where('id', $id);
        $query = $this->db->get( $this->table );
        $row = $query->row_array();	
        $this->Item->setAttrFromRow($row);
    }

    function get_count(){
        $this->db->select('COUNT(*) c');
        $query = $this->db->get( $this->table );
        $row = $query->row_array();
        return $row['c'];
    }

    function readByUserId($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get( $this->table );
        $row = $query->row_array();
        $this->Item->setAttrFromRow($row);
    }

    function updateField($field_name, $field_value){
        $this->db->update($this->table, 
            array(
                $field_name => $this->db->escape_str($field_value)
            ),
            array('id' => $this->Item->id));				
    }

    public function delete(){
        $this->db->delete($this->table, array('id' => $this->Item->id));
    }

    function createOrUpdateByUserId(){
        $user_id = $this->Item->user_id;
        $this->db->where('user_id', $user_id);
        $query = $this->db->get( $this->table );
        if($query->num_rows() > 0){
            $row = $query->row_array();
            $this->Item->id = $row['id'];
            $this->update();
        }else{
            $this->create();
        }
    }
}
?>