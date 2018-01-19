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
           <?php echo form_open('opname/addso/?nofak='.$trxid.'&tgltrx='.$trxDate.'',$attribute); ?>
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

      <div class="col-md-12">
        <div class="col-md-5">
         <div class="form-group has-warning">
          <input type="hidden" class="form-control" name="kdproduk" id="kdproduk" />
          Kode Produk - Nama Produk :
          <input type="text" class="form-control" name="kodeproduk" id="kodebarang" value="-" onClick="this.value='';" autofocus />
        </div>
      </div>

     <div class="col-md-1">
  					<div class="form-group">
  						<p>Stok  : <input class="form-control" type="text" name="stokproduk" id="stokproduk"  readonly/></p>
  					</div>
  				</div>
	
	<div class="col-md-2">
       <div class="form-group has-warning">
        Jumlah Real :
        <input type="text" class="form-control" name="jumreal"  value="-" onClick="this.value='';"/>
      </div>
    </div>
	
	<div class="col-md-3">
       <div class="form-group has-warning">
        Keterangan :
        <input type="text" class="form-control" name="keterangan"  value="-" onClick="this.value='';"/>
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
       <th width=30>Satuan</th>
       <th width=50>Jumlah</th>
       <th width=80>Jumlah Real</th>
	   <th width=30>Selisih</th>
	   <th>Keterangan</th>
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
        <td><?php echo $r->productStock ?></td>
         <td><input type="text" class="form-control" name="subtotal" value=" <?php echo $r->realStock ?>" readonly /></td>
		 <td><?php echo $r->selisih ?></td>
		 <td><?php echo $r->keterangan ?></td>
      </tr>
    <?php endforeach ?>
   
</tbody>
</table>


</div><!-- /.box-body -->
</div>
</div>
</div><!-- /.box -->

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

	


</div>

