<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {


	public function hapus_user($id)
	{
		return $this->db->delete('as_pegawai', array('nip' => $id));
		return $this->db->delete('m_admin', array('username' => $id));
	}
	
	public function tampil_hutang()
	{
		return $this->db->get('as_debts');
	}
	

	function get_po(){
		$this->db->select('*');
		$this->db->from('as_order_transactions');
		$this->db->where("invoiceOrderID not in (select invoiceOrderID from as_buy_transactions)");
		return $this->db->get();

    }
    
    public function tampil_trxtoko($today)
	{
		
		$this->db->select('*');
		$this->db->from('as_sales_transactions_toko');
		$this->db->where('trxDate', $today);
		$this->db->where('identityID',5);
		return $this->db->get();
	}

	public function tampil_trxtokoCicurug($today)
	{
		
		$this->db->select('*');
		$this->db->from('as_sales_transactions_toko');
		$this->db->where('trxDate', $today);
		$this->db->where('identityID',6);
		return $this->db->get();
	}

	public function prod_trxtoko($today)
	{
		
		$this->db->select('SUM(as_sales_detail_transactions.detailQty) as qty');
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_sales_transactions_toko');
		$this->db->where('as_sales_transactions_toko.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_sales_transactions_toko.trxDate', $today);
		$this->db->where('as_sales_transactions_toko.identityID',5);
		return $this->db->get();
	}
    
	public function prod_trxtokoCicurug($today)
	{
		
		$this->db->select('SUM(as_sales_detail_transactions.detailQty) as qty');
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_sales_transactions_toko');
		$this->db->where('as_sales_transactions_toko.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_sales_transactions_toko.trxDate', $today);
		$this->db->where('as_sales_transactions_toko.identityID',6);
		return $this->db->get();
	}

    function get_order($today)
    {
		$this->db->select('*');
		$this->db->from('as_order_transactions');
		$this->db->where('trxDate',$today);
		return $this->db->get();

    }

     function tampil_diterima($identity)
    {
		$this->db->select('*');
		$this->db->from('as_mutasi_order');
		$this->db->where('order_status',2);
		$this->db->where('identityID',$identity);
		return $this->db->get();

    }
	
	
	
	public function tampil_piutang()
	{
		return $this->db->get('as_receivables');
	}
	
	public function tampil_data_pendidikan()
	{
		return $this->db->get('as_pendidikan');
	}

	public function tampil_trx($today)
	{
		
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->where('trxDate', $today);
		return $this->db->get();
	}

	public function tampil_trxBakery($today)
	{
		
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->where('trxDate', $today);
		$this->db->where('identityID',3);
		return $this->db->get();
	}

	public function prod_trxBakery($today)
	{
		
		$this->db->select('SUM(as_sales_detail_transactions.detailQty) as qty');
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_sales_transactions');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_sales_transactions.trxDate', $today);
		$this->db->where('as_sales_transactions.identityID',3);
		return $this->db->get();
	}

	public function tampil_trx_sum_user()
	{
		
		$this->db->select('SUM(trxTotal) AS total');
		$this->db->from('as_sales_transactions');
	
		return $this->db->get();
	}


	public function tampil_jenis()
	{
		return $this->db->get('tb_jenis_surat');
	}

	public function tampil_surat_keluar()
	{
		return $this->db->query("SELECT a.*, b.jenis_id, b.jenis_surat FROM tb_surat_keluar as a, tb_jenis_surat as b WHERE a.jenis_id=b.jenis_id");
	}


	public function reportchart(){
        $this->db->query("SELECT * from as_sales_transactions");
         
        
    }

	public function tampil_menu_dashboard($level)
	{
		
		$this->db->select('m_admin_menu.*');
		$this->db->select('as_pegawai.*');
		$this->db->select('as_menu.*');
		$this->db->from('m_admin_menu');
		$this->db->join('as_menu', 'as_menu.id_menu = m_admin_menu.id_menu', 'left');
		$this->db->join('as_pegawai', 'as_pegawai.level_user = m_admin_menu.level_user', 'left');
		$this->db->where('m_admin_menu.level_user', $level);
		$this->db->where('as_menu.top_menu','1');
		return $this->db->get();
	}
	
	public function tampil_menu_master($level)
	{
		
		
		$this->db->select('m_admin_menu.*');
		$this->db->select('as_pegawai.*');
		$this->db->select('as_menu.*');
		$this->db->from('m_admin_menu');
		$this->db->join('as_menu', 'as_menu.id_menu = m_admin_menu.id_menu', 'left');
		$this->db->join('as_pegawai', 'as_pegawai.level_user = m_admin_menu.level_user', 'left');
		$this->db->where('m_admin_menu.level_user', $level);
		$this->db->where('as_menu.top_menu','2');
		return $this->db->get();
	}
	
	public function tampil_menu_produksi($level)
	{
		
		
		$this->db->select('m_admin_menu.*');
		$this->db->select('as_pegawai.*');
		$this->db->select('as_menu.*');
		$this->db->from('m_admin_menu');
		$this->db->join('as_menu', 'as_menu.id_menu = m_admin_menu.id_menu', 'left');
		$this->db->join('as_pegawai', 'as_pegawai.level_user = m_admin_menu.level_user', 'left');
		$this->db->where('m_admin_menu.level_user', $level);
		$this->db->where('as_menu.top_menu','3');
		return $this->db->get();
	}
	
	public function tampil_menu_penjualan($level)
	{
		
		
		$this->db->select('m_admin_menu.*');
		$this->db->select('as_pegawai.*');
		$this->db->select('as_menu.*');
		$this->db->from('m_admin_menu');
		$this->db->join('as_menu', 'as_menu.id_menu = m_admin_menu.id_menu', 'left');
		$this->db->join('as_pegawai', 'as_pegawai.level_user = m_admin_menu.level_user', 'left');
		$this->db->where('m_admin_menu.level_user', $level);
		$this->db->where('as_menu.top_menu','4');
		return $this->db->get();
	}
	
	public function tampil_trx_user_today_close_debit($today)
	{
		
		$this->db->select('SUM(trxTotal) AS totalDebit');
		$this->db->from('as_sales_transactions');
		$this->db->where('trxbankmethod','debit');
		$this->db->where('trxDate', $today);
		//$this->db->where('userID', $user);
		return $this->db->get();
	}

	public function tampil_trx_user_today_close_bca($today)
	{
		
		$this->db->select('SUM(trxTotal) AS totalBca');
		$this->db->from('as_sales_transactions');
		$this->db->where('trxbankmember','bca');
		$this->db->where('trxDate', $today);
		//$this->db->where('userID', $user);
		return $this->db->get();
	}

	public function tampil_trx_user_today_close_mandiri($today)
	{
		
		$this->db->select('SUM(trxTotal) AS totalMandiri');
		$this->db->from('as_sales_transactions');
		$this->db->where('trxbankmember','mandiri');
		$this->db->where('trxDate', $today);
		//$this->db->where('userID', $user);
		return $this->db->get();
	}


	public function tampil_menu_po($level)
	{
		
		
		$this->db->select('m_admin_menu.*');
		$this->db->select('as_pegawai.*');
		$this->db->select('as_menu.*');
		$this->db->from('m_admin_menu');
		$this->db->join('as_menu', 'as_menu.id_menu = m_admin_menu.id_menu', 'left');
		$this->db->join('as_pegawai', 'as_pegawai.level_user = m_admin_menu.level_user', 'left');
		$this->db->where('m_admin_menu.level_user', $level);
		$this->db->where('as_menu.top_menu','5');
		return $this->db->get();
	}
	
	public function tampil_menu_penerimaan($level)
	{
		
		
		$this->db->select('m_admin_menu.*');
		$this->db->select('as_pegawai.*');
		$this->db->select('as_menu.*');
		$this->db->from('m_admin_menu');
		$this->db->join('as_menu', 'as_menu.id_menu = m_admin_menu.id_menu', 'left');
		$this->db->join('as_pegawai', 'as_pegawai.level_user = m_admin_menu.level_user', 'left');
		$this->db->where('m_admin_menu.level_user', $level);
		$this->db->where('as_menu.top_menu','6');
		return $this->db->get();
	}
	
	public function tampil_menu_returbeli($level)
	{
		
		
		$this->db->select('m_admin_menu.*');
		$this->db->select('as_pegawai.*');
		$this->db->select('as_menu.*');
		$this->db->from('m_admin_menu');
		$this->db->join('as_menu', 'as_menu.id_menu = as_menu.id_menu', 'left');
		$this->db->join('as_pegawai', 'as_pegawai.level_user = m_admin_menu.level_user', 'left');
		$this->db->where('m_admin_menu.level_user', $level);
		$this->db->where('as_menu.top_menu','7');
		return $this->db->get();
	}

}
