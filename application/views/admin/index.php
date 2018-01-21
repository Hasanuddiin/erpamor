<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pro-Bussiness</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-main.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.number.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui/jquery-ui.theme.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="hold-transition skin-yellow sidebar-mini">
        <div class="wrapper">

          <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url(); ?>admin/index" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>A</b>MR</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>ERP</b> Boluamor</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
              </a>
              <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                
                               
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">PEMBERITAHUAN !!</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>product/plan_cek_save_view">
                                                <i class="fa fa-warning danger"></i> <!--<?php echo $key->statustot;?>--> &nbsp;
                                            </a>
                                        </li>
                                       
                                    
                                        
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo strtoupper($this->session->userdata('admin_nama'));?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-yellow">
                                  <img src="<?php echo base_url(); ?>assets/img/logo1.png" class="img-circle" alt=""/>
                                    <p>
                                        <?php echo strtoupper($this->session->userdata('admin_nama'));?>
                                        <small>Amor Group</small>
                                    </p>
                                </li>
                               
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>admin/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
             
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
    <?php $levuser=$this->session->userdata('admin_level'); ?>
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
          <div class="user-panel">
              <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/img/logo1.png" class="img-circle" alt=""/>
              <br>
              <br>
              
              </div>
              <div class="pull-left info">

                
                <p>Selamat datang </p>
                <p><?php echo strtoupper($this->session->userdata('admin_nama'));?></p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
            
              <li class="<?php if($page == 'home'){echo 'active';} ?>">
                <a href="<?php echo base_url(); ?>admin/index">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                </a>
              </li> 
        <?php if($levuser=='1' or $levuser=='2')
        { ?>
               <li class="treeview">
                <a href="#">
                  <i class="fa  fa-asterisk"></i>
                  <span>Master Data</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
        <li><a href="<?php echo base_url(); ?>admin/identitas"><i class="fa fa-angle-double-right"></i> Data Perusahaan</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/kategori"><i class="fa fa-angle-double-right"></i> Kategori</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/satuan"><i class="fa fa-angle-double-right"></i> Satuan</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/brand"><i class="fa fa-angle-double-right"></i> Brand</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/suplier"><i class="fa fa-angle-double-right"></i> Supplier</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/mitra"><i class="fa fa-angle-double-right"></i> Mitra</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/member"><i class="fa fa-angle-double-right"></i> Outlet</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/paketan"><i class="fa fa-angle-double-right"></i>Paketan Bahan</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/zona"><i class="fa fa-angle-double-right"></i> Zona</a></li>
                </ul>
              </li>
        <?php } ?>
        <?php if($levuser=='1' or $levuser=='9')
        { ?>
         <li class="treeview">
                <a href="#">
                   <i class="fa  fa-flask"></i>
                  <span>Research & Dev</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php if($page == 'home'){echo 'active';} ?>">
                <a href="<?php echo base_url(); ?>product/formula">
                 <i class="fa fa-angle-double-right"></i> <span>Formula  Bahan</span> 
                </a>
              </li>  
                  <li><a href="<?php echo base_url(); ?>product/perencanaan"><i class="fa fa-angle-double-right"></i> Perencanaan Produksi</a></li>
          <li><a href="<?php echo base_url(); ?>product/plan_cek_save_view"><i class="fa fa-angle-double-right"></i> Status Produksi</a></li>
          <li><a href="<?php echo base_url(); ?>admin/produk"><i class="fa fa-angle-double-right"></i> Daftar Produk</a></li>
         
                </ul>
              </li>
         <?php } ?>
         <?php if($levuser=='1' or $levuser=='3')
        { ?>
         <li class="treeview">
                <a href="#">
                   <i class="fa  fa-gears"></i>
                  <span>Produksi</span>
                 
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php if($page == 'home'){echo 'active';} ?>">
                
              </li>  
              <li><a href="<?php echo base_url(); ?>admin/produk"><i class="fa fa-angle-double-right"></i> Daftar Produk</a></li>
          <li><a href="<?php echo base_url(); ?>product/perencanaan"><i class="fa fa-angle-double-right"></i> Perencanaan Produksi</a></li>
          <li><a href="<?php echo base_url(); ?>product/plan_cek_save_view"><i class="fa fa-angle-double-right"></i> Status Produksi</a></li>
          <li><a href="<?php echo base_url(); ?>permintaan/addtpm"><i class="fa fa-angle-double-right"></i> Permintaan Barang</a></li>

          
          <li class="treeview">
                <a href="#">
                  <i class="fa fa-eraser"></i>
                  <span>Keluar Masuk Barang</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>permintaan/daftar_permintaan"><i class="fa fa-angle-double-right"></i> Permintaan Masuk</a></li>
                  <li><a href="<?php echo base_url(); ?>permintaan/daftar_permintaan_keluar"><i class="fa fa-angle-double-right"></i> Permintaan Keluar</a></li>
                </ul>
              </li>
         
                </ul>
              </li>
         <?php } ?>
         <?php if($levuser=='1' or $levuser=='4')
        { ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Transaksi Pembelian</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                   <li><a href="<?php echo base_url(); ?>pembelian/addtpm"><i class="fa fa-angle-double-right"></i> Pembuatan PO</a></li>
                  <li><a href="<?php echo base_url(); ?>pembelian/daftar_po"><i class="fa fa-angle-double-right"></i>Daftar PO</a></li>
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-eraser"></i>
                  <span>Retur Pembelian</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/addtrt"><i class="fa fa-angle-double-right"></i> Tambah Retur</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/findtpj"><i class="fa fa-angle-double-right"></i>Cari Transaksi</a></li>

                </ul>
                 <li><a href="<?php echo base_url(); ?>penerimaan/daftar_penerimaan"><i class="fa fa-angle-double-right"></i>Daftar Penerimaan Gudang</a></li>
                 <li><a href="<?php echo base_url(); ?>admin/bahan"><i class="fa fa-angle-double-right"></i> Daftar Bahan</a></li>
              </li>
                </ul>
              </li>
        <?php } ?>
         <?php if($levuser=='1' or $levuser=='5' or $levuser=='3')
        { ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-fw fa-desktop"></i>
                  <span>Transaksi Penjualan</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/addtpj"><i class="fa fa-angle-double-right"></i> Order Penjualan</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpj"><i class="fa fa-angle-double-right"></i> Daftar Transaksi Penjualan</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/showrekaptoday"><i class="fa fa-angle-double-right"></i> Rekap Penjualan</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/showrekappromo"><i class="fa fa-angle-double-right"></i> Rekap Diskon/Promo</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodayDebit"><i class="fa fa-angle-double-right"></i> Rekap Debit</a></li>
                  <li class="treeview">
                <a href="#">
                  <i class="fa fa-eraser"></i>
                  <span>Retur Produk</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>returpenjualan/addtrt"><i class="fa fa-angle-double-right"></i> Tambah Retur</a></li>
                  <li><a href="<?php echo base_url(); ?>returpenjualan/showtrxrtpen"><i class="fa fa-angle-double-right"></i>Daftar Retur</a></li>
                </ul>
                <li><a href="https://103.28.148.154/pos-amor"><i class="fa fa-fw fa-desktop"></i> POS Kasir</a></li>
              </li>
                </ul>

              </li>
        <?php } ?>
         <?php if($levuser=='1' or $levuser=='5' or $levuser=='3')
        { ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-bar-chart"></i>
                  <span>Penjualan Toko</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="treeview">
                <a href="#">
                  <i class="fa  fa-paper-plane"></i>
                  <span>Toko Area Sukabumi</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-share"></i> Pamuruyan</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytokocicurug"><i class="fa fa-share"></i>Cicurug</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i>Cibadak</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i>Parungkuda</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i>Kaum</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i>Caringin</a></li>
                </ul>
                
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-send-o"></i>
                  <span>Toko Area Bogor</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i> Tajur</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i>Seuseupan</a></li>
                </ul>
               
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-eraser"></i>
                  <span>Toko Area Cianjur</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i> Sukalarang</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i>Warungkondang</a></li>
                </ul>
               
              </li>
                  <li class="treeview">
                <a href="#">
                  <i class="fa fa-eraser"></i>
                  <span>Retur Produk</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"><i class="fa fa-angle-double-right"></i>Daftar Retur</a></li>
                </ul>
                <li><a href="http://localhost/pos-amor"><i class="fa fa-fw fa-desktop"></i> POS Kasir</a></li>
              </li>
                </ul>

              </li>
        <?php } ?>
         <?php if($levuser=='1' or $levuser=='8')
        { ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-fw fa-building-o"></i>
                  <span>Inventori</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
        <li><a href="<?php echo base_url(); ?>admin/produk"><i class="fa fa-angle-double-right"></i> Produk</a></li>
          <li><a href="<?php echo base_url(); ?>admin/bahan"><i class="fa fa-angle-double-right"></i> Bahan</a></li>
          <li><a href="<?php echo base_url(); ?>permintaan/addtpm"><i class="fa fa-angle-double-right"></i> Permintaan Barang</a></li>
        
          <li><a href="<?php echo base_url(); ?>penerimaan"><i class="fa fa-angle-double-right"></i>Penerimaan Barang</a></li>
                  <li><a href="<?php echo base_url(); ?>penerimaan/daftar_penerimaan"><i class="fa fa-angle-double-right"></i>Daftar Penerimaan</a></li>
           <li><a href="<?php echo base_url(); ?>permintaan/daftar_permintaan"><i class="fa fa-angle-double-right"></i>Mutasi Barang</a></li>
      
        <li class="treeview">
                <a href="#">
                  <i class="fa fa-eraser"></i>
                  <span>Retur Pembelian</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>returpembelian/addtrt"><i class="fa fa-angle-double-right"></i> Tambah Retur</a></li>
                  <li><a href="<?php echo base_url(); ?>returpembelian/showtrxrt"><i class="fa fa-angle-double-right"></i>Daftar Retur</a></li>
                </ul>
              </li>
        <li class="treeview">
                <a href="#">
                  <i class="fa fa-eraser"></i>
                  <span>Retur Penjualan</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>returpenjualan/addtrt"><i class="fa fa-angle-double-right"></i> Tambah Retur</a></li>
                  <li><a href="<?php echo base_url(); ?>returpenjualan/showtrxrtpen"><i class="fa fa-angle-double-right"></i>Daftar Retur</a></li>
                </ul>
              </li>
        <li class="treeview">
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span>Stock Opname</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>opname/addso"><i class="fa fa-angle-double-right"></i> Tambah Stock Opname</a></li>
                  <li><a href="<?php echo base_url(); ?>opname/showtrxso"><i class="fa fa-angle-double-right"></i>Daftar Stock Opname</a></li>
                </ul>
              </li>
                </ul>
              </li>
        <?php } ?>
               
         <?php if($levuser=='1' or $levuser=='6')
        { ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-money"></i>
                  <span>Keuangan</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                
                <a href="#">
                  <i class="fa fa-angle-double-right"></i>
                  <span>Biaya</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
              </li>
                 <li><a href="<?php echo base_url(); ?>admin/khutang"><i class="fa fa-angle-double-right"></i>Kartu Hutang</a></li>
                 <li><a href="<?php echo base_url(); ?>admin/kpiutang"><i class="fa fa-angle-double-right"></i>Kartu Piutang</a></li>
                
           </ul>
         </li>
         <?php } ?>
     <?php if($levuser=='1' or $levuser=='7'){ ?>
          <li class="treeview">
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span>HRD</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
        <li><a href="<?php echo base_url(); ?>hrd/importdata"><i class="fa fa-angle-double-right"></i> Import Data Absen</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/userman"><i class="fa fa-angle-double-right"></i> Data Pegawai</a></li>
                  <li><a href="<?php echo base_url(); ?>hrd/absensi"><i class="fa fa-angle-double-right"></i>Data Kehadiran Pegawai</a></li>
          <li><a href="<?php echo base_url(); ?>hrd/konfigurasi"><i class="fa fa-angle-double-right"></i>Konfigurasi Penggajian</a></li>
          <li><a href="<?php echo base_url(); ?>opname/showtrxso"><i class="fa fa-angle-double-right"></i>Laporan Gaji</a></li>
                </ul>
              </li>
              <?php } ?>
      </ul>
      
    </section>

    <!-- /.sidebar -->
  </aside>

  <?php $this->load->view('admin/'.$page); ?>
