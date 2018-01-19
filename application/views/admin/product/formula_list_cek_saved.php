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

	
		<?php echo form_open('product/plan_cek_save'); ?>
		<div class="box box-info">
			<div class="box-header with-border"> Status Produksi</div>
			<div class="box-body">

				<table id="example1" class="table table-bordered table-hover dataTable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kode Produksi</th>
							<th>Nama Produk</th>
							<th>Qty</th>
							<th>HPP</th>
							<th>Tanggal</th>
							<th>Status</th>							
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
								<td class="barcode"><?= $key->productionCode ?></td>
								<td class="barcode"><?= $key->produkName ?></td>
								<td><?= $key->produkQty ?></td>
								<td class="name"><?= number_format($key->produkHpp) ?></td>
								<td><?= $key->createdDate ?></td>
								<td>
								<?php if($key->planStat=='0')
								{
									?>
								<a href="<?php echo base_url(); ?>product/buat_formula_input_prod?produkID=<?php echo $key->produkID ?>&productionCode=<?php echo $key->productionCode ?>&qty=<?php echo $key->produkQty ?>&hpp=<?php echo $key->produkHpp ?>" class="btn btn-block btn-default btn-sm label-danger"> <i class="fa fa-plus-square"></i> Setujui</a>		
										<?php
								}
								else {
									?>
										
										<span class="label label-success">Sudah disetujui</span>
								<?php }
								?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					
				</div>	
			</div>
 <?php echo form_close(); ?>
		</section>
	</div>	




