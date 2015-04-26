<?php
//INDAH
    class hubungi_kami extends CI_Controller{
        public function index()
        {
			$this->creator();
		}
	
	public function captcha_creator()
	{
		$valCaptcha = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'/captcha/',
			'font_path' => './system/fonts/texb.ttf',
			'img_width' => 150,
			'img_height' => 50,
			'expiration' => 3600
		);
		$captcha = create_captcha($valCaptcha);
		return $captcha;
	}

	public function creator() {
		$captcha = $this->captcha_creator();
		$this->session->set_flashdata('captWord', $captcha['word']);
		$this->load->view('user/hubungikami_view', $captcha);
	}
	public function create()
	{
		$captcha = $this->input->post('captcha', TRUE);
		if($this->session->flashdata('captWord') == $captcha) {
			$this->load->model('pesan_model');
			$data = array(			
				'email' => $this->input->post('email', TRUE),
				'isi' => htmlspecialchars($this->input->post('isi', TRUE)),
				'tanggal' => date("Y-m-d")
			);
			
			$this->pesan_model->add($data);
			//$data['result']=$this->Pesan->getAllPesan();
			echo '<script type="text/javascript">alert("Pesan Kamu Berhasil Terkirim")</script>';
			redirect('hubungi_kami', 'refresh');
		} else {
			echo '<script type="text/javascript">alert("Pesan Kamu Berhasil Terkirim")</script>';
			redirect('hubungi_kami', 'refresh');
		}		
    }
}