<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends BaseController
{	

	public function __construct()
	{
		$this->LoginModel = new LoginModel();
		helper('form');
		helper('url');
	}

	public function index()
	{
		echo view('login');
		session()->destroy();	
	}

	public function ajukan()
	{
		echo view('forgetpassword');
	}

	public function cek_login()
	{
		$nik = $this->request->getPost('nik');
		$pass = $this->request->getPost('password');
		$getname = $this->LoginModel->getNama($nik);
		$cek = $this->LoginModel->login($nik, $pass);
		if (empty($cek)) {
			//Jika Pass Salah
			session()->setFlashdata('gagal', 'Username Atau Password Salah');
			return redirect()->to(base_url('login'));
		}
		$user=$cek->nik;
		$pasw=$cek->password;
		if (($user==$nik) && ($pasw==$pass)) {
			session()->set('nik', $cek->nik);
			session()->set('level', $cek->level);
			session()->set('nama', $getname->nama);
			return redirect()->to(base_url('home'));
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('login'));
	}

}