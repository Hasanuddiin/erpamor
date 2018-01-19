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
				<a href="<?php echo base_url(); ?>product/tambah_product" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
			</h3>

		</div>

		<div class="box box-info">
			<div class="box-header with-border"> Daftar Produk</div>
			<div class="box-body">

				<table id="example1" class="table table-bordered table-hover dataTable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Produk</th>
							<th>Barcode</th>
							<th>Harga Product</th>
							<th>Stock Product</th>
							<th>aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 0;
						foreach ($list as $key) {
							$i++;
							?>
							<tr>
								<td><?= $i ?></td>
								<td class="name"><?= $key->productName ?></td>
								<td class="barcode"><?= $key->productBarcode ?></td>
								<td><?= $key->productSalePrice ?></td>
								<td><?= $key->productStock ?></td>
								<td>
									<button class="btnAdd btn-succes">+ tambah</button>
									<!-- <a href="<?php echo base_url().'product/tambah_product/'.$key->productID; ?>" onclick="javascript: return confirm('Apakah Anda akan Menambah Produk : <?php echo $key->productName; ?> ?')" class="btn btn-primary btn-sm"><i class="fa fa-cros"></i> tambah</a> -->
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>	
			</div>

			<div id="dialog_log" style="display: none" align = "center">
				 <?php echo form_open('product/tambah_product'); ?>
				<div class="form-group">
					<label>Jumlah Produk</label> <br/><small> <label id="label_nama"></label> </small>
					<input  type="hidden" class="form-control" name="barcode" id="barcode"  />
					<input  type="text" class="form-control" name="jum_pro"  />
				</div>
				<button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
				 <?php echo form_close(); ?>
			</div>

		</section>
	</div>	

	<script>

			$(document).ready(function(){

				$( ".btnAdd" ).on('click', function() {
					  var row = $(this).closest("tr");    // Find the row
                      var nama = row.find(".name").text(); // Find the text
                      var barcode = row.find(".barcode").text(); // Find the text
				// alert(id);
				$('#dialog_log').dialog('open');
				$('#label_nama').text(nama);
				$('#barcode').val(barcode);
				
			});


				$("#dialog_log").dialog({
					modal: true,
					autoOpen: false,
					maxWidth:300,
					maxHeight: 500,
					width: 350,
					height: 300,
					modal: true,

					title: "Tambah Product "
				});


			});
		</script>



