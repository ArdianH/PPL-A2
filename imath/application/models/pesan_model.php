<?php
class pesan_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	function getAllPesan(){
	    	$this->load->database();
	    	return $this->db->get('Pesan')->result();
	}
	function delete($id){
		$this->load->database();		
		$this->db->delete('pesan', array('idPesan' => $id));
	}
}
?>