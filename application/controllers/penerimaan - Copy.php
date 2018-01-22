<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerimaan extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('model_admin');
		$this->load->model('model_penerimaan');
			$this->load->model('model_perusahaan');
		$this->load->model('model_user');
		$this->load->model('model_master');

		$this->d_now = date('Y-m-d');

	}

	public function index(){
		$a['list_po'] = $this->model_penerimaan->get_po();
		$a['page'] = "master/penerimaan/add";
		$a['title'] = "Penerimaan Barang";
		$this->load->view('admin/index',$a);
	}

	public function daftar_penerimaan(){
		$a['list_buy'] = $this->model_master->tampilkan_transaksi_Buy();
		$a['page'] = "master/penerimaan/view_list";
		$a['title'] = "Daftar Penerimaan Barang";
		$this->load->view('admin/index',$a);
	}


	public function detail_po(){
		$invoiceID = $this->input->post('id');
		$supID = $this->input->post('supid');

		$a['detail'] = $this->model_penerimaan->tampilkan_detail_po($invoiceID );
		$po = $this->model_master->tampilkan_transaksi_Order($invoiceID );
		$a['dt_suppliers'] = $this->model_master->tampil_suplier_one($po->supplierID);
		$this->load->view('admin/master/penerimaan/view_t_po',$a);
	}

	public function pop_detail(){
		$invoiceID = $this->input->post('id');
		$a['invoiceID'] = $invoiceID;
		$a['detail'] = $this->model_penerimaan->tampilkan_detail_penerimaan($invoiceID);
		$po = $this->model_master->tampilkan_transaksi_Buy_one($invoiceID );
		$a['dt_suppliers'] = $this->model_master->tampil_suplier_one($po->supplierID);
		$this->load->view('admin/master/penerimaan/view_pop_detail',$a);
	}

	public function savepenerimaan(){
		
		$invoiceBuyID = $this->GenInvoBuyNumber();
		echo $invoiceBuyID; 
		$invoiceID = $this->input->post('no_po');
		$detail_po = $this->model_penerimaan->tampilkan_detail_po($invoiceID);
		$i=0;
		$jum_total = 0;
		foreach ($detail_po as $d_po) {	
			$qty = $this->input->post('qty')[$i];
			$price = $d_po->detailBuyPrice;
			$detailBuySubtotal = $qty * $price;
            $productBarcode = $d_po->productBarcode;
            $prod = $this->model_master->tampil_produk_id($d_po->productBarcode);
			foreach($prod->result() as $row)
			{
				$prostok = $row->productStock;
			}
			$prostok=($prostok)+($qty);
			$object_up_stok = array(
					'productStock' => $prostok
					);
				$this->db->where('productBarcode', $productBarcode);
				$this->db->update('as_products', $object_up_stok); 

			$object = array(
				'invoiceBuyID' => $invoiceBuyID,
				'productBarcode' => $productBarcode,
				'detailBuyPrice' =>$price,
				'detailBuyQty' => $qty,
				'detailBuySubtotal' => $detailBuySubtotal,
				'createdDate' => $this->d_now
				);
			$this->db->insert('as_buy_detail_transactions', $object); 
			$jum_total += $detailBuySubtotal;

			$i++;
		}

		$object_buy = array(
			'invoiceBuyID' => $invoiceBuyID,
			'supplierID' => $this->input->post('supplierID'),
			'invoiceSupplier' => '',
			'invoiceOrderID' => $invoiceID,
			'trxFullName' => $this->input->post('supplierName'),
			'trxAddress' => $this->input->post('supplierAddress'),
			'trxPhone' => $this->input->post('supplierPhone'),
			'trxDate' => $this->d_now,
			'trxDiscount' => 0,
			'trxSubtotal' => $jum_total,
			'trxTotal' => $jum_total,
			);
		$save = $this->db->insert('as_buy_transactions', $object_buy); 

		if($save)
			redirect('penerimaan/daftar_penerimaan');

	}




	public function GenInvoBuyNumber(){
		$trxid= mysql_fetch_array(mysql_query('SELECT * from as_buy_transactions order by trxID desc limit 1;'));
		$trxdate = $trxid['trxDate'];
		$invoiceID = $trxid['invoiceBuyID'];
		$d=date("my", strtotime($trxdate));
		$tglfktr=date('my');
		$invoiceIDfil=substr($invoiceID,6,8);
		if($invoiceIDfil=="")
		{
			$trxDate = date('my');
			$trx=1;
			$invoice=sprintf("%04d", $trx);
			$invno = $trxDate.$invoice;
		}
		else
		{
			$trxDate = date('my');
			$trxd=substr($invoiceIDfil,0,4);
			if($trxDate==$trxd)
			{
				$invno=$invoiceIDfil+1;
				$invno=sprintf("%08d", $invno);
			}
			else
			{
				$trxDate = date('my');
				$trx=1;
				$invoice=sprintf("%04d", $trx);
				$invno = $trxDate.$invoice;
			}


		}

		$kode = "FKB".date('m')."-".$invno;

		return $kode;
	}

}