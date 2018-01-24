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
					  <td width="180px;"><b><?php echo $idname; ?></b> </td><td align="right"><b>Kepada YTH </b> </td>
					  </tr>
					  
					  <tr><td width="8;"> <?php echo $idaddress; ?>, Telp : <?php echo $idphone; ?></td><td align="right"><?php echo $member; ?><br/>
					  <?php echo $zona; ?></td>
					  </tr>
				
				</table>
				<br/><br/>
				<table width="100%" class="header" cellspacing="0px" cellpadding="0px">
					  <tr>
					  <td width="120px;">No PO </td><td width="10px;">:</td><td><?php echo $nofak; ?></td>
					  </tr>
					  <tr>
					  <td width="120px;">Tanggal </td><td width="10px;">:</td><td><?php echo $tgltrx; ?></td>
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
					  </tr>
					 
                  </table>
				</div>
				
				<br/><br/>
                  <table border="1" class="sum" width="100%">
                    <thead >
                      <tr>
						<th width="304" align="left">Nama Barang</th>
                        <th width="80" align="right">Harga</th>
						<th width="40" align="right">Qty</th>
						<th width="53" align="right">Satuan</th>
						<th width="63" align="right">Jumlah</th>
                    </thead>
                    <tbody >
                      <?php  
                        foreach ($detail as $lihat):
                        ?>
                    	<tr>
							<td align="left"><?php echo $lihat->bahanName; ?></td>
							<td align="right"><?php echo number_format($lihat->detailBuyPrice); ?></td>
							<td align="right"><?php echo $lihat->detailBuyQty; ?></td>
							<td align="right"><?php echo $lihat->satuanName; ?></td>
							
							<td align="right"><?php echo number_format($lihat->detailBuySubtotal); ?></td>
                    	</tr>
                        </table>
                        <table border="0" class="sum" width="100%">
						<?php endforeach; ?>
                   
						<tr style="border:none;">
						<td style="border:none;"></td>
                        <td width="8%"></td>
                        <td width="50%"></td>
						<td width="18%"  align="right" ><h3>TOTAL </h3></td>						
						<td width="19%" align="right"><h3>Rp.&nbsp;<?php echo $totharga;?></h3></td>
						</tr>
                    	
                  </table>
                  <br/><br/><br/><br/>
				  <table border="0" width="100%" valign="top" class="trxapp">
				  <tr><td></td><td></td>
				  <td></td><td></td>
				  <td >Purchasing</td>
				  </tr>
					  <tr>
					  <td></td><td></td>
					  <td></td><td></td>
					  <td width=100 height=100>Ade Nurbayan</td>
					 </tr>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
