<?php
class addkas_model extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
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
		return $result;
	}

	function input() {
		$data=array(
			'tanggal' 			=> date('Y-m-d H:i:s'),
			'nogl' 				=> $this->input->post('nogl'),
			'jumlah' 			=> $this->input->post('jumlah')
		);

		$this->db->insert('kas',$data);
	}

	public function record_count() {
        return $this->db->count_all("kas");
    }
    public function fetch_data($Starting,$TotalRecord) {
        $query = $this->db->query("SELECT * from kas limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function search($nama){
		$qry  = "SELECT * from kas where nama='$nama'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function getEdit($id){
		$qry  = "SELECT * from kas where id='$id'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($id) {
		$data=array(
			'tanggal' 			=> date('Y-m-d H:i:s'),
			'nogl' 				=> $this->input->post('nogl'),
			'jumlah' 			=> $this->input->post('jumlah')
		);
		$this->db->where('id',$id);
		$this->db->update('kas',$data);
	}

	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('kas');
	}

}
?>