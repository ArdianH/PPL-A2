<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Latihan_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function getIdSoalTes($kelas)
	{
		$dataDB = $this->db->query("SELECT idSoal FROM soal WHERE idMateri = '".$kelas."'");
		return $dataDB;
	}
	
	function getAllMateri(){
	    $this->load->database();
		return $this->db->get_where('materi', array('idMateri' => $kelas))->result();
	}
	
		public function getIdKelas($kelas)
	{
		$dataDB = $this->db->query("SELECT idKelas FROM soal WHERE idMateri = '".$kelas."'");
		return $dataDB;
	}	
	
	public function getSatuSoalTes($idSoal)
	{
		$dataDB = $this->db->get_where('soal', array('idSoal' => $idSoal));
		return $dataDB;
	}

	public function getJawabanSoalTes($idSoal)
	{
		$dataDB = $this->db->get_where('pilihan_jawaban', array('idSoal' => $idSoal));
		return $dataDB;
	}
		
	public function getIdRapor($username)
	{
		$dataDB = $this->db->query("SELECT idRapor FROM rapor WHERE username = '".$username."'");
		return $dataDB;
	}	
	// 
	function add($dataToDB){
		$res = $this->db->insert('catatan_latihan', $dataToDB);
		return $res;
	}
	
	function addMedali($username, $idMateri){
		$res = $this->db->insert('medali', array('username' => $username, 'idMateri' => $idMateri));
		return $res;
	}
	
	
	public function getSoalTes($kelas)
	{
		$dataDB = $this->db->get_where('soal', array('idKelas' => $kelas, 'isTes' => "latihan", 'isDitunjukkan' => "Ya"));
		return $dataDB;
	}

	public function getNamaMateri($idSoal)
	{
		$dataDB = $this->db->query('SELECT nama FROM materi WHERE idMateri in(SELECT idMateri FROM soal WHERE idSoal = ?)', array($idSoal));
		//$dataDB = $this->db->get_where('soal', array('idKelas' => $kelas, 'isTes' => "latihan", 'isDitunjukkan' => "Ya"));
		return $dataDB;
		
	}
	
}