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
			$data['kelas'] = $this->kelas_model->getAllKelas()->result();
			$idKelas = $data['kelas'][0]->idKelas;
			//echo $idKelas;
			$page = "prestasi/medali/".$idKelas;			
			redirect ($page);
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
	public function medali($idKelas){
		if($this->session->userdata('loggedin')) {

			$this->load->model('kelas_model'); 			
			$this->load->model('prestasi_model'); 
			
			$username = $this->session->userdata('username');			
			$data['kelas'] = $this->kelas_model->getAllKelas()->result();
			$data['medali'] = $this->prestasi_model->getMedali($username, $idKelas)->result();
			
			$this->load->view('user/medali_view',$data);
		} 
		else {
			redirect('home');
		}
	}	
}