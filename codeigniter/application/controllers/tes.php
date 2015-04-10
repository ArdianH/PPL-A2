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
		$jumlahSoal = count($dataDB);
		$dataSession = array(
			'kelas'			=>	$kelas,
			'nomorSoal'		=>	0,
			'skor'			=>	0,
			'setIdSoal'		=>	$dataDB,
			'jumlahSoal'	=>	$jumlahSoal
		);
		$this->session->set_userdata($dataSession);
		$this->processSoal("init");
	}
	
	public function processSoal($param = '')
	{
		$jumlahSoal	= $this->session->userdata('jumlahSoal');
		$nomorSoal 	= $this->session->userdata('nomorSoal');
		$setIdSoal 	= $this->session->userdata('setIdSoal');
	
		if($nomorSoal < $jumlahSoal && $param != 'selesai'){
			$satuIdSoal	= $setIdSoal[$nomorSoal]['idSoal'];
			$satuSoal 	= $this->tes_model->getSatuSoalTes($satuIdSoal)->row();
			$nomorSoalUpdate = $nomorSoal + 1;
			$this->session->set_userdata('nomorSoal', $nomorSoalUpdate);
			$this->session->set_userdata('currentIdSoal', $satuSoal->idSoal);

			
			$pilihanJawaban = $this->tes_model->getJawabanSoalTes($satuIdSoal)->result_array();
			shuffle($pilihanJawaban);
			$satuSoal = array(
				'idSoal'		=>	$satuSoal->idSoal,
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'jawaban' 		=> 	$satuSoal->jawaban,
				'opsiA'			=>	$pilihanJawaban[0]['deskripsi'],
				'opsiB'			=>	$pilihanJawaban[1]['deskripsi'],
				'opsiC'			=>	$pilihanJawaban[2]['deskripsi'],
				'opsiD'			=>	$pilihanJawaban[3]['deskripsi'],
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
			$this->load->view('tes_view', $satuSoal);
			
		} else {
			$data = array(
				'kelas'			=>	$this->session->userdata('kelas'),
				'skor'			=>	$this->session->userdata('skor'),
				'namaPanggilan'	=>	$this->session->userdata('namaPanggilan')
			);
			$this->load->view('detailTes_view', $data);
		}
		
	}

	public function processJawaban(){
		
		$jawabanUser	=	$this->input->post('jawab', TRUE);
		$jawabanBenar	=	$this->input->post('jawaban', TRUE);
		$opsiA		=	$this->input->post('opsiA', TRUE);
		$opsiB		=	$this->input->post('opsiB', TRUE);
		$opsiC		=	$this->input->post('opsiC', TRUE);
		$opsiD		=	$this->input->post('opsiD', TRUE);
		$checkA = '';
		$checkB = '';
		$checkC = '';
		$checkD = '';
		switch($jawabanUser) {
			case($opsiA): $checkA = 'checked'; break;
			case($opsiB): $checkB = 'checked'; break;
			case($opsiC): $checkC = 'checked'; break;			
			case($opsiD): $checkD = 'checked'; break;			
			default : break;
		}
		$satuIdSoal = $this->session->userdata('currentIdSoal');
		$satuSoal 	= $this->tes_model->getSatuSoalTes($satuIdSoal)->row();

		if($jawabanUser == $jawabanBenar) {
			//jika jawaban benar..
			$skorUpdate = $this->session->userdata('skor') + 10;
			$this->session->set_userdata('skor', $skorUpdate);
			$satuSoal = array(
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'jawab' 		=> 	$jawabanUser,
				'opsiA'			=>	$opsiA,
				'opsiB'			=>	$opsiB,
				'opsiC'			=>	$opsiC,
				'opsiD'			=>	$opsiD,
				'checkA'		=>	$checkA,
				'checkB'		=>	$checkB,
				'checkC'		=>	$checkC,
				'checkD'		=>	$checkD,
				'nomor'			=> 	$this->session->userdata('nomorSoal'),
				'skor'			=>	$skorUpdate,
				'flagJawaban'	=>	1,
				'flagNext'		=>	TRUE
			);	

		} else {
			$satuSoal = array(
				'pertanyaan' 	=> 	$satuSoal->pertanyaan,
				'jawab' 		=> 	$jawabanUser,
				'opsiA'			=>	$opsiA,
				'opsiB'			=>	$opsiB,
				'opsiC'			=>	$opsiC,
				'opsiD'			=>	$opsiD,
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