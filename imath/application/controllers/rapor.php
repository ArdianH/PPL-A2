<?php
//INDAH
    class Rapor extends CI_Controller{
        public function index()
        {          
	    $this->load->model('Kelas');
		$data['Kelas'] = $this->Kelas->getAllKelas(); 
	    $this->load->view('rapor_view', $data);
	    }
		
		public function show()
	{
		$this->load->model('Pesan');
		$data['result'] = $this->Pesan->getAllPesan(); 
		$this->load->view('DaftarPesanUI', $data);
	}
	    
		public function insert(){
		$this->load->model('Pesan');
		$this->pesan->insertPesan();
		//$this->load->view('KelasUI');
	}

	public function delete($id){
		$this->load->model('Pesan');		
		
		$this->Pesan->delete($id);
		redirect('PesanController/show/', 'refresh');
		
	}

	
	
	
	
	
    }
?>