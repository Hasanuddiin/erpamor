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
border-collapse: collapse;
}

table.trxapp tr,th,td {
border:1px solid #000;
}

table.trxapp td, th { padding:5px;text-align:left; }

.col-md-12{
}
</style>     
 <div class="col-xs-12">
 <center><h3>Stock Opname</h3></center>
 <h5>No SO : <?php echo $invoiceID; ?> , Tanggal : <?php echo $tgltrx; ?></h5></div>
<div class="content-wrapper">
<table class="trxapp">
        			 <thead>
      <tr>
        <th align="left">No.</th>
       <th align="left">Kode</th>
       <th width=200 align="left">Nama Produk</th>
       <th width=30 align="left">Sat</th>
       <th width=30 align="left">Jml</th>
       <th width=40 align="left">jml Real</th>
	   <th width=30 align="left">Selisih</th>
	   <th>Keterangan</th>
     </thead>
        				<tbody>
        					<?php  
							$no = 1;
        					foreach ($detail as $r):
        						?>
									
        					<tr>
							<td><?php echo $no++ ?></td>
        						<td><?php echo $r->productBarcode ?></td>
        						<td><?php echo $r->productName ?></td>
        						<td><?php echo $r->satuanName ?></td>
        						<td><?php echo $r->productStock ?></td>
        						<td><?php echo $r->realStock ?></td>
        					  <td><?php echo $r->selisih ?></td>
		                      <td><?php echo $r->keterangan ?></td>	
        							</tr>
        						<?php endforeach; ?>

        					</tbody>
        					
        				</table>
	</div>