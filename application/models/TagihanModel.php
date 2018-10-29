<?php
class TagihanModel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url','form']);
	}

	function CetakTagihan($from, $to){
		$qry  = "SELECT A.member_id, A.nama, A.dept, A.hp, C.tanggalangs,
					   B.jenis_pinjaman, B.jmlpinjaman, B.jenis_pinjaman,
					   C.angpinjam, C.simwajib, C.simrela, C.angpinjam, C.jasapinjam, C.tanggalangs, C.status 
			from member A INNER JOIN pinjaman B ON A.member_id=B.member_id INNER JOIN angsuran C ON B.member_id=C.member_id and B.no_pinjam=C.no_pinjam where C.tanggalangs between '$from' and '$to'";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function CetakSumTagihan($from, $to){
		$qry  = "SELECT SUM(C.simwajib) as sw, SUM(C.simrela) as sr, SUM(C.angpinjam) as angp, SUM(C.jasapinjam), SUM(C.jasapinjam) as jasa 
			from member A INNER JOIN pinjaman B ON A.member_id=B.member_id INNER JOIN angsuran C ON B.member_id=C.member_id and B.no_pinjam=C.no_pinjam where C.tanggalangs between '$from' and '$to'";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

}
?>