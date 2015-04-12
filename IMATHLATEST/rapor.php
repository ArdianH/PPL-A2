<?php

    class Rapor extends CI_Controller{
        public function index()
        {          
	    $this->load->model('kelas_model');
		$data['kelas_model'] = $this->kelas_model->getAllKelas(); 
		$this->load->view('user/coba', $data);
	    }
		
	public function view($id){
		$this->load->model('kelas_model');          
	    $data['kelas_model'] = $this->kelas_model->getAllKelas();
	    $this->load->model('materi_model');
		$data['result'] = $this->materi_model->getAllMateri($id);
		$this->load->view('user/coba',$data);
	}
	
	public function hasil($id, $idKelas, $idMateri)
	{
		$this->load->model('rapor_model');		
		$data['result']= $this->rapor_model->getCatatanLatihan($id, $idKelas, $idMateri);
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

		$data['hasil'] = $hasil;
		echo json_encode($data); 
		
	}
	
	public function ambilTerbaru($id, $idKelas, $idMateri) {
		$this->load->model('rapor_model');		
		$data['result']= $this->rapor_model->getCatatanLatihan($id, $idKelas, $idMateri);
		$hasil = $data['result'];

		$array = array();

		$jumlahData = count($data['result']);
		
		$n = $jumlahData - 3; //ambil 3 terakhir
		//$array = array_values($array)

		
		for ($i = $jumlahData-1; $i>=$n && $i>0; $i--) {
			
			//$array = array_values($arr);
			//echo $arr[0]['pageCount'];
			array_push($array,$hasil[$i]);

		  //print_r($a);
		}
		//$data['jawabanBenar'] = $jawabanBenar;
		echo json_encode($array); 
		//$this->load->view('user/tes',$array);
	
	}
	
	
    }
?>