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
			<div class="col-lg-12 col-xs-12">
			<div class="col-lg-2 col-xs-6">
			<div class="row no-print">
			<a class="btn btn-block btn-warning" href="<?php echo base_url();?>permintaan/daftar_permintaan"><i class="fa fa-fw fa-backward"></i> Kembali </a>
			</div>
			</div>
			<div class="col-lg-12 col-xs-12">
			<h2 class="page-header">

                                <b>FORM PERMINTAAN BARANG</b>
                                
                            </h2>
					<img align="right" src="<?php echo base_url(); ?>assets/img/New-Logo.png" width="25%">
			
			<br>

			<div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                        <?php echo form_open('permintaan/update_status_permintaan'); ?>
                            <b >Permintaan Dari : </b>
                            <address>
                              
                                <table align="left">

   <?php  
                        foreach ($detailsuppmasuk as $perusahaan):
                        ?>

                   
                      
             <b><?php echo $perusahaan->identityName; ?></b></br>
              <?php echo $perusahaan->identityAddress; ?></br>        
              <?php echo $perusahaan->identityPhone; ?></br>
              <?php echo $perusahaan->identityEmail; ?></br>
              
                     
            <?php endforeach; ?>
            </table>
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                     
                     
                          

                        
                     
                            </address>
                        </div><!-- /.col --
                        
                    </div><!-- /.row -->

			
<br/> 
			<p class="text-green"><b></b></p>
			</div>
			</div>
			</div>
			<div class="box-body">
 			<div class="col-xs-12 table-responsive">
				<table class="table table-striped">
					 <thead>
      <tr>
       <th>No.</th>
       <th>Kode</th>
       <th>Nama Produk</th>
       <th>Satuan</th>
       <th>Qty</th>
     </thead>
     <tbody>
       <?php  
       $no = 1;
       $total=0;
       foreach ($detail as $r){

        ?>
      <tr class="gradeU">
        <td><?php echo $no++ ?></td>
        <td><?php echo $r->productBarcode ?></td>
        <td><?php echo $r->productName ?></td>
        <td><?php echo $r->satuanName ?></td>
        <td><?php echo $r->detailMutasiQty ?></td>
        
      
      </tr>
	  <?php } ?>
      
   
						</tbody>
					</table>
					<div class="row no-print">
						<div class="col-lg-3 col-xs-6">
									<div class="form-group has-warning">
									<input type="hidden" name="invoiceOrderID" value="<?php echo $r->invoiceOrderID ?>">
  										<label>Proses Permintaan :</label>
  										<select name="prosesperm" class="form-control">
											<option value="1" >Diproses</option>
  											<option value="3" >Ditolak</option>
  											<option value="2" >Disetujui</option>
  											<option value="3" >Ditolak</option>
  										</select>
  									</div>
									</div>
									<div class="col-lg-3 col-xs-6">
									<label>keterangan</label>
									<div class="form-group has-warning">
									<textarea name="keterangan" class="form-group"></textarea>
  									</div>
									</div>
									<div class="col-lg-3 col-xs-6">
									<div class="form-group has-warning">
									<br/>
								</div>
  										<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Proses</button>
  										<button class="btn btn-danger" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
  									</div>
  										
								
					
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
