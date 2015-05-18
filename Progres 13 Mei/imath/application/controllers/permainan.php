<?php
    class permainan extends CI_Controller{
	public function index()
        {
		$this->load->view('user/permainan_view');
	}	

	public function __construct()
	{
            parent::__construct();
			$this->load->helper('file');
	}

	public function dressup_and_decorate()
        {
		$this->load->view('user/dressupanddecorate_view');
	}

	public function ulartangga(){
		//$stringSoal = read_file('./assets/file/soal.php');
		//$data['stringSoal'] = explode("\n", $stringSoal);

		//$this->session->unset_userdata(array('stringSoal'=>''));

		// ###
		$stringBantuan = read_file('./assets/file/soal.php');
		$data['stringBantuan'] = explode("\n", $stringBantuan);
		$this->load->view('user/ulartangga_view', $data);
		// ###

		//$lines = file('./assets/file/soal.php');
		//$data['stringSoal'] = $lines[array_rand($lines)];

		//$dataSession = array(
		//	'stringSoal'			=>	$data['stringSoal'],
		//);
		//$this->session->set_userdata($dataSession);

		//$this->load->view('user/ulartangga_view', $data);
	}

	public function process_jawaban() {
		$jawabanUser = $this->input->post('jawaban', TRUE);
		$data = array(
			'jawaban' => $jawabanUser,
		);

		$stringSoal	= $this->session->userdata('stringSoal');
		$answer = substr ($stringSoal, -5);

		if($answer == $jawabanUser+" ") {
			echo "TRUE"."<br>";

			//echo $answer."<br>";
			//echo $jawabanUser;
		}else{
			echo "FALSE"."<br>";

			//echo $answer."<br>";
			//echo $jawabanUser;
		}

	}	
}