<?php namespace App\Controllers;
use \Mpdf\Mpdf;
use CodeIgniter\Controller;
use App\Models\UserModel;

class User extends BaseController
{

	public function __construct()
	{
		$this->UserModel = new UserModel;
		helper('form');
		helper('url');
	}

	public function me()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$nik = session()->get('nik');
		$data=[
			'submenu' => '',
			'menu' => 'saya',
			'title' => 'Data Saya',
			'isi' => 'profile',
			'data' => $this->UserModel->getDataWhere($nik),
		];
		echo view('layout/v_wrap', $data);
	}

	public function ubahprofile($nik)
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$nik = session()->get('nik');
		$cekData = $this->UserModel->cekData($nik);
		if ((session()->get('level')=='Warga')) {
			if (empty($cekData)) {
				
			}
			elseif ($cekData->ket==1) {
				session()->setFlashdata('gagal', 'Maaf Anda Sudah Melakukan Pengajuan Perubahan Data. Tolong Untuk Menunggu Konfirmasi Agar Bisa Mengubah Kembali !!!');
			return redirect()->to(base_url('user/me'));	
			}
		}
		$data=[
			'submenu' => '',
			'menu' => 'saya',
			'title' => 'Data Saya',
			'isi' => 'ubahprofile',
			'data' => $this->UserModel->getDataWhere($nik),
		];
		echo view('layout/v_wrap', $data);
	}

	public function validasiajuan()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => '',
			'menu' => 'validasi',
			'title' => 'Data Pengajuan',
			'isi' => 'dataajuan',
			'data' => $this->UserModel->getAjuan(),
		];
		echo view('layout/v_wrap', $data);	
	}

	public function validasipassword()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data=[
			'submenu' => '',
			'menu' => 'password',
			'title' => 'Data Pengajuan Password',
			'isi' => 'datapassword',
			'data' => $this->UserModel->getUbahPassword(),
		];
		echo view('layout/v_wrap', $data);	
	}

	public function deleteajuan($id)
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$this->UserModel->hapusajuan($id);
		session()->setFlashdata('success', 'Data Pengajuan Berhasil Dihapus');
		return redirect()->to(base_url('user/validasiajuan'));
	}

	public function deletepass($id)
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data['ket'] = 1;
		$this->UserModel->hapuspass($id, $data);
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to(base_url('user/validasipassword'));
	}

	public function konfirmasiajuan($kode)
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$kode = explode("-", $kode);
		$nik = $kode[0];
		$id = $kode[1];
		$data = [
			'ket' => 2,
		];
		$new = [
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
		$this->UserModel->updajuan($id, $data);
		$this->UserModel->updwarga($nik, $new);
		session()->setFlashdata('success', 'Data User Berhasil Dikonfirmasi');
		return redirect()->to(base_url('user/validasiajuan'));
	}

	public function tolakajuan($id)
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data = [
			'ket' => 3
		];
		$this->UserModel->updajuan($id, $data);
		session()->setFlashdata('success', 'Data User Berhasil Ditolak');
		return redirect()->to(base_url('user/validasiajuan'));
	}

	public function index()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$nik = session()->get('nik');
		$data=[
			'submenu' => '',
			'menu' => 'saya',
			'title' => 'Data User',
			'isi' => 'datauser',
			'data' => $this->UserModel->getData(),
			'warga' => $this->UserModel->getDataWarga(),
		];
		echo view('layout/v_wrap', $data);
	}

	public function ajukan()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		if ((session()->get('level')!='Warga')) {
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
				'no_hp'	=> $this->request->getPost('no_hp'),
			]; 
			$this->UserModel->updwarga($this->request->getPost('nik') ,$data);
			session()->setFlashdata('done', 'Data User Berhasil Diperbarui');
		} else {
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
					'no_hp'	=> $this->request->getPost('no_hp'),
					'ket' => 1,
		];
		$this->UserModel->simpanajukan($data);
		session()->setFlashdata('success', 'Data User Berhasil Diajukan'); }
		return redirect()->to(base_url('user/me'));
	}

	public function save()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$nik = $this->request->getPost('nik');
		$data = [
			'nik' => $nik,
			'level' => $this->request->getPost('level'),
			'password' => $this->request->getPost('password'),			
		];
		$warga = [
			'ket' => 1
		];
		$this->UserModel->ubahwarga($nik, $warga);
		$this->UserModel->simpan($data);
		session()->setFlashdata('success', 'Data User Berhasil Disimpan');
		return redirect()->to(base_url('user'));
	}

	public function update()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data = [
			'level' => $this->request->getPost('level'),
			'password' => $this->request->getPost('password'),			
		];
		$nik = $this->request->getPost('nik');
		$this->UserModel->ubah($nik, $data);
		session()->setFlashdata('success', 'Data User Berhasil Diperbarui');
		return redirect()->to(base_url('user'));
	}

	public function updatepassword()
	{
		if ((session()->get('nik')=='')) {
		session()->setFlashdata('gagal', 'Maaf Anda Tidak Bisa Masuk !!!');
		session()->destroy();
		return redirect()->to(base_url('login'));
		}
		$data = [
			'ket' => 1,
			'password' => $this->request->getPost('password'),		
		];
		$nik = $this->request->getPost('nik');
		$this->UserModel->ubah($nik, $data);
		session()->setFlashdata('success', 'Password Berhasil Diperbarui');
		return redirect()->to(base_url('user/validasiajuan'));
	}

	public function delete($nik)
	{
		$this->UserModel->hapus($nik);
		session()->setFlashdata('success', 'Data User Berhasil Dihapus');
		return redirect()->to(base_url('user'));
	}

	public function ajukanpassword()
	{
		$nik = $this->request->getPost('nik');
		$data = [
			'ket' => 2,
		];
		$this->UserModel->ubah($nik, $data);
		session()->setFlashdata('success', 'Pengajuan Password Berhasil');
		return redirect()->to(base_url('login'));
	}

}