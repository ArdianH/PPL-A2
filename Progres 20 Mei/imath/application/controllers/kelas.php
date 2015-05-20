<?php
    class kelas extends CI_Controller
    {
        public function index()
	{	
		$this->load->model('kelas_model');
		$data['result'] = $this->kelas_model->getAllKelas()->result();
		$this->load->view('user/kelas_view',$data);
	}
	    
	public function pilih($id)
	{
		//session_start();		
		
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
		//echo $data['kelas'][0]->idKelas;
		$data['all'] = $this->kelas_model->getAllKelas()->result();
		$data['soaltes'] = $this->kelas_model->countSoalTes($id);
		//~ //echo $data['soaltes'];
		
		//============================= Nambahin Kunjungan Pengguna ke Database ;) ===========================================
		
		if($this->session->userdata('loggedin')) {
			//============== session yang mengecek untuk pengunjung reload halaman, dianggap sama		
			
			if($this->session->userdata('views') != 1){ //cek kalau belum pernah masuk
				$this->session->set_userdata('views', 1); //kalau belum masuk, set jadi 1
				//================ambil kunjungan hari ini di kelas $id
				$hariIni =  date("Y-m-d");
				//$hariIni = "2010-07-07";
				$res = $this->kelas_model->getKunjunganHariIni($id, $hariIni)->result();
				$temp = count($res); //mengecek apakah hariini udah ada di database belum
				//echo $temp;
				if($temp != 0) //temp !=0 berarti sudah ada di database, jadi ambil dulu, lalu tambahin 1
				{
					$jumlahKunjungan = $this->kelas_model->getKunjunganHariIni($id, $hariIni)->row()->jumlah;
					$counter = ($jumlahKunjungan) + 1;
					$this->kelas_model->updateKunjunganHariIni($id, $hariIni, $counter);
					//echo $counter;
				}
				else //saat belum ada di database, add baru kunjungan hari itu :)
				{
					$data = array(				
						'tanggal' => $hariIni,
						'jumlah' => 1,
						'idKelas' => $id
					);				
					$this->kelas_model->addKunjungan($data);					
				}	
				
			}		
		}
		//=========================================== STOP ==============================================
		
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