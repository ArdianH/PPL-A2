<?php
    class materi extends CI_Controller{
        public function index(){
            $this->load->model('kelas_model');
 
            $data['result'] = $this->kelas_model->getAllKelas()->result();
	   
	    $this->load->view('kelas_view',$data);
	}
	    
	public function pilih($id){
		$this->load->model('materi_model');		
		$this->load->model('kelas_model');
		$data['result'] = $this->materi_model->getAllMateri($id); 
		$data['kelas'] = $this->kelas_model->get($id)->result();
		$this->load->view('user/materi_view', $data);
		}
	
	public function lihatMateri($idMateri){
		if($this->session->userdata('loggedin')) {
			$this->load->model('materi_model');		
			$data['result'] = $this->materi_model->get($idMateri); 
			$this->load->view('user/lihatmateri_view', $data); 
		} 
		else {
			redirect('home');
		}
	}	
    }
?>