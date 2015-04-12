<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Latihan_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function getIdSoalTes($kelas)
	{
		$dataDB = $this->db->query("SELECT idSoal FROM soal WHERE idKelas = '".$kelas."'");
		return $dataDB;
	}
	
		function getAllMateri(){
	    $this->load->database();
		return $this->db->get_where('materi', array('idMateri' => $kelas))->result();
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
	
	// 
	function add($data){
		$this->db->insert('catatan_latihan', $data);
		return;
	}
	
	
	public function getSoalTes($kelas)
	{
		$dataDB = $this->db->get_where('soal', array('idKelas' => $kelas, 'isTes' => "latihan", 'isDitunjukkan' => "Ya"));
		return $dataDB;
	}
	
}