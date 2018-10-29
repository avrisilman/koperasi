<?php
class Pembelianmodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function record_count() {
        return $this->db->count_all("beli_aset");
    }

    function fetch_data($Starting,$TotalRecord) {
        $query = $this->db->query("SELECT * from beli_aset limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function input() {
		$data=array(
           'tgl_beli'=>  $this->input->post('tgl_beli'),
           'tgl_pakai'=>  $this->input->post('tgl_pakai'),
           'inventaris'=>  $this->input->post('inventaris'),
           'jml'=>  $this->input->post('jml'),
           'nominal'=>  $this->input->post('nominal'),
           'manfaat'=>  $this->input->post('manfaat'),
           'sisa_manfaat'=>  $this->input->post('sisa_manfaat'),
           'jenis'=>  $this->input->post('jenis')

		);

		$this->db->insert('beli_aset',$data);
	}

	function search($nama){
		$qry  = "SELECT * from beli_aset where inventaris like '%$nama%' or jenis like '%$nama%' ";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function getEdit($id){
		$qry  = "SELECT * from beli_aset where id='$id'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($id) {
		$data=array(
		   'tgl_beli'=>  $this->input->post('tgl_beli'),
           'tgl_pakai'=>  $this->input->post('tgl_pakai'),
           'inventaris'=>  $this->input->post('inventaris'),
           'jml'=>  $this->input->post('jml'),
           'nominal'=>  $this->input->post('nominal'),
           'manfaat'=>  $this->input->post('manfaat'),
           'sisa_manfaat'=>  $this->input->post('sisa_manfaat'),
           'jenis'=>  $this->input->post('jenis')
		);
		$this->db->where('id',$id);
		$this->db->update('beli_aset',$data);
	}

	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('beli_aset');
	}

	function CetakPembelianKantor($id){
		$qry  = "SELECT * from beli_aset where jenis='Inventaris Kantor'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function CetakPembelianKantin($id){
		$qry  = "SELECT * from beli_aset where jenis='Inventaris Kantin'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

}
?>