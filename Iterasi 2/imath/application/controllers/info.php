<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Info extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
			$this->load->helper('file');
    }
	
	public function index()
	{	
	}
	public function bantuan()
	{	
		$stringBantuan = read_file('./assets/file/bantuan.php');
		$data['stringBantuan'] = explode("\n", $stringBantuan);
		$this->load->view('user/bantuan_view', $data);
	}	
	public function tentang_kami()
	{	
		$stringTentangKami = read_file('./assets/file/tentangkami.php');
		$data['stringTentangKami'] = explode("\n", $stringTentangKami);
		$this->load->view('user/tentangkami_view', $data);
	}	
	public function kebijakan_privasi()
	{	
		$stringKebijakanPrivasi = read_file('./assets/file/kebijakanprivasi.php');
		$data['stringKebijakanPrivasi'] = explode("\n", $stringKebijakanPrivasi);
		$this->load->view('user/kebijakanprivasi_view', $data);
	}	
	
	public function setBantuan()
	{	
		$stringBantuan = read_file('./assets/file/bantuan.php');
		$data['stringBantuan'] = explode("\n", $stringBantuan);
		$this->load->view('admin/ubahbantuan_view', $data);
	}
	public function processBantuan()
	{	
		$inputStringBantuan = $this->input->post('input', TRUE);
		if(!write_file('./assets/file/bantuan.php', $inputStringBantuan)) {
			$this->session->set_flashdata("notifBantuan", "Gagal disimpan");
		} else {
			$this->session->set_flashdata("notifBantuan", "Sukses tersimpan");
		}
		redirect('info/bantuan');
	}	
	
	public function setTentangKami()
	{	
		$stringTentangKami = read_file('./assets/file/tentangkami.php');
		$data['stringTentangKami'] = explode("\n", $stringTentangKami);
		$this->load->view('admin/ubahtentangkami_view', $data);
	}
	public function processTentangKami()
	{	
		$inputStringTentangKami = $this->input->post('input', TRUE);
		if(!write_file('./assets/file/tentangkami.php', $inputStringTentangKami)) {
			$this->session->set_flashdata("notifTentangKami", "Gagal disimpan");
		} else {
			$this->session->set_flashdata("notifTentangKami", "Sukses tersimpan");
		}
		redirect('info/tentang_kami');
	}	
	
	public function setKebijakanPrivasi()
	{	
		$stringKebijakanPrivasi = read_file('./assets/file/kebijakanprivasi.php');
		$data['stringKebijakanPrivasi'] = explode("\n", $stringKebijakanPrivasi);
		$this->load->view('admin/ubahkebijakanprivasi_view', $data);
	}
	public function processKebijakanPrivasi()
	{	
		$inputStringKebijakanPrivasi = $this->input->post('input', TRUE);
		if(!write_file('./assets/file/kebijakanprivasi.php', $inputStringKebijakanPrivasi)) {
			$this->session->set_flashdata("notifKebijakanPrivasi", "Gagal disimpan");
		} else {
			$this->session->set_flashdata("notifKebijakanPrivasi", "Sukses tersimpan");
		}
		redirect('info/kebijakan_privasi');
	}	
}