<div class="row no-print">
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <p> &copy; <?php echo date('Y') ?> <a href="#">CV.Amor Group</a>.</p>.
  </footer>
  </div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->


<script>
$(function () {
  $("#example1").DataTable({          
    "language": {
      "url": "<?php echo base_url(); ?>assets/plugins/datatables/Indonesian.json",
      "sEmptyTable": "Tidak ada data di database"
    }
  });
});
$(function () {
  $("#example2").DataTable({          
    "language": {
      "url": "<?php echo base_url(); ?>assets/plugins/datatables/Indonesian.json",
      "sEmptyTable": "Tidak ada data di database"
    }
  });
});
$(function() {
  $( "#tgl_surat" ).datepicker({ 
    autoclose: true 
  });
});
</script>
<script>
$('#terminpjdate').datepicker({
  dateFormat: 'yy-mm-dd'
});
$('#tgllahir').datepicker({
  dateFormat: 'yy-mm-dd'
});

$('#diskondatestop').datepicker({
  dateFormat: 'yy-mm-dd'
});
$('#diskondatestart').datepicker({
  dateFormat: 'yy-mm-dd'
});

$('#promodatestart').datepicker({
  dateFormat: 'yy-mm-dd'
});
$('#promodatestop').datepicker({
  dateFormat: 'yy-mm-dd'
});
</script>
<script>
$('#idenhead').hide();
$('#termindate').hide();
$('#memberaddtrx').hide();
$('#proyekaddtrx').hide();
$('#kantorcabang').hide();
$('#promodiv').hide();

