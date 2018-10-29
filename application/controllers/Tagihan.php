<?php
class Tagihan extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('TagihanModel');
			$this->load->database();
		}
		
	}
	
	function index(){
        $this->load->view('tagihan/v_tagihan');
	}

	function CetakTagihan(){
		$from = $this->input->post('from');
		$to   = $this->input->post('to');
		
		$result=$this->TagihanModel->CetakTagihan($from, $to);
		$data['tagihan']=$result['data'];

		$result=$this->TagihanModel->CetakSumTagihan($from, $to);
		$data['sumtagihan']=$result['data'];

		$this->load->view('tagihan/v_cetaktagihan', $data);
	}

}
?>