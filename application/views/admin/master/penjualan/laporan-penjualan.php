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
                <a href="<?php echo base_url(); ?>admin/printpendapatan" class="btn btn-sm btn-success btn-flat"><i class="fa fa-print"></i> Cetak </a>  
                <div class="">
                    <label for="exampleInputEmail1">Cari berdasarkan tanggal &nbsp; : </label>
                    <input type="text" align="center" class="form" name="haritanggal" id="tgllahir" width="30" height="20" >
                  </div>
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
						<th>Tanggal</th>
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
							<td><?php echo date('d / M / y'); ?></td>
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

      
