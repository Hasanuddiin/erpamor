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
				<a href="<?php echo base_url(); ?>product/tambah_product" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah Produk</a>

				<a href="<?php echo base_url(); ?>product/tambah_product_paketan" class="btn btn-sm btn-success btn-flat"><i class="fa fa-edit"></i> Buat Paketan Produk</a>
			</h3>

		</div>

		<div class="box box-info">
			<div class="box-header with-border"> Daftar Produk</div>
			<div class="box-body">

				<table id="example1" class="table table-bordered table-hover dataTable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Kategori</th>
							<th>HPP</th>
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
								<td class="name"><?= $key->produkID ?></td>
								<td class="barcode"><?= $key->produkName ?></td>
								<td><?= $key->categoryName ?></td>
								<td><?= number_format($key->produkHpp) ?></td>
								<td>
								<a href="<?php echo base_url(); ?>product/buat_formula?produkID=<?php echo $key->produkID ?>" class="btn btn-sm btn-primary btn-flat"> <i class="fa fa-plus-square"></i> Hitung HPP</a>
								<?php if($key->ismaster=='1')
								{
								}
								else { ?>
								<a href="<?php echo base_url(); ?>product/buat_master_produk?produkID=<?php echo $key->produkID ?>&produkName=<?php echo $key->produkName ?>" class="btn btn-sm btn-warning btn-flat"> <i class="fa fa-plus-square"></i> Simpan Di Master Produk</a>	
								<?php } ?>
								<?php if($key->ismaster=='1')
								{
								}
								else { ?>
								<a href="<?php echo base_url(); ?>product/buat_master_bahan?produkID=<?php echo $key->produkID ?>&produkName=<?php echo $key->produkName ?>" class="btn btn-sm btn-success btn-flat"> <i class="fa fa-plus-square"></i> Simpan Di Master Bahan</a>	
								<?php } ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>	
			</div>

		</section>
	</div>	




