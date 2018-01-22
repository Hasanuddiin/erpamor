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

			<div class="box-header with-border"> Daftar Pembelian Barang</div>

			<div class="box-body">



				<table  class="table table-bordered table-hover dataTable" id="tables">

					<thead>

						<tr>

							<th>No.</th>

							<th>No PO</th>

							<th>Supplier</th>

							<th>Total Pembelian</th>

							<th>Tanggal PO</th>

							<th>aksi</th>



						</thead>

						<tbody>

							<?php 
							$no = 1;
							foreach ($list_buy_tgl as $data): ?>

							<tr>

								<td><?php echo $no++ ?></td>

								<td class="nr"><?php echo $data->invoiceOrderID ?></td>

								<td><?php echo $data->trxFullName ?><br/><small><?php echo $data->trxAddress ?> (<?php echo $data->trxPhone ?>)</small></td>

								<td align="right"><?php echo number_format($data->trxTotal) ?></td>

								<td align="center"><?php echo date("d-m-Y", strtotime($data->trxDate)) ?></td>

							
								<td>

									<button class="btnShow1 btn btn-info btn-sm" id="btnShow1" ><i class="fa fa-search"></i> Detail</button>

									<a href="<?php echo base_url(); ?>pembelian/hapus_po/<?php echo $data->invoiceOrderID ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>

								</td>

								<?php endforeach; ?>
								

							</tr>

							

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

					width: 900,

					height: 500,

					modal: true,



					title: "DETAIL"

				});





			});

		</script>

	</div>

