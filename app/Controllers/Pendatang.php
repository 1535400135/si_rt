<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\TamuModel;
use \Mpdf\Mpdf;

class Pendatang extends BaseController
{
	public function __construct()
	{
		$this->TamuModel = new TamuModel;
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
			'menu' => 'Pendatang',
			'title' => 'Data Tamu',
			'isi' => 'data_pendatang',
			'data' => $this->TamuModel->getData(),
			'warga' => $this->TamuModel->getDataWarga()
		];
		} else {
			$data=[
			'submenu' => 'Sirkulasi',
			'menu' => 'Pendatang',
			'title' => 'Data Tamu',
			'isi' => 'data_pendatang',
			'data' => $this->TamuModel->getDataSelect($tgl1, $tgl2),
			'warga' => $this->TamuModel->getDataWarga()
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
			'data' => $this->TamuModel->getData(),
		];	
		} else {
		$data_cetak = [
			'data' => $this->TamuModel->getDataSelect($tgl1, $tgl2),
		]; }
		
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('laporantamu', $data_cetak));
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
			'menu' => 'Pendatang',
			'title' => 'Data Tamu',
			'isi' => 'ubah_pendatang',
			'data' => $this->TamuModel->getDataWhere($id),
			'warga' => $this->TamuModel->getDataWarga()
		];
		echo view('layout/v_wrap', $data);
	}

	public function save()
	{
		$data = [
					'nik'	=> $this->request->getPost('nik'),
					'nama'	=> $this->request->getPost('nama'),
					'jk'	=> $this->request->getPost('jk'),
					'tgl_in' => $this->request->getPost('tgl_in'),
					'tgl_out' => $this->request->getPost('tgl_out'),
					'pelapor' => $this->request->getPost('pelapor'),
				];
		$this->TamuModel->simpan($data);
		session()->setFlashdata('success', 'Data Tamu Berhasil Disimpan');
		return redirect()->to(base_url('pendatang'));
	}

	public function update()
	{
		$data = [
					'nik'	=> $this->request->getPost('nik'),
					'nama'	=> $this->request->getPost('nama'),
					'jk'	=> $this->request->getPost('jk'),
					'tgl_in' => $this->request->getPost('tgl_in'),
					'tgl_out' => $this->request->getPost('tgl_out'),
					'pelapor' => $this->request->getPost('pelapor'),
				];
		$id = $this->request->getPost('id');
		$this->TamuModel->ubah($id, $data);
		session()->setFlashdata('success', 'Data Tamu Berhasil Diperbarui');
		return redirect()->to(base_url('pendatang'));
	}

	public function delete($id)
	{
		$this->TamuModel->hapus($id);
		session()->setFlashdata('success', 'Data Tamu Berhasil Dihapus');
		return redirect()->to(base_url('pendatang'));
	}
}