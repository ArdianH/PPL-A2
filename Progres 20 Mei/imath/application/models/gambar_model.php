<?php
class gambar_model extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	function add($data){
		$this->db->insert('pilihan_jawaban', $data);
		return;
	}
}
?>