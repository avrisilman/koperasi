<?php
class Membersewamodel extends CI_Model{
	
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

	function input() {
		$data=array(
			'no_sewa' 			=> $this->input->post('no_sewa'),
			'nama' 				=> $this->input->post('nama'),
			'deposit' 			=> $this->input->post('deposit')
		);

		$this->db->insert('member_sewa',$data);
	}

	function inputInvoice() {
		$data=array(
			'no_sewa' 			=> $this->input->post('no_sewa'),
			'nogl' 			=> $this->input->post('nogl'),
			'nilai' 			=> $this->input->post('nilai'),
			'tglinvoice'		=> date('Y-m-d H:i:s')
		);

		$this->db->insert('invoice',$data);
	}

	function inputPendapatan() {
		$data=array(
		   'no_invoice'	=>  $this->input->post('no_invoice'),
           'tanggal'	=>  date('Y-m-d H:i:s'),
           'jml_bayar'	=>  $this->input->post('jml_bayar'),
           'adm'		=>  $this->input->post('adm'),
           'air'		=>  $this->input->post('air'),
           'sampah'		=>  $this->input->post('sampah'),
           'denda'		=>  $this->input->post('denda'),
           'ket'		=>  $this->input->post('ket')
		);

		$this->db->insert('pendapatan',$data);
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
		$qry  = "SELECT * from member_sewa where no_sewa like '%$nama%' or nama like '%$nama%'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function invoice($nama){
		$qry  = "SELECT A.*, B.* from member_sewa A join invoice B on A.no_sewa=B.no_sewa where A.no_sewa like '%$nama%' or A.nama like '%$nama%'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function pendapatan($nama){
		$qry  = "SELECT A.*, B.*, C.* from member_sewa A join invoice B on A.no_sewa=B.no_sewa join pendapatan C on B.no_invoice=C.no_invoice
		 		 where A.no_sewa like '%$nama%' or A.nama like '%$nama%'";

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

	function getInvoice($no_invoice){
		$qry  = "SELECT * from invoice where no_invoice='$no_invoice'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
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

	function Deleteinvoice($no_invoice){
		$this->db->where('no_invoice',$no_invoice);
		$this->db->delete('invoice');
	}

	function DeletePendapatan($no_tran){
		$this->db->where('no_tran',$no_tran);
		$this->db->delete('pendapatan');
	}

}
?>