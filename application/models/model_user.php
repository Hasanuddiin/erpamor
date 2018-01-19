<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

	
	public function tampil_data()
	{
		
		
		$this->db->select('*');
		$this->db->select('m_admin.username as nipp');
		$this->db->from('as_pegawai');
		$this->db->join('m_admin', 'as_pegawai.nip = m_admin.username', 'left'); 
		$this->db->order_by('pegawai_id', 'DESC');
		return $this->db->get();
	}

	public function tampil_data_pegawai($nik)
	{
		
		
		$this->db->select('*');
		$this->db->from('as_pegawai');
		$this->db->join('as_identity', 'as_pegawai.identityID = as_identity.identityID', 'left'); 
		$this->db->join('as_golongan', 'as_pegawai.golonganID = as_golongan.golonganID', 'left'); 
		$this->db->where('as_pegawai.nip', $nik);
		return $this->db->get();
	}
}
