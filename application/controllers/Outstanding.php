<?php
class Outstanding extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->database();
		}
		
	}
	
	public function index(){
        $this->load->view('outstanding/v_outstanding');
	}

}
?>