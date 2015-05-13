<?php
class kelas_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	

	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('kelas', array('idKelas' => $id));
	}
	
	//Fungsi ini mengambil semua kelas
	function getAllKelas(){
	    	$this->load->database();
		return $this->db->get('kelas');
	}	
	
	function add($data){
		$this->db->insert('Kelas', $data);
		return;
	}
	
	function delete($id){
		$this->load->database();		
		$this->db->delete('Kelas', array('idKelas' => $id));
	}
	
	function update($data, $id){
		$this->load->database();
		$this->db->where('idKelas', $id);
		$this->db->update('Kelas', $data);
	}

	function setWaktu($idKelas, $inputWaktu){
		$this->load->database();				
		$this->db->set('waktuTes', $inputWaktu);
		$this->db->where('idKelas', $idKelas);
		$this->db->update('Kelas');		
		return;
	}
	
	function countSoalTes($idKelas)
	{
		$this->load->database();		
		return $this->db
			->where('idKelas', $idKelas)
			->where('isDitunjukkan', 'Ya')
			->where('isTes', 'tes')
			->count_all_results('soal');
	}
	
	//=============== KUNJUNGAN ====================
	function getJumlahPengunjungKelas($idKelas){
			$this->db->select_sum('jumlah');
			//$this->db->join('kelas', 'kelas.idKelas=kunjungan.idKelas');
			return $this->db->get_where('kunjungan', array('idKelas' => $idKelas));
			//return $hasil= $this->db->get()->result();
	}
	
	function getKunjunganHariIni($idKelas, $hariIni){
		$this->db->select('jumlah');
		return $this->db->get_where('kunjungan', array('idKelas' => $idKelas, 'tanggal' => $hariIni));		
	}
	
	function getKunjunganKelas($idKelas){
		//$this->db->select('jumlah');
		return $this->db->get_where('kunjungan', array('idKelas' => $idKelas));
	}
	
	function updateKunjunganHariIni($idKelas, $hariIni, $jumlah){
		$this->load->database();				
		$this->db->set('jumlah', $jumlah);
		$this->db->where('idKelas', $idKelas);
		$this->db->where('tanggal', $hariIni);
		$this->db->update('kunjungan');
		return;
	}
	
	function addKunjungan($data){
		$this->db->insert('kunjungan', $data);
		return;
	}
	
	function getAllIdKelas(){
		$this->load->database();
		$this->db->select('idKelas');
		return $this->db->get('kelas');
	}
}
?>