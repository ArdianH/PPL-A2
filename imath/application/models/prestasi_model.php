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
	
	function getMedali($username, $idKelas){
	    	$this->load->database();		
		return $this->db->query(
		'SELECT M.idMateri, M.nama FROM Materi M where M.idMateri in
		(Select ME.idMateri from Medali ME where ME.username = "'.$username.'") and
		M.idKelas in
		(SELECT K.idKelas from Kelas K where K.idKelas = "'.$idKelas.'")');
	}
	
	
	function countMedali($username, $idMateri){
	    	$this->load->database();				
		return $this->db
			->where('username', $username)
			->where('idMateri', $idMateri)			
			->count_all_results('medali');
	}
	function deleteByMateri($idMateri){
		$this->load->database();		
		$this->db->delete('medali', array('idMateri' => $idMateri));
	}	
}
?>