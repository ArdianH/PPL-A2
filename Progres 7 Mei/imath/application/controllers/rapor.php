<?php
    class Rapor extends CI_Controller{
        public function index()
        {          	
		if($this->session->userdata('loggedin')) {
			$username = $this->session->userdata('username');
			$this->load->model('kelas_model');
			$data['kelas_model'] = $this->kelas_model->getAllKelas()->result(); 
			$this->load->model('rapor_model');
			$dataDB = $this->rapor_model->getIdRapor($username)->result(); 
			$data['dataId'] = $dataDB;
			$this->load->view('user/rapor_view', $data);
			//echo $dataDB->idRapor;
		} 
		else {
			redirect('home');
		}
	    }
	    	    
		
	public function view($id){
		if($this->session->userdata('loggedin')) {
			$username = $this->session->userdata('username');
			$this->load->model('kelas_model');          
			$data['kelas_model'] = $this->kelas_model->getAllKelas()->result();
			$this->load->model('materi_model');
			$data['result'] = $this->materi_model->getAllMateri($id);
			$this->load->model('rapor_model');
			$dataDB = $this->rapor_model->getIdRapor($username)->result(); 
			$data['dataId'] = $dataDB;
			$this->load->view('user/rapor_view',$data);
		} 
		else {
			redirect('home');
		}
	}
	
	public function hapusHistory($id){
			$this->load->model('rapor_model');
			$this->rapor_model->deleteHistory($id);
			$message = "Rapor telah berhasil di reset";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('rapor', 'refresh');
	}
	
	public function hasil($id, $idKelas, $idMateri)
	{
		$this->load->model('rapor_model');
		if($idMateri=="all") {
			$data['result']= $this->rapor_model->getCatatanTes($id, $idKelas, $idMateri);
		}
		else {
			$data['result']= $this->rapor_model->getCatatanLatihan($id, $idKelas, $idMateri);
		}
		
		$jumlahData = count($data['result']);
		$data['jumlahData'] = $jumlahData;
		$sum = 0.0;
		foreach($data['result'] as $row) {
			$sum += $row->jawabanBenar;
		}
		if($jumlahData != 0) {
		
			$hasil = $sum/$jumlahData;
		}
		else {
		
			$hasil = $sum;	
		}
		$data['hasil'] = round($hasil*10);
		echo json_encode($data); 
		
	}
	
	public function ambilTerbaru($id, $idKelas, $idMateri) {
		$this->load->model('rapor_model');		
		if($idMateri=="all") {
			$data['result']= $this->rapor_model->getCatatanTes($id, $idKelas, $idMateri);
		}
		else {
			$data['result']= $this->rapor_model->getCatatanLatihan($id, $idKelas, $idMateri);
		}
		$hasil = $data['result'];
		$array = array();
		$jumlahData = count($data['result']);
		
		$n = $jumlahData - 10; //ambil 3 terakhir
		for ($i = $jumlahData-1; $i>=$n && $i>=0; $i--) {
			array_push($array,$hasil[$i]);
		}
		echo json_encode($array); 
	
	}
	
	
	
	
    }
?>