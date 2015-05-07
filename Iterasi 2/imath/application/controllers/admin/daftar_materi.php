<?php
class daftar_materi extends CI_Controller{
	public function index()
	{
		if($this->session->userdata('role')=="admin") {
			$this->view(0);
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
			$this->load->view('admin/daftarmateri_view',$data);
		} else {
			redirect('home');
		}	
	}
	public function viewMateri(){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');          
			$data['Kelas'] = $this->kelas_model->getAllKelas()->result(); 
			$this->load->model('materi_model');
			$id = $this->input->post('idKelas');
			$data['result'] = $this->materi_model->getAllMateri($id);
			$this->load->view('admin/daftarmateri_view',$data);
		} else {
			redirect('home');
		}	
	}

	public function getList($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('materi_model');		
			$this->materi_model->update($data, $id);
			redirect('admin/daftar_materi', 'refresh');
		} else {
			redirect('home');
		}	
	}

	public function delete($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('materi_model');
			$this->load->model('targetbelajar_model');
			$this->materi_model->delete($id);
			$this->targetbelajar_model->deleteByMateri($id);
			$message = "Materi telah berhasil dihapus";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('admin/daftar_materi', 'refresh');
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
			$data = array(
				'nama' => $this->input->post('nama'),			
				'idKelas' => $this->input->post('idKelas'),			
				'rangkuman' => $this->input->post('rangkuman'),
				'deskripsi' => $this->input->post('deskripsi'),				
			);		

			$this->materi_model->update($data, $id);
			$message = "Materi telah berhasil diubah";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('admin/daftar_materi', 'refresh');			
		}
		else
		{	
			$data = array('upload_data' => $this->upload->data());           
			// load images model
			$upload = $data['upload_data'];
				//ini link gambarnya
			$img_name = $upload['file_name'];

			$this->load->model('materi_model');
			$data = array(
				'nama' => $this->input->post('nama'),			
				'idKelas' => $this->input->post('idKelas'),			
				'rangkuman' => $this->input->post('rangkuman'),
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' => $img_name
			);		

			$this->materi_model->update($data, $id);
			$message = "Materi telah berhasil diubah";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('admin/daftar_materi', 'refresh');
		}
	}

	public function createview(){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');
			$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
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
				$this->load->model('materi_model');
				$data = array(
					'nama' => $this->input->post('nama'),			
					'idKelas' => $this->input->post('idKelas'),			
					'rangkuman' => $this->input->post('rangkuman'),
					'deskripsi' => $this->input->post('deskripsi'),				
				);
				$this->materi_model->add($data);
				$message = "Materi telah berhasil dibuat";
				echo "<script type='text/javascript'>alert('$message');</script>";
				redirect('admin/daftar_materi/view/'.$idKelas, 'refresh');
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
				$this->materi_model->add($data);
				$message = "Materi telah berhasil dibuat";
				echo "<script type='text/javascript'>alert('$message');</script>";
				redirect('admin/daftar_materi/view/'.$idKelas, 'refresh');
			}
		} else {
			redirect('home');
		}	
	}
}
?>