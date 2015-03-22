<?php
    class buatTargetBelajar extends CI_Controller{
    
	public function __construct() {        
		parent::__construct();
	}
	
        public function index()
        {
		$this->load->model('Kelas');
		$data['kelas'] = $this->Kelas->getAllKelas();		
		$this->load->view('BuatTargetBelajarUI', $data);
        }
	
	public function getMateri($id){
		$this->load->model('Materi');
		$data['materi'] = $this->Materi->getAllMateri($id);
		redirect('BuatTargetBelajarUI', 'refresh');
	}
	public function insert(){
		$this->load->model('TargetBelajar');
		$this->targetbelajar->insertTargetBelajar();
		$this->load->view('TargetBelajarUI');
	}
	
	function create()
	{
		$this->load->model('TargetBelajar');
		$data = array(
			'idtargetbelajar' => $this->input->post('idtargetbelajar'),
			'username' => $this->input->post('username'),
			'idmateri' => $this->input->post('idmateri'),
			'idkelas' => $this->input->post('idkelas'),			
			'banyaksoal' => $this->input->post('banyaksoal'),
			'targetnilai' => $this->input->post('targetnilai'),
			'tanggal' => date("Y-m-d"),
			'isselesai' => 'tidak'
		);
		
		$this->TargetBelajar->add($data);
		redirect('TargetBelajarController');
	}
    }
?>