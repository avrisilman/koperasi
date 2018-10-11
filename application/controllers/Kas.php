<?php
class Kas extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('addkas_model');
			$this->load->database();
			$this->load->library('pagination');
		}
		
	}
	
	public function index($Starting=0){
		$data['type']="index";
		$config['base_url'] = base_url().'kas/index';
        $TotalRows = $this->addkas_model->record_count();
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
        $data['kas'] = $this->addkas_model->fetch_data($Starting,$TotalRecord);
        $this->load->view('kas/v_kas',$data);
	}

	public function Input() {
		$data['type']="Save";
		$data['nogl'] = $this->addkas_model->change_category();
		$this->load->view('kas/v_input', $data);
	}

	public function search(){
		 $data['type']="Search";
		 $nama =  $this->input->post('nama');
		 $result=$this->addkas_model->search($nama);
		 $data['kas']=$result['data'];
		 $this->load->view('kas/v_nogl', $data);
	}

	function Post() {
		if($this->input->post('simpan')=="Save"){
			$this->addkas_model->input();
			redirect('kas','refresh');
		
		}
		else if ($this->input->post('simpan')=="Update"){
			$id=$this->input->post('id');
			$this->addkas_model->edit($id);
			redirect('kas','refresh');
		}
	}

	function edit(){
		$id=$this->input->get('kas');
		$result=$this->addkas_model->getEdit($id);
		$data['kas']=$result['data'];

		$result=$this->addkas_model->change_categoryedit();
		$data['nogl']=$result['data'];

		$data['type']="Update";
		$this->load->view('kas/v_edit', $data);
	}

	public function Delete() {
		$id=$this->input->get('kas');
		$this->addkas_model->delete($id);
		redirect('kas','refresh');
	}

}
?>