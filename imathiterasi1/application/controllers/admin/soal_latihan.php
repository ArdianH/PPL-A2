<?php
class soal_latihan extends CI_Controller{
	public function index()
	{
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
		$this->load->model('soal_model');
		$data['result'] = $this->soal_model->getAllSoal('0');
		$this->load->view('admin/daftarsoallatihan_view',$data);
	}

	public function view(){
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
		$this->load->model('soal_model');
		$id = $this->input->post('idMateri');
		$data['result'] = $this->soal_model->getAllSoal($id);
		$this->load->view('admin/daftarsoallatihan_view',$data);
	}

	public function delete($idSoal){
		$this->load->model('soal_model');
		$this->soal_model->delete($idSoal);
		redirect('admin/soal_latihan');
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
			if (!empty($_FILES['gambarSoal']))
			{
				$soal='TRUE';
				echo "masuk";
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
				// Specify configuration for File 1
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';       
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
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';       
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
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';       
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
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';      
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
			'isTes' => "0",
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
		echo ($soal == 'TRUE').$idSoal;

		//redirect('admin/soal_latihan', 'refresh');
	}
	
	public function createview(){
		$this->load->model('kelas_model');				
		$data['Kelas'] = $this->kelas_model->getAllKelas()->result();
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
					$gambarSoal = $upload['file_name'];					
			    }

			}
			else{ 
				$gambarSoal = "";
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
					$gambara = $upload['file_name'];
			    }			    

			}
			else{ 
				$gambara = "";
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
					$gambarb = $upload['file_name'];
			    }			   

			}
			else{ 
				$gambarb = "";
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
					$gambarc = $upload['file_name'];
			    }			    

			}
			else{ 
				$gambarc = "";
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
					$gambard = $upload['file_name'];
			    }			    

			}
			else{ 
				$gambard = "";
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
					$gambarSolusi = $upload['file_name'];
			    }

			}
			else{ 
				$gambarSolusi = "";
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
		$this->load->model('soal_model');
		$dataa = array(			
		      'pilihanGanda' => "a" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambara,
		      'deskripsi' => $this->input->post('optiona'),
		);
		
		$datab=  array(
		      'pilihanGanda' => "b" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambarb,
		      'deskripsi' => $this->input->post('optionb'),
		   );
		$datac = array(
		      'pilihanGanda' => "c" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambarc,
		      'deskripsi' => $this->input->post('optionc'),
		   );
		   $datad = array(
		      'pilihanGanda' => "d" ,
		      'idSoal' => $id,
		      'idMateri' => $this->input->post('idMateri'),
		      'idKelas' => $this->input->post('idKelas'),
		      'gambarJawaban' => $gambard,
		      'deskripsi' => $this->input->post('optiond'),
		   );
		
		$this->soal_model->addJawaban($dataa);
		$this->soal_model->addJawaban($datab);
		$this->soal_model->addJawaban($datac);
		$this->soal_model->addJawaban($datad);

		redirect('admin/soal_latihan');
	}
	
	public function materi($idKelas){
		$this->load->model('materi_model');
		$arr = $this->materi_model->getAllMateri($idKelas);
		echo json_encode($arr);
	}	
}
?>
