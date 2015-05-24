<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tes_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function getIdSoalTes($kelas)
	{
		$this->db->select('idSoal');
		return $this->db->get_where('soal', array('idKelas' => $kelas, 'isDitunjukkan' => 'Ya', 'isTes' => 'tes'));
	}
	
	public function getSatuSoalTes($idSoal)
	{
		return $this->db->get_where('soal', array('idSoal' => $idSoal));
	}
	
	public function getIdRapor($username)
	{
		$this->db->select('idRapor');
		return $this->db->get_where('rapor', array('username' => $username));
	}

	public function getJawabanSoalTes($idSoal)
	{
		return $this->db->get_where('pilihan_jawaban', array('idSoal' => $idSoal));
	}
	
	public function getSatuIdMateri($idSoal)
	{
		$this->db->select('idMateri');
		return $this->db->get_where('soal', array('idSoal' => $idSoal));
	}
	
	public function getSatuNamaMateri($idMateri) {
		$this->db->select('nama');
		return $this->db->get_where('materi', array('idMateri' => $idMateri));
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
	
	public function getSoalTes($kelas)
	{
		$dataDB = $this->db->get_where('soal', array('idKelas' => $kelas, 'isTes' => "tes", 'isDitunjukkan' => "Ya"));
		return $dataDB;
	}
	
	function setSertifikat($username, $idKelas){
		$res = $this->db->insert('sertifikat', array('username' => $username, 'idKelas' => $idKelas));
		return $res;
	}

	function getJumlahSertifikatKelas($username, $idKelas){
		$this->db->where(array('username' => $username, 'idKelas' => $idKelas));
		return $this->db->count_all_results('sertifikat');
	}
	
	function getWaktuTes($idKelas){
		$this->db->select('waktuTes');
		return $this->db->get_where('kelas', array('idKelas' => $idKelas));
	}
	
}