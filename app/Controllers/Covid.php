<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CovidModel;
use \Mpdf\Mpdf;

class Covid extends BaseController
{
	
	public function __construct() {
		$this->CovidModel = new CovidModel();
		helper('url');
		helper('form');
	}

	public function positif()
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
			'submenu' => 'Covid',
			'menu' => 'positif',
			'title' => 'Data Positif COVID-19',
			'isi' => 'data_positif',
			'warga' => $this->CovidModel->getWarga(),
			'data' => $this->CovidModel->getData()
		]; }
		else {
			$data=[
			'submenu' => 'Covid',
			'menu' => 'positif',
			'title' => 'Data Positif COVID-19',
			'isi' => 'data_positif',
			'warga' => $this->CovidModel->getWarga(),
			'data' => $this->CovidModel->getDataCovid($tgl1, $tgl2)
		];
		}
		echo view('layout/v_wrap', $data);
	}

	public function laporanpositif()
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
			'data' => $this->CovidModel->getData(),
		];	
		} else {
		$data_cetak = [
			'data' => $this->CovidModel->getDataCovid($tgl1, $tgl2),
		];
		}
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('laporanpositif', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function save()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data = [
			'nik' => $this->request->getPost('nik'),
			'status' => $this->request->getPost('status'),
			'tglkena' => $this->request->getPost('tglkena'),
			'tglsembuh' => $this->request->getPost('tglsembuh'),
			'rsrujukan' => $this->request->getPost('rujukan')
		];
		$this->CovidModel->simpan($data);
		session()->setFlashdata('success', 'Data Covid Berhasil Disimpan');
		return redirect()->to(base_url('covid/positif'));
	}

	public function savevaksin()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data = [
			'nik' => $this->request->getPost('nik'),
			'status' => $this->request->getPost('status'),
			'tglvaksin1' => $this->request->getPost('tglvaksin1'),
			'tglvaksin2' => $this->request->getPost('tglvaksin2'),
			'vaskes' => $this->request->getPost('vaskes')
		];
		$this->CovidModel->simpanvaksinasi($data);
		session()->setFlashdata('success', 'Data Vaksinasi Berhasil Disimpan');
		return redirect()->to(base_url('covid/vaksinasi'));
	}

	public function update()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data = [
			'status' => $this->request->getPost('status'),
			'tglsembuh' => $this->request->getPost('tglsembuh'),
			'rsrujukan' => $this->request->getPost('rsrujukan')
		];
		$id = $this->request->getPost('id');
		$this->CovidModel->ubah($id, $data);
		session()->setFlashdata('success', 'Data Covid Berhasil Diperbarui');
		return redirect()->to(base_url('covid/positif'));
	}

	public function updatevaksin()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data = [
			'status' => $this->request->getPost('status'),
			'tglvaksin2' => $this->request->getPost('tglvaksin2'),
			'vaskes' => $this->request->getPost('vaskes')
		];
		$id = $this->request->getPost('id');
		$this->CovidModel->ubahvaksin($id, $data);
		session()->setFlashdata('success', 'Data Vaksinasi Berhasil Diperbarui');
		return redirect()->to(base_url('covid/vaksinasi'));
	}

	
	public function delete($id)
	{
		$this->CovidModel->hapus($id);
		session()->setFlashdata('success', 'Data Covid Berhasil Diperbarui');
		return redirect()->to(base_url('covid/positif'));
	}

	public function vaksinasi()
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
			'submenu' => 'Covid',
			'menu' => 'positif',
			'title' => 'Data Positif COVID-19',
			'isi' => 'data_vaksin',
			'warga' => $this->CovidModel->getWarga(),
			'data' => $this->CovidModel->getDataVaksin()
		]; } else {
		$data=[
			'submenu' => 'Covid',
			'menu' => 'positif',
			'title' => 'Data Positif COVID-19',
			'isi' => 'data_vaksin',
			'warga' => $this->CovidModel->getWarga(),
			'data' => $this->CovidModel->getDataVaksinSelect($tgl1, $tgl2)
		];	
		}
		echo view('layout/v_wrap', $data);
	}

	public function laporanvaksin()
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
			'data' => $this->CovidModel->getDataVaksin(),
		];
		} else {
		$data_cetak = [
			'data' => $this->CovidModel->getDataVaksinSelect($tgl1, $tgl2),
		];
		}
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('laporanvaksin', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

}