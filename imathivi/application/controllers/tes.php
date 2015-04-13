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
		$this->session->unset_userdata(array('setIdSoal'=>'', 'currentSoal'=>'', 'jumlahSoal' =>'', 'nomorSoal'=>'', 'skor'=>'', 'kelas'=>''));
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
		$jumlahSoal	= $this->session->userdata('jumlahSoal');
		$nomorSoal 	= $this->session->userdata('nomorSoal');
		$setIdSoal 	= $this->session->userdata('setIdSoal');
		$waktuTes	= $this->input->post('waktuTes', TRUE);
		$this->session->set_userdata('waktuTes', $waktuTes);
	
		if($nomorSoal < $jumlahSoal && $param != 'selesai'){
			$satuIdSoal	= $setIdSoal[$nomorSoal]['idSoal'];
			$satuSoal 	= $this->tes_model->getSatuSoalTes($satuIdSoal)->row();
			//print_r($satuSoal);
			//echo $satuSoal[0]['pertanyaan'];
			$nomorSoalUpdate = $nomorSoal + 1;
			$this->session->set_userdata('nomorSoal', $nomorSoalUpdate);
			$this->session->set_userdata('currentIdSoal', $satuSoal->idSoal);
			//langsung kirim saja ke view			
			//implement jawaban
			
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
				'flagNext'		=>	FALSE
			);
			
			if($param == "init"){
				$satuSoal['flagInit'] = TRUE;
			} else {
				$satuSoal['flagInit'] = FALSE;
			}
			//$satuSoal['notifJawaban'] = "Tester";
			//$satuSoal['nomor']			=	$this->session->userdata('nomorSoal');
			//$satuSoal['skor']			=	$this->session->userdata('skor');
			//$satuSoal['flagJawaban']	=	0;
			//$satuSoal['flagNext']		=	FALSE;
			
			/*
			echo $satuSoal['idSoal'];
			echo $satuSoal['pertanyaan'];
			echo $satuSoal['jawaban'];
			echo $satuSoal['nomor'];
			echo $satuSoal['skor'];
			echo $satuSoal['flagJawaban'];
			echo "<br/>";
			echo $satuSoal['flagNext'];
			*/
			
			$this->load->view('user/tes_view', $satuSoal);
			
			
		} else {
			$skor = $this->session->userdata('skor');
			$waktuTes = $this->session->userdata('waktuTes');
			
			$data = array(
				'kelas'			=>	$this->session->userdata('kelas'),
				'skor'			=>	$skor,
				'jumlahBenar'	=>	($skor/10.0),
				'jumlahSalah'	=>	($jumlahSoal - ($skor/10.0)),
				'waktuTes'		=>	$waktuTes,
				'namaPanggilan'	=>	$this->session->userdata('namaPanggilan'),
				'username'		=>	$this->session->userdata('username'),
			);
			//echo $waktuTes;
			//echo $data['kelas'];
			//echo $data['jumlahBenar'];
			//echo $this->session->userdata('idRapor');
			//print_r(getdate(time()));
			
			$dataSimpan = array(
				'idKelas'	=>	$data['kelas'],
				'idRapor'	=>	$this->session->userdata('idRapor'),
				'jawabanBenar'	=>	$data['jumlahBenar'],
				'tanggalMengerjakan' => date("Y-m-d"),
				'lamaWaktu'		=>	$waktuTes
			);
			$this->tes_model->simpanDetailTes($dataSimpan);
			$this->load->view('detailTes_view', $data);
			
		}
		
	}

	public function processJawaban(){
		
		$jawabanUser	=	$this->input->post('jawab', TRUE);
		$jawabanBenar	=	$this->input->post('jawaban', TRUE);
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
		/*
		if($jawabanUser == $opsiA){
			$checkA = 'checked';
		} elseif($jawabanUser == $opsiB){
			$checkB = 'checked';
		} elseif($jawabanUser == $opsiC){
			$checkC = 'checked';
		} else{
			$checkD = 'checked';
		}		
		*/
		$satuIdSoal = $this->session->userdata('currentIdSoal');
		$satuSoal 	= $this->tes_model->getSatuSoalTes($satuIdSoal)->row();

		
		/*
			echo $satuSoal;
			echo count($satuSoal);
			
			echo $satuSoal['satuSoal'];
			echo "pertanyaan :".$satuSoal['pertanyaan'];
			echo $jawaban;
			echo $satuSoal['satuSoal']['nomor'];
			echo $satuSoal['$satuSoal']['skor'];
			echo $satuSoal['flagJawaban'];
			echo "<br/>";
			echo $satuSoal['flagNext'];
		*/	
		
		if($jawabanUser == $jawabanBenar) {
			//jika jawaban benar..
			$skorUpdate = $this->session->userdata('skor') + 10;
			$this->session->set_userdata('skor', $skorUpdate);
			$satuSoal = array(
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
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
				'flagJawaban'	=>	1,
				'flagNext'		=>	TRUE
			);	
			//$satuSoal['flagJawaban'] = 1;
			//$satuSoal['skor']	=	$skorUpdate;
			//$satuSoal['notifJawaban'] = "Jawaban Anda Benar!";
		} else {
			$satuSoal = array(
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
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
			
			//$satuSoal['flagJawaban'] = 2;
			//$satuSoal['skor']	=	$this->session->userdata('skor');
			//$satuSoal['notifJawaban'] = "Jawaban Anda Salah :(";
		}
		//tombol next muncul hanya setelah user menjawab pertanyaan.
		//$satuSoal['jawabanUser'] = $jawabanUser;
		$this->load->view('tes_view', $satuSoal);		
		
	}
	
	public function keluarTes() {
		$this->session->unset_userdata(array('setIdSoal'=>'', 'currentSoal'=>'', 'jumlahSoal' =>'', 'nomorSoal'=>'', 'skor'=>'', 'kelas'=>''));
		redirect('/tes');
	}
	
	public function solusiTes() {
		$setIdSoal 	= $this->session->userdata('setIdSoal');
		$dataDB;
		foreach($setIdSoal as $row) {
			$dataTemp = $this->tes_model->getSatuSoalTes($row['idSoal'])->row();
			$dataDB[] = $dataTemp;
		}
		$data = array(
			'kelas'			=>	$this->session->userdata('kelas'),
			'dataSoalTes'	=>	$dataDB
		);

		$this->load->view('solusiTes_view', $data);
	}
}