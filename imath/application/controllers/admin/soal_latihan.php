<?php
class soal_latihan extends CI_Controller{
	public function index()
	{
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas();
		$this->load->model('soal_model');
		$data['result'] = $this->soal_model->getAllSoal('0');
		$this->load->view('admin/daftarsoallatihan_view',$data);
	}

	public function view(){
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas();
		$this->load->model('soal_model');
		$id = $this->input->post('idMateri');
		$data['result'] = $this->soal_model->getAllSoal($id);
		$this->load->view('admin/daftarsoallatihan_view',$data);
	}
	public function simpanPerubahan($idSoal){
		$this->load->model('soal_model');
		$data = array(
			'idMateri' => $this->input->post('idMateri'),
			'idKelas' => $this->input->post('idKelas'),
			'isTes' => "0",
			'jawaban' => $this->input->post('jawaban'),
			'gambarSoal' => $gambarSoal,
			'pertanyaan' => $this->input->post('pertanyaan'),
			'pembahasan' => $this->input->post('pembahasan'),
			'gambarSolusi' => $gambarSolusi,
			'isDitunjukkan' => "1"
		);
		$this->soal_model->update($data, $idSoal);

		$this->load->model('pilihanjawaban_model');
		$data2 = array(
			array(
		      'pilihanGanda' => "a" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambara,
		      'deskripsi' => $this->input->post('optiona'),
		   ),
		   array(
		      'pilihanGanda' => "b" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambarb,
		      'deskripsi' => $this->input->post('optionb'),
		   ),
		   array(
		      'pilihanGanda' => "c" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambarc,
		      'deskripsi' => $this->input->post('optionc'),
		   ),
		   array(
		      'pilihanGanda' => "d" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambard,
		      'deskripsi' => $this->input->post('optiond'),
		   ),
		);
		$this->pilihanjawaban_model->update($data2, $idSoal);

		redirect('soal', 'refresh');
	}
	
	public function createview(){
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas();
		$this->load->view('admin/buatsoallatihan_view', $data);
	}

	public function getPilihanJawaban(){
	}	
	
	public function create()
	{
	if (isset($_POST['submit']))
	    {
		// Load the library - no config specified here
		$this->load->library('upload');

		// Check if there was a file uploaded - there are other ways to
		// check this such as checking the 'error' for the file - if error
		// is 0, you are good to code
			if (!empty($_FILES['gambarSoal']['name']))
			{
			    // Specify configuration for File 1
			    $config['upload_path'] = './uploads/';
			    $config['allowed_types'] = 'gif|jpg|png';
			    $config['max_size'] = '100';
			    $config['max_width']  = '1024';
			    $config['max_height']  = '768';       

			    // Initialize config for File 1
			    $this->upload->initialize($config);

			    // Upload file 1
			    if ($this->upload->do_upload('gambarSoal'))
			    {
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarSoal = $upload['orig_name'];
			    }
			    else
			    {
				echo $this->upload->display_errors();
			    }

			}

			// Do we have a second file?
			if (!empty($_FILES['gambara']['name']))
			{
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambara'))
			    {
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambara = $upload['orig_name'];
			    }
			    else
			    {
				echo $this->upload->display_errors();
			    }

			}
			
			// Do we have a second file?
			if (!empty($_FILES['gambarb']['name']))
			{
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambarb'))
			    {
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarb = $upload['orig_name'];
			    }
			    else
			    {
				echo $this->upload->display_errors();
			    }

			}
			
			// Do we have a second file?
			if (!empty($_FILES['gambarc']['name']))
			{
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambarc'))
			    {
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarc = $upload['orig_name'];
			    }
			    else
			    {
				echo $this->upload->display_errors();
			    }

			}
			if (!empty($_FILES['gambard']['name']))
			{
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambard'))
			    {
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambard = $upload['orig_name'];
			    }
			    else
			    {
				echo $this->upload->display_errors();
			    }

			}
			if (!empty($_FILES['gambarSolusi']['name']))
			{
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambarSolusi'))
			    {
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarSolusi = $upload['orig_name'];
			    }
			    else
			    {
				echo $this->upload->display_errors();
			    }

			}
	    }


		$this->load->model('soal_model');
		$data = array(
			'idMateri' => $this->input->post('idMateri'),
			'idKelas' => $this->input->post('idKelas'),
			'isTes' => "0",
			'jawaban' => $this->input->post('jawaban'),
			'gambarSoal' => $gambarSoal,
			'pertanyaan' => $this->input->post('pertanyaan'),
			'pembahasan' => $this->input->post('pembahasan'),
			'gambarSolusi' => $gambarSolusi,
			'isDitunjukkan' => "1"
		);
		
		$id = $this->soal_model->add($data);
		$this->load->model('pilihanjawaban_model');
		$data2 = array(
			array(
		      'pilihanGanda' => "a" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambara,
		      'deskripsi' => $this->input->post('optiona'),
		   ),
		   array(
		      'pilihanGanda' => "b" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambarb,
		      'deskripsi' => $this->input->post('optionb'),
		   ),
		   array(
		      'pilihanGanda' => "c" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambarc,
		      'deskripsi' => $this->input->post('optionc'),
		   ),
		   array(
		      'pilihanGanda' => "d" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambard,
		      'deskripsi' => $this->input->post('optiond'),
		   ),
		);
		
		$this->pilihanjawaban_model->add($data2);

		redirect('admin/soal_latihan');
	}
	public function materi($idKelas){
		$this->load->model('materi_model');
		$arr = $this->materi_model->getAllMateri($idKelas);
		echo json_encode($arr);
	}
}
?>