<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function getDataAkun($username)
	{
		$dataDB = $this->db->get_where('akun', array('username' => $username));
		return $dataDB;
	}
	
	public function getEmailAkun($email)
	{
		$dataDB = $this->db->get_where('akun', array('email' => $email));
		return $dataDB;
	}
	
	public function setDataAkun($data)
	{
		$res = $this->db->insert('akun', $data);
		return $res;
	}

	public function setIdRapor($data)
	{
		$res = $this->db->insert('rapor', $data);
		return $res;
	}
	
	public function updatePassword($password, $passcode)
	{
		$res = $this->db->update('akun', $password, $passcode);
		return $res;
	}
	
	public function deleteData($table, $where)
	{
		$res = $this->db->delete($table, $where);
		return $res;
	}
	
}