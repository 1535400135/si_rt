<?php namespace App\Models;
use CodeIgniter\Model;

class KematianModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getData()
	{
		return $this->db->table('kematian')->select('kematian.id, kematian.nik as nik, warga.nik as nik2, warga.nama, kematian.tanggal, kematian.penyebab')->join('warga', 'warga.nik=kematian.nik')->get()->getResult();
	}

	public function getDataSelect($tanggal1, $tanggal2)
	{
		return $this->db->table('kematian')->select('kematian.*, warga.nama')->join('warga', 'warga.nik=kematian.nik')
		->where('kematian.tgl_in >=', $tanggal1)->where('kematian.tgl_in <=', $tanggal2)
		->get()->getResult();
	}

	public function getDataWhere($id)
	{
		return $this->db->table('kematian')->where('id', $id)->get()->getRow();
	}

	public function getDataWarga()
	{
		return $this->db->table('warga')->get()->getResult();
	}

	public function simpan($data)
	{
		return $this->db->table('kematian')->insert($data);
	}

	public function ubah($id, $data)
	{
		return $this->db->table('kematian')->where('id', $id)->update($data);
	}

	public function ubahwarga($nik, $data)
	{
		return $this->db->table('warga')->where('nik', $nik)->update($data);
	}

	public function hapus($id)
	{
		return $this->db->table('kematian')->where('nik', $id)->delete();
	}
	
}