
 <div class="content">
   <div class="box box-info">
    <div class="box-header with-border"> <h2> <?= $invoiceID; ?> </h2>
    </div>
    <?php if($dt_suppliers) { ?>
    <div class="col-md-6">
      <div class="table-responsive">

        <table class="table">
          <tbody>
            <tr>
              <th>Nama</th>
              <td><?= $dt_suppliers->supplierName ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td><?= $dt_suppliers->supplierAddress ?></td>
            </tr>
            <tr>
              <th>Phone</th>
              <td><?= $dt_suppliers->supplierPhone ?></td>
            </tr>
          </tbody></table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table">
            <tbody><tr>
              <th style="width:50%">Kontak Person</th>
              <td><?= $dt_suppliers->supplierContactPerson ?></td>
            </tr>
            <tr>
              <th>Nomor HP</th>
              <td><?= $dt_suppliers->supplierCPHp ?></td>
            </tr>
            <tr>
              <th>Fax</th>
              <td><?= $dt_suppliers->supplierFax ?></td>
            </tr>
            
          </tbody></table>
        </div>
      </div>
	<?php } ?>

    </div>

    <table  class="table table-bordered table-hover dataTable" id="tables">
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
        <td><?php echo $r->productBarcode ?></td>
        <td><?php echo $r->bahanName ?></td>
        <td><?php echo $r->satuanName ?></td>
        <td><?php echo $r->detailBuyQty ?></td>
        
        <td><?php echo number_format($r->detailBuyPrice) ?></td>
        <td><?php echo number_format($r->detailBuySubtotal) ?></td>
        
      </tr>
      <?php 
      $total += $r->detailBuyQty * $r->detailBuyPrice; ?>
    <?php endforeach ?>
    
    



  </tbody>
</table>
<div class="col-md-6">
  <div class="form-groupb has-warningb">
   <b>TOTAL HARGA</b><input type="text" class="form-control" name="total" value="<?php echo number_format($total, 0, '.', ',');?>" id="total"  readonly/>
 </div>
</div>






