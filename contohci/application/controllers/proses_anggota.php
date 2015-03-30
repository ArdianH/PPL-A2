<?php
    class proses_anggota extends CI_Controller{
        public function index()
        {
            $this->load->model('anggota_model');	    
	    $this->load->view('proses_view');	    
        }
    }
?>