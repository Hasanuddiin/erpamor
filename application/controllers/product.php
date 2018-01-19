<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('model_admin');
		$this->load->model('Model_product');
		$this->load->model('model_perusahaan');
		$this->load->model('model_user');
		$this->load->model('model_master');

		$this->d_now = date('d-m-Y');

	}
public function cek_aktif() {
		if ($this->session->userdata('admin_valid') == false && $this->session->userdata('admin_id') == "") {
			redirect('auth');
		} 
	}
	public function index(){
		$this->cek_aktif();
		$a['list'] = $this->Model_product->get_ALL_product();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$a['page'] = "product/list";
		$a['title'] = "Pembuatan Product";
		$this->load->view('admin/index',$a);


	}
	
	public function formula(){
		$this->cek_aktif();
		$a['list'] = $this->Model_product->get_ALL_product_formula();
		$a['page'] = "product/formula_list";
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$a['title'] = " Daftar Formula Produk";
		$this->load->view('admin/index',$a);
	}
	

	public function tambah_product(){
		$this->cek_aktif();
		$produksiID = $this->GenProduksiNumber();
		$a['produksiID'] = $produksiID;
		$a['data_kategori'] = $this->Model_product->tampil_data_kategori()->result_object();
		$a['page'] = "product/add";
		$a['title'] = "tambah Produk";
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$this->load->view('admin/index',$a);
	}

	public function tambah_product_paketan(){
		$this->cek_aktif();
		$produksiID = $this->GenProduksiNumber();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$a['produksiID'] = $produksiID;
		$a['data_kategori'] = $this->Model_product->tampil_data_kategori_bahan()->result_object();
		$a['page'] = "product/add_paketan";
		$a['title'] = "tambah Produk";
		$this->load->view('admin/index',$a);
	}


	public function BahanProduct(){
		$this->cek_aktif();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$produksiID = $this->input->post('produksiID'); 
		$a['produksiID'] = $produksiID;
		$qtybahan = $this->input->post('qtybahan'); 
		$bahanBarcode = $this->input->post('bahanBarcode'); 
		$bahanID = $this->input->post('keybahan'); 
		$barcode = $this->input->post('barcode_pro');
		$a['barcode_pro'] = $barcode; 
		$a['jum_pro'] = $this->input->post('jum_pro');
		$a['produk'] = $this->Model_product->get_product_one($barcode);
		$a['bahan_produk'] = $this->Model_product->tampilkan_detailbahan_product($produksiID);
		// print_r($this->db->last_query());
		// var_dump('<pre>');
		// var_dump($a['bahan_produk']);
		$object = array(
			'produksiID' => $produksiID ,
			'bahanID' => $bahanID,
			'BahanBarcode' => $bahanBarcode,
			'detailBahanQty' => $qtybahan,

			);

		$this->db->insert('as_produksi_detail_transactions', $object); 

		$a['page'] = "product/add";
		$a['title'] = "Formula Bahan";
		$this->load->view('admin/index',$a);
	}
	
	public function save_product(){
		$this->cek_aktif();
		$kode = $this->input->post('kode'); 
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$nmproduk = $this->input->post('nmproduk'); 
		$desproduk = $this->input->post('desproduk'); 
		$katproduk = $this->input->post('katproduk'); 
		$object = array(
			'produkID' => $kode ,
			'produkName' => $nmproduk,
			'produkDesc' => $desproduk,
			'produkCat' => $katproduk,

			);

		$this->db->insert('as_produksi_formula', $object); 

		redirect('product/tambah_product','refresh');
	}
	
	
	public function buat_master_produk(){
		$this->cek_aktif();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$kode = $this->input->get('produkID'); 
		$nmproduk = $this->input->get('produkName'); 
		$identity=$this->session->userdata('identityID'); 
		$object = array(
			'productBarcode' => $kode ,
			'productName' => $nmproduk,
			'productType' =>'1',
			'identityID' =>$identity

			);

		$this->db->insert('as_products', $object); 
					
					$object2 = array(
					'ismaster' => '1'
					);
				$this->db->where('produkID', $kode);
				$this->db->update('as_produksi_formula', $object2);   
				

		redirect('product/formula','refresh');
	}

	public function buat_master_bahan(){
		$this->cek_aktif();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$kode = $this->input->get('produkID'); 
		$nmproduk = $this->input->get('produkName'); 
		$identity=$this->session->userdata('identityID'); 
		$object = array(
			'bahanBarcode' => $kode ,
			'bahanName' => $nmproduk,
			'CategoryID' =>'4',
			'identityID' =>$identity

			);

		$this->db->insert('as_bahan', $object); 
					
					$object2 = array(
					'ismaster' => '1'
					);
				$this->db->where('produkID', $kode);
				$this->db->update('as_produksi_formula', $object2);   
				

		redirect('product/formula','refresh');
	}
	
	public function buat_formula_input_prod(){
		$this->cek_aktif();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$kode = $this->input->get('produkID'); 
		$productionCode = $this->input->get('productionCode'); 
		$qty = $this->input->get('qty');
		$hpp = $this->input->get('hpp');
		
		$data = $this->model_master->tampil_produk_id($kode);
									foreach($data->result() as $row)
							{

								$prostok = $row->productStock;
								$newstok = $prostok+$qty;
							}
		
		$object = array(
			'productStock' => $newstok ,
			'productBuyPrice' => $hpp

			);
				$this->db->where('productBarcode', $kode);
				$this->db->update('as_products', $object);   
				
			$object2 = array(
					'planStat' => '1'
					);
				$this->db->where('productionCode', $productionCode);
				$this->db->update('as_produksi_plan', $object2);
				
		redirect('product/plan_cek_save_view','refresh');
	}

	
	
	public function plan_cek(){
		$this->cek_aktif();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$trxid= mysql_fetch_array(mysql_query('SELECT * from as_produksi_plan order by planlID desc limit 1;'));
		$trxdate = $trxid['createdDate'];
		$productionCode = $trxid['productionCode'];
		$d=date("my", strtotime($trxdate));
		$productionCode=substr($productionCode,6,8);
		if($productionCode=="")
		{
			$trxDate = date('my');
			$trx=1;
			$invoice=sprintf("%04d", $trx);
			$invno = $trxDate.$invoice;
		}
		else
		{
			$trxDate = date('my');
			$trxd=substr($productionCode,0,4);
			if($trxDate==$trxd)
			{
				$invno=$productionCode+1;
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

		$invno = "BOPR".date('m')."".$invno;
		$prodCode = $invno;
		$a['prodCode'] = $prodCode;
		
		$produk = $this->input->get('produk'); 
		
		
		$query1 = $this->db->query("SELECT * FROM as_produksi_formula_detail where produkID='".$produk."' ");
		$query2 = $this->db->query("SELECT * FROM as_produksi_formula_detail where produkID='".$produk."' and ischecked=1");

        $q1=$query1->num_rows();
		$q2=$query2->num_rows();	
		
		if($q1==$q2)
		{
			$bs="";
			$statcek="";
		}
		else
		{
		    $bs="disabled";
			$q3=$q1-$q2;
			$statcek="Silahkan Cek Semua Data!, masih ada <big style='color:red;'>$q3</big> data yang belum dicek";
		}

		$qty = $this->input->get('qty');
		$namapro = $this->input->get('namapro');
		$a['statcek']=$statcek;
		$a['qty']=$qty;
		$a['produk']=$produk;
		$a['namapro']=$namapro;
		$a['busta']=$bs;
		$a['list'] = $this->Model_product->get_ALL_product_formula_cek($produk);
		$a['page'] = "product/formula_list_cek";
		$a['title'] = "Cek ketersediaan Bahan produk : <b>$namapro</b>";
		$this->load->view('admin/index',$a);
	}
	
	public function plan_cek_save(){
		$this->cek_aktif();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$produk = $this->input->post('produk'); 
		$qty = $this->input->post('qty');
		$prodCode = $this->input->post('prodCode');
		$satbhn = $this->input->post('satbhn');
		$totalprodbahan = $this->input->post('totalprodbahan');
		$bahanID='14';
		$data = $this->model_master->tampil_bahan_id($bahanID);
		foreach($data->result() as $row)
							{
								if($row->bahanSat=='12' && $satbhn=='10')
								{
									$bhnstok=($row->bahanStock)*50000;
									$bhnstokB=$bhnstok-$totalprodbahan;
									$bhnstokC=$bhnstokB/50000;
								
								}
								else 
								if($row->bahanSat=='12' && $satbhn=='15')
								{
									$bhnstok=($row->bahanStock)*50;
									$bhnstokB=$bhnstok-$totalprodbahan;
									$bhnstokC=$bhnstokB/50;
								}
								else 
								if($row->bahanSat=='15' && $satbhn=='10')
								{
									$bhnstok=($row->bahanStock)*1000;
									$bhnstokB=$bhnstok-$totalprodbahan;
									$bhnstokC=$bhnstokB/1000;
								}
								else {
									$bhnstokC=$row->bahanStock;
								}
								
							}
							
			
		$object = array(
			'productionCode' => $prodCode,
			'produkID' => $produk ,
			'produkQty' => $qty,
			'planStat' => '0'

			);
		$this->db->insert('as_produksi_plan', $object); 
		
		$object = array(
					'ischecked' => 0
					);
				$this->db->where('produkID', $produk);
				$this->db->update('as_produksi_formula_detail', $object); 
				
		redirect('product/plan_cek_save_view','refresh');
	}
	
	public function plan_cek_save_view(){
		$this->cek_aktif();
		$a['status']= $this->model_master->tampil_status_prod()->result();
		$a['list'] = $this->Model_product->get_ALL_produksi_plan();
		$a['page'] = "product/formula_list_cek_saved";
		$a['title'] = "Daftar Status Produksi";
		$this->load->view('admin/index',$a);
	}
	
	
	

	
	public function perencanaan(){
		
		$this->cek_aktif();
		$a['paketan'] = $this->Model_product->get_ALL_paketan();
		$a['list'] = $this->Model_product->get_ALL_product_formula_aktif();
		$a['page'] = "product/product_plan";
		$a['title'] = " Perencanaan Produk Produk";
		$this->load->view('admin/index',$a);
	}
	
	
	public function plan_cek_confirm(){
		$this->cek_aktif();
		$produkcode = $this->input->post('produk'); 
		$qty = $this->input->post('qty');
		$a['produkcode']=$produkcode;
		$a['qty']=$qty;
		$data = $this->model_master->tampil_produk_code($produkcode);
		foreach($data->result() as $row)
			{

				$namaproduk = $row->produkName;
			}
		$a['namaproduk']=$namaproduk;
		$a['page'] = "product/product_plan_confirm";
		$a['title'] = " Perencanaan Produk Produk";
		$this->load->view('admin/index',$a);
	}
	
	public function buat_formula_cek_bahan(){
		$this->cek_aktif();
		$namapro =  $this->input->post('namapro');
		$idbahan = $this->input->post('idbahan'); 
		$totalprodbahan = $this->input->post('usebahan');
		$satID2 = $this->input->post('satID2');
		$satID = $this->input->post('satID');
		$produkcode = $this->input->post('produkcode');
		$qty = $this->input->post('qty');
		$detailID = $this->input->post('detailID');
		$data = $this->model_master->tampil_bahan_id_stok($idbahan);
		foreach($data->result() as $key)
			{
								if($satID=='10' && $satID2=='12')
								{
									$totconvori=$totalprodbahan/($key->bahanSatVal*1000);
									$sisastok=$key->bahanStock-$totconvori;
									
								}
								else if($satID=='10' && $satID2=='15')
								{
									$totconvori=$totalprodbahan/1000;
									$sisastok=$key->bahanStock-$totconvori;
								}
								else if($satID=='15' && $satID2=='15')
								{
									
									$totconvori=$totalprodbahan;
									$sisastok=$key->bahanStock-$totconvori;
								}
								else if($satID=='15' && $satID2=='12')
								{
									$totconvori=$totalprodbahan/50;
									$sisastok=$key->bahanStock-$totconvori;
								}
			}
			$object = array(
					'bahanStock' => $sisastok
					);
				$this->db->where('bahanID', $idbahan);
				$this->db->update('as_bahan', $object);
		     $object = array(
					'ischecked' => 1,
					'totalBahan' => $totalprodbahan
					);
				$this->db->where('detailID', $detailID);
				$this->db->update('as_produksi_formula_detail', $object);
				redirect("product/plan_cek?produk=$produkcode&qty=$qty&namapro=$namapro");
	}
	
	
	public function SelesaiTambah(){

	}

	public function GenProduksiNumber(){
		$trxid= mysql_fetch_array(mysql_query('SELECT * from as_produksi_formula order by detailID desc limit 1;'));
		$trxdate = date('Y-m-d');
		$produksiID = $trxid['produkID'];
		$d=date("my", strtotime($trxdate));
		$tglfktr=date('my');
		$produksiIDfil=substr($produksiID,6,8);
		if($produksiIDfil=="")
		{
			$trxDate = date('my');
			$trx=1;
			$invoice=sprintf("%04d", $trx);
			$invno = $trxDate.$invoice;
		}
		else
		{
			$trxDate = date('my');
			$trxd=substr($produksiIDfil,0,4);
			if($trxDate==$trxd)
			{
				$invno=$produksiIDfil+1;
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

		$kode = "BOAP".date('m')."".$invno;

		return $kode;
	}

	public function hapus_formula($id){
		$this->cek_aktif();
		$this->model_master->hapus_formula($id);
		redirect('product/formula','refresh');
	}
	
	function buat_formula() {
		$this->cek_aktif();
		$produkID=$this->input->get('produkID');
		$user=$this->session->userdata('admin_user');
		$a['produkID']	= $produkID;
		$a['kategori']	= $this->model_master->tampil_kategori_bahan()->result_object();
		$a['satuan']	= $this->model_master->tampil_satuan()->result_object();
		$trxid= mysql_fetch_array(mysql_query('SELECT * from as_mutasi_order order by trxID desc limit 1;'));
		$trxdate = $trxid['trxDate'];
		$invoiceID = $trxid['invoiceOrderID'];
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

		$invno = "FMT".date('m')."-".$invno;
		$invoiceID = $invno;
		$tgltrx =date('Y-m-d');
		$a['trxid'] = $invoiceID;
		$a['tgltrx'] = $tgltrx;
		$kdbahan = $this->input->post('kdbahan');
		$qtybahan = $this->input->post('qtybahan');
		$satuanbahan = $this->input->post('satuanbahan');
		$a['suplier']	= $this->model_master->tampil_suplier()->result_object();	
		$data = $this->model_master->tampil_bahan_id($kdbahan);
		if($this->input->post('submit') == "tambah")
		{
			$price=0;
			$conv=0;
			$convprice=0;
			foreach($data->result() as $row)
			{
				
				
				$price = $row->bahanBuyPrice;
				$prostok = $row->bahanStock;
				$satbahan=$row->bahanSat;
				if($satuanbahan=='10' && $satbahan=='12')
				{
				$conv=($qtybahan/($row->bahanSatVal*1000));
				}
				else if($satuanbahan=='10' && $satbahan=='15')
				{
					$conv=($qtybahan/($row->bahanSatVal*1000));
				}
				else if($satuanbahan=='15' && $satbahan=='12')
				{
					$conv=($qtybahan/$row->bahanSatVal);
				}
				else {
					$conv=$qtybahan;
					
				}
				}
				
				$convprice=$conv*$price;
				$object = array(
					'produkID' => $produkID,
					'bahanID' => $kdbahan,
					'bahanQty' => $qtybahan,
					'bahanUom' => $satuanbahan,
					'bahanConv' =>$conv,
					'bahanConvprice' =>$convprice
					);
				$this->db->insert('as_produksi_formula_detail', $object); 
				
				$a['detail']= $this->model_master->tampilkan_detail_formula_add_Order($produkID,$user)->result();
				 // echo $this->db->last_query();
				$a['page'] = "master/product/add_formula";
				$a['title'] = "Tambah Formula";
				$this->load->view('admin/index',$a);
			}
			else if($this->input->post('submit') == "edittrx")
			{

				$ideditpro = $this->input->post('ideditpro');
				$qtypro = $this->input->post('qtypro');
				$productbarcode = $this->input->post('productbarcode');
				
					$data = array (
						'detailmutasiQty'  => $qtypro

						);
					$this->db->where('detailID', $ideditpro);
					$this->db->update('as_mutasi_order_detail', $data);
					$a['detail']= $this->model_master->tampilkan_detail_mutasi_Order($invoiceID)->result();
				    $a['page'] = "master/permintaan/add";
					$a['title'] = "PENJUALAN->MEMBER->Transaksi";
					$a['zona'] = $this->model_master->tampil_zona()->result_object();
					$this->load->view('admin/index',$a);
				}
			else if($this->input->post('submit') == 'selesaitrx')
			{
				
				$userid=$this->session->userdata('admin_user');
				$totalhpp=$this->input->post('totalhpp');
				
				$object = array(
					'produkHpp' => $totalhpp,
					'productStatus' =>'1'
					);
				$this->db->where('produkID', $produkID);
				$this->db->update('as_produksi_formula', $object);    
				
					redirect('product/formula','refresh');
			}
			else
			{

				$a['detail']= $this->model_master->tampilkan_detail_formula_add_Order($produkID,$user)->result();
				$a['trxid'] = $invno;
				$a['page'] = "master/product/add_formula";
				$a['title'] = "Formula Produk";
				$this->load->view('admin/index',$a);
			}


		}
	

}