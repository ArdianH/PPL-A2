<?php
class Pesan extends CI_Model {
     //INDAH
	function __construct(){
		parent::__construct();
	}	
	
	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('pesan', array('idPesan' => $id))->result();
	}
	//Fungsi ini mengambil semua target belajar
	function getAllPesan(){
	    	$this->load->database();
	    	return $this->db->get('pesan')->result();		
	}
	
	function getPesan(){
	    	$this->load->database();
		return $this->db->get_where('pesan')->result();
	}
	
	
	function delete($id){
		$this->load->database();		
		$this->db->delete('pesan', array('idPesan' => $id));
	}
	
	public function insert(){
		$this->pesan->insertPesan();
		//$this->load->view('DaftarPesanUI');
	}
	
	function add($data){
		$this->db->insert('pesan', $data);
		return;
	}
	
	function insertPesan(){
		$this->load->database();		
		$id = $_POST['idPesan'];
		$email = $_POST['email'];
		$isi = $_POST['isi'];		
		$this->db->query("insert into pesan (idPesan, email, isi) values('$id', '$email','$isi')");		
	}
}
?>