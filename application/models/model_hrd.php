<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_hrd extends CI_Model {

	
	public function tampil_data()
	{
		$bulan=date('Y-m-d');
		$this->db->select('absensi.*');
		 $this->db->select('count(absensi.nik)as jumlahhari'); 
		$this->db->select('as_pegawai.*');
		$this->db->from('absensi');
		$this->db->join('as_pegawai', 'absensi.nik = as_pegawai.nip', 'left');
		$this->db->group_by('absensi.nik');
		return $this->db->get();
	}
	
	public function tampil_data_detail($nik)
	{
		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->where('nik', $nik);
		$this->db->order_by('tanggal', 'ASC');
		return $this->db->get();
	}
	
	
	
	public function tampil_data_gaji($golongan,$nik)
	{
		$this->db->select('*');
		$this->db->select('as_komponen.*');
		$this->db->from('as_komponen_golongan');
		$this->db->join('as_pegawai', 'as_komponen_golongan.golonganID = as_pegawai.golonganID', 'left');
		$this->db->join('as_komponen', 'as_komponen.komponenID = as_komponen_golongan.komponenID', 'left');
		$this->db->where('as_komponen_golongan.golonganID', $golongan);
		$this->db->where('as_pegawai.nip', $nik);
		return $this->db->get();
	}
	
	public function tampil_data_komponen()
	{
		$this->db->select('*');
		$this->db->from('as_komponen');
		return $this->db->get();
	}
	
	public function tampil_data_potongan()
	{
		$this->db->select('*');
		$this->db->from('as_potongan');
		return $this->db->get();
	}
	
	public function tampil_data_potongan_karyawan($nik)
	{
		$this->db->select('*');
		$this->db->from('as_potongan_karyawan');
		$this->db->join('as_potongan', 'as_potongan_karyawan.potonganID = as_potongan.potonganID', 'left');
		$this->db->where('nik', $nik);
		return $this->db->get();
	}
	
	public function hapus_potongan_karyawan($id)
	{
		return $this->db->delete('as_potongan_karyawan', array('detailID' => $id));
	}
	
	public function tampil_data_bonus()
	{
		$this->db->select('*');
		$this->db->from('as_bonus');
		return $this->db->get();
	}
	public function tampil_data_bonus_karyawan($nik)
	{
		$this->db->select('*');
		$this->db->from('as_bonus_karyawan');
		$this->db->join('as_bonus', 'as_bonus_karyawan.bonusID = as_bonus.bonusID', 'left');
		$this->db->where('nik', $nik);
		return $this->db->get();
	}
	
	public function hapus_bonus_karyawan($id)
	{
		return $this->db->delete('as_bonus_karyawan', array('detailID' => $id));
	}
	
	public function hapus_komponen($id)
	{
		return $this->db->delete('as_komponen', array('komponenID' => $id));
	}
	
	public function tampil_data_golongan()
	{
		$this->db->select('*');
		$this->db->from('as_golongan');
		return $this->db->get();
	}
	
	public function hapus_golongan($id)
	{
		return $this->db->delete('as_golongan', array('golonganID' => $id));
	}
	
	public function tampil_data_komponen_golongan($id)
	{
		$this->db->select('*');
		$this->db->select('as_komponen.nama_komponen');
		$this->db->from('as_komponen_golongan');
		$this->db->join('as_golongan', 'as_komponen_golongan.golonganID = as_golongan.golonganID', 'left');
		$this->db->join('as_komponen', 'as_komponen_golongan.komponenID = as_komponen.komponenID', 'left');
		$this->db->where('as_komponen_golongan.golonganID', $id);
		return $this->db->get();
	}
	
	public function hapus_golongan_komponen($id)
	{
		return $this->db->delete('as_golongan', array('golonganID' => $id));
	}
	
}
