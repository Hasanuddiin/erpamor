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
				
				<center><h4 style="font-size:1.2em"><b>FAKTUR PENJUALAN</b></h4><br/><br/></center>
				
				<div class="col-md-12">
				<table width="50%" class="header">
				<tr>
					  <td width="120px;"><b><?php echo $idname; ?></b> </td></tr>
					  
					  <tr><td width="120px;"> <?php echo $idaddress; ?>, Telp : <?php echo $idphone; ?></td></td>
					  </tr>
				
				</table>
				<br/><br/>
				<table width="100%" class="header" cellspacing="0px" cellpadding="0px">
                      <tr>
					  <td width="120px;">Pelanggan :</td><td width="180px;" align="left"><b><?php echo $member; ?></b></td><td>No. Faktur :</td><td align="left"><?php echo $nofak; ?></td><td>Tgl Faktur :</td><td width="110px;" align="left"><?php echo $tgltrx; ?></td>
					  </tr>
					  <tr>
					  <td width="120px;">Alamat :</td><td align="left"><?php echo $alamat; ?> </td><td>No. PO :</td><td align="left"><?php echo $nopo; ?></td><td>Jatuh Tempo :</td>  <?php if($termin=="")
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
					  </tr>
					  <tr>
					  <td>No. Telp</td><td align="left"><?php echo $telp; ?></td><td>Zona</td><td align="left"><?php echo $zona; ?></td><td>Sales</td><td align="left"><?php echo $sales; ?></td>
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
						<th align="right">Bonus</th>
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
							<td align="right"><?php echo number_format($lihat->detailPrice); ?></td>
							<td align="right"><?php echo $lihat->detailQty; ?></td>
							<td align="right"><?php echo $lihat->detailbonus; ?></td>
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
							<td align="right"><?php echo number_format($lihat->detailSubtotal); ?></td>
                    	</tr>
						<?php endforeach; ?>
                    </tbody>
						<tr style="border:none;">
						<td colspan="4" style="border:none;"></td>
						<td colspan="2" align="right" ><b>TOTAL </b></td>
						<td align="right"><b><?php echo $totharga;?></b></td>
						</tr>
                    	
                  </table>
                  <br/><br/>
				  <table border="0" width="100%" valign="top" class="trxapp">
				  <tr>
				  <td >Bag. Gudang</td><td>Admin</td><td>Supervisor</td><td>Disetujui oleh</td><td>Pembeli</td>
                      <tr >
					  <td><?php echo $nama1;?></td><td><?php echo $nama2;?></td><td><?php echo $nama3;?></td>
					  <td><?php echo $nama4;?></td>
					  <td></td>
					  </tr>
					  <tr>
					  <td style="border-top:solid black thin;">Nama Jelas</td><td style="border-top:solid black thin;">Nama Jelas</td>
					  <td style="border-top:solid black thin;">Nama Jelas</td><td style="border-top:solid black thin;">Nama Jelas</td>
					  <td style="border-top:solid black thin;">Nama Jelas</td>
					 </tr>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
