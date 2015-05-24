<?php
    class anggota extends CI_Controller{
        public function index()
        {
		if($this->session->userdata('role')=="admin") {
			$this->load->model('anggota_model');
			$data['result'] = $this->anggota_model->getAllAnggota();             
			$this->load->view('admin/anggota_view',$data);
		} else {
			redirect('home');
		}	            
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
		$message = "Anggota berhasil dihapus";
		$this->session->set_flashdata('messageAnggota',$message);
		redirect('admin/anggota', 'refresh');
	}
	
	
	public function edit($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('anggota_model');		
			$data['result'] = $this->anggota_model->get($id); 
			$this->load->view('admin/ubahanggota_view', $data);
		} else {
			redirect('home');
		}	
	}
	
	public function simpanPerubahan($id){
		$this->load->model('anggota_model');		
		
		$data = array(			
			'username' => $this->input->post('username'),			
			'email' => $this->input->post('email'),
			'namaPanggilan' => $this->input->post('namaPanggilan')
		);
		if($this->anggota_model->get($data['username']) >= 1) {
			$message = "Username Anggota gagal diubah, silahkan pilih username lain.";
		} else {
			$this->db->where('username', $id);
			$this->db->update('Akun', $data);
			$message = "Anggota berhasil diubah";
		}
		$this->session->set_flashdata('messageAnggota',$message);
		redirect('admin/anggota', 'refresh');
	}
	
    }
?>