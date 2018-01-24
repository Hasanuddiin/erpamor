<!-- Content Wrapper. Contains page content -->
 <section class="">
          
            <div class="row">           
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
<style>
b,table tr td
{
  font-family:Arial, 'Helvetica Neue',Helvetica, sans-serif;
  font-size:12px;
width:200px;
word-wrap:break-word;
}
p {
  line-height:1;
}

table.header {
border-collapse: collapse;
border-spacing: 0;
}
table.header tr,td { border: none; text-align:left; padding:2px; }

</style>    
  
  
  
<table width="100%">

   <?php  
                        foreach ($perusahaan as $perusahaan):
                        ?>

                      <tr><img src="<?php echo base_url(); ?>assets/img/New-Logo.png" width="25%"></tr>
                      <tr>
              <td colspan="2" align="left"><center><b style="font-size:16px;font-weight:bolder;">LAPORAN PENDAPATAN</b></center></td>
                      </tr>
                      <tr>
              <td colspan="2" align="left"><center><b style="font-size:16px;font-weight:bolder;"><?php echo $perusahaan->identityName; ?></b></center></td>
                      </tr>
            <tr>
              <td colspan="2" align="left"><center><?php echo $perusahaan->identityAddress; ?></center></td>
              
                      </tr>
                        <tr>
              <td colspan="2" align="left"><center><?php echo $perusahaan->identityPhone; ?></center></td>
              
                      </tr>
            <?php endforeach; ?>
            </table>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       

        <!-- Main content -->
       
              
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
                
                  <table id="" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>Pendapatan Tanggal</th>
            <th>Bolu</th>
            <th>Djavamos</th>
            <th> Modern Cake</th>
            <th>Mochi</th>
            <th>Snack</th>
            <th>Cafe</th>
            <th>Cookies</th>
            <th>Jumlah </th>
           
                    </thead>
                 
                    <tbody>
                        <?php  
                        foreach ($data as $bolu):
                        ?>
                      <tr>
              <td><?php echo date($dateStart); ?> &nbsp;- &nbsp;<?php echo date($dateEnd); ?></td>
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
                       <table id="example1" class="table table-bordered table-hover dataTable">
            <th><h4><b>PEMBAYARAN DEBIT  &nbsp; :</b></h4> </th>
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
                      </table>
                      
                    </tbody>


                    </table>

                  </table>
                    </table>
                    
              <table id="example1" class="table table-bordered table-hover dataTable">
              <th><h4><b>TOTAL PENDAPATAN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4> </th>
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

              <th><h4><b>TOTAL CASH DI SETORKAN </b></h4> </th>
              <th> <h4> Rp.  <b><?php  echo number_format($real);?></b></h4></th>
         
                  </table>
           
         
                  </table>
                  <div align="right">
                  <td>Sukabumi&nbsp;&nbsp;</td><td align="left"><?php echo $trxDateprint; ?></td><br>
                  <table border="0" width="100%" valign="top" class="trxapp" align="right">
          <tr><td></td><td></td>
          <td></td><td></td>
          <td >Kepala Toko</td>
          </tr>
            <tr>
            <td></td><td></td>
            <td></td><td></td>
            <td width=100 height=100>(........................)</td>
           </tr>
           </table>

                  </div>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<script type="text/javascript">
      window.onload = function() { window.print();document.location.href =  "<?php  echo base_url('admin/showreporttoday'); ?>"; }
 </script>
 
 
 <script>
  window.onkeypress = function(e) {
    if ((e.which || e.keyCode) == 13) {
        $("#printfinish").click();
    }
}
  </script>
     