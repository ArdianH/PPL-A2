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
		return $materi;
	}

	public function setMateri($kelas, $data)
	{
		$res = $this->db->query("INSERT INTO MATERI (nama, deskripsi, gambar, rangkuman) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')");
		return $res;
	}

	public function deleteMateri()
	{
		
	}
	
}