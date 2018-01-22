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
			<div class="box-header with-border">
			<div class="col-lg-2 col-xs-6">
			<a class="btn btn-block btn-default" href="<?php echo base_url();?>permintaan/daftar_permintaan"><i class="fa fa-fw fa-backward"></i> Kembali </a>
			</div>
			</div>
			<div class="box-body">
			<?php echo form_open('permintaan/update_status_permintaan'); ?>
			 <?php  
			 foreach ($detail as $detail){
                ?>
					
				<div class="form-group">
				
										<input type="hidden" name="detailID" value="<?php echo $detail->detailID ?>">
										<input type="hidden" name="invoiceOrderID" value="<?php echo $detail->invoiceOrderID ?>">
										<label for="exampleInputEmail1">Nama Produk </label>
										<input type="text" class="form-control" name="name" value="<?php echo $detail->productName; ?>" />
										<label for="exampleInputEmail1">Jumlah </label>
										<input type="text" class="form-control" name="qty" value="<?php echo $detail->detailMutasiQty; ?>" />
									</div>
				</div>
				
            <?php } ?>
			<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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