$('#identitytype').on('change', function() {
  if($(this).val() == '1') {
   $('#idenhead').slideDown('slow');
   $('#divpemilik').show();
   $('#idenhead').hide();
 } else {
   $('#idenhead').slideDown('slow');
   $('#idenhead').show();
   $('#divpemilik').hide();
 }
});

$('#kantorlevel').on('change', function() {
  if($(this).val() == '1') {
   $('#kantorcabang').hide();
 } else {
   $('#kantorcabang').slideDown('slow');
   $('#kantorcabang').show();
 }
});

$('#identitytype').on('change', function() {
  if($(this).val() == '1') {
   $('#termindate').slideDown('slow');
   $('#termindate').hide();
 } else {
   $('#termindate').slideDown('slow');
   $('#termindate').show();
 }
});
$('#showmembertrx').on('click', function() {
 $('#memberaddtrx').slideDown('slow');
 $('#memberaddtrx').togle();

});

$('#tipebayar').on('change', function() {
  if($(this).val() == '1') {
   $('#termindate').slideDown('slow');
   $('#termindate').hide();
 } else {
   $('#termindate').slideDown('slow');
   $('#termindate').show();
 }
});

$('#showproyektrx').on('click', function() {
 $('#proyekaddtrx').slideDown('slow');
 $('#proyekaddtrx').togle();

});

