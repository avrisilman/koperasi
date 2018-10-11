<?php
class Membersewamodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function input() {
		$data=array(
			'no_sewa' 			=> $this->input->post('no_sewa'),
			'nama' 			=> $this->input->post('nama'),
			'deposit' 			=> $this->input->post('deposit')
		);

		$this->db->insert('member_sewa',$data);
	}

	public function record_count() {
        return $this->db->count_all("member_sewa");
    }
    public function fetch_data($Starting,$TotalRecord) {
        $query = $this->db->query("SELECT * from member_sewa limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function search($nama){
		$qry  = "SELECT * from member_sewa where nama='$nama'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function getEdit($no_sewa){
		$qry  = "SELECT * from member_sewa where no_sewa='$no_sewa'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($no_sewa) {
		$data=array(
			'no_sewa' 			=> $this->input->post('no_sewa'),
			'nama' 			=> $this->input->post('nama'),
			'deposit' 			=> $this->input->post('deposit')
		);
		$this->db->where('no_sewa',$no_sewa);
		$this->db->update('member_sewa',$data);
	}

	function delete($no_sewa){
		$this->db->where('no_sewa',$no_sewa);
		$this->db->delete('member_sewa');
	}

}
?>