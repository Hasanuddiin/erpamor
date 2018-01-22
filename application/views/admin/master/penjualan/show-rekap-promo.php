<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                <a href="<?php echo base_url(); ?>admin/showreporttoday" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-search"></i> &nbsp;Lihat Kategory Produk</a>  
                  <a id="btnExport" class="btn btn-sm btn-success btn-flat"><i class="fa  fa-file-excel-o"></i> Export to excel</a>
                   
                  <div class="form-group">
                      <input type="hidden" name="nofak" value="">
                        
      
         </select>
               
                  <div class="box-tools">
                  	<!--
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    -->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                
                  <table  id="table_wrapper" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
            <th>Tanggal</th>
                        <th>Barcode</th>
						<th>Nama Produk</th>
            <th>Qty Terjual</th>
            <th>Harga Asli</th>
            <th>Harga Stlah Promo</th>
						<th>Rp Terjual</th>
            <th>Rp Terjual Promo</th>
            <th>Kategory</th>
            
            <th class="description-percentage text-red text-bold">Rp.Tagihan Marketing</th>
						
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
              <td><?php echo date('d / M / y'); ?></td>
                    		<td><?php echo $lihat->barcode; ?></td>
							<td><?php echo $lihat->produk; ?></td>
              <td><?php echo $lihat->jumlah; ?></td>
              <td><?php echo number_format($lihat->harga); ?></td>
              <td><?php echo number_format ($lihat->hargaReal); ?></td>
              


               <?php  
               $jumlahtotal=$lihat->jumlah;
               $hargasat=$lihat->harga;
               $hargapromo=$lihat->hargaReal;
                       $jml=$jumlahtotal*$hargasat;
                       $jmlPromo=$jumlahtotal*$hargapromo;
              $tagihan=$jml-$jmlPromo;
                        ?>
							<td><?php echo number_format($jml); ?></td>
              <td><?php echo number_format($jmlPromo); ?></td>

             
							<td><?php echo $lihat->category; ?></td>
              
              <td class="description-percentage text-red text-bold" ><?php echo number_format ($tagihan); ?></td>
                    	</tr>
             <?php endforeach; 
              ?>
                    </tbody>
                    </table>
             
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
         <script type="text/javascript">

 $(document).ready(function(){

  $( "#no_po" ).on('change', function() {
    var id = $('#no_po').val();
    $('#simpan').show();
    $.ajax({
      type:'POST',

      url:'<?php echo base_url("admin/detail_kasir"); ?>',
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
 $(document).ready(function() {
       $("#btnExport").click(function(e) {
          e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
       });
 </script>
      </div><!-- /.content-wrapper -->
