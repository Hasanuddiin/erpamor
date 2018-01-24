<!-- Content Wrapper. Contains page content -->
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
          		<div class="box">
                <div class="box-header">
                 
               <form method="post">
          <div class="form-group col-md-6">
            
            <div class="input-group">
              <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
              
              </div>
            <input type="text" name="date" class="form-control pull-right active" id="reservation" required>

          </div>
                <!-- /.input group -->
          </div>
          <button type="submit" class="btn btn-danger btn-flat" name="display">GO</button>
          <button type="submit" class="btn btn-danger btn-flat" name="cetak">Print</button>
          <a href="<?php echo base_url(); ?>admin/printpendapatan" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak </a> 
             
          
        </form>
                  <div class="box-tools" >

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
                <p><b>Pendapatan dari tanggal &nbsp;: &nbsp;</b><?php echo date($dateStart); ?><br>
                <b>Sampai Tanggal &nbsp;&nbsp; : &nbsp;</b><?php echo date($dateEnd); ?></p>
                  <table id="" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						
            <th>Bolu</th>
            <th>Djavamos</th>
            <th> Modern Cake</th>
            <th>Mochi</th>
            <th>Sncak</th>
            <th>Cafe</th>
            <th>Cookies</th>
						<th>Jumlah </th>
           
                    </thead>
                    <tbody>
                      	<?php  
                        foreach ($data as $bolu):
                        ?>
                    	<tr>
						
							<td><?php echo number_format($bolu->jumlah);?></td>
						        <?php endforeach ?>
                    <?php  
                    $totalBolu = $bolu->jumlah;
                        foreach ($dataDjavamous as $Djavamous):
                        ?>
                      
              <td><?php echo number_format($Djavamous->jumlahDjavamous);?></td>
                    <?php 
                      $totalJavamos = $Djavamous->jumlahDjavamous;
                    endforeach ?>
						          
                      <?php  
                        foreach ($dataModernCake as $ModernCake):
                        ?>
                      
              <td><?php echo number_format($ModernCake->jumlahModernCake);?></td>
                    <?php 
                      $totalMc = $ModernCake->jumlahModernCake;
                    endforeach ?>

                     <?php  
                        foreach ($dataMochi as $Mochi):
                        ?>
                      
              <td><?php echo number_format($Mochi->jumlahMochi);?></td>
                    <?php 
                      $totalMochi = $Mochi->jumlahMochi;
                    endforeach ?>

                    <?php  
                        foreach ($dataSnack as $Snack):
                        ?>
                      
              <td><?php echo number_format($Snack->jumlahSnack);?></td>
                    <?php 
                      $totalSnack = $Snack->jumlahSnack;
                    endforeach ?>

                     <?php  
                        foreach ($dataCafe as $Cafe):
                        ?>
                      
              <td><?php echo number_format($Cafe->jumlahCafe);?></td>
                    <?php 
                    $totalCafe = $Cafe->jumlahCafe;
                    endforeach ?>

                    <?php  
                        foreach ($dataCookies as $Cookies):
                        ?>
                      
              <td><?php echo number_format($Cookies->jumlahCookies);?></td>
                    <?php 
                    $totalCookies = $Cookies->jumlahCookies;
                    endforeach ?>
                      
                      <td><b><?php echo number_format($totalCookies+$totalCafe+$totalSnack+$totalMochi+$totalMc+$totalJavamos+ $totalBolu) ;?></b></td>
                            		
                    	</tr>
                    	
                    </tbody>
                     <table  id="" class="table table-bordered table-hover dataTable">
                       
                        
                            <thead>
                      <tr>
            <th><h4><b>Pembayaran Debit  &nbsp; :</b></h4> </th>
            <th>Debit BCA</th>
            <th>Debit Mandiri</th>
            <th>Jumlah Debit </th>
           
                    </thead>
                    <tbody>
                        
                      <tr>
              <td> &nbsp;</td>
              <?php  
                foreach ($debit_bca as $bca):
                        ?>
              <td><?php echo number_format($bca->totalBca);?></td>

              <?php  
                        endforeach;
           
                        ?>

              <?php  
                        foreach ($debit_mandiri as $mandiri):
                        ?>
              <td> <?php echo number_format($mandiri->totalMandiri);?></td>
               <?php  
                        endforeach;
           
                        ?>

               <td><h4> Rp.  <b><?php foreach($close_debit as $data): 
                            echo number_format($data->totalDebit); 
                             ?></b></h4></td>
            
              <?php  
                        endforeach;
                        $Debit=$data->totalDebit;
                        ?>
            
              
                                
                      </tr>
                      
                    </tbody>


                    </table>

                  </table>
                    </table>
                    
              <table id="example1" class="table table-bordered table-hover dataTable">
              <th><h4><b>TOTAL PENDAPATAN  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4> </th>
              <th> <h4> Rp.  <b><?php foreach($totalTodayPenBakery as $data): 
            echo number_format($data->Totaltoday);?></b></h4></th>
            <?php  
                        endforeach;
                        $TotalPendapatan=$data->Totaltoday;
                        ?>
              <table id="example1" class="table table-bordered table-hover dataTable">

                      <?php  
                       $real=$TotalPendapatan-$Debit;
                        ?>

              <th><h4><b>TOTAL CASH DI STRORKAN :</b></h4> </th>
              <th> <h4> Rp.  <b><?php  echo number_format($real);?></b></h4></th>
         
                  </table>
           
         
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
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
</script>