 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h4>
 			Transaksi dengan No Retur : <?php echo $nofak; ?>, berhasil disimpan!
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
        			<td>Nomor Retur</td><td><input type="text" class="form-control" name="nofak" value="<?php echo $nofak; ?>" readonly /> </td><td>Tanggal Retur</td><td><input type="text" class="form-control" name="tgltrx" value="<?php echo $tgltrx; ?>" readonly /></td>
        		</tr>
        		</table>

        		<table class="table table-bordered table-hover">
        			<thead>
        				<tr>
        					<th width="30%">Nama Barang</th>
        					<th>Harga</th>
        					<th>Qty</th>
        					<th>Satuan</th>
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
        						<td><input type="text" class="form-control" name="price" value="<?php echo number_format($lihat->detailReturPrice); ?>" readonly /></td>
        						<td><input type="text" class="form-control" name="qty" value="<?php echo $lihat->detailReturQty; ?>" readonly /></td>
        						<td><input type="text" class="form-control" name="sat" value="<?php echo $lihat->satuanName; ?>" readonly /></td>
        						
        								<td><input  type="text" class="form-control" name="subtotal" value="<?php echo @number_format($lihat->detailReturSubtotal); ?>" readonly></td>
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

        				
        			<div class="col-md-12">
        				<hr/>
						<div class="col-md-2">No PO : </div>
						<div class="col-md-4">
						<input type="text" class="form-control" name="noPO" value="<?php echo $noPO;?>" readonly />
						</div>
        				<table class="table table-bordered table-hover">
							<?php  
        					foreach ($membersupplier as $membersupplier):
        						?>

        					<tr>
        						<tr>
        							<td colspan="2"><b>INFORMASI SUPPLIERS</b></td><td colspan="2"></td>
        						</tr>
        						<td>Supplier</td><td><input type="text" class="form-control" name="supname" value="<?php echo $membersupplier->supplierName;?>" readonly />
        					</tr>
        					<tr>
        						<td>Alamat</td><td><input type="text" class="form-control" name="supaddress" value="<?php echo $membersupplier->supplierAddress;?>" readonly /></td>
        						
        					</tr>
        					<tr>
        						<td>No Telp</td><td><input type="text" class="form-control" name="suptelp" value="<?php echo $membersupplier->supplierPhone;?>" readonly /></td>
        						
        					</tr>
        				<?php  endforeach ?>
							<tr>
        						<td colspan="4">
        							<button type="submit" name="submit" class="btn btn-warning" value="trxprint"><i class="fa fa-print"></i> Cetak Nota Retur</button>
        							<a href="<?php echo base_url(); ?>returpembelian/addtrt"  class="btn btn-primary"><i class="fa fa-plus-square"></i> Transaksi Baru</a>
        						</td>
        					</tr>
        				</table>
        			</div>
					
        			</div><!-- /.box-body -->
        		</div>
        	</div>
        </div>
        

        <?php echo form_close(); ?>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
