<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h3>
			<?php echo $title; ?>
		</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> Edit</a></li>
			<li><a href="<?php echo base_url(); ?>admin/perusahaan">PO <?php echo $title; ?></a></li>
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
           <?php echo form_open('product/buat_formula/?produkID='.$produkID.'',$attribute); ?>
           <div class="col-md-2">
            <div class="form-group">
             <input type="hidden" name="produkID" value="<?php echo $produkID;?>">
		
             <b>Kode Produk :</b>
             <input type="text" class="form-control" name="produkID" value="<?php echo $produkID;?>" readonly>
           </div>
         </div>
         <div class="col-md-2">
			<div class="form-group">
           <p>Tanggal : <input class="form-control" type="text" name="tgltrx" value="<?php echo $trxDate; ?>"  readonly/></p>
			</div>
		 </div>
		  

      <div class="col-md-12">
        <div class="col-md-6">
         <div class="form-group has-warning">
          <input type="hidden" class="form-control" name="kdbahan" id="kdbahan" />
          Kode Material - Nama Material :
          <input type="text" class="form-control" name="kodebahan" id="kodebahan" value="" onClick="this.value='';" autofocus />
        </div>
      </div>
      <div class="col-md-2">
       <div class="form-group has-warning">
        Qty :
        <input type="text" class="form-control" name="qtybahan" id="qtybahan" value="1" onClick="this.value='';"/>
      </div>
    </div>
	 <div class="col-md-2">
       <div class="form-group has-warning">
        UoM :
        <select name="satuanbahan" class="form-control">
											<?php
											$selected="";
											 foreach ($satuan as $satuan):
											if($satuan->satuanID=='10')
											{
												$selected="selected";
											}
											 ?>
											 <option value="<?= $satuan->satuanID ?>" <?php echo $selected?>><?php echo $satuan->satuanName ?></option>
											 <?php endforeach ?>
											
												
										</select>
      </div>
    </div>
	

    <div class="col-md-2">
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
       <th>Grouping</th>
       <th  width="40%">Material</th>
       <th width="15%">UoM</th>
       <th>Qty</th>
	   <th>Conv</th>
	   <th width="10%">Harga</th>
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
        <td><?php echo $r->categoryName ?></td>
        <td><?php echo $r->bahanName ?></td>
        <td><input type="text" class="form-control" name="satuan" value="<?php echo $r->satuanName ?>" readonly /></td>
        <td><?php echo $r->bahanQty ?></td>
        <td><?php echo round($r->bahanConv,4) ?></td>
		<td><?php echo number_format(round($r->bahanConvprice)) ?></td>
        <td align="center">
                          <div class="btn-group" role="group">
                            
                            <a href="<?php echo base_url(); ?>product/hapus_formula/<?php echo $r->detailID ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                          </div>
                        </td> 
      </tr>
      
    <?php
	$total=$total+$r->bahanConvprice;
	endforeach ?>
	
    <tr class="gradeA">
	<td colspan="6" align="right"><b>Total HPP</b></td><td><b>
	<input type="text" class="form-control" name="totalhpp" value="<?php echo$total; ?>" readonly /></b></td>
	</tr>
 </td>
</tr>

</tbody>
</table>


</div><!-- /.box-body -->
</div>
</div>
</div><!-- /.box -->

<!-- <div class="col-md-4">
  <div class="form-group">
   Jenis Kendaraan :
   <input type="text" class="form-control" name="jeniskend"/><br/>
   No Polisi :
   <input type="text" class="form-control" name="nopol" /><br/>

   <div class="col-md-12" id="bankmet">
    <div class="form-group has-warning">
     Jenis Pembayaran :
     <select name="banktipe" class="form-control" id="tipebank">
      <option value="tunai" >Tunai</option>
      <option value="debit" >Kartu Debit</option>
      <option value="kredit" >Kartu Kredit</option>
      <option value="giro" >Giro</option>
    </select>
    <div class="col-md-12" id="banktipe">
      Nomor :
      <input type="text"  name="bankno" class="form-control">
    </div>
  </div>
</div>
</div>

</div> -->
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

<!-- form edit -->
<div id="dialog" style="display: none" align = "center">
 <!-- form start -->
 <?php echo form_open('pembelian/addtpm/?nofak='.$trxid.'&tgltrx='.$trxDate.'') ?>
 <div class="form-group">
  <input type="hidden" name="productbarcode" id="productbarcode">
  <input type="hidden" name="nofak" value="<?php echo $trxid;?>">
  <input type="hidden" name="ideditpro" id="ideditpro">
  <label for="exampleInputEmail1">Nama Produk</label>
  <input type="text" class="form-control" name="nampro" id="nampro" disabled/>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Harga</label>
  <input type="text" class="form-control" name="harpro" id="harpro" disabled/>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Quantitas</label>
  <input type="text" class="form-control" name="qtypro" id="qtypro"  />
</div>
<!-- <div class="form-group">
  <label for="exampleInputEmail1">Bonus</label>
  <input type="text" class="form-control" name="bonus" id="bonus" />
</div> -->



<button type="submit" name="submit" class="btn btn-success" id="simpaneditpjl" value="edittrx"><i class="fa fa-save"></i> Simpan</button>

<?php echo form_close(); ?>
</div>
<!-- end form edit -->			


<script>

$(document).ready(function(){

  $( "#suplier" ).on('change', function() {
    var id = $('#suplier').val();
    $.ajax({
      type:'POST',
      // dataType: 'jsonp',
      url:'<?php echo base_url("welcome/suplliers/"); ?>',
      data:{'id':id},
      success:function(data){
        // $('#resultdiv').html(data);
        var duce = jQuery.parseJSON(data);
      $("input[name='alamatkirim']").val(duce.supplierAddress);
      $("input[name='telpkirim']").val(duce.supplierPhone);
      $("input[name='namamember2']").val(duce.supplierName);
      $("input[name='supplierID']").val(duce.supplierID);

        console.log(data); 
      }
    });
  });



});
</script>
</div>

