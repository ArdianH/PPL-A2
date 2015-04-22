<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prestasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();            
		$this->load->model('prestasi_model');
		$this->load->model('kelas_model');
	}
	public function index()
	{	
		if($this->session->userdata('loggedin')) {			
			$username = $this->session->userdata('username');
			$data['kelas'] = $this->kelas_model->getAllKelas()->result();
			$this->load->view("user/prestasi_view", $data);	
		} else {
			redirect ('home');
		}
	}
		
	public function medali($idKelas)
	{	
		if($this->session->userdata('loggedin')) {
			$username = $this->session->userdata('username');
			$data['kelas'] = $this->kelas_model->getAllKelas()->result();			
			$data['medali'] = $this->prestasi_model->getMedaliByIdKelas($username, $idKelas)->result();
			$this->load->view("user/prestasi_view", $data);	
		} else {
			redirect ('home');
		}
	}
	
	//Mengambil id materi sesuai username
	public function materi($username){
		if($this->session->userdata('loggedin')) {			
			$arr = $this->prestasi_model->getIdMateri($username)->result();			
			echo json_encode($arr);
		} 
		else {
			redirect('home');
		}
	}
}