<?php
class soal extends CI_Controller{
	public function index()
	{
		$this->view(1);
	}

	public function view($id){
		$this->load->model('kelas_model');          
	    $data['kelas_model'] = $this->Kelas->getAllKelas();
	    $this->load->model('soal_model');         
	    $data['result'] = $this->soalmodel->getAllsoal($id);
	    $this->load->view('daftarsoalview',$data);

	}
	
	public function simpanPerubahan($id){
		$this->load->model('soal_model');		
		
		$data = array(			
			'idKelas' => $this->input->post('idKelas'),
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'rangkuman' => $this->input->post('rangkuman')			
		);
		
		$this->soalmodel->update($data, $id);
		redirect('soalcontroller', 'refresh');
	}
	
	public function createview(){
		$this->load->view('buatsoalview');
	}
	
	
	public function create()
	{
		$this->load->model('soal_model');
		$data = array(
			'nama' => $this->input->post('nama'),
			'idsoal' => $this->input->post('idsoal'),
			'idKelas' => $this->input->post('idKelas'),			
			'rangkuman' => $this->input->post('rangkuman'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $this->input->post('gambar')
		);
		
		$this->soalmodel->add($data);
		redirect('soalcontroller');
	}
}
?>