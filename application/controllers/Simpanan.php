<?php
class Simpanan extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('Simpananmodel');
			$this->load->database();
			$this->load->library('pagination');
		}
		
	}
	
	public function index($Starting=0){
		$data['type']="index";
		$config['base_url'] = base_url().'simpananperdana/index';
        $TotalRows = $this->Simpananmodel->record_count();
        $config['total_rows'] = $TotalRows;
        $config['per_page'] = 3; 
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
        $data['angsuran'] = $this->Simpananmodel->fetch_data($Starting,$TotalRecord);
        $this->load->view('perdana/v_perdana',$data);
	}

/*	public function Input() {
		$data['type']="Save";
		$this->load->view('perdana/v_input', $data);
	}*/

	public function search(){
		 $data['type']="Search";
		 $nama =  $this->input->post('nama');
		 $result=$this->Simpananmodel->search($nama);
		 $data['angsuran']=$result['data'];
		 $this->load->view('perdana/v_perdana', $data);
	}

	function Post() {

		if($this->input->post('simpan')=="Save"){
			$this->Simpananmodel->input();
			$this->Simpananmodel->editmember($this->session->userdata('member_id'));
			redirect('member/search_detail','refresh');
		}
		else if ($this->input->post('simpan')=="Update"){
			$member_id=$this->input->post('member_id');
			$this->Simpananmodel->edit($member_id);
			redirect('simpananperdana','refresh');
		}
		
	}

	function edit(){
		$member_id=$this->input->get('angsuran');
		$result=$this->Simpananmodel->getEdit($member_id);
		$data['angsuran']=$result['data'];

		$data['type']="Update";
		$this->load->view('perdana/v_edit', $data);
	}

	public function Delete() {
		$member_id=$this->input->get('angsuran');
		$this->Simpananmodel->delete($member_id);
		redirect('member/search_detail','refresh');
	}

}
?>