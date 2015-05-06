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
}
?>