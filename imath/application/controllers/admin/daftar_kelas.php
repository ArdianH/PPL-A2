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
		$this->load->view('admin/detailkelas_view', $data);
	}
	

	public function delete($id){
		$this->load->model('kelas_model');
		$this->kelas_model->delete($id);
		redirect('admin/daftar_kelas', 'refresh');		
	}
	
	
	public function edit($id){
		$this->load->model('kelas_model');
		
		$data['result'] = $this->kelas_model->get($id); 
		$this->load->view('admin/ubahkelas_view', $data);
	}
	
	public function simpanPerubahan($id){
		$this->load->model('kelas_model');		
		
		$data = array(			
			'idKelas' => $this->input->post('idKelas'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $this->input->post('gambar'),					
		);
		
		$this->db->where('idKelas', $id);
		$this->db->update('Kelas', $data);
		redirect('admin/daftar_kelas', 'refresh');
	}
	
	public function buatBaru(){
		$this->load->model('kelas_model');
		$data['result'] = $this->kelas_model->getAllKelas();	    		
		$this->load->view('admin/buatkelas_view', $data);
	}
	
	public function unggah($id){
		$this->load->model('kelas_model');
		$data['result'] = $this->kelas_model->get($id);	    		
		$this->load->view('admin/unggahsertifikat_view', $data);
	}
	
	
	public function create()
	{
		$this->load->library('upload');
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo "Error: gambar terlalu besar atau Anda belum memilih gambar";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());           
			// load images model
			$upload = $data['upload_data'];
			
			$orig_name = $upload['orig_name'];

			$this->load->model('kelas_model');
			$data = array(				
				'idKelas' => $this->input->post('idKelas'),				
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' => $orig_name
			);
			$this->kelas_model->add($data);
			$idKelas = $this->input->post('idKelas');
			redirect('admin/daftar_kelas', 'refresh');
		}
	}
	
		public function createSertifikat($id)
	{
		$this->load->library('upload');
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo "Error: gambar terlalu besar atau Anda belum memilih gambar";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());           
			// load images model
			$upload = $data['upload_data'];
			
			$orig_name = $upload['orig_name'];

			$this->load->model('kelas_model');
			$data = array(								
				'sertifikat' => $orig_name
			);
				
			$this->db->where('idKelas', $id);			
			$this->db->update('kelas', $data);
			redirect('admin/daftar_kelas', 'refresh');
			
		}
	}
	
    }
?>