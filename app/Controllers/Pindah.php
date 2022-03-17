<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PindahModel;
use \Mpdf\Mpdf;

class Pindah extends BaseController
{
	public function __construct()
	{
		$this->PindahModel = new PindahModel;
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
			'menu' => 'Pindah',
			'title' => 'Data Pindah',
			'isi' => 'data_pindah',
			'data' => $this->PindahModel->getData(),
			'warga' => $this->PindahModel->getDataWarga()
		];
		} else {
			$data=[
			'submenu' => 'Sirkulasi',
			'menu' => 'Pindah',
			'title' => 'Data Pindah',
			'isi' => 'data_pindah',
			'data' => $this->PindahModel->getDataSelect($tgl1, $tgl2),
			'warga' => $this->PindahModel->getDataWarga()
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
			'data' => $this->PindahModel->getData(),
		];	
		} else {
		$data_cetak = [
			'data' => $this->PindahModel->getDataSelect($tgl1, $tgl2),
		]; }
		
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('laporanpindah', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function save()
	{
		$data = [
					'nik'	=> $this->request->getPost('nik'),
					'tglpindah' => $this->request->getPost('tanggal'),
					'alasan' => $this->request->getPost('alasan'),
				];
		$warga = [
			'ket' => '3'
		];
		$id = $this->request->getPost('nik');
		$this->PindahModel->ubahwarga($id, $warga);
		$this->PindahModel->simpan($data);
		session()->setFlashdata('success', 'Data Pindah Berhasil Disimpan');
		return redirect()->to(base_url('pindah'));
	}

	public function update()
	{
		$data = [
					'tglpindah' => $this->request->getPost('tanggal'),
					'alasan' => $this->request->getPost('alasan'),
				];
		$warga = [
			'ket' => '3'
		];
		$this->PindahModel->ubahwarga($id, $warga);		
		$id = $this->request->getPost('nik');
		$this->PindahModel->ubah($id, $data);
		session()->setFlashdata('success', 'Data Pindah Berhasil Diperbarui');
		return redirect()->to(base_url('pindah'));
	}

	public function delete($id)
	{
		$warga = [
			'ket' => '1'
		];
		$this->PindahModel->ubahwarga($id, $warga);
		$this->PindahModel->hapus($id);
		session()->setFlashdata('success', 'Data Pindah Berhasil Dihapus');
		return redirect()->to(base_url('pindah'));
	}
}