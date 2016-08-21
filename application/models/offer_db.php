<?php
class Offer_DB extends Abstract_DB {
    function __construct(){
        $this->Item = new Offer();
        $this->table = 'offer';
        parent::__construct();
    }

    function create(){
        $this->db->insert($this->table, array(
            'title' => $this->db->escape_str($this->Item->title),
            'link' 	=> $this->db->escape_str($this->Item->link),
            'img'	=> $this->db->escape_str($this->Item->img),
            'is_active'	=> $this->db->escape_str($this->Item->is_active),
            'type' 	=> $this->db->escape_str($this->Item->type),
            'sort' 	=> $this->db->escape_str($this->Item->sort),
        ));
        $this->Item->id = $this->db->insert_id();
    }

    function update(){
        $this->db->update($this->table,
            array(
                'title' => $this->db->escape_str($this->Item->title),
                'link' 	=> $this->db->escape_str($this->Item->link),
                'img'	=> $this->db->escape_str($this->Item->img),
                'is_active'	=> $this->db->escape_str($this->Item->is_active),
                'type' 	=> $this->db->escape_str($this->Item->type),
                'sort' 	=> $this->db->escape_str($this->Item->sort),
            ),
            array('id' => $this->Item->id));
    }

    /* для тех, кто пытался оплатить
     */
    function getActivePartnerList($limit=0, $offset=0){
        //$this->db->where(" is_active = 1 AND type=`partner` ");
        $this->db->where(array('is_active' => '1'));
        $this->db->where(array('type' => 'partner'));
        return $this->getList($limit, $offset);
    }

    /* для тех, кто оплатил
     */
    function getActiveList($limit=0, $offset=0){
        $this->db->where(array('is_active' => '1'));
        return $this->getList($limit, $offset);
    }

    function getList($limit=0, $offset=0){
        $this->db->select('*');
        $this->db->order_by('id', 'asc');
        if($limit) $this->db->limit($limit, $offset);
        $query = $this->db->get($this->table);
        $a_list = array();
        foreach($query->result_array() as $row){
            $Offer = new Offer();
            $Offer->setAttrFromRow($row);
            $a_list[] = $Offer;
        }
        return $a_list;
    }
}
?>
