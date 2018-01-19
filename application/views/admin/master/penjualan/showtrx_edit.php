 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           Transaksi dengan No Faktur : <?php echo $nofak; ?>, berhasil disimpan!
          </h4>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <?php $attribute = Array ("id" => "formtrxid","target" => "_blank");?>
                <?php echo form_open('admin/addtpj_memberdetail_print/',$attribute); ?>
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
				  
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
				<table class="table table-bordered table-hover">
				 <center><h4>Detail Transaksi Pembelian</h4></center>
				 <tr>
					  <td>Nomor Faktur</td><td><input type="text" class="form-control" name="nofak" value="<?php echo $nofak; ?>" readonly /> </td><td>Tanggal Faktur</td><td><input type="text" class="form-control" name="tgltrx" value="<?php echo $tgltrx; ?>" readonly /></td>
					  </tr>
					  <tr>
					  <!-- <td>Nomor PO</td><td><input type="text" class="form-control" name="nopo" value="<?php echo $nopo; ?>" readonly /></td> -->
					  <input type="hidden" name="termin" value="<?php echo $termin;?>">
					  <?php if($termin=="")
					  {
						?>
					
						<td>CASH</td><td>-</td>
					<?php
					 }
					  else
					  {
					  ?>
					  <?php
					  $today=date('Y-m-d');
					  $selisih = ceil(((abs(strtotime ($termin) - strtotime ($today)))/(60*60*24))); ?>
					  <td width="70px">Tempo</td><td><?php echo $termin; ?> ( <?php echo $selisih; ?> hari )</td>
					  <?php }
					  ?>
					  </tr>
				</table>
					   
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<th width="30%">Nama Barang</th>
                        <th>Harga</th>
						<th>Qty</th>
						<th>Bonus</th>
						<th>Satuan</th>
						<th>Diskon</th>
						<th>Jumlah</th>
                    </thead>
                    <tbody>
                      	<?php  
                        foreach ($detail as $lihat):
                        ?>
                    	<tr>
							<input type="hidden" name="trxfullname" value="<?php echo $member;?>">
							<input type="hidden" name="trxaddres" value="<?php echo $trxAddress;?>">
							
							<td><input type="text" class="form-control" name="nabar" value="<?php echo $lihat->productName; ?>" readonly /></td>
							<td><input type="text" class="form-control" name="price" value="<?php echo number_format($lihat->detailPrice); ?>" readonly /></td>
							<td><input type="text" class="form-control" name="qty" value="<?php echo $lihat->detailQty; ?>" readonly /></td>
							<td><input type="text" class="form-control" name="bonus" value="<?php echo @$lihat->detailbonus; ?>" readonly /></td>
							<td><input type="text" class="form-control" name="sat" value="<?php echo $lihat->satuanName; ?>" readonly /></td>
							<input type="hidden" name="diskontype" value="<?php echo $lihat->productDiscounttype;?>">
							<input type="hidden" name="diskonpercent" value="<?php echo $lihat->discPercent;?>">
							<?php
												  if($lihat->productDiscounttype=="1")
												  {
												  ?>
												<td><?php echo $lihat->discPercent ?> %<b> </b></td>
												  <?php } 
												  else if($lihat->productDiscounttype=="2")
												  {
												  ?>
												<td>- Rp. <?php echo number_format($lihat->discPercent) ?>
												</td>
												  <?php } 
												  else
												  {?>
													<td></td>
												  <?php } ?>
							<td><input  type="text" class="form-control" name="subtotal" value="<?php echo @number_format($lihat->detailSubtotal); ?>" readonly></td>
                    	</tr>
						<?php endforeach; ?>
						
                    </tbody>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td colspan="2"><b>TOTAL HARGA</b></td>
						<td><input  type="text" class="form-control" name="totharga" value="<?php echo $total;?>" style="font-weight:bold; font-size:1.7em;" readonly></td>
						</tr>
                    	
                  </table>
				   <a href="<?php echo base_url(); ?>admin/showtrxpj/"  class="btn btn-primary"><i class="fa fa-list"></i> Daftar Transaksi</a>
				 
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        
		
		 <?php echo form_close(); ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
