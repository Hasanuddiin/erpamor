<!-- Content Wrapper. Contains page content -->
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

  <?php $trxDate = date('d-m-Y'); ?>

  <!-- Main content -->
  <section class="content">
  
   <div class="">
    <div class="">
    </div>
    <div class="box-body">
      <?php echo form_open('penerimaan/savepenerimaan/'); ?>
      <div class="col-md-6">
      <div class="row no-print">
        <div class="form-group">
         <input type="hidden" name="nofak" value="">
         <b>No Pemesanan Barang (PO) :</b>
         <select class="form-control" name="no_po" id="no_po">
           
       <?php if($list_po){ ?>
       <option selected>-- Silahkan Pilih PO --</option>
           <?php foreach ($list_po as $d_po) { ?>
           <option value="<?= $d_po->invoiceOrderID ?>"><?= $d_po->invoiceOrderID ?> | <?= $d_po->trxFullName ?> </option>
           <?php } } else { ?>
       <option readonly>-- Belum ada Data PO Masuk --</option>
       <?php } ?>
         </select>
       </div>
       </div>
     </div>
     <div id="resultdiv"></div>
     <div class="row no-print">
     <button style="display: none" type="submit" name="submit" class="btn btn-success" id="simpan">Simpan Jika tidak ada perubahan</button>

     </div>

     <?php echo form_close(); ?>
   </div>

 </section>
 

 <script>

 $(document).ready(function(){

  $( "#no_po" ).on('change', function() {
    var id = $('#no_po').val();
    $('#simpan').show();
    $.ajax({
      type:'POST',

      url:'<?php echo base_url("penerimaan/detail_po/"); ?>',
      data:{'id':id},
      success:function(data){
        $('#resultdiv').html(data);
      }
    });
  });

  $('#tables').on('change', 'input', function () {
   var row = $(this).closest('tr');
    var total = 0;
    $('input', row).each(function() {
        total += Number($(this).val());
    });
    $('.total', row).text(total);
 });


});
 </script>
</div>

