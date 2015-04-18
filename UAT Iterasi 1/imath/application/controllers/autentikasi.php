<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('akun_model');
			$this->load->helper('email');
    }
	
	public function index()
	{	
		if($this->session->userdata('loggedin')) {
			if($this->session->userdata('role') == "admin") {
				redirect ('admin/dashboard');
			} else {
				redirect ('home');
			}
		} else {
			$this->load->view("user/login_view");			
		}
	}			

	public function login() 
	{
	    $username = $this->input->post('username', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$dataDB = $this->akun_model->getDataAkun($username, $password);
		//jika tidak ada hasil query yang dikembalikan dari database (pasangan username-password tidak ditemukan).
		if($dataDB->num_rows() < 1) {
			$this->session->set_flashdata('messageLogin', "Username atau Password Salah !");
		} else {
			//jika ada hasil query dari database (ditemukan kecocokan username dan password).
			//proses data return query menjadi data session, agar nantinya diload pada view.
			$dataDB = $dataDB->row();
			$data_session = array (
				'namaPanggilan' => $dataDB->namaPanggilan,
				'username' => $username,
				'role' => $dataDB->role,
				'loggedin' => TRUE
			);
			$this->session->set_userdata($data_session);
		}

		redirect('/autentikasi/index');
	}
	
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('/autentikasi/index');
	}
	
	public function signup() {
		$this->load->view('user/signup_view');
	}
	
	public function process_signup() 
	{
		$username = $this->input->post('username', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$retypePassword = md5($this->input->post('retypePassword', TRUE));
		$email = $this->input->post('email', TRUE);
		$namaPanggilan = $this->input->post('namaPanggilan', TRUE);
		$gender = $this->input->post('gender');
		$data = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'role' => "user",
			'gender' => $gender,
			'namaPanggilan' => $namaPanggilan	
		);
		if($password == $retypePassword && valid_email($email)) {	
			//Cek apakah email sudah terdaftar pada database atau belum.
			$dataDB = $this->akun_model->getEmailAkun($email);
			//Cek apakah username sudah terdaftar pada database atau belum.
			$dataDB2 = $this->akun_model->getDataAkun($username, $password);
			
			//Jika terjadi duplikat email / duplikat username / captcha salah, tampilkan pesan error.
			if($dataDB->num_rows() >= 1) {
				$this->session->set_flashdata('messageSignup',"Account Gagal dibuat, silahkan gunakan email lain.");
			} else if ($dataDB2->num_rows() >= 1) {
				$this->session->set_flashdata('messageSignup',"Account Gagal dibuat, silahkan gunakan username lain.");			
			} else {
				$res = $this->akun_model->setDataAkun($data);
				$dataIdRapor = array('username' => $username);
				$res2 = $this->akun_model->setIdRapor($dataIdRapor);
				if($res==1 && $res2==1) {
					$this->session->set_flashdata('messageSignup',"Account Berhasil dibuat");
				} else {
					$this->session->set_flashdata('messageSignup',"Account Gagal dibuat");
				}
			}
		} else {
			$this->session->set_flashdata('messageSignup',"Account Gagal dibuat, Isian data tidak valid.");
		}
		redirect('/autentikasi/signup');
	}
	
	public function forget()
	{
		$this->load->view('user/lupapassword_view');
	}
	
	public function process_forget() 
	{
		$email = $this->input->post('email', TRUE);
		$dataDB = $this->akun_model->getEmailAkun($email);
		
			if($dataDB->num_rows() >= 1 && valid_email($email)) {
				$this->session->set_flashdata('messageForget', "Sukses request Password, silahkan cek email anda.");
				$userPassword = $dataDB->row()->password;
				$userUsername = $dataDB->row()->username;
				
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
				$message = "Passcode ".$userUsername." = ".$userPassword;
				$this->email->from('imathcsui@gmail.com'); // change it to yours
				$this->email->to($email);// change it to yours
				$this->email->subject('iMath account Password');
				$this->email->message($message);
				$this->email->send();
			} else {
				$this->session->set_flashdata('messageForget',"Anda belum pernah mendaftar.");
			}			
			
		redirect('autentikasi/forget');	
	}
	
	public function update_password()
	{
		$this->load->view("user/lupapassword2_view");
	}
	
	public function process_updatepassword() 
	{
		$passcode = $this->input->post('passcode', TRUE);
		$username = $this->input->post('username', TRUE);
		$newPassword = $this->input->post('newPassword', TRUE);
		$recPassword = $this->input->post('retypeNewPassword', TRUE);
		
		if($newPassword == $recPassword) {
			$res = $this->akun_model->updatePassword(array('password' => md5($newPassword)), $passcode);
			
			if($res == 1){
				$this->session->set_flashdata('messageChangePassword',"Sukses mengubah password.");
			} else {
				$this->session->set_flashdata('messageChangePassword',"Gagal mengubah password.");
			}
		} else {
			$this->session->set_flashdata('messageChangePassword',"Gagal mengubah password.");
		}
		
		redirect('/autentikasi/update_password');
	}
}