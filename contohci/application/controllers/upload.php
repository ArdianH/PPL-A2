<?php

class upload extends CI_Controller {

	function index()
	{
		$this->do_upload();
	}

	function do_upload()
	{

		$this->load->library('upload');


		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
}
?>