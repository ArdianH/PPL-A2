<?php
class soal_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	//Fungsi ini mengambil semua soal di kelas dipilih
	function getAllsoal($idMateri, $idKelas){
	    	$this->load->database();
	    	return $this->db->get_where('soal', array('idMateri' => $idMateri && 'idKelas' => $idKelas))->result();
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
		$kelas = $_POST['kelas'];
		$materi = $_POST['materi'];
		$pertanyaan = $_POST['pertanyaan'];
		$optiona = $_POST['optiona'];
		$gambara = $_POST['gambara'];
		$optionb = $_POST['optionb'];
		$gambarb = $_POST['gambarb'];
		$optionc = $_POST['optionc'];
		$gambarc = $_POST['gambarc'];
		$optiond = $_POST['optiond'];
		$gambard = $_POST['gambard'];
		$jawaban = $_POST['jawaban'];
		$pembahasan = $_POST['pembahasan'];
		$gambar = $_POST['gambar'];		
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
		return;
	}
	
	function update($data, $id){
		$this->db->where('idsoal', $id);
		$this->db->update('soal', $data);
	}
}
?>