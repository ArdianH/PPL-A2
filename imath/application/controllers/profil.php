<?php
    class profil extends CI_Controller{
        public function index()
        {
            $this->load->model('profil_model');
	    $username = 'princess_anna'; //nanti diganti
            $data['result'] = $this->profil_model->getProfil($username);
	    
	    $this->load->view('user/profil_view',$data);
	}
	
	public function ubah(){
		$this->load->model('profil_model');
		$username = 'princess_anna';
		
		$data['result'] = $this->profil_model->getProfil($username); 
		$this->load->view('user/ubahprofil_view', $data);
	}
		
	public function simpanPerubahan($username){
		$this->load->model('profil_model');		
		
		$data = array(			
			'namapanggilan' => $this->input->post('namapanggilan'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')		
		);
		
		$this->db->where('username', $username);
		$this->db->update('akun', $data);
		redirect('profil', 'refresh');
	}
    }
?>