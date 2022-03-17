<?php namespace App\Models;
use CodeIgniter\Model;

class CovidModel extends Model
{
	public function __construct(){
		parent::__construct();
	}
	
	public function getWarga()
	{
		return $this->db->table('warga')->get()->getResult();
	}

	public function getData()
	{
		return $this->db->table('covid')->select('covid.id, covid.nik, warga.nama, warga.jk, covid.status, warga.alamat, covid.tglkena, covid.tglsembuh, covid.rsrujukan')
		->join('warga', 'warga.nik=covid.nik')->get()->getResult();
	}

	public function getDataCovid($tanggal1, $tanggal2)
	{
		return $this->db->table('covid')->select('covid.id, covid.nik, warga.nama, warga.jk, covid.status, warga.alamat, covid.tglkena, covid.tglsembuh, covid.rsrujukan')
		->join('warga', 'warga.nik=covid.nik')
		->where('covid.tgl_in >=', $tanggal1)->where('covid.tgl_in <=', $tanggal2)
		->get()->getResult();
	}

	public function getDataVaksin()
	{
		return $this->db->table('vaksinasi')->select('vaksinasi.id, vaksinasi.nik, warga.nama, warga.jk, vaksinasi.status, warga.alamat, vaksinasi.tglvaksin1, vaksinasi.tglvaksin2, vaksinasi.vaskes')
		->join('warga', 'warga.nik=vaksinasi.nik')->get()->getResult();
	}

	public function getDataVaksinSelect($tanggal1, $tanggal2)
	{
		return $this->db->table('vaksinasi')->select('vaksinasi.id, vaksinasi.nik, warga.nama, warga.jk, vaksinasi.status, warga.alamat, vaksinasi.tglvaksin1, vaksinasi.tglvaksin2, vaksinasi.vaskes')
		->join('warga', 'warga.nik=vaksinasi.nik')
		->where('vaksinasi.tgl_in >=', $tanggal1)->where('vaksinasi.tgl_in <=', $tanggal2)
		->get()->getResult();
	}

	public function simpan($data)
	{
		return $this->db->table('covid')->insert($data);
	}

	public function simpanvaksinasi($data)
	{
		return $this->db->table('vaksinasi')->insert($data);
	}

	public function ubah($id, $data)
	{
		return $this->db->table('covid')->where('id', $id)->update($data);
	}

	public function hapus($id)
	{
		return $this->db->table('covid')->where('id', $id)->delete();
	}

	public function ubahvaksin($id, $data)
	{
		return $this->db->table('vaksinasi')->where('id', $id)->update($data);
	}

}