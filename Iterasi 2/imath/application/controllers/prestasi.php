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
			redirect ('prestasi/medali');
		} else {
			redirect ('home');
		}
	}
		
	//Load halaman sertifikat
	public function sertifikat()
	{	
		if($this->session->userdata('loggedin')) {			
			$username = $this->session->userdata('username');			
			$data['sertifikat'] = $this->prestasi_model->getSertifikat($username)->result();			
			$this->load->view("user/sertifikat_view", $data);
			
		} else {
			redirect ('home');
		}
	}
	
	//Load halaman medali
	public function medali()
	{	
		if($this->session->userdata('loggedin')) {			
			$username = $this->session->userdata('username');
			$data['kelas'] = $this->kelas_model->getAllKelas()->result();
			$this->load->view("user/medali_view", $data);	
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