<?php
class signin_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['url','form']);
	}

	 function post_signin($username, $password) {
        $qry  = "SELECT * FROM operator WHERE username='$username' AND password='$password' ";
        //echo nl2br($qry);die();
        $query = $this->db->query($qry);   
         

        if ($query->num_rows() > 0) {
             $data=$query->row_array();
        	 $this->session->set_userdata('sukses',TRUE);
             $this->session->set_userdata(array('username'=>$data['username']));
             $this->session->set_userdata(array('nama_lengkap'=>$data['nama_lengkap']));
        	 redirect('dashboard');
        }else{
        	 redirect('signin/invalid_signin');
        }

    }
}