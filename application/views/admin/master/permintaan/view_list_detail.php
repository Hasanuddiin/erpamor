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
			<a class="btn btn-block btn-default" href="<?php echo base_url();?>permintaan/daftar_permintaan"><i class="fa fa-fw fa-backward"></i> Kembali </a>
			</div>
			<div class="col-lg-12 col-xs-12">
<br/> <h3 style="font-size:18px;">Permintaan Kepada : 
			<p class="text-green"><b><?php  
       foreach ($detailsupp as $r) {
		   echo $r->identityName;
	   }

        ?></b></p></h3>
			</div>
			</div>
			</div>
			<div class="box-body">
  <?php echo form_open('permintaan/savepermintaan/'); ?>
				<table  class="table table-bordered table-hover dataTable" id="example1">
					 <thead>
      <tr>
       <th>No.</th>
       <th>Kode</th>
       <th>Nama Produk</th>
       <th>Satuan</th>
       <th>Qty</th>
       <th>Aksi</th>
     </thead>
     <tbody>
       <?php  
	   
	    foreach ($detail2 as $r2):
	    $statussave=$r2->mutasi_save_stat;
	   endforeach ?>
	   
		   <?php
       $no = 1;
       $total=0;
       foreach ($detail as $r):
       $keterangan=$r->keterangan;
	   $status=$r->order_status;
	  
        ?>
      <tr class="gradeU">
	  <input type="hidden" class="form-control" name="invoiceID" value="<?php echo $invoiceID ?>" />
        <td><?php echo $no++ ?></td>
        <td><?php echo $r->productBarcode ?></td>
        <td><?php echo $r->productName ?></td>
        <td><input type="text" class="form-control" name="satuan" value="<?php echo $r->satuanName ?>" readonly /></td>
        <td><input type="text" class="form-control" name="qty[]" value="<?php echo $r->detailMutasiQty ?>" readonly/></td>
        
         <td>
           <div class="btn-group" role="group">
		   <?php if($r->order_status=='0') { ?>
            <a href="<?php echo base_url(); ?>permintaan/detail_permintaan_edit?detailID=<?php echo $r->detailID ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
			<?php } else {
				echo " - " ;
			}
			?>
          </div>
        </td>
      </tr>
	  
      
    <?php endforeach ?>
						</tbody>
					</table>
				</div>
				<?php 
								
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
									if($statussave<>'1')
									{
									$status="<span class='label label-success'>Disetujui</span> <button type='submit' name='simpan' class='btn btn-default'><i class='fa fa-save'></i> Simpan Barang</button>";
									}
									else
									{
										$status="<span class='label label-success'>Disetujui</span> , <span class='label label-warning'><b>Barang Sudah Disimpan</b></span>";
									}
								}
								if($status=='3')
								{
									$status="<span class='label label-danger'>Ditolak</span>";
								}

								?>
									Status : <?php echo $status ?><br/>
				<?php if($keterangan) { ?>
				<b style="color:red;">Keterangan : </b>	  
	  <div class="direct-chat-text">
                        <?php echo $keterangan ?>
                      </div>
			<?php } ?>
					  <br/>


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
