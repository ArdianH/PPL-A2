<?php
class targetbelajar_model extends CI_Model {
     
     
	function __construct(){
		parent::__construct();
	}
	
	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('target_belajar', array('idTargetBelajar' => $id))->result();
	}
	
	//Fungsi ini mengambil semua target belajar
	function getAllTargetBelajar(){
	    	$this->load->database();
	    	//return $this->db->get('targetbelajar')->result();
		$selesai = 'tidak';
		return $this->db->get_where('target_belajar', array('isSelesai' => $selesai))->result();
	}
	
	function getHistory(){
	    	$this->load->database();
	    	//return $this->db->get('targetbelajar')->result();
		$selesai = 'tercapai';
		return $this->db->get_where('target_belajar', array('isSelesai' => $selesai))->result();
	}
	
	function deleteHistory(){
		$this->load->database();
		$selesai = 'tercapai';
		$this->db->delete('target_belajar', array('isSelesai' => $selesai));
	}
	
	function delete($id){
		$this->load->database();		
		$this->db->delete('target_belajar', array('idTargetBelajar' => $id));
	}
	
	function insertTargetBelajar(){
		$this->load->database();		
		$id = $_POST['id'];
		$username = $_POST['username'];
		$kelas = $_POST['kelas'];
		$materi = $_POST['materi'];
		$nilai = $_POST['nilai'];		
		$this->db->query("insert into target_belajar (idTargetBelajar, username, idkelas, idmateri, targetnilai) values('$id', '$username','$kelas', '$materi', 'nilai')");		
	}
	
	function add($data){
		$this->db->insert('target_belajar', $data);
		return;
	}
	
	function update($data, $id){
		$this->db->where('idTargetBelajar', $id);
		$this->db->update('target_belajar', $data);
	}
}
?>