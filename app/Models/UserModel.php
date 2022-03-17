<?php namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
	public function __construct(){
		parent::__construct();
	}
	
	public function getDataWarga()
	{
		return $this->db->table('warga')->get()->getResult();
	}

	public function getDataWhere($nik) 
	{
		return $this->db->table('warga')->where('nik', $nik)->get()->getRow();
	}

	public function getData()
	{
		return $this->db->table('akun')->select('akun.id, akun.nik, warga.nama, warga.no_hp, akun.tanggal, akun.level')
		->join('warga', 'warga.nik=akun.nik')->get()->getResult();
	}

	public function getAjuan()
	{
		return $this->db->table('ajuan as a')->select('a.id, a.nik, a.nama, a.tempat, a.tanggal, a.jk, a.alamat, a.rt, a.rw, a.agama, a.status, a.pekerjaan, a.kewarganegaraan, a.no_hp, a.tgl_in, a.ket')
		->select('b.nik as q, b.nama as w, b.tempat as e, b.tanggal as r, b.jk as t, b.alamat as y, b.rt as u, b.rw as i, b.agama as o, b.status as p, b.pekerjaan as s, b.kewarganegaraan as d, b.no_hp as f')
		->join('warga as b', 'b.nik=a.nik')->get()->getResult();
	}

	public function getUbahPassword()
	{
		return $this->db->table('akun')->select('akun.*, warga.nama, warga.no_hp')->join('warga', 'warga.nik=akun.nik')->where('akun.ket', 2)->get()->getResult();
	}

	public function updajuan($id, $data)
	{
		return $this->db->table('ajuan')->where('id', $id)->update($data);
	}

	public function updwarga($nik, $data)
	{
		return $this->db->table('warga')->where('nik', $nik)->update($data);
	}

	public function simpan($data)
	{
		return $this->db->table('akun')->insert($data);
	}

	public function simpanajukan($data)
	{
		return $this->db->table('ajuan')->insert($data);
	}

	public function cekData($nik)
	{
		return $this->db->table('ajuan')->where(['nik' => $nik])->get()->getRow();
	}

	public function ubah($id, $data)
	{
		return $this->db->table('akun')->where('nik', $id)->update($data);
	}

	public function ubahwarga($id, $data)
	{
		return $this->db->table('warga')->where('nik', $id)->update($data);
	}

	public function hapuspass($id, $data)
	{
		return $this->db->table('akun')->where('id', $id)->update($data);
	}

	public function hapusajuan($id)
	{
		return $this->db->table('ajuan')->where('id', $id)->delete();
	}

	public function hapus($id)
	{
		return $this->db->table('akun')->where('id', $id)->delete();
	}

}