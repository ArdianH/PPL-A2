<?php
class kunjungan_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	

	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('kunjungan', array('idKelas' => $id));
	}
	
	//Fungsi ini mengambil semua target belajar
	function getAllKelas(){
		$this->load->database();
		return $this->db->get('kunjungan');
	}

	function getAllIdKelas(){
		$this->load->database();
		return $this->db->get('kunjungan');
	}

	function getAllPengunjungKelas(){
		$this->load->database();
		return $this->db->get('kunjungan');
	}
	
	function getAllPengunjungTerbaru($idKelas){
	    	$this->load->database();
	    	return $this->db->get_where('kunjungan', array('idKelas' => $idKelas))->result();
			
	}


	function getJumlahPengunjungKelas($idKelas){
			$this->db->select_sum('jumlah');
			//$this->db->join('kelas', 'kelas.idKelas=kunjungan.idKelas');
			return $this->db->get_where('kunjungan', array('idKelas' => $idKelas));
			//return $hasil= $this->db->get()->result();
	}

	function getCatatanKunjungan($idKelas) {
		return $this->db->get_where('kunjungan', array ('idKelas'=>$idKelas))->result();
	}
	
	



}
?>