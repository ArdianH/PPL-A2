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
	
	function getIdRapor($username){
	    $this->load->database();	    			
		return $this->db->get_where('rapor', array('username' => $username));
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
	
	function getCatatanLatihan($id, $idKelas, $idMateri) {
		return $this->db->get_where('catatan_latihan', array ('idRapor'=>$id, 'idMateri'=>$idMateri, 'idKelas'=>$idKelas))->result();
	}
	
	function deleteHistory($id, $idKelas, $idMateri){
		$this->load->database();
		//$selesai = 'tercapai';
		$this->db->delete('catatan_latihan',array ('idRapor'=>$id, 'idMateri'=>$idMateri, 'idKelas'=>$idKelas));
	}
}
?>