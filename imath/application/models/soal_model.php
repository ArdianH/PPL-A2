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
		return $this->db->get_where('soal', array('idsoal' => $id))->result();
	}

	function delete($id){
		$this->load->database();		
		$this->db->delete('soal', array('idsoal' => $id));
	}
	
	function insert(){
		$this->load->database();
		$isTes = 'false';
		$this->db->query("insert into soal ( idKelas, idMateri, pertanyaan, jawaban, pembahasan, isTes, gambar) 
			values('$kelas', '$materi', '$pertanyaan', '$jawaban','$isTes', '$gambar')");
		$this->db->query("insert into pilihan_jawaban ( idSoal, pilihanGanda, deskripsi, gambarJawaban) 
			values('$id', 'a', 'optiona', 'gambara')");
		$this->db->query("insert into pilihan_jawaban ( idSoal, pilihanGanda, deskripsi, gambarJawaban) 
			values('$id', 'b', 'optionb', 'gambarb')");
		$this->db->query("insert into pilihan_jawaban ( idSoal, pilihanGanda, deskripsi, gambarJawaban) 
			values('$id', 'c', 'optionc', 'gambarc')");	
		$this->db->query("insert into pilihan_jawaban ( idSoal, pilihanGanda, deskripsi, gambarJawaban) 
			values('$id', 'd', 'optiond', 'gambard')");	
	}
	
	function add($data){
		$this->db->insert('soal', $data);
		$a = $this->db->insert_id();
		return $a;
	}
	
	function update($data, $id){
		$this->db->where('idsoal', $id);
		$this->db->update('soal', $data);
		return;		
	}
}
?>