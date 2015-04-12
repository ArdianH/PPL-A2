<?php
class soal_latihan extends CI_Controller{
	public function index()
	{
		$this->view();
	}

	public function view(){
		$this->load->view('admin/daftarsoallatihan_view');
	}
	
	public function simpanPerubahan($idSoal){
		$this->load->model('soal_model');
		$data = array(
			'idMateri' => $this->input->post('idMateri'),
			'idKelas' => $this->input->post('idKelas'),
			'pertanyaan' => $this->input->post('pertanyaan'),
			'pembahasan' => $this->input->post('pembahasan')
		);
		$this->soal_model->update($data, $idSoal);

		$this->load->model('pilihanjawaban_model');
		$data2 = array(
			array(
		      'pilihanGanda' => "a" ,
		      'idSoal' => $this->input->post('idSoal'),
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optiona'),
		   ),
		   array(
		      'pilihanGanda' => "b" ,
		      'idSoal' => $this->input->post('idSoal'),
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optionb'),
		   ),
		   array(
		      'pilihanGanda' => "c" ,
		      'idSoal' => $this->input->post('idSoal'),
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optionc'),
		   ),
		   array(
		      'pilihanGanda' => "d" ,
		      'idSoal' => $this->input->post('idSoal'),
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optiond'),
		   ),
		);
		$this->pilihanjawaban_model->update($data2, $idSoal);

		redirect('soal', 'refresh');
	}
	
	public function createview(){
		$this->load->view('admin/buatsoallatihan_view');
	}

	public function getPilihanJawaban(){
	}	
	
	public function create()
	{
		$this->load->model('soal_model');
		$data = array(
			'idMateri' => $this->input->post('idMateri'),
			'idKelas' => $this->input->post('idKelas'),
			'isTes' => "0",
			'pertanyaan' => $this->input->post('pertanyaan'),
			'pembahasan' => $this->input->post('pembahasan'),
			'isDitunjukkan' => "1"
		);
		
		$this->soal_model->add($data);
		$this->load->model('pilihanjawaban_model');
		$data2 = array(
			array(
		      'pilihanGanda' => "a" ,
		      'idSoal' => $this->input->post('idSoal'),
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optiona'),
		   ),
		   array(
		      'pilihanGanda' => "b" ,
		      'idSoal' => $this->input->post('idSoal'),
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optionb'),
		   ),
		   array(
		      'pilihanGanda' => "c" ,
		      'idSoal' => $this->input->post('idSoal'),
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optionc'),
		   ),
		   array(
		      'pilihanGanda' => "d" ,
		      'idSoal' => $this->input->post('idSoal'),
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optiond'),
		   ),
		);
		
		$this->pilihanjawaban_model->add($data2);

		redirect('soal');
	}
}
?>