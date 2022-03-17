<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\KKModel;
use \Mpdf\Mpdf;

class KK extends BaseController
{

	public function __construct()
	{
		$this->KKModel = new KKModel;
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
			$data =[
				'submenu' => 'Data',
				'menu' => 'KK',
				'title' => 'Data KK',
				'isi' => 'data_kk',
				'data' => $this->KKModel->getData(),
				'nik' => $this->KKModel->getDataNik()
			];
		} else {
			$data =[
				'submenu' => 'Data',
				'menu' => 'KK',
				'title' => 'Data KK',
				'isi' => 'data_kk',
				'data' => $this->KKModel->getDataSelect($tgl1, $tgl2),
				'nik' => $this->KKModel->getDataNik()
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
			'data' => $this->KKModel->getData(),
		];	
		} else {
		$data_cetak = [
			'data' => $this->KKModel->getDataSelect($tgl1, $tgl2),
		]; }
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('laporankk', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function ubah($no_kk)
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
			'isi' => 'ubah_kk',
			'data' => $this->KKModel->getDataWhere($no_kk),
			'nik' => $this->KKModel->getDataNik()
		];
		echo view('layout/v_wrap', $data);
	}

	public function detail($no_kk)
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
			'isi' => 'anggota_kk',
			'data' => $this->KKModel->getDataWhere($no_kk),
			'anggota' => $this->KKModel->getDataAll($no_kk),
			'nik' => $this->KKModel->getDataNik()
		];
		echo view('layout/v_wrap', $data);
	}
	
	public function save()
	{
		$data = [
					'no_kk'	=> $this->request->getPost('no_kk'),
					'nik' => $this->request->getPost('nik'),
					'alamat' => $this->request->getPost('alamat'),
					'rt' => $this->request->getPost('rt'),
					'rw' => $this->request->getPost('rw'),
					'kelurahan' => $this->request->getPost('kelurahan'),
					'kecamatan' => $this->request->getPost('kecamatan'),
					'kota' => $this->request->getPost('kota')
				];
		$anggota = [
						'no_kk'	=> $this->request->getPost('no_kk'),
						'nik' => $this->request->getPost('nik'),
						'hubungan' => 'Kepala Keluarga'
		];
		$nik = $this->request->getPost('nik');
		$warga = [
					'no_kk' => $this->request->getPost('no_kk')
		];
		$this->KKModel->simpan($data);
		$this->KKModel->simpananggota($anggota);
		$this->KKModel->updwarga($nik, $warga);
		session()->setFlashdata('success', 'Data KK Berhasil Disimpan');
		return redirect()->to(base_url('kk'));
	}

	public function saveanggota()
	{
		$data = [
					'no_kk'	=> $this->request->getPost('no_kk'),
					'nik' => $this->request->getPost('anggota_kk'),
					'hubungan' => $this->request->getPost('hubungan')
		];
		$nik = $this->request->getPost('anggota_kk');
		$warga = [
					'no_kk' => $this->request->getPost('no_kk')
		];
		$no_kk = $this->request->getPost('no_kk');
		$this->KKModel->simpananggota($data);
		$this->KKModel->updwarga($nik, $warga);
		session()->setFlashdata('success', 'Data Anggota KK Berhasil Disimpan');
		return redirect()->to(base_url('kk/detail/'.$no_kk));
	}

	public function update()
	{
		$data = [
					'nik' => $this->request->getPost('nik'),
					'alamat' => $this->request->getPost('alamat'),
					'rt' => $this->request->getPost('rt'),
					'rw' => $this->request->getPost('rw'),
					'kelurahan' => $this->request->getPost('kelurahan'),
					'kecamatan' => $this->request->getPost('kecamatan'),
					'kota' => $this->request->getPost('kota')
				];
		$no_kk = $this->request->getPost('no_kk');
		$nik = $this->request->getPost('anggota_kk');
		$warga = [
					'no_kk' => ''
		];
		$this->KKModel->updwarga($nik, $warga);
		$this->KKModel->ubah($no_kk, $data);
		session()->setFlashdata('success', 'Data KK Berhasil DiPerbarui');
		return redirect()->to(base_url('kk'));
	}

	public function delete($no_kk)
	{
		$warga = [
					'no_kk' => ''
		];
		$this->KKModel->hapuswarga($no_kk, $warga);
		$this->KKModel->hapus($no_kk);
		$this->KKModel->hapusanggota('no_kk', $no_kk);
		session()->setFlashdata('success', 'Data KK Berhasil Dihapus');
		return redirect()->to(base_url('kk'));
	}

	public function deleteanggota($nik)
	{
		$warga = [
					'no_kk' => ''
		];
		$this->KKModel->updwarga($nik, $warga);
		$this->KKModel->hapusanggota('nik', $nik);
		session()->setFlashdata('success', 'Data Anggota KK Berhasil Dihapus');
		return redirect()->to(base_url('kk'));
	}

}