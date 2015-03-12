<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control extends CI_Controller {

	public function index()
	{	
		if($this->session->userdata('loggedin')) {
			if($this->session->userdata('role') == "admin") {
				$this->load->view("viewerAdmin");
			} else {
				$this->load->view("viewer");
			}
		} else {
			$this->load->view("login");			
		}
	}			

	public function login() 
	{
	    $username = $_POST['username'];
		$password = md5($_POST['password']);
		$where = "where username = '".$username."' AND password = '".$password."'";
		$dataDB = $this->model->getData('akun', $where);
		//jika tidak ada hasil query yang dikembalikan dari database (pasangan username-password tidak ditemukan).
		if($dataDB->num_rows() < 1) {
			$this->session->set_flashdata('messageLogin', "Username atau Password Salah !");
		} else {
			//jika ada hasil query dari database (ditemukan kecocokan username dan password).
			//proses data return query menjadi data session, agar nantinya diload pada view.
			$dataDB = $dataDB->result_array();
			$data_session = array (
				'nama' => $dataDB[0]['nama'],
				'username' => $dataDB[0]['username'],
				'role' => $dataDB[0]['role'],
				'loggedin' => TRUE
			);
			$this->session->set_userdata($data_session);
		}
		
		redirect('/control/index');
	}
	
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('/control/index');
	}
	
	public function redirect_signup() {
		$this->load->view('signup');
	}
	
	public function signup() 
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		//$nama = $_POST['nama'];
		$data = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,
			//'nama' => $nama,
			'role' => "user"
		);
			
		//Cek apakah email sudah terdaftar pada database atau belum.
		$where = "where email = '".$email."'";
		$dataDB = $this->model->getData('akun', $where);
		//Cek apakah username sudah terdaftar pada database atau belum.
		$where2 = "where username = '".$username."'";
		$dataDB2 = $this->model->getData('akun', $where2);
		
		//Jika terjadi duplikat email / duplikat username / captcha salah, tampilkan pesan error.
		if($dataDB->num_rows() >= 1) {
			$this->session->set_flashdata('messageSignup',"Account Gagal dibuat, silahkan gunakan email lain.");
		} else if ($dataDB2->num_rows() >= 1) {
			$this->session->set_flashdata('messageSignup',"Account Gagal dibuat, silahkan gunakan username lain.");			
		} else if ($this->session->flashdata('captWord') !== $captcha) {
			$this->session->set_flashdata('messageSignup',"Account Gagal dibuat, input kode Captcha salah !");
		} else {
			$res = $this->model->setData('akun', $data);
			$this->session->set_flashdata('messageSignup',"Account Berhasil dibuat");
		}

		redirect('/control/redirect_signup');
	}
	
	public function redirect_forget()
	{
		$this->load->view('forget');
	}
	
	public function forget() 
	{
		$email = $_POST['email'];

		$where = "where email = '".$email."'";
		$dataDB = $this->model->getData('akun', $where);
		
			if($dataDB->num_rows() == 1) {
				$this->session->set_flashdata('messageForget', "Sukses request Password, silahkan cek email anda.");
				$userPassword = $dataDB->row()->password;
				
				//kirim password ke email user 
				
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'imathcsui@gmail.com', // change it to yours
					'smtp_pass' => 'adminimathcsui5' // change it to yours
				);
				
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$message = "Passcode = ".$userPassword;
				$this->email->from('imathcsui@gmail.com'); // change it to yours
				$this->email->to($email);// change it to yours
				$this->email->subject('iMath account Password');
				$this->email->message($message);
				$this->email->send();
			} else {
				$this->session->set_flashdata('messageForget',"Anda belum pernah mendaftar.");
			}		
		redirect('control/redirect_forget');	
	}
	
	public function redirect_change()
	{
		$this->load->view("changepassword");
	}
	
	public function update_password() 
	{
		$passcode = $_POST['passcode'];
		$username = $_POST['username'];
		$newPassword = $_POST['newPassword'];
		$recPassword = $_POST['retypeNewPassword'];
		
		if($newPassword == $recPassword) {
			$where = "username = '".$username."'";
			$res = $this->model->updateData('akun', array('password' => md5($newPassword)), $where);
			
			if($res == 1){
				$this->session->set_flashdata('messageChangePassword',"Sukses mengubah password.");
			} else {
				$this->session->set_flashdata('messageChangePassword',"Gagal mengubah password.");
			}
		} else {
			$this->session->set_flashdata('messageChangePassword',"Gagal mengubah password.");
		}
		
		redirect('/control/redirect_change');
	}
}