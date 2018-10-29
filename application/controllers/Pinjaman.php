<?php
class Pinjaman extends CI_controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('sukses') != TRUE){
			redirect('signin');
		}else{
			$this->load->helper(['url','form']);
			$this->load->model('Pinjamanmodel');
			$this->load->database();
			$this->load->library('pagination');
		}
		
	}
	
	public function index($Starting=0){
		$data['type']="index";
		$config['base_url'] = base_url().'nogl/index';
        $TotalRows = $this->Pinjamanmodel->record_count();
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
        $data['pinjaman'] = $this->Pinjamanmodel->fetch_data($Starting,$TotalRecord);
        $this->load->view('pinjaman/v_pinjaman',$data);
	}

	public function Input() {
		/*$member_id=$this->input->get('member');
		$this->session->set_userdata('member_id',$member_id);
	*/
		$data['type']="Save";
		$this->load->view('pinjaman/v_input', $data);
	}

	public function search(){

		 $data['type']="Search";
		 $nama =  $this->input->post('nama');
		 $result=$this->Pinjamanmodel->search($nama);
		 $data['pinjaman']=$result['data'];
		// $this->load->view('pinjaman/v_pinjaman', $data);
		 // angsuran
		 $result=$this->Pinjamanmodel->search_angsuran($nama);
		 $data['angsuran']=$result['data'];

		 $result=$this->Pinjamanmodel->perdana($nama);
		 $data['member']=$result['data'];
		 // withdrawal
		 $result=$this->Pinjamanmodel->withdrawal($nama);
		 $data['withdrawal']=$result['data'];
		 // sum total
		 $result=$this->Pinjamanmodel->sum_angsuran($nama);
		 $data['sum']=$result['data'];
		 // sum witdrawwal
		 $result=$this->Pinjamanmodel->sum_withdrawal($nama);
		 $data['sum_withdrawal']=$result['data'];
		 $this->load->view('pinjaman/v_angsuran', $data);

	}

	public function search_detail(){
		 $nama =  $this->session->userdata('member_id');
		 //echo $nama;
		 $result=$this->Pinjamanmodel->search($nama);
		 $data['pinjaman']=$result['data'];
		// $this->load->view('pinjaman/v_pinjaman', $data);
		 // angsuran
		 $result=$this->Pinjamanmodel->search_angsuran($nama);
		 $data['angsuran']=$result['data'];

		 $result=$this->Pinjamanmodel->perdana($nama);
		 $data['member']=$result['data'];
		 // withdrawal
		 $result=$this->Pinjamanmodel->withdrawal($nama);
		 $data['withdrawal']=$result['data'];
		 // sum total
		 $result=$this->Pinjamanmodel->sum_angsuran($nama);
		 $data['sum']=$result['data'];
		 // sum witdrawwal
		 $result=$this->Pinjamanmodel->sum_withdrawal($nama);
		 $data['sum_withdrawal']=$result['data'];
		 $this->load->view('pinjaman/v_angsuran', $data);

	}

	function Post() {
		if($this->input->post('simpan')=="Save"){
			$this->Pinjamanmodel->input();
			redirect('pinjaman/search_detail','refresh');
		}
		else if ($this->input->post('simpan')=="Update"){
			$no_pinjam=$this->input->post('no_pinjam');
			$this->Pinjamanmodel->edit($no_pinjam);
			redirect('pinjaman','refresh');
		} elseif ($this->input->post('simpan')=="Angsur") {
			$this->Pinjamanmodel->angsuran();
			redirect('pinjaman/search_detail','refresh');
		}elseif ($this->input->post('simpan')=="Input Pengeluaran") {
			$this->Pinjamanmodel->inputwitdrawal();
			redirect('pinjaman/search_detail','refresh');
		}
	}

	function angsuran(){
		$no_pinjam=$this->input->get('pinjaman');
		$result=$this->Pinjamanmodel->getEdit($no_pinjam);
		$data['pinjaman']=$result['data'];

		$data['type']="Angsur";
		$this->load->view('pinjaman/v_inputangsuran', $data);
	}

	function inputwitdrawal(){
		$member_id=$this->input->get('pinjaman');
		$this->session->set_userdata('member_id',$member_id);
		//echo $member_id;
		 $result=$this->Pinjamanmodel->getmember($member_id);
		 $data['member']=$result['data'];
		 $data['type']="Input Pengeluaran";
		 $this->load->view('pinjaman/v_inputwithdrawal', $data);
		
	}

	function edit(){
		$no_pinjam=$this->input->get('pinjaman');
		$result=$this->Pinjamanmodel->getEdit($no_pinjam);
		$data['pinjaman']=$result['data'];

		$data['type']="Update";
		$this->load->view('pinjaman/v_edit', $data);
	}

	public function Delete() {
		$member_id=$this->input->get('pinjaman');
		$this->Pinjamanmodel->deletepinjam($member_id);
		$this->Pinjamanmodel->deletangs($member_id);
		$this->Pinjamanmodel->deletpenarikan($member_id);
		redirect('pinjaman','refresh');
	}

	public function Deleteangsuran() {
		$id_keluar=$this->input->get('pinjaman');
		$this->Pinjamanmodel->Deleteangsuran($id_keluar);
		redirect('pinjaman/search_detail','refresh');
	}

	public function Deletewithdrawal() {
		$no_tran=$this->input->get('pinjaman');
		$this->Pinjamanmodel->Deletewithdrawal($no_tran);
		redirect('pinjaman/search_detail','refresh');
	}

	function CetakPinjaman(){
		$member_id=$this->input->get('pinjaman');
		$result=$this->Pinjamanmodel->CetakPinjaman($member_id);
		$data['pinjaman']=$result['data'];
		$this->load->view('pinjaman/v_cetakshortbypinjamanbulan', $data);
	}

	function CetakSimpanan(){
		$no_tran=$this->input->get('pinjaman');
		$result=$this->Pinjamanmodel->CetakSimpanan($no_tran);
		$data['simpanan']=$result['data'];
		$this->load->view('pinjaman/v_cetaksimpanan', $data);
	}

	function CetakPenarikan(){
		$id_keluar=$this->input->get('pinjaman');
		$result=$this->Pinjamanmodel->CetakPenarikan($id_keluar);
		$data['pengeluaran']=$result['data'];
		$this->load->view('pinjaman/v_cetakpengeluaran', $data);
	}


}
?>