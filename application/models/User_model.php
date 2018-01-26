<?php
class User_model extends CI_Model {

	private $table_name = 'tbl_user';

	function login($email, $password) {
		$this->db->where('user_email', $email);
		$query = $this->db->get($this->table_name);

		 $user = $query->result();

		 if(!empty($user)){
            if(password_verify($password, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
	}

    function updateUserProfile($user_id, $data) {
        $this->db->where('user_id', $user_id);
        $this->db->update($this->table_name, $data);
    }
}