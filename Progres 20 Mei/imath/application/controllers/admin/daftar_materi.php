<?php
class daftar_materi extends CI_Controller{
	public function index()
	{
		if($this->session->userdata('role')=="admin") {
			$this->view('0');
		} else {
			redirect('home');
		}	
	}

	public function view($idKelas){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');
			$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
			$this->load->model('materi_model');
			$data['result'] = $this->materi_model->getAllMateri($idKelas);
			$data['currentKelas'] = $idKelas;
			if($idKelas != '0'){
				$data['isViewed'] = 'true';
			}
			else {
				$data['isViewed'] = 'false';
			}
			$this->load->view('admin/daftarmateri_view',$data);
		} else {
			redirect('home');
		}	
	}

	public function viewMateri(){
		if($this->session->userdata('role')=="admin") {
			$idKelas = $this->input->post('idKelas');
			$this->view($idKelas);
		} else {
			redirect('home');
		}	
	}

	public function delete($id, $idKelas){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('materi_model');
			$this->load->model('targetbelajar_model');
			$this->load->model('prestasi_model');
			$materi = $this->materi_model->get($id);
			$this->targetbelajar_model->deleteByMateri($id);
			$this->prestasi_model->deleteByMateri($id);
			$this->materi_model->delete($id);
			$nama = $materi[0]->nama;
			$message = "Materi ".$nama." berhasil dihapus";
			$this->session->set_flashdata('messageMateri',$message);
			redirect('admin/daftar_materi/view/'.$idKelas);
		} else {
			redirect('home');
		}	
	}

	public function detail($id){		
		if($this->session->userdata('role')=="admin") {
			$this->load->model('materi_model');		
			$data['result'] = $this->materi_model->get($id); 
			$this->load->view('admin/detailmateri_view', $data);
		} else {
			redirect('home');
		}	
	}	
	
	public function edit($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('materi_model');
			$this->load->model('kelas_model');
			$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
			$data['result'] = $this->materi_model->get($id);
			$this->load->view('admin/ubahmateri_view', $data);
		} else {
			redirect('home');
		}	
	}
	
	public function simpanPerubahan($id){
		
		$this->load->library('upload');		
		if ( ! $this->upload->do_upload())
		{			
			$this->load->model('materi_model');			
			$idKelas = $this->input->post('idKelas');
			$data = array(
				'nama' => $this->input->post('nama'),			
				'idKelas' => $idKelas,			
				'rangkuman' => $this->input->post('rangkuman'),
				'deskripsi' => $this->input->post('deskripsi'),				
			);			
		}
		else
		{	
			$data = array('upload_data' => $this->upload->data());           
			// load images model
			$upload = $data['upload_data'];
				//ini link gambarnya
			$img_name = $upload['file_name'];
			$idKelas = $this->input->post('idKelas');
			$this->load->model('materi_model');
			$data = array(
				'nama' => $this->input->post('nama'),			
				'idKelas' => $idKelas,			
				'rangkuman' => $this->input->post('rangkuman'),
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' => $img_name
			);		
		}

			$this->materi_model->update($data, $id);
			$materi = $this->materi_model->get($id);
			$nama = $materi[0]->nama;
			$message = "Materi ".$nama." berhasil diubah";
			$this->session->set_flashdata('messageMateri',$message);	
			redirect('admin/daftar_materi/view/'.$idKelas);
	}

	public function createview($idKelas){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');
			$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
			$data['currentKelas'] = $idKelas;
			$this->load->view('admin/buatmateri_view', $data);
		} else {
			redirect('home');
		}	
	}	

	public function create()
	{
		if($this->session->userdata('role')=="admin") {
			$this->load->library('upload');
			if ( ! $this->upload->do_upload())
			{			
				$idKelas = $this->input->post('idKelas'); 
				$nama = $this->input->post('nama');
					$this->load->model('materi_model');
					$data = array(
						'nama' => $this->input->post('nama'),			
						'idKelas' => $this->input->post('idKelas'),			
						'rangkuman' => $this->input->post('rangkuman'),
						'deskripsi' => $this->input->post('deskripsi'),				
					);							
			}
			else
			{	
				$data = array('upload_data' => $this->upload->data());           
				// load images model
				$upload = $data['upload_data'];
					//ini link gambarnya
				$img_name = $upload['file_name'];
				$idKelas = $this->input->post('idKelas');
				$this->load->model('materi_model');
				$data = array(
					'nama' => $this->input->post('nama'),			
					'idKelas' => $this->input->post('idKelas'),			
					'rangkuman' => $this->input->post('rangkuman'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $img_name
				);
			}
			$this->materi_model->add($data);
				$nama = $this->input->post('nama');
				$message = "Materi ".$nama." berhasil dibuat";
				$this->session->set_flashdata('messageMateri',$message);	
				redirect('admin/daftar_materi/view/'.$idKelas, 'refresh');
		} else {
			redirect('home');
		}	
	}
}
?>