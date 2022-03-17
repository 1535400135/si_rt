<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\SuratModel;
use \Mpdf\Mpdf;

class Surat extends BaseController
{
	
	public function __construct() {
		$this->SuratModel = new SuratModel();
		helper('form');
		helper('url');
	}

	public function validasi()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => '',
			'menu' => 'Validasi',
			'title' => 'Data Validasi',
			'isi' => 'validasi',
			'data' => $this->SuratModel->getDataValidasi(),
		];
		echo view('layout/v_wrap', $data);
	}

	public function pengajuan()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$nik = session()->get('nik');
		$data=[
			'submenu' => '',
			'menu' => 'Pengajuan Surat',
			'title' => 'Pengajuan Surat',
			'isi' => 'suratwarga',
			'warga' => $this->SuratModel->getTableWhere('warga', $nik),
			'data' => $this->SuratModel->getTablePengajuan($nik)
		];
		echo view('layout/v_wrap', $data);
	}

	public function savepengajuan()
	{
		$data = [
			'nik' => $this->request->getPost('nik'),
			'konfirmasi' => 1,
			'keperluan' => $this->request->getPost('keperluan')
		];
		$this->SuratModel->simpanpengajuan($data);
		session()->setFlashdata('success', 'Pengajuan Surat Berhasil');
		return redirect()->to(base_url('surat/pengajuan'));
	}

	public function konfirmasi($id)
	{
		$data = [
					'konfirmasi'	=> 2,
				];
		$this->SuratModel->validasiSurat($id, $data);
		session()->setFlashdata('success', 'Surat Di Konfirmasi Berhasil Disimpan');
		return redirect()->to(base_url('surat/validasi'));
	}

	public function tolak($id)
	{
		$data = [
					'konfirmasi'	=> 3,
				];
		$this->SuratModel->validasiSurat($data);
		session()->setFlashdata('success', 'Surat Di Konfirmasi Berhasil Disimpan');
		return redirect()->to(base_url('surat/validasi'));
	}

	public function delete($id)
	{
		$this->SuratModel->hapusSurat($id);
		session()->setFlashdata('success', 'Surat Berhasil Dihapus');
		return redirect()->to(base_url('surat/validasi'));
	}

	public function pendatang()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'pendatang',
			'title' => 'Surat Pendatang',
			'isi' => 'surat_pendatang',
			'data' => $this->SuratModel->getTable('tamu'),
		];
		echo view('layout/v_wrap', $data);
	}

	public function domisili()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'domisili',
			'title' => 'Surat Domisili',
			'isi' => 'surat_domisili',
			'data' => $this->SuratModel->getTable('warga'),
		];
		echo view('layout/v_wrap', $data);
	}

	public function pengantar()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'pengantar',
			'title' => 'Surat Pengantar',
			'isi' => 'suratpengantar',
			'data' => $this->SuratModel->getTable('warga'),
		];
		echo view('layout/v_wrap', $data);
	}

	public function pindah()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'pindah',
			'title' => 'Surat Pindah',
			'isi' => 'suratpindah',
			'data' => $this->SuratModel->getTableJoin('pindah'),
		];
		echo view('layout/v_wrap', $data);
	}

	public function kelahiran()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'kelahiran',
			'title' => 'Surat Kelahiran',
			'isi' => 'suratkelahiran',
			'data' => $this->SuratModel->getTable('kelahiran'),
		];
		echo view('layout/v_wrap', $data);
	}

	public function covid()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'covid',
			'title' => 'Surat Covid',
			'isi' => 'suratcovid',
			'data' => $this->SuratModel->getCovid(),
		];
		echo view('layout/v_wrap', $data);
	}

	public function blmmenikah()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'belum menikah',
			'title' => 'Surat Covid',
			'isi' => 'suratblmnikah',
			'data' => $this->SuratModel->getTableKondisi('warga', 'status', 'Belum Menikah'),
		];
		echo view('layout/v_wrap', $data);
	}

	public function sudahmenikah()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'sudah menikah',
			'title' => 'Surat Menikah',
			'isi' => 'sudahmenikah',
			'data' => $this->SuratModel->getTableKondisi('warga', 'status', 'Sudah Menikah'),
			'warga' => $this->SuratModel->getTable('warga')
		];
		echo view('layout/v_wrap', $data);
	}

	public function kematian()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => 'surat',
			'menu' => 'kematian',
			'title' => 'Surat Kematian',
			'isi' => 'suratkematian',
			'data' => $this->SuratModel->getTableJoin('kematian'),
		];
		echo view('layout/v_wrap', $data);
	}

	public function cetakpendatang($id='')
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$kode = $this->request->getPost('id');
		$data_cetak = [
			'nomor_surat' => $this->request->getPost('nomor_surat'),
		];

		$data_cetak['data'] = $this->SuratModel->cetakTamu($kode);
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakpendatang', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function cetakdomisili()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$nik = $this->request->getPost('nik');
			$data_cetak = [
			'nomor_surat' => $this->request->getPost('nomor_surat'),
			'masa' => $this->request->getPost('masa'),
		];
		$data_cetak['data'] = $this->SuratModel->getTableWhere('warga', $nik);
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakdomisili', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function cetakpengantar($id='')
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
			$kode = $this->request->getPost('nik');
			$data_cetak = [
			'nomor_surat' => $this->request->getPost('nomor_surat'),
			'tujuan' => $this->request->getPost('tujuan'),
		];

		$data_cetak['data'] = $this->SuratModel->getTableWhere('warga', $kode);
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakpengantar', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function cetakpindah($id='')
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$kode = $this->request->getPost('nik');
		$data_cetak = [
			'nomor_surat' => $this->request->getPost('nomor_surat'),
		];

		$data_cetak['data'] = $this->SuratModel->cetakPindah($kode);
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakpindah', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function cetakcovid($id='')
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$kode = $this->request->getPost('nik');
		$data_cetak = [
			'nomor_surat' => $this->request->getPost('nomor_surat'),
			'masa' => $this->request->getPost('masa'),
			'masa2' => $this->request->getPost('masa2'),
		];
		$data_cetak['data'] = $this->SuratModel->getCovidWhere($kode);
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakcovid', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function cetakblmnikah($id='')
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$kode = $this->request->getPost('nik');
		$data_cetak = [
			'nomor_surat' => $this->request->getPost('nomor_surat'),
		];
		$data_cetak['data'] = $this->SuratModel->cetakTableKondisi('warga', 'status', 'Belum Menikah','nik', $kode);
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakblmnikah', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function cetaksdhnikah($id='')
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$kode = $this->request->getPost('nik');
		$data_cetak = [
			'masa' => $this->request->getPost('masa'),
			'nomor_surat' => $this->request->getPost('nomor_surat'),
		];
		$pasangan = $this->request->getPost('pasangan');
		$data_cetak['data'] = $this->SuratModel->cetakTableKondisi('warga', 'status', 'Sudah Menikah', 'nik', $kode);
		$data_cetak['istri'] = $this->SuratModel->getTableWhere('warga', $pasangan);
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakmenikah', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function cetakkematian($id='')
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$kode = $this->request->getPost('id');
		$data_cetak = [
			'nomor_surat' => $this->request->getPost('nomor_surat'),
		];
		$data_cetak['data'] = $this->SuratModel->cetakMeninggal($kode);
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakkematian', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

	public function cetakkelahiran()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$kode = $this->request->getPost('id');
		$data_cetak = [
			'ayah' => $this->request->getPost('ayah'),
			'ibu' => $this->request->getPost('ibu'),
			'nomor_surat' => $this->request->getPost('nomor_surat'),
		];
		$data_cetak['data'] = $this->SuratModel->getTableKondisi('kelahiran', 'id', $kode);
		
		$mpdf = new Mpdf([
			'default_font' => 'Times New Roman',
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin-left' => 300,
			'margin-right' => 300,
		]);
        $mpdf->WriteHTML(view('cetakkelahiran', $data_cetak));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));
	}

}