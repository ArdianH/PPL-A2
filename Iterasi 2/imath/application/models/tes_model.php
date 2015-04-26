<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tes_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function getIdSoalTes($kelas)
	{
		$dataDB = $this->db->query("SELECT idSoal FROM soal WHERE idKelas = '".$kelas."' AND isDitunjukkan = 'Ya' AND isTes='tes'");
		return $dataDB;
	}
	
	public function getSatuSoalTes($idSoal)
	{
		$dataDB = $this->db->get_where('soal', array('idSoal' => $idSoal));
		return $dataDB;
	}
	

	public function getSatuIdMateriTes($idSoal)
	{
		$dataDB = $this->db->query("SELECT idMateri FROM soal WHERE idSoal = '".$idSoal."'");
		return $dataDB;
	}
	
	public function getSatuNamaMateri($idMateri) {
		$dataDB = $this->db->query("SELECT nama FROM materi WHERE idmateri = '".$idMateri."'");
		return $dataDB;
	}

	public function getJawabanSoalTes($idSoal)
	{
		$dataDB = $this->db->get_where('pilihan_jawaban', array('idSoal' => $idSoal));
		return $dataDB;
	}
	
	public function simpanDetailTes($dataSimpan)
	{
		$res = $this->db->insert('catatan_tes', $dataSimpan);
		return $res;
	}

	public function updateJumlahBenar($idSoal)
	{
		$dataDB = $this->db->query("SELECT jumlahBenar FROM soal WHERE idSoal = ? ", array($idSoal))->row_array();
		$jumlahBenar = $dataDB['jumlahBenar'] + 1;
		$res = $this->db->update('soal', array('jumlahBenar' => $jumlahBenar), array('idSoal' => $idSoal));
		return $res;
	}
	
	public function updateJumlahSalah($idSoal)
	{
		$dataDB = $this->db->query("SELECT jumlahSalah FROM soal WHERE idSoal = ? ", array($idSoal))->row_array();
		$jumlahSalah = $dataDB['jumlahSalah'] + 1;
		$res = $this->db->update('soal', array('jumlahSalah' => $jumlahSalah), array('idSoal' => $idSoal));
		return $res;
	}
	
	public function getIdRapor($username)
	{
		$dataDB = $this->db->query("SELECT idRapor FROM rapor WHERE username = '".$username."'");
		return $dataDB;
	}	
	
	public function getSoalTes($kelas)
	{
		$dataDB = $this->db->get_where('soal', array('idKelas' => $kelas, 'isTes' => "tes", 'isDitunjukkan' => "Ya"));
		return $dataDB;
	}
	
}