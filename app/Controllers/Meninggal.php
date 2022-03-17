<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\KematianModel;
use \Mpdf\Mpdf;

class Meninggal extends BaseController
{
	public function __construct()
	{
		$this->KematianModel = new KematianModel;
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
				'menu' => 'Meninggal',
				'title' => 'Data Meninggal',
				'isi' => 'data_kematian',
				'data' => $this->KematianModel->getData(),
				'warga' => $this->KematianModel->getDataWarga()
			];
		} else {
			$data=[
				'submenu' => 'Sirkulasi',
				'menu' => 'Meninggal',
				'title' => 'Data Meninggal',
				'isi' => 'data_kematian',
				'data' => $this->KematianModel->getDataSelect($tgl1, $tgl2),
				'warga' => $this->KematianModel->getDataWarga()
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
			'data' => $this->KematianModel->getData(),
		];	
		} else {
		$data_cetak = [
			'data' => $this->KematianModel->getDataSelect($tgl1, $tgl2),
		]; }
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('laporankematian', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function save()
	{
		$data = [
					'nik'	=> $this->request->getPost('nik'),
					'tanggal' => $this->request->getPost('tanggal'),
					'penyebab' => $this->request->getPost('penyebab'),
				];
		$nik = $this->request->getPost('nik');
		$warga = [
			'ket' => '2'
		];
		$this->KematianModel->simpan($data);
		$this->KematianModel->ubahwarga($nik, $warga);
		session()->setFlashdata('success', 'Data Kematian Berhasil Disimpan');
		return redirect()->to(base_url('meninggal'));
	}

	public function update()
	{
		$data = [
					'nik'	=> $this->request->getPost('nik'),
					'tanggal' => $this->request->getPost('tanggal'),
					'penyebab' => $this->request->getPost('penyebab'),
				];
		$id = $this->request->getPost('id');
		$nik = $this->request->getPost('nik');
		$warga = [
			'ket' => '2'
		];
		$this->KematianModel->ubahwarga($nik, $warga);
		$this->KematianModel->ubah($id, $data);
		session()->setFlashdata('success', 'Data Kematian Berhasil Diperbarui');
		return redirect()->to(base_url('meninggal'));
	}

	public function delete($id)
	{
		$warga = [
			'ket' => '1'
		];
		$this->KematianModel->ubahwarga($id, $warga);
		$this->KematianModel->hapus($id);
		session()->setFlashdata('success', 'Data Kematian Berhasil Dihapus');
		return redirect()->to(base_url('meninggal'));
	}
}