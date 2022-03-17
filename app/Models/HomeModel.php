<?php namespace App\Models;
use CodeIgniter\Model;

class HomeModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function cekData($nik) 
	{
		return $this->db->table('warga')->where(['nik'=>$nik])->get()->getResult();
	}

	public function cekMenu($nik)
	{
		return $this->db->table('warga')->select('nama')->where('nik', $nik)->get()->getResult();
	}

	public function countData($table)
	{
		return $this->db->table($table)->countAllResults();
	}

	public function countWhere($table, $pk, $key1)
	{
		return $this->db->table($table)->where($pk, $key1)->countAllResults();
	}

}