<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i>Hutang Pembelian</a></li>
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
					</div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
						<th>Tgl</th>
                        <th>No. Faktur</th>
						
						<th>Nama Vendor</th>
						<th>Jumlah</th>
						<th>Cara Bayar</th>
				
						<th>Status</th>
						<th>Jatuh Tempo</th>
						<th>Aksi</th>
                    </thead>
                    <tbody>
						<?php  
                        $no = 1;
                        foreach ($khutang as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++; ?></td>
              <td><?php echo $lihat->trxDate; ?></td>
							<td><?php echo $lihat->invoiceOrderID; ?></td>
							<td><?php echo $lihat->trxFullName; ?></td>
							<td><?php echo number_format($lihat->trxTotal); ?></td>
              <td><?php if($lihat->trxStatus == '2')
              {
                echo "Termin";
              }
              else
              {
                echo "Cash";
              }?>

							</td>
							
              <td>
              <?php $today=date('Y-m-d') ?>
              <?php
              if($lihat->trxTerminDate >= $today)
              {
                echo "Belum Lunas";
              }
              else
              {
                echo "Lunas";
              }
              ?>

							</td>
							<td><?php echo $lihat->trxTerminDate; ?></td>
						
						
							
                        <td align="center">
                          <div class="btn-group" role="group">
                            <a href="" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                            <a href="" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                          </div>
                        </td>                  		
                    	</tr>
						<?php endforeach?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  <script type="text/javascript">

          $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
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
