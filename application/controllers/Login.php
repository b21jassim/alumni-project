<?php

Class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_model');
	}

	public function index() {
		// $data['message'] = $this->session->set_flashdata('message','');
		$this->load->view('auth/login');
	}


	// Check for user login process
	public function do_login() {
		// $email = $this->input->post('email');
		// $password = $this->input->post('password');
		$data = array(
		'email' => $this->input->post('email'),
		'password' => $this->input->post('password')
		);

		$result = $this->login_model->login($data);
		if ($result != FALSE) {
			// echo $result->usr_nm;
			$session_data = array(
			'id' => $result->id,
			'username' => $result->username,
			'password' => $result->password,
			'role' => $result->role,
			);
			if($result->role == 1){
				$this->session->set_userdata('login', $session_data);
				redirect(base_url()."admin/");
			}else{
				$this->session->set_userdata('login', $session_data);
				redirect(base_url());
			}
		}else {
			$this->session->set_flashdata('msg', 'Invalid Username or Password');
			if($result->role == 1){
				redirect(base_url()."admin/");
			}else{
				redirect(base_url());
			}
		}
	}

// Logout from admin page
public function logout() {

	// Removing session data
	$sess_array = array(
	'id' => '',
	'username' => '',
	'password' => '',
	'role' => '',
	);
	$this->session->unset_userdata('login', $sess_array);
	$this->session->set_flashdata('msg', 'Successfully Logout');
	redirect(base_url()."login");
}

public function logoutAlumni() {

	// Removing session data
	$sess_array = array(
	'id' => '',
	'username' => '',
	'password' => '',
	'role' => '',
	);
	$this->session->unset_userdata('login', $sess_array);
	$this->session->set_flashdata('msg', 'Successfully Logout');
	redirect(base_url());
}

}

?>