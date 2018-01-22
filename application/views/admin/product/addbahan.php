<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h3>
			<?php echo $title; ?>
		</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> </li>
			<li><a href="<?php echo base_url(); ?>penerimaan"> <?php echo $title; ?></a></li>
			<li class="active">add</li>
		</ol>
	</section>


	<section class="content">

		<div class="box-header">
			<h3 class="box-title">

			</h3>

		</div>

		<div class="box box-info">
			<div class="box-header">
				<div class="form-group">
					<input type="hidden" name="id" >
					<div class="col-md-6">
					<label for="exampleInputEmail1">Nama Produk</label>
					<input  type="text" class="form-control" name="productName" value="<?=  $productname;?>" readonly />
					</div>
					<div class="col-md-4">
					<label for="exampleInputEmail1">Kode</label>
					<input  type="text" class="form-control" name="productBarcode" value="<?= $productplanKode; ?>" readonly/>
					</div>
				</div>
				
			</div>
			<div class="box-body">
				<div class="col-md-12">
					<?php echo form_open('product/BahanProduct'); ?>
					<div class="col-md-6">
						<div class="form-group has-warning">
							Kode Bahan - Nama Bahan : 
							<input type="text" class="form-control" name="idbahan" id="idbahan" value="" onClick="this.value='';" autofocus />
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<p>Stok di gudang : <input class="form-control" type="text" name="stokgudangbahan" id="stokgudangbahan"  readonly/></p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group has-warning">
							QTY :
							<input type="text" class="form-control" name="qtybahan" id="qtybahan" value="1" onClick="this.value='';"/>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group has-warning"><br/>
							<button type="submit" name="submit" class="btn btn-success" value="tambah_bahan" id="submittambahbahan">
								<i class="fa fa-plus"></i> Tambah</button>
							</div>
						</div>
					</div>
					<?php echo form_close(); ?>
					<div class="col-md-12">

						<div class="box-body table-responsive no-padding">

							<table  class="table table-bordered table-hover dataTable">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kode</th>
										<th>Nama Bahan</th>
										<th>Satuan</th>
										<th>Qty</th>
										<th>Aksi</th>
									</thead>
									<tbody>

										<?php 
// var_dump($bahan_produk);
											$trxDate = date('d-m-Y');

										$i = 0;
										foreach ($bahan_produk as $key) {
											$i++;
											?>
											<tr>
												<td><?= $i ?></td>
												<td><?= $key->bahanBarcode ?></td>
												<td><?= $key->bahanName ?></td>
												<td><?= $key->bahanSat ?></td>
												<td><?= $key->bahanStock ?></td>
												<td>
													<a href="<?php echo base_url(); ?>" onclick="javascript: return confirm('Anda akan menghapus item : <?php echo $key->bahanName; ?> ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<?php echo form_open('product/SelesaiTambah'); ?>
								<button type="submit" name="submit" class="btn btn-success" value="tambah_bahan" id="submittambahbahan">Selesai</button>
								<?php echo form_close(); ?>

							</div>

							<script type="text/javascript">
							$(function () {
								$("#idbahan").autocomplete({    
									minLength:0,
									delay:0,
									source:'<?php echo site_url('auto/get_bahan'); ?>',   
									select:function(event, ui){
										$('#kodebahan').val(ui.item.label);
										$('#keybahan').val(ui.item.idbahan);
										$('#satuanbahan').val(ui.item.satuanbahan);
										$('#stokgudangbahan').val(ui.item.stokbahan);
										$('#bahanBarcode').val(ui.item.bahanBarcode);
										$('#bahanBuyPrice').val(ui.item.bahanBuyPrice);
									}
								});
							});
							</script>
						</div>	
					</div>	
				</section>
			</div>	