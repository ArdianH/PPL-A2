<?php
    class home extends CI_Controller{
        public function index(){
            $this->load->model('kelas_model');
 
            $data['result'] = $this->kelas_model->getAllKelas();          
	   
	    $this->load->view('user/kelas_view',$data);	    
	}
}