<?php
//INDAH
    class hubungi_kami extends CI_Controller{
        public function index()
        {
		$this->load->view('user/hubungikami_view');
	}

	public function create()
	{
		$this->load->model('pesan_model');
		$data = array(			
			'email' => $this->input->post('email'),
			'isi' => $this->input->post('isi'),
			'tanggal' => date("Y-m-d")
		);
		
		$this->pesan_model->add($data);
		//$data['result']=$this->Pesan->getAllPesan();
		echo '<script type="text/javascript">alert("Pesan Kamu Berhasil Terkirim")</script>';
		redirect('hubungi_kami', 'refresh');
	}	
    }
?>