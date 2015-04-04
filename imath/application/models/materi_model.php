<?php
class materi_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	

	//Fungsi ini mengambil semua materi di kelas dipilih
	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('materi', array('idKelas' => $id))->result();
	}

	//Fungsi ini mengambil materi dengan id yang diinginkan	
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
	
	
	function delete($id){
		$this->load->database();		
		$this->db->delete('Materi', array('idMateri' => $id));
	}	
	
	function add($data){
		$this->db->insert('Materi', $data);
		return;
	}
	
	function update($data, $id){
		$this->load->database();
		$this->db->where('idMateri', $id);
		$this->db->update('Materi', $data);
	}
}
?>