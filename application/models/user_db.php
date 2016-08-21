<?php
class User_DB extends Abstract_DB {  
    function __construct(){
        $this->Item = new User();
        $this->table = 'user';
        parent::__construct();
    } 

    function create(){
        $this->db->insert($this->table, array(
                'status' 	=> $this->db->escape_str($this->Item->status),
                'created'	=> $this->db->escape_str($this->Item->created),
            ));
        $this->Item->id = $this->db->insert_id();
    }

    function update(){
        $this->db->update($this->table,
            array(
                'status' 	=> $this->db->escape_str($this->Item->status),
                'created'	=> $this->db->escape_str($this->Item->created),
                'pay_status'=> $this->db->escape_str($this->Item->pay_status),
                'is_ajax_offer_list' => $this->db->escape_str($this->Item->is_ajax_offer_list),
                'is_pay_karma'      => $this->db->escape_str($this->Item->is_pay_karma),
                'delay'             => $this->db->escape_str($this->Item->delay),
                'total_overdue'     => $this->db->escape_str($this->Item->total_overdue),
                'max_deleay'        => $this->db->escape_str($this->Item->max_deleay),
                'closed_negative'   => $this->db->escape_str($this->Item->closed_negative),
            ),
            array('id' => $this->Item->id));
    }

    function clearInProgressEmailPhone($email, $phone){
        $Personal_data_DB = new Personal_data_DB();
        $a_id = $Personal_data_DB->getIdWhereEmailNPhone($email, $phone, array('in_progress'));

        if(!count($a_id)) return;
        $ids = implode(",", $a_id);
        $this->db->query("DELETE FROM user WHERE id IN ($ids)");
        $this->db->query("DELETE FROM personal_data WHERE user_id IN ($ids)");
        $this->db->query("DELETE FROM passport_data WHERE user_id IN ($ids)");
        $this->db->query("DELETE FROM address WHERE user_id IN ($ids)");
        $this->db->query("DELETE FROM job WHERE user_id IN ($ids)");
        $this->db->query("DELETE FROM addition_data WHERE user_id IN ($ids)");
    }

    function getList($limit=0, $offset=0){
        $this->db->select('user.*, personal_data.*');
        $this->db->order_by('created', 'asc');
        if($limit) $this->db->limit($limit, $offset);
        $this->db->join('personal_data', 'personal_data.user_id = user.id');
        $this->db->where("user.user_type != 'admin'");
        $query = $this->db->get($this->table);
        $a_list = array();
        foreach($query->result_array() as $row){
            $a_list[] = $row;
        }
        return $a_list;
    }

    function get_count(){
        $this->db->where("user.user_type != 'admin'");
        return parent::get_count();
    }
}
?>