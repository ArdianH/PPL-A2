<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	// public function getMahasiswa()
	// {
			// $data = $this->db->query("SELECT * FROM MAHASISWA");
			// return $data;
	// }
	
	public function getData($table, $where = "")
	{
		$dataDB = $this->db->query("SELECT * FROM ".$table." ".$where);
		return $dataDB;
	}
	
	public function setData($table, $data)
	{
		$res = $this->db->insert($table, $data);
		return $res;
	}
	
	public function updateData($table, $data, $where)
	{
		$res = $this->db->update($table, $data, $where);
		return $res;
	}
	
	public function deleteData($table, $where)
	{
		$res = $this->db->delete($table, $where);
		return $res;
	}
	
}