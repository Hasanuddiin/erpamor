<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	<h4> Kode Produksi : <?php echo $prodCode; ?> </h4>
		
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> </li>
			<li><a href="<?php echo base_url(); ?>penerimaan"> <?php echo $title; ?></a></li>
			<li class="active">add</li>
		</ol>
	</section>


	<section class="content">

		<?php echo form_open('product/plan_cek_save/?produk='.$produk.'&qty='.$qty.'&namapro='.$namapro.''); ?>
		<input type="hidden" name="prodCode" value="<?php echo $prodCode; ?>" />
		<div class="box box-info">
			<h4>
			<?php echo $title; ?>
		</h4>
			<div class="box-header with-border"></div>
			<div class="box-body">

				<table id="example1" class="table table-bordered table-hover dataTable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Bahan</th>
							<th>Stok</th>
							<th>Satuan</th>
							<th>Stok Conv.</th>
							<th>Formula Qty</th>
							<th>Jmlh Prod.</th>
							<th>Total Qty</th>
							<th>Ketersediaan bahan</th>
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
								<td class="barcode">
								<input type="hidden" name="bahanID" value="<?= $key->bahanID ?>" />
								<?= $key->bahanName ?></td>
								<td><?= $key->bahanStock ?></td>
								<td class="name"><?= $key->satuanName ?></td>
							
								<?php 
								$stokconv=0;
							    $stokbahan=$key->bahanStock;
								if($key->satID=='10' && $key->satID2=='12')
								{
									$stokconv=$stokbahan*$key->bahanSatVal*1000;
								}
								else if($key->satID=='10' && $key->satID2=='15')
								{
									$stokconv=$stokbahan*$key->bahanSatVal*1000;
								}
								else if($key->satID=='15' && $key->satID2=='15')
								{
									$stokconv=$stokbahan;
								}
								else if($key->satID=='15' && $key->satID2=='12')
								{
									$stokconv=$stokbahan*50;
								}
								?>
								<td><?= number_format($stokconv,0) ?> <?= $key->satPro ?></td>
								<td><?= $key->bahanQty ?> <?= $key->satPro ?></td>
								<td><?php echo number_format($qty) ?></td>
								<?php $totalprodbahan=$key->bahanQty*$qty; ?>
								<td>
							<b><?php if($key->totalBahan<=0) { echo $totalprodbahan; } else { echo $key->totalBahan; } ?></b> <?= $key->satPro ?>
								
								<?php 
								$totconvori=0;
								$sisastok=0;
								if($key->satID=='10' && $key->satID2=='12')
								{
									$totconvori=$stokconv-$totalprodbahan;
									$sisastok=$totconvori/($key->bahanSatVal*1000);
									
								}
								else if($key->satID=='10' && $key->satID2=='15')
								{
									$totconvori=$totalprodbahan/1000;
									$sisastok=$key->bahanStock-$totconvori;
								}
								else if($key->satID=='15' && $key->satID2=='15')
								{
									
									$totconvori=$totalprodbahan;
									$sisastok=$key->bahanStock-$totconvori;
								}
								else if($key->satID=='15' && $key->satID2=='12')
								{
									$totconvori=$totalprodbahan/50;
									$sisastok=$key->bahanStock-$totconvori;
								}
								?>
								<input type="hidden" name="totconvori" value="<?php echo $totconvori; ?>" />
								<input type="hidden" name="sisastok[]" value="<?php echo $sisastok; ?>" />
								</td>
								
								<td>
								<?php
								$butstat="";
								$status="";
								$astat="style='pointer-events:none;'";
								if($totalprodbahan<$stokconv && $key->ischecked<>'1')
								{ 
								$butstat="";
								$astat="";
								?>
								<span class="label label-success"><i class="fa fa-fw fa-check"></i> Terpenuhi</span>
											<a href="#" class="btnShowformula btn btn-default btn-sm" id="btnShow" idbahan="<?php echo $key->bahanID ?>" usebahan="<?php echo $totalprodbahan ?>" satID="<?php echo $key->satID ?>" satID2="<?php echo $key->satID2 ?>" produkcode="<?php echo $produk ?>" qty="<?php echo $qty ?>" namapro="<?php echo $namapro ?>" namabahan="<?php echo $key->bahanName ?>" detailID="<?php echo $key->detailID ?>" totalprodbahan="<?php echo $totalprodbahan ?>" > <i class="fa fa-plus-square"></i> Cek </a>
											
											<?php
								$butstat="";	
								} 
								
								else if($totalprodbahan<$stokconv && $key->ischecked=='1')
								{ 
								$butstat="";
								$astat="";
								?>
								<span class="label label-success"><i class="fa fa-fw fa-check"></i> Terpenuhi</span>			
								<i class='fa fa-fw fa-check-circle-o'></i>			
											<?php
								$butstat="";	
								} 
								
								else if($totalprodbahan>$stokconv && $key->ischecked=='1')
								{ 
								$butstat="";
								$astat="";
								?>
								<span class="label label-success"><i class="fa fa-fw fa-check"></i> Terpenuhi </span>			
								<i class='fa fa-fw fa-check-circle-o'></i>			
											<?php
								$butstat="";	
								} 
								
								
								else  if($totalprodbahan>$stokconv && $key->ischecked<>'1') { 
								$status="<div class='direct-chat-text'>
                       <b style='font-weight:bolder;color:red;'>Maaf, Ada bahan Yang tidak terpenuhi!!</b>
                      </div>"; 
								$butstat="disabled"; ?>
								<span class="label label-danger"> <i class="fa fa-fw fa-warningnavica"></i> Kurang</span>
								<?php } ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<div class="col-md-1">
					<input name="qty" type="hidden" value="<?php echo $qty; ?>"/>
					<input name="produk" type="hidden" value="<?php echo $produk; ?>"/>
					<button type="submit" name="submit" class="btn btn-success" <?php echo $busta ?>><i class="fa fa-save"></i> Simpan </button> 
					</div>
					<div class="col-md-6"><?php echo $status; ?> &nbsp;&nbsp;&nbsp;<b><?php echo $statcek; ?></b></div>
				</div>	
			</div>
 <?php echo form_close(); ?>
		</section>
	</div>	


