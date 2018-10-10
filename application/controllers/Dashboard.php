<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			//$this->load->model('admin_setuptpamodel');
		}
		
	}

	public function index(){
		$this->load->view('dashboard/v_dashboard');
	}
}
