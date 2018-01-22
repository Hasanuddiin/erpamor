<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h3>
			<?php echo $title; ?>
		</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> </li>
			<li><a href="<?php echo base_url(); ?>penerimaan"> <?php echo $title; ?></a></li>
			<li class="active">Permintaan Keluar</li>
		</ol>
	</section>


	<section class="content">
		<div class="box box-info">
		
			<div class="box-header with-border"><h4>Daftar Permintaan Keluar</h4>
			</div>
			<div class="box-body">
			
			<div class="nav-tabs-custom">
					<table  class="table table-bordered table-hover dataTable" id="example1">
					<thead>
						<tr>
							<th>No.</th>
							<th>No. Permintaan</th>
							<th>Nama Petugas</th>
							<th>Tanggal Permintaan</th>
							<th>Status Permintaan</th>
							<th>Status Penyimpanan</th>
							<th>Detail Permintaan</th>

						</thead>
						<tbody>
							<?php $i = 0; foreach ($detail as $data) { $i++; ?>

							<tr>
								<td><?= $i ?></td>
								<td class="nr"><?= $data->invoiceOrderID ?></td>
								<td class="nr"><?= $data->nama_lengkap ?></td>
								<td align="center"><?= date("d-m-Y", strtotime($data->trxDate)) ?></td>
								<?php 
								$status=$data->order_status;
								$savestat=$data->mutasi_save_stat;
								
								if($savestat<>'1')
								{
									$savestat="<span class='label label-warning'>Belum Disimpan</span>";
								}
								else if($savestat=='1')
								{
								$savestat="<span class='label label-success'>Sudah Disimpan</span>";
								}
								
								
								if($status=='0')
								{
									$status="<span class='label label-warning'>Terkirim ( Pending )</span>";
								}
								else if($status=='1')
								{
								$status="<span class='label label-info'>Terkirim ( Diproses )</span>";
								}
								if($status=='2')
								{
									$status="<span class='label label-success'>Disetujui</span>";
								}
								if($status=='3')
								{
									$status="<span class='label label-danger'>Ditolak</span>";
								}

								?>
								<td><?php echo $status; ?></td>
								<td><?php echo $savestat; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>permintaan/detail_permintaan?orderID=<?php echo $data->invoiceOrderID ?>&supplierID=<?php echo $data->supplierID ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-search"></i> Detail</a>
								</td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
				  </div><!-- nav-tabs-custom -->
				  
				</div>
				


			</div>

			<div id="dialog1" style="display: none" align = "center">
				<div id="resultdiv">
				<div class="col-lg-2 col-xs-6">
			</div>
				</div>
			</div>

		</section>

		<script>

			$(document).ready(function(){

				$( ".btnShow1" ).on('click', function() {
					  var row = $(this).closest("tr");    // Find the row
                      var id = row.find(".nr").text(); // Find the text
				// alert(id);
				$('#dialog1').dialog('open');
				$.ajax({
					type:'POST',

					url:'<?php echo base_url("pembelian/pop_detail/"); ?>',
					data:{'id':id},
					success:function(data){
						$('#resultdiv').html(data);
					}
				});
			});


				$("#dialog1").dialog({
					modal: true,
					autoOpen: false,
					maxWidth:900,
					maxHeight: 500,
					width: 800,
					height: 500,
					modal: true,

					title: "DETAIL"
				});


			});
		</script>
	</div>






