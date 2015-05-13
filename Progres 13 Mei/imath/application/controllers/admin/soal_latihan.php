<?php
class soal_latihan extends CI_Controller{
	//~ public function index()
	//~ {
		//~ $this->load->model('kelas_model');				
		//~ $data['Kelas'] = $this->kelas_model->getAllKelas()->result();
		//~ $this->load->model('soal_model');
		//~ $data['result'] = $this->soal_model->getAllSoalLatihan('0');
		//~ $data['isViewed'] = 'false';
		//~ $this->load->view('admin/daftarsoallatihan_view',$data);
	//~ }

	//~ public function view(){		
		//~ $idMateri = $this->input->post('idMateri');
		//~ redirect('admin/soal_latihan/show/'.$idMateri);
	//~ }
	
	public function index()
	{
		$this->show('1');
	}
	public function view()
	{
		$idMateri = $this->input->post('idMateri');
		redirect('admin/soal_latihan/show/'.$idMateri);
	}

	public function delete($idSoal, $idMateri){
		$this->load->model('soal_model');
		$this->soal_model->delete($idSoal);
		redirect('admin/soal_latihan/show/'.$idMateri);
	}

	public function detail($idSoal){
		$this->load->model('soal_model');		
		$data['soal'] = $this->soal_model->get($idSoal); 
		$data['pilihanJawaban']	= $this->soal_model->getPilihanJawaban($idSoal);
		$this->load->view('admin/detailsoallatihan_view',$data);
	}
	public function simpanPerubahan($idSoal){
		if (isset($_POST['submit'])){
			// Load the library - no config specified here
			$this->load->library('upload');
			$soal ='FALSE';
			$a = 'FALSE';
			$b = 'FALSE';
			$c = 'FALSE';
			$d = 'FALSE';
			$solusi='FALSE';
			// Specify configuration for File 1
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
			if (!empty($_FILES['gambarSoal']['name']))
			{
				$soal='TRUE';
				echo "masuk";       

			    // Initialize config for File 1
			    $this->upload->initialize($config);

			    // Upload file 1
			    if ($this->upload->do_upload('gambarSoal'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());					
					$upload = $data['upload_data'];						
					$gambarSoal = $upload['file_name'];
					echo "do-upload hahahaha";
					echo $soal;
			    }
			}
			// Do we have a second file?
			if (!empty($_FILES['gambara']['name']))
			{
				$a='TRUE';
				  
				$this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambara'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];						
					$gambara = $upload['file_name']; //ini link gambarnya
			    }
			}

			if (!empty($_FILES['gambarb']['name']))
			{
				$b='TRUE';
				
				$this->upload->initialize($config);

				// Upload the second file
				if ($this->upload->do_upload('gambarb'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarb = $upload['file_name'];
			    }
			}
			
			// Do we have a second file?
			if (!empty($_FILES['gambarc']['name']))
			{
				$c='TRUE';
				  
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambarc'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarc = $upload['file_name'];
			    }
			}
			if (!empty($_FILES['gambard']['name']))
			{
				$d='TRUE';
				
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambard'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambard = $upload['file_name'];
			    }

			}
			if (!empty($_FILES['gambarSolusi']['name']))
			{
			    $solusi='TRUE';
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambarSolusi'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarSolusi = $upload['file_name'];
			    }

			}
	    }
		$this->load->model('soal_model');

			$data = array(
			'idMateri' => $this->input->post('idMateri'),
			'idKelas' => $this->input->post('idKelas'),
			'isTes' => "latihan",
			'jawaban' => $this->input->post('jawaban'),
			'pertanyaan' => $this->input->post('pertanyaan'),
			'pembahasan' => $this->input->post('pembahasan'),
			'isDitunjukkan' => "1");

		if($soal=='TRUE')
		{	
			echo " in";
			$data['gambarSoal']=$gambarSoal;
		}
		if($solusi=='TRUE')
		{
			$data['gambarSolusi']=$gambarSolusi;
		}

		$this->soal_model->update($data, $idSoal);
			
		
		$arraya= array(
		      'pilihanGanda' => "a" ,
		      'idSoal' => $idSoal,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optiona'),
		   );
		if($a=='TRUE')
		{
			$arraya['gambarJawaban'] = $gambara;
		}
		
		$arrayb= array(
		      'pilihanGanda' => "b" ,
		      'idSoal' => $idSoal,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optionb'),
		   );
		if($b=='TRUE')
		{
			$arrayb['gambarJawaban'] = $gambarb;
		}
		
		$arrayc = array(
		      'pilihanGanda' => "c" ,
		      'idSoal' => $idSoal,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optionc'),
		   );
		if($c=='TRUE')
		{
			$arrayc['gambarJawaban']=$gambarc;
		}
		
		$arrayd = array(
		      'pilihanGanda' => "d" ,
		      'idSoal' => $idSoal,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optiond'),
		   );
		if($d=='TRUE')
		{
			$arrayd['gambarJawaban'] =$gambard;
		}
		$this->soal_model->updateJawaban($arraya,'a', $idSoal);
		$this->soal_model->updateJawaban($arrayb,'b', $idSoal);
		$this->soal_model->updateJawaban($arrayc, 'c', $idSoal);
		$this->soal_model->updateJawaban($arrayd, 'd', $idSoal);
		
		$message="soal berhasil diubah";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$inputMateri = $this->input->post('idMateri');
		redirect('admin/soal_latihan/show/'.$inputMateri);
