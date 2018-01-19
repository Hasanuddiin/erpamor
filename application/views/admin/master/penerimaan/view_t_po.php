
    <h4 align="center">DAFTAR PENERIMAAN <br />BARANG GUDANG</h4>
    <a>Tanggal : &nbsp;<?php $Tanggal = date('d-m-Y');
             echo $Tanggal;
             ?></a><br />
    <a>Dari Suplier :</a>
    
    
    
    <div class="col-md-6">
	<?php if($dt_suppliers) {
		?>
      <div class="table-responsive">
      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            
        <input type="hidden" name="supplierName" value="<?= $dt_suppliers->supplierName ?>">
        <input type="hidden" name="supplierAddress" value="<?= $dt_suppliers->supplierAddress ?>">
        <input type="hidden" name="supplierPhone" value="<?= $dt_suppliers->supplierPhone ?>">
        <input type="hidden" name="supplierID" value="<?= $dt_suppliers->supplierID ?>">
                            <address>
                                <strong><?= $dt_suppliers->supplierName ?></strong><br>
                                
                                <?= $dt_suppliers->supplierAddress ?><br>
                                <?= $dt_suppliers->supplierPhone ?><br/>
                                <strong><?= $dt_suppliers->supplierContactPerson ?></strong><br>
                                <?= $dt_suppliers->supplierCPHp ?><br>
                                <?= $dt_suppliers->supplierFax ?><br>
                                
                            </address>
                        </div><!-- /.col -->
                       <table>
                         <tr></tr>
                       </table>
                        <div class="col-sm-6 invoice-col">
                            To :
                            <address>
                                <?php  
                        foreach ($perusahaan as $perusahaan):
                        ?>

                   
                      
             <b><?php echo $perusahaan->identityName; ?></b></br>
              <?php echo $perusahaan->identityAddress; ?></br>        
              <?php echo $perusahaan->identityPhone; ?></br>
              <?php echo $perusahaan->identityEmail; ?></br>
              
                     
            <?php endforeach; ?>
                               
                            </address>
                        </div>
                        
            <!-- /.col -->
       
     </div>
       
      

	<?php } 
	
	else
	{
		echo "<br/><i>Data Supplier Kosong atau tidak terpilih saat input !</i><br/><br/>";

	}?>
	
    </div>

    </div>
       

    <table  class="table table-bordered" id="tables">
     <thead>
      <tr>
       <th>No.</th>
       <th>Kode</th>
       <th>Nama Produk</th>
       <th>Satuan</th>
       <th>Qty</th>
       
       <th>Harga </th>
       <th>Sub Total</th>
       
     </thead>
     <tbody>
       <?php  
       $no = 1;
       $total=0;
       foreach ($detail as $r):

        ?>
      <tr class="gradeU">
        <td><?php echo $no++ ?></td>
        <td><?php echo $r->productBarcode ?><input type="hidden" name="productBarcode" value="<?= $r->productBarcode ?>"></td>
        <td><?php echo $r->bahanName ?><input type="hidden" name="productName" value="<?= $r->bahanName ?>"></td>
        <td><?php echo $r->satuanName ?><input type="hidden" class="form-control" name="satuan[]" value="<?= $r->satuanName ?>" readonly /></td>
        <td width="50px"><input border="0" type="text" width="10" class="form-control" name="qty[]" value="<?php echo $r->detailBuyQty ?>"/></td>
        
        <td><?php echo number_format($r->detailBuyPrice) ?><input type="hidden" class="form-control" name="harga[]" value=" <?= ($r->detailBuyPrice) ?>" readonly /></td>
        <td><?php echo number_format($r->detailBuySubtotal) ?><input type="hidden" class="form-control" name="subtotal[]" value=" <?= ($r->detailBuySubtotal) ?>" readonly /></td>
        
      </tr>

      <?php 
      $total=$total+$r->detailBuySubtotal; ?>
    <?php endforeach ?>
    
    </div>
 
    </div>



  </tbody>
</table>

<div class="col-md-12">
  <div align="right" class="">
   <h4><b>TOTAL HARGA : &nbsp;Rp.<?php echo number_format($total, 0, '.', ',');?></b></h4><input type="hidden" class="form" name="total" value="<?php echo number_format($total, 0, '.', ',');?>" id="total"  readonly/>
 </div>
<div class="row no-print">
      <button class="btn btn-danger" onclick="window.print();"><i class="fa fa-print"></i> Cetak Barang masuk</button>
      </div>
</div>
 <table border="0" width="100%" valign="top" class="trxapp">

          <tr><td></td><td></td>
           
          <td></td><td></td>
          <td >Kepala Gudang</td>
          </tr>
            <tr>
            <td></td><td></td>
            <td></td><td></td>
            <td width=100 height=100>(........................)</td>
           </tr>
         
                  </table>







