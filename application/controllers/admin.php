<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function act_login() {
		
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		
		$password2	= md5($password);
		
		$q_data		= $this->db->query("SELECT a.*, b.* FROM m_admin a left join as_pegawai b on a.username=b.nip WHERE a.username = '".$username."' AND a.password = '$password2' and b.status='1'");
		$j_data		= $q_data->num_rows();
		$a_data		= $q_data->row();
		
		$_log		= array();
		if ($j_data === 1) {
			$sess_nama_user = "";
			if ($a_data->level_user == "1") {
				$det_user = $this->db->query("SELECT nama_lengkap FROM as_pegawai WHERE nip = '".$a_data->username."'")->row();
				if (!empty($det_user)) {
					$sess_nama_user = "Administrator";
				}
			} else if ($a_data->level_user == "2") {
				$det_user = $this->db->query("SELECT nama_lengkap FROM as_pegawai WHERE nip = '".$a_data->username."'")->row();
				if (!empty($det_user)) {
					$sess_nama_user = "Administrator Cabang";
				}
			}
			else  {
				$det_user = $this->db->query("SELECT nama_lengkap FROM as_pegawai WHERE nip = '".$a_data->username."'")->row();
				if (!empty($det_user)) {
					$sess_nama_user = $det_user->nama_lengkap;
				}
			}
			$data = array(
                    'admin_id' => $a_data->id,
                    'admin_user' => $a_data->username,
                    'admin_level' => $a_data->level_user,
                    'identityID' => $a_data->identityID,
                    'admin_nama' => $sess_nama_user,
					'admin_valid' => true
                    );
            $this->session->set_userdata($data);
			 redirect('admin');
		} else {
			 redirect('auth');
		}
		
	}
	
	  function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
	
	public function cek_aktif() {
		if ($this->session->userdata('admin_valid') == false && $this->session->userdata('admin_id') == "") {
			redirect('auth');
		} 
	}
	
	 function index(){
		$this->cek_aktif();
		$level=$this->session->userdata('admin_level');
		$user=$this->session->userdata('admin_user');
		$identity=$this->session->userdata('identityID');
		$today=date('Y-m-d');
		$bulan=date('m');
		$a['result']= mysql_fetch_array(mysql_query('SELECT trxDate,Sum(trxTotal) as total from as_sales_transactions  GROUP BY trxDate;'));
		$a['lev_user']	= $level;
		$a['menu_dashboard']	= $this->model_admin->tampil_menu_dashboard($level)->result_object(); 
		$a['menu_master']	= $this->model_admin->tampil_menu_master($level)->result_object();
		$a['menu_Produksi']	= $this->model_admin->tampil_menu_produksi($level)->result_object();
		$a['menu_penjualan']	= $this->model_admin->tampil_menu_penjualan($level)->result_object();
		$a['menu_po']	= $this->model_admin->tampil_menu_po($level)->result_object();
		$a['menu_penerimaan']	= $this->model_admin->tampil_menu_penerimaan($level)->result_object();
		$a['menu_returbeli']	= $this->model_admin->tampil_menu_returbeli($level)->result_object();
		$a['piutang']	= $this->model_admin->tampil_piutang()->num_rows();
		$a['po']	= $this->model_admin->get_po()->num_rows();
		$a['order_po']	= $this->model_admin->get_order($today)->num_rows();
		$a['hutang']	= $this->model_admin->tampil_hutang()->num_rows();
		$a['diterima']	= $this->model_admin->tampil_diterima($identity)->num_rows();
		$a['trx_today']	= $this->model_admin->tampil_trx($today)->num_rows();
		$a['trx_todayBakery']	= $this->model_admin->tampil_trxBakery($today)->num_rows();
		$a['prod_todayBakery']	= $this->model_admin->prod_trxBakery($today)->result();
		$a['totalpendapatan']= $this->model_master->tampil_trxtotalBakery($bulan)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxtodayBakery($today)->result();
		$a['totalPendTodayToko']= $this->model_master->tampil_trxtodayToko($today)->result();
		$a['totalPendTodayCicurug']= $this->model_master->tampil_trxtodayCicurug($today)->result();
		$a['chart']= $this->model_master->tampilchart()->num_rows();
		$a['permintaan']= $this->model_master->daftarpermintaan($identity)->num_rows();
	
		$a['perusahaan']= $this->model_perusahaan->tampil_data_identity($identity)->result();
		$a['report'] = $this->mread->report();

      	$a['status']= $this->model_master->tampil_status_prod()->result();
      	$a['status_prod']= $this->model_master->tampil_status_prod()->num_rows();

      	$bolu="bolu";
		$Djavamous="Djavamous";
		$ModernCake="ModernCake";
		$Mochi="Mochi";
		$Snack="Snack";
		$Cafe="Cafe";
		$Cookies="Cookies";
		$a['databolu'] = $this->model_master->tampil_kategorytoday2($today,$bolu,$identity)->result_object();
		$a['dataDjavamous'] = $this->model_master->tampil_kategoryDjavamos2($today,$Djavamous)->result_object();
		$a['dataModernCake'] = $this->model_master->tampil_kategoryModernCake2($today,$ModernCake)->result_object();
		$a['dataMochi'] = $this->model_master->tampil_kategoryMochi2($today,$Mochi)->result_object();
		$a['dataSnack'] = $this->model_master->tampil_kategorySnack2($today,$Snack)->result_object();
		$a['dataCafe'] = $this->model_master->tampil_kategoryCafe2($today,$Cafe)->result_object();
		$a['dataCookies'] = $this->model_master->tampil_kategoryCookies2($today,$Cookies)->result_object();

		
		$a['page']	= "home";

		
		$this->load->view('admin/index', $a);
	}
	
	function __construct(){
		parent::__construct();
		$this->load->model('mread');
		$this->load->helper(array('url','form'));
		$this->load->model('model_admin');
		$this->load->model('model_perusahaan');
		$this->load->model('model_user');
		$this->load->model('model_master');
		$this->load->model('model_hrd'); 
		 date_default_timezone_set('Asia/Jakarta');
	}

	/*perusahaan */
	public function getChats()
    {
        header('Content-Type: application/json');
        if ($this->input->is_ajax_request()) {
            // Find friend
            $friend = $this->db->get_where('users', array('id' => $this->input->post('chatWith')), 1)->row();

            // Get Chats
            $chats = $this->db
                ->select('chat.*, users.name')
                ->from('chat')
                ->join('users', 'chat.send_by = users.id')
                ->where('(send_by = '. $this->user->id .' AND send_to = '. $friend->id .')')
                ->or_where('(send_to = '. $this->user->id .' AND send_by = '. $friend->id .')')
                ->order_by('chat.time', 'desc')
                ->limit(100)
                ->get()
                ->result();

            $result = array(
                'name' => $friend->name,
                'chats' => $chats
            );
            echo json_encode($result);
        }
    }

    public function sendMessage()
    {
        $this->db->insert('chat', array(
            'message' => htmlentities($this->input->post('message', true)),
            'send_to' => $this->input->post('chatWith'),
            'send_by' => $this->user->id
        ));
    }
	function identitas() {
		$this->cek_aktif();
		$a['data_perusahaan'] = $this->model_perusahaan->tampil_data()->result_object();
		$a['page'] = "perusahaan/perusahaan";
		
		$this->load->view('admin/index',$a);
	}
	
	function tambah_identitas(){
		$this->cek_aktif();
		$a['dataidentity']	= $this->db->get_where('as_identity',array('identityType'=>'1'))->result_object();		
		$a['page']	= "perusahaan/tambah_perusahaan";
		$a['title'] = "Tambah Data Perusahaan";
		$this->load->view('admin/index', $a);
	}
	
	
	function save_identitas(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$type = $this->input->post('identitytype');
		$owner ="";
		if($type=='1'){
			$owner=$owner = $this->input->post('owner1');
		}
		else
		{
			$owner=$owner = $this->input->post('owner2');
		}
		$owner = $owner;
		$identitytype=$this->input->post('identitytype');
		$headidentity=$this->input->post('headidentity');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$hp = $this->input->post('hp');
		$pkp = $this->input->post('pkp');
		$pkpdate = $this->input->post('pkpdate');
		$npwp = $this->input->post('npwp');
		$ppn = $this->input->post('ppn');
		$printsale = $this->input->post('printsale');
		$printbuy = $this->input->post('printbuy');
		$object = array(
			'identityType' => $identitytype,
			'identityHead' => $headidentity,
			'identityName' => $name,
			'identityOwner' => $owner,
			'identityAddress' => $address,
			'identityPhone' => $phone,
			'identityEmail' => $email,
			'identityOwnerPhone' => $hp,
			'identityPKP' => $pkp,
			'identityPKPDate' => $pkpdate,
			'identityNPWP' => $npwp,
			'identityPPN' => $ppn,
			'identityPrintSale' => $printsale,
			'identityPrintBuy' => $printbuy
			);
		$this->db->insert('as_identity', $object); 

		redirect('admin/identitas','refresh');
	}
	
	function edit_identitas($id){
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_identity',array('identityID'=>$id))->result_object();		
		$a['page']	= "perusahaan/edit_perusahaan";
		$a['title'] = "Edit Perusahaan";
		$this->load->view('admin/index', $a);
	}
	
	function update_identitas(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$owner = $this->input->post('owner');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$hp = $this->input->post('hp');
		$pkp = $this->input->post('pkp');
		$pkpdate = $this->input->post('pkpdate');
		$npwp = $this->input->post('npwp');
		$ppn = $this->input->post('ppn');
		$printsale = $this->input->post('printsale');
		$printbuy = $this->input->post('printbuy');
		$object = array(
			'identityName' => $name,
			'identityOwner' => $owner,
			'identityAddress' => $address,
			'identityPhone' => $phone,
			'identityEmail' => $email,
			'identityOwnerPhone' => $hp,
			'identityPKP' => $pkp,
			'identityPKPDate' => $pkpdate,
			'identityNPWP' => $npwp,
			'identityPPN' => $ppn,
			'identityPrintSale' => $printsale,
			'identityPrintBuy' => $printbuy
			);
		$this->db->where('identityID', $id);
		$this->db->update('as_identity', $object); 

		redirect('admin/identitas','refresh');
	}
	/*perusahaan */
	
	
	/*user */
	function userman() {
		$this->cek_aktif();
		$a['data_user'] = $this->model_user->tampil_data()->result_object();
		$a['title'] = "Manajemen User";
		$a['page'] = "user/user";
		
		$this->load->view('admin/index',$a);
	}
	
	function edit_user($id){
		$this->cek_aktif();
		//$a['editdata']	= $this->db->get_where('as_pegawai',array('nip'=>$id))->result_object();	
		$a['editdata']	= $this->model_user->tampil_data_user($id)->result_object();		
		$a['page']	= "user/edit_user";
		$a['title'] = "Edit User";
		$this->load->view('admin/index', $a);
	}
	
	function tambah_user(){
		$this->cek_aktif();
		$a['data_perusahaan'] = $this->model_perusahaan->tampil_data_cabang()->result_object();
		$a['data_golongan'] = $this->model_hrd->tampil_data_golongan()->result_object();
		$a['data_pend'] = $this->model_admin->tampil_data_pendidikan()->result_object();
		$a['page']	= "user/tambah_user";
		$a['title'] = "Tambah User";
		$this->load->view('admin/index', $a);
	}
	
	function update_user(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$nip = $this->input->post('nipp');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$level = $this->input->post('level');
		$bloking = $this->input->post('bloking');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if($this->input->post('password')!='')
		{
			$object = array(
				'userNIP' => $nip,
				'userFullName' => $name,
				'userPhone' => $phone,
				'userLevel' => $level,
				'userBlocked' => $bloking,
				'userName' => $username,
				'userPassword' => md5($password)
				);
		}
		else
		{
			$object = array(
				'userNIP' => $nip,
				'userFullName' => $name,
				'userPhone' => $phone,
				'userLevel' => $level,
				'userBlocked' => $bloking,
				'userName' => $username
				);
		}
		$this->db->where('userID', $id);
		$this->db->update('as_users', $object); 

		redirect('admin/userman','refresh');
	}
	
	
	function aktif_user(){
		$this->cek_aktif();
		$nip = $this->input->get('nip');
		$status = $this->input->get('status');
		if($status=='1')
		{

			$object = array(
				'status' => '0'
				);
		}
		else 
			if($status=='0')
		{

			$object = array(
				'status' => '1'
				);
		}
		$this->db->where('nip', $nip);
		$this->db->update('as_pegawai', $object); 

		redirect('admin/userman','refresh');
	}
	
	function akses_user(){
		$this->cek_aktif();
		$nip = $this->input->get('nip');
			$object = array(
				'username' => $nip,
				'password' => md5($nip),
				'userBlocked' =>'1'
				);
			
		$this->db->insert('m_admin', $object); 

		redirect('admin/userman','refresh');
	}
	
	
	function save_user(){
		$this->cek_aktif();
		$nip = $this->input->post('nip');
		$name = $this->input->post('name');
		$ktp = $this->input->post('ktp');
		$tmpt = $this->input->post('tmpt');
		$ttl = $this->input->post('ttl');
		$kel = $this->input->post('kel');
		$agama = $this->input->post('agama');
		$golongan = $this->input->post('golongan');
		$statuskwn = $this->input->post('statuskwn');
		$pend = $this->input->post('pend');
		$alamat = $this->input->post('alamat');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$kantorlevel=$this->input->post('kantorlevel');
		$kantorcabang=$this->input->post('kantorcabang');
		$identityid="";
		if($kantorlevel=="1")
		{
			$identityid="1";
		}
		else {
			$identityid=$kantorcabang;
		}
		$object1 = array(
			'nip' => $nip,
			'nama_lengkap' => $name,
			'no_ktp' => $ktp,
			'tempat_lahir' => $tmpt,
			'tanggal_lahir' => $ttl,
			'gender' => $kel,
			'agama_id' => $agama,
			'golonganID' => $golongan,
			'status_kawin' => $statuskwn,
			'gelar_pendidikan' => $pend,
			'alamat' => $alamat,
			'hp' => $phone,
			'email' => $email,
			'level_user' => $level,
			'status' => '0',
			'identityID' => $identityid
			);
		
		
		$this->db->insert('as_pegawai', $object1);
		
		
		$object_tp = array(
			'nik' => $nip,
			'kd_level' => 4,
			'nama' => $name,
			'kd_cabang' => $identityid,
			'status_aktif'=> "aktif"
			);
		
		
		$this->db->insert('t_pegawai', $object_tp);

		redirect('admin/userman','refresh');
	}
	
	function hapus_user($id){
		$this->cek_aktif();
		$this->model_admin->hapus_user($id);
		redirect('admin/userman','refresh');
	}
	/*kategori */
	
	function printpendapatan(){
		$this->cek_aktif();
		$today= date('Y-m-d');
		$identity=$this->session->userdata('identityID');
		$user=$this->session->userdata('admin_user');
		$trxDateprint = date('d-m-Y');
		$a['trxDateprint']= $trxDateprint;
		$a['debit_bca'] = $this->model_admin->tampil_trx_user_today_close_bca($today)->result();
		$a['debit_mandiri'] = $this->model_admin->tampil_trx_user_today_close_mandiri($today)->result();
		$a['close_debit'] = $this->model_admin->tampil_trx_user_today_close_debit($today)->result();
		$a['perusahaan']= $this->model_perusahaan->tampil_data_identity($identity)->result();
		$bolu="bolu";
		$Djavamous="Djavamous";
		$ModernCake="ModernCake";
		$Mochi="Mochi";
		$Snack="Snack";
		$Cafe="Cafe";
		$Cookies="Cookies";
		
		$a['tgl'] = $this->input->get('haritanggal');
		$a['data'] = $this->model_master->tampil_kategorytoday($today,$bolu)->result_object();
		$a['dataDjavamous'] = $this->model_master->tampil_kategoryDjavamos($today,$Djavamous)->result_object();
		$a['dataModernCake'] = $this->model_master->tampil_kategoryModernCake($today,$ModernCake)->result_object();
		$a['dataMochi'] = $this->model_master->tampil_kategoryMochi($today,$Mochi)->result_object();
		$a['dataSnack'] = $this->model_master->tampil_kategorySnack($today,$Snack)->result_object();
		$a['dataCafe'] = $this->model_master->tampil_kategoryCafe($today,$Cafe)->result_object();
		$a['dataCookies'] = $this->model_master->tampil_kategoryCookies($today,$Cookies)->result_object();
		

		
		$a['totalTodayPen']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtodayBakery($today,$user)->result();
		$a['page'] = "master/penjualan/print-pendapatan";
		$a['title'] = "Pendaptan by Kategori Produk";
		$this->load->view('admin/index',$a);
	}


	function kategori() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_kategori_prod()->result_object();
		$a['title'] = "Manajemen Kategori";
		$a['page'] = "master/kategori/kategori";
		
		$this->load->view('admin/index',$a);
	}
	
	function edit_kategori($id){
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_categories_produk',array('categoryID'=>$id))->result_object();		
		$a['page']	= "master/kategori/edit_kategori";
		$a['title'] = "Edit Kategori";
		$this->load->view('admin/index', $a);
	}
	
	function update_kategori(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$object = array(
			'categoryName' => $name,
			'categoryStatus' => $status
			);
		$this->db->where('categoryID', $id);
		$this->db->update('as_categories_produk', $object); 

		redirect('admin/kategori','refresh');
	}
	
	function hapus_kategori($id){
		$this->cek_aktif();
		$this->model_master->hapus_kategori($id);
		redirect('admin/kategori','refresh');
	}
	
	function tambah_kategori(){
		$this->cek_aktif();
		$a['page']	= "master/kategori/tambah_kategori";
		$a['title'] = "Tambah Kategori";
		$this->load->view('admin/index', $a);
	}
	
	function save_kategori(){
		$this->cek_aktif();
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		

		$object = array(
			'categoryName' => $name,
			'categoryStatus' => $status
			);
		
		$this->db->insert('as_categories_produk', $object); 

		redirect('admin/kategori','refresh');
	}
	
	/* end kategori */
	
	/*satuan */
	
	function satuan() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_satuan()->result_object();
		$a['title'] = "Manajemen Satuan";
		$a['page'] = "master/satuan/satuan";
		
		$this->load->view('admin/index',$a);
	}
	
	function edit_satuan($id){
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_satuan',array('satuanID'=>$id))->result_object();		
		$a['page']	= "master/satuan/edit_satuan";
		$a['title'] = "Edit Satuan";
		$this->load->view('admin/index', $a);
	}
	
	function update_satuan(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$object = array(
			'satuanName' => $name,
			'satuanStatus' => $status
			);
		$this->db->where('satuanID', $id);
		$this->db->update('as_satuan', $object); 

		redirect('admin/satuan','refresh');
	}
	
	function hapus_satuan($id){
		$this->cek_aktif();
		$this->model_master->hapus_satuan($id);
		redirect('admin/satuan','refresh');
	}
	
	function tambah_satuan(){
		$this->cek_aktif();
		$a['page']	= "master/satuan/tambah_satuan";
		$a['title'] = "Tambah Satuan";
		$this->load->view('admin/index', $a);
	}
	
	function save_satuan(){
		$this->cek_aktif();
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		

		$object = array(
			'satuanName' => $name,
			'satuanStatus' => $status
			);
		
		$this->db->insert('as_satuan', $object); 

		redirect('admin/satuan','refresh');
	}
	/* brand */
	
	function brand() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_brand()->result_object();
		$a['page'] = "master/brand/brand";
		$a['title'] = "Manajemen Brand";
		$this->load->view('admin/index',$a);
	}
	
	
	function edit_brand($id){
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_brands',array('brandID'=>$id))->result_object();		
		$a['page']	= "master/brand/edit_brand";
		$a['title'] = "Edit Brand";
		$this->load->view('admin/index', $a);
	}
	
	function update_brand(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$object = array(
			'brandName' => $name,
			'brandStatus' => $status
			);
		$this->db->where('brandID', $id);
		$this->db->update('as_brands', $object); 

		redirect('admin/brand','refresh');
	}
	
	function hapus_brand($id){
		$this->cek_aktif();
		$this->model_master->hapus_brand($id);
		redirect('admin/brand','refresh');
	}
	
	function tambah_brand(){
		$this->cek_aktif();
		$a['page']	= "master/brand/tambah_brand";
		$a['title'] = "Tambah Brand";
		$this->load->view('admin/index', $a);
	}
	
	function save_brand(){
		$this->cek_aktif();
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		

		$object = array(
			'brandName' => $name,
			'brandStatus' => $status
			);
		
		$this->db->insert('as_brands', $object); 

		redirect('admin/brand','refresh');
	}
	
	
	/* Supplier */
	function suplier() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_suplier()->result_object();
		$a['page'] = "master/suplier/suplier";
		$a['title'] = "Manajemen Suplier";
		$this->load->view('admin/index',$a);
	}
	
	function edit_suplier($id) {
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_suppliers',array('supplierID'=>$id))->result_object();		
		$a['page']	= "master/suplier/edit_suplier";
		$a['title'] = "Edit Suplier";
		$this->load->view('admin/index', $a);
	}
	
	function update_suplier(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$alamat = $this->input->post('alamat');
		$phone = $this->input->post('phone');
		$fax = $this->input->post('fax');
		$kontak = $this->input->post('kontak');
		$hp = $this->input->post('hp');
		$status = $this->input->post('status');
		$object = array(
			'supplierCode' => $kode,
			'supplierName' => $name,
			'supplierAddress' => $alamat,
			'supplierPhone' => $phone,
			'supplierFax' => $fax,
			'supplierContactPerson' => $kontak,
			'supplierCPHp' => $hp,
			'supplierStatus' => $status
			);
		$this->db->where('supplierID', $id);
		$this->db->update('as_suppliers', $object); 

		redirect('admin/suplier','refresh');
	}
	
	function hapus_suplier($id){
		$this->cek_aktif();
		$this->model_master->hapus_suplier($id);
		redirect('admin/suplier','refresh');
	}
	
	function tambah_suplier(){
		$this->cek_aktif();
								$trxid= mysql_fetch_array(mysql_query('SELECT * from as_suppliers order by supplierID desc limit 1;'));
								$supplierID = $trxid['supplierCode'];
								if($supplierID=="")
								{
									
									$count=1;
									$code=sprintf("%05d", $count);
									$suppode = $code;
								}
								else
								{
									
										$suppode=$supplierID+1;
										$suppode=sprintf("%05d", $suppode);
								

								}

								$supplierCode = $suppode;
								$a['supplierCode']	= $supplierCode;
								$a['page']	= "master/suplier/tambah_suplier";
								$a['title'] = "Tambah Suplier";
								$this->load->view('admin/index', $a);
	}
	
	function save_suplier(){
		$this->cek_aktif();
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$alamat = $this->input->post('alamat');
		$phone = $this->input->post('phone');
		$fax = $this->input->post('fax');
		$kontak = $this->input->post('kontak');
		$hp = $this->input->post('hp');
		$status = $this->input->post('status');

		$object = array(
			'supplierCode' => $kode,
			'supplierName' => $name,
			'supplierAddress' => $alamat,
			'supplierPhone' => $phone,
			'supplierFax' => $fax,
			'supplierContactPerson' => $kontak,
			'supplierCPHp' => $hp,
			'supplierStatus' => $status
			);
		
		$this->db->insert('as_suppliers', $object); 

		redirect('admin/suplier','refresh');
	}
	
	/* Mitra */
	function mitra() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_mitra()->result_object();
		$a['page'] = "master/mitra/mitra";
		$a['title'] = "Manajemen Mitra";
		$this->load->view('admin/index',$a);
	}
	
	function edit_mitra($id) {
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_mitra',array('mitraID'=>$id))->result_object();		
		$a['page']	= "master/mitra/edit_mitra";
		$a['title'] = "Edit Mitra";
		$this->load->view('admin/index', $a);
	}
	
	function update_mitra(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$alamat = $this->input->post('alamat');
		$phone = $this->input->post('phone');
		$fax = $this->input->post('fax');
		$kontak = $this->input->post('kontak');
		$hp = $this->input->post('hp');
		$status = $this->input->post('status');
		$object = array(
			'mitraCode' => $kode,
			'mitraName' => $name,
			'mitraAddress' => $alamat,
			'mitraPhone' => $phone,
			'mitraFax' => $fax,
			'mitraContactPerson' => $kontak,
			'mitraCPHp' => $hp,
			'mitraStatus' => $status
			);
		$this->db->where('mitraID', $id);
		$this->db->update('as_mitra', $object); 

		redirect('admin/mitra','refresh');
	}
	
	function hapus_mitra($id){
		$this->cek_aktif();
		$this->model_master->hapus_mitra($id);
		redirect('admin/mitra','refresh');
	}
	
	function tambah_mitra(){
		$this->cek_aktif();
								$trxid= mysql_fetch_array(mysql_query('SELECT * from as_mitra order by mitraID desc limit 1;'));
								$mitraID = $trxid['mitraCode'];
								if($mitraID=="")
								{
									
									$count=1;
									$code=sprintf("%05d", $count);
									$suppode = $code;
								}
								else
								{
									
										$suppode=$mitraID+1;
										$suppode=sprintf("%05d", $suppode);
								

								}

								$mitraCode = $suppode;
								$a['mitraCode']	= $mitraCode;
								$a['page']	= "master/mitra/tambah_mitra";
								$a['title'] = "Tambah Mitra";
								$this->load->view('admin/index', $a);
	}
	
	function save_mitra(){
		$this->cek_aktif();
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$alamat = $this->input->post('alamat');
		$phone = $this->input->post('phone');
		$fax = $this->input->post('fax');
		$kontak = $this->input->post('kontak');
		$hp = $this->input->post('hp');
		$status = $this->input->post('status');

		$object = array(
			'mitraCode' => $kode,
			'mitraName' => $name,
			'mitraAddress' => $alamat,
			'mitraPhone' => $phone,
			'mitraFax' => $fax,
			'mitraContactPerson' => $kontak,
			'mitraCPHp' => $hp,
			'mitraStatus' => $status
			);
		
		$this->db->insert('as_mitra', $object); 

		redirect('admin/mitra','refresh');
	}
