<?php
    class buatKelas extends CI_Controller{
    //INDAH
	public function __construct() {        
		parent::__construct();
	}
	
        public function index()
        {		
		$this->load->view('BuatKelasUI');
        }
	
	public function insert(){
		$this->load->model('Kelas');
		$this->kelas->insertKelas();
		$this->load->view('KelasUI');
	}
	
	function create()
	{
		$this->load->model('Kelas');
		$data = array(
			'idKelas' => $this->input->post('idKelas'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		
		$this->Kelas->add($data);
		redirect('KelasController');
	}
    }
?>