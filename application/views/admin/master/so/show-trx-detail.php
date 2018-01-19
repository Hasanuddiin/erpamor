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
                  <div class="box-tools">


                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <div class="col-xs-12"><h5>No SO : <?php echo $invoiceID; ?></h5><?php echo $tgltrx; ?></div>
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
                  <a href="<?php echo base_url(); ?>opname/so_list_detail_print?noSO=<?php echo $invoiceID ?>&tgltrx=<?php echo $tgltrx ?>" class="btn btn-sm btn-warning btn-flat"> Print</a>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
