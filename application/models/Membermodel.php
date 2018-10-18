<?php
class Membermodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url','form']);
	}

	function input() {
		$data=array(
		   'member_id'=>  $this->input->post('member_id'),
           'nama'=>  $this->input->post('nama'),
           'tglgabung'=>  date('Y-m-d H:i:s'),
           'lahir'=>  $this->input->post('lahir'),
           'tgllahir'=>  $this->input->post('tgllahir'),
           'sex'=>  $this->input->post('sex'),
           'dept'=>  $this->input->post('dept'),
           'pekerjaan'=>  $this->input->post('pekerjaan'),
           'alamat'=>  $this->input->post('alamat'),
           'hp'=>  $this->input->post('hp'),
           'email'=>  $this->input->post('email'),
           'aktif'=>  $this->input->post('aktif')
		);

		$this->db->insert('member',$data);
	}

	public function record_count() {
        return $this->db->count_all("member");
    }
    public function fetch_data($Starting,$TotalRecord) {
        $query = $this->db->query("SELECT * from member limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function search($nama){
		$qry  = "SELECT * from member where member_id like '%$nama%' or nama like '%$nama%'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function simpanan($nama){
		$qry  = "SELECT A.*, B.* from member A inner join angsuran B on A.member_id=B.member_id 
				 where A.member_id like '%$nama%' or A.nama like '%$nama%'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function cekmember($nama){
		$qry  = "SELECT A.*, B.* from member A join pinjaman B on A.member_id=B.member_id where A.nama like '%$nama%' or A.member_id like '%$nama%'";
		$query = $this->db->query($qry);
		if ($query->num_rows() > 0){
			redirect('pinjaman/input');
		}else{
			redirect('simpanan/input');
		}
	}


	function getEdit($member_id){
		$qry  = "SELECT * from member where member_id='$member_id'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($member_id) {
		$data=array(
		   'member_id'=>  $this->input->post('member_id'),
           'nama'=>  $this->input->post('nama'),
           'tglgabung'=>  date('Y-m-d H:i:s'),
           'lahir'=>  $this->input->post('lahir'),
           'tgllahir'=>  $this->input->post('tgllahir'),
           'sex'=>  $this->input->post('sex'),
           'dept'=>  $this->input->post('dept'),
           'pekerjaan'=>  $this->input->post('pekerjaan'),
           'alamat'=>  $this->input->post('alamat'),
           'hp'=>  $this->input->post('hp'),
           'email'=>  $this->input->post('email'),
           'aktif'=>  $this->input->post('aktif')
		);
		$this->db->where('member_id',$member_id);
		$this->db->update('member',$data);
	}

	function delete($member_id){
		$this->db->where('member_id',$member_id);
		$this->db->delete('member');
	}

}
?>