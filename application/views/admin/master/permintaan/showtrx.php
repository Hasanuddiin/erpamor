 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h4>
 			Permintaan dengan No  : <?php echo $nofak; ?>, berhasil disimpan!
 		</h4>
 		<ol class="breadcrumb">
 			<li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
 			<li class="active"><?php echo $title; ?></li>
 		</ol>
 	</section>
 	<!-- Main content -->
 	<section class="content">
 		<?php $attribute = Array ("id" => "formtrxid","target" => "_blank");?>
 		<?php echo form_open('pembelian/addtpm_memberdetail_print/',$attribute); ?>
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
        		<center><h4>Detail Transaksi Permintaan</h4></center>
        		<tr>
        			<td>Nomor Permintaan</td><td><input type="text" class="form-control" name="nofak" value="<?php echo $nofak; ?>" readonly /> </td><td>Tanggal </td><td><input type="text" class="form-control" name="tgltrx" value="<?php echo $tgltrx; ?>" readonly /></td>
        		</tr>
        		</table>

        		<table class="table table-bordered table-hover">
        			<thead>
        				<tr>
        					<th width="30%">Nama Barang</th>
        					<th>Qty</th>
        					<th>Satuan</th>
        					
        				</thead>
        				<tbody>
        					<?php  
        					foreach ($detail as $lihat):
        						?>
        					<tr>
        						
        						<td><input type="text" class="form-control" name="nabar" value="<?php echo $lihat->productName; ?>" readonly /></td>
        						
        						<td><input type="text" class="form-control" name="qty" value="<?php echo $lihat->detailMutasiQty; ?>" readonly /></td>
        						
        						<td><input type="text" class="form-control" name="sat" value="<?php echo $lihat->satuanName; ?>" readonly /></td>
        						
        					</tr>
        						<?php endforeach; ?>

        					</tbody>
        					
        				</table>

        				<div class="col-md-4">
        					<?php  
        					foreach ($perusahaan as $perusahaan):
        						?>
        					<input type="hidden" name="idname" value="<?php echo $perusahaan->identityName;?>">
        					<input type="hidden" name="idaddress" value="<?php echo $perusahaan->identityAddress;?>">
        					<input type="hidden" name="idphone" value="<?php echo $perusahaan->identityPhone;?>">
        					<input type="hidden" name="idmail" value="<?php echo $perusahaan->identityEmail;?>">
        				<?php  endforeach ?>
        			</div>
        			<div class="col-md-12">
        				<hr/>

        				
        			</div>


        		
        			</div><!-- /.box-body -->
        		</div>
        	</div>
        </div>
        

        <?php echo form_close(); ?>
         <a href="<?php echo base_url(); ?>permintaan/daftar_permintaan_keluar" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-left"></i> OK</a>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