/* Paketan */
	function paketan() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_paketan()->result_object();
		$a['page'] = "master/paketan/paketan";
		$a['title'] = "Manajemen Paketan";
		$this->load->view('admin/index',$a);
	}
	function edit_paketan($id) {
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_paketan',array('paketanID'=>$id))->result_object();		
		$a['page']	= "master/paketan/edit_paketan";
		$a['title'] = "Edit Paketan";
		$this->load->view('admin/index', $a);
	}
	
	function update_paketan(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$jumlah = $this->input->post('jumlah');
	
		$status = $this->input->post('status');
		$object = array(
			'paketanCode' => $kode,
			'paketanName' => $name,
			
			'paketanJumlah' => $jumlah,
			'paketanStatus' => $status
			);
		$this->db->where('paketanID', $id);
		$this->db->update('as_paketan', $object); 

		redirect('admin/paketan','refresh');
	}
	
	function hapus_paketan($id){
		$this->cek_aktif();
		$this->model_master->hapus_paketan($id);
		redirect('admin/paketan','refresh');
	}
	
	function tambah_paketan(){
		$this->cek_aktif();
								$trxid= mysql_fetch_array(mysql_query('SELECT * from as_paketan order by paketanID desc limit 1;'));
								$paketanID = $trxid['paketanCode'];
								if($paketanID=="")
								{
									
									$count=1;
									$code=sprintf("%05d", $count);
									$suppode = $code;
								}
								else
								{
									
										$suppode=$paketanID+1;
										$suppode=sprintf("%05d", $suppode);
								

								}

								$paketanCode = $suppode;
								$a['paketanCode']	= $paketanCode;
								$a['page']	= "master/paketan/tambah_paketan";
								$a['title'] = "Tambah paketan";
								$this->load->view('admin/index', $a);
	}
	
	function save_paketan(){
		$this->cek_aktif();
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$jumlah = $this->input->post('jumlah');
		$status = $this->input->post('status');

		$object = array(
			'paketanCode' => $kode,
			'paketanName' => $name,
			'paketanJumlah' => $jumlah,
			'paketanStatus' => $status
			);
		
		$this->db->insert('as_paketan', $object); 

		redirect('admin/paketan','refresh');
	}
	
	

	/* Produk */
	function produk() {
		$this->cek_aktif();
		$level=$this->session->userdata('admin_level');
		$identity=$this->session->userdata('identityID');
		$a['dataamor'] = $this->model_master->tampil_produk_amor($identity)->result_object();
		$a['data'] = $this->model_master->tampil_produk_mitra($identity)->result_object();
		$a['page'] = "master/produk/produk";
		$a['title'] = "Manajemen Produk";
		$this->load->view('admin/index',$a);
	}
	
	function edit_produk($id) {
		$this->cek_aktif();	
		$a['editdata']	= $this->db->get_where('as_products',array('productID'=>$id))->result_object();	
		$a['suplier']	= $this->model_master->tampil_suplier()->result_object();	
		$a['kategori']	= $this->model_master->tampil_kategori_prod()->result_object();
		$a['satuan']	= $this->model_master->tampil_satuan()->result_object();
		$a['brand']	= $this->model_master->tampil_brand()->result_object();	
		$a['page']	= "master/produk/edit_produk";
		$a['title'] = "Edit Produk";
		$this->load->view('admin/index', $a);
	}
	
	function update_produk(){
		$this->cek_aktif();
		$crdate = date('d-m-Y');
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$productShortcut = $this->input->post('kodepintas');
		$suplier = $this->input->post('suplier');
		$kategori = $this->input->post('kategori');
		$satuan = $this->input->post('satuan');
		$brand = $this->input->post('brand');
		$beli = $this->input->post('beli');
		$jual = $this->input->post('jual');
		$diskon = $this->input->post('diskon');
		$tipediskon = $this->input->post('tipediskon');
		$stok = $this->input->post('stok');
		$maxstok = $this->input->post('maxstok');
		$minstok = $this->input->post('minstok');
		$note = $this->input->post('note');
		$diskonstatus = $this->input->post('diskonstatus');
		$diskondatestart = $this->input->post('diskondatestart');
		
		$diskondatestop = $this->input->post('diskondatestop');
		$statuspromo = $this->input->post('statuspromo');
		$promomaxbuy = $this->input->post('promomaxbuy');
		$tipepromo = $this->input->post('tipepromo');
		$promo=$this->input->post('promo');
		$promoprod="";
		$promotext="";
		$promo_product = $this->input->post('promo_product');
		$promo_status = $this->input->post('promo_status');
		$promodatestart = $this->input->post('promodatestart');
		$promodatestop = $this->input->post('promodatestop');
		
		$object = array(
			'productBarcode' => $kode,
			'productName' => $name,
			'productShortcut' => $productShortcut,
			'supplierID' => $suplier,
			'categoryID' => $kategori,
			'productSat' => $satuan,
			'brandID' => $brand,
			'productBuyPrice' => $beli,
			'productSalePrice' => $jual,
			'productDiscount' => $diskon,
			'productStock' => $stok,
			'productmaxStock' => $maxstok,
			'productminStock' => $minstok,
			'productDiscounttype' => $tipediskon,
			'modifiedDate' => $crdate,
			'productNote' => $note,
			'discount_status' => $diskonstatus
			
			);
		$this->db->where('productID', $id);
		$this->db->update('as_products', $object); 
		
		if($diskonstatus=='1')
		{
			
			$objectdisc = array(
			'discount_start' => $diskondatestart,
			'discount_end' => $diskondatestop,
			'discount_status' => $diskonstatus
			);
		$this->db->where('productBarcode', $kode);
		$this->db->update('as_products', $objectdisc); 
			
		}
		
		
		if($statuspromo=='1')
		{
			
			if($tipepromo=='0') 
			{
				$promoprod=$kode;
				$promotext=$name;
			}
			else if($tipepromo=='1') 
			{
				$promoprod=$promo_product;
				$promotext=$promo_status;
			}
			
			
			$objectpromo = array(
			'promo_status' => $statuspromo,
			'promo_product' => $promoprod,
			'promo_text' => $promotext,
			'promo_maxbuy' => $promomaxbuy,
			'promo_jumlah' => $promo,
			'promo_type' => $tipepromo,
			'promo_start' => $promodatestart,
			'promo_end' => $promodatestop
			);
		$this->db->where('productBarcode', $kode);
		$this->db->update('as_products', $objectpromo); 
			
		}
		
		redirect('admin/produk','refresh');
	}
	
	function hapus_produk($id){
		$this->cek_aktif();
		$this->model_master->hapus_produk($id);
		redirect('admin/produk','refresh');
	}
	
	function tambah_produk(){
		$this->cek_aktif();
		$produksiID = $this->GenProduksiNumber();
		$a['produksiID'] = $produksiID;
		$a['page']	= "master/produk/tambah_produk";
		$a['title'] = "Tambah Produk";
		$a['suplier']	= $this->model_master->tampil_mitra()->result_object();	
		$a['kategori']	= $this->model_master->tampil_kategori_prod()->result_object();
		$a['satuan']	= $this->model_master->tampil_satuan()->result_object();
		$a['brand']	= $this->model_master->tampil_brand()->result_object();	
		$this->load->view('admin/index', $a);
	}

	function tambah_produk_bakery(){
		$this->cek_aktif();

		$produksiID = $this->GenProduksiNumber();
		$a['produksiID'] = $produksiID;
		$a['page']	= "master/produk/tambah_produk_bakery";
		$a['title'] = "Tambah Produk Khusus Bakery";
		$a['suplier']	= $this->model_master->tampil_mitra()->result_object();	
		$a['kategori']	= $this->model_master->tampil_kategori_prod()->result_object();
		$a['satuan']	= $this->model_master->tampil_satuan()->result_object();
		$a['brand']	= $this->model_master->tampil_brand()->result_object();	
		$this->load->view('admin/index', $a);
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
	
	function save_produk(){
		$this->cek_aktif();
		$crdate = date('d-m-Y');
		$identityID=$this->session->userdata('identityID');
		$prodtype=$this->input->post('productType');
		$kodepintas=$this->input->post('kodepintas');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$suplier = $this->input->post('suplier');
		$kategori = $this->input->post('kategori');
		$satuan = $this->input->post('satuan');
		//$brand = $this->input->post('brand');
		$beli = $this->input->post('beli');
		$jual = $this->input->post('jual');
		$diskon = $this->input->post('diskon');
		$tipediskon = $this->input->post('tipediskon');
		$stok = $this->input->post('stok');
		$maxstok = $this->input->post('maxstok');
		$minstok = $this->input->post('minstok');
		$note = $this->input->post('note');
		$object = array(
			'productBarcode' => $kode,
			'productName' => $name,
			'productShortcut' => $kodepintas,
			'identityID' => $identityID,
			'productType'=> $prodtype,
			'supplierID' => $suplier,
			'categoryID' => $kategori,
			'productSat' => $satuan,
			//'brandID' => $brand,
			'productBuyPrice' => $beli,
			'productSalePrice' => $jual,
			'productDiscount' => $diskon,
			'productDiscounttype' => $tipediskon,
			'productStock' => $stok,
			'productmaxStock' => $maxstok,
			'productminStock' => $minstok,
			'createdDate' => $crdate,
			'productNote' => $note
			
			);

		
		$this->db->insert('as_products', $object);
		
		$object2 = array(
			'produkID' => $kode 
			

			);

		$this->db->insert('as_produksi_formula', $object2);


		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		$barcode = $kode;
		$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$barcode), array())->draw();
		$imageName = $barcode.'.jpg';
		$imagePath = 'assets/barcode/';
		imagejpeg($imageResource, $imagePath.$imageName); 
		$pathBarcode = $imagePath.$imageName;
		redirect('admin/produk','refresh');
	}
	
	function get_produk(){
		$this->cek_aktif();
		$keyword = $this->input->post('term');

		// cari di database
		$data = $this->db->from('as_products')->like('productName',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'autocomplete1'	=>$row->productName

				);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
	
	
	
	/* Bahan */
	function bahan() {
		$this->cek_aktif();
		$identity=$this->session->userdata('identityID');
		$a['data'] = $this->model_master->tampil_bahan($identity)->result_object();
		$a['page'] = "master/bahan/bahan";
		$a['title'] = "Manajemen Bahan";
		$this->load->view('admin/index',$a);
	}

	function print_bahan() {
		$this->cek_aktif();
		$identity=$this->session->userdata('identityID');
		$a['data'] = $this->model_master->tampil_bahan($identity)->result_object();
		$a['perusahaan']= $this->model_perusahaan->tampil_data_identity($identity)->result();
		$a['page'] = "master/bahan/print_bahan";
		$a['title'] = "Manajemen Bahan";
		$this->load->view('admin/index',$a);
	}
	
	function edit_bahan($id) {
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_bahan',array('bahanID'=>$id))->result_object();	
		$a['suplier']	= $this->model_master->tampil_suplier()->result_object();	
		$a['kategori']	= $this->model_master->tampil_kategori_bahan()->result_object();
		$a['satuan']	= $this->model_master->tampil_satuan()->result_object();
		$a['brand']	= $this->model_master->tampil_brand()->result_object();	
		$a['page']	= "master/bahan/edit_bahan";
		$a['title'] = "Edit Bahan";
		$this->load->view('admin/index', $a);
	}
	
	function update_bahan(){
		$this->cek_aktif();
		$crdate = date('d-m-Y');
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$suplier = $this->input->post('suplier');
		$kategori = $this->input->post('kategori');
		$satuan = $this->input->post('satuan');
		$brand = $this->input->post('brand');
		$beli = $this->input->post('beli');
		$satval = $this->input->post('satval');

		
	
		$stok = $this->input->post('stok');
		$maxstok = $this->input->post('maxstok');
		$minstok = $this->input->post('minstok');

		$object = array(
			'bahanBarcode' => $kode,
			'bahanName' => $name,
			'supplierID' => $suplier,
			'categoryID' => $kategori,
			'bahanSat' => $satuan,
			'brandID' => $brand,
			'bahanBuyPrice' => $beli,
			'bahanSatVal' => $satval,
	
			'bahanStock' => $stok,
			'bahanmaxStock' => $maxstok,
			'bahanminStock' => $minstok,
			
			'modifiedDate' => $crdate,
		
			);
		$this->db->where('bahanID', $id);
		$this->db->update('as_bahan', $object); 

		redirect('admin/bahan','refresh');
	}
	
	function hapus_bahan($id){
		$this->cek_aktif();
		$this->model_master->hapus_bahan($id);
		redirect('admin/bahan','refresh');
	}
	
	function tambah_bahan(){
		$this->cek_aktif();
		$a['page']	= "master/bahan/tambah_bahan";
		$a['title'] = "Tambah Bahan";
		$a['suplier']	= $this->model_master->tampil_suplier()->result_object();	
		$a['kategori']	= $this->model_master->tampil_kategori_bahan()->result_object();
		$a['satuan']	= $this->model_master->tampil_satuan()->result_object();
		$a['brand']	= $this->model_master->tampil_brand()->result_object();	
		$this->load->view('admin/index', $a);
	}
	
	function save_bahan(){
		$this->cek_aktif();
		$crdate = date('d-m-Y');
		$identityID=$this->session->userdata('identityID');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$suplier = $this->input->post('suplier');
		$kategori = $this->input->post('kategori');
		$satuan = $this->input->post('satuan');
		$satval = $this->input->post('satval');
		$brand = $this->input->post('brand');
		$beli = $this->input->post('beli');
		$stok = $this->input->post('stok');
		$maxstok = $this->input->post('maxstok');
		$minstok = $this->input->post('minstok');
		$note = $this->input->post('note');
		$object = array(
			'bahanBarcode' => $kode,
			'bahanName' => $name,
			'identityID' => $identityID,
			'supplierID' => $suplier,
			'categoryID' => $kategori,
			'bahanSat' => $satuan,
			'bahanSatVal' => $satval,
			'brandID' => $brand,
			'bahanBuyPrice' => $beli,
			'bahanStock' => $stok,
			'bahanmaxStock' => $maxstok,
			'bahanminStock' => $minstok,
			'createdDate' => $crdate,
			'bahanNote' => $note
			);

		
		$this->db->insert('as_bahan', $object);

		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		$barcode = $kode;
		$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$barcode), array())->draw();
		$imageName = $barcode.'.jpg';
		$imagePath = 'assets/barcode/';
		imagejpeg($imageResource, $imagePath.$imageName); 
		$pathBarcode = $imagePath.$imageName;
		redirect('admin/bahan','refresh');
	}
	
	function get_bahan(){
		$this->cek_aktif();
		$keyword = $this->input->post('term');

		// cari di database
		$data = $this->db->from('as_products')->like('productName',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'autocomplete1'	=>$row->productName

				);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
	/* Member */
	function member() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_member()->result_object();
		$a['page'] = "master/member/member";
		$a['title'] = "Manajemen Outlet";
		$this->load->view('admin/index',$a);
	}
	
	function edit_member($id) {
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_members',array('memberID'=>$id))->result_object();	
		$a['zona'] = $this->model_master->tampil_zona()->result_object();
		$a['page']	= "master/member/edit_member";
		$a['title'] = "Edit Outlet";
		$this->load->view('admin/index', $a);
	}
	
	function update_member(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$zona = $this->input->post('zona');
		$phone = $this->input->post('phone');
		$object = array(
			'memberCode' => $kode,
			'memberFullName' => $name,
			'memberAddress' => $address,
			'memberzone' => $zona,
			'memberPhone' => $phone
			);
		$this->db->where('memberID', $id);
		$this->db->update('as_members', $object); 

		redirect('admin/member','refresh');
	}
	
	function hapus_member($id){
		$this->cek_aktif();
		$this->model_master->hapus_member($id);
		redirect('admin/member','refresh');
	}
	
	
	function tambah_member(){
		$this->cek_aktif();
		$a['page']	= "master/member/tambah_member";
		$a['title'] = "Tambah Outlet";
		$a['zona'] = $this->model_master->tampil_zona()->result_object();
		$this->load->view('admin/index', $a);
	}
	
	function save_member(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$zona = $this->input->post('zona');
		$phone = $this->input->post('phone');
		$object = array(
			'memberCode' => $kode,
			'memberFullName' => $name,
			'memberAddress' => $address,
			'memberzone' => $zona,
			'memberPhone' => $phone
			);
		
		$this->db->insert('as_members', $object); 

		redirect('admin/member','refresh');
	}
	
	
	/* Proyek */
	function proyek() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_proyek()->result_object();
		$a['page'] = "master/proyek/proyek";
		$a['title'] = "Manajemen proyek";
		$this->load->view('admin/index',$a);
	}
	
	function edit_proyek($id) {
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_proyek',array('proyekID'=>$id))->result_object();
		$a['zona'] = $this->model_master->tampil_zona()->result_object();		
		$a['page']	= "master/proyek/edit_proyek";
		$a['title'] = "Edit proyek";
		$this->load->view('admin/index', $a);
	}
	
	function update_proyek(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$zona = $this->input->post('zona');
		$phone = $this->input->post('phone');
		$object = array(
			'proyekCode' => $kode,
			'proyekFullName' => $name,
			'proyekAddress' => $address,
			'proyekzone' => $zona,
			'proyekPhone' => $phone
			);
		$this->db->where('proyekID', $id);
		$this->db->update('as_proyek', $object); 

		redirect('admin/proyek','refresh');
	}
	
	function hapus_proyek($id){
		$this->cek_aktif();
		$this->model_master->hapus_proyek($id);
		redirect('admin/proyek','refresh');
	}
	
	function akun() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_akun()->result_object();
		$a['page'] = "master/akun/akun";
		$a['title'] = "Manajemen Biaya";
		$this->load->view('admin/index',$a);
	}
	function addbiaya() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_akunbiaya()->result_object();
		$a['page'] = "master/akun/add";
		$a['title'] = "PENGELUARAN";
		$this->load->view('admin/index',$a);
	}
	
	function tambah_proyek(){
		$this->cek_aktif();
		$a['page']	= "master/proyek/tambah_proyek";
		$a['title'] = "Tambah proyek";
		$a['zona'] = $this->model_master->tampil_zona()->result_object();	
		$this->load->view('admin/index', $a);
	}
	
	function save_proyek(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$zona = $this->input->post('zona');
		$phone = $this->input->post('phone');
		$object = array(
			'proyekCode' => $kode,
			'proyekFullName' => $name,
			'proyekAddress' => $address,
			'proyekzone' => $zona,
			'proyekPhone' => $phone
			);
		
		$this->db->insert('as_proyek', $object); 

		redirect('admin/proyek','refresh');
	}
	
	
	/*Zona */
	
	function zona() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_zona()->result_object();
		$a['title'] = "Manajemen Zona";
		$a['page'] = "master/zona/zona";
		
		$this->load->view('admin/index',$a);
	}
	
	function edit_zona($id) {
		$this->cek_aktif();
		$a['editdata']	= $this->db->get_where('as_zona',array('zonaID'=>$id))->result_object();		
		$a['page']	= "master/zona/edit_zona";
		$a['title'] = "Edit Zona";
		$this->load->view('admin/index', $a);
	}
	
	function update_zona(){
		$this->cek_aktif();
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$object = array(
			'zonaName' => $name,
			'zonaStatus' => $status
			);
		$this->db->where('zonaID', $id);
		$this->db->update('as_zona', $object); 

		redirect('admin/zona','refresh');
	}
	
	
	function hapus_zona($id){
		$this->cek_aktif();
		$this->model_master->hapus_zona($id);
		redirect('admin/zona','refresh');
	}
	
	function tambah_zona(){
		$this->cek_aktif();
		$a['page']	= "master/zona/tambah_zona";
		$a['title'] = "Tambah Zona";
		$this->load->view('admin/index', $a);
	}
	
	function save_zona(){
		$this->cek_aktif();
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		

		$object = array(
			'zonaName' => $name,
			'zonaStatus' => $status
			);
		
		$this->db->insert('as_zona', $object); 

		redirect('admin/zona','refresh');
	}
	/* penjualan */

	function hapus_trxbahan(){
		$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$idproyek = $this->input->get('idproyek');
		$bahanID = $this->input->get('bahanID');
		$detailID = $this->input->get('detailID');
		$detailQty = $this->input->get('detailQty');

		$this->model_master->hapus_trxbahan($detailID);
        $data = $this->model_master->tampil_bahan_id($bahanID);
		foreach($data->result() as $row)
		{			
			$prostok = $row->bahanStock;
		}
		$qtyprev= $prostok+$detailQty;
		$object = array(
			'bahanStock' => $qtyprev
			);
		$this->db->where('bahanID', $bahanID);
		$this->db->update('as_bahan', $object); 
		redirect('admin/addtpj_memberdetailproyek/?nofak='.$trxid.'&idproyek='.$idproyek.'&tgltrx='.$tgltrx.'');
	}
	
	function hapus_trxpj(){
		$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$idmember = $this->input->get('idmember');
		$id= $this->input->get('idtrxpj');
		$qtyremove= $this->input->get('qtyremove');
		$this->model_master->hapus_trxpj($id);
		$productBarcode= $this->input->get('productBarcode');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		foreach($data->result() as $row)
		{
			
			$prostok = $row->productStock;
		}
		$qtyprev=$prostok+$qtyremove;
		$object = array(
			'productStock' => $qtyprev
			);
		$this->db->where('productBarcode', $productBarcode);
		$this->db->update('as_products', $object); 
		redirect('admin/addtpj_memberdetail/?nofak='.$trxid.'&idmember='.$idmember.'&tgltrx='.$tgltrx.'');
	}
	
	function hapus_trxpjpry(){
		$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$idproyek = $this->input->get('idproyek');
		$id= $this->input->get('idtrxpj');
		$qtyremove= $this->input->get('qtyremove');
		$this->model_master->hapus_trxpj($id);
		$productBarcode= $this->input->get('productBarcode');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		foreach($data->result() as $row)
		{
			
			$prostok = $row->productStock;
		}
		$qtyprev=$prostok+$qtyremove;
		$object = array(
			'productStock' => $qtyprev
			);
		$this->db->where('productBarcode', $productBarcode);
		$this->db->update('as_products', $object); 
		redirect('admin/addtpj_memberdetailproyek/?nofak='.$trxid.'&idproyek='.$idproyek.'&tgltrx='.$tgltrx.'');
	}
	
	function hapus_trxpjnonmember(){
		$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$id= $this->input->get('idtrxpj');
		$qtyremove= $this->input->get('qtyremove');
		$this->model_master->hapus_trxpj($id);
		$productBarcode= $this->input->get('productBarcode');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		foreach($data->result() as $row)
		{
			
			$prostok = $row->productStock;
		}
		$qtyprev=$prostok+$qtyremove;
		$object = array(
			'productStock' => $qtyprev
			);
		$this->db->where('productBarcode', $productBarcode);
		$this->db->update('as_products', $object); 
		redirect('admin/addtpj_nonmemberdetail/?nofak='.$trxid.'&tgltrx='.$tgltrx.'');
	}
	
	function hapus_trxpjnonmember_edit(){
		$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$id= $this->input->get('idtrxpj');
		$qtyremove= $this->input->get('qtyremove');
		$this->model_master->hapus_trxpj($id);
		$productBarcode= $this->input->get('productBarcode');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		foreach($data->result() as $row)
		{
			
			$prostok = $row->productStock;
		}
		$qtyprev=$prostok+$qtyremove;
		$object = array(
			'productStock' => $qtyprev
			);
		$this->db->where('productBarcode', $productBarcode);
		$this->db->update('as_products', $object); 
		redirect('admin/addtpj_nonmemberdetail_edit/?nofak='.$trxid.'&tgltrx='.$tgltrx.'');
	}

	function batal_trxpj(){
		$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$this->model_master->batal_trxpj($trxid);
		redirect('admin/addtpj');
	}
	

	
	function showtrxpj() {
		$this->cek_aktif();
		$identityID=$this->session->userdata('identityID');
		if($identityID=='1')
		{
			$a['data'] = $this->model_master->tampil_trxpj_all()->result_object();
		}
		else
		{
		$a['data'] = $this->model_master->tampil_trxpj($identityID)->result_object();
		}
		$a['page'] = "master/penjualan/show-trxpj";
		$a['title'] = "Daftar Transaksi Penjualan";
		$this->load->view('admin/index',$a);
	}
	
	function showtrxpj_detail() {
		$this->cek_aktif();
		$invoiceID = $this->input->get('nofak');
		$identity = $this->input->get('identity');
		$a['nofak'] = $invoiceID;
		$a['detail']= $this->model_master->tampilkan_detail_transaksi_all($invoiceID,$identity)->result();
		$a['page'] = "master/penjualan/showtrx-detail";
		$a['title'] = "Detail Transaksi";
		$this->load->view('admin/index',$a);
	}
	
	function showtrxpjpryk() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$a['data'] = $this->model_master->tampil_trxpjtodayproyek()->result_object();
		$a['page'] = "master/penjualan/show-trxpj-today-pryk";
		$a['title'] = "Daftar Transaksi Penjualan";
		$this->load->view('admin/index',$a);
	}
	
	function showtrxpjtoday() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$user=$this->session->userdata('admin_user');
		$a['list_kasir'] = $this->model_master->get_kasir();
		
		$a['data'] = $this->model_master->tampil_trxpjtoday($today, $user)->result_object();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtoday($today, $user)->result();
		$a['page'] = "master/penjualan/show-trxpj-today";
		$a['title'] = "Daftar Transaksi Penjualan Hari ini";
		$this->load->view('admin/index',$a);
	}

	function showtrxpjtodaytokocicurug() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$bulan=date('m');
		$user=$this->session->userdata('admin_user');
		$a['list_kasir'] = $this->model_master->get_kasir();
		$a['trx_today']	= $this->model_admin->tampil_trx($today)->num_rows();
		$a['trx_todayBakery']	= $this->model_admin->tampil_trxtokoCicurug($today)->num_rows();
		$a['prod_todayBakery']	= $this->model_admin->prod_trxtokoCicurug($today)->result();
		$a['pendapatanbulan']= $this->model_master->tampil_trxtotalCicurug($bulan)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxtodayCicurug($today)->result();
		$a['chart']= $this->model_master->tampilchart()->num_rows();
		
		$a['report'] = $this->mread->report3();

      	$a['status']= $this->model_master->tampil_status_prod()->result();
      	$a['status_prod']= $this->model_master->tampil_status_prod()->num_rows();
		$a['tampil'] = $this->model_master->tampil_trxpjtodayTokoCicurug($today)->result_object();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtodaytokoCicurug($today)->result();
		$a['page'] = "master/penjualan/show-trxpj-today-cicurug";
		$a['title'] = "Daftar Transaksi Toko Cicurug Hari ini";
		$this->load->view('admin/index',$a);
	}


	function showtrxpjtodaytoko() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$bulan=date('m');
		$user=$this->session->userdata('admin_user');
		$a['list_kasir'] = $this->model_master->get_kasir();
		$a['trx_today']	= $this->model_admin->tampil_trx($today)->num_rows();
		$a['trx_todayBakery']	= $this->model_admin->tampil_trxtoko($today)->num_rows();
		$a['prod_todayBakery']	= $this->model_admin->prod_trxtoko($today)->result();
		$a['pendapatanbulan']= $this->model_master->tampil_trxtotaltoko($bulan)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxtodayBakery($today)->result();
		$a['chart']= $this->model_master->tampilchart()->num_rows();
		
	
		
		$a['report'] = $this->mread->report2();

      	$a['status']= $this->model_master->tampil_status_prod()->result();
      	$a['status_prod']= $this->model_master->tampil_status_prod()->num_rows();
		$a['tampil'] = $this->model_master->tampil_trxpjtodayToko($today)->result_object();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtodaytoko($today)->result();
		$a['page'] = "master/penjualan/show-trxpj-today-pamuruyan";
		$a['title'] = "Daftar Transaksi Toko Penjualan Hari ini";
		$this->load->view('admin/index',$a);
	}

    function showtrxpjtodayDebit() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$user=$this->session->userdata('admin_user');
		$a['list_kasir'] = $this->model_master->get_kasir();
		$debit='debit';
		$bca='bca';
		$mandiri='mandiri';
		$a['data'] = $this->model_master->tampil_trxpjtoday_debit($today,$debit)->result_object();
		$a['totalpendapatanbca']= $this->model_master->tampil_trxtodaybca($today,$bca)->result();
		$a['totalpendapatanmandiri']= $this->model_master->tampil_trxtodaymandiri($today,$mandiri)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtoday($today, $user)->result();
		$a['page'] = "master/penjualan/show-trxpj-today-debit";
		$a['title'] = "Daftar Transaksi Penjualan Hari ini";
		$this->load->view('admin/index',$a);
	}
		function showrekaptoday() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$user=$this->session->userdata('admin_user');
		$a['list_kasir'] = $this->model_master->get_kasir();
		
		$a['data'] = $this->model_master->tampil_rekaptoday($today, $user)->result_object();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtoday($today, $user)->result();
		$a['page'] = "master/penjualan/show-rekap-today";
		$a['title'] = "Rekap Transaksi Penjualan Bakery Hari ini";
		$this->load->view('admin/index',$a);
	}

	function showrekaptodaytoko() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$user=$this->session->userdata('admin_user');
		$a['list_kasir'] = $this->model_master->get_kasir();
		
		$a['data'] = $this->model_master->tampil_rekaptodayToko($today, $user)->result_object();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtoday($today, $user)->result();
		$a['page'] = "master/penjualan/show-rekap-today-toko";
		$a['title'] = "Rekap Transaksi Penjualan Toko Hari ini";
		$this->load->view('admin/index',$a);
	}
	
	function showrekapstoktokopamuruyan() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$user=$this->session->userdata('admin_user');
		
		$a['data'] = $this->model_master->tampil_stok_produk($today, $user)->result_object();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtoday($today, $user)->result();
		$a['page'] = "master/stok/show-stok-toko-cicurug";
		$a['title'] = "STOK TOKO CICURUG HARI INI";
		$this->load->view('admin/index',$a);
	}

	function showrekapstoktokocicurug() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$user=$this->session->userdata('admin_user');
		
		$a['data'] = $this->model_master->tampil_stok_produkCicurug($today, $user)->result_object();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtoday($today, $user)->result();
		$a['page'] = "master/stok/show-stok-toko-pamuruyan";
		$a['title'] = "STOK TOKO PAMURUYAN HARI INI";
		$this->load->view('admin/index',$a);
	}


	function showrekappromo() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		$user=$this->session->userdata('admin_user');
		$a['list_kasir'] = $this->model_master->get_kasir();
		
		$a['data'] = $this->model_master->tampil_rekappromo($today, $user)->result_object();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtoday($today, $user)->result();
		$a['page'] = "master/penjualan/show-rekap-promo";
		$a['title'] = "Rekap Tagihan Promo Hari ini";
		$this->load->view('admin/index',$a);
	}


	function detail_kasir(){
		$this->cek_aktif();
		$kasir_name = $this->input->post('id');
		$today=date('Y-m-d');
		$supID = $this->input->post('supid');
		$identity=$this->session->userdata('identityID');

		
		$a['data1']= $this->model_master->tampil_trxsumtoday($today,$kasir_name)->result();
		$a['totalPendToday']= $this->model_master->tampil_trxsumtodaykasir($today, $kasir_name)->result();
		$a['totalpendapatan']= $this->model_master->tampil_trxtoday($today)->result();
		//$po = $this->model_master->tampilkan_transaksi_Order($invoiceID );
		//$a['dt_suppliers'] = $this->model_master->tampil_suplier_one($po->supplierID);
		$a['title'] = "laporan Pendaptan Kasir";
		//$this->load->view("admin/master/penjualan/view_penjualan_pop";
		$a['page'] = "master/penjualan/view_penjualan_pop";
		$this->load->view('admin/index',$a);
		
	}

	function showreporttoday() {
		$this->cek_aktif();
		$today=date('Y-m-d');
		//$today = $this->input->get('haritanggal');
		$bolu="bolu";
		$Djavamous="Djavamous";
		$ModernCake="ModernCake";
		$Mochi="Mochi";
		$Snack="Snack";
		$Cafe="Cafe";
		$Cookies="Cookies";
		$user=$this->session->userdata('admin_user');
		$a['debit_bca'] = $this->model_admin->tampil_trx_user_today_close_bca($today)->result();
		$a['debit_mandiri'] = $this->model_admin->tampil_trx_user_today_close_mandiri($today)->result();
		$a['close_debit'] = $this->model_admin->tampil_trx_user_today_close_debit($today)->result();

		$a['data'] = $this->model_master->tampil_kategorytoday($today,$bolu)->result_object();
		$a['dataDjavamous'] = $this->model_master->tampil_kategoryDjavamos($today,$Djavamous)->result_object();
		$a['dataModernCake'] = $this->model_master->tampil_kategoryModernCake($today,$ModernCake)->result_object();
		$a['dataMochi'] = $this->model_master->tampil_kategoryMochi($today,$Mochi)->result_object();
		$a['dataSnack'] = $this->model_master->tampil_kategorySnack($today,$Snack)->result_object();
		$a['dataCafe'] = $this->model_master->tampil_kategoryCafe($today,$Cafe)->result_object();
		$a['dataCookies'] = $this->model_master->tampil_kategoryCookies($today,$Cookies)->result_object();
		
		$a['totalTodayPenBakery']= $this->model_master->tampil_trxtodayBakery($today)->result();
		//$a['totalPendToday']= $this->model_master->tampil_trxsumtodayBakery($today)->result();
		$a['page'] = "master/penjualan/laporan-penjualan";
		$a['title'] = "Pendaptan by Kategori Produk";
		$this->load->view('admin/index',$a);


	}


	function showtrxpjAll() {
		$this->cek_aktif();
		$a['data'] = $this->model_master->tampil_trxpj()->result_object();
		$a['page'] = "master/penjualan/show-trxpj-all";
		$a['title'] = "Daftar Transaksi Penjualan Hari ini";
		$this->load->view('admin/index',$a);
	}
	
	
	function addtpj() {
		$this->cek_aktif();
		$trxid= mysql_fetch_array(mysql_query('SELECT * from as_sales_transactions order by trxID desc limit 1;'));
		$trxdate = $trxid['trxDate'];
		$invoiceID = $trxid['invoiceID'];
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
		
		$invno = "FKJ".date('m')."-".$invno;
		$a['trxid'] = $invno;
		$a['page'] = "master/penjualan/add";
		$a['title'] = "PENJUALAN";
		$this->load->view('admin/index',$a);
		
	}
	function addtpj_detail() {
		$this->cek_aktif();
		$invoiceID = $this->input->post('nofak');
		$tgltrx = $this->input->post('tgltrx');
		
		$pilihantrx = $this->input->post('pilihantrx');
		
		if($this->input->post('submit') == "member")
		{
			$idmember = $this->input->post('idmember');
			$trxid = $invoiceID;
			$idmember = $idmember;
			$a['member']= $this->model_master->tampil_member_id($idmember)->result();
			$tgltrx = $tgltrx;
			$a['page'] = "master/penjualan/add-member";
			$a['title'] = "PENJUALAN->MEMBER";
			redirect("admin/addtpj_memberdetail/?nofak=$trxid&idmember=$idmember&tgltrx=$tgltrx");
			// $this->load->view('admin/index',$a);
		}
		else if($this->input->post('submit') == "nonmember")
		{
			$a['trxid'] = $invoiceID;
			$a['tgltrx'] = $tgltrx;
			$a['page'] = "master/penjualan/add-2";
			$a['title'] = "PENJUALAN->Non MEMBER";
			$this->load->view('admin/index',$a);
		}
		else if($this->input->post('submit') == "proyek")
		{
			$idproyek = $this->input->post('idproyek');
			$trxid = $invoiceID;
			$idproyek = $idproyek;
			$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
			$tgltrx = $tgltrx;
			$a['page'] = "master/penjualan/add-proyek";
			$a['title'] = "PENJUALAN->Proyek";
			redirect("admin/addtpj_memberdetailproyek/?nofak=$trxid&idproyek=$idproyek&tgltrx=$tgltrx");
			// $this->load->view('admin/index',$a);
		}
	}
	

	function updatetpj_pry() {
		$this->cek_aktif();
			$idproyek = $this->input->get('idproyek');
			$nofak=$this->input->get('invoiceID');
			$tgltrx = $this->input->get('tgltrx');
			$a['page'] = "master/penjualan/add-proyek";
			$a['title'] = "PENJUALAN->Proyek";
			redirect("admin/addtpj_memberdetailproyekupdate/?nofak=$nofak&idproyek=$idproyek&tgltrx=$tgltrx");
	}
	
	function updatetpj_pry_finish() {
		$this->cek_aktif();
			$invoiceID=$this->input->get('invoiceID');
			$object = array(
										
						'isProyek_status' =>'0'
						);
								
			$this->db->where('invoiceID', $invoiceID);
			$this->db->update('as_sales_transactions', $object);
			redirect("admin/showtrxpjpryk");
			
	}
	
	function updatetpj_pry_koreksi() {
		$this->cek_aktif();
			$invoiceID=$this->input->get('invoiceID');
			$object = array(
										
						'isProyek_status' =>'1'
						);
								
			$this->db->where('invoiceID', $invoiceID);
			$this->db->update('as_sales_transactions', $object);
			redirect("admin/showtrxpjpryk");
			
	}
	
	function updatetpj_pry_finish_detail() {
		$this->cek_aktif();
							$invoiceID=$this->input->get('invoiceID');
							$a['nofak']= $invoiceID;
							$a['trx']= $this->model_master->tampilkan_transaksi($invoiceID)->result();
							$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
							$a['bahan_proyek']= $this->model_master->tampilkan_detailbahan__transaksi($invoiceID)->result();
							$a['title'] = "Detail Transaksi";
							$a['page'] = "master/penjualan/showtrx-pry-detail";
							$a['title'] = "PENJUALAN->Detail Transaksi";
							$this->load->view('admin/index',$a);
			
	}
	
	function addtpj_memberdetailproyekupdate() 
					{
						$this->cek_aktif();
						$identity=$this->session->userdata('identityID');
						$invoiceID = $this->input->get('nofak');
						$tgltrx = $this->input->get('tgltrx');
						$idproyek = $this->input->get('idproyek');
						$proyek = $this->input->get('proyek');
						$namamember = $this->input->post('namamember');
						$alamatkirim = $this->input->post('alamatkirim');
						$telpkirim = $this->input->post('telpkirim');
						$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
						$a['bahan_proyek']= $this->model_master->tampilkan_detailbahan__transaksi($invoiceID)->result();
						$a['trxid'] = $invoiceID;
						$a['idproyek'] = $idproyek;
						$a['tgltrx'] = $tgltrx;
						$a['namamember'] = $namamember;
						$a['alamatkirim'] = $alamatkirim;
						$a['telpkirim'] = $telpkirim;
						$productBarcode = $this->input->post('kdproduk');
						$qty = $this->input->post('qty');
						$data = $this->model_master->tampil_produk_id($productBarcode);

						if($this->input->post('submit') == "tambah")
						{
							$price=0;
							$detailprice=0;
							$discPercent=0;
							$satuan =$this->input->post('satuan');
							$detailbonus =$this->input->post('bonus');
							foreach($data->result() as $row)
							{

								$price = $row->productSalePrice;
								$prostok = $row->productStock;
								$productDiscounttype = $row->productDiscounttype;
								$discPercent = $row->productDiscount;
								$detailSubtotal =$price*$qty;
								if($productDiscounttype=="1")
								{
									$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
								}
								else
									if($productDiscounttype=="2")
									{
										$detailSubtotal=($detailSubtotal-$discPercent);
									}
									else
									{
										$detailSubtotal=$detailSubtotal;
									}
								}

								$object = array(
									'invoiceID' => $invoiceID,
									'productBarcode' => $productBarcode,
									'detailModal' => $price,
									'detailSubtotalModal' => $price,
									'detailPrice' => $price,
									'productSat' => $satuan,
									'detailQty' => $qty,
									'detailbonus' =>$detailbonus,
									'discPercent' => $discPercent,
									'discTotal' => $detailprice,
									'detailSubtotal' => $detailSubtotal,
									'createdDate' => $tgltrx
									);
								$this->db->insert('as_sales_detail_transactions', $object); 
								$stokpro=($prostok)-($qty);
								$object = array(
									'productStock' => $stokpro
									);
								$this->db->where('productBarcode', $productBarcode);
								$this->db->update('as_products', $object); 
								$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
								$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
								$a['idproyek']= $proyek;
								$a['page'] = "master/penjualan/add-proyekr_detail_update";
								$a['title'] = "PENJUALAN->MEMBER->Transaksi";
								$a['zona'] = $this->model_master->tampil_zona()->result_object();
								$this->load->view('admin/index',$a);
							}
							else if($this->input->post('submit') == "tambah_bahan"){
								// var_dump("<pre>");
								// var_dump($_GET);
								// var_dump($_POST);
								$bahanID =  $this->input->post('keybahan');
								$qtybahan =  $this->input->post('qtybahan');
								$stokgudangbahan =  $this->input->post('stokgudangbahan');
								$bahanBuyPrice =  $this->input->post('bahanBuyPrice');
								$price = $qtybahan * $bahanBuyPrice;
								$object = array(
									'invoiceID' => $invoiceID,
									'bahanBarcode' => $this->input->post('bahanBarcode'),
									'detailSubtotalModal' => $price,
									'detailPrice' => $price,
									'bahanSat' => $this->input->post('satuanbahan'),
									'detailQty' =>$qtybahan,
									'createdDate' => $tgltrx
									);

								$this->db->insert('as_sales_bahan_detail_transactions', $object);
								$object_bahan = array(
									'bahanStock' => $stokgudangbahan - $qtybahan
									);
								$this->db->where('bahanID', $bahanID);
								$this->db->update('as_bahan', $object_bahan); 

								$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
								$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
								$a['bahan_proyek']= $this->model_master->tampilkan_detailbahan__transaksi($invoiceID)->result();
								$a['idproyek']= $proyek;
								$a['page'] = "master/penjualan/add-proyekr_detail_update";
								$a['title'] = "PENJUALAN->MEMBER->Transaksi";
								$a['zona'] = $this->model_master->tampil_zona()->result_object();
								$this->load->view('admin/index',$a);
							}
							else if($this->input->post('submit') == "edittrx")
							{

								$ideditpro = $this->input->post('ideditpro');
								$qtypro = $this->input->post('qtypro');
								$bonus = $this->input->post('bonus');
								$productbarcode = $this->input->post('productbarcode');
								$dataup = $this->model_master->tampil_produk_id($productbarcode);
								foreach($dataup->result() as $row)
								{

									$price = $row->productSalePrice;
									$productDiscounttype = $row->productDiscounttype;
									$discPercent = $row->productDiscount;
									$detailSubtotal =$price*$qtypro;
									if($productDiscounttype=="1")
									{
										$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
									}
									else
										if($productDiscounttype=="2")
										{
											$detailSubtotal=($detailSubtotal-$discPercent);
										}
										else
										{
											$detailSubtotal=$detailSubtotal;
										}
									}
									$data = array (
										'detailQty'  => $qtypro,
										'detailSubtotal' => $detailSubtotal,
										'detailbonus' => $bonus

										);
									$this->db->where('detailID', $ideditpro);
									$this->db->update('as_sales_detail_transactions', $data);
									$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
									$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
									$a['proyek']= $proyek;
									$a['page'] = "master/penjualan/add-proyekr_detail_update";
									$a['title'] = "PENJUALAN->MEMBER->Transaksi";
									$a['zona'] = $this->model_master->tampil_zona()->result_object();
									$this->load->view('admin/index',$a);
								}
								else if($this->input->post('submit') == 'selesaitrx')
								{
									$memberID= $this->input->get('idmember');
									$idproyek=$this->input->get('idproyek');
									$a['proyek']= $proyek;
									$invoiceID= $this->input->post('nofak');
									$trxFullName=$this->input->post('namamember');
									$trxFullNamesave=$this->input->post('namamember2');
									$trxAddress= $alamatkirim;
									$trxPhone =$telpkirim;
									$nopo =$this->input->post('nopo');
									$sales =$this->input->post('salestrp');
									$driver = $this->input->post('driver');
									$zona = $this->input->post('zona');
									$jeniskend =$this->input->post('jeniskend');
									$nopol = $this->input->post('nopol');
									$trxDate = date('Y-m-d');
									$trxTotalModal = $this->input->post('harga');
									$trxTotalModalnum = intval(preg_replace('/[^\d.]/', '', $trxTotalModal));
									$trxSubtotal = $this->input->post('subtotal');
									$trxSubtotalnum = intval(preg_replace('/[^\d.]/', '', $trxSubtotal));
									$trxTotal = $this->input->post('total');
									$trxTotalnum = intval(preg_replace('/[^\d.]/', '', $trxTotal));
									$trxPay = $this->input->post('bayar');
									$trxPaynum = intval(preg_replace('/[^\d.]/', '', $trxPay));
									$trxChange = $this->input->post('kembali');
									$trxChangenum = intval(preg_replace('/[^\d.]/', '', $trxChange));
									$trxStatus = $this->input->post('tipebayar');
									$trxTerminDate = $this->input->post('terminpjdate');
									$trxbankmethod = $this->input->post('banktipe');
									$trxpayno = $this->input->post('bankno');
									$object = array(
										
										'invoiceID' => $invoiceID,
										'trxDate' => $trxDate,
										'trxTotalModal' => $trxTotalModalnum,
										'trxSubtotal' => $trxSubtotalnum,
										'trxTotal' => $trxTotalnum,
										'trxPay' => $trxPaynum,
										'trxChange' => $trxChangenum,
										'trxStatus' => $trxStatus,
										'trxTerminDate' => $trxTerminDate,
										'trxbankmethod' => $trxbankmethod,
										'trxpayno' => $trxpayno
										);
								
									$this->db->where('invoiceID', $invoiceID);
									$this->db->update('as_sales_transactions', $object); 
									if($trxStatus=="2")
									{
										$object = array(
											'invoiceID' => $invoiceID,
											'status' => "1",
											'createdDate' => $trxDate
											);
										$this->db->insert('as_receivables', $object); 
									}

									redirect("admin/showtrxpjpryk");


								}
								else
								{

									$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
									$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
									$a['total']= 0;
									$a['page'] = "master/penjualan/add-proyekr_detail_update";
									$a['title'] = "PENJUALAN->proyek->Transaksi";
									$a['zona'] = $this->model_master->tampil_zona()->result_object();
									$this->load->view('admin/index',$a);
								}

							}
	
	function addtpj_memberdetail() 
	{
		$this->cek_aktif();
		$identity=$this->session->userdata('identityID');
		$invoiceID = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$idmember = $this->input->get('idmember');
		$namamember = $this->input->post('namamember');
		$alamatkirim = $this->input->post('alamatkirim');
		$telpkirim = $this->input->post('telpkirim');
		$a['member']= $this->model_master->tampil_member_id($idmember)->result();
		$a['trxid'] = $invoiceID;
		$a['memberid'] = $idmember;
		$a['tgltrx'] = $tgltrx;
		$a['namamember'] = $namamember;
		$a['alamatkirim'] = $alamatkirim;
		$a['telpkirim'] = $telpkirim;
		$productBarcode = $this->input->post('kdproduk');
		$qty = $this->input->post('qty');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		if($this->input->post('submit') == "tambah")
		{
			$price=0;
			$detailprice=0;
			$discPercent=0;
			$satuan =$this->input->post('satuan');
			$detailbonus =$this->input->post('bonus');
			foreach($data->result() as $row)
			{

				$price = $row->productSalePrice;
				$prostok = $row->productStock;
				$productDiscounttype = $row->productDiscounttype;
				$discPercent = $row->productDiscount;
				$detailSubtotal =$price*$qty;
				if($productDiscounttype=="1")
				{
					$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
				}
				else
					if($productDiscounttype=="2")
					{
						$detailSubtotal=($detailSubtotal-$discPercent);
					}
					else
					{
						$detailSubtotal=$detailSubtotal;
					}
				}

				$object = array(
					'invoiceID' => $invoiceID,
					'productBarcode' => $productBarcode,
					'detailModal' => $price,
					'detailSubtotalModal' => $price,
					'detailPrice' => $price,
					'productSat' => $satuan,
					'detailQty' => $qty,
					'detailbonus' =>$detailbonus,
					'discPercent' => $discPercent,
					'discTotal' => $detailprice,
					'detailSubtotal' => $detailSubtotal,
					'createdDate' => $tgltrx
					);
				$this->db->insert('as_sales_detail_transactions', $object); 
				$stokpro=($prostok)-($qty);
				$object = array(
					'productStock' => $stokpro
					);
				$this->db->where('productBarcode', $productBarcode);
				$this->db->update('as_products', $object); 
				$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
				$a['member']= $this->model_master->tampil_member_id($idmember)->result();
				$a['page'] = "master/penjualan/add-member_detail";
				$a['title'] = "PENJUALAN->MEMBER->Transaksi";
				$a['zona'] = $this->model_master->tampil_zona()->result_object();
				$this->load->view('admin/index',$a);
			}
			else if($this->input->post('submit') == "edittrx")
			{

				$ideditpro = $this->input->post('ideditpro');
				$qtypro = $this->input->post('qtypro');
				$bonus = $this->input->post('bonus');
				$productbarcode = $this->input->post('productbarcode');
				$dataup = $this->model_master->tampil_produk_id($productbarcode);
				foreach($dataup->result() as $row)
				{

					$price = $row->productSalePrice;
					$productDiscounttype = $row->productDiscounttype;
					$discPercent = $row->productDiscount;
					$detailSubtotal =$price*$qtypro;
					if($productDiscounttype=="1")
					{
						$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
					}
					else
						if($productDiscounttype=="2")
						{
							$detailSubtotal=($detailSubtotal-$discPercent);
						}
						else
						{
							$detailSubtotal=$detailSubtotal;
						}
					}
					$data = array (
						'detailQty'  => $qtypro,
						'detailSubtotal' => $detailSubtotal,
						'detailbonus' => $bonus

						);
					$this->db->where('detailID', $ideditpro);
					$this->db->update('as_sales_detail_transactions', $data);
					$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
					$a['member']= $this->model_master->tampil_member_id($idmember)->result();
					$a['page'] = "master/penjualan/add-member_detail";
					$a['title'] = "PENJUALAN->MEMBER->Transaksi";
					$a['zona'] = $this->model_master->tampil_zona()->result_object();
					$this->load->view('admin/index',$a);
				}
				else if($this->input->post('submit') == 'selesaitrx')
				{
					$identityID=$this->session->userdata('identityID');
					$userID=$this->session->userdata('admin_user');
					$memberID= $this->input->get('idmember');
					$invoiceID= $this->input->post('nofak');
					$trxFullName=$this->input->post('namamember');
					$trxFullNamesave=$this->input->post('namamember2');
					$trxAddress= $alamatkirim;
					$trxPhone =$telpkirim;
					$nopo =$this->input->post('nopo');
					$sales =$this->input->post('salestrp');
					$driver = $this->input->post('driver');
					$zona = $this->input->post('zona');
					$jeniskend =$this->input->post('jeniskend');
					$nopol = $this->input->post('nopol');
					$trxDate = date('Y-m-d');
					$trxTotalModal = $this->input->post('harga');
					$trxTotalModalnum = intval(preg_replace('/[^\d.]/', '', $trxTotalModal));
					$trxSubtotal = $this->input->post('subtotal');
					$trxSubtotalnum = intval(preg_replace('/[^\d.]/', '', $trxSubtotal));
					$trxTotal = $this->input->post('total');
					$trxTotalnum = intval(preg_replace('/[^\d.]/', '', $trxTotal));
					$trxPay = $this->input->post('bayar');
					$trxPaynum = intval(preg_replace('/[^\d.]/', '', $trxPay));
					$trxChange = $this->input->post('kembali');
					$trxChangenum = intval(preg_replace('/[^\d.]/', '', $trxChange));
					$trxStatus = $this->input->post('tipebayar');
					$trxTerminDate = $this->input->post('terminpjdate');
					$trxbankmethod = $this->input->post('banktipe');
					$trxpayno = $this->input->post('bankno');
					$object = array(
						'identityID' => $identityID,
						'userID' => $userID,
						'memberID' => $memberID,
						'invoiceID' => $invoiceID,
						'trxFullName' => $trxFullName,
						'trxAddress' => $trxAddress,
						'trxPhone' => $trxPhone,
						'trxDate' => $trxDate,
						'trxTotalModal' => $trxTotalModalnum,
						'trxSubtotal' => $trxSubtotalnum,
						'trxTotal' => $trxTotalnum,
						'trxPay' => $trxPaynum,
						'trxnopo' => $nopo,
						'trxsales' => $sales,
						'trxdriver' => $driver,
						'trxzone' => $zona,
						'trxcartype' => $jeniskend,
						'trxcarno' => $nopol,
						'trxChange' => $trxChangenum,
						'trxStatus' => $trxStatus,
						'trxTerminDate' => $trxTerminDate,
						'trxbankmethod' => $trxbankmethod,
						'isPosting_status' => 0,
						'trxpayno' => $trxpayno
						);
					$this->db->insert('as_sales_transactions', $object); 
					if($trxStatus=="2")
					{
						$object = array(
							'invoiceID' => $invoiceID,
							'status' => "1",
							'createdDate' => $trxDate
							);
						$this->db->insert('as_receivables', $object); 
					}

					$a['perusahaan']= $this->model_perusahaan->tampil_data()->result();
					$a['nofak']= $invoiceID;
					$a['member']= $trxFullName;
					$a['trxAddress']= $trxAddress;
					$a['trxPhone']= $trxPhone;
					$a['jeniskend']= $jeniskend;
					$a['nopol']= $nopol;
					$a['nopo']= $nopo;
					$a['termin']= $trxTerminDate;
					$a['sales']= $sales;
					$a['driver']= $driver;
					$a['zona']= $zona;
					$a['tgltrx']= $tgltrx;
					$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
					$a['title'] = "Detail Transaksi";
					$a['total']= $trxTotal;
					$a['page'] = "master/penjualan/showtrx";
					$a['title'] = "PENJUALAN->MEMBER->Transaksi";
					$this->load->view('admin/index',$a);


				}
				else
				{

					$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
					$a['member']= $this->model_master->tampil_member_id($idmember)->result();
					$a['total']= 0;
					$a['page'] = "master/penjualan/add-member_detail";
					$a['title'] = "PENJUALAN->MEMBER->Transaksi";
					$a['zona'] = $this->model_master->tampil_zona()->result_object();
					$this->load->view('admin/index',$a);
				}

			}


			function addtpj_nonmemberdetail() 
			{
				$this->cek_aktif();
				$identity=$this->session->userdata('identityID');
				$invoiceID = $this->input->get('nofak');
				$tgltrx = $this->input->get('tgltrx');
				$a['trxid'] = $invoiceID;
				$a['tgltrx'] = $tgltrx;
				$a['pembeli'] = $this->input->post('namamember');
				$a['alamatkirim'] = $this->input->post('alamatkirim');
				$a['telpkirim'] = $this->input->post('telpkirim');
				$productBarcode = $this->input->post('kdproduk');
				$qty = $this->input->post('qty');
				$data = $this->model_master->tampil_produk_id($productBarcode);
				if($this->input->post('submit') == "tambah")
				{
					$price=0;
					$detailprice=0;
					$discPercent=0;
					$satuan =$this->input->post('satuan');
					$detailbonus =$this->input->post('bonus');
					foreach($data->result() as $row)
					{

						$price = $row->productSalePrice;
						$prostok = $row->productStock;
						$productDiscounttype = $row->productDiscounttype;
						$discPercent = $row->productDiscount;
						$detailSubtotal =$price*$qty;
						if($productDiscounttype=="1")
						{
							$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
						}
						else
							if($productDiscounttype=="2")
							{
								$detailSubtotal=($detailSubtotal-$discPercent);
							}
							else
							{
								$detailSubtotal=$detailSubtotal;
							}
						}

						$object = array(
							'invoiceID' => $invoiceID,
							'productBarcode' => $productBarcode,
							'detailModal' => $price,
							'detailSubtotalModal' => $price,
							'detailPrice' => $price,
							'productSat' => $satuan,
							'detailQty' => $qty,
							'detailbonus' =>$detailbonus,
							'discPercent' => $discPercent,
							'discTotal' => $detailprice,
							'detailSubtotal' => $detailSubtotal,
							'createdDate' => $tgltrx
							);
						$this->db->insert('as_sales_detail_transactions', $object); 
						$stokpro=($prostok)-($qty);
						$object = array(
							'productStock' => $stokpro
							);
						$this->db->where('productBarcode', $productBarcode);
						$this->db->update('as_products', $object); 
						$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
						$a['page'] = "master/penjualan/add-nonmember_detail";
						$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
						$a['zona'] = $this->model_master->tampil_zona()->result_object();
						$this->load->view('admin/index',$a);
					}
					else if($this->input->post('submit') == "edittrx")
					{

						$ideditpro = $this->input->post('ideditpro');
						$qtypro = $this->input->post('qtypro');
						$bonus = $this->input->post('bonus');
						$productbarcode = $this->input->post('productbarcode');
						$dataup = $this->model_master->tampil_produk_id($productbarcode);
						foreach($dataup->result() as $row)
						{

							$price = $row->productSalePrice;
							$productDiscounttype = $row->productDiscounttype;
							$discPercent = $row->productDiscount;
							$detailSubtotal =$price*$qtypro;
							if($productDiscounttype=="1")
							{
								$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
							}
							else
								if($productDiscounttype=="2")
								{
									$detailSubtotal=($detailSubtotal-$discPercent);
								}
								else
								{
									$detailSubtotal=$detailSubtotal;
								}
							}
							$data = array (
								'detailQty'  => $qtypro,
								'detailSubtotal' => $detailSubtotal,
								'detailbonus' => $bonus

								);
							$this->db->where('detailID', $ideditpro);
							$this->db->update('as_sales_detail_transactions', $data);
							$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
							$a['page'] = "master/penjualan/add-nonmember_detail";
							$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
							$a['zona'] = $this->model_master->tampil_zona()->result_object();
							$this->load->view('admin/index',$a);
						}
						else if($this->input->post('submit') == 'selesaitrx')
						{
							$memberID= "01";
							$identityID=$this->session->userdata('identityID');
							$userID=$this->session->userdata('admin_user');
							$invoiceID= $this->input->post('nofak');
							$trxFullNamesave=$this->input->post('namamember');
							$trxAddress= $this->input->post('alamatkirim');
							$trxPhone =$this->input->post('telpkirim');
							$nopo =$this->input->post('nopo');
							$sales =$this->input->post('salestrp');
							$zona =$this->input->post('zona');
							$driver = $this->input->post('driver');
							$zona = $this->input->post('zona');
							$jeniskend =$this->input->post('jeniskend');
							$nopol = $this->input->post('nopol');
							$trxDate = date('Y-m-d');
							$trxTotalModal = $this->input->post('harga');
							$trxTotalModalnum = intval(preg_replace('/[^\d.]/', '', $trxTotalModal));
							$trxSubtotal = $this->input->post('subtotal');
							$trxSubtotalnum = intval(preg_replace('/[^\d.]/', '', $trxSubtotal));
							$trxTotal = $this->input->post('total');
							$trxTotalnum = intval(preg_replace('/[^\d.]/', '', $trxTotal));
							$trxPay = $this->input->post('bayar');
							$trxPaynum = intval(preg_replace('/[^\d.]/', '', $trxPay));
							$trxChange = $this->input->post('kembali');
							$trxChangenum = intval(preg_replace('/[^\d.]/', '', $trxChange));
							$trxStatus = $this->input->post('tipebayar');
							$trxTerminDate = $this->input->post('terminpjdate');
							$trxbankmethod = $this->input->post('banktipe');
							$trxpayno = $this->input->post('bankno');
							$object = array(
								'identityID' => $identityID,
								'userID' => $userID,
								'memberID' => $memberID,
								'invoiceID' => $invoiceID,
								'trxFullName' => $trxFullNamesave,
								'trxAddress' => $trxAddress,
								'trxPhone' => $trxPhone,
								'trxDate' => $trxDate,
								'trxTotalModal' => $trxTotalModalnum,
								'trxSubtotal' => $trxSubtotalnum,
								'trxTotal' => $trxTotalnum,
								'trxPay' => $trxPaynum,
								'trxnopo' => $nopo,
								'trxsales' => $sales,
								'trxdriver' => $driver,
								'trxzone' => $zona,
								'trxcartype' => $jeniskend,
								'trxcarno' => $nopol,
								'trxChange' => $trxChangenum,
								'trxStatus' => $trxStatus,
								'trxTerminDate' => $trxTerminDate,
								'trxbankmethod' => $trxbankmethod,
								'isPosting_status' => 0,
								'trxpayno' => $trxpayno
								);
							$this->db->insert('as_sales_transactions', $object); 
							if($trxStatus=="2")
							{
								$object = array(
									'invoiceID' => $invoiceID,
									'status' => "1",
									'createdDate' => $trxDate
									);
								$this->db->insert('as_receivables', $object); 
							}

							$a['perusahaan']= $this->model_perusahaan->tampil_data()->result();
							$a['nofak']= $invoiceID;
							$a['member']= $trxFullNamesave;
							$a['trxAddress']= $trxAddress;
							$a['trxPhone']= $trxPhone;
							$a['jeniskend']= $jeniskend;
							$a['nopol']= $nopol;
							$a['nopo']= $nopo;
							$a['termin']= $trxTerminDate;
							$a['sales']= $sales;
							$a['driver']= $driver;
							$a['zona']= $zona;
							$a['tgltrx']= $tgltrx;
							$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
							$a['title'] = "Detail Transaksi";
							$a['total']= $trxTotal;
							$a['page'] = "master/penjualan/showtrx";
							$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
							$this->load->view('admin/index',$a);


						}
						else
						{

							$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
							$a['total']= 0;
							$a['page'] = "master/penjualan/add-nonmember_detail";
							$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
							$a['zona'] = $this->model_master->tampil_zona()->result_object();
							$this->load->view('admin/index',$a);
						}

					}



					function addtpj_memberdetailproyek() 
					{
						$this->cek_aktif();
						$invoiceID = $this->input->get('nofak');
						$tgltrx = $this->input->get('tgltrx');
						$idproyek = $this->input->get('idproyek');
						$proyek = $this->input->get('proyek');
						$namamember = $this->input->post('namamember');
						$alamatkirim = $this->input->post('alamatkirim');
						$telpkirim = $this->input->post('telpkirim');
						$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
						$a['bahan_proyek']= $this->model_master->tampilkan_detailbahan__transaksi($invoiceID)->result();
						$a['trxid'] = $invoiceID;
						$a['idproyek'] = $idproyek;
						$a['tgltrx'] = $tgltrx;
						$a['namamember'] = $namamember;
						$a['alamatkirim'] = $alamatkirim;
						$a['telpkirim'] = $telpkirim;
						$productBarcode = $this->input->post('kdproduk');
						$qty = $this->input->post('qty');
						$data = $this->model_master->tampil_produk_id($productBarcode);

						if($this->input->post('submit') == "tambah")
						{
							$price=0;
							$detailprice=0;
							$discPercent=0;
							$satuan =$this->input->post('satuan');
							$detailbonus =$this->input->post('bonus');
							foreach($data->result() as $row)
							{

								$price = $row->productSalePrice;
								$prostok = $row->productStock;
								$productDiscounttype = $row->productDiscounttype;
								$discPercent = $row->productDiscount;
								$detailSubtotal =$price*$qty;
								if($productDiscounttype=="1")
								{
									$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
								}
								else
									if($productDiscounttype=="2")
									{
										$detailSubtotal=($detailSubtotal-$discPercent);
									}
									else
									{
										$detailSubtotal=$detailSubtotal;
									}
								}

								$object = array(
									'invoiceID' => $invoiceID,
									'productBarcode' => $productBarcode,
									'detailModal' => $price,
									'detailSubtotalModal' => $price,
									'detailPrice' => $price,
									'productSat' => $satuan,
									'detailQty' => $qty,
									'detailbonus' =>$detailbonus,
									'discPercent' => $discPercent,
									'discTotal' => $detailprice,
									'detailSubtotal' => $detailSubtotal,
									'createdDate' => $tgltrx
									);
								$this->db->insert('as_sales_detail_transactions', $object); 
								$stokpro=($prostok)-($qty);
								$object = array(
									'productStock' => $stokpro
									);
								$this->db->where('productBarcode', $productBarcode);
								$this->db->update('as_products', $object); 
								$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
								$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
								$a['idproyek']= $proyek;
								$a['page'] = "master/penjualan/add-proyekr_detail";
								$a['title'] = "PENJUALAN->MEMBER->Transaksi";
								$a['zona'] = $this->model_master->tampil_zona()->result_object();
								$this->load->view('admin/index',$a);
							}
							else if($this->input->post('submit') == "tambah_bahan"){
								// var_dump("<pre>");
								// var_dump($_GET);
								// var_dump($_POST);
								$bahanID =  $this->input->post('keybahan');
								$qtybahan =  $this->input->post('qtybahan');
								$stokgudangbahan =  $this->input->post('stokgudangbahan');
								$bahanBuyPrice =  $this->input->post('bahanBuyPrice');
								$price = $qtybahan * $bahanBuyPrice;
								$object = array(
									'invoiceID' => $invoiceID,
									'bahanBarcode' => $this->input->post('bahanBarcode'),
									'detailSubtotalModal' => $price,
									'detailPrice' => $price,
									'bahanSat' => $this->input->post('satuanbahan'),
									'detailQty' =>$qtybahan,
									'createdDate' => $tgltrx
									);

								$this->db->insert('as_sales_bahan_detail_transactions', $object);
								$object_bahan = array(
									'bahanStock' => $stokgudangbahan - $qtybahan
									);
								$this->db->where('bahanID', $bahanID);
								$this->db->update('as_bahan', $object_bahan); 

								$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
								$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
								$a['bahan_proyek']= $this->model_master->tampilkan_detailbahan__transaksi($invoiceID)->result();
								$a['idproyek']= $proyek;
								$a['page'] = "master/penjualan/add-proyekr_detail";
								$a['title'] = "PENJUALAN->MEMBER->Transaksi";
								$a['zona'] = $this->model_master->tampil_zona()->result_object();
								$this->load->view('admin/index',$a);
							}
							else if($this->input->post('submit') == "edittrx")
							{

								$ideditpro = $this->input->post('ideditpro');
								$qtypro = $this->input->post('qtypro');
								$bonus = $this->input->post('bonus');
								$productbarcode = $this->input->post('productbarcode');
								$dataup = $this->model_master->tampil_produk_id($productbarcode);
								foreach($dataup->result() as $row)
								{

									$price = $row->productSalePrice;
									$productDiscounttype = $row->productDiscounttype;
									$discPercent = $row->productDiscount;
									$detailSubtotal =$price*$qtypro;
									if($productDiscounttype=="1")
									{
										$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
									}
									else
										if($productDiscounttype=="2")
										{
											$detailSubtotal=($detailSubtotal-$discPercent);
										}
										else
										{
											$detailSubtotal=$detailSubtotal;
										}
									}
									$data = array (
										'detailQty'  => $qtypro,
										'detailSubtotal' => $detailSubtotal,
										'detailbonus' => $bonus

										);
									$this->db->where('detailID', $ideditpro);
									$this->db->update('as_sales_detail_transactions', $data);
									$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
									$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
									$a['proyek']= $proyek;
									$a['page'] = "master/penjualan/add-proyekr_detail";
									$a['title'] = "PENJUALAN->MEMBER->Transaksi";
									$a['zona'] = $this->model_master->tampil_zona()->result_object();
									$this->load->view('admin/index',$a);
								}
								else if($this->input->post('submit') == 'selesaitrx')
								{
									$memberID= $this->input->get('idmember');
									$idproyek=$this->input->get('idproyek');
									$a['proyek']= $proyek;
									$invoiceID= $this->input->post('nofak');
									$trxFullName=$this->input->post('namamember');
									$trxFullNamesave=$this->input->post('namamember2');
									$trxAddress= $alamatkirim;
									$trxPhone =$telpkirim;
									$nopo =$this->input->post('nopo');
									$sales =$this->input->post('salestrp');
									$driver = $this->input->post('driver');
									$zona = $this->input->post('zona');
									$jeniskend =$this->input->post('jeniskend');
									$nopol = $this->input->post('nopol');
									$trxDate = date('Y-m-d');
									$trxTotalModal = $this->input->post('harga');
									$trxTotalModalnum = intval(preg_replace('/[^\d.]/', '', $trxTotalModal));
									$trxSubtotal = $this->input->post('subtotal');
									$trxSubtotalnum = intval(preg_replace('/[^\d.]/', '', $trxSubtotal));
									$trxTotal = $this->input->post('total');
									$trxTotalnum = intval(preg_replace('/[^\d.]/', '', $trxTotal));
									$trxPay = $this->input->post('bayar');
									$trxPaynum = intval(preg_replace('/[^\d.]/', '', $trxPay));
									$trxChange = $this->input->post('kembali');
									$trxChangenum = intval(preg_replace('/[^\d.]/', '', $trxChange));
									$trxStatus = $this->input->post('tipebayar');
									$trxTerminDate = $this->input->post('terminpjdate');
									$trxbankmethod = $this->input->post('banktipe');
									$trxpayno = $this->input->post('bankno');
									$object = array(
										'memberID' => $memberID,
										'invoiceID' => $invoiceID,
										'trxFullName' => $trxFullNamesave,
										'trxAddress' => $trxAddress,
										'trxPhone' => $trxPhone,
										'trxDate' => $trxDate,
										'trxTotalModal' => $trxTotalModalnum,
										'trxSubtotal' => $trxSubtotalnum,
										'trxTotal' => $trxTotalnum,
										'trxPay' => $trxPaynum,
										'trxnopo' => $nopo,
										'trxsales' => $sales,
										'trxdriver' => $driver,
										'trxzone' => $zona,
										'trxcartype' => $jeniskend,
										'trxcarno' => $nopol,
										'trxChange' => $trxChangenum,
										'trxStatus' => $trxStatus,
										'trxTerminDate' => $trxTerminDate,
										'trxbankmethod' => $trxbankmethod,
										'trxpayno' => $trxpayno,
										'isProyek' => '1',
										'isProyek_status' =>'1',
										'proyekid' => $idproyek
										);
								
									$this->db->insert('as_sales_transactions', $object); 
									if($trxStatus=="2")
									{
										$object = array(
											'invoiceID' => $invoiceID,
											'status' => "1",
											'createdDate' => $trxDate
											);
										$this->db->insert('as_receivables', $object); 
									}

									$a['perusahaan']= $this->model_perusahaan->tampil_data()->result();
									$a['nofak']= $invoiceID;
									$a['member']= $trxFullName;
									$a['trxAddress']= $trxAddress;
									$a['trxPhone']= $trxPhone;
									$a['jeniskend']= $jeniskend;
									$a['nopol']= $nopol;
									$a['nopo']= $nopo;
									$a['termin']= $trxTerminDate;
									$a['sales']= $sales;
									$a['driver']= $driver;
									$a['zona']= $zona;
									$a['tgltrx']= $tgltrx;
									$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
									$a['title'] = "Detail Transaksi";
									$a['total']= $trxTotal;
									$a['page'] = "master/penjualan/showtrx";
									$a['title'] = "PENJUALAN->MEMBER->Transaksi";
									$this->load->view('admin/index',$a);


								}
								else
								{

									$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
									$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
									$a['total']= 0;
									$a['page'] = "master/penjualan/add-proyekr_detail";
									$a['title'] = "PENJUALAN->proyek->Transaksi";
									$a['zona'] = $this->model_master->tampil_zona()->result_object();
									$this->load->view('admin/index',$a);
								}

							}


							function addtpjtrx() {
								$this->cek_aktif();
								$identity=$this->session->userdata('identityID');
								$invoiceID = $this->input->post('nofak');
								$productBarcode = $this->input->post('kodeproduk');
								$detailModal = $this->input->post('qty');
								$detailSubtotalModal = $this->input->post('harga');
								$detailPrice = $this->input->post('harga');
								$detailQty = $this->input->post('qty');
								$discPercent = $this->input->post('disc');
								$discTotal = $this->input->post('totaldiscprice');
								$detailSubtotal = $this->input->post('total');
								$createdDate = $this->input->post('phone');

								$object = array(
									'invoiceID' => $invoiceID,
									'productBarcode' => $productBarcode,
									'detailModal' => $detailModal,
									'detailSubtotalModal' => $detailSubtotalModal,
									'detailPrice' => $detailPrice,
									'detailQty' => $detailQty,
									'discPercent' => $discPercent,
									'discTotal' => $discTotal,
									'detailSubtotal' => $detailSubtotal,
									'createdDate' => $createdDate
									);
								$this->db->insert('as_sales_detail_transactions', $object); 

								if(isset($_POST['submit']))
								{
									$this->model_master->save_trx_detail($trx);
									redirect('master/penjualan/addtpj');
								}
								else
								{

									$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
									$a['trxid'] = $trxDate.$trx;
									$a['page'] = "master/penjualan/add";
									$a['title'] = "PENJUALAN";
									$this->load->view('admin/index',$a);
								}
							}

							function addtpj_memberdetail_print() {
								$this->cek_aktif();
								$identity=$this->session->userdata('identityID');
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
								$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
								if($this->input->post('submit') == "trxprint")
								{
									$this->load->view('admin/master/penjualan/print-act',$a);
									$html = $this->output->get_output();
									$this->load->library('dompdf_gen');
									$this->dompdf->load_html($html);
									$this->dompdf->render();
									$this->dompdf->stream($invoiceID,array('Attachment'=>0));
									redirect('admin/addtpj');
								}

								else if($this->input->post('submit') == "trxdo")
								{
									$this->load->view('admin/master/penjualan/print-do',$a);
									$html = $this->output->get_output();
									$this->load->library('dompdf_gen');
									$this->dompdf->load_html($html);
									$this->dompdf->render();
									$this->dompdf->stream($invoiceID,array('Attachment'=>0));
								}
							}

							function pending() {
								$this->cek_aktif();
								$a['page'] = "master/penjualan/pending";
								$a['title'] = "Penjualan print";
								$this->load->view('admin/index',$a);
							}

							/* pembelian */
							function addtpm() {
								$this->cek_aktif();
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

								$invno = "FKB".date('m')."-".$invno;
								$invoiceID = $invno;
								$tgltrx =date('Y-m-d');
								$a['trxid'] = $invoiceID;
								$a['tgltrx'] = $tgltrx;
								$a['supplier'] = $this->input->post('supplier');
								$a['alamat'] = $this->input->post('alamat');
								$a['telp'] = $this->input->post('telp');
								$productBarcode = $this->input->post('kdproduk');
								$qty = $this->input->post('qty');
								$data = $this->model_master->tampil_bahan_id($productBarcode);
								$a['suplier']	= $this->model_master->tampil_suplier()->result_object();	
								if($this->input->post('submit') == "tambah")
								{
									$price=0;
									$detailprice=0;
									$discPercent=0;
									$satuan =$this->input->post('satuan');
									$detailbonus =$this->input->post('bonus');
									foreach($data->result() as $row)
									{

										$price = $row->bahanBuyPrice;
										$detailSubtotal =$price*$qty;
									
										}

										$object = array(
											'invoiceBuyID' => $invoiceID,
											'productBarcode' => $productBarcode,
											'detailBuyPrice' => $price,
											'detailBuyQty' => $qty,
											'detailBuySubtotal' => $detailBuySubtotal,
											'createdDate' => $tgltrx
											);
										$this->db->insert('as_buy_detail_transactions', $object); 
										$a['detail']= $this->model_master->tampilkan_detail_transaksi_buy($invoiceID)->result();
										$a['page'] = "master/pembelian/add";
										$a['title'] = "Purchasing Order";
										$this->load->view('admin/index',$a);
									}
									else if($this->input->post('submit') == "edittrx")
									{

										$ideditpro = $this->input->post('ideditpro');
										$qtypro = $this->input->post('qtypro');
										$bonus = $this->input->post('bonus');
										$productbarcode = $this->input->post('productbarcode');
										$dataup = $this->model_master->tampil_produk_id($productbarcode);
										foreach($dataup->result() as $row)
										{

											$price = $row->productSalePrice;
											$productDiscounttype = $row->productDiscounttype;
											$discPercent = $row->productDiscount;
											$detailSubtotal =$price*$qtypro;
											if($productDiscounttype=="1")
											{
												$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
											}
											else
												if($productDiscounttype=="2")
												{
													$detailSubtotal=($detailSubtotal-$discPercent);
												}
												else
												{
													$detailSubtotal=$detailSubtotal;
												}
											}
											$data = array (
												'detailQty'  => $qtypro,
												'detailSubtotal' => $detailSubtotal,
												'detailbonus' => $bonus

												);
											$this->db->where('detailID', $ideditpro);
											$this->db->update('as_buy_detail_transactions', $data);
											$a['detail']= $this->model_master->tampilkan_detail_transaksi_buy($invoiceID)->result();
											$a['page'] = "master/pembelian/add-nonmember_detail";
											$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
											$a['zona'] = $this->model_master->tampil_zona()->result_object();
											$this->load->view('admin/index',$a);
										}
										else if($this->input->post('submit') == 'selesaitrx')
										{
											$memberID= "01";
											$supplierID= $this->input->post('supplierID');
											$trxFullNamesave=$this->input->post('namamember2');
											$trxAddress= $this->input->post('alamatkirim');
											$trxPhone =$this->input->post('telpkirim');
											$sales =$this->input->post('salestrp');
											$salesphone = $this->input->post('salestrpphone');
											$zona = $this->input->post('zona');
											$jeniskend =$this->input->post('jeniskend');
											$nopol = $this->input->post('nopol');
											$trxDate = date('Y-m-d');
											$nopo =$this->input->post('nopo');
											$trxTotalModal = $this->input->post('harga');
											$trxTotalModalnum = intval(preg_replace('/[^\d.]/', '', $trxTotalModal));
											$trxSubtotal = $this->input->post('subtotal');
											$trxSubtotalnum = intval(preg_replace('/[^\d.]/', '', $trxSubtotal));
											$trxTotal = $this->input->post('total');
											$trxTotalnum = intval(preg_replace('/[^\d.]/', '', $trxTotal));
											$trxPay = $this->input->post('bayar');
											$trxPaynum = intval(preg_replace('/[^\d.]/', '', $trxPay));
											$trxChange = $this->input->post('kembali');
											$trxChangenum = intval(preg_replace('/[^\d.]/', '', $trxChange));
											$trxStatus = $this->input->post('tipebayar');
											$trxTerminDate = $this->input->post('terminpjdate');
											$trxbankmethod = $this->input->post('banktipe');
											$trxpayno = $this->input->post('bankno');
											$object = array(
												'supplierID' => $supplierID,
												'invoiceBuyID' => $invoiceID,
												'trxFullName' => $trxFullNamesave,
												'trxAddress' => $trxAddress,
												'trxPhone' => $trxPhone,
												'trxDate' => $trxDate,
												// 'trxTotalModal' => $trxTotalModalnum,
												'trxSubtotal' => $trxSubtotalnum,
												'trxTotal' => $trxTotalnum,
												// 'trxPay' => $trxPaynum,
												// 'trxsales' => $sales,
												// 'trxsalesphone' => $salesphone,
												// 'trxzone' => $zona,
												// 'trxcartype' => $jeniskend,
												// 'trxcarno' => $nopol,
												// 'trxChange' => $trxChangenum,
												'trxStatus' => $trxStatus,
												'trxTerminDate' => $trxTerminDate,
												// 'trxbankmethod' => $trxbankmethod,
												// 'trxpayno' => $trxpayno
												);
											$this->db->insert('as_buy_transactions', $object);   
											if($trxStatus=="2")
											{
												$object = array(
													'invoiceID' => $invoiceID,
													'status' => "1",
													'createdDate' => $trxDate
													);
												$this->db->insert('as_receivables', $object); 
											}

											$a['perusahaan']= $this->model_perusahaan->tampil_data()->result();
											$a['nofak']= $invoiceID;
											$a['member']= $trxFullNamesave;
											$a['trxAddress']= $trxAddress;
											$a['jeniskend']= $jeniskend;
											$a['nopol']= $nopol;
											$a['termin']= $trxTerminDate;
											$a['sales']= $sales;
											$a['nopo']= $nopo;
											$a['zona']= $zona;
											$a['tgltrx']= $tgltrx;
											$a['detail']= $this->model_master->tampilkan_detail_transaksi_buy($invoiceID)->result();
											// echo $this->db->last_query();
											$a['title'] = "Detail Transaksi";
											$a['total']= $trxTotal;
											$a['page'] = "master/pembelian/showtrx";
											$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
											$this->load->view('admin/index',$a);


										}
										else
										{

											$a['detail']= $this->model_master->tampilkan_detail_transaksi_buy($invoiceID)->result();
											$a['total']= 0;
											$a['trxid'] = $invno;
											$a['page'] = "master/pembelian/add";
											$a['title'] = "Purchasing Order";
											$this->load->view('admin/index',$a);
										}


									}

									/* retur */
									function addtrt() {
										$this->cek_aktif();
										$a['page'] = "master/retur/add";
										$a['title'] = "PEMBELIAN";
										$this->load->view('admin/index',$a);
									}

									/* Stock Opname */
									function so() {
										$this->cek_aktif();
										$a['page'] = "master/so/so";
										$a['title'] = "Stock Opname";
										$this->load->view('admin/index',$a);
									}

									function addso() {
										$this->cek_aktif();
										$a['page'] = "master/so/add";
										$a['title'] = "Tambah Stock Opname";
										$this->load->view('admin/index',$a);
									}

									/* barcode */
									function barcode() {
										$this->cek_aktif();
										$a['data'] = $this->model_master->get_barcode()->result_object();
										$a['page'] = "master/barcode/barcode";
										$a['title'] = "Cetak Barcode";
										$this->load->view('admin/index',$a);
									}

									/* -------------keuangan-------------- */
									/* anggaran */
									function anggaran() {
										$this->cek_aktif();
										$a['page'] = "master/keuangan/anggaran/anggaran";
										$a['title'] = "Manajemen Anggaran";
										$this->load->view('admin/index',$a);
									}

									/* kartu hutang */
									function khutang() {
										$this->cek_aktif();
										if (isset($_POST['display'])){
											$date=$_POST['date'];
											$date=explode('-',$date);
											$start=date("Y-m-d",strtotime($date[0]));
											$end=date("Y-m-d",strtotime($date[1]));
											$a['khutang']= $this->model_master->tampil_khutang_tgl($start,$end)->result();
											$a['page'] = "master/keuangan/khutang/khutang_tgl";
											$a['title'] = "Kartu Hutang";
											$this->load->view('admin/index',$a);
										}else{
											$a['khutang']= $this->model_master->tampil_khutang()->result();
											$a['page'] = "master/keuangan/khutang/khutang";
											$a['title'] = "Kartu Hutang";
											$this->load->view('admin/index',$a);
										}
									}
									
									function khutang_save() {
										$paydate=date('Y-m-d');
										$idpiutang= $this->input->post('idpiutang');
										$bayarsisa=$this->input->post('bayarsisa');
										$keterangan=$this->input->post('keterangan');
										$object = array(
													'debtID' => $idpiutang,
													'createdDate' =>$paydate,
													'debtPay' => $bayarsisa,
													'keterangan' => $keterangan
													);
												$this->db->insert('as_debts_payment', $object); 
										redirect('admin/khutang');
									}
									
									
									function khutang_save_detail() {
										$debtID = $this->input->get('idpiutang');
										$totalbayar = $this->input->get('totalbayar');
										$konsumen = $this->input->get('konsumen');
										$sisabayar = $this->input->get('sisabayar');
										$invoice = $this->input->get('invoice');
										$dp = $this->input->get('dp');
										$a['sisabayar']= $sisabayar;
										$a['konsumen']= $konsumen;
										$a['invoice']= $invoice;
										$a['totalbayar']= $totalbayar;
										$a['dp']= $dp;
										$a['kpiutang']= $this->model_master->tampil_hutang_detail($debtID)->result();
										$a['page'] = "master/keuangan/khutang/khutang-detail";
										$a['title'] = "Kartu Hutang";
										$this->load->view('admin/index',$a);
									}

									function kpiutang() {
										$this->cek_aktif();
										$identity=$this->session->userdata('identityID');
										if (isset($_POST['display'])){
											$date=$_POST['date'];
											$date=explode('-',$date);
											$start=date("Y-m-d",strtotime($date[0]));
											$end=date("Y-m-d",strtotime($date[1]));
											$a['kpiutang']= $this->model_master->tampil_kpiutang_tgl($start,$end)->result();
											$a['page'] = "master/keuangan/kpiutang/kpiutang_tgl";
											$a['title'] = "Kartu Piutang";
											$this->load->view('admin/index',$a);
										}else{
											$a['kpiutang']= $this->model_master->tampil_kpiutang($identity)->result();
											$a['page'] = "master/keuangan/kpiutang/kpiutang";
											$a['kpiutang_jml']= $this->model_master->tampil_kpiutang_jml()->result();
											$a['kpiutang_total']= $this->model_master->tampil_kpiutang_total()->result();
											$a['title'] = "Kartu Piutang";
											$this->load->view('admin/index',$a);
										}
									}
									
									function kpiutang_save_detail() {
										$this->cek_aktif();
										$receivableID = $this->input->get('idpiutang');
										$totalbayar = $this->input->get('totalbayar');
										$konsumen = $this->input->get('konsumen');
										$sisabayar = $this->input->get('sisabayar');
										$invoice = $this->input->get('invoice');
										$dp = $this->input->get('dp');
										$a['sisabayar']= $sisabayar;
										$a['konsumen']= $konsumen;
										$a['invoice']= $invoice;
										$a['totalbayar']= $totalbayar;
										$a['dp']= $dp;
										$a['kpiutang']= $this->model_master->tampil_kpiutang_detail($receivableID)->result();
										$a['page'] = "master/keuangan/kpiutang/kpiutang-detail";
										$a['title'] = "Kartu Piutang";
										$this->load->view('admin/index',$a);
									}
									
									function kpiutang_save() {
										$this->cek_aktif();
										$idpiutang= $this->input->post('idpiutang');
										$bayarsisa=$this->input->post('bayarsisa');
										$object = array(
													'receivableID' => $idpiutang,
													'receivablePay' => $bayarsisa
													);
												$this->db->insert('as_receivables_payment', $object); 
										redirect('admin/kpiutang');
									}

									/* coa */
									function coa() {
										$this->cek_aktif();
										$a['page'] = "master/keuangan/coa/coa";
										$a['title'] = "Kode Akun";
										$this->load->view('admin/index',$a);
									}

									function addcoa() {
										$this->cek_aktif();
										$a['page'] = "master/keuangan/coa/addcoa";
										$a['title'] = "Tambah Kode Akun";
										$this->load->view('admin/index',$a);
									}

									/* coa */
									function bukbes() {
										$this->cek_aktif();
										$a['page'] = "master/keuangan/bukbes/bukbes";
										$a['title'] = "Buku Bessar";
										$this->load->view('admin/index',$a);
									}
									function gl() {
										$this->cek_aktif();
										$a['page'] = "master/keuangan/bukbes/gl";
										$a['title'] = "Jurnal Umum";
										$this->load->view('admin/index',$a);
									}
									function lappen() {
										$this->cek_aktif();
										$a['page'] = "master/keuangan/bukbes/lappen";
										$a['title'] = "Laporan Pendapatan";
										$this->load->view('admin/index',$a);
									}
									function laprug() {
										$this->cek_aktif();
										$a['page'] = "master/keuangan/bukbes/laprug";
										$a['title'] = "Laporan Proyeksi Laba Rugi";
										$this->load->view('admin/index',$a);
									}


									public function addsales_bahan(){
											$this->cek_aktif();
										var_dump("<pre>");
										var_dump($_GET);
										var_dump($_POST);
									}
									
									
									
									
									
			/* update transaksi POS */

