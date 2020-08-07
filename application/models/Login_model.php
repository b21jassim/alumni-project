<?php

Class Login_model extends CI_Model {

	public function login($data) {

		$email = $data['email'];
		$password = $data['password'];

		$query = $this->db->get_where('users',array('email' => $email, 'password' => md5($password)));
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function app_login($data) {

		$email = $data['email'];
		$password = $data['password'];

		$query = $this->db->get_where('users',array('email' => $email, 'password' => md5($password), 'status'=>1));
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
}
?>