<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> S.O</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <div class="box-body table-responsive no-padding">
				<table class="table table-bordered table-hover">
				 <center><h4>Detail Transaksi </h4></center>
				      <tr>
					  <td>Nomor Faktur</td><td><input type="text" class="form-control" name="nofak" value="<?php echo $nofak; ?>" readonly /> </td>
					  </tr>
				</table>
					   
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<th width="30%">Nama Barang</th>
                        <th>Harga</th>
						<th>Qty</th>
						<th>Bonus</th>
						<th>Satuan</th>
						<th>Diskon</th>
						<th>Jumlah</th>
                    </thead>
                    <tbody>
                      	<?php  
						$total=0;
                        foreach ($detail as $lihat):
                        ?>
                    	<tr>
							<td><input type="text" class="form-control" name="nabar" value="<?php echo $lihat->productName; ?>" readonly /></td>
							<td><input type="text" class="form-control" name="price" value="<?php echo number_format($lihat->detailPrice); ?>" readonly /></td>
							<td><input type="text" class="form-control" name="qty" value="<?php echo $lihat->detailQty; ?>" readonly /></td>
							<td><input type="text" class="form-control" name="bonus" value="<?php echo @$lihat->detailbonus; ?>" readonly /></td>
							<td><input type="text" class="form-control" name="sat" value="<?php echo $lihat->satuanName; ?>" readonly /></td>
							<input type="hidden" name="diskontype" value="<?php echo $lihat->productDiscounttype;?>">
							<input type="hidden" name="diskonpercent" value="<?php echo $lihat->discPercent;?>">
							<?php
												  if($lihat->productDiscounttype=="1")
												  {
												  ?>
												<td><?php echo $lihat->discPercent ?> %<b> </b></td>
												  <?php } 
												  else if($lihat->productDiscounttype=="2")
												  {
												  ?>
												<td>- Rp. <?php echo number_format($lihat->discPercent) ?>
												</td>
												  <?php } 
												  else
												  {?>
													<td></td>
												  <?php } ?>
							<td><input  type="text" class="form-control" name="subtotal" value="<?php echo @number_format($lihat->detailSubtotal); ?>" readonly></td>
                    	</tr>
						<?php
						$total=$total+$lihat->detailSubtotal;
						endforeach; ?>
						
                    </tbody>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td colspan="2"><b>TOTAL HARGA</b></td>
						<td><input  type="text" class="form-control" name="totharga" value="<?php echo number_format($total);?>" style="font-weight:bold; font-size:1.7em;" readonly></td>
						</tr>
                    	
                  </table>
				  
				
				
                </div><!-- /.box-body -->
		
      </div><!-- /.content-wrapper -->

	  
	
<script>
$( "#dialog:ui-dialog" ).dialog( "remove" );
   // $(".btnShow").live("click",function(){
    $('body').on('click', '.btnbayar', function(){
      var idpiutang = $(this).attr("idpiutang");
      var invoice = $(this).attr("invoice");
	  var nmsupplier = $(this).attr("nmsupplier");
	  var totalbeli = $(this).attr("totalbeli");
	  var totalbayar = $(this).attr("totalbayar");
	  var sisa = $(this).attr("sisa");
      $('#idpiutang').val(idpiutang);
	  $('#invoice').val(invoice);
	  $('#nmsupplier').val(nmsupplier);
	  $('#totalbeli').val(totalbeli);
	  $('#totalbayar').val(totalbayar);
	  $('#sisabayar').val(sisa);
      $('#dialogbayar').dialog('open');
      return false;
    });
    </script>
    <script>
    $(function () {
      $("#dialogbayar").dialog({
        modal: true,
        autoOpen: false,
        title: "Bayar Hutang",
		width: "50%"
      });
    });

    </script>			