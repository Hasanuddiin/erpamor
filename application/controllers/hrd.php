<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Hrd extends CI_Controller
{
 
    public function __construct() {
        parent::__construct();
        $this->load->model('model_hrd'); 
       $this->load->helper(array('url','form','file'));
	   $this->load->library(array('upload'));
	   $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	   $this->load->model('model_user');
 
    }
 
    public function index()
    {
     
    }
		public function cek_aktif() {
		if ($this->session->userdata('admin_valid') == false && $this->session->userdata('admin_id') == "") {
			redirect('auth');
		} 
	}
    public function absensi() {
		
       $this->cek_aktif();
		$a['data'] = $this->model_hrd->tampil_data()->result_object();
		$a['page'] = "master/hrd/daftar_absensi";
		$a['title'] = "Data Absensi Karyawan";
		$this->load->view('admin/index',$a);
    }
	
	 public function absensi_detail() {
		
       $this->cek_aktif();
	   
		$nik= $this->input->get('nik');
		$nama= $this->input->get('nama');
		$harikerja= $this->input->get('harikerja');
		$gol= mysql_fetch_array(mysql_query("SELECT * FROM as_pegawai WHERE nip = '".$nik."'"));
		$golongan = $gol['golonganID'];
		$a['data_user'] = $this->model_user->tampil_data_pegawai($nik)->result_object();
		$a['data'] = $this->model_hrd->tampil_data_detail($nik)->result_object();
		$a['datapotongan'] = $this->model_hrd->tampil_data_potongan()->result_object();
		$a['databonus'] = $this->model_hrd->tampil_data_bonus()->result_object();
		$a['datapotongankaryawan'] = $this->model_hrd->tampil_data_potongan_karyawan($nik)->result_object();
		$a['databonuskaryawan'] = $this->model_hrd->tampil_data_bonus_karyawan($nik)->result_object();
		$a['datagaji'] = $this->model_hrd->tampil_data_gaji($golongan,$nik)->result_object();
		$a['page'] = "master/hrd/daftar_absensi_detail";
		$a['title'] = "Detail Absensi : <b>$nama</b>";
		$a['nik'] = $nik;
		$a['golongan'] = $golongan;
		$a['nama'] = $nama;
		$a['harikerja'] = $harikerja;
		$this->load->view('admin/index',$a);
    }
	
	 public function print_slip() {
		
       $this->cek_aktif();
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
	    $golongan = $this->input->post('golongan');
		$kantor = $this->input->post('kantor');
		$posisi = $this->input->post('posisi');
		$total = $this->input->post('total');
		$totallembur = $this->input->post('totallembur');
		$totalbonus = $this->input->post('totalbonus');
		$totalpot = $this->input->post('totalpot');
		$totalgaji = $this->input->post('totalgaji');
		$totalkomponengaji = $this->input->post('totalkomponengaji');
		$jumlah = $this->input->post('jumlah');
		
		$a['datagaji'] = $this->model_hrd->tampil_data_gaji($golongan,$nik)->result_object();
		$a['nik'] = $nik;
		$a['nama'] = $nama;
		$a['golongan'] = $golongan;
		$a['kantor'] = $kantor;
		$a['posisi'] = $posisi;
		$a['total'] = $total;
		$a['totallembur'] = $totallembur;
		$a['totalbonus'] = $totalbonus;
		$a['totalpot'] = $totalpot;
		$a['jumlah'] = $jumlah;
		$a['totalgaji'] = $totalgaji;
		$a['totalkomponengaji'] = $totalkomponengaji;
		$this->load->view('admin/master/hrd/print-act',$a);
									$html = $this->output->get_output();
									$this->load->library('dompdf_gen');
									$this->dompdf->load_html($html);
									$this->dompdf->render();
									$this->dompdf->stream($nama,array('Attachment'=>0));
		
    }
	
	 public function hitung_gaji() {
		
       $this->cek_aktif();
		$nik= $this->input->get('nik');
		$jumlah= $this->input->get('jumlah');
		$golongan= "3";
		$nama= $this->input->get('nama');
		$a['nama']= $nama;
		$a['jumlah']= $jumlah;
		$a['data'] = $this->model_hrd->tampil_data_gaji($golongan,$nik)->result_object();
		$a['page'] = "master/hrd/gaji_karyawan_view";
		$a['title'] = "Detail Gaji : <b>$nama</b>";
		$this->load->view('admin/index',$a);
    }
	
	public function konfigurasi() {
		
       $this->cek_aktif();
	   $a['datakomponen'] = $this->model_hrd->tampil_data_komponen()->result_object();
	   $a['datagolongan'] = $this->model_hrd->tampil_data_golongan()->result_object();
		$a['page'] = "master/hrd/konfigurasi";
		$a['title'] = "Konfigurasi Penggajian";
		$this->load->view('admin/index',$a);
    }
	
	function tambah_komponen(){
		$this->cek_aktif();
		$a['page']	= "master/hrd/tambah_komponen";
		$a['title'] = "Tambah Komponen";
		$this->load->view('admin/index', $a);
	}
	
	function tambah_potongan(){
		$this->cek_aktif();
		$harikerja = $this->input->get('harikerja');
		$nik = $this->input->get('nik');
		$nama = $this->input->get('nama');
		$potongan = $this->input->post('potongan');
		$jumlah = $this->input->post('jumlah');
		$potongan_stat = $this->input->post('potongan_stat');
		
		$object = array(
			'potonganID' => $potongan,
			'nik' => $nik,
			'jumlah' => $jumlah,
			'potongan_stat' => $potongan_stat,
			);
		
		$this->db->insert('as_potongan_karyawan', $object); 
		redirect('hrd/absensi_detail/?nik='.$nik.'&nama='.$nama.'&harikerja='.$harikerja.'');
	}
	
	function hapus_potongan_karyawan(){
		$this->cek_aktif();
		$harikerja = $this->input->get('harikerja');
		$id = $this->input->get('id');
		$nik = $this->input->get('nik');
		$nama = $this->input->get('nama');
		$this->model_hrd->hapus_potongan_karyawan($id);
		redirect('hrd/absensi_detail/?nik='.$nik.'&nama='.$nama.'&harikerja='.$harikerja.'');
	}
	
	function tambah_bonus(){
		$this->cek_aktif();
		$harikerja = $this->input->get('harikerja');
		$nik = $this->input->get('nik');
		$nama = $this->input->get('nama');
		$bonus = $this->input->post('bonus');
		$jumlah = $this->input->post('jumlah');
		$potongan_stat = $this->input->post('potongan_stat');
		
		$object = array(
			'bonusID' => $bonus,
			'nik' => $nik,
			'jumlah' => $jumlah
			);
		
		$this->db->insert('as_bonus_karyawan', $object); 
		redirect('hrd/absensi_detail/?nik='.$nik.'&nama='.$nama.'&harikerja='.$harikerja.'');
	}
	
	function hapus_bonus_karyawan(){
		$this->cek_aktif();
		$harikerja = $this->input->get('harikerja');
		$id = $this->input->get('id');
		$nik = $this->input->get('nik');
		$nama = $this->input->get('nama');
		$this->model_hrd->hapus_bonus_karyawan($id);
		redirect('hrd/absensi_detail/?nik='.$nik.'&nama='.$nama.'&harikerja='.$harikerja.'');
	}
	
	function save_komponen(){
		$this->cek_aktif();
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		

		$object = array(
			'nama_komponen' => $name,
			'komponenStatus' => $status
			);
		
		$this->db->insert('as_komponen', $object); 

		redirect('hrd/konfigurasi','refresh');
	}
	
	function edit_komponen($id){
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_komponen',array('komponenID'=>$id))->result_object();		
		$a['page']	= "master/hrd/edit_komponen";
		$a['title'] = "Edit Komponen";
		$this->load->view('admin/index', $a);
	}
	
	function update_komponen(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$object = array(
			'nama_komponen' => $name,
			'komponenStatus' => $status
			);
		$this->db->where('komponenID', $id);
		$this->db->update('as_komponen', $object); 

		redirect('hrd/konfigurasi','refresh');
	}
	
	function hapus_komponen($id){
		$this->cek_aktif();
		$this->model_hrd->hapus_komponen($id);
		redirect('hrd/konfigurasi','refresh');
	}
	
	function tambah_golongan(){
		$this->cek_aktif();
		$a['page']	= "master/hrd/tambah_golongan";
		$a['title'] = "Tambah Golongan";
		$this->load->view('admin/index', $a);
	}
	
	function save_golongan(){
		$this->cek_aktif();
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		

		$object = array(
			'golonganName' => $name,
			'golonganStatus' => $status
			);
		
		$this->db->insert('as_golongan', $object); 

		redirect('hrd/konfigurasi','refresh');
	}
	
	function edit_golongan($id){
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_golongan',array('golonganID'=>$id))->result_object();		
		$a['page']	= "master/hrd/edit_golongan";
		$a['title'] = "Edit Golongan";
		$this->load->view('admin/index', $a);
	}
	
	function update_golongan(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$object = array(
			'golonganName' => $name,
			'golonganStatus' => $status
			);
		$this->db->where('golonganID', $id);
		$this->db->update('as_golongan', $object); 

		redirect('hrd/konfigurasi','refresh');
	}
	
	function hapus_golongan($id){
		$this->cek_aktif();
		$this->model_hrd->hapus_golongan($id);
		redirect('hrd/konfigurasi','refresh');
	}
	
	function golongan_komponen(){
		$this->cek_aktif();
		$id= $this->input->get('id');
		$nama= $this->input->get('nama');
		if($this->input->post('submit') == "simpan")
						{
							$id= $this->input->get('id');
							$nama= $this->input->get('nama');
							$golongan= $this->input->post('golongan');
							$komponen= $this->input->post('komponen');
							$jumlah=$this->input->post('jumlah');
							$kali= $this->input->post('kali');
							$object = array(
									'golonganID' => $golongan,
									'komponenID' => $komponen,
									'nilai' => $jumlah,
									'iskalihari' => $kali
									);
								$this->db->insert('as_komponen_golongan', $object); 
								$a['idgolongan']= $this->input->get('id');
								$a['namagolongan']= $this->input->get('nama');
								$a['datakomponen'] = $this->model_hrd->tampil_data_komponen()->result_object();
								$a['datakomponengolongan'] = $this->model_hrd->tampil_data_komponen_golongan($id)->result_object();
								$a['page']	= "master/hrd/komponen_golongan";
								$a['title'] = "Komponen Gaji Golongan";
								$this->load->view('admin/index', $a);
						}
						else
						{
		$a['idgolongan']= $this->input->get('id');
		$a['namagolongan']= $this->input->get('nama');
		$a['datakomponen'] = $this->model_hrd->tampil_data_komponen()->result_object();
		$a['datakomponengolongan'] = $this->model_hrd->tampil_data_komponen_golongan($id)->result_object();					
		$a['page']	= "master/hrd/komponen_golongan";
		$a['title'] = "Komponen Gaji Golongan";
		$this->load->view('admin/index', $a);
						}
	}
	
	function hapus_golongan_komponen($id){
		$this->cek_aktif();
		$id= $this->input->get('id');
		$nama= $this->input->get('nama');
		$this->model_hrd->hapus_golongan_komponen($id);
		redirect('hrd/konfigurasi','refresh');
	}
	
	function importdata(){
		$this->cek_aktif();
		$a['page']	= "master/hrd/import_absen";
		$a['title'] = "Import Data Absen";
		$this->load->view('admin/index', $a);
	}

public function importabsen(){
  $fileName = $this->input->post('file', TRUE);
  $config['upload_path'] = 'assets/excel/'; 
  $config['file_name'] = $fileName;
  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
  $config['max_size'] = 10000;

  $this->load->library('upload', $config);
  $this->upload->initialize($config); 
  
  if (!$this->upload->do_upload('file')) {
   $error = array('error' => $this->upload->display_errors());
   $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
   redirect('Welcome'); 
  } else {
   $media = $this->upload->data();
   $inputFileName = 'assets/excel/'.$media['file_name'];
   
   try {
    $inputFileType = IOFactory::identify($inputFileName);
    $objReader = IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
   } catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
   }

   $sheet = $objPHPExcel->getSheet(0);
   $highestRow = $sheet->getHighestRow();
   $highestColumn = $sheet->getHighestColumn();

   for ($row = 2; $row <= $highestRow; $row++){  
     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
     $data = array(
     "nik"=> $rowData[0][0],
     "tanggal"=> $rowData[0][1],
     "def_in"=> $rowData[0][2],
     "def_out"=> $rowData[0][3]
    );
    $this->db->insert("absensi",$data);
   } 
   $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
   redirect('hrd/absensi');
  }  
 } 
 
}
 