<?php
class Angsuranmodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function list_data() {
		$qry  = "SELECT A.*, B.* FROM pinjaman A INNER JOIN member B on A.member_id=B.member_id where B.aktif='aktif'";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		return $result;
	}

	function input($upload) {
		$data=array(
			'dl_code' 			=> $this->input->post('dl_code'),
			'dl_name' 			=> $this->input->post('dl_name'),
			'dl_description' 	=> $this->input->post('dl_description'),
			'dl_category_code' 	=> $this->input->post('dl_category_code'),
			'dl_file' 			=> $upload['file']['file_name'],
			'dl_status' 		=> $this->input->post('dl_status'),
			'create_user' 		=> $this->session->userdata('user_id'),
			'create_date' 		=> date('Y-m-d H:i:s')
		);

		$this->db->insert('cs_info_download',$data);
	}


	function inputnonupload() {
		$data=array(
			'dl_code' 			=> $this->input->post('dl_code'),
			'dl_name' 			=> $this->input->post('dl_name'),
			'dl_description' 	=> $this->input->post('dl_description'),
			'dl_category_code' 	=> $this->input->post('dl_category_code'),
			'dl_status' 		=> $this->input->post('dl_status'),
			'create_user' 		=> $this->session->userdata('user_id'),
			'create_date' 		=> date('Y-m-d H:i:s')
		);

		$this->db->insert('cs_info_download',$data);
	}

	function getEdit($dl_code){
		$qry  = "SELECT a.dl_code, a.dl_name, a.dl_description, a.dl_category_code, a.dl_file,
					CASE a.dl_status 
							when 'Y' then 'ACTIVE' 
							when 'N' then 'INACTIVE' 
							END AS dl_status,
						CASE a.dl_status 
							when 'Y' then 'Y' 
							when 'N' then 'N' 
							END AS dl_statuse,
							a.create_user, a.create_date,
							b.category_name
					FROM cs_info_download a JOIN ref_document_category b on b.category_code = a.dl_category_code
					WHERE a.dl_code='$dl_code'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		return $result;
	}

	function editnonupload($dl_code) {
		$data=array(
			'dl_code' 			=> $this->input->post('dl_code'),
			'dl_name' 			=> $this->input->post('dl_name'),
			'dl_description' 	=> $this->input->post('dl_description'),
			'dl_status' 		=> $this->input->post('dl_status'),
			'dl_category_code' 	=> $this->input->post('dl_category_code'),
			'modify_user' 		=> $this->session->userdata('user_id'),
			'modify_date' 		=> date('Y-m-d H:i:s')
		);
		$this->db->where('dl_code',$dl_code);
		$this->db->update('cs_info_download',$data);
	}

	function delete($dl_code){
		$this->db->where('dl_code',$dl_code);
		$this->db->delete('cs_info_download');
	}

}
?>