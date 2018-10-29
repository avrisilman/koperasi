<?php
class OutstandingModel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url','form']);
	}

	function CetakOutstanding(){
		$qry  = "SELECT A.member_id, A.nama, A.dept, A.hp, C.tanggalangs, B.jenis_pinjaman, B.jmlpinjaman, B.jenis_pinjaman, B.tenor, B.bunga, C.angpinjam, C.simwajib, C.simrela, C.angpinjam, C.jasapinjam, C.tanggalangs, C.status from member A INNER JOIN pinjaman B ON A.member_id=B.member_id LEFT JOIN angsuran C ON B.member_id=C.member_id and B.no_pinjam=C.no_pinjam WHERE C.status IS NULL or C.status='Tidak'";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	

}
?>