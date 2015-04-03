<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
	class deleteTargetBelajar extends CI_Controller{

		public function index(){
			$this->load->model('TargetBelajar');
			$this->TargetBelajar->deleteHistory(); 
			$data['result'] = $this->TargetBelajar->getAllTargetBelajar();  
			$data['history'] = $this->TargetBelajar->getHistory();
			redirect('TargetBelajarController','refresh');
		}		
	}
?>