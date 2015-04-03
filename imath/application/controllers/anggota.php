<?php
    class anggota extends CI_Controller{
        public function index()
        {
            $this->load->model('anggota_model');
 
            $data['result'] = $this->anggota_model->getAllAnggota();             
	    
	    $this->load->view('anggota_view',$data);
	    }
	    
	public function done($id){
		$this->load->model('anggota_model');
		$data = array(
			'role' => 'user'
		);
		
		$this->anggota_model->update($data, $id);
		redirect('anggota', 'refresh');
	}

	public function delete($id){
		$this->load->model('anggota_model');		
		
		$this->anggota_model->delete($id);
		redirect('anggota', 'refresh');
	}
	
	
	public function edit($id){
		$this->load->model('anggota_model');		
		
		$data['result'] = $this->anggota_model->get($id); 
		$this->load->view('ubah_anggota_view', $data);
	}
	
	public function simpanPerubahan($id){
		$this->load->model('anggota_model');		
		
		$data = array(			
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),	
		);
		
		$this->db->where('username', $id);
		$this->db->update('Akun', $data);
		redirect('anggota', 'refresh');
	}
	
    }
?>