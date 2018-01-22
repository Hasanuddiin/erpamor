

<html>
<head>
	<title>Print Document</title>
 <style type="text/css">
     <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
 </style>
</head>

<body>
<table width="100%">

   <?php  
                        foreach ($perusahaan as $perusahaan):
                        ?>

                      <tr><img src="<?php echo base_url(); ?>assets/img/New-Logo.png" width="25%"></tr>
                    
              <tr colspan="2" align="left"><center><b style="font-size:16px;font-weight:bolder;">LAPORAN STOK GUDANG</b></center></tr>
                     
                     
              <tr colspan="2" align="left"><center><b style="font-size:16px;font-weight:bolder;"><?php echo $perusahaan->identityName; ?></b></center></tr>
                      
           
              <tr colspan="2" align="left"><center><?php echo $perusahaan->identityAddress; ?></center></tr>
              
                     
                      
              <tr colspan="2" align="left"><center><?php echo $perusahaan->identityPhone; ?></center></tr>
              <tr align="center">Sukabumi&nbsp;&nbsp;<?php echo date('d / M / y'); ?></tr>
                      
            <?php endforeach; ?>
            </table>
            <br>
              
	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        	<th>No.</th>
                        <th>Kode</th>
                        <th>Nama Bahan</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Max Stok</th>
                        <th>Min Stok</th>
                        <th>Harga Beli</th>
                       
                       
        </tr>
                        <?php $no = 1; foreach ($data as $lihat):?>
        <tr id="rowHover">
                            <td width="4%" align="center"><?php echo $no++ ?></td>
                            <td width="10%" id="column_padding"><?php echo $lihat->bahanBarcode; ?></td>
                            <td width="25%" id="column_padding"><?php echo $lihat->bahanName; ?></td>
                            <td width="10%" id="column_padding"><?php echo $lihat->bahanStock; ?></td>
                             <td width="10%" id="column_padding"><?php echo $lihat->satuanName; ?></td>
                            <td width="7%" id="column_padding"><?php echo $lihat->bahanmaxStock; ?></td>
                            <td width="7%" id="column_padding"><?php echo $lihat->bahanminStock; ?></td>
                            <td width="10%" id="column_padding"><?php echo number_format($lihat->bahanBuyPrice); ?></td>
                           
        	
        </tr>
        <?php endforeach; ?>


    </table>
    <br>
  
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
           
    
                  
    <script type="text/javascript">
      window.onload = function() { window.print();document.location.href =  "<?php  echo base_url('admin/bahan'); ?>"; }
 </script>
 
 
 <script>
  window.onkeypress = function(e) {
    if ((e.which || e.keyCode) == 13) {
        $("#printfinish").click();
    }
}
  </script>
</body>
</html>

