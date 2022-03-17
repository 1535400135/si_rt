<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\WargaModel;
use \Mpdf\Mpdf;

class Warga extends BaseController
{
	public function __construct()
	{
		$this->WargaModel = new WargaModel;
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
			'submenu' => 'Data',
			'menu' => 'Warga',
			'title' => 'Data Warga',
			'isi' => 'data_warga',
			'data' => $this->WargaModel->getData()
		]; } else {
			$data=[
			'submenu' => 'Data',
			'menu' => 'Warga',
			'title' => 'Data Warga',
			'isi' => 'data_warga',
			'data' => $this->WargaModel->getDataSelect($tgl1, $tgl2)
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
			'data' => $this->WargaModel->getData(),
		];
		} else {
		$data_cetak = [
			'data' => $this->WargaModel->getDataSelect($tgl1, $tgl2),
		];
		}
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('laporanwarga', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function ubah($nik)
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'Data',
			'menu' => 'Warga',
			'title' => 'Data Warga',
			'isi' => 'ubah_warga',
			'data' => $this->WargaModel->getDataWhere($nik)
		];
		echo view('layout/v_wrap', $data);
	}
	
	public function save()
	{
		$nik = $this->request->getPost('nik');
		$cekData = $this->WargaModel->cekData($nik);
		if ($cekData->nilai==0) {
			$data = [
						'nik'	=> $this->request->getPost('nik'),
						'nama' => $this->request->getPost('nama'),
						'tempat' => $this->request->getPost('tempat'),
						'tanggal' => $this->request->getPost('tanggal'),
						'jk' => $this->request->getPost('jk'),
						'alamat' => $this->request->getPost('alamat'),
						'rt' => $this->request->getPost('rt'),
						'rw' => $this->request->getPost('rw'),
						'agama' => $this->request->getPost('agama'),
						'status' => $this->request->getPost('status'),
						'pekerjaan' => $this->request->getPost('pekerjaan'),
						'kewarganegaraan'	=> $this->request->getPost('kewarganegaraan'),
						'no_hp'	=> $this->request->getPost('no_hp')
					];
			$simpan = $this->WargaModel->simpan($data);
			if (empty($simpan)) {
				session()->setFlashdata('gagal', 'Data Tidak Berhasil Disimpan');
				return redirect()->to(base_url('warga'));	
			} else {
				session()->setFlashdata('success', 'Data Warga Berhasil Disimpan');
				return redirect()->to(base_url('warga'));
			}
		} else {
			session()->setFlashdata('gagal', 'Maaf Data Sudah Ada');
			return redirect()->to(base_url('warga'));	
		}
	}

	public function update()
	{
		$data = [
					'nama' => $this->request->getPost('nama'),
					'tempat' => $this->request->getPost('tempat'),
					'tanggal' => $this->request->getPost('tanggal'),
					'jk' => $this->request->getPost('jk'),
					'alamat' => $this->request->getPost('alamat'),
					'rt' => $this->request->getPost('rt'),
					'rw' => $this->request->getPost('rw'),
					'agama' => $this->request->getPost('agama'),
					'status' => $this->request->getPost('status'),
					'pekerjaan' => $this->request->getPost('pekerjaan'),
					'kewarganegaraan'	=> $this->request->getPost('kewarganegaraan'),
					'no_hp'	=> $this->request->getPost('no_hp')
				];
		$nik = $this->request->getPost('nik');
		$this->WargaModel->ubah($nik, $data);
		session()->setFlashdata('success', 'Data Warga Berhasil Disimpan');
		return redirect()->to(base_url('warga'));
	}

	public function delete($nik)
	{
		$this->WargaModel->hapus($nik);
		session()->setFlashdata('success', 'Data Warga Berhasil Dihapus');
		return redirect()->to(base_url('warga'));
	}

}