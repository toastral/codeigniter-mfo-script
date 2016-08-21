<?php
class Setting_DB extends Abstract_DB {
    function __construct(){
        $this->Item = new Setting();
        $this->table = 'setting';
        parent::__construct();
    }

    function update(){
        $this->db->update($this->table,
            array(
                'name' 	=> $this->db->escape_str($this->Item->name),
                'value'=> $this->db->escape_str($this->Item->value),
                'type' 	=> $this->db->escape_str($this->Item->type),
                'description' => $this->db->escape_str($this->Item->description),
                'sort' 	=> $this->db->escape_str($this->Item->sort),
                'group' => $this->db->escape_str($this->Item->group),
            ),
            array('id' => $this->Item->id));
    }

    function readValueByName($name){
        $this->db->where('name', $name);
        $query = $this->db->get( $this->table );
        $row = $query->row_array();
        return $row['value'];
    }

    function getList(){
        $this->db->select('*');
        //$this->db->order_by('id', 'asc');
        $this->db->order_by('group', 'asc');
        $query = $this->db->get($this->table);
        $a_list = array();
        foreach($query->result_array() as $row){
            $Setting = new Setting();
            $Setting->setAttrFromRow($row);
            $a_list[$row['name']] = $Setting;
        }
        return $a_list;
    }
}
?>