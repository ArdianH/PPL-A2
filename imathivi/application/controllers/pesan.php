<?php
    class pesan extends CI_Controller{
        public function index()
        {
            $this->load->model('pesan_model');
 
            $data['result'] = $this->pesan_model->getAllPesan();	    
	    
	    $this->load->view('pesan_view',$data);
	}
	
	public function delete($id){
		$this->load->model('pesan_model');
		
		$this->pesan_model->delete($id);
		redirect('pesan', 'refresh');
	}
	
    }
?>