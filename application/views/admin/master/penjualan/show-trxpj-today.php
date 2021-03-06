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
                  <a href="<?php echo base_url(); ?>admin/showreporttoday" class="btn btn-sm btn-success btn-flat"><i class="fa fa-print"></i> &nbsp; Cetak</a>  

                    
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group" style="margin-left:10px;">
                           <label>Cari Berdasarkan Tanggal</label>
                           <div class="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                           <input class="form-control datepicker"  id="tgllahir" data-date-format="yyyy-mm-dd" type="text" name="tanggal" style="width:150px" >
                           </div>
                           
                        </div>
    
                     </form>
               
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
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>No Invoice</th>
						<th>Tgl. Transaksi</th>
            <th>Watku</th>
						<th>Nama Kasir</th>
                        <th>Alamat</th>
						<th>Total Pembelian</th>
						<th>Cara Bayar </th>
						<th>Termin </th>
						<th>Metode Pembayaran </th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->invoiceID; ?></td>
							<td><?php echo $lihat->trxDate; ?></td>
              <td><?php echo $lihat->trxTime; ?></td>
							<td><?php echo $lihat->nama_lengkap; ?></td>
							<td><?php echo $lihat->trxAddress; ?></td>
							<td><?php echo number_format($lihat->trxTotal); ?></td>
							<td><?php
							if($lihat->trxStatus=="1")
							{
								echo "Cash";
							}
							else
							{
								echo "Termin";
							}
							?>
							</td>
							<td><?php
							if($lihat->trxTerminDate=="0000-00-00")
							{
								echo "-";
							}
							else
							{
								echo $lihat->trxTerminDate;
							}
							?></td>
							<td><?php echo $lihat->trxbankmethod; ?></td>
							
                            		
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                    </table>
              <h4>Total Penjualan (<i> Hari ini <?php echo date('d-m-Y'); ?></i>): Rp.  <b><?php foreach($totalpendapatan as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?></b></h4>

          <h4>Penjualan Kasir :(<i><?php echo strtoupper($this->session->userdata('admin_nama'));?> </i>) Hari ini : Rp.  <b><?php foreach($totalPendToday as $data): 
            echo number_format($data->Totaltoday); 
            endforeach ?></b></h4>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
