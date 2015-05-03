<?php
    class info extends CI_Controller{
        public function index()
        {
		
	}
	
	
	public function hubungi_kami()
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
		$this->session->set_userdata('captWord', $captcha['word']);
		$this->load->view('user/hubungikami_view', $captcha);
	}
	public function create()
	{
		$captcha = $this->input->post('captcha', TRUE);
		$isiPesan = $this->input->post('isi', TRUE);
		$this->session->set_userdata('isipesan', $isiPesan);
		
		if($this->session->userdata('captWord') == $captcha) {
			$this->load->model('pesan_model');

			$data = array(			
				'email' => $this->input->post('email', TRUE),
				'isi' => htmlspecialchars($isiPesan),
				'tanggal' => date("Y-m-d")
			);
			$this->pesan_model->add($data);
			echo '<script type="text/javascript">alert("Pesan Kamu Berhasil Terkirim")</script>';
			$this->session->unset_userdata('captWord');
			$this->session->unset_userdata('isipesan');
			redirect('info/hubungi_kami', 'refresh');
		} else {
			echo '<script type="text/javascript">alert("Pesan Gagal dikirim, input captcha salah")</script>';
			$this->session->unset_userdata('captWord');
			redirect('info/hubungi_kami', 'refresh');
		}
    }
}