<?php
    class kunjungan extends CI_Controller{
        public function index()
        {          	
		if($this->session->userdata('loggedin')) {
			$username = $this->session->userdata('username');			
			$this->load->model('kelas_model');
			$data['kelas'] = $this->kelas_model->getAllKelas()->result(); 			
			$this->load->view('admin/detailkunjungan_view', $data);
			//$this->load->view('admin/cobacoba', $data);
		} 
		else {
			redirect('home');
		}
	}
	
	public function viewKunjungan($kelas)
        {          	
		
		$username = $this->session->userdata('username');			
		$this->load->model('kelas_model');
		$data['kelas'] = $this->kelas_model->getAllKelas()->result(); 			
		$data['idKelas'] = $kelas;
		$this->load->view('admin/detailkunjungan_view', $data);
	}
	    
	    
	public function hasil($idKelas)
	{		
		$this->load->model('kelas_model');
		if($idMateri=="all") {
			//$data['result']= $this->rapor_model->getCatatanTes($id, $idKelas, $idMateri);
			$data['result'] = $this->kelas_model->getKunjunganKelas($idKelas)->result();
		}
		else {
			$data['result'] = $this->kelas_model->getKunjunganKelas($idKelas)->result();
			//$data['result']= $this->rapor_model->getCatatanLatihan($id, $idKelas, $idMateri);
		}
		
		//~ $jumlahData = count($data['result']);
		//~ $data['jumlahData'] = $jumlahData;
		//~ $sum = 0.0;
		//~ foreach($data['result'] as $row) {
			//~ $sum += $row->jawabanBenar;
		//~ }
		//~ if($jumlahData != 0) {
		
			//~ $hasil = $sum/$jumlahData;
		//~ }
		//~ else {
		
			//~ $hasil = $sum;	
		//~ }
		//~ $data['hasil'] = round($hasil*10);
		echo json_encode($data); 
		
	}
	
	public function getTenVisits($idKelas) {
		$this->load->model('kelas_model');
		
		$data['result'] = $this->kelas_model->getKunjunganKelas($idKelas)->result();
	
		$hasil = $data['result'];
		$array = array();
		$jumlahData = count($data['result']);
		
		$n = $jumlahData - 10; //ambil 10 terakhir
		for ($i = $jumlahData-1; $i>=$n && $i>=0; $i--) {
			array_push($array,$hasil[$i]);
		}
						
		echo json_encode($this->kelas_model->getKunjunganKelas($idKelas)->result_array());
		//echo json_encode($array); 
	
	}
	
	
    }
?>