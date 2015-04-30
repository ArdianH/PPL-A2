<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tes extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
			$this->load->model('tes_model');
    }
	
	public function index()
	{	
		$this->load->view("prepareTes_view");
	}	

	public function retrieveSoal($kelas)
	{
		$this->session->unset_userdata(array('setIdSoal'=>'', 'setNamaMateri'=>'', 'setNilaiMateri'=>'', 'setJawabanUser'=>'', 'currentSoal'=>'', 'idRapor'=>'', 'jumlahSoal' =>'', 'nomorSoal'=>'', 'skor'=>'', 'kelas'=>''));
		//inisialisasi Tes sesuai kelas: retrieve setIdSoal, idRapor, reset skor, reset nomorSoal, dll => masukkan ke dalam session tes.
		$dataDB = $this->tes_model->getIdSoalTes($kelas)->result_array();
		$username = $this->session->userdata('username');
		$dataDB2 = $this->tes_model->getIdRapor($username)->row();
		$idRapor = $dataDB2->idRapor;
		$jumlahSoal = count($dataDB);
		$dataSession = array(
			'kelas'			=>	$kelas,
			'nomorSoal'		=>	0,
			'skor'			=>	0,
			'setIdSoal'		=>	$dataDB,
			'jumlahSoal'	=>	$jumlahSoal,
			'idRapor'		=>	$idRapor
		);
		$this->session->set_userdata($dataSession);
		$this->processSoal("init");
	}
	
	public function processSoal($param = '')
	{
		//retrieve soal pertanyaan, setting variabel pertanyaan sebelum dikirim ke view.
		$jumlahSoal	= $this->session->userdata('jumlahSoal');
		$nomorSoal 	= $this->session->userdata('nomorSoal');
		$setIdSoal 	= $this->session->userdata('setIdSoal');
		$waktuTes	= $this->input->post('waktuTes', TRUE);
		$this->session->set_userdata('waktuTes', $waktuTes);
		
		//jika pertanyaan masih ada (tes belum selesai).
		if($nomorSoal < $jumlahSoal && $param != 'selesai'){
			$satuIdSoal	= $setIdSoal[$nomorSoal]['idSoal'];
			$satuSoal 	= $this->tes_model->getSatuSoalTes($satuIdSoal)->row();
			$nomorSoalUpdate = $nomorSoal + 1;
			$this->session->set_userdata('nomorSoal', $nomorSoalUpdate);
			$this->session->set_userdata('currentIdSoal', $satuSoal->idSoal);
			$pilihanJawaban = $this->tes_model->getJawabanSoalTes($satuIdSoal)->result_array();
			
			$satuSoal = array(
				'idSoal'		=>	$satuSoal->idSoal,
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'jawaban' 		=> 	$satuSoal->jawaban,
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
				'flagJawaban'	=>	0,
				'flagSudahJawab' => 0,
				'flagNext'		=>	FALSE
			);
			
			if($param == "init"){
				$satuSoal['flagInit'] = TRUE;
				$setIdSoal 	= $this->session->userdata('setIdSoal');
				$setNamaMateri;
				$setNilaiMateri;
				$setJawabanUser = array();
				$jumlah = $this->session->userdata('jumlahSoal');
				foreach($setIdSoal as $row) {
					$satuIdMateri = $this->tes_model->getSatuIdMateriTes($row['idSoal'])->row();
					$satuNamaMateri = $this->tes_model->getSatuNamaMateri($satuIdMateri->idMateri)->row();
					$setNamaMateri[] = $satuNamaMateri->nama;
					$setNilaiMateri[] = "SALAH";
				}
				$this->session->set_userdata('setNamaMateri', $setNamaMateri);
				$this->session->set_userdata('setNilaiMateri', $setNilaiMateri);	
				
			} else {
				$satuSoal['flagInit'] = FALSE;
			}
				
			$setNamaMateri = $this->session->userdata('setNamaMateri');
			$satuSoal['namaMateri'] = $setNamaMateri[$nomorSoal];
			$this->load->view('user/tes_view', $satuSoal);

		} else {
			$skor = $this->session->userdata('skor');
			$kelas = $this->session->userdata('kelas');
			$waktuTes = $this->session->userdata('waktuTes');
			$setNamaMateri = $this->session->userdata('setNamaMateri');
			$setNilaiMateri = $this->session->userdata('setNilaiMateri');
			$data = array(
				'kelas'			=>	$kelas,
				'skor'			=>	$skor,
				'waktuTes'		=>	$waktuTes,
				'namaPanggilan'	=>	$this->session->userdata('namaPanggilan'),
				'username'		=>	$this->session->userdata('username'),
				'jumlahSoal'	=>	$jumlahSoal,
				'setNamaMateri'=>	$setNamaMateri,
				'setNilaiMateri'=>	$setNilaiMateri
			);
			$jumlahBenar=0;
			for($i=0; $i<$jumlahSoal; $i++){
				if($setNilaiMateri[$i] == "BENAR") {
					$jumlahBenar++;
				}
			}
			
			if($jumlahBenar == $jumlahSoal){
				if($this->tes_model->getJumlahSertifikatKelas($this->session->userdata('username'), $kelas) == 0) {
					$res = $this->tes_model->setSertifikat($this->session->userdata('username'), $kelas);
				}
			}
			
			$dataSimpan = array(
				'idKelas'	=>	$data['kelas'],
				'idRapor'	=>	$this->session->userdata('idRapor'),
				'jawabanBenar'	=>	$jumlahBenar,
				'tglMengerjakan' => date("Y-m-d"),
				'lamaWaktu'		=>	$waktuTes
			);
			
			$this->tes_model->simpanDetailTes($dataSimpan);
			$this->load->view('user/detailTes_view', $data);
			
		}
	}

	public function processJawaban(){
		
		//terima input jawaban dari user (isi $jawabanUser hanya value dari idOpsi saja/A,B,C,D)
		$jawabanUser	=	$this->input->post('jawab', TRUE);
		$jawabanBenar	=	$this->input->post('jawaban', TRUE);
		$waktuTes	= $this->input->post('waktuTes', TRUE);
		$this->session->set_userdata('waktuTes', $waktuTes);
		
		$idOpsiA		=	$this->input->post('idOpsiA', TRUE);
		$idOpsiB		=	$this->input->post('idOpsiB', TRUE);
		$idOpsiC		=	$this->input->post('idOpsiC', TRUE);
		$idOpsiD		=	$this->input->post('idOpsiD', TRUE);
		$desOpsiA		=	$this->input->post('desOpsiA', TRUE);
		$desOpsiB		=	$this->input->post('desOpsiB', TRUE);
		$desOpsiC		=	$this->input->post('desOpsiC', TRUE);
		$desOpsiD		=	$this->input->post('desOpsiD', TRUE);
		
		
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
		$satuSoal 	= $this->tes_model->getSatuSoalTes($satuIdSoal)->row();
		$setJawabanUser = $this->session->userdata('setJawabanUser');
		$setJawabanUser[] = $jawabanUser;
		$this->session->set_userdata('setJawabanUser', $setJawabanUser);
		$nomorSoal = $this->session->userdata('nomorSoal');
		$setNamaMateri = $this->session->userdata('setNamaMateri');
		if($jawabanUser == $jawabanBenar) {
			//jika jawaban benar(idOpsi dari $jawabanUser == idOpsi $jawabanBenar)..
			$skorUpdate = $this->session->userdata('skor') + 10;
			$this->session->set_userdata('skor', $skorUpdate);
			$this->tes_model->updateJumlahBenar($satuIdSoal);
			$satuSoal = array(
				'namaMateri'	=>	$setNamaMateri[$nomorSoal-1],
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
				'flagSudahJawab'=>  1,	
				'flagNext'		=>	TRUE
			);	
			
			$setNilaiMateri = $this->session->userdata('setNilaiMateri');
			$setNilaiMateri[$nomorSoal-1] = "BENAR";
			$this->session->set_userdata('setNilaiMateri', $setNilaiMateri);
			
		} else {
			$this->tes_model->updateJumlahSalah($satuIdSoal);
			
			$satuSoal = array(
				'namaMateri'	=>	$setNamaMateri[$nomorSoal-1],
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'jawab' 		=> 	$jawabanUser,
				'gambar'		=>  $satuSoal->gambarSoal,
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
					
		}
		$this->load->view('user/tes_view', $satuSoal);		
		
	}
	
	public function keluarTes() {
		$this->session->unset_userdata(array('setIdSoal'=>'', 'setNamaMateri'=>'', 'setNilaiMateri'=>'', 'setJawabanUser'=>'', 'currentSoal'=>'', 'idRapor'=>'', 'jumlahSoal' =>'', 'nomorSoal'=>'', 'skor'=>'', 'kelas'=>''));
		redirect('/home');
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
		
		$this->load->view('user/solusiTes_view', $data);
	}
}