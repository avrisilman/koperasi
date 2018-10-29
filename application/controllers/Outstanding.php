<?php
class Outstanding extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('OutstandingModel');
			$this->load->database();
		}
		
	}
	
	public function index(){
        $result=$this->OutstandingModel->CetakOutstanding();
		$data['outstanding']=$result['data'];

	/*	$result=$this->OutstandingModel->CetakSumOutstanding();
		$data['sumoutstanding']=$result['data'];*/

		$this->load->view('outstanding/v_cetakoutstanding', $data);
	}

}
?>