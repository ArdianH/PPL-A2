<?php

    class target_belajar extends CI_Controller{      
	
	public function index()
        {
		if($this->session->userdata('loggedin')) {
		    $this->load->model('targetbelajar_model');	    
		    $username = $this->session->userdata('username'); //sudah diganti
		    $data['result'] = $this->targetbelajar_model->getAllTargetBelajar($username);
		    $data['history'] = $this->targetbelajar_model->getHistory($username); 
		    
		//    $data['materi'] = $this->targetbelajar_model->getAllMateri($username, 'tidak');
		//$data['materiHistory'] = $this->targetbelajar_model->getAllMateri($username, 'tercapai');
		    
		    $data['tbRow'] = count($data['result']);	    	
		    $data['historyRow'] = count($data['history']);
		    
		    for($i=0; $i<count($data['result']);$i++)
		    {
			$idTB = $data['result'][$i]->idTargetBelajar;
			//echo $idTB;
			$data['nama'][$i] = $this->targetbelajar_model->getNamaMateri($idTB)->row(); 		    
		    }
		    
		    for($i=0; $i<count($data['history']);$i++)
		    {
			$idHistory = $data['history'][$i]->idTargetBelajar;
			//echo $idTB;
			$data['namaHistory'][$i] = $this->targetbelajar_model->getNamaMateri($idHistory)->row(); 
		    }
		    $this->load->view('user/targetbelajar_view',$data);
		} 
		else {
			redirect('home');
		}
	}	
	    
	public function done($id){
		if($this->session->userdata('loggedin')) {
			$this->load->model('targetbelajar_model');
			$data = array(
				'isselesai' => 'tercapai'
			);
			
			$this->targetbelajar_model->update($data, $id);
			redirect('target_belajar', 'refresh');
		} 
		else {
			redirect('home');
		}
	}

	public function delete($id){
		if($this->session->userdata('loggedin')) {
			$this->load->model('targetbelajar_model');
			
			$this->targetbelajar_model->delete($id);
			
			$message='Target belajar berhasil dihapus';
			$this->session->set_flashdata('deleteTargetBelajar',$message);
			redirect('target_belajar', 'refresh');
		} 
		else {
			redirect('home');
		}
	}
	
	
	public function edit($idTargetBelajar){
		if($this->session->userdata('loggedin')) {
			$this->load->model('targetbelajar_model');
			$this->load->model('kelas_model');			
			$data['result'] = $this->targetbelajar_model->get($idTargetBelajar); 
			$data['kelas'] = $this->kelas_model->getAllKelas()->result();		
			$this->load->view('user/ubahtargetbelajar_view', $data);
		} 
		else {
			redirect('home');
		}
	}
	
	public function simpanPerubahan($idTargetBelajar){
		if($this->session->userdata('loggedin')) {
			$this->load->model('targetbelajar_model');	
			$username = $this->session->userdata('username'); //sudah diganti
			$menit = $this->input->post('menit');
			$detik = $this->input->post('detik');
			$totalWaktu = ($menit*60) + $detik;
			$data = array(			
				'username' => $username,
				'idmateri' => $this->input->post('idmateri'),
				'idkelas' => $this->input->post('kelas'),			
				'banyaksoal' => $this->input->post('banyaksoal'),
				'targetnilai' => $this->input->post('targetnilai'),			
			);
			if($totalWaktu > 0)
			{
				$data['targetwaktu'] = $totalWaktu;
			}
			$this->targetbelajar_model->update($data, $idTargetBelajar);
			$message='Perubahan target belajar berhasil disimpan';
			$this->session->set_flashdata('messageTargetBelajar',$message);
			redirect('target_belajar', 'refresh');
		} 
		else {
			echo "<script type='text/javascript'>alert('Perubahan target belajar tidak berhasil disimpan');</script>";
			redirect('home');
		}
	}
	
	public function hapusHistory(){
		if($this->session->userdata('loggedin')) {
			$this->load->model('targetbelajar_model');
			$username = $this->session->userdata('username'); //sudah diganti
			$this->targetbelajar_model->deleteHistory($username); 
			redirect('target_belajar', 'refresh');
		} 
		else {
			redirect('home');
		}
	}	
	
	public function buatBaru(){		
		if($this->session->userdata('loggedin')) {
			$this->load->model('kelas_model');					
			$data['kelas'] = $this->kelas_model->getAllKelas()->result();		
			$this->load->view('user/buattargetbelajar_view', $data);
		} 
		else {
			redirect('home');
		}
	}
	
	public function create()
	{
		if($this->session->userdata('loggedin')) {
			$username = $this->session->userdata('username'); //sudah diganti
			$this->load->model('targetbelajar_model');
			$menit = $this->input->post('menit');
			$detik = $this->input->post('detik');
			$totalWaktu = ($menit*60) + $detik;
			$data = array(			
				'username' => $username,
				'idmateri' => $this->input->post('idmateri'),
				'idkelas' => $this->input->post('idkelas'),			
				'banyaksoal' => $this->input->post('banyaksoal'),
				'targetnilai' => $this->input->post('targetnilai'),
				'tanggal' => date("Y-m-d"),				
				'isselesai' => 'tidak'
			);
			if($totalWaktu > 0)
			{
				$data['targetwaktu'] = $totalWaktu;
			}			
			
			$this->targetbelajar_model->add($data);
			$message='Target belajar baru berhasil dibuat';
			$this->session->set_flashdata('messageTargetBelajar',$message);
			redirect('target_belajar');
		} 
		else {
			redirect('home');
		}
	}

	public function materi($idKelas){
		if($this->session->userdata('loggedin')) {
			$this->load->model('materi_model');
			$arr = $this->materi_model->getAllMateri($idKelas);
			echo json_encode($arr);
		} 
		else {
			redirect('home');
		}
	}
	
	public function getNamaMateri($idTB)
	{
		$this->load->model('targetbelajar_model');	    
		$arr = $this->targetbelajar_model->getMateri($idTB);
		//echo json_encode($arr);
	}
    }
?>