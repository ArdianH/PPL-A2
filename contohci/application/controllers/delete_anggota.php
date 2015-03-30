<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
	class delete_anggota extends CI_Controller{

		public function index(){
			$this->load->model('anggota_model');
			$this->anggota_model->deleteHistory(); 
			$data['result'] = $this->anggota_model->getAllAnggota();  
			redirect('anggota','refresh');
		}		
	}
?>