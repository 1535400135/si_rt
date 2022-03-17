<?php namespace App\Models;
use CodeIgniter\Model;

class TamuModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getData()
	{
		return $this->db->table('tamu')->get()->getResult();
	}

	public function getDataSelect($tanggal1, $tanggal2)
	{
		return $this->db->table('tamu')->select('tamu.*, warga.nama as plp')->join('warga', 'warga.nik=tamu.pelapor')
		->where('tamu.tgl >=', $tanggal1)->where('tamu.tgl <=', $tanggal2)
		->get()->getResult();
	}

	public function getDataWhere($id)
	{
		return $this->db->table('tamu')->where('id', $id)->get()->getRow();
	}

	public function getDataWarga()
	{
		return $this->db->table('warga')->get()->getResult();
	}

	public function simpan($data)
	{
		return $this->db->table('tamu')->insert($data);
	}

	public function ubah($id, $data)
	{
		return $this->db->table('tamu')->where('id', $id)->update($data);
	}

	public function hapus($id)
	{
		return $this->db->table('tamu')->where('id', $id)->delete();
	}
	
}