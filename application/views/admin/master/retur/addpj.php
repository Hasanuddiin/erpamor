<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h3>
			<?php echo $title; ?>
		</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> Edit</a></li>
			<li><a href="<?php echo base_url(); ?>admin/perusahaan"> <?php echo $title; ?></a></li>
			<li class="active">Edit</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
            -->
          </ol>
        </section>

        <?php $trxDate = date('d-m-Y'); ?>

        <!-- Main content -->
        <section class="content">
         <div class="box box-info">
          <div class="box-header with-border">
          </div>
          <div class="box-body">



           <!-- form start -->
           <?php $attribute = Array ("id" => "formtrxid");?>
           <?php echo form_open('returpenjualan/addtrt/?nofak='.$trxid.'&tgltrx='.$trxDate.'',$attribute); ?>
           <div class="col-md-2">
            <div class="form-group">
             <input type="hidden" name="nofak" value="<?php echo $trxid;?>">
             <b>No Retur :</b>
             <input type="text" class="form-control" name="nofak" value="<?php echo $trxid;?>" readonly>
           </div>
         </div>
         <div class="col-md-2">
          <div class="form-group">
           <p>Tanggal : <input class="form-control" type="text" name="tgltrx" value="<?php echo $trxDate; ?>"  readonly/></p>
         </div>
       </div>


       <div class="col-md-12" id="warningstok">
        <H4 style="color:red;"><B><i class="fa fa-warning"></i> KUANTITAS BARANG MELEBIHI STOK DI GUDANG !!</B></H4>
      </div>

      <div class="col-md-12">
        <div class="col-md-6">
         <div class="form-group has-warning">
          <input type="hidden" class="form-control" name="kdproduk" id="kdproduk" />
          Kode Produk - Nama Produk :
          <input type="text" class="form-control" name="kodeproduk" id="kodebarang" value="-" onClick="this.value='';" autofocus />
        </div>
      </div>

      <div class="col-md-1">
       <div class="form-group has-warning">
        QTY :
        <input type="text" class="form-control" name="qty" id="qty" value="1" onClick="this.value='';"/>
      </div>
    </div>
	
	<div class="col-md-4">
       <div class="form-group has-warning">
        Ket :
        <input type="text" class="form-control" name="ket"  value="-" onClick="this.value='';"/>
      </div>
    </div>

    <div class="col-md-1">
     <div class="form-group has-warning"><br/>
      <button type="submit" name="submit" class="btn btn-success" value="tambah" id="submittambahproduk">
       <i class="fa fa-plus"></i> Tambah</button>
     </div>
   </div>
 </div>
 <div class="col-md-12">

   <div class="box-body table-responsive no-padding">

    <table  class="table table-bordered table-hover dataTable">
     <thead>
      <tr>
       <th>No.</th>
       <th>Kode</th>
       <th>Nama Produk</th>
       <th>Satuan</th>
       <th>Qty</th>
       <th>Diskon</th>
       <th>Harga </th>
       <th>Sub Total</th>
	   <th>Keterangan</th>
       <th>Aksi</th>
     </thead>
     <tbody>
       <?php  
       $no = 1;
       $total=0;
       foreach ($detail as $r):

        ?>
      <tr class="gradeU">
        <td><?php echo $no++ ?></td>
        <td><?php echo $r->productBarcode ?></td>
        <td><?php echo $r->productName ?></td>
        <td><input type="text" class="form-control" name="satuan" value="<?php echo $r->satuanName ?>" readonly /></td>
        <td><?php echo $r->detailReturQty ?></td>
        <?php
        if($r->productDiscounttype=="1")
        {
         ?>
         <td><b><?php echo $r->productDiscount ?> %</b></td>
         <?php } 
         else if($r->productDiscounttype=="2")
         {
          ?>
          <td>- <b>Rp. <?php echo number_format($r->productDiscount) ?></b></td>
          <?php } 
          else
           {?>
         <td></td>
         <?php } ?>
         <td><input type="text" class="form-control" name="harga" value=" <?php echo number_format($r->detailReturPrice) ?>" readonly /></td>
         <td><input type="text" class="form-control" name="subtotal" value=" <?php echo number_format($r->detailReturSubtotal) ?>" readonly /></td>
		 <td><?php echo $r->detailReturKet ?></td>
         <td>
           <div class="btn-group" role="group">
            <input type="hidden" name="qtyremove" id="qtyremove">
            <a href="<?php echo base_url(); ?>pembelian/hapus_tpm?idtrxpj=<?php echo $r->detailID ?>&productBarcode=<?php echo $r->productBarcode; ?>&qtyremove=<?php echo $r->detailReturQty ?>&nofak=<?php echo $trxid;?>&tgltrx=<?php echo $trxDate; ?>" onclick="javascript: return confirm('Anda akan menghapus item : <?php echo $r->productName; ?> ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
          </div>
        </td>
      </tr>
      <?php 
      $total=$total+$r->detailReturSubtotal; ?>
    <?php endforeach ?>
    <tr class="gradeA">
     <div class="col-md-2">
      <div class="form-groupb has-warningb">
       <b>TOTAL HARGA</b><input type="text" class="form-control" name="total" value="<?php echo number_format($total, 0, '.', ',');?>" id="total"  readonly/>
     </div>
   </div>

 </td>
