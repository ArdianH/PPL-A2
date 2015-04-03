<?php
//INDAH
    class PesanController extends CI_Controller{
        public function index()
        {
			
			//$this->load->model('Pesan');
 
            //$data['result'] = $this->Pesan->getAllPesan();           
	    
	    $this->load->view('PesanUI');
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

	
	public function create()
	{
		$this->load->model('Pesan');
		$data = array(
			'idPesan' => $this->input->post('idPesan'),
			'email' => $this->input->post('email'),
			'isi' => $this->input->post('isi')
		);
		
		$this->Pesan->add($data);
		//$data['result']=$this->Pesan->getAllPesan();
		echo '<script type="text/javascript">alert("Pesan Kamu Berhasil Terkirim")</script>';
		$this->load->view('PesanUI', $data);
	}
	
	
	
	
    }
?>