<div id="dialog" style="display: none" align = "center">
  				<!-- form start -->
  				<?php echo form_open('product/buat_formula_cek_bahan/'); ?>
  				<div class="form-group">
  					<input type="hidden" name="idbahan" id="idbahan">
					<input type="hidden" name="detailID" id="detailID">
					<input type="hidden" name="satID" id="satID">
					<input type="hidden" name="satID2" id="satID2">
					<input type="hidden" name="produkcode" id="produkcode">
					<input type="hidden" name="qty" id="qty">
  					<label for="exampleInputEmail1">Nama Produk</label>
  					<input type="text" class="form-control" name="namapro" id="namapro" readonly/>
					<hr/>
					<label for="exampleInputEmail1">Nama Bahan</label>
  					<input type="text" class="form-control" name="namabahan" id="namabahan" disabled/>
  				</div>
  				<div class="form-group">
  					<label for="exampleInputEmail1">Total Penggunaan Bahan (Gram)</label>
  					<input type="text" class="form-control" name="usebahan" id="usebahan"/>
  				</div>
  				
  				
  				
  				<button type="submit" name="submit" class="btn btn-success" id="simpaneditpjl" value="edittrx"><i class="fa fa-save"></i> Simpan</button>
  				
  				<?php echo form_close(); ?>
  			</div>


			
			<script>
$( "#dialog:ui-dialog" ).dialog( "remove" );
   // $(".btnShow").live("click",function(){
    $('body').on('click', '.btnShowformula', function(){
      var idbahan = $(this).attr("idbahan");
	  var detailID = $(this).attr("detailID");
      var usebahan = $(this).attr("usebahan");
      var satID = $(this).attr("satID");
      var satID2 = $(this).attr("satID2");
      var produkcode = $(this).attr("produkcode");
      var qty = $(this).attr("qty");
      var namapro = $(this).attr("namapro");
	   var namabahan = $(this).attr("namabahan");
	  var totalprodbahan = $(this).attr("totalprodbahan");

      $('#idbahan').val(idbahan);
	  $('#detailID').val(detailID);
      $('#usebahan').val(usebahan);
      $('#satID').val(satID);
      $('#satID2').val(satID2);
      $('#produkcode').val(produkcode);
      $('#qty').val(qty);
      $('#namapro').val(namapro);
	  $('#namabahan').val(namabahan);
	  $('#totalprodbahan').val(totalprodbahan);
      $('#dialog').dialog('open');
      return false;
    });
    </script>