</tr>

</tbody>
</table>


</div><!-- /.box-body -->
</div>
</div>
</div><!-- /.box -->
<div class="box-body">
<div class="box box-info">
 
<div class="col-md-6">
 <div class="form-group">
  No Faktur :
  
  <input type="hidden"  class="form-control" name="supplierID"  />
  <select name="faktur" id="faktur" class="form-control">
   <option value="" >- Pilih No Faktur -</option>
    <?php
    foreach ($datapo as $datapo):

     ?>
   <option value="<?= $datapo->trxID ?>" ><?php echo $datapo->invoiceID ?></option>

 <?php endforeach ?>


</select>
</div>
<div class="form-group">
<input type="text"  class="form-control" name="invoiceOrderID" id="invoiceOrderID" />
  Nama Member :
<input type="text"  class="form-control" name="namamember2"  />
</div>
<div class="form-group">
  Alamat Member :
  <input type="text" class="form-control" name="alamatsuplier" />
</div>
<div class="form-group">
  No telp Member :
  <input type="text" class="form-control" name="telpsuplier"  />
</div>

</div>

<div class="col-md-12">
</div>
</div>
</div>

<div class="col-md-12">
  <div class="col-md-1">
   <a href="<?php echo base_url(); ?>admin/batal_trxpj?nofak=<?php echo $trxid;?>" onclick="javascript: return confirm('Anda akan membatalkan transaksi dengan nomor faktur : <?php echo $trxid; ?> ?')" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-left"></i> Batal</a>



 </div>
 <div class="col-md-2">
   <button type="submit" name="submit" class="btn btn-success" value="selesaitrx">
    <i class="fa fa-save"></i> Selesai</button>
  </div>
</div>
<?php echo form_close(); ?>
<div class="box-body">

</div><!-- /.box-body -->
</div><!-- /.box -->
</section><!-- /.content -->

		


<script>

$(document).ready(function(){

  $( "#faktur" ).on('change', function() {
    var id = $('#faktur').val();
    $.ajax({
      type:'POST',
      // dataType: 'jsonp',
      url:'<?php echo base_url("welcome/faktur/"); ?>',
      data:{'id':id},
      success:function(data){
        // $('#resultdiv').html(data);
        var duce = jQuery.parseJSON(data);
      $("input[name='alamatsuplier']").val(duce.memberAddress);
      $("input[name='telpsuplier']").val(duce.memberPhone);
      $("input[name='namamember2']").val(duce.memberFullName);
      $("input[name='supplierID']").val(duce.memberID);
	  $("input[name='invoiceOrderID']").val(duce.invoiceID);
        console.log(data); 
      }
    });
  });
  
  



});
</script>
</div>

