<?php namespace App\Models;
use CodeIgniter\Model;

class CetakModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getData($table, $pk, $id)
	{
		return $this->db->table($table)->where($pk, $id)->get()->getRow();
	}
	
}