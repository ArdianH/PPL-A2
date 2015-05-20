<?php
    class pesan extends CI_Controller{
        public function index()
        {
		if($this->session->userdata('role')=="admin") {
			$this->load->model('pesan_model');	 
			$data['result'] = $this->pesan_model->getAllPesan();	    
			$this->load->view('admin/pesan_view',$data);
		} 
		else {
			redirect('home');
		}	
	}
	
	public function delete($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('pesan_model');
			$this->pesan_model->delete($id);
			$message = "Pesan berhasil dihapus";
			$this->session->set_flashdata('messagePesan',$message);
			redirect('admin/pesan', 'refresh');
		} 
		else {
			redirect('home');
		}	
	}
	
    }
?>