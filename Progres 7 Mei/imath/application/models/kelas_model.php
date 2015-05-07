<?php
class kelas_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	

	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('kelas', array('idKelas' => $id));
	}
	
	//Fungsi ini mengambil semua target belajar
	function getAllKelas(){
	    	$this->load->database();
		return $this->db->get('kelas');
	}
	
	function insert(){
		$this->load->database();
		$kelas = $_POST['kelas'];		
		$deskripsi = $_POST['deskripsi'];
		$this->db->query("insert into Kelas ( idKelas, deskripsi ) values('$kelas', '$deskripsi')");
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
	
	function getJumlahPengunjungKelas($idKelas){
			$this->db->select_sum('jumlah');
			//$this->db->join('kelas', 'kelas.idKelas=kunjungan.idKelas');
			return $this->db->get_where('kunjungan', array('idKelas' => $idKelas));
			//return $hasil= $this->db->get()->result();
	}
	
	function getAllIdKelas(){
		$this->load->database();
		$this->db->select('idKelas');
		return $this->db->get('kelas');
	}
}
?>