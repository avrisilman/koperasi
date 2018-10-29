<?php
class Pengeluaranmodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function record_count() {
        return $this->db->count_all("uangkeluar");
    }

    function fetch_data($Starting,$TotalRecord) {
        $query = $this->db->query("SELECT * from uangkeluar limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function change_category() {
		$data = array();
        $query = $this->db->get('nogl');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
	}

	function change_categoryedit() {
		$qry  = " SELECT * from nogl";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function input() {
		$data=array(
		   'nama'		=>  $this->input->post('nama'),
           'tanggal'	=> 	date('Y-m-d H:i:s'),
           'nogl'		=>  $this->input->post('nogl'),
           'jml_bayar'	=>  $this->input->post('jml_bayar'),
           'ket'		=>  $this->input->post('ket')
		);

		$this->db->insert('uangkeluar',$data);
	}

	function search($nama){
		$qry  = "SELECT * from uangkeluar where nama like '%$nama%' or nogl like '%$nama%' ";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function getEdit($no_tran){
		$qry  = "SELECT * from uangkeluar where no_tran='$no_tran'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($no_tran) {
		$data=array(
		   'nama'		=>  $this->input->post('nama'),
           'tanggal'	=> 	date('Y-m-d H:i:s'),
           'nogl'		=>  $this->input->post('nogl'),
           'jml_bayar'	=>  $this->input->post('jml_bayar'),
           'ket'		=>  $this->input->post('ket')
		);
		$this->db->where('no_tran',$no_tran);
		$this->db->update('uangkeluar',$data);
	}

	function delete($no_tran){
		$this->db->where('no_tran',$no_tran);
		$this->db->delete('uangkeluar');
	}

	function CetakPengeluaran($no_tran){
		$qry  = "SELECT * from uangkeluar WHERE no_tran='$no_tran'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

}
?>