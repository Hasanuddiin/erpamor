<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permintaan extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('model_admin');
		$this->load->model('model_penerimaan');
		$this->load->model('model_perusahaan');
		$this->load->model('model_user');
		$this->load->model('model_master');

	}

		public function cek_aktif() {
		if ($this->session->userdata('admin_valid') == false && $this->session->userdata('admin_id') == "") {
			redirect('auth');
		} 
	}
	public function index(){
		$this->cek_aktif();
		$a['page'] = "master/pembelian/test";
		$a['title'] = "Pembelian test";
		$this->load->view('admin/index',$a);
	}

	public function daftar_po(){
		$this->cek_aktif();
		$a['list_buy'] = $this->model_master->tampilkan_transaksi_all_order();
		$a['page'] = "master/pembelian/view_list";
		$a['title'] = "Daftar Penerimaan Barang";
		$this->load->view('admin/index',$a);
	}

	public function daftar_permintaan(){
		$this->cek_aktif();
		$identityID=$this->session->userdata('identityID');
		$userid=$this->session->userdata('admin_user');
		$a['detail'] = $this->model_master->tampilkan_daftar_permintaan($identityID)->result_object();
		$a['detail_masuk'] = $this->model_master->tampilkan_daftar_permintaan_masuk($identityID)->result_object();
		$a['page'] = "master/permintaan/view_list";
		$a['title'] = "Daftar Permintaan";
		$this->load->view('admin/index',$a);
	}

	public function daftar_permintaan_keluar(){
		$this->cek_aktif();
		$identityID=$this->session->userdata('identityID');
		$userid=$this->session->userdata('admin_user');
		$a['detail'] = $this->model_master->tampilkan_daftar_permintaan($identityID)->result_object();
		$a['detail_masuk'] = $this->model_master->tampilkan_daftar_permintaan_masuk($identityID)->result_object();
		$a['page'] = "master/permintaan/per_keluar";
		$a['title'] = "Daftar Permintaan";
		$this->load->view('admin/index',$a);
	}
	
	public function detail_permintaan(){
		$this->cek_aktif();
		$invoiceID= $this->input->get('orderID');
		$supplierID= $this->input->get('supplierID');
		$a['invoiceID']=$invoiceID;
		$a['detail'] = $this->model_master->tampilkan_detail_mutasi_Order_detail($invoiceID,$supplierID)->result_object();
		$a['detail2'] = $this->model_master->tampilkan_mutasi_Order($invoiceID)->result_object();
		$a['detailsupp'] = $this->model_master->tampilkan_detail_mutasi_Order_detail_get_supp($invoiceID,$supplierID)->result_object();
		$a['page'] = "master/permintaan/view_list_detail";
		$a['title'] = "Daftar Permintaan";
		$this->load->view('admin/index',$a);
	}
	
	public function detail_permintaan_masuk(){
		$this->cek_aktif();
		$invoiceID= $this->input->get('orderID');
		$identityID= $this->input->get('identityID');
		$identity=$this->session->userdata('admin_user');
		//$a['perusahaan']= $this->model_perusahaan->tampil_data_identity($identity)->result();
		$a['detail'] = $this->model_master->tampilkan_detail_mutasi_Order_detail_masuk($invoiceID,$identityID)->result_object();
		$a['detail_masuk'] = $this->model_master->tampilkan_daftar_permintaan_masuk($identityID)->result_object();
		$a['detailsuppmasuk'] = $this->model_master->tampilkan_detail_mutasi_Order_detail_get_supp_masuk($identityID)->result_object();
		$a['page'] = "master/permintaan/view_list_detail_masuk";
		$a['title'] = "Daftar Permintaan";
		$this->load->view('admin/index',$a);
	}
	public function print_permintaan_masuk(){
		$this->cek_aktif();
		$invoiceID= $this->input->get('orderID');
		$identityID= $this->input->get('identityID');
		$a['detail'] = $this->model_master->tampilkan_detail_mutasi_Order_detail_masuk($invoiceID,$identityID)->result_object();
		$a['detailsuppmasuk'] = $this->model_master->tampilkan_detail_mutasi_Order_detail_get_supp_masuk($identityID)->result_object();
		$a['page'] = "master/permintaan/print-list-masuk";
		$a['title'] = "Daftar Permintaan";
		$this->load->view('admin/index',$a);
	}
	public function update_status_permintaan(){
		$this->cek_aktif();
		$keterangan= $this->input->post('keterangan');
		$invoiceID= $this->input->post('invoiceOrderID');
		$status= $this->input->post('prosesperm');
		
		$object = array(
			'order_status' => $status,
			'keterangan' => $keterangan
			);
		$this->db->where('invoiceOrderID', $invoiceID);
		$this->db->update('as_mutasi_order', $object); 
		redirect('permintaan/daftar_permintaan');
	}
	
	public function detail_permintaan_edit(){
		$this->cek_aktif();
		$detailID= $this->input->get('detailID');
		$a['detail'] = $this->model_master->tampilkan_detail_mutasi_Order_id($detailID)->result_object();
		$a['page'] = "master/permintaan/view_list_detail_edit";
		$a['title'] = "Edit Permintaan";
		$this->load->view('admin/index',$a);
	}
	
	
	public function update_permintaan(){
		$detailID= $this->input->post('detailID');
		$invoiceOrderID= $this->input->post('invoiceOrderID');
		$qty= $this->input->post('qty');
		$data = array (
								'detailMutasiQty'  => $qty

								);
							$this->db->where('detailID', $detailID);
							$this->db->update('as_mutasi_order_detail', $data);
							redirect("permintaan/detail_permintaan?orderID=$invoiceOrderID");
		
	}
	
	
	public function savepermintaan(){
		$identity=$this->session->userdata('identityID');
		$invoiceID = $this->input->post('invoiceID');
		$supplierID= $this->input->get('supplierID');
		$detail_po = $this->model_penerimaan->tampilkan_detail_mutasi($invoiceID);
		$i=0;
		$jum_total = 0;
		foreach ($detail_po as $d_po) {	
			$qty = $this->input->post('qty')[$i];
            $productBarcode = $d_po->productBarcode;
            $prod = $this->model_master->tampil_produk_id($d_po->productBarcode);
			foreach($prod->result() as $row)
			{
				$prostok = $row->productStock;
			}
			if($row->identityID<>$identity)
			{
				$object_up_stok = array(
				
					'productBarcode' => $row->productBarcode,
					'productName' => $row->productName,
					'productBuyPrice' => $row->productBuyPrice,
					'productSalePrice' => $row->productSalePrice,
					'productSalePrice' => $row->productSalePrice,
					'productSat' => $row->productSat,
					'productStock' => $qty,
					'identityID' => $identity,
					);
				$this->db->insert('as_products', $object_up_stok); 
				
				$prostok=($prostok)-($qty);
			$object_up_stok = array(
					'productStock' => $prostok
					);
				$this->db->where('productBarcode', $productBarcode);
				$this->db->where('identityID', $row->identityID);
				$this->db->update('as_products', $object_up_stok); 
			}
			else{
			
			$prostok=($prostok)+($qty);
			$object_up_stok = array(
					'productStock' => $prostok
					);
				$this->db->where('productBarcode', $productBarcode);
				$this->db->where('identityID', $identity);
				$this->db->update('as_products', $object_up_stok); 
			}
			$i++;
		}
			$object = array(
					'mutasi_save_stat' => 1
					);
				$this->db->where('invoiceOrderID', $invoiceID);
				$this->db->update('as_mutasi_order', $object); 
			redirect("permintaan/daftar_permintaan");

	}
	

	function addtpm() {
		$this->cek_aktif();
		$a['data_perusahaan']= $this->model_perusahaan->tampil_data()->result();
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
		$productBarcode = $this->input->post('kdproduk');
		$qty = $this->input->post('qty');
		$a['suplier']	= $this->model_master->tampil_suplier()->result_object();	
		if($this->input->post('submit') == "tambah")
		{
		

				$object = array(
					'invoiceOrderID' => $invoiceID,
					'productBarcode' => $productBarcode,
					'detailmutasiQty' => $qty,
					'createdDate' => $tgltrx
					);
				$this->db->insert('as_mutasi_order_detail', $object); 
				
				$a['detail']= $this->model_master->tampilkan_detail_mutasi_Order($invoiceID)->result();
				 // echo $this->db->last_query();
				$a['page'] = "master/permintaan/add";
				$a['title'] = "Permintaan Barang";
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
				$gudangpoint= $this->input->post('gudangpoint');
				$identityID=$this->session->userdata('identityID');
				$userid=$this->session->userdata('admin_user');
				$trxFullNamesave=$this->input->post('namamember2');
				$trxDate = date('Y-m-d');
				
				$object = array(
					'supplierID' => $gudangpoint,
					'invoiceOrderID' => $invoiceID,
					'order_status' => '0',
					'trxDate' => $trxDate,
					'identityID' => $identityID,
					'createdUserID' => $userid
					);
				$this->db->insert('as_mutasi_order', $object);   
				
				$a['perusahaan']= $this->model_perusahaan->tampil_data()->result();
				$a['nofak']= $invoiceID;
				$a['member']= $trxFullNamesave;
				$a['tgltrx']= $tgltrx;
				$a['detail']= $this->model_master->tampilkan_detail_mutasi_Order($invoiceID)->result();
											// echo $this->db->last_query();
				$a['title'] = "Detail Transaksi";
				$a['page'] = "master/permintaan/showtrx";
				$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
				$this->load->view('admin/index',$a);


			}
			else
			{

				$a['detail']= $this->model_master->tampilkan_detail_mutasi_Order($invoiceID)->result();
				$a['trxid'] = $invno;
				$a['page'] = "master/permintaan/add";
				$a['title'] = "Permintaan Barang";
				$this->load->view('admin/index',$a);
			}


		}

		function hapus_tpm(){
			$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$id= $this->input->get('idtrxpj');
		$qtyremove= $this->input->get('qtyremove');
		$this->model_master->hapus_trxpm($id);
		$productBarcode= $this->input->get('productBarcode');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		 
		redirect('pembelian/addtpm/?nofak='.$trxid.'&tgltrx='.$tgltrx.'');
	}

		/* print */

		function addtpm_memberdetail_print() {
			$this->cek_aktif();
								$idname= $this->input->post('idname');
								$idaddress= $this->input->post('idaddress');
								$idphone=$this->input->post('idphone');
								$idmail=$this->input->post('idmail');
								$nofak= $this->input->post('nofak');
								$invoiceID= $this->input->post('nofak');
								$tgltrx =$this->input->post('tgltrx');
								$termin =$this->input->post('termin');
								$trxfullname= $this->input->post('trxfullname');
								$trxaddres= $this->input->post('trxaddres');
								$trxcartype= $this->input->post('trxcartype');
								$trxcarno= $this->input->post('trxcarno');
								$nopo= $this->input->post('nopo');
								$zona= $this->input->post('zona');
								$member = $this->input->post('member');
								$alamat = $this->input->post('alamat');
								$telp = $this->input->post('telp');
								$sales = $this->input->post('sales');
								$driver = $this->input->post('driver');
								$nabar = $this->input->post('nabar');
								$price = $this->input->post('price');
								$qty = $this->input->post('qty');
								$bonus = $this->input->post('bonus');
								$sat = $this->input->post('sat');
								$diskontype = $this->input->post('diskontype');
								$diskonpercent = $this->input->post('diskonpercent');
								$subtotal = $this->input->post('subtotal');
								$totharga = $this->input->post('totharga');
								$nama1 = $this->input->post('nama1');
								$nama2 = $this->input->post('nama2');
								$nama3 = $this->input->post('nama3');
								$nama4 = $this->input->post('nama4');
								$jab1 = $this->input->post('jab1');
								$jab2 = $this->input->post('jab2');
								$jab3 = $this->input->post('jab3');
								$jab4 = $this->input->post('jab4');

								$a['idname'] = $idname;
								$a['idaddress'] = $idaddress;
								$a['idphone'] = $idphone;
								$a['idmail'] = $idmail;
								$a['nofak'] = $nofak;
								$a['tgltrx'] = $tgltrx;
								$a['termin'] = $termin;
								$a['member'] = $member;
								$a['trxfullname'] = $trxfullname;
								$a['trxaddres'] = $trxaddres;
								$a['trxcartype'] = $trxcartype;
								$a['trxcarno'] = $trxcarno;
								$a['nopo'] = $nopo;
								$a['sales'] = $sales;
								$a['zona'] = $zona;
								$a['alamat'] = $alamat;
								$a['telp'] = $telp;
								$a['nabar'] = $nabar;
								$a['price'] = $price;
								$a['qty'] = $qty;
								$a['bonus'] = $bonus;
								$a['sat'] = $sat;
								$a['diskontype'] = $diskontype;
								$a['diskonpercent'] = $diskonpercent;
								$a['subtotal'] = $subtotal;
								$a['totharga'] = $totharga;
								$a['nama1'] = $nama1;
								$a['nama2'] = $nama2;
								$a['nama3'] = $nama3;
								$a['nama4'] = $nama4;
								$a['jab1'] = $jab1;
								$a['jab2'] = $jab2;
								$a['jab3'] = $jab3;
								$a['jab4'] = $jab4;
								$a['detail']= $this->model_master->tampilkan_detail_transaksi_Order($invoiceID)->result();
								if($this->input->post('submit') == "trxprint")
								{
									$this->load->view('admin/master/pembelian/print-act',$a);
									$html = $this->output->get_output();
									$this->load->library('dompdf_gen');
									$this->dompdf->load_html($html);
									$this->dompdf->render();
									$this->dompdf->stream($invoiceID,array('Attachment'=>0));
									redirect('admin/addtpj');
								}

								else if($this->input->post('submit') == "trxdo")
								{
									$this->load->view('admin/master/pembelian/print-do',$a);
									$html = $this->output->get_output();
									$this->load->library('dompdf_gen');
									$this->dompdf->load_html($html);
									$this->dompdf->render();
									$this->dompdf->stream($invoiceID,array('Attachment'=>0));
								}
							}

	}
