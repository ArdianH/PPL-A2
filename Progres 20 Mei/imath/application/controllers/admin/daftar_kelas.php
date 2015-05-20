<?php
    class daftar_kelas extends CI_Controller{
         public function index(){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');
			$data['result'] = $this->kelas_model->getAllKelas()->result_array();	
			$arrayId = $this->kelas_model->getAllIdKelas()->result_array();
			$data['jumlahPengunjung'] = $this->iterasiPengunjung($arrayId);			
			$this->load->view('admin/daftarkelas_view',$data);
		} else {
			redirect('home');
		}	
	}
	    
	public function detail($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');
			$data['result'] = $this->kelas_model->get($id)->result();
			$this->load->view('admin/detailkelas_view', $data);
		} else {
			redirect('home');
		}	
	}
	
	//=============================================================================
	// Menghapus kelas dengan id = $id
	// Semua materi, soal latihan, dan target belajar juga terhapus yg terkait soal ini
	//=============================================================================
	public function delete($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');
			$this->kelas_model->delete($id);
			$message = "Kelas berhasil dihapus";
			$this->session->set_flashdata('hapusKelas',$message);			
			redirect('admin/daftar_kelas', 'refresh');		
		} else {
			redirect('home');
		}	
	}
	
	
	public function edit($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');			
			$data['result'] = $this->kelas_model->get($id)->result(); 
			$this->load->view('admin/ubahkelas_view', $data);
		} else {
			redirect('home');
		}	
	}
	
	public function jumlahPengunjung($idKelas) {
		$this->load->model('kelas_model');		
		$jumlahPengunjung = $this->kelas_model->getJumlahPengunjungKelas($idKelas)->row(); 
		return $jumlahPengunjung->jumlah;
	}

	public function iterasiPengunjung($arrayId) {
		$this->load->model('kelas_model');
		$arrayPengunjung = array();
		foreach($arrayId as $row) {
			// echo $row['idKelas'];
			$arrayPengunjung[$row['idKelas']] = $this->jumlahPengunjung($row['idKelas']);
		}
		return $arrayPengunjung;
		// $data['hasil'] = $this->getJumlahPengunjungKelas($idKelas);
		// $this->load->view('admin/daftarkelas_view', $data);
	}
	
	public function simpanPerubahan($id){
		
		$this->load->library('upload');		
		if ( ! $this->upload->do_upload())
		{			
			$this->load->model('kelas_model');
			$data = array(									
				'deskripsi' => $this->input->post('deskripsi'),				
			);		
	
			$this->kelas_model->update($data, $id);
			echo "<script type='text/javascript'>alert('Sukses menyimpan perubahan kelas');</script>";
			redirect('admin/daftar_kelas', 'refresh');			
		}
		else
		{	
			$data = array('upload_data' => $this->upload->data());           
			// load images model
			$upload = $data['upload_data'];
				//ini link gambarnya
			$img_name = $upload['file_name'];

			$this->load->model('kelas_model');
			$data = array(
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' => $img_name
			);		

			$this->kelas_model->update($data, $id);
			echo "<script type='text/javascript'>alert('Sukses menyimpan perubahan kelas');</script>";
			redirect('admin/daftar_kelas', 'refresh');
		}
	}
	
	public function buatBaru(){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');
			$data['result'] = $this->kelas_model->getAllKelas()->result();	    		
			$this->load->view('admin/buatkelas_view', $data);
		} else {
			redirect('home');
		}	
	}
	
	public function unggah($id){
		if($this->session->userdata('role')=="admin") {
			$this->load->model('kelas_model');
			$data['result'] = $this->kelas_model->get($id)->result();	 
			$this->load->view('admin/unggahsertifikat_view', $data);
		} else {
			redirect('home');
		}
	}
	
	public function create()
	{
		if($this->session->userdata('role')=="admin") {
			$this->load->library('upload');
			$idKelas = $this->input->post('idKelas');
			if ( ! $this->upload->do_upload())
			{     
				$error = array('error' => $this->upload->display_errors());
				$pesanGambar = "gambar terlalu besar atau Anda belum memilih gambar";
			
				$this->load->model('kelas_model');			
				$data = array(
					'idKelas' => $idKelas,				
					'deskripsi' => $this->input->post('deskripsi')
				);
				$cekKelas = $this->kelas_model->get($idKelas);
				if($cekKelas->num_rows() < 1){
					echo "<script type='text/javascript'>alert('$pesanGambar');</script>";
					redirect('admin/daftar_kelas/buatBaru', 'refresh');
				}
				else{				
					$this->session->set_flashdata('duplicatePrimaryKeyKelas',"Sudah ada ".$idKelas);
					$message = "Kelas sudah pernah dibuat";
					echo "<script type='text/javascript'>alert('$message');</script>";
					echo "<script type='text/javascript'>alert('$pesanGambar');</script>";
					redirect('admin/daftar_kelas/buatBaru', 'refresh');
				}

				//$this->unggah($id);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());           
				// load images model
				$upload = $data['upload_data'];
				
				$img_name = $upload['file_name'];

				$this->load->model('kelas_model');
				$data = array(				
					'idKelas' => $this->input->post('idKelas'),				
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $img_name
				);
				$cekKelas = $this->kelas_model->get($idKelas);
				if($cekKelas->num_rows() < 1){
					$this->kelas_model->add($data);
					redirect('admin/daftar_kelas', 'refresh');
				}
				else{				
					$this->session->set_flashdata('duplicatePrimaryKeyKelas',"Sudah ada ".$idKelas);
					redirect('admin/daftar_kelas/buatBaru', 'refresh');
				}
			}
		} else {
			redirect('home');
		}	
	}
	
	public function createSertifikat($id)
	{
		if($this->session->userdata('role')=="admin") {
			$this->load->library('upload');
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$message = "gambar terlalu besar atau Anda belum memilih gambar";
				echo "<script type='text/javascript'>alert('$message');</script>";
				$this->unggah($id);
				
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());           
				// load images model
				$upload = $data['upload_data'];
				
				$img_name = $upload['file_name'];

				$this->load->model('kelas_model');
				$data = array(								
					'sertifikat' => $img_name
				);
					
				$this->db->where('idKelas', $id);			
				$this->db->update('kelas', $data);
				redirect('admin/daftar_kelas', 'refresh');			
			}
		} else {
			redirect('home');
		}	
	}
	//===========================KUNJUNGAN==============================
	public function kunjungan()
        {          	
		if($this->session->userdata('loggedin')) {
			$username = $this->session->userdata('username');			
			$this->load->model('kelas_model');
			$data['kelas'] = $this->kelas_model->getAllKelas()->result(); 			
			$this->load->view('admin/detailkunjungan_view', $data);
			//$this->load->view('admin/cobacoba', $data);
		} 
		else {
			redirect('home');
		}
	}
	
	public function viewKunjungan($kelas)
        {          	
		
		$username = $this->session->userdata('username');			
		$this->load->model('kelas_model');
		$data['kelas'] = $this->kelas_model->getAllKelas()->result(); 			
		$data['idKelas'] = $kelas;
		$this->load->view('admin/detailkunjungan_view', $data);
	}
	    
	    
	public function hasil($idKelas)
	{		
		$this->load->model('kelas_model');
		if($idMateri=="all") {
			//$data['result']= $this->rapor_model->getCatatanTes($id, $idKelas, $idMateri);
			$data['result'] = $this->kelas_model->getKunjunganKelas($idKelas)->result();
		}
		else {
			$data['result'] = $this->kelas_model->getKunjunganKelas($idKelas)->result();
			//$data['result']= $this->rapor_model->getCatatanLatihan($id, $idKelas, $idMateri);
		}		
		echo json_encode($data); 
		
	}
	
	public function getTenVisits($idKelas) {
		$this->load->model('kelas_model');
		
		$data['result'] = $this->kelas_model->getKunjunganKelas($idKelas)->result();
	
		$hasil = $data['result'];
		$array = array();
		$jumlahData = count($data['result']);
		
		$n = $jumlahData - 10; //ambil 10 terakhir
		for ($i = $jumlahData-1; $i>=$n && $i>=0; $i--) {
			array_push($array,$hasil[$i]);
		}
						
		echo json_encode($this->kelas_model->getKunjunganKelas($idKelas)->result_array());
		//echo json_encode($array); 
	
	}
    }
?>