<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Master_model', '', TRUE);
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$username  = $this->input->post('username');
		$password  = $this->input->post('password');

		$get_user = $this->Master_model->view_by_id('user');
		$user_name = $get_user->username;
		$user_pass = $get_user->password;
		
		
		if ((password_verify($password, $user_pass)) && ($username == $user_name)) {
			$session_id = session_id();
        	$session = array('session' => $session_id, 'username' => $username, 'login' => TRUE);
			$this->session->set_userdata($session);
			redirect(base_url('admin/dashboard'));
        } else {
            $this->session->set_flashdata('message', 'Username atau Password anda salah.');
			redirect(base_url('auth'));
        }
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
