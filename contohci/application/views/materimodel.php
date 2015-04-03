<?php
class materimodel extends CI_Model {
     
	function __construct(){
		parent::__construct();
	}	
	
	//Fungsi ini mengambil semua materi di kelas dipilih
	function getAllMateri($idKelas){
	    	$this->load->database();
	    	return $this->db->get_where('Materi', array('idKelas' => $idKelas))->result();
	}

	//Fungsi ini mengambil materi dengan id yang diinginkan
	function get($id){
    	$this->load->database();	    			
		return $this->db->get_where('Materi', array('idMateri' => $id))->result();
	}

	function delete($id){
		$this->load->database();		
		$this->db->delete('Materi', array('idMateri' => $id));
	}
	
	function insert(){
		$this->load->database();
		$kelas = $_POST['kelas'];
		$nama = $_POST['nama'];
		$deskripsi = $_POST['deskripsi'];
		$rangkuman = $_POST['rangkuman'];
		$this->db->query("insert into Materi ( idKelas, nama, deskripsi, rangkuman) values('$kelas', '$nama', '$deskripsi', '$rangkuman')");	
	}
	
	function add($data){
		$this->db->insert('Materi', $data);
		return;
	}
	
	function update($data, $id){
		$this->db->where('idMateri', $id);
		$this->db->update('Materi', $data);
	}

	function insert_image($data){
        $upload = $data['upload_data'];
        $full_path = $upload['full_path'];
        $this->db->query("insert into Materi (idMateri, gambar) values ('109', '$full_path')");
    }
}
?>