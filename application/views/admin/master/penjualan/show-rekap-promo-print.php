<!-- Content Wrapper. Contains page content -->
 <section class="">
          
            <div class="row">           
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
<style>
b,table tr td
{
  font-family:Arial, 'Helvetica Neue',Helvetica, sans-serif;
  font-size:12px;
width:200px;
word-wrap:break-word;
}
p {
  line-height:1;
}

table.header {
border-collapse: collapse;
border-spacing: 0;
}
table.header tr,td { border: none; text-align:left; padding:2px; }

</style>    
  
  
  
<table width="100%">

   <?php  
                        foreach ($perusahaan as $perusahaan):
                        ?>

                      <tr><img src="<?php echo base_url(); ?>assets/img/New-Logo.png" width="25%"></tr>
                      <tr>
              <td colspan="2" align="left"><center><b style="font-size:16px;font-weight:bolder;">LAPORAN PROMO MARKETING</b></center></td>
                      </tr>
                      <tr>
              <td colspan="2" align="left"><center><b style="font-size:16px;font-weight:bolder;">BOLU AMOR BAKERY & CAFE</b></center></td>
                      </tr>
            <tr>
              <td colspan="2" align="left"><center><?php echo $perusahaan->identityAddress; ?></center></td>
              
                      </tr>
                        <tr>
              <td colspan="2" align="left"><center><?php echo $perusahaan->identityPhone; ?></center></td>
              
                      </tr>
            <?php endforeach; ?>
            </table>
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
                <form method="post" class="row no-print">
                  <div class="form-group col-md-6">
            
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
              
                    </div>
                        <input type="text" name="date" placeholder="Klik disini ..." class="form-control pull-right active" id="reservation" required>

                    </div>
                <!-- /.input group -->
                  </div>
                  <button type="submit" class="btn btn-danger btn-flat" name="display">GO</button>

                    <a href="<?php echo base_url(); ?>admin/printpendapatan" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak </a> 
                    <a id="btnExport" class="btn btn-success btn-flat"><i class="fa  fa-file-excel-o"></i> Export to excel</a>
             
          
                </form>

               

                  

                   

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
                Sukabumi&nbsp;&nbsp;</td><td align="left"><?php echo date('d-m-Y'); ?></td>

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

              <td><?php echo date($lihat->tgl); ?></td>

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
                  <div align="right">
                  <td><br>
                  <table border="0" width="100%" valign="top" class="trxapp" align="right">
                  <tr>
                  <td width="170">Manageer Marketing</td>
                  <td width="27">&nbsp;</td>
                  <td width="233">Menyetujui Accounting</td><td width="15"></td>
                  <td ><p>Mengetahui GM</p></td>
                  </tr>
            <tr>
            <td>Arigya Febrisa</td><td>&nbsp;</td>
            <td>(.................................)</td><td></td>
            <td width=108 height=100>Gamal Hasan</td>
           </tr>
           
           </table>
           

                  </div>

                  

                </div><!-- /.box-body -->

                </div>

             </div>

          </div>

        



        </section><!-- /.content -->

         <script type="text/javascript">
         $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

       
        //Flat red color scheme for iCheck
       

        //Colorpicker
       
      });



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

  window.onload = function() { window.print();document.location.href =  "<?php  echo base_url('admin/showrekappromo'); ?>"; }
  window.onkeypress = function(e) {
    if ((e.which || e.keyCode) == 13) {
        $("#printfinish").click();
    }
}


 </script>

      </div><!-- /.content-wrapper -->
