<?php
class kelas_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	

	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('kelas', array('idKelas' => $id))->result();
	}
	
	//Fungsi ini mengambil semua target belajar
	function getAllKelas(){
	    	$this->load->database();

		return $this->db->get('kelas')->result();
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
}
?>