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
                
                 <div class="form-group">
                            <div class="row row-input">
                                <label for="inputNamaPasien" class="col-sm-2 control-label input-sm">Nomor</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="row row-input">
                                <label for="inputNamaPasien" class="col-sm-2 control-label input-sm">Tanggal</label>
                                <div class="col-sm-4">
                                   <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control pull-right" id="reservation" type="text">
                                        </div>
                                </div>
                            </div>
                            
							<div class="row row-input">
                                <label for="inputNamaPasien" class="col-sm-2 control-label input-sm">Deskripsi</label>
                                <div class="col-sm-4">
                                   <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
							<br/>
							Mapping Kode Akun
							<hr/>
							
							
							 <div class="row row-input">
							 <div class="col-sm-4">
							 Akun
							 </div>
							 <div class="col-sm-4">
							 Debit
							 </div>
							 <div class="col-sm-4">
							 Kredit
							 </div>
							  <div class="col-sm-4">
                                <select class="form-control">
                                                <option>101 - Kas</option>
                                                <option>201 - Kewajiban</option>
                                                <option>250 - Utang Jangka Panjang</option>
                                                <option>400 - Pendapatan</option>
                                                <option>500 - Beban Usaha</option>
                                            </select>
								</div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control input-sm" >
                                </div>
								<div class="col-sm-4">
                                    <input type="text" class="form-control input-sm" >
                                </div>
                            </div>
							<div class="row row-input">
							  <div class="col-sm-4">
                             <select class="form-control">
                                                <option>101 - Kas</option>
                                                <option>201 - Kewajiban</option>
                                                <option>250 - Utang Jangka Panjang</option>
                                                <option>400 - Pendapatan</option>
                                                <option>500 - Beban Usaha</option>
                                            </select>
								</div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control input-sm" >
                                </div>
								<div class="col-sm-4">
                                    <input type="text" class="form-control input-sm" >
                                </div>
                            </div>
							
							
							
                                        </div>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
