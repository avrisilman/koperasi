<?php
class Pengeluaran extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('Pengeluaranmodel');
			$this->load->database();
			$this->load->library('pagination');
		}
	}
	
	public function index($Starting=0){
		$data['type']="index";
		$config['base_url'] = base_url().'Pengeluaran/index';
        $TotalRows = $this->Pengeluaranmodel->record_count();
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
        $data['uangkeluar'] = $this->Pengeluaranmodel->fetch_data($Starting,$TotalRecord);
        $this->load->view('pengeluaran/v_pengeluaran',$data);
	}

	public function Input() {
		$data['type']="Save";
		$data['nogl'] = $this->Pengeluaranmodel->change_category();
		$this->load->view('pengeluaran/v_input', $data);
	}

	public function search(){
		 $data['type']="Search";
		 $nama =  $this->input->post('nama');
		 $result=$this->Pengeluaranmodel->search($nama);
		 $data['uangkeluar']=$result['data'];
		 $this->load->view('pengeluaran/v_searchpengeluaran', $data);
	}

	function Post() {
		if($this->input->post('simpan')=="Save"){
			$this->Pengeluaranmodel->input();
			redirect('pengeluaran','refresh');
		
		}
		else if ($this->input->post('simpan')=="Update"){
			$no_tran=$this->input->post('no_tran');
			$this->Pengeluaranmodel->edit($no_tran);
			redirect('pengeluaran','refresh');
		}
	}

	function edit(){
		$no_tran=$this->input->get('pengeluaran');
		$result=$this->Pengeluaranmodel->getEdit($no_tran);
		$data['uangkeluar']=$result['data'];

		$result=$this->Pengeluaranmodel->change_categoryedit();
		$data['nogl']=$result['data'];

		$data['type']="Update";
		$this->load->view('pengeluaran/v_edit', $data);
	}

	public function Delete() {
		$no_tran = $this->input->get('pengeluaran');
		$this->Pengeluaranmodel->delete($no_tran);
		redirect('pengeluaran','refresh');
	}

}
?>