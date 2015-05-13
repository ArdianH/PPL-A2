<?php
class targetbelajar_model extends CI_Model {
     
     
	function __construct(){
		parent::__construct();
	}
	
	function get($idTargetBelajar){
	    	$this->load->database();	    			
		return $this->db->get_where('target_belajar', array('idTargetBelajar' => $idTargetBelajar))->result();
	}
	
	//=====================================================
	// Fungsi ini mengambil semua target belajar dari $username
	//=====================================================
	function getAllTargetBelajar($username){
	    	$this->load->database();
	    	//return $this->db->get('targetbelajar')->result();
		$selesai = 'tidak';
		return $this->db->get_where('target_belajar', array('isSelesai' => $selesai, 'username' => $username))->result();
	}
	
	function getHistory($username){
	    	$this->load->database();
	    	//return $this->db->get('targetbelajar')->result();
		$selesai = 'tercapai';
		return $this->db->get_where('target_belajar', array('isSelesai' => $selesai, 'username' => $username))->result();
	}
	
	function deleteHistory($username){
		$this->load->database();
		$selesai = 'tercapai';
		$this->db->delete('target_belajar', array('isSelesai' => $selesai, 'username' => $username));
	}
	
	function delete($id){
		$this->load->database();		
		$this->db->delete('target_belajar', array('idTargetBelajar' => $id));
	}
	
	//=====================================================================================
	// Fungsi ini menghapus semua target belajar dengan id materi = $idMateri
	//=====================================================================================
	function deleteByMateri($idMateri){
		$this->load->database();		
		$this->db->delete('target_belajar', array('idMateri' => $idMateri));
	}	
	
	function add($data){
		$this->db->insert('target_belajar', $data);
		return;
	}
	
	function update($data, $id){
		$this->db->where('idTargetBelajar', $id);
		$this->db->update('target_belajar', $data);
	}
	
	//=====================================================
	// Fungsi ini mengambil nama Materi dari $idTargetBelajar
	//=====================================================
	function getNamaMateri($idTargetBelajar){
	    	$this->load->database();
	    	
		return $this->db->query('SELECT nama FROM Materi as M where M.idMateri in (Select TB.idMateri from Target_Belajar as TB where TB.idTargetBelajar = "'.$idTargetBelajar.'")');
	}
}
?>