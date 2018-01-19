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
                                        <tbody><tr>
                                            <th>TANGGAL</th>
                                            <th>NO</th>
                                            <th>KETERANGAN</th>
                                            <th>DEBIT</th>
                                            <th>KREDIT</th>
											<th>SALDO</th>
                                        </tr>
										<tr>
											<td></td>
                                            <td></td>
                                            <td>Saldo Awal</td>
                                            <td>10.000.000</td>
                                            <td></td>
                                            <td>10.000.000</td>
                                        </tr>
										<tr>
											<td>26-10-2016</td>
                                            <td>53424234</td>
                                            <td>Pembelian oleh PT ABC</td>
                                            <td>5.000.000</td>
                                            <td></td>
                                            <td>15.000.000</td>
                                        </tr>
										<tr>
											<td>26-10-2016</td>
                                            <td>5343432</td>
                                            <td>Inventory Adjustment</td>
                                            <td></td>
                                            <td>7.500.000</td>
                                            <td>7.500.000</td>
                                        </tr>
										
                                    </tbody></table>
                                </div><!-- /.box-body -->
								 <div class="box-body table-responsive no-padding">
								   <H3 style="font-size:16px;">1200-000-45 - PERSEDIAAN 2</h3>
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th>TANGGAL</th>
                                            <th>NO</th>
                                            <th>KETERANGAN</th>
                                            <th>DEBIT</th>
                                            <th>KREDIT</th>
											<th>SALDO</th>
                                        </tr>
										<tr>
											<td></td>
                                            <td></td>
                                            <td>Saldo Awal</td>
                                            <td>15.000.000</td>
                                            <td></td>
                                            <td>10.000.000</td>
                                        </tr>
										<tr>
											<td>26-10-2016</td>
                                            <td>53424234</td>
                                            <td>Pembelian oleh PT MENTARI PAGI</td>
                                            <td>5.000.000</td>
                                            <td></td>
                                            <td>20.000.000</td>
                                        </tr>
										<tr>
											<td>26-10-2016</td>
                                            <td>5343432</td>
                                            <td>Inventory Adjustment</td>
                                            <td></td>
                                            <td>7.500.000</td>
                                            <td>12.500.000</td>
                                        </tr>
										
                                    </tbody></table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
