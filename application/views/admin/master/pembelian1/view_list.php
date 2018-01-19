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
		<div class="box box-info">
			<div class="box-header with-border"> Daftar Penerimaan</div>
			<div class="box-body">

				<table  class="table table-bordered table-hover dataTable" id="tables">
					<thead>
						<tr>
							<th>No.</th>
							<th>Invoice Order</th>
							<th>Supplier</th>
							<th>Total Pemberlian</th>
							<th>Tanggal Penerimaan</th>
							<th>aksi</th>

						</thead>
						<tbody>
							<?php $i = 0; foreach ($list_buy as $data) { $i++; ?>

							<tr>
								<td><?= $i ?></td>
								<td class="nr"><?= $data->invoiceOrderID ?></td>
								<td><?= $data->trxFullName ?><br/><small><?= $data->trxAddress ?> (<?= $data->trxPhone ?>)</small></td>
								<td align="right"><?= number_format($data->trxTotal) ?></td>
								<td align="center"><?= date("d-m-Y", strtotime($data->trxDate)) ?></td>
								<td>
									<button class="btnShow1 btn btn-info btn-sm" id="btnShow1" ><i class="fa fa-search"></i> Detail</button>
								</td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				


			</div>

			<div id="dialog1" style="display: none" align = "center">
				<div id="resultdiv"></div>
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
