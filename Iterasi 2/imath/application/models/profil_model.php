<?php
class profil_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	function getProfil($username){
	    	$this->load->database();
	    	return $this->db->get_where('akun', array('username' => $username))->result();
	}
	
	function update($data, $username){
		$this->db->where('username', $username);
		$this->db->update('akun', $data);
	}
}
?>