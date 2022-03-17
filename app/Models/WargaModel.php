<?php namespace App\Models;
use CodeIgniter\Model;

class WargaModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function cekData($nik)
	{
	return $this->db->table('warga')->select('count(nik) as nilai')->where('nik', $nik)->get()->getRow();	
	}

	public function getData() 
	{
		return $this->db->table('warga')->get()->getResult();
	}

	public function getDataSelect($tanggal1, $tanggal2) 
	{
		return $this->db->table('warga')->where('tanggal >=', $tanggal1)->where('tanggal >=', $tanggal2)->get()->getResult();
	}

	public function getDataWhere($nik) 
	{
		return $this->db->table('warga')->where('nik', $nik)->get()->getRow();
	}

	public function simpan($data)
	{
		return $this->db->table('warga')->insert($data);	
	}

	public function ubah($nik, $data)
	{
		return $this->db->table('warga')->where('nik', $nik)->update($data);
	}

	public function hapus($nik)
	{
		return $this->db->table('warga')->where('nik', $nik)->delete();
	}
	
}