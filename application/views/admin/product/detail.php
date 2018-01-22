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

				<table  class="table table-bordered table-hover dataTable" id="tables">
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
								<td><?= $key->productName ?></td>
								<td><?= $key->productBarcode ?></td>
								<td><?= $key->productSalePrice ?></td>
								<td><?= $key->productStock ?></td>
								<td></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>	
			</div>	
		</section>
	</div>	