function addtpj_nonmemberdetail_edit() 
			{
				$this->cek_aktif();
				$identity=$this->session->userdata('identityID');
				$invoiceID = $this->input->get('nofak');
				$tgltrx = $this->input->get('tgltrx');
				$a['trxid'] = $invoiceID;
				$a['tgltrx'] = $tgltrx;
				$a['pembeli'] = $this->input->post('namamember');
				$a['alamatkirim'] = $this->input->post('alamatkirim');
				$a['telpkirim'] = $this->input->post('telpkirim');
				$productBarcode = $this->input->post('kdproduk');
				$qty = $this->input->post('qty');
				$data = $this->model_master->tampil_produk_id($productBarcode);
				if($this->input->post('submit') == "tambah")
				{
					$price=0;
					$detailprice=0;
					$discPercent=0;
					$satuan =$this->input->post('satuan');
					$detailbonus =$this->input->post('bonus');
					foreach($data->result() as $row)
					{

						$price = $row->productSalePrice;
						$prostok = $row->productStock;
						$productDiscounttype = $row->productDiscounttype;
						$discPercent = $row->productDiscount;
						$detailSubtotal =$price*$qty;
						if($productDiscounttype=="1")
						{
							$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
						}
						else
							if($productDiscounttype=="2")
							{
								$detailSubtotal=($detailSubtotal-$discPercent);
							}
							else
							{
								$detailSubtotal=$detailSubtotal;
							}
						}

						$object = array(
							'invoiceID' => $invoiceID,
							'productBarcode' => $productBarcode,
							'detailModal' => $price,
							'detailSubtotalModal' => $price,
							'detailPrice' => $price,
							'productSat' => $satuan,
							'detailQty' => $qty,
							'detailbonus' =>$detailbonus,
							'discPercent' => $discPercent,
							'discTotal' => $detailprice,
							'detailSubtotal' => $detailSubtotal,
							'createdDate' => $tgltrx
							);
						$this->db->insert('as_sales_detail_transactions', $object); 
						$stokpro=($prostok)-($qty);
						$object = array(
							'productStock' => $stokpro
							);
						$this->db->where('productBarcode', $productBarcode);
						$this->db->update('as_products', $object); 
						$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
						$a['page'] = "master/penjualan/add-nonmember_detail_edit";
						$a['title'] = "Perubahan Transaksi Penjualan";
						$a['zona'] = $this->model_master->tampil_zona()->result_object();
						$this->load->view('admin/index',$a);
					}
					else if($this->input->post('submit') == "edittrx")
					{

						$ideditpro = $this->input->post('ideditpro');
						$qtypro = $this->input->post('qtypro');
						$bonus = $this->input->post('bonus');
						$productbarcode = $this->input->post('productbarcode');
						$dataup = $this->model_master->tampil_produk_id($productbarcode);
						foreach($dataup->result() as $row)
						{

							$price = $row->productSalePrice;
							$productDiscounttype = $row->productDiscounttype;
							$discPercent = $row->productDiscount;
							$detailSubtotal =$price*$qtypro;
							if($productDiscounttype=="1")
							{
								$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
							}
							else
								if($productDiscounttype=="2")
								{
									$detailSubtotal=($detailSubtotal-$discPercent);
								}
								else
								{
									$detailSubtotal=$detailSubtotal;
								}
							}
							$data = array (
								'detailQty'  => $qtypro,
								'detailSubtotal' => $detailSubtotal,
								'detailbonus' => $bonus

								);
							$this->db->where('detailID', $ideditpro);
							$this->db->update('as_sales_detail_transactions', $data);
							$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
							$a['page'] = "master/penjualan/add-nonmember_detail_edit";
							$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
							$a['zona'] = $this->model_master->tampil_zona()->result_object();
							$this->load->view('admin/index',$a);
						}
						else if($this->input->post('submit') == 'selesaitrx')
						{
							$memberID= "01";
							$identityID=$this->session->userdata('identityID');
							$userID=$this->session->userdata('admin_user');
							$invoiceID= $this->input->post('nofak');
							$trxFullNamesave=$this->input->post('namamember');
							$trxAddress= $this->input->post('alamatkirim');
							$trxPhone =$this->input->post('telpkirim');
							$nopo =$this->input->post('nopo');
							$sales =$this->input->post('salestrp');
							$zona =$this->input->post('zona');
							$driver = $this->input->post('driver');
							$zona = $this->input->post('zona');
							$jeniskend =$this->input->post('jeniskend');
							$nopol = $this->input->post('nopol');
							$trxDate = date('Y-m-d');
							$trxTotalModal = $this->input->post('harga');
							$trxTotalModalnum = intval(preg_replace('/[^\d.]/', '', $trxTotalModal));
							$trxSubtotal = $this->input->post('subtotal');
							$trxSubtotalnum = intval(preg_replace('/[^\d.]/', '', $trxSubtotal));
							$trxTotal = $this->input->post('total');
							$trxTotalnum = intval(preg_replace('/[^\d.]/', '', $trxTotal));
							$trxPay = $this->input->post('bayar');
							$trxPaynum = intval(preg_replace('/[^\d.]/', '', $trxPay));
							$trxChange = $this->input->post('kembali');
							$trxChangenum = intval(preg_replace('/[^\d.]/', '', $trxChange));
							$trxStatus = $this->input->post('tipebayar');
							$trxTerminDate = $this->input->post('terminpjdate');
							$trxbankmethod = $this->input->post('banktipe');
							$trxpayno = $this->input->post('bankno');
							$object = array(
								
								'trxDate' => $trxDate,
								'trxTotalModal' => $trxTotalModalnum,
								'trxSubtotal' => $trxSubtotalnum,
								'trxTotal' => $trxTotalnum,
								'trxPay' => $trxPaynum,
								'trxChange' => $trxChangenum,
								'isPosting_status' => 0,
								'trxpayno' => $trxpayno
								);
								$this->db->where('invoiceID', $invoiceID);
		                        $this->db->update('as_sales_transactions', $object); 
							
							$a['perusahaan']= $this->model_perusahaan->tampil_data()->result();
							$a['nofak']= $invoiceID;
							$a['member']= $trxFullNamesave;
							$a['trxAddress']= $trxAddress;
							$a['trxPhone']= $trxPhone;
							$a['jeniskend']= $jeniskend;
							$a['nopol']= $nopol;
							$a['nopo']= $nopo;
							$a['termin']= $trxTerminDate;
							$a['sales']= $sales;
							$a['driver']= $driver;
							$a['zona']= $zona;
							$a['tgltrx']= $tgltrx;
							$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
							$a['title'] = "Detail Transaksi";
							$a['total']= $trxTotal;
							$a['page'] = "master/penjualan/showtrx_edit";
							$a['title'] = "Perubahan Transaksi";
							$this->load->view('admin/index',$a);


						}
						else
						{

							$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
							$a['total']= 0;
							$a['page'] = "master/penjualan/add-nonmember_detail_edit";
							$a['title'] = "Perubahan Transaksi Penjualan";
							$a['zona'] = $this->model_master->tampil_zona()->result_object();
							$this->load->view('admin/index',$a);
						}

					}			


}

