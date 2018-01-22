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
                  <h3 class="box-title">
                  	<a href="<?php echo base_url(); ?>admin/tambah_kategori" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
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
                                            <th>KODE ANGGARAN</th>
                                            <th>NAMA ANGGARAN</th>
                                            <th>JUMLAH</th>
                                            <th>STATUS</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                        <tr>
                                            <td>183</td>
                                            <td>Anggaran Pembaharuan Gedung</td>
                                            <td>120.000.000</td>
                                            <td><span class="label label-success">Approved</span></td>
                                            <td>Telah Sesuai</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Anggaran Pembaharuan Gedung</td>
                                            <td>320.000.000</td>
                                            <td><span class="label label-warning">Pending</span></td>
                                            <td>Sedang Di Analisa</td>
                                        </tr>
                                        <tr>
                                            <td>657</td>
                                            <td>Anggaran Pembaharuan Gedung</td>
                                            <td>430.000.000</td>
                                            <td><span class="label label-success">Approved</span></td>
                                            <td>Memenuhi anggaran</td>
                                        </tr>
                                        <tr>
                                            <td>175</td>
                                            <td>Anggaran Pembaharuan Gedung</td>
                                            <td>760.000.000</td>
                                            <td><span class="label label-danger">Denied</span></td>
                                            <td>Melebihi Anggaran</td>
                                        </tr>
                                    </tbody></table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
