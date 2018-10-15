<?php
class nogl_model extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function input() {
		$data=array(
			'kode' 			=> $this->input->post('kode'),
			'nama' 			=> $this->input->post('nama')
		);

		$this->db->insert('nogl',$data);
	}

	public function record_count() {
        //return $this->db->count_all("nogl");
       $query = $this->db->query('SELECT * FROM nogl');  
		return $query->num_rows();
    }
    public function fetch_data($Starting,$TotalRecord) {
        $query = $this->db->query("SELECT * from nogl limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function search($nama){
		$qry  = "SELECT * from nogl where nama='$nama'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function getEdit($id){
		$qry  = "SELECT * from nogl where id='$id'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($id) {
		$data=array(
			'kode' 			=> $this->input->post('kode'),
			'nama' 			=> $this->input->post('nama')
		);
		$this->db->where('id',$id);
		$this->db->update('nogl',$data);
	}

	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('nogl');
	}

}
?>