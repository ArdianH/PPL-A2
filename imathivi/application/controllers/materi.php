<?php
    class materi extends CI_Controller{
        public function index(){
            $this->load->model('kelas_model');
 
            $data['result'] = $this->kelas_model->getAllKelas();          
	   
	    $this->load->view('user/kelas_view',$data);
	    }
	    
	public function pilih($id){
		$this->load->model('materi_model');		
		
		$data['result'] = $this->materi_model->get($id); 
		
		$this->load->view('user/materi_view', $data); //UbahAgggotaUI
		}
	
	public function lihatMateri($idMateri){
		$this->load->model('materi_model');		
		
		$data['result'] = $this->materi_model->getAllMateri($idMateri); 
		
		$this->load->view('user/lihat_materi_view', $data); //UbahAgggotaUI
		}
		
	public function latihanMateri($idSoal){
		$this->load->model('materi_model');		
		
		$data['result'] = $this->materi_model->getAllSoal($idSoal); 
		
		$this->load->view('user/latihan_materi_view', $data); //UbahAgggotaUI
		}
		
	public function jawaban($idSoal){
		$this->load->model('materi_model');		
		
		$data['hasil'] = $this->materi_model->getAllJawaban($idSoal); 
		
		$this->load->view('user/latihan_materi_view', $data); //UbahAgggotaUI
		}

	
    }
?>