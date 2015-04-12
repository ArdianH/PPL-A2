<?php
class anggota_model extends CI_Model {
     
     
	function __construct(){
		parent::__construct();
	}
	
	function get($id){
	    	$this->load->database();	    			
		return $this->db->get_where('akun', array('username' => $id))->result();
	}
	
	//Fungsi ini mengambil semua target belajar
	function getAllAnggota(){
	    	$this->load->database();
;
		return $this->db->get_where('akun', array('role' => 'user'))->result();
	}
	
	function deleteAnggota(){
		$this->load->database();
		$this->db->delete('akun', array('role' => 'user'));
	}
	
	function delete($id){
		$this->load->database();		
		$this->db->delete('akun', array('username' => $id));
	}
	
	function add($data){
		$this->db->insert('akun', $data);
		return;
	}
	
	function update($data, $id){
		$this->db->where('username', $id);
		$this->db->update('akun', $data);
	}
}
?>