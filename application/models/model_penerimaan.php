<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_penerimaan extends CI_Model {


	function get_po(){
		$this->db->select('*');
		$this->db->where("invoiceOrderID not in (select invoiceOrderID from as_buy_transactions)");
		$this->db->from('as_order_transactions');
		$query = $this->db->get();
        if ($query->num_rows() > 0) { //jika ada maka jalankan
        	return $query->result();
        }

    }
    

    function tampilkan_detail_po($invoiceID)
    {
		
			$this->db->select('*');
			$this->db->from('as_order_detail_transactions');
			$this->db->join('as_bahan', 'as_bahan.bahanBarcode = as_order_detail_transactions.productBarcode', 'left');
			$this->db->join('as_satuan', 'as_bahan.bahanSat = as_satuan.satuanID', 'left'); 
			$this->db->where('invoiceOrderID', $invoiceID);
			$this->db->order_by('detailID', 'DESC');
			$query = $this->db->get();
			return $query->result();
    }
	
	 function tampilkan_detail_mutasi($invoiceID)
    {
		
			$this->db->select('*');
			$this->db->from('as_mutasi_order_detail');
			$this->db->join('as_products', 'as_products.productBarcode = as_mutasi_order_detail.productBarcode', 'left');
			$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
			$this->db->where('invoiceOrderID', $invoiceID);
			$query = $this->db->get();
			return $query->result();
    }

    function tampilkan_detail_penerimaan($invoiceID)
    {
		
			$this->db->select('*');
			$this->db->from('as_buy_detail_transactions');
			$this->db->join('as_bahan', 'as_bahan.bahanBarcode = as_buy_detail_transactions.productBarcode', 'left');
			$this->db->join('as_satuan', 'as_bahan.bahanSat = as_satuan.satuanID', 'left'); 
			$this->db->where('invoiceBuyID', $invoiceID);
			$this->db->order_by('detailID', 'DESC');
			$query = $this->db->get();
			return $query->result();
    }

}