<?php
class matericontroller extends CI_Controller{
	public function index()
	{
		$this->view(0);
	}

	public function view($id){
		$this->load->model('Kelas');          
	    $data['Kelas'] = $this->Kelas->getAllKelas();
	    $this->load->model('materimodel');
		$data['result'] = $this->materimodel->getAllMateri($id);
	    $this->load->view('daftarmateriview',$data);
	}
	public function viewMateri(){
		$this->load->model('Kelas');          
	    $data['Kelas'] = $this->Kelas->getAllKelas(); 
		$this->load->model('materimodel');
		$id = $this->input->post('idKelas');
		$data['result'] = $this->materimodel->getAllMateri($id);
		$this->load->view('daftarmateriview',$data);
	}

	public function getList($id){
		$this->load->model('materimodel');		

		$this->materimodel->update($data, $id);
		redirect('matericontroller', 'refresh');
	}

	public function delete($id){
		$this->load->model('materimodel');		
		
		$this->materimodel->delete($id);
		redirect('matericontroller', 'refresh');
	}

	public function detail($id){
		$this->load->view('detailmateriview');
		$this->load->model('materimodel');		
		
		$data['result'] = $this->materimodel->get($id); 
		$this->load->view('detailmateriview', $data);
	}	
	
	public function edit($id){
		$this->load->model('materimodel');		
		
		$data['result'] = $this->materimodel->get($id); 
		$this->load->view('ubahmateriview', $data);
	}
	
	public function simpanPerubahan($id){
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
        	$full_path = $upload['full_path'];

			$this->load->model('materimodel');
			$data = array(
			'nama' => $this->input->post('nama'),
			'idKelas' => $this->input->post('idKelas'),			
			'rangkuman' => $this->input->post('rangkuman'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $full_path
		);
			$this->materimodel->add($data);
			redirect('matericontroller');
		}
	}

	public function createview(){
		$this->load->model('Kelas');          
	    $data['Kelas'] = $this->Kelas->getAllKelas();
		$this->load->view('buatmateriview', $data);
	}
	
	public function insert(){
		$this->load->model('materimodel');
		$this->materimodel->insert();
		$this->load->view('daftarmateriview');
	}

	function create()
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
        	$full_path = $upload['full_path'];

			$this->load->model('materimodel');
			$data = array(
			'nama' => $this->input->post('nama'),
			'idMateri' => $this->input->post('idMateri'),
			'idKelas' => $this->input->post('idKelas'),			
			'rangkuman' => $this->input->post('rangkuman'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $full_path
		);
			$this->materimodel->add($data);
			redirect('matericontroller');
		}
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
        	$full_path = $upload['full_path'];

			$this->load->model('materimodel');
			$data = array(
			'nama' => $this->input->post('nama'),
			'idMateri' => $this->input->post('idMateri'),
			'idKelas' => $this->input->post('idKelas'),			
			'rangkuman' => $this->input->post('rangkuman'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $full_path
		);
			$this->materimodel->add($data);
			redirect('matericontroller');
		}
	}
}
?>