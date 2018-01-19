 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/morris.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.css">
 <meta http-equiv="refresh" content="60">

 
        <!-- Theme style -->

  <?php $levuser=$this->session->userdata('admin_level'); ?>
  <?php $user=$this->session->userdata('identityID'); ?>                
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <?php  
                  foreach ($perusahaan as $perusahaan):
                    ?>
                <?php echo $perusahaan->identityName;?>
                 
                <?php  endforeach ?>
             
            <small><?php $Tanggal = date('d-m-Y');
             echo $Tanggal;
             ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Small boxes (Stat box) -->
          <div class="row">
          <?php if($levuser=='1' or $levuser=='5' or $levuser=='3')
        { ?>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $trx_today ?></h3>
                  <p>Total Transaksi Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/showtrxpjtoday" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php } ?>
            <!-- /.col -->

          
            <?php if($levuser=='1' or $user=='3')
        { ?>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue-gradient">
                <div class="inner">
                  <h3><?php echo $trx_todayBakery ?></h3>
                  <p>Transaksi Bakery Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="fa fa-money"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/showtrxpjtoday" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php } ?>
            <!-- /.col -->

            <?php if($levuser=='1' or $user=='3')
        { ?>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue-gradient">
                <div class="inner">
                  <h3><?php echo $trx_todayBakery ?></h3>
                  <p>Rekap Transaksi Hari ini</p>
                </div>
                <div class="icon">
                  <i class="fa fa-money"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/showrekaptoday" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php } ?>
            <!-- /.col -->

            <?php if($levuser=='1' or $levuser=='5' or $levuser=='3')
        { ?>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo $status_prod ?></h3>
                  <p>Produksi belum di setujui</p>
                </div>
                <div class="icon">
                  <i class="fa fa-gears"></i>
                </div>
                <a href="<?php echo base_url(); ?>product/plan_cek_save_view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php } ?>

               <?php if($levuser=='1' or $levuser=='5' or $levuser=='4')
        { ?>
 
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $hutang; ?></h3>
                  <p>Hutang Jatuh Tempo</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/khutang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
 <?php } ?>

             <?php if($levuser=='1' or $levuser=='3' or $levuser=='5')
        { ?>
              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3><?php echo $piutang; ?></h3>
                  <p>Piutang Jatuh Tempo</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bell"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/kpiutang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        
            </div><!-- ./col -->
<?php } ?>
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $permintaan; ?></h3>
                  <p>Permintaan Belum di Cek</p>
                  
                </div>
                <div class="icon">
                  <i class="ion ion-clock"></i>
                </div>
                <a href="<?php echo base_url(); ?>permintaan/daftar_permintaan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
			  
            </div><!-- ./col -->

     

             <?php if($levuser=='1' or $levuser=='4' or $levuser=='8')
        { ?>

              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3><?php echo $po; ?></h3>
                  <p>Barang Gudang Masuk</p>
                  
                </div>
                <div class="icon">
                  <i class="fa fa-truck"></i>
                </div>
                <a href="<?php echo base_url(); ?>penerimaan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        
            </div><!-- ./col -->
            <?php } ?>

            <?php if($levuser=='1' or $levuser=='4' or $levuser=='8')
        { ?>

              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php echo $order_po; ?></h3>
                  <p>Jumlah PO hari ini</p>
                  
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="<?php echo base_url(); ?>pembelian/daftar_po" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        
            </div><!-- ./col -->
            <?php } ?>

            <?php if($levuser=='1' or $levuser=='5' or $levuser=='3')
        { ?>


            


              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $diterima; ?></h3>
                  <p>Pesanan di terima & di proses</p>
                  
                </div>
                <div class="icon">
                  <i class="fa fa-thumbs-up"></i>
                </div>
                <a href="<?php echo base_url(); ?>permintaan/daftar_permintaan_keluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        
            </div><!-- ./col -->
            <?php } ?>
             </div>

            <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="box-body chart-responsive">
                                    <div class="chart" id="report" style="height: 300px;"></div>
                                </div><!-- /.box-body -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Barang Terjual Hari ini</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Bolu</span>
                        <span class="progress-number"><b><?php foreach($databolu as $data): 
            echo ($data->jumlah); ?></b> Pcs</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: <?php echo ($data->jumlah); endforeach ?>%">
                          </div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Djavamouse</span>
                        <span class="progress-number"><b><?php foreach($dataDjavamous as $data1): 
            echo ($data1->jumlah); ?></b> Pcs</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: <?php echo ($data1->jumlah); endforeach ?>%">
                            
                          </div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Modern Cake</span>
                        <span class="progress-number"><b><?php foreach($dataModernCake as $data1): 
            echo ($data1->jumlah); ?></b> Pcs</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-blue" style="width: <?php echo ($data1->jumlah); endforeach ?>%">
                        </div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Mochi</span>
                        <span class="progress-number"><b><?php foreach($dataMochi as $data1): 
            echo ($data1->jumlah); ?></b> Pcs</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: <?php echo ($data1->jumlah); endforeach ?>%">
                        </div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Snack</span>
                        <span class="progress-number"><b><?php foreach($dataSnack as $data1): 
            echo ($data1->jumlah); ?></b> Pcs</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: <?php echo ($data1->jumlah); endforeach ?>%">
                            
                          </div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Cafe</span>
                        <span class="progress-number"><b><?php foreach($dataCafe as $data1): 
            echo ($data1->jumlah); ?></b> Pcs</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-blue" style="width: <?php echo ($data1->jumlah); endforeach ?>%">
                            
                          </div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                
              </div><!-- /.box -->
            </div>
            </div>

            <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pendapatan Hari ini</span>
                  <span class="info-box-number">Rp. <?php foreach($totalPendToday as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?>  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa  fa-usd "></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Bulan ini</span>
                  <span class="info-box-number">RP. <?php foreach($totalpendapatan as $data): 
            echo number_format($data->total); 
            endforeach ?>   </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">PRODUK TERJUAL</span>
                  <span class="info-box-number"><?php foreach ($prod_todayBakery as $prod): echo number_format($prod->qty); endforeach ?> </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Customer Hari ini</span>
                  <span class="info-box-number"><?php echo $trx_todayBakery ?> Orang</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

           <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="box-body chart-responsive">
                <div class="info-box bg-blue">
                <span class="info-box-icon"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko" class="fa fa-home"></a></span>
                <div class="info-box-content">
                  <span  class="info-box-text"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"  style="color:#fff;" class="info-box-number" id="showmembertrx"> TOKO PAMURUYAN</a></span>
                  <span class="info-box-number">Rp.<?php foreach($totalPendTodayToko as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 45%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->

               <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                  <span  class="info-box-text"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytokocicurug"  style="color:#fff;" class="info-box-number" id="showmembertrx"> TOKO CICURUG</a></span>
                  <span class="info-box-number">Rp.<?php foreach($totalPendTodayCicurug as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 75%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
               <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                  <span  class="info-box-text"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"  style="color:#fff;" class="info-box-number" id="showmembertrx"> TOKO LABORA</a></span>
                  <span class="info-box-number">Rp.<?php foreach($totalPendTodayToko as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 65%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->




                                    
                                </div><!-- /.box-body -->
                    </div><!-- /.col -->

                    <div class="col-md-4">
                      <div class="box-body chart-responsive">
                <div class="info-box bg-purple">
                <span class="info-box-icon"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko" class="fa fa-home"></a></span>
                <div class="info-box-content">
                  <span  class="info-box-text"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"  style="color:#fff;" class="info-box-number" id="showmembertrx"> TOKO CARINGIN</a></span>
                  <span class="info-box-number">Rp. -</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 45%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->

               <div class="info-box bg-green-gradient">
                <span class="info-box-icon"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                  <span  class="info-box-text"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"  style="color:#fff;" class="info-box-number" id="showmembertrx"> TOKO KAUM</a></span>
                  <span class="info-box-number">Rp. -</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 75%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
               <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                  <span  class="info-box-text"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"  style="color:#fff;" class="info-box-number" id="showmembertrx"> TOKO PARUNGKUDA</a></span>
                  <span class="info-box-number">Rp. -</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 65%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->




                                    
                                </div><!-- /.box-body -->
                    </div><!-- /.col -->
                    <div class="col-md-4">

                      <p class="text-center">
                        
                      </p>
                      <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                  <span  class="info-box-text"><a href="<?php echo base_url(); ?>admin/showtrxpjtodaytoko"  style="color:#fff;" class="info-box-number" id="showmembertrx"> TOKO LABORA</a></span>
                  <span class="info-box-number">Rp.<?php foreach($totalPendTodayToko as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 65%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
                      <div class="progress-group">
                        <span class="progress-text">Tko Pamuruyan</span>
                        <span class="progress-number"><b>310</b>/400</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 70%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Toko Parungkuda</span>
                        <span class="progress-number"><b>480</b>/800</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: 75%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Toko Cibadak</span>
                        <span class="progress-number"><b>250</b>/500</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 60%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Toko Cisaat</span>
                        <span class="progress-number"><b>250</b>/500</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 60%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                        <h3 class="description-header">RP. <?php foreach($totalPendToday as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?>   </h3>
                        <span class="description-text">PENDAPATAN HARI INI</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                        <h3 class="description-header">RP. <?php foreach($totalpendapatan as $data): 
            echo number_format($data->total); 
            endforeach ?>   </h3>
                        <span class="description-text">TOTAL PENDAPATAN</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">-</h5>
                        <span class="description-text">TOTAL RETURN</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>
            </div>

            <div class="row">
       <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>
                  <h3 class="box-title">Calendar</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div><!-- /.box-body -->
                <div class="box-footer text-black">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Progress bars -->
                      <div class="clearfix">
                        <span class="pull-left">Task #1</span>
                        <small class="pull-right">90%</small>
                      </div>
                      <div class="progress progress-sm active">
                        <div class="progress-bar progress-bar-green active" style="width: 90%;"></div>
                      </div>

                      <div class="clearfix">
                        <span class="pull-left">Task #2</span>
                        <small class="pull-right">70%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <div class="clearfix">
                        <span class="pull-left">Task #3</span>
                        <small class="pull-right">60%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                      </div>

                      <div class="clearfix">
                        <span class="pull-left">Task #4</span>
                        <small class="pull-right">40%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                      </div>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.box -->
              </div>

                  <div class="row">
           
               <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">Donut Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div id="donut-chart" style="height: 300px;"></div>
                </div><!-- /.box-body-->
              </div><!-- /.box -->
              

             
             
        
          </div><!-- /.row -->

      
              ->

          <div class="row">
            <div class="col-md-6">
            <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Direct Chat</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class='badge bg-yellow'>3</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <!-- Conversations are loaded here -->
                      <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left'>Alexander Pierce</span>
                            <span class='direct-chat-timestamp pull-right'>23 Jan 2:00 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right'>Sarah Bullock</span>
                            <span class='direct-chat-timestamp pull-left'>23 Jan 2:05 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            You better believe it!
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left'>Alexander Pierce</span>
                            <span class='direct-chat-timestamp pull-right'>23 Jan 5:37 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            Working with AdminLTE on a great new app! Wanna join?
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right'>Sarah Bullock</span>
                            <span class='direct-chat-timestamp pull-left'>23 Jan 6:10 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            I would love to.
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                      </div><!--/.direct-chat-messages-->


                      <!-- Contacts are loaded here -->
                      <div class="direct-chat-contacts">
                        <ul class='contacts-list'>
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user1-128x128.jpg'/>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Count Dracula
                                  <small class='contacts-list-date pull-right'>2/28/2015</small>
                                </span>
                                <span class='contacts-list-msg'>How have you been? I was...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user7-128x128.jpg'/>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Sarah Doe
                                  <small class='contacts-list-date pull-right'>2/23/2015</small>
                                </span>
                                <span class='contacts-list-msg'>I will be waiting for...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user3-128x128.jpg'/>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Nadia Jolie
                                  <small class='contacts-list-date pull-right'>2/20/2015</small>
                                </span>
                                <span class='contacts-list-msg'>I'll call you back at...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user5-128x128.jpg'/>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Nora S. Vans
                                  <small class='contacts-list-date pull-right'>2/10/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Where is your new...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user6-128x128.jpg'/>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  John K.
                                  <small class='contacts-list-date pull-right'>1/27/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Can I take a look at...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user8-128x128.jpg'/>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Kenneth M.
                                  <small class='contacts-list-date pull-right'>1/4/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Never mind I found...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                        </ul><!-- /.contatcts-list -->
                      </div><!-- /.direct-chat-pane -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <form action="#" method="post">
                        <div class="input-group">
                          <input type="text" name="message" placeholder="Type Message ..." class="form-control"/>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat">Send</button>
                          </span>
                        </div>
                      </form>
                    </div><!-- /.box-footer-->
                  </div><!--/.direct-chat -->
                </div>
                </div>
             

          
          </section>
                  
   <?php
    /* Mengambil query report*/
        foreach($report as $result){
        $bulan[] = $result->trxDate; //ambil bulan
        $value[] = (float) $result->total; //ambil nilai
          }
    /* end mengambil query*/
     
       ?>
       
        <script src="<?php echo base_url();?>assets/js/highcharts.js" type="text/javascript"></script>
      

      

<script type="text/javascript">
$(function () {

    $('#report').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Penjualan Bakery Sukabumi',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
     otOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($bulan);?>
        },
        exporting: { 
            enabled: false 
        },
        yAxis: {
            title: {
                text: 'Jumlah Rp.'
            },
        },
        tooltip: {
             formatter: function() {
                 return 'Pendapatan untuk Tanggal <b>' + this.x + '</b> Rp. <b>' + Highcharts.numberFormat(this.y,0) + '</b>,  ';
             }
          },
        series: [{
            name: 'Tanggal',
            data: <?php echo json_encode($value);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '9px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]

    });

});
        </script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/morris.min.js" type="text/javascript"></script>

        
        
          

 











                      
