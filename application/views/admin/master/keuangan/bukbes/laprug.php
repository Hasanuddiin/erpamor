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
								    		<th width="160" class="header">Nama Akun</th>
											<th width="80" class="header">Jan</th>
											<th width="80" class="header">Feb</th>
											<th width="80" class="header">Mar</th>
											<th width="80" class="header">Apr</th>
											<th width="80" class="header">Mei</th>
											<th width="80" class="header">Jun</th>
											<th width="80" class="header">Jul</th>
											<th width="80" class="header">Ags</th>
											<th width="80" class="header">Sep</th>
											<th width="80" class="header">Okt</th>
											<th width="80" class="header">Nov</th>
											<th width="80" class="header">Des</th>
								    	</tr>
								    </thead><thead>
								    
								    </thead><tbody>
								    	<tr>
								    		<td width="160"><b>Pendapatan</b></td>
								    		<td colspan="12"></td>
								    	</tr>
								    	<tr>
								    		<td>Total Pendapatan (+ PPN)</td>
								    														<td width="80" align="right">56.199</td>
																							<td width="80" align="right">214.368</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																			    	</tr>
								    	<tr>
								    		<td>Piutang (-)</td>
								    														<td width="80" align="right">0</td>
																							<td width="80" align="right">114.368</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																			    	</tr>
								    	<tr>
								    		<td style="text-align: right;"><b>Subtotal (KAS) Rp.</b></td>
								    														<td width="80" align="right"><b>56.199</b></td>
																							<td width="80" align="right"><b>100.000</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																							<td width="80" align="right"><b>0</b></td>
																			    	</tr>
								    	<tr>
								    		<td width="160"><br><b>Hutang - Piutang</b></td>
								    		<td colspan="12"></td>
								    	</tr>
								    	<tr>
								    		<td>Pembayaran Hutang</td>
								    														<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																			    	</tr>
								    	<tr>
								    		<td>Penerimaan Piutang</td>
								    														<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																			    	</tr>
								    	<tr>
								    		<td width="160"><br><b>Rabat</b></td>
								    		<td colspan="12"></td>
								    	</tr>
								    	<tr>
								    		<td>Total Rabat</td>
								    														<td width="80" align="right">7.110</td>
																							<td width="80" align="right">194.880</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																							<td width="80" align="right">0</td>
																			    	</tr>
								    	<tr>
								    		<td><br><b>Pegeluaran Biaya</b></td>
								    		<td></td>
								    	</tr>
								    									    	<tr>
								    		<td>Biaya Sewa</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    	</tr>
								    									    	<tr>
								    		<td>Biaya Listrik</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">125.000</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    	</tr>
								    									    	<tr>
								    		<td>Biaya Gaji</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    	</tr>
								    									    	<tr>
								    		<td>Biaya Telepon</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    			<td align="right">0</td>
								    										    	</tr>
								    									    	<tr>
								    		<td style="text-align: right;"><b>Subtotal Rp.</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>125.000</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    	</tr>
								    	<tr>
								    		<td colspan="13">&nbsp;</td>
								    	</tr>
								    	<tr valign="top">
								    		<td style="text-align: right;"><b>Netto Rp.<br>(Rabat - Biaya)</b></td>
								    		<td align="right"><b>7.110</b></td>
								    		<td align="right"><b>69.880</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    		<td align="right"><b>0</b></td>
								    	</tr>
								    </tbody>
								</table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
