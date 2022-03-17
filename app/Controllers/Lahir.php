<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\KelahiranModel;
use \Mpdf\Mpdf;

class Lahir extends BaseController
{
	public function __construct()
	{
		$this->KelahiranModel = new KelahiranModel;
		helper('form');
		helper('url');
	}

	public function index()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$tgl1= $this->request->getPost('tanggal1');
		$tgl2= $this->request->getPost('tanggal2');
		
		if (($tgl1=='') && ($tgl2=='')) {
			$data=[
				'submenu' => 'Sirkulasi',
				'menu' => 'Lahir',
				'title' => 'Data Lahir',
				'isi' => 'data_lahir',
				'data' => $this->KelahiranModel->getData(),
				'no_kk' => $this->KelahiranModel->getDataKk()
			];
		} else {
			$data=[
				'submenu' => 'Sirkulasi',
				'menu' => 'Lahir',
				'title' => 'Data Lahir',
				'isi' => 'data_lahir',
				'data' => $this->KelahiranModel->getDataSelect($tgl1, $tgl2),
				'no_kk' => $this->KelahiranModel->getDataKk()
			];
		}
		echo view('layout/v_wrap', $data);
	}

	public function laporan()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$tgl1= $this->request->getPost('tanggal1');
		$tgl2= $this->request->getPost('tanggal2');
		if (($tgl1=='') && ($tgl2=='')) {
			$data_cetak = [
			'data' => $this->KelahiranModel->getData(),
		];	
		} else {
		$data_cetak = [
			'data' => $this->KelahiranModel->getDataSelect($tgl1, $tgl2),
		]; }
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('laporanlahir', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function ubah($id)
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'Sirkulasi',
			'menu' => 'Lahir',
			'title' => 'Data Lahir',
			'isi' => 'ubah_lahir',
			'data' => $this->KelahiranModel->getDataWhere($id),
			'no_kk' => $this->KelahiranModel->getDataKk()
		];
		echo view('layout/v_wrap', $data);
	}

	public function save()
	{
		$data = [
					'no_kk'	=> $this->request->getPost('no_kk'),
					'nama' => $this->request->getPost('nama'),
					'tanggal' => $this->request->getPost('tanggal'),
					'jk' => $this->request->getPost('jk'),
				];
		$this->KelahiranModel->simpan($data);
		session()->setFlashdata('success', 'Data Kelahiran Berhasil Disimpan');
		return redirect()->to(base_url('lahir'));
	}

	public function update()
	{
		$data = [
					'no_kk'	=> $this->request->getPost('no_kk'),
					'nama' => $this->request->getPost('nama'),
					'tanggal' => $this->request->getPost('tanggal'),
					'jk' => $this->request->getPost('jk'),
				];
		$id = $this->request->getPost('id');
		$this->KelahiranModel->ubah($id, $data);
		session()->setFlashdata('success', 'Data Kelahiran Berhasil Diperbarui');
		return redirect()->to(base_url('lahir'));
	}

	public function delete($id)
	{
		$this->KelahiranModel->hapus($id);
		session()->setFlashdata('success', 'Data Kelahiran Berhasil Dihapus');
		return redirect()->to(base_url('lahir'));
	}
}