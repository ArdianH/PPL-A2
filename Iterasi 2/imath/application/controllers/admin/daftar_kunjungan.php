<?php
class daftar_kunjungan extends CI_Controller{
	public function index()
	{
		if($this->session->userdata('role')=="admin") {
			$this->view(0);
		} else {
			redirect('home');
		}	
	}

//	public function view($idKelas){
//		if($this->session->userdata('role')=="admin") {
//			$this->load->model('kelas_model');
//			$data['Kelas'] = $this->kelas_model->getAllPengunjungKelas()->result();
//			$this->load->model('kelas_model');
//			$data['result'] = $this->kelas_model->getAllPengunjung('SD001');
//			$this->load->view('admin/laporankunjungan_view',$data);
//		} else {
//			redirect('home');
//		}	
//	}

	public function viewKunjungan($id){
		if($this->session->userdata('role')=="admin") {
			//$this->load->model('kelas_model');          
			//$data['Kelas'] = $this->kelas_model->getAllPengunjungKelas()->result(); 
			$this->load->model('kunjungan_model');
			//$id = $this->input->post('idKelas');
			$data['result'] = $this->kunjungan_model->getAllPengunjungTerbaru($id);
			$this->load->view('admin/laporankunjungan_view',$data);
		} else {
			redirect('home');
		}	
	}

	public function ambilTerbaru($id) {
		$this->load->model('kunjungan_model');		
		$data['result'] = $this->kunjungan_model->getAllPengunjungTerbaru($id);
		$hasil = $data['result'];

		$array = array();

		$jumlahData = count($data['result']);
		
		$n = $jumlahData - 7; //ambil 3 terakhir

		for ($i = $jumlahData-1; $i>=$n && $i>=0; $i--) {
			array_push($array,$hasil[$i]);
		}
		echo json_encode($array); 
	
	}	
	
	public function getList($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');		
			$this->kelas_model->update($data, $id);
			redirect('admin/daftar_kunjungan', 'refresh');
		} else {
			redirect('home');
		}	
	}


}
?>