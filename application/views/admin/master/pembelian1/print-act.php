<!-- Content Wrapper. Contains page content -->
<style>
.content-wrapper
{
	font-family:Arial, 'Helvetica Neue',Helvetica, sans-serif;
	font-size:11px;
}
p {
	line-height:1;
}

table.header {
border-collapse: collapse;
border-spacing: 0;
}
table.header tr,td { border: none; text-align:left; padding:2px; }

table.sum {
border-collapse: collapse;
border-spacing: 0;
}
table.sum th { border: 1px solid #4f4f4f; text-align:right; padding:2px; }

table.trxapp {
border-spacing: 5;
}
table.trxapp td, th { padding:5px;text-align:center; }

.col-md-12{
}
</style>     
	 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
         
          <ol class="breadcrumb">
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
				  
                  </h3>
                  <div class="box-tools">
                  
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
				<center><h4 style="font-size:1.4em"><b>PURCHASE ORDER</b></h4></center>
				<div class="col-md-12">
				<table width="100%" class="header">
				<tr>
					  <td width="180px;"> </td><td align="right"><b>Kepada YTH </b> </td>
					  </tr>
					  
					  <tr><td width="8;"> <?php echo $idaddress; ?>, Telp : <?php echo $idphone; ?></td><td align="right"><?php echo $trxfullname; ?><br/>
					  <?php echo $trxaddres; ?></td>
					  </tr>
				
				</table>
				<br/><br/>
				<table width="100%" class="header" cellspacing="0px" cellpadding="0px">
					  <tr>
					  <td width="120px;">No PO </td><td width="10px;">:</td><td><?php echo $nofak; ?></td>
					  <td width="120px;">Dikirim Ke  </td><td width="10px;">:</td><td><?php echo $member; ?></td>
					  </tr>
					  <tr>
					  <td width="120px;">Tanggal </td><td width="10px;">:</td><td><?php echo $tgltrx; ?></td>
					  <td width="120px;">Alamat </td><td width="10px;">:</td><td><?php echo $alamat; ?></td>
					  </tr>
					  <tr>
					  <td width="120px;">Jatuh Tempo </td><td width="10px;">:</td>  <?php if($termin=="")
					  {
						?>
					
						<td align="left">- (Cash)</td> 
					<?php
					 }
					  else
					  {
					  ?>
					  <?php
					  $today=date('Y-m-d');
					  $selisih = ((abs(strtotime ($termin) - strtotime ($today)))/(60*60*24)); ?>
					  <td align="left"><?php echo $termin; ?> ( <?php echo $selisih; ?> hari )</td>
					  <?php }
					  ?>
						   <td width="120px;">Telp </td><td width="10px;">:</td><td><?php echo $telp; ?></td>
					  </tr>
					 
                  </table>
				</div>
				
				<br/><br/>
                  <table class="sum" width="100%">
                    <thead>
                      <tr>
						<th width="300px" align="left">Nama Barang</th>
                        <th align="right">Harga</th>
						<th align="right">Qty</th>
						<th align="right">Satuan</th>
						<th align="right" width="70px">Diskon</th>
						<th align="right">Jumlah</th>
                    </thead>
                    <tbody>
                      <?php  
                        foreach ($detail as $lihat):
                        ?>
                    	<tr>
							<td align="left"><?php echo $lihat->productName; ?></td>
							<td align="right"><?php echo number_format($lihat->detailBuyPrice); ?></td>
							<td align="right"><?php echo $lihat->detailBuyQty; ?></td>
							<td align="right"><?php echo $lihat->satuanName; ?></td>
							<?php
												  if($lihat->productDiscounttype=="1")
												  {
												  ?>
												<td align="right"><?php echo $lihat->discPercent ?> %<b> </b></td>
												  <?php } 
												  else if($lihat->productDiscounttype=="2")
												  {
												  ?>
												<td align="right">- Rp. <?php echo number_format($lihat->discPercent) ?>
												</td>
												  <?php } 
												  else
												  {?>
													<td></td>
												  <?php } ?>
							<td align="right"><?php echo number_format($lihat->detailBuySubtotal); ?></td>
                    	</tr>
						<?php endforeach; ?>
                    </tbody>
						<tr style="border:none;">
						<td colspan="4" style="border:none;"></td>
						<td  align="right" ><b>TOTAL </b></td>
						<td align="right"><b><?php echo $totharga;?></b></td>
						</tr>
                    	
                  </table>
                  <br/><br/><br/><br/>
				  <table border="0" width="100%" valign="top" class="trxapp">
				  <tr><td></td><td></td>
				  <td></td><td></td>
				  <td >Cahaya Baru</td>
				  </tr>
					  <tr>
					  <td></td><td></td>
					  <td></td><td></td>
					  <td width=100 height=100>(........................)</td>
					 </tr>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
