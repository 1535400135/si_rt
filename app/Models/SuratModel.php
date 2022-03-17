<?php namespace App\Models;
use CodeIgniter\Model;

class SuratModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getDataTamu()
	{
		return $this->db->table('pengajuansurat')
			->select('pengajuansurat.id, pengajuansurat.masa, tamu.nik, tamu.jk, tamu.nama, tamu.tgl_in, tamu.tgl_out, tamu.pelapor, pengajuansurat.konfirmasi')
			->join('tamu', 'tamu.pelapor=pengajuansurat.nik')
			->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Pendatang'])->get()->getResult();
	}

	public function getTable($table)
	{
		return $this->db->table($table)->get()->getResult();
	}

	public function getTableJoin($table)
	{
		return $this->db->table($table)->join('warga', 'warga.nik='.$table.'.nik')->get()->getResult();
	}

	public function cetakPindah($kode)
	{
		return $this->db->table('pindah')->join('warga', 'warga.nik=pindah.nik')->where('pindah.nik', $kode)->get()->getResultArray();
	}

	public function cetakTamu($kode)
	{
		return $this->db->table('tamu')->join('warga', 'warga.nik=tamu.pelapor')->select('tamu.*, warga.nama, warga.jk')->where('tamu.id', $kode)->get()->getResultArray();
	}

	public function cetakMeninggal($kode)
	{
		return $this->db->table('kematian')->join('warga', 'warga.nik=kematian.nik')->select('kematian.*, warga.nama')->where('kematian.id', $kode)->get()->getResult();
	}

	public function getTableWhere($table, $nik)
	{
		return $this->db->table($table)->where('nik', $nik)->get()->getResultArray();
	}

	public function getTablePengajuan($nik)
	{
		return $this->db->table('pengajuansurat')
		->select('pengajuansurat.*, warga.nama')
		->join('warga', 'warga.nik=pengajuansurat.nik')
		->where('pengajuansurat.nik', $nik)->get()->getResult();
	}

	public function getTableKondisi($table, $pk, $kode)
	{
		return $this->db->table($table)->where($pk, $kode)->get()->getResult();
	}

	public function cetakTableKondisi($table, $pk, $kode, $pk2, $kode2)
	{
		return $this->db->table($table)->where([$pk => $kode])->where([$pk2 => $kode2])->get()->getResultArray();
	}


	public function getDataLahir()
	{
		return $this->db->table('kelahiran')->get()->getResult();
	}

	public function getTamu()
	{
		return $this->db->table('tamu')->get()->getResult();
	}

	public function cetakDataTamu($id, $kode)
	{
		return $this->db->table('pengajuansurat')
			->select('pengajuansurat.id, pengajuansurat.nomor_surat, tamu.nik, tamu.jk, tamu.nama, tamu.tgl_in, tamu.tgl_out, warga.nama, pengajuansurat.konfirmasi, warga.nama as pelapor')
			->join('tamu', 'tamu.pelapor=pengajuansurat.nik')
			->join('warga', 'tamu.pelapor=warga.nik')
			->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Pendatang', 'pengajuansurat.id' => $id, 'tamu.id' => $kode])->get()->getResultArray();
	}

	public function getDomisili()
	{
		return $this->db->table('pengajuansurat')->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Domisili'])->get()->getResult();
	}

	public function getPindah()
	{
		return $this->db->table('pengajuansurat')->join('pindah', 'pindah.nik=pengajuansurat.nik')->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Pindah'])->get()->getResult();
	}

	public function getPengantar()
	{
		return $this->db->table('pengajuansurat')->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Pengantar'])->get()->getResult();
	}

	public function getKematian()
	{
		return $this->db->table('pengajuansurat')
			->select('pengajuansurat.id, kematian.nik, warga.nama, kematian.tanggal, kematian.penyebab, pengajuansurat.konfirmasi')
			->join('kematian', 'kematian.nik=pengajuansurat.nik')
			->join('warga', 'warga.nik=pengajuansurat.nik')
			->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Kematian'])->get()->getResult();
	}

	public function getKelahiran()
	{
		return $this->db->table('pengajuansurat')
			->select('pengajuansurat.id, warga.nama, warga.nik, pengajuansurat.nomor_surat, pengajuansurat.konfirmasi, warga.no_kk, kelahiran.nama as anak, kelahiran.tanggal, kelahiran.jk, pengajuansurat.masa')
			->join('warga' , 'warga.nik=pengajuansurat.nik')
			->join('kelahiran', 'kelahiran.no_kk=warga.no_kk')
			->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Kelahiran'])->get()->getResult();
	}

	public function getKelahiranv2()
	{
		return $this->db->table('pengajuansurat')
			->select('pengajuansurat.id, pengajuansurat.masa, warga.nama, warga.alamat, warga.no_kk, pengajuansurat.konfirmasi')
			->join('warga' , 'warga.nik=pengajuansurat.nik')
			->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Kelahiran'])->get()->getResult();
	}

	public function cetakKelahiran($kode, $lahir)
	{
		return $this->db->table('pengajuansurat')
			->select('pengajuansurat.id, warga.nama, warga.nik, pengajuansurat.nomor_surat, pengajuansurat.konfirmasi, warga.no_kk, kelahiran.nama as anak, kelahiran.tanggal, kelahiran.jk, pengajuansurat.masa, (select warga.nama from pengajuansurat join kelahiran on kelahiran.id=pengajuansurat.masa join anggota_kk on anggota_kk.no_kk=kelahiran.no_kk join warga on warga.nik=anggota_kk.nik where anggota_kk.hubungan="Istri") as istri')
			->join('warga' , 'warga.nik=pengajuansurat.nik')
			->join('kelahiran', 'kelahiran.no_kk=warga.no_kk')
			->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Kelahiran', 'pengajuansurat.id' => $kode, 'kelahiran.id' => $lahir])->get()->getResultArray();	
	}

	public function getBlmMenikah()
	{
		return $this->db->table('pengajuansurat')
		->select('pengajuansurat.id, pengajuansurat.nik, warga.nama, warga.tempat, warga.tanggal, warga.jk, warga.agama, warga.no_hp, warga.pekerjaan, warga.alamat, pengajuansurat.konfirmasi, pengajuansurat.nomor_surat')
		->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Belum Menikah', 'warga.status' => 'Belum Menikah'])->get()->getResult();
	}

	public function sudahMenikah()
	{
		return $this->db->table('pengajuansurat')
		->select('pengajuansurat.id, pengajuansurat.nik, warga.nama, warga.tempat, warga.tanggal, warga.jk, warga.agama, warga.no_hp, warga.no_kk, warga.pekerjaan, warga.alamat, pengajuansurat.konfirmasi, pengajuansurat.nomor_surat')
		->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Sudah Menikah', 'warga.status' => 'Sudah Menikah'])->get()->getResult();
	}

	public function cetakMenikah($id)
	{
		return $this->db->table('pengajuansurat')
		->select('pengajuansurat.id, pengajuansurat.nomor_surat, pengajuansurat.masa, pengajuansurat.nik, warga.nama, warga.tempat, warga.tanggal, warga.jk, warga.agama, warga.no_hp, warga.pekerjaan, warga.alamat, pengajuansurat.konfirmasi, pengajuansurat.nomor_surat')
		->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Sudah Menikah', 'warga.status' => 'Sudah Menikah', 'pengajuansurat.id' => $id])->get()->getRowArray();
	}

	public function getNikIstri($no_kk)
	{
		return $this->db->table('anggota_kk')->select('nik')->where(['hubungan' => 'Istri', 'no_kk' => $no_kk])->get()->getRow();
	}

	public function cetakIstri($id)
	{
		return $this->db->table('warga as b')
		->select('b.nik, b. nama, b.tempat, b.tanggal, b.jk, b.agama, b.pekerjaan, b.alamat')
		->where(['nik' => $id])->get()->getRowArray();
	}

	public function getKK($id)
	{
		return $this->db->table('pengajuansurat')
		->select('warga.no_kk')
		->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Sudah Menikah', 'warga.status' => 'Sudah Menikah', 'pengajuansurat.id' => $id])->get()->getRow();
	}

	public function cetakBlmMenikah($id)
	{
		return $this->db->table('pengajuansurat')
		->select('pengajuansurat.id, pengajuansurat.nik, warga.nama, warga.tempat, warga.tanggal, warga.jk, warga.agama, warga.no_hp, warga.pekerjaan, warga.alamat, pengajuansurat.konfirmasi, pengajuansurat.nomor_surat')
		->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi >' => 1, 'pengajuansurat.keperluan' => 'Surat Belum Menikah', 'warga.status' => 'Belum Menikah', 'pengajuansurat.id' => $id])->get()->getResultArray();
	}

	public function getCovid()
	{
		return $this->db->table('covid')->join('warga', 'warga.nik=covid.nik')->get()->getResult();
	}

	public function getCovidWhere($nik)
	{
		return $this->db->table('covid')->join('warga', 'warga.nik=covid.nik')->where('covid.nik', $nik)->get()->getResult();
	}

	public function cetakCovid($id)
	{
		return $this->db->table('getCovid')->where(['konfirmasi' => 3, 'id' => $id])->get()->getResult();
	}

	public function cetakKematian()
	{
		return $this->db->table('pengajuansurat')
			->select('pengajuansurat.id, kematian.nik, warga.nama, kematian.tanggal, kematian.penyebab, pengajuansurat.konfirmasi, pengajuansurat.nomor_surat')
			->join('kematian', 'kematian.nik=pengajuansurat.nik')
			->join('warga', 'warga.nik=pengajuansurat.nik')
			->where(['pengajuansurat.konfirmasi' => 3, 'pengajuansurat.keperluan' => 'Surat Kematian'])->get()->getResultArray();
	}

	public function cetakPengantar($id)
	{
		return $this->db->table('pengajuansurat')->join('warga', 'warga.nik=pengajuansurat.nik')->where(['pengajuansurat.konfirmasi' => 3, 'pengajuansurat.keperluan' => 'Surat Pengantar', 'pengajuansurat.id' => $id])->get()->getResultArray();
	}

	public function getDataValidasi()
	{
		return $this->db->table('pengajuansurat')->join('warga', 'warga.nik=pengajuansurat.nik')->get()->getResult();
	}

	public function getDataWarga()
	{
		return $this->db->table('warga')->get()->getResult();
	}

	public function simpanpengajuan($data)
	{
		return $this->db->table('pengajuansurat')->insert($data);
	}

	public function validasiSurat($id, $data)
	{
		return $this->db->table('pengajuansurat')->where('id', $id)->update($data);
	}

	public function hapusSurat($id)
	{
		return $this->db->table('pengajuansurat')->where('id', $id)->delete();
	}
	
	public function getDataSurat()
	{
		return $this->db->table('pengajuansurat')->join('warga', 'warga.nik=pengajuansurat.nik')->where('pengajuansurat.konfirmasi', 1)->get()->getResult();
	}

	public function getDataTable($table)
	{
		return $this->db->table($table)->get()->getResult();
	}

	public function simpan($id, $data)
	{
		return $this->db->table('pengajuansurat')->where('id', $id)->update($data);
	}

}