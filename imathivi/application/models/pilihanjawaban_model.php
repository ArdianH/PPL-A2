<?php
class pilihanjawaban_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	//Fungsi ini mengambil semua soal di kelas dipilih
	function getAllPilihanJawaban($idSoal){
    	$this->load->database();
    	$this->db->get_where('pilihan_jawaban', array('idSoal' => $idSoal))->result();
    	return $result;
	}

	//Fungsi ini mengambil soal dengan id yang diinginkan
	function get($id, $pilihanGanda){
    	$this->load->database();
		return $this->db->get_where('pilihan_jawaban', array('idSoal' => $id, 'pilihanGanda' => $pilihanGanda))->result();
	}

	function delete($idSoal){
		$this->load->database();		
		$this->db->delete('pilihanGanda', array('idSoal' => $idSoal));
		return;
	}
	
	function add($data){
		$this->db->insert_batch('pilihan_jawaban', $data);
	}

	function update($data, $idSoal){
		$this->db->update_batch('pilihan_jawaban', $data, 'pilihanGanda');
		return;
	}
}
?>