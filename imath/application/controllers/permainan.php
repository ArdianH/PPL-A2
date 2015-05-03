<?php
    class permainan extends CI_Controller{
	public function index()
        {
		$this->load->view('user/permainan_view');
	}	
	
	public function dressup_and_decorate()
        {
		$this->load->view('user/dressupanddecorate_view');
	}	
}