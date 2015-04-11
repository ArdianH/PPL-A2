<?php
class daftar_materi extends CI_Controller{
	public function index()
	{
		$this->view(0);
	}

	public function view($id){
		$this->load->model('kelas_model');
		$data['Kelas'] = $this->kelas_model->getAllKelas();
		$this->load->model('materi_model');
		$data['result'] = $this->materi_model->getAllMateri($id);
		$this->load->view('admin/daftarmateri_view',$data);
	}
	public function viewMateri(){
		$this->load->model('kelas_model');          
		$data['Kelas'] = $this->kelas_model->getAllKelas(); 
		$this->load->model('materi_model');
		$id = $this->input->post('idKelas');
		$data['result'] = $this->materi_model->getAllMateri($id);
		$this->load->view('admin/daftarmateri_view',$data);
	}

	public function getList($id){
		$this->load->model('materi_model');		
		$this->materi_model->update($data, $id);
		redirect('admin/daftar_materi', 'refresh');
	}

	public function delete($id){
		$this->load->model('materi_model');
		$this->load->model('targetbelajar_model');
		$this->materi_model->delete($id);
		$this->targetbelajar_model->deleteByMateri($id);
		redirect('admin/daftar_materi', 'refresh');
	}

	public function detail($id){		
		$this->load->model('materi_model');		
		$data['result'] = $this->materi_model->get($id); 
		$this->load->view('admin/detailmateri_view', $data);
	}	
	
	public function edit($id){
		$this->load->model('materi_model');		
		$data['result'] = $this->materi_model->get($id); 		
		$this->load->view('admin/ubahmateri_view', $data);
	}
	
	public function simpanPerubahan($id){
		
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
			redirect('admin/daftar_materi', 'refresh');
		}
	}

	public function createview(){
		$this->load->model('kelas_model');
		$data['Kelas'] = $this->kelas_model->getAllKelas();
		$this->load->view('admin/buatmateri_view', $data);
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
			$this->materi_model->add($data);
			redirect('admin/daftar_materi', 'refresh');
		}
	}
}
?>