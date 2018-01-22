 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h4>
 			Transaksi dengan No SO : <?php echo $nofak; ?>, berhasil disimpan!
 		</h4>
 		<ol class="breadcrumb">
 			<li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
 			<li class="active"><?php echo $title; ?></li>
 		</ol>
 	</section>
 	<!-- Main content -->
 	<section class="content">
 		<?php $attribute = Array ("id" => "formtrxid","target" => "_blank");?>
 		<?php echo form_open('returpembelian/addtrt_nota_print/',$attribute); ?>
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
        	<table class="table table-bordered table-hover">
        		<center><h4>Detail Stock Opname</h4></center>
        		<tr>
        			<td>Nomor Stock opname</td><td><input type="text" class="form-control" name="nofak" value="<?php echo $nofak; ?>" readonly /> </td><td>Tanggal Stock opname</td><td><input type="text" class="form-control" name="tgltrx" value="<?php echo $tgltrx; ?>" readonly /></td>
        		</tr>
        		</table>

        		<table class="table table-bordered table-hover">
        			 <thead>
      <tr>
        <th>No.</th>
       <th>Kode</th>
       <th>Nama Produk</th>
       <th width=50>Satuan</th>
       <th width=50>Jumlah</th>
       <th width=80>Jumlah Real</th>
	   <th width=30>Selisih</th>
	   <th>Keterangan</th>
     </thead>
        				<tbody>
        					<?php  
							$no = 1;
        					foreach ($detail as $r):
        						?>
									
        					<tr>
							<td><?php echo $no++ ?></td>
        						<td><input type="text" class="form-control" name="nabar" value="<?php echo $r->productBarcode ?>" readonly /></td>
        						<td><input type="text" class="form-control" name="price" value="<?php echo $r->productName ?>" readonly /></td>
        						<td><input type="text" class="form-control" name="qty" value="<?php echo $r->satuanName ?>" readonly /></td>
        						<td><input type="text" class="form-control" name="sat" value="<?php echo $r->productStock ?>" readonly /></td>
        						<td><input type="text" class="form-control" name="sat" value="<?php echo $r->realStock ?>" readonly /></td>
        					  <td><?php echo $r->selisih ?></td>
		                      <td><?php echo $r->keterangan ?></td>	
        							</tr>
        						<?php endforeach; ?>

        					</tbody>
        					
        				</table>
					<a href="<?php echo base_url(); ?>opname/addso"  class="btn btn-primary"><i class="fa fa-plus-square"></i> Transaksi Baru</a>
        			</div><!-- /.box-body -->
        		</div>
        	</div>
        </div>
        

        <?php echo form_close(); ?>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
