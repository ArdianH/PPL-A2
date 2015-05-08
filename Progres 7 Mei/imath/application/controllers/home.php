<?php
    class home extends CI_Controller{
        public function index(){
            $this->load->model('kelas_model');
 
            $data['result'] = $this->kelas_model->getAllKelas()->result();          
	   
	    $this->load->view('user/home_view',$data);	    
	}
}