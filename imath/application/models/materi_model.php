<?php
class materi_model extends CI_Model {
     
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
	
	function add($data){
		$this->db->insert('Materi', $data);
		return;
	}
	
	function update($data, $id){
		$this->load->database();
		$this->db->where('idMateri', $id);
		$this->db->update('Materi', $data);
	}
	
	public function delete_uploaded_image($id){
		$this->load->database();		

		if($id){
			return false;
		}
		$query = $this->db->get_where('materi', array('id'=>$id));
	    	$output =  $query->result(); //output adalah sebuah object product berupa std object

		$full_path = getcwd().'/uploads/'.$output->id.'/'.$output->image;
		if(isset($this->image_url) && file_exists($full_path)){
			unlink($full_path);
		}
	}
	
	public function getNama(){
		$this->db->select('name');
		$this->db->from('asset_types');
		$this->db->where('code',$asset);
		return $this->db->get('asset_types');
	
	}
}
?>