<?php
    class kelas extends CI_Controller{
        public function index(){
		$this->load->model('kelas_model');
 
		$data['result'] = $this->kelas_model->getAllKelas()->result();		
		$this->load->view('user/kelas_view',$data);
	}
	    
	public function pilih($id){
		$this->load->model('materi_model');		
		$this->load->model('kelas_model');
		
		$data['result'] = $this->materi_model->getAllMateri($id);
		$jumlahData = $data['result'];
		
		$jumlahSoalMateri = array();
		foreach($data['result'] as $row):
			$jumlahSoalMateri[$row->idMateri] = $this->materi_model->getJumlahSoal($row->idMateri);
		endforeach;
		
		$data['jumlahSoal'] = $jumlahSoalMateri;
		$data['kelas'] = $this->kelas_model->get($id)->result();
		$data['all'] = $this->kelas_model->getAllKelas()->result();
		$data['soaltes'] = $this->kelas_model->countSoalTes($id);
		//echo $data['soaltes'];
		$this->load->view('user/kelas_view', $data);
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