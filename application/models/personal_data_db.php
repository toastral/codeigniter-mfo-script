<?php
class Personal_data_DB extends Abstract_DB {  
    function __construct(){
        $this->Item = new Personal_data();
        $this->table = 'personal_data';
        parent::__construct();
    } 

    function create(){
        $this->db->insert($this->table, array(
                'user_id'=> $this->db->escape_str($this->Item->user_id),
                'name_1' => $this->db->escape_str($this->Item->name_1),
                'name_2' => $this->db->escape_str($this->Item->name_2),
                'name_3' => $this->db->escape_str($this->Item->name_3),
                'sex' 	 => $this->db->escape_str($this->Item->sex),
                'b_year' => $this->db->escape_str($this->Item->b_year),
                'b_month'=> $this->db->escape_str($this->Item->b_month),
                'b_day'  => $this->db->escape_str($this->Item->b_day),
                'email'  => $this->db->escape_str($this->Item->email),
                'phone'  => $this->db->escape_str($this->Item->phone),
            ));
        $this->Item->id = $this->db->insert_id();
    }

    function update(){
        $this->db->update($this->table,
            array(
                'user_id'=> $this->db->escape_str($this->Item->user_id),
                'name_1' => $this->db->escape_str($this->Item->name_1),
                'name_2' => $this->db->escape_str($this->Item->name_2),
                'name_3' => $this->db->escape_str($this->Item->name_3),
                'sex' 	 => $this->db->escape_str($this->Item->sex),
                'b_year' => $this->db->escape_str($this->Item->b_year),
                'b_month'=> $this->db->escape_str($this->Item->b_month),
                'b_day'  => $this->db->escape_str($this->Item->b_day),
                'email'  => $this->db->escape_str($this->Item->email),
                'phone'  => $this->db->escape_str($this->Item->phone),
                'password_hash' => $this->db->escape_str($this->Item->password_hash),
            ),
            array('id' => $this->Item->id));
    }

    function getIdWhereEmailNPhone($email, $phone, $a_status){
        $a_tmp = array();
        foreach($a_status as $status){
            $a_tmp[]="'".$status."'";
        }
        $statuses = implode(",", $a_tmp);

        $this->db->select('user.id');
        $this->db->join('user', 'personal_data.user_id = user.id');
        $where = "(personal_data.email = '".$email."' OR personal_data.phone='".$phone."') AND user.status IN(".$statuses.")";

        $this->db->where( $where );
        $query = $this->db->get($this->table);
        $a_id = array();
        foreach($query->result_array() as $row){
            $a_id[] = $row['id'];
        }
        return $a_id;
    }

    function isHaveEmailNPhone($email, $phone){
        $email = $this->db->escape_str($email);
        $phone = $this->db->escape_str($phone);
        $a_id = $this->getIdWhereEmailNPhone($email, $phone, array('reg_complete','active','banned'));
        if(count($a_id)){
            return true;
        }
        return false;
    }

    function getUserIdByEmail($email){
        $email = $this->db->escape_str($email);
        $this->db->where( array('email' => $email));
        $query = $this->db->get( $this->table );
        if($query->num_rows() > 0){
            $row = $query->row_array();
            return $row['user_id'];
        }
        return 0;
    }

    function isValidUser($email, $password){
        $email = $this->db->escape_str($email);
        $this->db->where( array('email' => $email));
        $query = $this->db->get( $this->table );
        if($query->num_rows() > 0){
            $row = $query->row_array();
            if( $row['password_hash'] == md5($password) ) return true;
        }
        return false;
    }

}
?>