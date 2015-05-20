<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tes extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
		$this->load->model('tes_model');
		$this->load->model('kelas_model');
    }
	
	public function index()
	{	
	}	
	public function retrieveSoal($kelas)
	{
		$this->session->unset_userdata(array('setIdSoal'=>'', 'setNamaMateri'=>'', 'setNilaiMateri'=>'', 'setJawabanUser'=>'', 'currentSoal'=>'', 'idRapor'=>'', 'jumlahSoal' =>'', 'nomorSoal'=>'', 'skor'=>'', 'kelas'=>'', 'flagSudahJawab' => ''));
		//inisialisasi Tes sesuai kelas: retrieve setIdSoal, idRapor, reset parameter tes => masukkan ke dalam session tes.
		$setIdSoal	= $this->tes_model->getIdSoalTes($kelas)->result_array();
		$username	= $this->session->userdata('username');
		$idRapor	= $this->tes_model->getIdRapor($username)->row()->idRapor;
		$jumlahSoal	= count($setIdSoal);
		$dataSession = array(
			'kelas'			=>	$kelas,
			'nomorSoal'		=>	0,
			'skor'			=>	0,
			'setIdSoal'		=>	$setIdSoal,
			'jumlahSoal'	=>	$jumlahSoal,
			'idRapor'		=>	$idRapor
		);
		$this->session->set_userdata($dataSession);
		$this->processSoal("init");
	}
	
	public function processSoal($param = '')
	{
		//retrieve soal pertanyaan, setting variabel untuk pertanyaan tes.
		$jumlahSoal	= $this->session->userdata('jumlahSoal');
		$nomorSoal 	= $this->session->userdata('nomorSoal');
		$setIdSoal 	= $this->session->userdata('setIdSoal');
		$waktuTes	= $this->input->post('waktuTes', TRUE);
		$this->session->set_userdata('waktuTes', $waktuTes);
		
		//jika pertanyaan masih ada (tes belum selesai) => setting variabel untuk satu pertanyaan.
		if($nomorSoal < $jumlahSoal && $param != 'selesai') {
			$satuIdSoal	= $setIdSoal[$nomorSoal]['idSoal'];
			$satuSoal 	= $this->tes_model->getSatuSoalTes($satuIdSoal)->row();
			$nomorSoalUpdate = $nomorSoal + 1;
			$pilihanJawaban	 = $this->tes_model->getJawabanSoalTes($satuIdSoal)->result_array();
			$this->session->set_userdata('nomorSoal', $nomorSoalUpdate);
			$this->session->set_userdata('currentIdSoal', $satuSoal->idSoal);
			
			$satuSoal = array(
				'idSoal'		=>	$satuSoal->idSoal,
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'gambar'		=>  	$satuSoal->gambarSoal,
				'idOpsiA'		=>	$pilihanJawaban[0]['pilihanGanda'],
				'idOpsiB'		=>	$pilihanJawaban[1]['pilihanGanda'],
				'idOpsiC'		=>	$pilihanJawaban[2]['pilihanGanda'],
				'idOpsiD'		=>	$pilihanJawaban[3]['pilihanGanda'],
				'desOpsiA'		=>	$pilihanJawaban[0]['deskripsi'],
				'desOpsiB'		=>	$pilihanJawaban[1]['deskripsi'],
				'desOpsiC'		=>	$pilihanJawaban[2]['deskripsi'],
				'desOpsiD'		=>	$pilihanJawaban[3]['deskripsi'],
				'nomor'		=> 	$nomorSoalUpdate,
				'skor'			=>	$this->session->userdata('skor'),
				'flagJawaban'	=>	0,
				'flagNext'		=>	FALSE
			);
			
			//Jika merupakan soal pertama pada tes => inisialisasi variabel untuk detail tes.
			if($param == "init") {
				$satuSoal['flagInit'] = TRUE;
				$setNamaMateri;
				$setNilaiMateri;
				foreach($setIdSoal as $row) {
					$satuIdMateri	= $this->tes_model->getSatuIdMateri($row['idSoal'])->row();
					$satuNamaMateri = $this->tes_model->getSatuNamaMateri($satuIdMateri->idMateri)->row();
					$setNamaMateri[]  = $satuNamaMateri->nama;
					$setNilaiMateri[] = "SALAH";
				}
				$this->session->set_userdata('setNamaMateri', $setNamaMateri);
				$this->session->set_userdata('setNilaiMateri', $setNilaiMateri);
				
			} else {
				$satuSoal['flagInit'] = FALSE;
			}
			/*setNamaMateri = $this->session->userdata('setNamaMateri');
			  $satuSoal['namaMateri'] = $setNamaMateri[$nomorSoal];*/
			
			$this->session->set_userdata('flagSudahJawab', FALSE);
			$this->load->view('user/tes_view', $satuSoal);
			
			
		//jika pertanyaan sudah habis (tes selesai) => setting variabel untuk detail tes.
		} else {
			$kelas	= $this->session->userdata('kelas');
			$waktuTes = $this->session->userdata('waktuTes');
			$username = $this->session->userdata('username');
			$setNamaMateri	= $this->session->userdata('setNamaMateri');
			$setNilaiMateri	= $this->session->userdata('setNilaiMateri');
			$data = array(
				'kelas'		=>	$kelas,
				'waktuTes'		=>	$waktuTes,
				'namaPanggilan'	=>	$this->session->userdata('namaPanggilan'),
				'username'		=>	$username,
				'jumlahSoal'		=>	$jumlahSoal,
				'setNamaMateri' =>	$setNamaMateri,
				'setNilaiMateri'=>	$setNilaiMateri
			);
			
			$jumlahBenar = 0;
			for($i=0; $i<$jumlahSoal; $i++) {
				if($setNilaiMateri[$i] == "BENAR") {
					$jumlahBenar++;
				}
			}
			if(($jumlahBenar/$jumlahSoal)*100 >= 70) {
				if($this->tes_model->getJumlahSertifikatKelas($username, $kelas) == 0) {
					$res = $this->tes_model->setSertifikat($username, $kelas);
				}
				$data['sertifikat'] = TRUE;
			}
			
			$dataSimpan = array(
				'idKelas'	=>	$data['kelas'],
				'idRapor'	=>	$this->session->userdata('idRapor'),
				'jawabanBenar'	 =>	$jumlahBenar,
				'tglMengerjakan' => date("Y-m-d"),
				'lamaWaktu'		 =>	$waktuTes
			);
			$this->session->set_userdata('flagSudahJawab', FALSE);
			$this->tes_model->simpanDetailTes($dataSimpan);
			$data['currentkelas'] = $this->kelas_model->get($kelas)->result();
			$this->load->view('user/detailtes_view', $data);
			
		}
	}
	//terima input jawaban dari user (isi $jawabanUser hanya value dari idOpsi saja/A,B,C,D)
	public function processJawaban()
	{
		if($this->session->userdata('flagSudahJawab') == TRUE) {
			redirect('tes/processSoal');
		}
		$jawabanUser	=	$this->input->post('jawab', TRUE);
		if($jawabanUser == "") {
			$jawabanUser = "-";
		}
		$waktuTes		=	$this->input->post('waktuTes', TRUE);
		$this->session->set_userdata('waktuTes', $waktuTes);
		$idOpsiA		=	$this->input->post('idOpsiA', TRUE);
		$idOpsiB		=	$this->input->post('idOpsiB', TRUE);
		$idOpsiC		=	$this->input->post('idOpsiC', TRUE);
		$idOpsiD		=	$this->input->post('idOpsiD', TRUE);
		$desOpsiA		=	$this->input->post('desOpsiA', TRUE);
		$desOpsiB		=	$this->input->post('desOpsiB', TRUE);
		$desOpsiC		=	$this->input->post('desOpsiC', TRUE);
		$desOpsiD		=	$this->input->post('desOpsiD', TRUE);
		$checkA = "";
		$checkB = "";
		$checkC = "";
		$checkD = "";
		switch($jawabanUser) {
			case($idOpsiA): $checkA = 'checked'; break;
			case($idOpsiB): $checkB = 'checked'; break;
			case($idOpsiC): $checkC = 'checked'; break;			
			case($idOpsiD): $checkD = 'checked'; break;			
			default : break;
		}
		
		$satuIdSoal		= $this->session->userdata('currentIdSoal');
		$satuSoal		= $this->tes_model->getSatuSoalTes($satuIdSoal)->row();
		$jawabanBenar 	= $satuSoal->jawaban;
		$nomorSoal		= $this->session->userdata('nomorSoal');
		$setNamaMateri	= $this->session->userdata('setNamaMateri');
		$setJawabanUser		= $this->session->userdata('setJawabanUser');
		$setJawabanUser[]	= $jawabanUser;
		$this->session->set_userdata('setJawabanUser', $setJawabanUser);
		
		//jika jawaban benar(idOpsi dari $jawabanUser == idOpsi $jawabanBenar)..
		if(strcasecmp($jawabanUser, $jawabanBenar) == 0) {
			$this->tes_model->updateJumlahBenar($satuIdSoal);
			$skorUpdate = $this->session->userdata('skor') + 10;
			$this->session->set_userdata('skor', $skorUpdate);
			
			$satuSoal = array(
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'gambar'		=>  $satuSoal->gambarSoal,
				'jawab' 		=> 	$jawabanUser,
				'idOpsiA'		=>	$idOpsiA,
				'idOpsiB'		=>	$idOpsiB,
				'idOpsiC'		=>	$idOpsiC,
				'idOpsiD'		=>	$idOpsiD,
				'desOpsiA'		=>	$desOpsiA,
				'desOpsiB'		=>	$desOpsiB,
				'desOpsiC'		=>	$desOpsiC,
				'desOpsiD'		=>	$desOpsiD,
				'checkA'		=>	$checkA,
				'checkB'		=>	$checkB,
				'checkC'		=>	$checkC,
				'checkD'		=>	$checkD,
				'nomor'			=> 	$nomorSoal,
				'skor'			=>	$skorUpdate,
				'flagJawaban'	=>	1,
				'flagNext'		=>	TRUE
			);	
			$setNilaiMateri = $this->session->userdata('setNilaiMateri');
			$setNilaiMateri[$nomorSoal-1] = "BENAR";
			$this->session->set_userdata('setNilaiMateri', $setNilaiMateri);
			$this->session->set_userdata('flagSudahJawab', TRUE);
			
		} else {
			
			$this->tes_model->updateJumlahSalah($satuIdSoal);
			
			$satuSoal = array(
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'gambar'		=>  $satuSoal->gambarSoal,
				'jawab' 		=> 	$jawabanUser,
				'idOpsiA'		=>	$idOpsiA,
				'idOpsiB'		=>	$idOpsiB,
				'idOpsiC'		=>	$idOpsiC,
				'idOpsiD'		=>	$idOpsiD,
				'desOpsiA'		=>	$desOpsiA,
				'desOpsiB'		=>	$desOpsiB,
				'desOpsiC'		=>	$desOpsiC,
				'desOpsiD'		=>	$desOpsiD,
				'checkA'		=>	$checkA,
				'checkB'		=>	$checkB,
				'checkC'		=>	$checkC,
				'checkD'		=>	$checkD,
				'nomor'			=> 	$this->session->userdata('nomorSoal'),
				'skor'			=>	$this->session->userdata('skor'),
				'flagJawaban'	=>	2,
				'flagNext'		=>	TRUE
			);		
			$this->session->set_userdata('flagSudahJawab', TRUE);
		}
		
		$this->load->view('user/tes_view', $satuSoal);		
	}
	
	public function keluarTes($kelas) 
	{
		$this->session->unset_userdata(array('setIdSoal'=>'', 'setNamaMateri'=>'', 'setNilaiMateri'=>'', 'setJawabanUser'=>'', 'currentSoal'=>'', 'idRapor'=>'', 'jumlahSoal' =>'', 'nomorSoal'=>'', 'skor'=>'', 'kelas'=>'', 'flagSudahJawab' => ''));
		redirect('/kelas/pilih/'.$kelas.'');
	}
	
	public function solusiTes() {
		$setIdSoal 	= $this->session->userdata('setIdSoal');
		$setJawabanUser = $this->session->userdata('setJawabanUser');
		$dataDB;
		foreach($setIdSoal as $row) {
			$dataTemp = $this->tes_model->getSatuSoalTes($row['idSoal'])->row();
			$dataDB[] = get_object_vars($dataTemp);
		}
		$data = array(
			'kelas'			=>	$this->session->userdata('kelas'),
			'dataSoalTes'	=>	$dataDB,
			'jumlahSoal'	=>	$this->session->userdata('jumlahSoal'),
			'setJawabanUser'=>	$setJawabanUser
		);
		
		$this->load->view('user/solusites_view', $data);
	}
}