<?php
    class target_belajar extends CI_Controller{
        public function index()
        {
            $this->load->model('targetbelajar_model');
 
            $data['result'] = $this->targetbelajar_model->getAllTargetBelajar(); 
	    $data['history'] = $this->targetbelajar_model->getHistory();            
	    
	    $this->load->view('user/targetbelajar_view',$data);
	    }
	    
	public function done($id){
		$this->load->model('targetbelajar_model');
		$data = array(
			'isselesai' => 'tercapai'
		);
		
		$this->targetbelajar_model->update($data, $id);
		redirect('target_belajar', 'refresh');
	}

	public function delete($id){
		$this->load->model('targetbelajar_model');
		
		$this->targetbelajar_model->delete($id);
		redirect('target_belajar', 'refresh');
	}
	
	
	public function edit($id){
		$this->load->model('targetbelajar_model');
		$this->load->model('kelas_model');	
		
		$data['result'] = $this->targetbelajar_model->get($id); 
		$data['kelas'] = $this->kelas_model->getAllKelas();
		
		$this->load->view('user/ubahtargetbelajar_view', $data);
	}
	
	public function simpanPerubahan($id){
		$this->load->model('targetbelajar_model');	
		
		$data = array(			
			'username' => $this->input->post('username'),
			'idmateri' => $this->input->post('idmateri'),
			'idkelas' => $this->input->post('kelas'),			
			'banyaksoal' => $this->input->post('banyaksoal'),
			'targetnilai' => $this->input->post('targetnilai'),			
		);
		
		$this->db->where('idTargetBelajar', $id);
		$this->db->update('TargetBelajar', $data);
		redirect('target_belajar', 'refresh');
	}
	
	public function hapusHistory(){
		$this->load->model('targetbelajar_model');
		$this->targetbelajar_model->deleteHistory(); 
		redirect('target_belajar', 'refresh');
	}	
	
	public function buatBaru(){		
		$this->load->model('kelas_model');	
				
		$data['kelas'] = $this->kelas_model->getAllKelas();
		
		$this->load->view('user/buattargetbelajar_view', $data);
	}
	
	public function create()
	{
		$this->load->model('targetbelajar_model');
		$data = array(
			'idtargetbelajar' => $this->input->post('idtargetbelajar'),
			'username' => $this->input->post('username'),
			'idmateri' => $this->input->post('idmateri'),
			'idkelas' => $this->input->post('idkelas'),			
			'banyaksoal' => $this->input->post('banyaksoal'),
			'targetnilai' => $this->input->post('targetnilai'),
			'tanggal' => date("Y-m-d"),
			'isselesai' => 'tidak'
		);
		
		$this->targetbelajar_model->add($data);
		redirect('target_belajar');
	}
	
	public function apasaja($input)
	{
		
	//	return
	}
    }
?>