<?php
class Membersewa extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('Membersewamodel');
			$this->load->database();
			$this->load->library('pagination');
		}
		
	}
	
	public function index($Starting=0){
		$data['type']="index";
		$config['base_url'] = base_url().'nogl/index';
        $TotalRows = $this->Membersewamodel->record_count();
        $config['total_rows'] = $TotalRows;
        $config['per_page'] = 5; 
        $config['num_links'] = 5;
        $TotalRecord = $config['per_page'];
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config); 
        $data['Links'] = $this->pagination->create_links();
        $data['member_sewa'] = $this->Membersewamodel->fetch_data($Starting,$TotalRecord);
        $this->load->view('membersewa/v_membersewa',$data);
	}

	public function Input() {
		$data['type']="Save";
		$this->load->view('membersewa/v_input', $data);
	}

	public function search(){
		 $data['type']="Search";
		 $nama =  $this->input->post('nama');
		

		 $result=$this->Membersewamodel->search($nama);
		 $data['member_sewa']=$result['data'];

		 $result=$this->Membersewamodel->invoice($nama);
		 $data['invoice']=$result['data'];

		 $result=$this->Membersewamodel->pendapatan($nama);
		 $data['pendapatan']=$result['data'];

		 $this->load->view('membersewa/v_searchmembersewa', $data);
	}

	public function search_detail(){

		 $result=$this->Membersewamodel->search($this->session->userdata('nama'));
		 $data['member_sewa']=$result['data'];

		 $result=$this->Membersewamodel->invoice($this->session->userdata('nama'));
		 $data['invoice']=$result['data'];		 

		 $this->load->view('membersewa/v_searchmembersewa', $data);
	}

	function Post() {
		$no_sewa=$this->input->post('no_sewa');
		if($this->input->post('simpan')=="Save"){
			$this->Membersewamodel->input();
			redirect('membersewa','refresh');
		}
		else if ($this->input->post('simpan')=="Update"){
			$this->Membersewamodel->edit($no_sewa);
			redirect('membersewa','refresh');
		}elseif ($this->input->post('simpan')=="Input Invoice") {
			$this->session->set_userdata('nama',$no_sewa);
			$this->Membersewamodel->inputInvoice($no_sewa);
			redirect('membersewa/search_detail','refresh');
		}elseif ($this->input->post('simpan')=="Input Pendapatan") {
			$this->Membersewamodel->inputPendapatan();
			redirect('membersewa/search','refresh');
		}
	}

	function edit(){
		$no_sewa=$this->input->get('member_sewa');
		$result=$this->Membersewamodel->getEdit($no_sewa);
		$data['member_sewa']=$result['data'];
		$data['type']="Update";
		$this->load->view('membersewa/v_edit', $data);
	}

	function inputInvoice(){
		$no_sewa=$this->input->get('member_sewa');
		$data['nogl'] = $this->Membersewamodel->change_category();
		$result=$this->Membersewamodel->getEdit($no_sewa);
		$data['member_sewa']=$result['data'];

		$data['type']="Input Invoice";
		$this->load->view('membersewa/v_inputinvoice', $data);
	}

	function inputPendapatan(){
		$no_invoice=$this->input->get('invoice');
		$result=$this->Membersewamodel->getInvoice($no_invoice);
		$data['invoice']=$result['data'];

		$data['type']="Input Pendapatan";
		$this->load->view('membersewa/v_inputpendapatan', $data);
	}

	public function Delete() {
		$no_sewa=$this->input->get('member_sewa');
		$this->Membersewamodel->delete($no_sewa);
		redirect('membersewa','refresh');
	}

	public function Deleteinvoice() {
		$no_invoice=$this->input->get('invoice');
		$no_sewa = $this->session->userdata('no_sewa');
		$this->Membersewamodel->Deleteinvoice($no_invoice);
		redirect('membersewa/search','refresh');
	}

	public function DeletePendapatan() {
		$no_tran=$this->input->get('pendapatan');
		$this->Membersewamodel->DeletePendapatan($no_tran);
		redirect('membersewa/search','refresh');
	}

}
?>