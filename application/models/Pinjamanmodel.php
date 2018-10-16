<?php
class Pinjamanmodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function input() {
		$data=array(
			'member_id' 		=> $this->input->post('member_id'),
			'tanggal' 			=> date('Y-m-d H:i:s'),
			'jenis_pinjaman' 	=> $this->input->post('jenis_pinjaman'),
			'jmlpinjaman' 		=> $this->input->post('jmlpinjaman'),
			'bunga' 			=> $this->input->post('bunga'),
			'tenor' 			=> $this->input->post('tenor')
		);

		$datas=array(
			'statuspinjaman' 		=> "1"
		);

		$this->db->where('member_id', $this->session->userdata('member_id'));
		$this->db->update('member',$datas);

		$this->db->insert('pinjaman',$data);
	}

	public function record_count() {
        return $this->db->count_all("pinjaman");
    }
    public function fetch_data($Starting,$TotalRecord) {
        $query = $this->db->query("SELECT A.*, B.* from member A join pinjaman B on A.member_id=B.member_id limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function search($nama){
		$qry  = "SELECT A.*, B.* from member A join pinjaman B on A.member_id=B.member_id where A.nama like '%$nama%' or A.member_id like '%$nama%' ";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function search_angsuran($nama){
		$qry  = "SELECT A.*, B.*, C.* from member A 
				INNER JOIN pinjaman B on A.member_id=B.member_id
				INNER JOIN angsuran C on B.no_pinjam=C.no_pinjam WHERE A.nama like '%$nama%'  or A.member_id like '%$nama%' ";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		return $result;
	}

	function withdrawal($nama){
		$qry  = "SELECT A.member_id, A.nama, B.id_keluar, B.tanggal, B.simpokok , B.simwajib, B.simrela from member A join pengeluaran B on A.member_id=B.member_id where A.nama like '%$nama%' or B.member_id like '%$nama%' ";
		$query = $this->db->query($qry); 
		//echo nl2br($qry);die();
		$result['data']=$query->result();
		return $result;
	}

	function sum_angsuran($nama){
		$qry  = "SELECT sum(C.angpinjam) as angpinjam, sum(C.jasapinjam) as jasapinjam, sum(C.simpokok) as simpokok,
				 sum(C.simwajib) as simwajib, sum(C.simrela) as simrela
				FROM member A 
				INNER JOIN pinjaman B on A.member_id=B.member_id
				INNER JOIN angsuran C on B.no_pinjam=C.no_pinjam WHERE A.nama like '%$nama%'  or A.member_id like '%$nama%' ";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		return $result;
	}

	function sum_withdrawal($nama){
		$qry  = "SELECT sum(B.simpokok) as wpokok , sum(B.simwajib) as wwajib, sum(B.simrela) as wrela from member A join pengeluaran B on A.member_id=B.member_id where A.nama like '%$nama%' or B.member_id like '%$nama%'";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		return $result;
	}

	function getEdit($no_pinjam){
		$qry  = "SELECT * from pinjaman where no_pinjam='$no_pinjam'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function getmember($member_id){
		$qry  = "SELECT * from member where member_id='$member_id'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($no_pinjam) {
		$data=array(
			'member_id' 		=> $this->input->post('member_id'),
			'tanggal' 			=> date('Y-m-d H:i:s'),
			'jenis_pinjaman' 	=> $this->input->post('jenis_pinjaman'),
			'jmlpinjaman' 		=> $this->input->post('jmlpinjaman'),
			'bunga' 			=> $this->input->post('bunga'),
			'tenor' 			=> $this->input->post('tenor')
		);
		$this->db->where('no_pinjam',$no_pinjam);
		$this->db->update('pinjaman',$data);
	}

	function angsuran() {
		$data=array(
		   'no_pinjam'=>  $this->input->post('no_pinjam'),
           'member_id'=>  $this->input->post('member_id'),
           'tanggalangs'=>  date('Y-m-d H:i:s'),
           'simwajib'=>  $this->input->post('simwajib'),
           'simrela'=>  $this->input->post('simrela'),
           'angpinjam'=>  $this->input->post('angpinjam'),
           'jasapinjam'=>  $this->input->post('jasapinjam'),
           'denda'=>  $this->input->post('denda'),
           'lain'=>  $this->input->post('lain'),
           'ket'=>  $this->input->post('ket'),
           'hari_terlambat'=>  $this->input->post('hari_terlambat'),
           'status'=>  $this->input->post('status')
		);
		$this->db->insert('angsuran',$data);
	}

	function inputwitdrawal() {
		$data=array(
		   'member_id'=>  $this->input->post('member_id'),
           'tanggal'=>  date('Y-m-d H:i:s'),
           'simpokok'=>  $this->input->post('simpokok'),
           'simwajib'=>  $this->input->post('simwajib'),
           'simrela'=>  $this->input->post('simrela'),
           'ket'=>  $this->input->post('ket')
		);
		$this->db->insert('pengeluaran',$data);
	}

	function deletepinjam($member_id){
		$this->db->where('member_id',$member_id);
		$this->db->delete('pinjaman');
	}

	function deletangs($member_id){
		$this->db->where('member_id',$member_id);
		$this->db->delete('angsuran');
	}

	function deletpenarikan($member_id){
		$this->db->where('member_id',$member_id);
		$this->db->delete('pengeluaran');
	}

	function Deleteangsuran($no_tran){
		$this->db->where('no_tran',$no_tran);
		$this->db->delete('angsuran');
	}

	function Deletewithdrawal($id_keluar){
		$this->db->where('id_keluar',$id_keluar);
		$this->db->delete('pengeluaran');
	}

}
?>