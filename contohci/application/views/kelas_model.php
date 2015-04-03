<?php
class kelas_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	

	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('kelas', array('idKelas' => $id))->result();
	}
	
	//Fungsi ini mengambil semua target belajar
	function getAllKelas(){
	    	$this->load->database();

		return $this->db->get('kelas')->result();
	}
}
?>