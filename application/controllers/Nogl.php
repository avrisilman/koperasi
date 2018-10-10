<?php
class Nogl extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('nogl_model');
			$this->load->database();
			$this->load->library('pagination');
		}
		
	}
	
	public function index($Starting=0){
		$data['type']="index";
		$config['base_url'] = base_url().'nogl/index';
        $TotalRows = $this->nogl_model->record_count();
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
        $data['nogl'] = $this->nogl_model->fetch_data($Starting,$TotalRecord);
        $this->load->view('nogl/v_nogl',$data);
	}

	public function Input() {
		$data['type']="Save";
		$this->load->view('nogl/v_input', $data);
	}

	public function search(){
		 $data['type']="Search";
		 $nama =  $this->input->post('nama');
		 $result=$this->nogl_model->search($nama);
		 $data['nogl']=$result['data'];
		 $this->load->view('nogl/v_nogl', $data);
	}

	function Post() {
		if($this->input->post('simpan')=="Save"){
			$this->nogl_model->input();
			redirect('nogl','refresh');
		
		}
		else if ($this->input->post('simpan')=="Update"){
			$id=$this->input->post('id');
			$this->nogl_model->edit($id);
			redirect('nogl','refresh');
		}
	}

	function edit(){
		$id=$this->input->get('nogl');
		$result=$this->nogl_model->getEdit($id);
		$data['nogl']=$result['data'];

		$data['type']="Update";
		$this->load->view('nogl/v_edit', $data);
	}

	public function Delete() {
		$id=$this->input->get('nogl');
		$this->nogl_model->delete($id);
		redirect('nogl','refresh');
	}

}
?>