<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Latihan extends CI_Controller {

	public function __construct()
	{
            parent::__construct();
			$this->load->model('latihan_model');
	}
	
	    //public function index()
        //{
			//if($this->session->userdata('idMateri')==$kelas) {
				//$this->load->model('latihan_model');
				//$data['result'] = $this->latihan_model->getAllMateri();      				
				//$this->load->view('detailLatihan_view',$data);
			//} else {
				//redirect('home');
			//}		
			
	    //}
	public function retrieveSoal($kelas)
	{
		$this->session->unset_userdata(array('setIdSoal'=>'', 'currentSoal'=>'', 'jumlahSoal' =>'', 'nomorSoal'=>'', 'skor'=>'', 'jawabanTrue'=>'', 'kelas'=>''));
		$dataDB = $this->latihan_model->getIdSoalTes($kelas)->result_array();
		$dataDB2 = $this->latihan_model->getIdKelas($kelas)->row();
		$idKelas = $dataDB2->idKelas;
		shuffle($dataDB);
		//$jumlahSoal = count($dataDB);
		$jumlahSoal = 5;
		$dataSession = array(
			'kelas'			=>	$kelas,
			'nomorSoal'		=>	0,
			'skor'			=>	0,
			'jumlahTrue'	=>  0,
			'setIdSoal'		=>	$dataDB,
			'jumlahSoal'		=>	$jumlahSoal,
			'idKelas'		=>	$idKelas
		);
		if($this->session->userdata('loggedin')) {
			$username = $this->session->userdata('username');
			$dataDB3 = $this->latihan_model->getIdRapor($username)->row();
			$idRapor = $dataDB3->idRapor;
			$dataSession['idRapor'] = $idRapor;
		}
		$this->session->set_userdata($dataSession);
		$this->processSoal("init");
	}
	
	public function processSoal($param = '')
	{
		$jumlahSoal	= $this->session->userdata('jumlahSoal');
		$nomorSoal 	= $this->session->userdata('nomorSoal');
		$setIdSoal 	= $this->session->userdata('setIdSoal');
		$waktuTes	= $this->input->post('waktuTes', TRUE);
		$this->session->set_userdata('waktuTes', $waktuTes);
		
		if($nomorSoal < 10 && $param != 'selesai'){
			$satuIdSoal	= $setIdSoal[$nomorSoal]['idSoal'];
			$satuSoal 	= $this->latihan_model->getSatuSoalTes($satuIdSoal)->row();

			$nomorSoalUpdate = $nomorSoal + 1;
			$this->session->set_userdata('nomorSoal', $nomorSoalUpdate);
			$this->session->set_userdata('currentIdSoal', $satuSoal->idSoal);
			$namaMateri = $this->latihan_model->getNamaMateri($satuSoal->idSoal)->result_array();
			$namaMateri = $namaMateri[0]['nama'];
			$this->session->set_userdata('namaMateri', $namaMateri);
			$pilihanJawaban = $this->latihan_model->getJawabanSoalTes($satuIdSoal)->result_array();

			$satuSoal = array(
				'idSoal'		=>	$satuSoal->idSoal,
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'jawaban' 		=> 	$satuSoal->jawaban,
				'pembahasan'	=>  $satuSoal->pembahasan,
				'namaMateri'	=>	$namaMateri,
				'gambar'		=>  $satuSoal->gambarSoal,
				
				'idOpsiA'		=>	$pilihanJawaban[0]['pilihanGanda'],
				'idOpsiB'		=>	$pilihanJawaban[1]['pilihanGanda'],
				'idOpsiC'		=>	$pilihanJawaban[2]['pilihanGanda'],
				'idOpsiD'		=>	$pilihanJawaban[3]['pilihanGanda'],
				'desOpsiA'		=>	$pilihanJawaban[0]['deskripsi'],
				'desOpsiB'		=>	$pilihanJawaban[1]['deskripsi'],
				'desOpsiC'		=>	$pilihanJawaban[2]['deskripsi'],
				'desOpsiD'		=>	$pilihanJawaban[3]['deskripsi'],
				'nomor'			=> 	$this->session->userdata('nomorSoal'),
				'skor'			=>	$this->session->userdata('skor'),
				'jawabanTrue'	=>  $this->session->userdata('jawabanTrue'),
				'flagJawaban'	=>	0,
				'flagNext'		=>	FALSE
			);
			
			if($param == "init"){
				$satuSoal['flagInit'] = TRUE;
			} else {
				$satuSoal['flagInit'] = FALSE;
			}

			$this->load->view('user/latihan_view', $satuSoal);
			
		} else {
			$waktuTes = $this->session->userdata('waktuTes');	
			$jawabanBenar = $this->session->userdata('jawabanTrue');
			$idMateri = $this->session->userdata('kelas');
			$data = array(
				'kelas'		=>	$this->session->userdata('kelas'),				
				'skor'			=>	$this->session->userdata('skor'),
				'jawabanTrue'	=>  $this->session->userdata('jawabanTrue'),
				'namaPanggilan'	=>	$this->session->userdata('namaPanggilan'),
				'waktuTes'		=>	$waktuTes,
			);
				
			$dataToDB = array(
				'idKelas'			=>	$this->session->userdata('idKelas'),
				'idMateri'			=>  $idMateri,
				'jawabanBenar'		=>  $jawabanBenar,
				'idRapor'			=>	$this->session->userdata('idRapor'), //disesuaiakan dgn username di tabel AKUN
				'tglMengerjakan' 	=>  date("Y-m-d"),
				'lamaWaktu'			=>  $waktuTes
			);
			
			if($this->session->userdata('loggedin')) {
				$this->load->model('latihan_model');
				$this->latihan_model->add($dataToDB);
			
				
				
				if($jawabanBenar = 10){
					$this->load->model('latihan_model');
					$this->latihan_model->addMedali($this->session->userdata('username'), $idMateri);
				} else {
					
				}
			}
			$this->load->view('user/detailLatihan_view', $data);  //INIIIII MEDALI KALAU UDAH 10 SOAL YAAA :D
		}
		
	}

	public function processJawaban(){
		
		$jawabanUser		=	$this->input->post('jawab', TRUE);
		$jawabanBenar		=	$this->input->post('jawaban', TRUE);
		$pembahasanSoal 	= 	$this->input->post('pembahasan', TRUE);
		$idOpsiA		=	$this->input->post('idOpsiA', TRUE);
		$idOpsiB		=	$this->input->post('idOpsiB', TRUE);
		$idOpsiC		=	$this->input->post('idOpsiC', TRUE);
		$idOpsiD		=	$this->input->post('idOpsiD', TRUE);
		$desOpsiA		=	$this->input->post('desOpsiA', TRUE);
		$desOpsiB		=	$this->input->post('desOpsiB', TRUE);
		$desOpsiC		=	$this->input->post('desOpsiC', TRUE);
		$desOpsiD		=	$this->input->post('desOpsiD', TRUE);
		//$idSoal = $this->input->post('idSoal', TRUE);
		//$satuSoal = $this->session->userdata('currentSoal');
		$checkA = '';
		$checkB = '';
		$checkC = '';
		$checkD = '';
		switch($jawabanUser) {
			case($idOpsiA): $checkA = 'checked'; break;
			case($idOpsiB): $checkB = 'checked'; break;
			case($idOpsiC): $checkC = 'checked'; break;			
			case($idOpsiD): $checkD = 'checked'; break;			
			default : break;
		}

		$satuIdSoal = $this->session->userdata('currentIdSoal');
		$satuSoal 	= $this->latihan_model->getSatuSoalTes($satuIdSoal)->row();

		
		if($jawabanUser == $jawabanBenar) {
			//jika jawaban benar..
			$skorUpdate = $this->session->userdata('skor') + 10;
			$jawabanTrueUpdate = $this->session->userdata('jawabanTrue') + 1;
			$this->session->set_userdata('skor', $skorUpdate);
			$this->session->set_userdata('jawabanTrue', $jawabanTrueUpdate);
			$satuSoal = array(
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'jawabanBenar'	=>	$jawabanBenar,
				'pembahasanSoal'=>  $pembahasanSoal,
				'namaMateri'	=>	$this->session->userdata('namaMateri'),
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
				'skor'			=>	$skorUpdate,
				'jawabanTrue'	=>  $jawabanTrueUpdate,
				
				'flagJawaban'	=>	1,
				'flagNext'		=>	TRUE
			);	

		} else {
			$satuSoal = array(
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'jawabanBenar'	=>	$jawabanBenar,
				'pembahasanSoal' =>  $pembahasanSoal,
				
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
				'jawabanTrue'	=>  $this->session->userdata('jawabanTrue'),
				'flagJawaban'	=>	2,
				'flagNext'		=>	TRUE
			);
		}
		$this->load->view('user/latihan_view', $satuSoal);		
		
	}
	
	public function keluarTes() {
		$this->session->unset_userdata(array('setIdSoal'=>'', 'currentSoal'=>'', 'jumlahSoal' =>'', 'nomorSoal'=>'', 'skor'=>'', 'jawabanTrue'=>'', 'kelas'=>''));
		redirect('/home/');
	}
	
	public function solusiLatihan() {
		$currentIdSoal 	= $this->session->userdata('currentIdSoal');
		$dataTemp = $this->latihan_model->getSatuSoalTes($currentIdSoal)->row();
		$data = array(
			'kelas'			=>	$this->session->userdata('kelas'),
			'dataSoalTes'	=>	$dataTemp
		);

		$this->load->view('user/latihan_view', $data);
	}
}