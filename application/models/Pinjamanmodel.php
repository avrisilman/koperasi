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
		$qry  = "SELECT A.*, B.* from member A join pinjaman B on A.member_id=B.member_id where A.nama like '%$nama%'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function getEdit($no_pinjam){
		$qry  = "SELECT * from pinjaman where no_pinjam='$no_pinjam'";

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

	function delete($no_pinjam){
		$this->db->where('no_pinjam',$no_pinjam);
		$this->db->delete('pinjaman');
	}

}
?>