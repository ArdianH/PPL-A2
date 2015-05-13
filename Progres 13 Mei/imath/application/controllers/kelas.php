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
		session_start();		
		
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
		
		//============================= Nambahin Kunjungan Pengguna ke Database ;) ===========================================
		
		if($this->session->userdata('loggedin')) {
			//session yang mengecek untuk pengunjung reload halaman, dianggap sama		
			//$data['kunjungan'] = $this->kelas_model->getKunjunganHariIni($id, $hariIni)->result();
			if($this->session->userdata('views') != 1){ //cek kalau belum pernah masuk
				$this->session->set_userdata('views', 1); //kalau belum masuk, set jadi 1
				//ambil kunjungan hari ini di kelas $id
				$hariIni =  date("Y-m-d");							
				$jumlahKunjungan = $this->kelas_model->getKunjunganHariIni($id, $hariIni)->row()->jumlah;
				//echo "ga masuk";
				//$counter = 0;
				if($jumlahKunjungan > 0)
				{				
					$counter = ($jum) + 1;
					$this->kelas_model->updateKunjunganHariIni($id, $hariIni, $counter);
				}
				else
				{
					$data = array(				
						'tanggal' => $hariIni,
						'jumlah' => 1,
						'idKelas' => $id
					);				
					$this->kelas_model->addKunjungan($data);
				}
			//echo $counter;
				
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