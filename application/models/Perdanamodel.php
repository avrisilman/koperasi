<?php
class Perdanamodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function input() {
		$data=array(
			'member_id' 		=> $this->input->post('member_id'),
			'tanggalangs' 		=> date('Y-m-d H:i:s'),
			'simpokok' 			=> $this->input->post('simpokok'),
			'simwajib' 			=> $this->input->post('simwajib'),
			'simrela' 			=> $this->input->post('simrela'),
			'status' 			=> $this->input->post('status')
		);

		$this->db->insert('angsuran',$data);
	}

	public function record_count() {
		return $this->db->count_all("angsuran");
    }
    public function fetch_data($Starting,$TotalRecord) {
        $query = $this->db->query("SELECT A.*, B.* from member A inner join angsuran B ON A.member_id=B.member_id where B.no_pinjam='0' limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function search($nama){
		$qry  = "SELECT A.*, B.* from member A inner join angsuran B ON A.member_id=B.member_id where B.no_pinjam='0' and A.nama='%$nama%' ";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function getEdit($member_id){
		$qry  = "SELECT * from angsuran where member_id='$member_id'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($member_id) {
		$data=array(
			'member_id' 		=> $this->input->post('member_id'),
			'tanggalangs' 		=> date('Y-m-d H:i:s'),
			'simpokok' 			=> $this->input->post('simpokok'),
			'simwajib' 			=> $this->input->post('simwajib'),
			'simrela' 			=> $this->input->post('simrela'),
			'status' 			=> $this->input->post('status')
		);
		$this->db->where('member_id',$member_id);
		$this->db->update('angsuran',$data);
	}

	function delete($member_id){
		$this->db->where('member_id',$member_id);
		$this->db->delete('angsuran');
	}

}
?>