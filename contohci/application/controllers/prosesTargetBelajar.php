<?php
    class prosesTargetBelajar extends CI_Controller{
        public function index()
        {
            $this->load->model('TargetBelajar');	    
	    $this->load->view('proses');	    
        }
    }
?>