<?php
    class dashboard extends CI_Controller{
        public function index(){
		if($this->session->userdata('role')=="admin") {
			$this->load->view('admin/dashboard_view');
		} 
		else {
			redirect('home');
		}	
	}
    }
?>