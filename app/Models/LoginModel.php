<?php namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function login($nik, $pass) 
	{
		return $this->db->table('akun')->where(['nik'=>$nik, 'password'=>$pass])->get()->getRow();
	}

	public function getNama($nik)
	{
		return $this->db->table('warga')->select('nama')->where('nik', $nik)->get()->getRow();
	}
}