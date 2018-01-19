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
			
			<a id="btnExport" class="btn btn-sm btn-success btn-flat"><i class="fa  fa-file-excel-o"></i> Export to excel</a>
												<div class="form-group">
                                        
                                        <div class="col-md-6" >
											<div class="form-group">
												<label for="exampleInputEmail1">Dari Tanggal:</label>
												<input type="text" id="diskondatestart" name="tanggal1" class="form-control" value="">
											</div>
										</div>
										<div class="col-md-6" >
											<div class="form-group">
												<label for="exampleInputEmail1">Sampai Tanggal	:</label>
												<input type="text" id="diskondatestop" name="tanggal2" class="form-control" value="">
											</div>
										</div>
										<a href="<?php echo base_url(); ?>pembelian/daftar_po_bytgl" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-play"></i> Go</a>
                                    </div>
			

				<table id="example1" id="table_wrapper" class="table table-bordered table-hover dataTable">
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
							<?php $i = 0; foreach ($list_buy as $data) { $i++; ?>

							<tr>
								<td><?= $i ?></td>
								<td class="nr"><?= $data->invoiceOrderID ?></td>
								<td><?= $data->trxFullName ?><br/><small><?= $data->trxAddress ?> (<?= $data->trxPhone ?>)</small></td>
								<td align="right"><?= number_format($data->trxTotal) ?></td>
								<td align="center"><?= date("d-m-Y", strtotime($data->trxDate)) ?></td>
								<td>
									<button class="btnShow1 btn btn-info btn-sm" id="btnShow1" ><i class="fa fa-search"></i> Detail</button>
									<a href="<?php echo base_url(); ?>pembelian/hapus_po/<?php echo $data->invoiceOrderID ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
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
					width: 900,
					height: 500,
					modal: true,

					title: "DETAIL"
				});


			});

			$(document).ready(function() {
 			 $("#btnExport").click(function(e) {
    			e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
});
		</script>
	</div>
