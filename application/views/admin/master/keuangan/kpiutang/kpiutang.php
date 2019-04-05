<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> S.O</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  <form method="post">
                      <div class="form-group col-md-6">            
                        <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
              
                          </div>
                            <input type="text" name="date" placeholder="Klik disini ..." class="form-control pull-right active" id="reservation" required>

                        </div>
                <!-- /.input group -->
                      </div>
                      <button type="submit" class="btn btn-danger btn-flat" name="display">GO</button>

          <a href="<?php echo base_url(); ?>admin/printpendapatan" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak </a>     
        </form>
         
                  	
                  </h3>
                  <div class="box-tools">
                  	<!--
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    -->
                  </div>
                  <?php foreach ($kpiutang_jml as $lihat): ?>
                    <div class="col-md-4">
                      <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title fa fa-money">&nbsp;&nbsp;Total Sisa Piutang</h3>
                            <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                      <div class="box-body">
                       <span class="info-box-number"><b>RP. &nbsp;<?php echo number_format($lihat->totalbayartermin); ?></b></span>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-md-4">
                      <div class="box box-success box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title fa fa-money">&nbsp;&nbsp;Total Pembayaran Piutang</h3>
                            <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                      <div class="box-body">
                       <span class="info-box-number"><b>RP. &nbsp;<?php echo number_format($lihat->totalbayartermin); ?></b></span>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->
                 <?php endforeach; ?>
                  <?php foreach ($kpiutang_total as $lihat): ?>
                <div class="col-md-4">
                      <div class="box box-danger box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title fa fa-money">&nbsp;&nbsp;Jumlah Total Piutang</h3>
                            <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                      <div class="box-body">
                       <span class="info-box-number"><b>RP. &nbsp;<?php echo number_format($lihat->totalPiutang); ?></b></span>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->
                   
                  
                  
                <?php endforeach; ?>

                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
						<th>Tgl</th>
                        <th>No. Faktur</th>
						<th>Konsumen</th>
						<th>Jumlah</th>
						<th>Bayar</th>
						<th>Sisa</th>
						<th>Status</th>
						<th>Jatuh Tempo</th>
						<th>Aksi</th>
                    </thead>
                    <tbody>
						<?php  
                        $no = 1;
                        foreach ($kpiutang as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
              <td><?php echo $lihat->trxDate; ?></td>
							<td><?php echo $lihat->invoiceID; ?></td>
							<td><?php echo $lihat->trxFullName; ?></td>
							<td><?php echo number_format($lihat->trxTotal); ?></td>
							<?php $totalbayar=$lihat->trxPay + $lihat->totalbayartermin;?>
							<td><?php echo number_format($totalbayar); ?></td>
							<?php $sisa=$lihat->trxTotal - ($lihat->trxPay + $lihat->totalbayartermin);?>
							<td><?php echo number_format($sisa); ?></td>
							<?php if((($sisa)=='0')||(($sisa)<='0'))
							{
								$status="Lunas";
							}
							else
							{
								$status="Belum Lunas";
							}
							?>
							<td><?php echo $status; ?></td>
							<td><?php echo $lihat->trxTerminDate; ?></td>
							
                        <td align="center">
                          <div class="btn-group" role="group">
						 <?php if(($status)=='Lunas')
							{
							?>
							
							<?php
							}
							else { ?>
                            <a href="#" class="btnbayar btn btn-info btn-sm" id="btnShow" total="<?php $lihat->trxTotal; ?>" sisa="<?php echo $sisa; ?>" invoice="<?php echo $lihat->invoiceID; ?>" nmsupplier="<?php echo $lihat->trxFullName; ?>" totalbeli="<?php echo $lihat->trxTotal; ?>" totalbayar="<?php echo $totalbayar; ?>" idpiutang="<?php echo $lihat->idpiutang; ?>" >Bayar</a>
                            <?php } ?>
							<a href="<?php echo base_url(); ?>admin/kpiutang_save_detail?idpiutang=<?php echo $lihat->idpiutang ?>&invoice=<?php echo $lihat->invoiceID ?>&konsumen=<?php echo $lihat->trxFullName ?>&totalbayar=<?php echo $totalbayar ?>&sisabayar=<?php echo $sisa ?>&dp=<?php echo $lihat->trxPay ?>" class="btn btn-sm btn-warning btn-flat"> Detail</a>
                          </div>
                        </td>                  		
                    	</tr>
						<?php endforeach; ?>
						
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
		  </div>
         
		<!-- form edit -->
  			<div id="dialogbayar" style="display: none" align = "center">
  				 <!-- form start -->
                <?php echo form_open('admin/kpiutang_save'); ?>
  				
  				<div class="form-group">
				<center><input type="text" id="invoice" class="form-control" readonly></center><br/>
  					<input type="hidden" name="idpiutang" id="idpiutang">
  					<label for="exampleInputEmail1">Nama Konsumen</label>
  					<input type="text" class="form-control" name="nmsupplier" id="nmsupplier" style="text-align:center;color:red;" readonly/>
  				</div>
  				<div class="form-group">
  					<label for="exampleInputEmail1">Total Pembelian</label>
  					<input type="text" class="form-control" name="totalbeli" id="totalbeli" style="text-align:center;color:red;" disabled/>
  				</div>
  				<div class="form-group">
  					<label for="exampleInputEmail1">Total Pembayaran</label>
  					<input type="text" class="form-control" name="totalbayar" id="totalbayar" style="text-align:center;color:red;" disabled />
  				</div>
  				<div class="form-group">
  					<label for="exampleInputEmail1">Sisa</label>
  					<input type="text" class="form-control" name="sisabayar" id="sisabayar" style="text-align:center;color:red;" disabled/>
  				</div>
				<div class="form-group">
  					<label for="exampleInputEmail1">Bayar</label>
  					<input type="text" class="form-control" name="bayarsisa" id="bayarsisa" style="text-align:center;color:black;font-weight:bolder;font-size:20px;" />
  				</div>
  				
  				
  				
  				<button type="submit" name="submit" class="btn btn-success" id="simpaneditpjl" value="edittrx"><i class="fa fa-save"></i> Simpan</button>
  				
  				<?php echo form_close(); ?>
  			</div>
  			<!-- end form edit -->	
		 
		 
        </section><!-- /.content -->
		
		
      </div><!-- /.content-wrapper -->

	  
	
<script type="text/javascript">

          $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });
      });

$( "#dialog:ui-dialog" ).dialog( "remove" );
   // $(".btnShow").live("click",function(){
    $('body').on('click', '.btnbayar', function(){
      var idpiutang = $(this).attr("idpiutang");
      var invoice = $(this).attr("invoice");
	  var nmsupplier = $(this).attr("nmsupplier");
	  var totalbeli = $(this).attr("totalbeli");
	  var totalbayar = $(this).attr("totalbayar");
	  var sisa = $(this).attr("sisa");
      $('#idpiutang').val(idpiutang);
	  $('#invoice').val(invoice);
	  $('#nmsupplier').val(nmsupplier);
	  $('#totalbeli').val(totalbeli);
	  $('#totalbayar').val(totalbayar);
	  $('#sisabayar').val(sisa);
      $('#dialogbayar').dialog('open');
      return false;
    });
    </script>
    <script>
    $(function () {
      $("#dialogbayar").dialog({
        modal: true,
        autoOpen: false,
        title: "Bayar Piutang"
      });
    });

</script>