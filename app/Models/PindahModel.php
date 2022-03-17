<?php namespace App\Models;
use CodeIgniter\Model;

class PindahModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getData()
	{
		return $this->db->table('pindah')->select('pindah.*, warga.nama')->join('warga', 'warga.nik=pindah.nik')->get()->getResult();
	}

	public function getDataSelect($tanggal1, $tanggal2)
	{
		return $this->db->table('pindah')->select('pindah.*, warga.nama')->join('warga', 'warga.nik=pindah.nik')
		->where('pindah.tgl_in >=', $tanggal1)->where('pindah.tgl_in <=', $tanggal2)
		->get()->getResult();
	}

	public function getDataWhere($id)
	{
		return $this->db->table('pindah')->where('id', $id)->get()->getRow();
	}

	public function getDataWarga()
	{
		return $this->db->table('warga')->get()->getResult();
	}

	public function simpan($data)
	{
		return $this->db->table('pindah')->insert($data);
	}

	public function ubah($id, $data)
	{
		return $this->db->table('pindah')->where('nik', $id)->update($data);
	}

	public function ubahwarga($nik, $data)
	{
		return $this->db->table('warga')->where('nik', $nik)->update($data);
	}

	public function hapus($id)
	{
		return $this->db->table('pindah')->where('nik', $id)->delete();
	}
	
}