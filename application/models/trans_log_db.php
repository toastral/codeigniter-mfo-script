<?php
class Trans_log_DB extends Abstract_DB{
    function __construct(){
        $this->Item = new Trans_log();
        $this->table = 'trans_log';
        parent::__construct();
    }

    function create(){
        $this->db->insert($this->table, array(
            'tstamp' => $this->db->escape_str($this->Item->tstamp),
            'user_id' => $this->db->escape_str($this->Item->user_id),
            'body' => $this->db->escape_str($this->Item->body),
            'type' => $this->db->escape_str($this->Item->type),
            'attribute' => $this->db->escape_str($this->Item->attribute),
        ));
        $this->Item->id = $this->db->insert_id();
    }

    function getList($limit=0, $offset=0){
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        if($limit) $this->db->limit($limit, $offset);
        $query = $this->db->get($this->table);
        $a_list = array();
        foreach($query->result_array() as $row){
            $Trans_log = new Trans_log();
            $Trans_log->setAttrFromRow($row);
            $a_list[] = $Trans_log;
        }
        return $a_list;
    }
}
?>