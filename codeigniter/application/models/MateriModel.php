<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MateriModel extends CI_Model {
	// public function getMahasiswa()
	// {
			// $data = $this->db->query("SELECT * FROM MAHASISWA");
			// return $data;
	// }
	public function getAllMateri()
	{
		$daftarMateri = $this->db->query("SELECT * FROM MATERI");
		return $daftarMateri;
	}

	public function getMateri($kelas)
	{
		$materi = $this->db->query("SELECT * FROM MATERI WHERE KELAS = ".$kelas);
	}

	public function setMateri()
	{

	}

	public function updateMateri()
	{

	}

	public function deleteMateri()
	{

	}
	
}