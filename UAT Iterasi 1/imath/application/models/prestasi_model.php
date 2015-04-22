<?php
class prestasi_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
		$this->load->database();
	}	
	
	function getSertifikatById($username, $kelas){		
		return;
	}
	
	function getMedaliByIdKelas($username, $kelas){
		return $this->db->get('medali');
	}
	
	function getIdMateri($username){		
	    	$this->load->database();		
		return $this->db->get_where('medali', array('username' => $username));	
	}
		
}
?>