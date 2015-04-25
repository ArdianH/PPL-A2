<?php
    class profil extends CI_Controller{
        public function index()
        {
		if($this->session->userdata('loggedin')) {
			$this->load->model('anggota_model');
			$username = $this->session->userdata('username'); //sudah diganti
			$data['result'] = $this->anggota_model->get($username);
			$this->load->view('user/profil_view',$data);
		} 
		else {
			redirect('home');
		}
	}
	
	public function ubah(){
		if($this->session->userdata('loggedin')) {
			$this->load->model('anggota_model');
			$username = $this->session->userdata('username'); //sudah diganti
			$data['result'] = $this->anggota_model->get($username); 
			$this->load->view('user/ubahprofil_view', $data);
		} 
		else {
			redirect('home');
		}
	}
		
	public function simpanPerubahan(){
		if($this->session->userdata('loggedin')) {
			$this->load->model('anggota_model');				
			$data = array(			
				'namapanggilan' => $this->input->post('namapanggilan'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password'))		
			);
			$username = $this->session->userdata('username'); //sudah diganti			
			$this->anggota_model->update($data, $username);
			redirect('profil', 'refresh');
		} 
		else {
			redirect('home');
		}
	}
    }
?>