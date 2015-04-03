<?php
    class daftar_kelas extends CI_Controller{
        public function index(){
		$this->load->model('kelas_model');
		$data['result'] = $this->kelas_model->getAllKelas();           
	    
		$this->load->view('admin/daftarkelas_view',$data);
	}
	    
	public function detail($id){
		$this->load->model('kelas_model');
		$data['result'] = $this->kelas_model->get($id);
		$this->load->view('DetailKelasUI', $data);
	}
	

	public function delete($id){
		$this->load->model('kelas_model');
		
		$this->Kelas->delete($id);
		redirect('KelasController', 'refresh');
		
	}
	
	
	public function edit($id){
		$this->load->model('kelas_model');
		
		$data['result'] = $this->kelas_model->get($id); 
		$this->load->view('UbahKelasUI', $data);
	}
	
	public function simpanPerubahan($id){
		$this->load->model('Kelas');		
		
		$data = array(			
			'idKelas' => $this->input->post('idKelas'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $this->input->post('gambar'),					
		);
		
		$this->db->where('idKelas', $id);
		$this->db->update('Kelas', $data);
		redirect('KelasController', 'refresh');
	}
	
	public function buatBaru(){
		$this->load->view('admin/buatkelas_view');
	}
	
	public function create()
	{
		$this->load->model('kelas_model');
		$data = array(
			'nama' => $this->input->post('nama'),
			'idKelas' => $this->input->post('idKelas'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		
		$this->materimodel->add($data);
		redirect('matericontroller');
	}
	
    }
?>