<?php
class rapor_model extends CI_Model {
     //INDAH
	function __construct(){
		parent::__construct();
	}	
	
	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('rapor', array('idRapor' => $id))->result();
	}
	//Fungsi ini mengambil semua target belajar
	function getAllRapor(){
	    	$this->load->database();
	    	return $this->db->get('rapor')->result();		
	}
	
	function getRapor(){
	    	$this->load->database();
		return $this->db->get_where('rapor')->result();
	}
	

}
?>