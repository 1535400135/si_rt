<?php namespace App\Models;
use CodeIgniter\Model;

class KKModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getData() 
	{
		return $this->db->table('kk')->get()->getResult();
	}

	public function getDataWhere($no_kk) 
	{
		return $this->db->table('kk')->where('no_kk', $no_kk)->get()->getRow();
	}

	public function getDataAll($no_kk) 
	{
		return $this->db->table('kk')->select('kk.no_kk, anggota_kk.nik, warga.nama,  warga.jk, anggota_kk.hubungan')->join('anggota_kk', 'anggota_kk.no_kk=kk.no_kk')->join('warga', 'warga.nik=anggota_kk.nik')->where('kk.no_kk', $no_kk)->get()->getResult();
	}

	public function getDataNik() 
	{
		return $this->db->table('warga')->select('nik, nama, no_kk')->get()->getResult();
	}

	public function getDataSelect($tanggal1, $tanggal2)
	{
		return $this->db->table('kk')->select('kk.*, warga.nama')->join('warga', 'warga.nik=kk.nik')->where('kk.tanggal >=', $tanggal1)->where('kk.tanggal <=', $tanggal2)->get()->getResult();
	}

	public function simpan($data)
	{
		return $this->db->table('kk')->insert($data);	
	}

	public function simpananggota($data)
	{
		return $this->db->table('anggota_kk')->insert($data);	
	}

	public function ubah($no_kk, $data)
	{
		return $this->db->table('kk')->where('no_kk', $no_kk)->update($data);
	}

	public function updwarga($nik, $warga)
	{
		return $this->db->table('warga')->where(['nik' => $nik])->update($warga);
	}

	public function hapus($no_kk)
	{
		return $this->db->table('kk')->where('no_kk', $no_kk)->delete();
	}

	public function hapuswarga($no_kk, $data)
	{
		return $this->db->table('warga')->where('no_kk', $no_kk)->update($data);
	}

	public function hapusanggota($pk, $nik)
	{
		return $this->db->table('anggota_kk')->where($pk, $nik)->delete();
	}
	
}