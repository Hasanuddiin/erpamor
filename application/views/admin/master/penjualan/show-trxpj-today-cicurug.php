 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/morris.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.css">
 
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      
                  </div><!-- /.row -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="box-body chart-responsive">
                      <div class="chart" id="report" style="height: 300px;"></div>
                

               
               <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number"><a href="<?php echo base_url(); ?>admin/showrekapstoktokocicurug"  style="color:#fff;" class="info-box-number" id="showmembertrx"> CEK STOCK TOKO</a></span>
                  <span class="info-box-number">Cicurug</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 75%"></div>
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
                        <strong>Pendapatan Outlet</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Bolu Pisang Original</span>
                        <span class="progress-number"><b>160</b>/200</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Bopis Meses Keju</span>
                        <span class="progress-number"><b>310</b>/400</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 70%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Lapis talas Bogor</span>
                        <span class="progress-number"><b>480</b>/800</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: 75%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Kue Ultah</span>
                        <span class="progress-number"><b>250</b>/500</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 60%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Brownies</span>
                        <span class="progress-number"><b>250</b>/500</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 60%"></div>
                        </div>
                      </div><!-- /.progress-group -->

                      <a id="btnExport" class="btn btn-lg btn-success"><i class="fa  fa-file-excel-o"></i> &nbsp; Simpan data ke Excel&nbsp;&nbsp;</a>
                      <br>
                      <br>
                      <a href="<?php echo base_url(); ?>admin/showrekaptodaytoko" class="btn btn-lg btn-danger"><i class="fa   fa-shopping-cart"></i> &nbsp;Rekap Penjualan Toko</a>

                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
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
                  <span class="info-box-number">RP. <?php foreach($pendapatanbulan as $data): 
            echo number_format($data->total_bulan); 
            endforeach ?> </span>
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
                  <div class="box-body table-responsive no-padding">
                 
                  <table id="table_wrapper" id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
            <th>No.</th>
                        <th>No Invoice</th>
            <th>Tgl. Transaksi</th>
            <th>Watku</th>
            <th>Nama Kasir</th>
                        <th>Alamat</th>
            <th>Total Pembelian</th>
            <th>Cara Bayar </th>
            <th>Termin </th>
            <th>Metode Pembayaran </th>
                    </thead>
                    <tbody>
                        <?php  
                        $no = 1;
                        foreach ($tampil as $lihat):
                        ?>
                      <tr>
              <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->invoiceID; ?></td>
              <td><?php echo $lihat->trxDate; ?></td>
              <td><?php echo $lihat->trxTime; ?></td>
              <td><?php echo $lihat->nama_lengkap; ?></td>
              <td><?php echo $lihat->trxAddress; ?></td>
              <td><?php echo number_format($lihat->trxTotal); ?></td>
              <td><?php
              if($lihat->trxStatus=="1")
              {
                echo "Cash";
              }
              else
              {
                echo "Termin";
              }
              ?>
              </td>
              <td><?php
              if($lihat->trxTerminDate=="0000-00-00")
              {
                echo "-";
              }
              else
              {
                echo $lihat->trxTerminDate;
              }
              ?></td>
              <td><?php echo $lihat->trxbankmethod; ?></td>
              
                                
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    </table>
              <h4>Total Penjualan (<i> Hari ini <?php echo date('d-m-Y'); ?></i>): Rp.  <b><?php foreach($totalPendToday as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?></b></h4>

          <h4>Penjualan Kasir :(<i><?php echo strtoupper($this->session->userdata('admin_nama'));?> </i>) Hari ini : Rp.  <b><?php foreach($totalPendToday as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?></b></h4>
                  </table>
                  
                </div><!-- /.box-body -->
              
                </div>
             </div>
          </div>

        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   

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
            text: 'Penjualan Toko Cicurug',
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

$(document).ready(function() {
       $("#btnExport").click(function(e) {
          e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
       });
        </script>