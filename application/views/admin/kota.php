<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="">
    <meta name="author" content="FaberNainggolan">
    <title><?=$titel?></title>
 
    <!-- Custom styles for this template -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
     $(function () {
        $("#kode").autocomplete({    //id kode sebagai key autocomplete yang akan dibawa ke source url
            minLength:0,
            delay:0,
            source:'<?php echo site_url('auto/get_produk'); ?>',   //nama source kita ambil langsung memangil fungsi get_allkota
            select:function(event, ui){
                $('#nama').val(ui.item.nama);
                $('#ibukota').val(ui.item.ibukota);
                $('#ket').val(ui.item.keterangan);
                }
            });
        });
    </script>
  </head>
<body>
<header>
 <h1><?=$titel?> </h1>
</header>
<div class="container">
<p> <input type="text" id="kode" placeholder="Ketikan nama kota" > </p>
<p>
 Nama Kota : </br><input type="text" id="nama"></br>
 Ibu Kota : </br><input type="text" id="ibukota"></br>
 Keterangan :</br> <textarea id="ket"></textarea>
 </p>
</div>
<footer>
 by Faber Nainggolan
</footer>
</body>
</html>