<?php
class prestasi_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
		$this->load->database();
	}	
	
	function getSertifikat($username){
	    	$this->load->database();
		return $this->db->query('SELECT K.sertifikat, K.idKelas FROM Kelas K where K.idKelas in (Select S.idKelas from Sertifikat S where S.username = "'.$username.'")');
	}
	
	function getIdMateri($username){		
	    	$this->load->database();		
		return $this->db->get_where('medali', array('username' => $username));	
	}
		
}
?>