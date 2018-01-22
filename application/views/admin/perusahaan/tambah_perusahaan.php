<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $title; ?>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/perusahaan"> <?php echo $title; ?></a></li>
              <li class="active">Edit</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form  <?php echo $title; ?></h3>
              </div>
              <div class="box-body">
			  
			  	  
			  
                <!-- form start -->
                <?php echo form_open('admin/save_identitas'); ?>
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Data Perusahaan</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab">Data Pajak</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab">Konfigurasi Printer</a></li>
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="form-group">
										<label for="exampleInputEmail1">Nama Kantor</label>
										<input type="text" class="form-control" name="name"/>
										</div>
										<div class="form-group">
										<label for="exampleInputEmail1">Tipe</label>
										<select name="identitytype" id="identitytype" class="form-control">
											
												<option value="1">Pusat</option>
												<option value="2">Cabang</option>
										</select>
										</div>
										<div class="form-group" id="idenhead">
										<label for="exampleInputEmail1">Kantor Pusat</label>
										<select name="headidentity" class="form-control">
											<?php
											 foreach ($dataidentity as $dataidentity):
											 ?>
											 <option value="<?= $dataidentity->identityID ?>" ><?php echo $dataidentity->identityName ?></option>
											 <?php endforeach ?>
										</select>
										<label for="exampleInputEmail1">Kepala cabang</label>
										<input type="text" class="form-control" name="owner2"  />
										</div>
										 <div class="form-group" id="divpemilik">
										<label for="exampleInputEmail1">Nama Penanggung Jawab</label>
										<input type="text" class="form-control" name="owner1"  />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Alamat</label>
										<input type="text" class="form-control" name="address"/>
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Telp</label>
										<input type="text" class="form-control" name="phone"  />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Email</label>
										<input type="text" class="form-control" name="email"  />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">No. HP Penanggung Jawab</label>
										<input type="text" class="form-control" name="hp"  />
										</div>
										
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                         <div class="form-group">
										<label for="exampleInputEmail1">No. PKP</label>
										<input type="text" class="form-control" name="pkp"  />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Tgl. Pengukuhan PKP</label>
										<input type="text" class="form-control" name="pkpdate"  />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">NPWP</label>
										<input type="text" class="form-control" name="npwp"  />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">PPN(%)</label>
										<input type="text" class="form-control" name="ppn"  />
										</div>
                                    </div><!-- /.tab-pane -->
									<div class="tab-pane" id="tab_3">
                                       <div class="form-group">
										<label for="exampleInputEmail1">Print Paper Size Penjualan </label>
										<select name="printsale" class="form-control">
												<option value="1" >Besar (Epson LX-310)</option>
												<option value="2">Kecil (Epson TM U220)</option>
										</select>
										</div>
										<div class="form-group">
										<label for="exampleInputEmail1">Print Paper Size Pembelian </label>
										<select name="printbuy" class="form-control">
												<option value="1"   >Besar (Epson LX-310)</option>
												<option value="2" >Kecil (Epson TM U220)</option>
										</select>
										</div>
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        
		
                  <a href="<?php echo base_url(); ?>admin/identitas" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>