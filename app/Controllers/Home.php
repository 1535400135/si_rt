<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\HomeModel;
use \Mpdf\Mpdf;

class Home extends BaseController
{	

	public function __construct()
	{
		$this->HomeModel = new HomeModel;
		helper('text');
		helper('number');
		helper('form');
	}

	public function index()
	{
		
		if ((session()->get('nik')=='')) {
			session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
			return redirect()->to(base_url('login'));
		}
		$nik=session()->get('nik');
		$data=[
			'submenu' => '',
			'menu' => 'Dashboard',
			'title' => 'Dashboard',
			'isi' => 'index',
			'warga' => $this->HomeModel->countData('warga'),
			'kk' => $this->HomeModel->countData('kk'),
			'laki' => $this->HomeModel->countWhere('warga', 'jk', 'Laki-Laki'),
			'perempuan' => $this->HomeModel->countWhere('warga', 'jk', 'Perempuan'),
			'lahir' => $this->HomeModel->countData('kelahiran'),
			'mati' => $this->HomeModel->countData('kematian'),
			'tamu' => $this->HomeModel->countData('tamu'),
			'pindah' => $this->HomeModel->countData('pindah'),
			'vaksinasi' => $this->HomeModel->countData('vaksinasi'),
			'positif' => $this->HomeModel->countWhere('covid', 'status', 'POSITIF'),
		];
		echo view('layout/v_wrap', $data);
	}

}