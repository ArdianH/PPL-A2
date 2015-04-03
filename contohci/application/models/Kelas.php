<?php
class Kelas extends CI_Model {
     //INDAH
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
	
	function getKelas(){
	    	$this->load->database();
		return $this->db->get_where('kelas')->result();
	}
	
	function deleteKelas(){
		$this->load->database();
		$this->db->delete('kelas');
	}
	
	function delete($id){
		$this->load->database();		
		$this->db->delete('kelas', array('idKelas' => $id));
	}
	
	function add($data){
		$this->db->insert('Kelas', $data);
		return;
	}
	
	function insertKelas(){
		$this->load->database();		
		$id = $_POST['id'];
		$deskripsi = $_POST['deskripsi'];	
		$this->db->query("insert into kelas (idKelas, deskripsi) values('$id', '$deskripsi')");		
	}
	
	function insert_image($data){
        $upload = $data['upload_data'];
        $full_path = $upload['full_path'];
        $this->db->query("insert into kelas (idKelas, gambar) values ('109', '$full_path')");
    }
}
?>