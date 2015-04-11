<?php

    class Rapor extends CI_Controller{
        public function index()
        {          
	    $this->load->model('kelas_model');
		$data['kelas_model'] = $this->kelas_model->getAllKelas(); 
		$this->load->view('user/rapor_view', $data);
	    }
		
	public function view($id){
		$this->load->model('kelas_model');          
	    $data['kelas_model'] = $this->kelas_model->getAllKelas();
	    $this->load->model('materi_model');
		$data['result'] = $this->materi_model->getAllMateri($id);
		$this->load->view('user/rapor_view',$data);
	}
	
	public function hasil($id, $idKelas, $idMateri)
	{
		$this->load->model('rapor_model');		
		$data['result']= $this->rapor_model->getCatatanLatihan($id, $idKelas, $idMateri);
		
		echo count($data['result']); 
		
	}
	
    }
?>