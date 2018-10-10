<?php
class Signin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('signin_model');
		$this->load->helper(['url','form']);
	}
	

	function index(){
		$this->load->view('login/v_login');
	}

	function post_signin(){
		$username =  $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->signin_model->post_signin($username, $password);
	}

	function invalid_signin(){
		$this->load->view('login/v_invalid');
	}

	 function logout(){
        $this->session->sess_destroy();
       redirect('Signin');
    }

}