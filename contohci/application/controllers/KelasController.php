<?php
//INDAH
    class KelasController extends CI_Controller{
        public function index()
        {
			
			$this->load->model('Kelas');
 
            $data['result'] = $this->Kelas->getAllKelas();           
	    
	    $this->load->view('KelasUI',$data);
	    }
	    
	public function detail($id){
		$this->load->model('Kelas');
		$data['result'] = $this->Kelas->get($id);
		$this->load->view('DetailKelasUI', $data);
	}
	

	public function delete($id){
		$this->load->model('Kelas');		
		
		$this->Kelas->delete($id);
		redirect('KelasController', 'refresh');
		
	}
	
	
	public function edit($id){
		$this->load->model('Kelas');		
		
		$data['result'] = $this->Kelas->get($id); 
		$this->load->view('UbahKelasUI', $data);
	}
	
	public function simpanPerubahan($id){
		$this->load->model('Kelas');		
		
		$data = array(			
			'idKelas' => $this->input->post('idKelas'),
			'deskripsi' => $this->input->post('deskripsi'),				
		);
		
		$this->db->where('idKelas', $id);
		$this->db->update('Kelas', $data);
		redirect('KelasController', 'refresh');
	}
	
	public function view_image($id)
	{
     $this->load->model('Kelas');

     $data['image'] = $this->account_model('model_that_will_fetch_relevant_image');

     $this->load->view('where_image_is',$data);

	}
	
	function create()
	{
		$this->load->model('Kelas');
		$data = array(
			'idkelas' => $this->input->post('idkelas'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		
		$this->Kelas->add($data);
		redirect('KelasController');
	}
	
		function do_upload()
	{
		$this->load->library('upload');
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());           
            // load images model
            $upload = $data['upload_data'];
            //ini link gambarnya tapi masih bingung gimana cara masukinnya ke database bersamaan dengan isi form yang lainnya
        	$orig_name = $upload['orig_name'];

			$this->load->model('Kelas');
			$data = array(
			'idKelas' => $this->input->post('idKelas'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $orig_name
		);
			$this->Kelas->add($data);
		redirect('KelasController');
		}
	}
	
	
    }
?>