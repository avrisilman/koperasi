<?php
class Angsuran extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			$url=base_url();
			redirect($url);
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('Angsuranmodel');
			$this->load->database();
		}
		
	}
	public function index(){
		 $result=$this->Angsuranmodel->list_data();
		 $data['angsuran']=$result['data'];
	     $this->load->view('templat/v_header');
	     $this->load->view('angsuran/v_angsuran', $data);
	     $this->load->view('template/v_footer');
    
	}

	public function Input() {
		$data['ref_document_category'] = $this->Angsuranmodel->change_category();

		$data['type']="Input";
		 $this->load->view('templat/v_header');
	     $this->load->view('angsuran/v_angsuran', $data);
	     $this->load->view('template/v_footer');
	}

	function Post() {
		if($this->input->post('simpan')=="Save"){
			$this->addkas_model->input();
			redirect('amgsuran','refresh');
		}
		else if ($this->input->post('simpan')=="Update"){
			$id=$this->input->post('id');
			$this->addkas_model->edit($id);
			redirect('amgsuran','refresh');
		}
	}

	function edit(){
		$dl_code=$this->input->get('cs_info_download');
		$result=$this->Angsuranmodel->getEdit($dl_code);
		$data['cs_info_download']=$result['data'];
		
		$result=$this->Angsuranmodel->change_categoryedit();
		$data['angsuran']=$result['data'];

		$data['type']="Edit";
		 $this->load->view('templat/v_header');
	     $this->load->view('angsuran/v_angsuran', $data);
	     $this->load->view('template/v_footer');
	}

	public function Delete() {
		$dl_code=$this->input->get('cs_info_download');
		$this->Angsuranmodel->delete($dl_code);
		redirect('angsuran','refresh');
	}

}
?>