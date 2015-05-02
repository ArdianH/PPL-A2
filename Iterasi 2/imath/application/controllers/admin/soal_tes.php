<?php
//by Shirley

class soal_tes extends CI_Controller{
	public function index()
	{
		$this->load->model('kelas_model');
		$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
		$this->load->model('soal_model');
		$data['result'] = $this->soal_model->getAllSoal('0');
		$this->load->view('admin/daftarsoaltes_view',$data);
	}
	
	public function show(){
		$idKelas = $this->input->post('idKelas');
		redirect('admin/soal_tes/atur/'.$idKelas);
	}

	public function atur($idKelas){		
		$this->load->model('kelas_model');
		$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
		$this->load->model('soal_model');
		$data['result'] = $this->soal_model->getSoal($idKelas)->result();
		$this->load->view('admin/atursoaltes_view',$data);
	}
	
	public function simpan($idKelas){
		$this->load->model('soal_model');
		$data['result'] = $this->soal_model->getSoal($idKelas)->result();
		
		for($i=0; $i<count($data['result']);$i++)
		{
			$idSoal = $data['result'][$i]->idSoal;
			$tampilkanTes = $this->input->post('tampilkan'.$idSoal);
			echo $idSoal." ".$tampilkanTes;
			$this->soal_model->updateTes($tampilkanTes, $idSoal);
		}
		
		$this->session->set_flashdata('suksesSimpan', "Pengaturan tampilkan soal tes berhasil disimpan");
		redirect('admin/soal_tes');
	}
}
?>
