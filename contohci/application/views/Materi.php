<?php
class Materi extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	//Fungsi ini mengambil semua target belajar
	function getAllMateri($idkelas){
	    	$this->load->database();
	    	return $this->db->get_where('materi', array('idKelas' => $idkelas))->result();
	}
}
?>