//		redirect('admin/soal_latihan');
		//redirect('admin/soal_latihan', 'refresh');
	}
	
	public function createview($idMateri, $idKelas){
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
		$data['currentMateri'] = $idMateri;
		$data['currentKelas'] = $idKelas;
		$this->load->view('admin/buatsoallatihan_view', $data);
	}


	public function edit($id){
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
		$this->load->model('soal_model');		
		$data['soal'] = $this->soal_model->get($id); 
		$data['pilihanJawaban']	= $this->soal_model->getPilihanJawaban($id);
		$this->load->view('admin/ubahsoallatihan_view', $data);
	}	
	
	public function create()
	{
	if (isset($_POST['submit']))
	    {
		// Load the library - no config specified here
		$this->load->library('upload');
			$soal ='FALSE';
			$a = 'FALSE';
			$b = 'FALSE';
			$c = 'FALSE';
			$d = 'FALSE';
			$solusi='FALSE';
				// Specify configuration for File 1
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';     
			if (!empty($_FILES['gambarSoal']['name']))
			{
				$soal='TRUE';
			  

			    // Initialize config for File 1
			    $this->upload->initialize($config);

			    // Upload file 1
			    if ($this->upload->do_upload('gambarSoal'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());					
					$upload = $data['upload_data'];						
					$gambarSoal = $upload['file_name'];
			    }
			}
			// Do we have a second file?
			if (!empty($_FILES['gambara']['name']))
			{
				$a='TRUE';
				
				$this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambara'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];						
					$gambara = $upload['file_name']; //ini link gambarnya
			    }
			}

			if (!empty($_FILES['gambarb']['name']))
			{
				$b='TRUE';
				
				$this->upload->initialize($config);

				// Upload the second file
				if ($this->upload->do_upload('gambarb'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarb = $upload['file_name'];
			    }
			}
			
			// Do we have a second file?
			if (!empty($_FILES['gambarc']['name']))
			{
				$c='TRUE';
				  
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambarc'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarc = $upload['file_name'];
			    }
			}
			if (!empty($_FILES['gambard']['name']))
			{
				$d='TRUE';
				    
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambard'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambard = $upload['file_name'];
			    }

			}
			if (!empty($_FILES['gambarSolusi']['name']))
			{
			    $solusi='TRUE';
			    $this->upload->initialize($config);

			    // Upload the second file
			    if ($this->upload->do_upload('gambarSolusi'))
			    {			    	
					$data = array('upload_data' => $this->upload->data());           
					// load images model
					$upload = $data['upload_data'];
						//ini link gambarnya
					$gambarSolusi = $upload['file_name'];
			    }

			}


		$this->load->model('soal_model');
		$data = array(
			'idMateri' => $this->input->post('idMateri'),
			'idKelas' => $this->input->post('idKelas'),
			'isTes' => "latihan",
			'jawaban' => $this->input->post('jawaban'),
			'pertanyaan' => $this->input->post('pertanyaan'),
			'pembahasan' => $this->input->post('pembahasan'),
			'isDitunjukkan' => "1"
		);
		if($soal=='TRUE')
		{
			$data['gambarSoal'] = $gambarSoal;
		}
		if($soal=='TRUE')
		{
			$data['gambarSolusi'] = $gambarSolusi;
		}
		
		$id = $this->soal_model->add($data);

		$this->load->model('soal_model');
		$idSoal = $this->db->insert_id();
		$arraya= array(
		      'pilihanGanda' => "a" ,
		      'idSoal' => $idSoal,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optiona'),
		   );
		if($a=='TRUE')
		{
			$arraya['gambarJawaban'] = $gambara;
		}
		
		$arrayb= array(
		      'pilihanGanda' => "b" ,
		      'idSoal' => $idSoal,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optionb'),
		   );
		if($b=='TRUE')
		{
			$arrayb['gambarJawaban'] = $gambarb;
		}
		
		$arrayc = array(
		      'pilihanGanda' => "c" ,
		      'idSoal' => $idSoal,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optionc'),
		   );
		if($c=='TRUE')
		{
			$arrayc['gambarJawaban']=$gambarc;
		}
		
		$arrayd = array(
		      'pilihanGanda' => "d" ,
		      'idSoal' => $idSoal,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'deskripsi' => $this->input->post('optiond'),
		   );
		if($d=='TRUE')
		{
			$arrayd['gambarJawaban'] =$gambard;
		}
		$this->soal_model->addJawaban($arraya);
		$this->soal_model->addJawaban($arrayb);
		$this->soal_model->addJawaban($arrayc);
		$this->soal_model->addJawaban($arrayd);

		$inputMateri = $this->input->post('idMateri');
		$inputKelas = $this->input->post('idKelas');
		
		$message="soal berhasil diubah";
		echo "<script type='text/javascript'>alert('$message');</script>";
		
		redirect('admin/soal_latihan/show/'.$inputMateri);
		//redirect('admin/soal_latihan/show/'.$inputMateri);
	}
	}
	
	public function show($idMateri){
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
		$this->load->model('soal_model');		
		$data['result'] = $this->soal_model->getAllSoalLatihan($idMateri);
		$this->load->model('materi_model');
		$data['materi'] = $this->materi_model->get($idMateri);
		$data['isViewed'] = 'true';
		$this->load->view('admin/daftarsoallatihan_view',$data);
	}	
	
	public function materi($idKelas){
		$this->load->model('materi_model');
		$arr = $this->materi_model->getAllMateri($idKelas);
		echo json_encode($arr);
	}	
}
?>
