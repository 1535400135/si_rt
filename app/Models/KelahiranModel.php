<?php namespace App\Models;
use CodeIgniter\Model;

class KelahiranModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getData()
	{
		return $this->db->table('kelahiran')->get()->getResult();
	}

	public function getDataSelect($tanggal1, $tanggal2)
	{
		return $this->db->table('kelahiran')
		->where('kelahiran.tgl_in >=', $tanggal1)->where('kelahiran.tgl_in <=', $tanggal2)
		->get()->getResult();
	}

	public function getDataWhere($id)
	{
		return $this->db->table('kelahiran')->where('id', $id)->get()->getRow();
	}

	public function getDataKk()
	{
		return $this->db->table('kk')->select('kk.no_kk, warga.nama')->join('warga', 'warga.nik=kk.nik')->get()->getResult();
	}

	public function simpan($data)
	{
		return $this->db->table('kelahiran')->insert($data);
	}

	public function ubah($id, $data)
	{
		return $this->db->table('kelahiran')->where('id', $id)->update($data);
	}

	public function hapus($id)
	{
		return $this->db->table('kelahiran')->where('id', $id)->delete();
	}
	
}