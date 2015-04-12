<?php
class soal_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	//Fungsi ini mengambil semua soal di kelas dipilih
	function getAllSoal($idMateri){
    	$this->load->database();
    	return $this->db->get_where('soal', array('idMateri' => $idMateri))->result();
	}

	//Fungsi ini mengambil soal dengan id yang diinginkan
	function get($id){
    	$this->load->database();
		return $this->db->get_where('soal', array('idSoal' => $id))->result();
	}
	function getPilihanJawaban($id){
    	$this->load->database();
		return $this->db->get_where('pilihan_jawaban', array('idSoal' => $id))->result();
	}

	function delete($id){
		$this->load->database();		
		$this->db->delete('soal', array('idSoal' => $id));
		$this->db->delete('pilihan_jawaban', array('idSoal' => $id));
	}
		
	function add($data){
		$this->db->insert('soal', $data);
		$a = $this->db->insert_id();
		return $a;
	}
	
	function update($data, $id){
		$this->db->where('idsoal', $id);
		$this->db->update('soal', $data);		
	}

	function updateJawaban($data, $id, $pilihanGanda){
		$this->db->where('idsoal', $id);
		$this->db->where('pilihanGanda', $pilihanGanda);
		$this->db->update('pilihan_jawaban', $data);		
	}
}
?>