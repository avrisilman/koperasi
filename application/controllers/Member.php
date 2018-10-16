<?php
class Member extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('member_model');
			$this->load->database();
			$this->load->library('pagination');
		}
		
	}
	
	public function index($Starting=0){
		$data['type']="index";
		$config['base_url'] = base_url().'member/index';
        $TotalRows = $this->member_model->record_count();
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
        $data['member'] = $this->member_model->fetch_data($Starting,$TotalRecord);
        $this->load->view('member/v_member',$data);
	}

	public function Input() {
		$data['type']="Save";
		$this->load->view('member/v_input', $data);
	}

	public function search(){
		 $data['type']="Search";
		 $nama =  $this->input->post('nama');
		 $result=$this->member_model->search($nama);
		 $data['member']=$result['data'];

		 $result=$this->member_model->simpanan($nama);
		 $data['angsuran']=$result['data'];

		 $this->load->view('member/v_searchmember', $data);
	}

	function Inputpinjaman(){
		$member_id = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$this->session->set_userdata('member_id',$member_id);
		$data['type']="Save";
		$this->load->view('pinjaman/v_input', $data);
	}

	function Inputsimpanan(){
		$member_id = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$this->session->set_userdata('member_id',$member_id);
		$data['type']="Save";
		$this->load->view('perdana/v_input', $data);
	}


	public function search_detail(){

		 $result=$this->member_model->search($this->session->userdata('member_id'));
		 $data['member']=$result['data'];

		 $result=$this->member_model->simpanan($this->session->userdata('member_id'));
		 $data['angsuran']=$result['data'];

		 $this->load->view('member/v_searchmember', $data);
	}

	function cekpinjaman(){
		$member_id=$this->input->get('member');
		$this->session->set_userdata('member_id',$member_id);
		$result=$this->member_model->cekmember($this->session->userdata('member_id'));
	}

	function Post() {
		if($this->input->post('simpan')=="Save"){
			$this->member_model->input();
			redirect('member','refresh');
		
		}
		else if ($this->input->post('simpan')=="Update"){
			$member_id=$this->input->post('member_id');
			$this->member_model->edit($member_id);
			redirect('member','refresh');
		}
	}

	function edit(){
		$member_id=$this->input->get('member');
		$result=$this->member_model->getEdit($member_id);
		$data['member']=$result['data'];

		$data['type']="Update";
		$this->load->view('member/v_edit', $data);
	}

	public function Delete() {
		$member_id=$this->input->get('member');
		$this->member_model->delete($member_id);
		redirect('member','refresh');
	}

}
?>