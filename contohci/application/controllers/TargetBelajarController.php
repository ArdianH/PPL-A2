<?php
    class TargetBelajarController extends CI_Controller{
        public function index()
        {
            $this->load->model('TargetBelajar');
 
            $data['result'] = $this->TargetBelajar->getAllTargetBelajar(); 
	    $data['history'] = $this->TargetBelajar->getHistory();            
	    
	    $this->load->view('TargetBelajarUI',$data);
	    }
	    
	public function done($id){
		$this->load->model('TargetBelajar');
		$data = array(
			'isselesai' => 'tercapai'
		);
		
		$this->TargetBelajar->update($data, $id);
		redirect('TargetBelajarController', 'refresh');
	}

	public function delete($id){
		$this->load->model('TargetBelajar');		
		
		$this->TargetBelajar->delete($id);
		redirect('TargetBelajarController', 'refresh');
	}
	
	
	public function edit($id){
		$this->load->model('TargetBelajar');		
		
		$data['result'] = $this->TargetBelajar->get($id); 
		$this->load->view('UbahTargetBelajarUI', $data);
	}
	
	public function simpanPerubahan($id){
		$this->load->model('TargetBelajar');		
		
		$data = array(			
			'username' => $this->input->post('username'),
			'idmateri' => $this->input->post('idmateri'),
			'idkelas' => $this->input->post('idkelas'),			
			'banyaksoal' => $this->input->post('banyaksoal'),
			'targetnilai' => $this->input->post('targetnilai'),			
		);
		
		$this->db->where('idTargetBelajar', $id);
		$this->db->update('TargetBelajar', $data);
		redirect('TargetBelajarController', 'refresh');
	}
	
	public function hapusHistory(){
		$this->load->model('TargetBelajar');		
		$this->TargetBelajar->deleteHistory(); 
		redirect('TargetBelajarController', 'refresh');
	}
    }
?>