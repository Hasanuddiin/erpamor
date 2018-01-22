<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> S.O</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  <a href="<?php echo base_url(); ?>admin/tambah_jenis" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-print"></i> Cetak</a>
                  </h3>
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
								    		<th width="30" style="border-left: 1px solid #CCCCCC;" class="header">No <i class="fa fa-sort"></i></th>
											<th width="60" style="border-left: 1px solid #CCCCCC;" class="header">Tanggal <i class="fa fa-sort"></i></th>
											<th width="60" style="border-left: 1px solid #CCCCCC;" class="header">Total Transaksi <i class="fa fa-sort"></i></th>
											<th width="60" style="border-left: 1px solid #CCCCCC;" class="header">Total Piutang <i class="fa fa-sort"></i></th>
											<th width="60" style="border-left: 1px solid #CCCCCC;" class="header">Total Penerimaan Piutang <i class="fa fa-sort"></i></th>
											<th width="60" style="border-left: 1px solid #CCCCCC;" class="header">Total Hutang <i class="fa fa-sort"></i></th>
											<th width="60" style="border-left: 1px solid #CCCCCC;" class="header">Total Pembayaran Hutang <i class="fa fa-sort"></i></th>
											<th width="60" style="border-left: 1px solid #CCCCCC;" class="header">Total Rabat <i class="fa fa-sort"></i></th>
											<th width="60" style="border-left: 1px solid #CCCCCC;" class="header">Total Biaya <i class="fa fa-sort"></i></th>
								    	</tr>
								    </thead><thead>
								    </thead><tbody>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">1</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">07/02/2017</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">4.390</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">125.000</td>
								    	</tr>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">2</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">08/02/2017</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    	</tr>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">3</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">09/02/2017</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    	</tr>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">4</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">10/02/2017</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    	</tr>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">5</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">11/02/2017</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    	</tr>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">6</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">12/02/2017</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    	</tr>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">7</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">13/02/2017</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    	</tr>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">8</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC;">14/02/2017</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;">0</td>
								    	</tr>
								    									    	<tr>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;" colspan="2">Rp.</td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;"><b>0</b></td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;"><b>0</b></td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;"><b>0</b></td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;"><b>4.390</b></td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;"><b>0</b></td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;"><b>0</b></td>
								    		<td style="border-left: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; text-align: right;"><b>125.000</b></td>
								    	</tr>
								    </tbody>
								</table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
