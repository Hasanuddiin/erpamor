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
				
				<h4 style="font-size:1.4em"><b>SLIP GAJI</b></h4><br/><br/>
				
				<div class="col-md-12">
				
				<table width="100%" class="sum" width="100%">
                      <tr>
					  <td width="50px;">Nama :</td><td width="180px;" align="left"><b><?php echo $nama; ?></b></td>
					  </tr>
					  <tr>
					  <td width="50px;">Kantor/Cabang :</td><td align="left"><?php echo $kantor; ?> </td>
					  </tr>
					  <tr>
					  <td>Posisi/Level/Gol</td><td align="left"><?php echo $posisi; ?></td>
					  </tr>
		
                  </table>
				</div>
				
				<br/><br/>
                  <table width="70%" class="sum" width="100%">
                    <thead>
                      <tr>
						<th  align=left width=8>No.</th>
                        <th  align=left>Komponen Gaji</th>
						<th align=left align=left width=108>Nilai</th>
                    </thead>
                    <tbody>
						<?php 
			
						if($datagaji) {
                        $no = 1;
                        foreach ($datagaji as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->nama_komponen; ?></td>
							<?php if($lihat->iskalihari=="1")
							{
								$nilaihari=($jumlah/26)*$lihat->nilai;
							}
							else
							{
								$nilaihari=$lihat->nilai;
							}
							
							$totalkomponengaji=$totalkomponengaji+$nilaihari;
								?>
							<td align=right>
							<?php echo number_format($nilaihari); ?>
							</td>
							  		
                    	</tr>
                    	<?php endforeach; }?>
					 </tbody>
					 <?php if($total>0){?>
					 <tr><td></td> <td  align=right>Total Lembur <i>(<?php echo $total; ?> Jam)</i></td><td align=right><?php echo $totallembur; ?></td></tr>
					 <?php } ?>
					  <?php if($totalbonus>0){?>
					 <tr><td></td> <td  align=right>Total Bonus</td><td align=right><?php echo $totalbonus; ?></td></tr>
					 <?php } ?>
					  <?php if($totalpot>0){?>
					 <tr><td></td> <td  align=right>Total Potongan</td><td align=right><?php echo $totalpot; ?></td></tr>
					<?php } ?>
				 <tr><td></td> <td  align=right><b>Total Gaji</b></td><td align=right><b style="font-size:14px;"><?php echo $totalgaji; ?></b></td></tr>
				 </table>
				 
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
