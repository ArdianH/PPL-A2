<?php
class soal_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	//Fungsi ini mengambil semua soal di kelas dipilih
	function getAllSoalLatihan($idMateri){
    	$this->load->database();
    	return $this->db->get_where('soal', array('idMateri' => $idMateri, 'isTes' => 'latihan'))->result();
	}
	function getAllSoalTes($idKelas){
    	$this->load->database();
    	return $this->db->get_where('soal', array('idKelas' => $idKelas, 'isTes' => 'tes'))->result();
	}
	//Fungsi ini mengambil soal dengan id yang diinginkan
	function get($id){
    	$this->load->database();
		return $this->db->get_where('soal', array('idSoal' => $id))->result();
	}

	function getSoalByKelas($id){
		$this->load->database();
		return $this->db->get_where('soal', array('idKelas' => $id, 'isTes' => 'tes'));
	}

	function updateTes($tampilkanTes, $idSoal){
		$this->load->database();
		$this->db->set('isDitunjukkan', $tampilkanTes);
		$this->db->where('idsoal', $idSoal);
		$this->db->update('soal', $data);
	}
	function getPilihanJawaban($id){
    	$this->load->database();
		return $this->db->get_where('pilihan_jawaban', array('idSoal' => $id))->result();
	}

	function delete($id){
		$this->load->database();		
		$this->db->delete('pilihan_jawaban', array('idSoal' => $id));
		$this->db->delete('soal', array('idSoal' => $id));		
	}
		
	function add($data){
		$this->db->insert('soal', $data);
		$a = $this->db->insert_id();
		return $a;
	}
	
	function addJawaban($data){
		$this->db->insert('pilihan_jawaban', $data);
		$a = $this->db->insert_id();
		return $a;
	}
	
	function update($data, $id){
		$this->db->where('idsoal', $id);
		$this->db->update('soal', $data);
	}

	function updateJawaban($data,$pilihanGanda,$idSoal){
		$this->db->where('idSoal', $idSoal);
		$this->db->where('pilihanGanda', $pilihanGanda);
		$this->db->update('pilihan_jawaban', $data);		
	}
		
}
?>