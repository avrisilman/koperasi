<?php
class Kas extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('Kasmodel');
			$this->load->database();
			$this->load->library('pagination');
		}
		
	}
	
	public function index($Starting=0){
		$data['type']="index";
		$config['base_url'] = base_url().'kas/index';
        $TotalRows = $this->Kasmodel->record_count();
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
        $data['kas'] = $this->Kasmodel->fetch_data($Starting,$TotalRecord);
        $this->load->view('kas/v_kas',$data);
	}

	public function Input() {
		$data['type']="Save";
		$data['nogl'] = $this->Kasmodel->change_category();
		$this->load->view('kas/v_input', $data);
	}

	public function search(){
		$from = $this->input->post('from');
		$to   = $this->input->post('to'); 
		$fromshu = $this->input->post('fromshu');
		$toshu   = $this->input->post('toshu'); 

		if($this->input->post('search')=="Laba Rugi"){
			$result=$this->Kasmodel->labarugi($from, $to);
		 	$data['labarugi']=$result['data'];
		 	$this->load->view('kas/v_labarugi', $data);
		}else if($this->input->post('search')=="Neraca"){
			$result=$this->Kasmodel->neraca($from, $to, $fromshu, $toshu);
		 	$data['neraca']=$result['data'];
		 	$this->load->view('kas/v_neraca', $data);
		}else if($this->input->post('search')=="SHU") {
			
		}
	}

	function Post() {
		if($this->input->post('simpan')=="Save"){
			$this->Kasmodel->input();
			redirect('kas','refresh');
		
		}
		else if ($this->input->post('simpan')=="Update"){
			$id=$this->input->post('id');
			$this->Kasmodel->edit($id);
			redirect('kas','refresh');
		}
	}

	function edit(){
		$id=$this->input->get('kas');
		$result=$this->Kasmodel->getEdit($id);
		$data['kas']=$result['data'];

		$result=$this->Kasmodel->change_categoryedit();
		$data['nogl']=$result['data'];

		$data['type']="Update";
		$this->load->view('kas/v_edit', $data);
	}

	public function Delete() {
		$id=$this->input->get('kas');
		$this->Kasmodel->delete($id);
		redirect('kas','refresh');
	}

}
?>