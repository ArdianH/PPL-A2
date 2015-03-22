<?php
class Kelas extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	//Fungsi ini mengambil semua target belajar
	function getAllKelas(){
	    	$this->load->database();
	    	return $this->db->get('kelas')->result();		
	}
}
?>