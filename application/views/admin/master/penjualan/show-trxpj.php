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
                <a href="<?php echo base_url(); ?>admin/print" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-print"></i> Cetak</a>  
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
						<th width=40%>Nama Outlet</th>
						<th>Total Penjualan</th>
						<th>Aksi</th>
                    </thead>
                    <tbody>
					
                      	<?php  
                        $no = 1;
						$totaltrx = 0;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->invoiceID; ?></td>
							<td><?php echo $lihat->trxDate; ?></td>
							<td><?php echo $lihat->identityName; ?></td>
							<td>
							<?php
							echo number_format($lihat->trxTotal); 
							?>
							</td>
							<td>
							<?php
							if($this->session->userdata('identityID')=='1')
							{
								?>
							<a href="<?php echo base_url(); ?>admin/showtrxpj_detail?nofak=<?php echo $lihat->invoiceID ?>&identity=<?php echo $lihat->identityID ?>" class="btn btn-sm btn-warning btn-flat"> Detail</a>	
								<?php
							}
							else
							{ ?>
						
							<a href="<?php echo base_url(); ?>admin/addtpj_nonmemberdetail_edit?nofak=<?php echo $lihat->invoiceID ?>&tgltrx=<?php echo $lihat->trxDate ?>" onclick="javascript: return confirm('Anda akan merubah transaksi dengan no Invoice : <?php echo  $lihat->invoiceID; ?> ?')" class="btn btn-sm btn-warning btn-flat" ><i class="fa fa-fw fa-edit"></i> Perubahan </a>
						   <?php } ?>
							</td>
                    	</tr>
                    	<?php
						$totaltrx =$totaltrx+$lihat->trxTotal;
						endforeach; ?>
                    </tbody>
                  </table>
				  <h4>Total Penjualan (<i>sampai tanggal <?php echo date('d-m-Y'); ?></i>): Rp.  <b><?php echo number_format($totaltrx); ?></b></h4>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