$('#banktipe').hide();
$('#tipebank').on('change', function() {
  if($(this).val() == 'tunai') {
   $('#banktipe').slideDown('slow');
   $('#banktipe').hide();
 } else {
   $('#banktipe').slideDown('slow');
   $('#banktipe').show();
 }
});

$('#tipepromo').on('change', function() {
  if($(this).val() == '0') {
   $('#promodiv').hide();
 } else {
   $('#promodiv').slideDown('slow');
   $('#promodiv').show();
 }
});
</script>

<script>
$( "#dialog:ui-dialog" ).dialog( "remove" );
   // $(".btnShow").live("click",function(){
    $('body').on('click', '.btnShow', function(){
      var ideditpro = $(this).attr("ideditpro");
      var editmemberid = $(this).attr("editmemberid");
      var nampro = $(this).attr("nampro");
      var harpro = $(this).attr("harpro");
      var qtypro = $(this).attr("qtypro");
      var bonus = $(this).attr("bonus");
      var productbarcode = $(this).attr("productbarcode");

      $('#productbarcode').val(productbarcode);
      $('#ideditpro').val(ideditpro);
      $('#editmemberid').val(editmemberid);
      $('#nampro').val(nampro);
      $('#harpro').val(harpro);
      $('#harpro').number( true, 0 );
      $('#qtypro').val(qtypro);
      $('#bonus').val(bonus);
      $('#dialog').dialog('open');
      return false;
    });
    </script>

    <script>
    $(function () {
      $("#dialog").dialog({
        modal: true,
        autoOpen: false,
        title: "Edit Transaksi"
      });
    });

    </script>
    <script>
    $(function () {
      $("#kodebarang").autocomplete({    
        minLength:0,
        delay:0,
        source:'<?php echo site_url('auto/get_produk'); ?>',   
        select:function(event, ui){
          $('#nama').val(ui.item.nama);
          $('#kdproduk').val(ui.item.kdproduk);
          $('#stokproduk').val(ui.item.stokproduk);
        }
      });
    
    $("#kodebarangpromo").autocomplete({    
        minLength:0,
        delay:0,
        source:'<?php echo site_url('auto/get_produk'); ?>',   
        select:function(event, ui){
          $('#nama').val(ui.item.nama);
          $('#kdproduk').val(ui.item.kdproduk);
          $('#stokproduk').val(ui.item.stokproduk);
        }
      });
    
    
    $("#kodebahan").autocomplete({    
        minLength:0,
        delay:0,
        source:'<?php echo site_url('auto/get_bahan'); ?>',   
        select:function(event, ui){
          $('#nama').val(ui.item.nama);
          $('#kdbahan').val(ui.item.bahanBarcode);
          $('#stokbahan').val(ui.item.stokbahan);
        }
      });

      $('#warningstok').hide();
      $('#qty').on('keyup',function(){

       var qty = parseInt($('#qty').val(),10);
       var stok = parseInt($('#stokproduk').val(),10);
       if (qty > stok) {
         $('#warningstok').show();
         $("#submittambahproduk").attr("disabled", true);
       }
       else
       {
         $('#warningstok').hide();
         $("#submittambahproduk").attr("disabled", false);
       }
     });
    });

    $(function () {
      $("#kodemember").autocomplete({  
        minLength:0,
        delay:0,
        source:'<?php echo site_url('auto/get_member'); ?>',   
        select:function(event, ui){
         $('#idmember').val(ui.item.idmember);
         $('#namamember').val(ui.item.nama);
         $('#alamat').val(ui.item.alamat);
         $('#telp').val(ui.item.telp);

       }
     });

      $("#kodeproyek").autocomplete({  
        minLength:0,
        delay:0,
        source:'<?php echo site_url('auto/get_proyek'); ?>',   
        select:function(event, ui){
         $('#idproyek').val(ui.item.idproyek);
         $('#namaproyek').val(ui.item.namaproyek);
         $('#alamatproyek').val(ui.item.alamatproyek);
         $('#telpproyek').val(ui.item.telpproyek);

       }
     });

    });
    </script>
    <script>
    function parseCurrency( num ) {
      return parseFloat( num.replace( /,/g, '') );
    }

    $(function(){
        // Set up the number formatting.
        
        $('#bayar').on('change',function(){
          console.log('Change event.');
          var val = $('#bayar').val();
          $('#kembali').text( val !== '' ? val : '(empty)' );
        });
        
        $('#bayar').change(function(){
          console.log('Second change event...');
        });
        
        $('#bayar').number( true, 0 );
        
        
        
        $('#bayar').on('keyup',function(){
          
          var bayar = $('#bayar').val();
          var total = $('#total').val();
          var val=parseCurrency(bayar)-parseCurrency(total);
          $("#kembali").val(val);
          $("#kembali").number( true, 0 );
          
        });
      });
    </script>
    <script>
    $(document).ready(function() {
      $("#formtrxid").validate({
        rules:{ 
         kodeproduk:"required",
         bayar:{required:true,number: true},
         qty:{required:true,number: true}
       },
       messages:{ 
        kodeproduk:{required:'Tidak Boleh Kosong'},
        bayar:{
          required:'Tidak Boleh Kosong',
          number  :'Hanya boleh di isi Angka'},
          qty:{
            required:'Tidak Boleh Kosong',
            number  :'Hanya boleh di isi Angka'},
            
          },
          success: function(label) {
            label.text('').addClass('valid');}
          });
    });
    </script>
    <script>
    $('#qty').on('keyup',function(){

     var valqty = $('#qty').val();
     $("#qtyremove").val(valqty);

   });
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- datepicker -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- Webcam       -->

  </body>
  </html>
