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
			</div>
			<div class="box-body">
			
			<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Permintaan Masuk </a></li>
					  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Permintaan Keluar </a></li>
					</ul>
					<div class="tab-content">
					  <div class="tab-pane active" id="tab_1">
					<?php $this->load->view('admin/master/permintaan/per_masuk'); ?>
					  </div><!-- /.tab-pane -->
					  
					  <div class="tab-pane" id="tab_2">
						 <?php $this->load->view('admin/master/permintaan/per_keluar'); ?>
					  </div><!-- /.tab-pane -->
					
					</div><!-- /.tab-content -->
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
