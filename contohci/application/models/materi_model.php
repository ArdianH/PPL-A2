<?php
class materi_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('materi', array('idKelas' => $id))->result();
	}
	
	function getAllMateri($idMateri){
	    	$this->load->database();

		return $this->db->get_where('materi', array('idMateri' => $idMateri))->result();
	}
	
	function getAllSoal($idSoal){
	    	$this->load->database();

		return $this->db->get_where('soal', array('idSoal' => $idSoal))->result();
	}
	
	function getAllJawaban($idSoal){
	    	$this->load->database();

		return $this->db->get_where('pilhan_jawaban', array('idSoal' => $idSoal))->hasil();
	}	
	
}
?>

