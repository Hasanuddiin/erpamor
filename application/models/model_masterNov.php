<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_master extends CI_Model {

	public function hapus_kategori($id)
	{
		return $this->db->delete('as_categories_produk', array('categoryID' => $id));
	}
	
	public function hapus_satuan($id)
	{
		return $this->db->delete('as_satuan', array('satuanID' => $id));
	}
	
	public function hapus_brand($id)
	{
		return $this->db->delete('as_brands', array('brandID' => $id));
	}
	
	public function hapus_suplier($id)
	{
		return $this->db->delete('as_suppliers', array('supplierID' => $id));
	}

	public function hapus_mitra($id)
	{
		return $this->db->delete('as_mitra', array('mitralD' => $id));
	}

	public function hapus_formula($id)
	{
		return $this->db->delete('as_produksi_formula_detail', array('detailID' => $id));
	}

	public function hapus_paketan($id)
	{
		return $this->db->delete('as_paketan', array('paketanID' => $id));
	}
	
	public function hapus_produk($id)
	{
		return $this->db->delete('as_products', array('productID' => $id));
	}
	
	public function hapus_bahan($id)
	{
		return $this->db->delete('as_bahan', array('bahanID' => $id));
	}

	public function hapus_member($id)
	{
		return $this->db->delete('as_members', array('memberID' => $id));
	}
	
	public function hapus_proyek($id)
	{
		return $this->db->delete('as_proyek', array('proyekID' => $id));
	}
	
	public function hapus_zona($id)
	{
		return $this->db->delete('as_zona', array('zonaID' => $id));
	}
	
	public function hapus_trxpj($id)
	{
		return $this->db->delete('as_sales_detail_transactions', array('detailID' => $id));
	}


public function hapus_trxbahan($id)
	{
		return $this->db->delete('as_sales_bahan_detail_transactions', array('detailID' => $id));
	}	
	public function hapus_trxpm($id)
	{
		return $this->db->delete('as_order_detail_transactions', array('detailID' => $id));
	}
	public function batal_trxpj($trxid)
	{
		return $this->db->delete('as_sales_detail_transactions', array('invoiceID' => $trxid));
	}
	
	public function hapus_po($id)
	{
		$this->db->delete('as_order_transactions', array('invoiceOrderID' => $id));
		$this->db->delete('as_order_detail_transactions', array('invoiceOrderID' => $id));

	}

	public function tampil_kategori()
	{
		$this->db->order_by('categoryID', 'DESC');
		return $this->db->get('as_categories');
	}
	
	public function tampil_kategori_prod()
	{
		$this->db->order_by('categoryID', 'DESC');
		return $this->db->get('as_categories_produk');
	}
	
	public function tampil_kategori_bahan()
	{
		$this->db->order_by('categoryID', 'DESC');
		return $this->db->get('as_categories_bahan');
	}
	
	public function tampil_satuan()
	{
		$this->db->order_by('satuanID', 'DESC');
		return $this->db->get('as_satuan');
	}


	public function tampil_brand()
	{
		$this->db->order_by('brandID', 'DESC');
		return $this->db->get('as_brands');
	}
	
	public function tampil_zona()
	{
		$this->db->order_by('zonaID', 'DESC');
		return $this->db->get('as_zona');
	}
	
	public function tampil_suplier()
	{
		$this->db->order_by('supplierID', 'DESC');
		return $this->db->get('as_suppliers');
	}

	public function tampil_mitra()
	{
		$this->db->order_by('mitraID', 'DESC');
		return $this->db->get('as_mitra');
	}

	public function tampil_paketan()
	{
		$this->db->order_by('paketanID', 'DESC');
		return $this->db->get('as_paketan');
	}


	public function tampil_suplier_one($id)
	{
		$this->db->where('supplierID', $id);
		$query = $this->db->get('as_suppliers');
		return $query->row();
	}
	
	public function tampil_produk($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_products');
		$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->order_by('productID', 'DESC');
		$this->db->where('identityID', $identity);
		return $this->db->get();
		
	}
	
	public function tampil_produk_mitra($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_products');
		$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->order_by('productID', 'DESC');
		$this->db->where('identityID', $identity);
		$this->db->where('productType', '2');
		return $this->db->get();
		
	}
	
	
	public function tampil_produk_amor($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_products');
		$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->order_by('productID', 'DESC');
		$this->db->where('identityID', $identity);
		$this->db->where('productType', '1');
		return $this->db->get();
		
	}
	
	
	public function tampil_bahan($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_bahan');
		$this->db->join('as_satuan', 'as_bahan.bahanSat = as_satuan.satuanID', 'left'); 
		$this->db->join('as_categories_bahan', 'as_bahan.categoryID = as_categories_bahan.categoryID', 'left'); 
		$this->db->order_by('bahanID', 'DESC');
		$this->db->where('identityID', $identity);
		return $this->db->get();
		
	}
	
	public function tampil_member()
	{
		return $this->db->get('as_members');
	}
	
	public function tampil_proyek()
	{
		return $this->db->get('as_proyek');
	}
	
	public function tampil_trxpj_all()
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->join('as_identity', 'as_sales_transactions.identityID = as_identity.identityID', 'left'); 
		$this->db->order_by('trxID', 'DESC');
		return $this->db->get();
	}
	
	public function tampil_trxpj_post_by_date()
	{
		$this->db->select('*');
		$this->db->select('SUM(as_sales_transactions.trxTotal) as totaltrx');
		$this->db->from('as_sales_transactions');
		$this->db->join('as_identity', 'as_sales_transactions.identityID = as_identity.identityID', 'left'); 
		$this->db->group_by('as_sales_transactions.trxDate');
		$this->db->order_by('trxID', 'DESC');
		return $this->db->get();
	}
	
	public function tampil_trxpj($identityID)
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->join('as_identity', 'as_sales_transactions.identityID = as_identity.identityID', 'left');
		$this->db->where('as_sales_transactions.identityID', $identityID);
		$this->db->order_by('trxID', 'DESC');
		return $this->db->get();
	}
	
	public function tampil_trxpjtoday($today, $user)
	{
		$this->db->select('*');
	
		$this->db->from('as_sales_transactions');
		$this->db->from('as_pegawai');
		$this->db->where('trxDate', $today);
		$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}

	public function tampil_kategoryhariini($today)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlah');
	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->join('as_products','as_products.productBarcode = as_sales_detail_transactions.productBarcode', 'left');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		//$this->db->where('as_categories_produk.categoryName',$bolu);
		$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}

	public function tampil_kategorytoday($today,$bolu)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlah');

	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->where('as_sales_detail_transactions.productBarcode = as_products.productBarcode');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$bolu);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		$this->db->where('as_sales_transactions.identityID', 3);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}

	public function tampil_kategoryDjavamos($today,$Djavamous)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlahDjavamous');
	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->where('as_sales_detail_transactions.productBarcode = as_products.productBarcode');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Djavamous);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		$this->db->where('as_sales_transactions.identityID', 3);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}

	public function tampil_kategoryCookies($today,$Cookies)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlahCookies');
	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->where('as_sales_detail_transactions.productBarcode = as_products.productBarcode');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Cookies);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		$this->db->where('as_sales_transactions.identityID', 3);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}




	public function tampil_kategoryModernCake($today,$ModernCake)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlahModernCake');
	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->where('as_sales_detail_transactions.productBarcode = as_products.productBarcode');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$ModernCake);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		$this->db->where('as_sales_transactions.identityID', 3);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}
	public function tampil_kategoryMochi($today,$Mochi)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlahMochi');
	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->where('as_sales_detail_transactions.productBarcode = as_products.productBarcode');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Mochi);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}
	
	public function tampil_kategorySnack($today,$Snack)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlahSnack');
	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->where('as_sales_detail_transactions.productBarcode = as_products.productBarcode');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Snack);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}
	public function tampil_kategoryCafe($today,$Cafe)
	{
	
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlahCafe');
	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->where('as_sales_detail_transactions.productBarcode = as_products.productBarcode');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Cafe);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}

	public function tampil_rekaptoday($today,$user)
	{
	
		$this->db->select('as_products.productName as produk');
		$this->db->select('Sum(as_sales_transactions.trxSubtotal) AS Rp');
		$this->db->select('Sum(as_sales_detail_transactions.detailQty) AS jumlah');
		$this->db->select('as_sales_detail_transactions.productBarcode as barcode');
		$this->db->select('as_categories_produk.categoryName as category');
	
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		//$this->db->from('as_pegawai');

		$this->db->where('as_products.productBarcode = as_sales_detail_transactions.productBarcode');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_products.categoryID = as_categories_produk.categoryID');
		$this->db->where('as_sales_transactions.trxDate', $today);
		$this->db->group_by('as_products.productBarcode');
		$this->db->group_by('as_categories_produk.categoryName');
		//$this->db->group_by('as_categories_produk.categoryName');	
		
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}



	public function tampil_kategoryCafe1($today,$Cafe)
	{
	
		$this->db->select('Sum(as_sales_detail_transactions.detailSubtotal) as jumlahCafe');
	
		$this->db->from('as_sales_detail_transactions');
		$this->db->from('as_categories_produk');
		$this->db->from('as_products');
		$this->db->from('as_sales_transactions');
		//$this->db->from('as_pegawai');

		$this->db->where('as_sales_detail_transactions.productBarcode = as_products.productBarcode');
		$this->db->where('as_categories_produk.categoryID = as_products.categoryID');
		$this->db->where('as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Cafe);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}	

	public function tampil_kategorytoday2($today,$bolu,$identity)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailQty) as jumlah');
	
		$this->db->from('as_sales_detail_transactions');
	

		$this->db->join('as_products','as_products.productBarcode = as_sales_detail_transactions.productBarcode');
		$this->db->join('as_categories_produk','as_categories_produk.categoryID = as_products.categoryID');
		$this->db->join('as_sales_transactions','as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$bolu);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		$this->db->where('as_sales_transactions.identityID',3);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}

	public function tampil_kategoryDjavamos2($today,$Djavamous)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailQty) as jumlah');
	
		$this->db->from('as_sales_detail_transactions');
	

		$this->db->join('as_products','as_products.productBarcode = as_sales_detail_transactions.productBarcode');
		$this->db->join('as_categories_produk','as_categories_produk.categoryID = as_products.categoryID');
		$this->db->join('as_sales_transactions','as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Djavamous);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}

	public function tampil_kategoryCookies2($today,$Cookies)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailQty) as jumlah');
	
		$this->db->from('as_sales_detail_transactions');
	

		$this->db->join('as_products','as_products.productBarcode = as_sales_detail_transactions.productBarcode');
		$this->db->join('as_categories_produk','as_categories_produk.categoryID = as_products.categoryID');
		$this->db->join('as_sales_transactions','as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Cookies);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}
	public function tampil_kategoryModernCake2($today,$ModernCake)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailQty) as jumlah');
	
		$this->db->from('as_sales_detail_transactions');
	

		$this->db->join('as_products','as_products.productBarcode = as_sales_detail_transactions.productBarcode');
		$this->db->join('as_categories_produk','as_categories_produk.categoryID = as_products.categoryID');
		$this->db->join('as_sales_transactions','as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$ModernCake);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}
	public function tampil_kategoryMochi2($today,$Mochi)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailQty) as jumlah');
	
		$this->db->from('as_sales_detail_transactions');
	

		$this->db->join('as_products','as_products.productBarcode = as_sales_detail_transactions.productBarcode');
		$this->db->join('as_categories_produk','as_categories_produk.categoryID = as_products.categoryID');
		$this->db->join('as_sales_transactions','as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Mochi);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}
	
	public function tampil_kategorySnack2($today,$Snack)
	{
		
		$this->db->select('Sum(as_sales_detail_transactions.detailQty) as jumlah');
	
		$this->db->from('as_sales_detail_transactions');
	

		$this->db->join('as_products','as_products.productBarcode = as_sales_detail_transactions.productBarcode');
		$this->db->join('as_categories_produk','as_categories_produk.categoryID = as_products.categoryID');
		$this->db->join('as_sales_transactions','as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Snack);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}
	public function tampil_kategoryCafe2($today,$Cafe)
	{
	
		$this->db->select('Sum(as_sales_detail_transactions.detailQty) as jumlah');
	
		$this->db->from('as_sales_detail_transactions');
	

		$this->db->join('as_products','as_products.productBarcode = as_sales_detail_transactions.productBarcode');
		$this->db->join('as_categories_produk','as_categories_produk.categoryID = as_products.categoryID');
		$this->db->join('as_sales_transactions','as_sales_transactions.invoiceID = as_sales_detail_transactions.invoiceID');
		$this->db->where('as_categories_produk.categoryName',$Cafe);
		//$this->db->group_by('as_categories_produk.categoryName');	
		$this->db->where('as_sales_transactions.trxDate', $today);
		//$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}
	
	public function tampilchart()
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		return $this->db->get();

	}

	public function tampil_trxsumtoday($today,$user)
	{
		$this->db->select('SUM(trxTotal)As Totaltoday');
		$this->db->from('as_sales_transactions');
		$this->db->where('trxDate', $today);
		$this->db->where('userID', $user);
		//$this->db->where('userID', $user);
		return $this->db->get();
	}

	public function tampil_trxsumtodaykasir($today,$user)
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
	    $this->db->from('as_pegawai');
		$this->db->where('trxDate', $today);
		$this->db->where('as_sales_transactions.userID', $user);
		$this->db->where('as_pegawai.nip = as_sales_transactions.userID');

		return $this->db->get();
	}

	public function get_kasir(){
		$this->db->select('*');
		$this->db->from('as_pegawai');
		$this->db->where('identityID',3);
		$query = $this->db->get();
        if ($query->num_rows() > 0) { //jika ada maka jalankan
        	return $query->result();
        }

    }
    

	public function tampil_trxtoday($today)
	{
		$this->db->select('SUM(trxTotal)As Totaltoday');
		$this->db->from('as_sales_transactions');
		$this->db->where('trxDate', $today);
		return $this->db->get();
	}
	public function tampil_trxtodayBakery($today)
	{
		$this->db->select('SUM(trxTotal)As Totaltoday');
		$this->db->from('as_sales_transactions');
		$this->db->where('trxDate', $today);
		$this->db->where('identityID',3);
		return $this->db->get();
	}

	public function tampil_trxtotalBakery()
	{
		$this->db->select('SUM(trxTotal)As total');
		$this->db->from('as_sales_transactions');
		$this->db->where('identityID',3);
		return $this->db->get();
	}

	public function tampil_trx_sum_user($user)
	{
		
		$this->db->select('SUM(trxTotal) AS total');
		$this->db->from('as_sales_transactions');
		$this->db->where('userID', $user);
		
		return $this->db->get();
	}
	
	public function tampil_status_prod()
	{
		
		$this->db->select('*');
		$this->db->from('as_produksi_plan');
		$this->db->where('planStat', 0);
		
		return $this->db->get();
	}

	public function daftarpermintaan($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_mutasi_order');
		$this->db->where('order_status', 0);
		$this->db->where('identityID',$identity);
		
		return $this->db->get();
	}

	public function tampil_trxpjtodayproyek()
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->where('isProyek', '1');
		return $this->db->get();
	}
	
	public function tampil_khutang()
	{
		return $this->db->get('as_debts');
	}
	
	public function tampil_kpiutang()
	{
		$this->db->select('*');
		$this->db->select('SUM(receivablePay) as totalbayartermin');
		$this->db->select('as_receivables.receivableID as idpiutang');
    	$this->db->from('as_receivables');
		$this->db->join('as_receivables_payment', 'as_receivables.receivableID = as_receivables_payment.receivableID', 'left');
    	$this->db->join('as_sales_transactions', 'as_receivables.invoiceID = as_sales_transactions.invoiceID', 'left');
		$this->db->group_by('as_receivables.receivableID');
		return $this->db->get();
	}
	
		public function tampil_kpiutang_detail($receivableID)
	{
		$this->db->select('*');
    	$this->db->from('as_receivables_payment');
		$this->db->join('as_receivables', 'as_receivables.receivableID = as_receivables_payment.receivableID', 'left');
		$this->db->where('as_receivables_payment.receivableID', $receivableID);
		return $this->db->get();
	}
	
	public function tampil_member_id($idmember)
	{
		$this->db->select('*');
		$this->db->from('as_members');
		$this->db->where('memberCode', $idmember);
		return $this->db->get();
	}
	
	public function tampil_proyek_id($idproyek)
	{
		$this->db->select('*');
		$this->db->from('as_proyek');
		$this->db->where('proyekCode', $idproyek);
		return $this->db->get();
	}
	
	public function tampil_akun()
	{	
		$this->db->select('*');
		$this->db->from('as_funds');
		$this->db->join('as_accounts', 'as_funds.accountID = as_accounts.accountID', 'left'); 
		return $this->db->get();
		
	}
	
	
	public function tampil_akunbiaya()
	{	
		$this->db->select('*');
		$this->db->from('as_accounts');
		return $this->db->get();
		
	}
	
	function get_produk(){
		$this->db->select('*');
		$this->db->from('as_products');
		$query = $this->db->get();

        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
        	return $query->result();
        }
    }

    public function get_barcode()
    {	
    	$this->db->select('*');
    	$this->db->from('as_products');
    	$this->db->join('as_categories', 'as_products.categoryID = as_categories.categoryID', 'left');
    	$this->db->join('as_brands', 'as_products.brandID = as_brands.brandID', 'left');	
    	$this->db->join('as_barcodes', 'as_products.productBarcode = as_barcodes.productBarcode', 'left');
    	return $this->db->get();

    }

    public function tampil_trx()
    {	
    	$this->db->select('*');
    	$this->db->from('as_sales_transactions');
    	return $this->db->get();

    }



    function tampilkan_detailbahan__transaksi($invoiceID)
    {
    	$this->db->select('*');
    	$this->db->from('as_sales_bahan_detail_transactions');
    	$this->db->join('as_bahan', 'as_bahan.bahanBarcode = as_sales_bahan_detail_transactions.bahanBarcode', 'left');
    	$this->db->where('as_sales_bahan_detail_transactions.invoiceID', $invoiceID);
    	return $this->db->get();
    }

     function tampilkan_detail_transaksi ($invoiceID,$identity)
    {

    	$this->db->select('*');
    	$this->db->from('as_sales_detail_transactions');
    	$this->db->join('as_products', 'as_products.productBarcode = as_sales_detail_transactions.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('invoiceID', $invoiceID);
		$this->db->where('as_products.identityID', $identity);
    	return $this->db->get();
    }
	
	function tampilkan_detail_transaksi_all ($invoiceID,$identity)
    {

    	$this->db->select('*');
    	$this->db->from('as_sales_detail_transactions');
    	$this->db->join('as_products', 'as_products.productBarcode = as_sales_detail_transactions.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('invoiceID', $invoiceID);
		$this->db->where('as_products.identityID', $identity);
    	return $this->db->get();
    }
	
	function tampilkan_transaksi ($invoiceID)
    {

    	$this->db->select('*');
    	$this->db->from('as_sales_transactions');
    	$this->db->where('invoiceID', $invoiceID);
    	return $this->db->get();
    }


//Purchasing Order
    function tampilkan_detail_transaksi_Order($invoiceID)
    {

    	$this->db->select('*');
    	$this->db->from('as_order_detail_transactions');
    	$this->db->join('as_bahan', 'as_bahan.bahanBarcode = as_order_detail_transactions.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_bahan.bahanSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('invoiceOrderID', $invoiceID);
    	return $this->db->get();
    }

    function tampilkan_transaksi_Order($invoiceID)
    {
    	$this->db->where('invoiceOrderID', $invoiceID);
    	$query = $this->db->get('as_order_transactions');
    	return $query->row();
    }

     function tampilkan_transaksi_all_order()
    {	
    	$query = $this->db->get('as_order_transactions');
    	return $query->result();
    }

    function tampilkan_transaksi_all_order_by_tgl($tanggal1,$tanggal2)
    {	
    	//$query="SELECT * from as_order_transactions
    	//WHERE trxDate BETWEEN '$tanggal1' AND '$tanggal2'";

    	$this->db->select('*');
    	$this->db->from('as_order_transactions');
    	$this->db->where('trxDate BETWEEN "'. date('Y-m-d', strtotime($tanggal1)).'" AND "'. date('Y-m-d',strtotime($tanggal2)).'"');
    	//$this->db->where('trxDate <= date "'.$tanggal2.'"');
    	$query = $this->db->get('as_order_transactions');
    	return $query->result();
    }


//Mutasi Order
    function tampilkan_detail_mutasi_Order($invoiceID)
    {

    	$this->db->select('*');
    	$this->db->from('as_mutasi_order_detail');
    	$this->db->join('as_products', 'as_products.productBarcode = as_mutasi_order_detail.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('invoiceOrderID', $invoiceID);
    

    	return $this->db->get();
    }
	
	function tampilkan_mutasi_Order($invoiceID)
    {

    	$this->db->select('*');
    	$this->db->from('as_mutasi_order');
    	$this->db->where('invoiceOrderID', $invoiceID);
    	return $this->db->get();
    }
	
	function tampilkan_detail_mutasi_Order_detail($invoiceID,$supplierID)
    {

    	$this->db->select('*');
    	$this->db->from('as_mutasi_order_detail');
		$this->db->join('as_mutasi_order', 'as_mutasi_order.invoiceOrderID = as_mutasi_order_detail.invoiceOrderID', 'left');
    	$this->db->join('as_products', 'as_products.productBarcode = as_mutasi_order_detail.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->join('as_identity', 'as_identity.identityID = as_mutasi_order.supplierID', 'left'); 
    	$this->db->where('as_mutasi_order_detail.invoiceOrderID', $invoiceID);
		$this->db->where('as_identity.identityID', $supplierID);
    	return $this->db->get();
    }
	
	
	function tampilkan_detail_mutasi_Order_detail_masuk($invoiceID,$identityID)
    {

    	$this->db->select('*');
    	$this->db->from('as_mutasi_order_detail');
		$this->db->join('as_mutasi_order', 'as_mutasi_order.invoiceOrderID = as_mutasi_order_detail.invoiceOrderID', 'left');
    	$this->db->join('as_products', 'as_products.productBarcode = as_mutasi_order_detail.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('as_mutasi_order_detail.invoiceOrderID', $invoiceID);
    	return $this->db->get();
    }
	
	function tampilkan_detail_mutasi_Order_detail_get_supp_masuk($identityID)
    {

    	$this->db->select('*');
    	$this->db->from('as_identity');
		$this->db->where('as_identity.identityID', $identityID);
    	return $this->db->get();
    }
	function tampilkan_detail_mutasi_Order_detail_get_supp($invoiceID,$supplierID)
    {

    	$this->db->select('*');
    	$this->db->from('as_mutasi_order');
		$this->db->join('as_identity', 'as_identity.identityID = as_mutasi_order.supplierID', 'left'); 
    	$this->db->where('as_mutasi_order.invoiceOrderID', $invoiceID);
		$this->db->where('as_identity.identityID', $supplierID);
    	return $this->db->get();
    }
	function tampilkan_detail_mutasi_Order_id($detailID)
    {

    	$this->db->select('*');
    	$this->db->from('as_mutasi_order_detail');
    	$this->db->join('as_products', 'as_products.productBarcode = as_mutasi_order_detail.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('detailID', $detailID);
    	return $this->db->get();
    }

    function tampilkan_daftar_permintaan($identityID)
    {
    	$this->db->select('*');
    	$this->db->from('as_mutasi_order');
    	$this->db->join('as_pegawai', 'as_pegawai.nip = as_mutasi_order.createdUserID', 'left');
    	$this->db->join('as_identity', 'as_identity.identityID = as_mutasi_order.identityID', 'left'); 
    	$this->db->where('as_mutasi_order.identityID', $identityID);
    	return $this->db->get();
    }
	
	 function tampilkan_daftar_permintaan_masuk($identityID)
    {
    	$this->db->select('*');
    	$this->db->from('as_mutasi_order');
    	$this->db->join('as_pegawai', 'as_pegawai.nip = as_mutasi_order.createdUserID', 'left');
    	$this->db->join('as_identity', 'as_identity.identityID = as_mutasi_order.identityID', 'left'); 
    	$this->db->where('as_mutasi_order.supplierID', $identityID);
    	return $this->db->get();
    }

     function tampilkan_mutasi_all_order()
    {	
    	$query = $this->db->get('as_order_transactions');
    	return $query->result();
    }	
	
	
//Penerimaan Barang
    function tampilkan_detail_transaksi_buy($invoiceID)
    {

    	$this->db->select('*');
    	$this->db->from('as_buy_detail_transactions');
    	$this->db->join('as_products', 'as_products.productBarcode = as_buy_detail_transactions.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('invoiceBuyID', $invoiceID);
    	return $this->db->get();
    }


    function tampilkan_transaksi_Buy()
    {	
    	$query = $this->db->get('as_buy_transactions');
    	return $query->result();
    }

    function tampilkan_transaksi_Buy_one($invoiceID)
    {

    	$this->db->where('invoiceBuyID', $invoiceID);
    	$query = $this->db->get('as_buy_transactions');
    	return $query->row();
    }

    function tampilkan_transaksi_getqty($trxid,$productBarcode)
    {

    	$this->db->select('*');
    	$this->db->from('as_sales_detail_transactions');
    	$array = array('invoiceID' => $trxid, 'productBarcode' => $productBarcode);
    	$this->db->where($array);
    	return $this->db->get();
    }


    function tampil_produk_id($productBarcode)
    {
    	$query="SELECT * from as_products
    	WHERE productBarcode='$productBarcode'";
    	return $this->db->query($query);
    }
	
	function tampil_bahan_id_stok($idbahan)
    {
    	$query="SELECT * from as_bahan
    	WHERE bahanID='$idbahan'";
    	return $this->db->query($query);
    }
	
	 function tampil_produk_code($produkcode)
    {
    	$query="SELECT * from as_produksi_formula
    	WHERE produkID='$produkcode'";
    	return $this->db->query($query);
    }

     function tampil_bahan_id($productBarcode)
    {
    	$query="SELECT * from as_bahan
    	WHERE bahanBarcode='$productBarcode'";
    	return $this->db->query($query);
    }

    function save_trx_detail()
    {

    	$createdDate = date('Y-m-d H:i:s');
    	$memberID = $this->input->post('idmember');
    	$invoice = $this->input->post('nofak');
    	$trxFullName = $this->input->post('namamember');
    	$trxAddress = $this->input->post('alamatkirim');
    	$trxPhone = $this->input->post('telpkirim');
    	$trxDate = date('Y-m-d');
    	$trxSubtotal = $this->input->post('subtotal');
    	$trxModal = $this->input->post('trxModal');
    	$trxDP = $this->input->post('dp');
    	$ppn = $this->input->post('ppn');
    	$trxTerminDate = $this->input->post('trxTerminDate');
    	$trxDiscount = $this->input->post('discTotal');
    	$trxStatus = $this->input->post('status');
    	$nama_barang    =  $this->input->post('barang');
    	$qty            =  $this->input->post('qty');
    	$data           = array('barang_id'=>$idbarang['barang_id'],
    		'qty'=>$qty,
    		'harga'=>$idbarang['harga'],
    		'status'=>'0');
    	$this->db->insert('transaksi_detail',$data);
    }
	
	
	    function tampilkan_detail_formula_add_Order($produkID,$user)
    {

    	$this->db->select('*');
    	$this->db->from('as_produksi_formula_detail');
    	$this->db->join('as_bahan', 'as_bahan.bahanBarcode = as_produksi_formula_detail.bahanID', 'left');
    	$this->db->join('as_satuan', 'as_produksi_formula_detail.bahanUom = as_satuan.satuanID', 'left'); 
		$this->db->join('as_categories_bahan', 'as_bahan.categoryID = as_categories_bahan.categoryID', 'left'); 
    	$this->db->where('as_produksi_formula_detail.produkID', $produkID);
    	return $this->db->get();
    }
	
	public function tampil_po()
	{
		$this->db->select('*');
		$this->db->from('as_order_transactions');
		$this->db->join('as_debts', 'as_order_transactions.invoiceOrderID = as_debts.invoiceID', 'left'); 
		return $this->db->get();
		
	}
	
	public function tampil_po_one($id)
	{
		$this->db->select('*');
		$this->db->join('as_suppliers', 'as_order_transactions.supplierID = as_suppliers.supplierID', 'left'); 
		$this->db->where('trxID', $id);
		$query = $this->db-> get('as_order_transactions');
		return $query->row();
	}
	
	public function tampil_faktur()
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->join('as_receivables', 'as_sales_transactions.invoiceID = as_receivables.invoiceID', 'left'); 
		return $this->db->get();
		
	}
	
	public function tampil_faktur_one($id)
	{
		$this->db->select('*');
		$this->db->join('as_members', 'as_sales_transactions.memberID = as_members.memberID', 'left'); 
		$this->db->where('trxID', $id);
		$query = $this->db-> get('as_sales_transactions');
		return $query->row();
	}
	
	public function tampil_debt_id($invoiceOrderID)
	{
		$query="SELECT * from as_debts
    	WHERE invoiceID='$invoiceOrderID'";
    	return $this->db->query($query);
	}
	
	public function tampil_receiveble_id($invoiceOrderID)
	{
		$query="SELECT * from as_receivables
    	WHERE invoiceID='$invoiceOrderID'";
    	return $this->db->query($query);
	}
	
	function tampilkan_detail_retur_pembelian($invoiceID)
    {

    	$this->db->select('*');
    	$this->db->from('as_retur_detail_transactions');
    	$this->db->join('as_products', 'as_products.productBarcode = as_retur_detail_transactions.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('invoiceReturID', $invoiceID);
    	return $this->db->get();
    }
	
	
	public function tampil_member_data($memberID)
	{
		$this->db->select('*');
		$this->db->from('as_members');
		$this->db->where('memberID', $memberID);
		return $this->db->get();
	}
	
	public function tampil_suplier_data($supplierID)
	{
		$this->db->select('*');
		$this->db->from('as_suppliers');
		$this->db->where('supplierID', $supplierID);
		return $this->db->get();
	}
	
	//Stock Opname
	function tampilkan_detail_so($invoiceID)
    {

    	$this->db->select('*');
    	$this->db->from('as_stock_opname_detail');
    	$this->db->join('as_products', 'as_products.productBarcode = as_stock_opname_detail.productBarcode', 'left');
    	$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
    	$this->db->where('noSO', $invoiceID);
    	return $this->db->get();
    }

}
