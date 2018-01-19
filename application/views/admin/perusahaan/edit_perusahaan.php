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
                <?php echo form_open('admin/update_identitas'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                 
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
										<input type="hidden" name="id" value="<?php echo $data->identityID ?>">
										<label for="exampleInputEmail1">Nama Kantor</label>
										<input type="text" class="form-control" name="name" value="<?php echo $data->identityName; ?>" />
										</div>
										<div class="form-group">
										<label for="exampleInputEmail1">Tipe</label>
										<select name="printsale" class="form-control">
											<?php
											
											if($data->identityType=="1")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->identityType=="2")
											{
												$selected2="SELECTED";
											}
												else
											{
												$selected2="";
											}
											?>
												<option value="1"  <?php echo $selected1; ?> >Pusat</option>
												<option value="2" <?php echo $selected2; ?> >Cabang</option>
										</select>
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Nama Pemilik/Kepala cabang</label>
										<input type="text" class="form-control" name="owner" value="<?php echo $data->identityOwner; ?>" />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Alamat</label>
										<input type="text" class="form-control" name="address" value="<?php echo $data->identityAddress; ?>" />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Telp</label>
										<input type="text" class="form-control" name="phone" value="<?php echo $data->identityPhone; ?>" />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Email</label>
										<input type="text" class="form-control" name="email" value="<?php echo $data->identityEmail; ?>" />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">No. HP Pemilik</label>
										<input type="text" class="form-control" name="hp" value="<?php echo $data->identityOwnerPhone; ?>" />
										</div>
										
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                         <div class="form-group">
										<label for="exampleInputEmail1">No. PKP</label>
										<input type="text" class="form-control" name="pkp" value="<?php echo $data->identityPKP; ?>" />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">Tgl. Pengukuhan PKP</label>
										<input type="text" class="form-control" name="pkpdate" value="<?php echo $data->identityPKP; ?>" />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">NPWP</label>
										<input type="text" class="form-control" name="npwp" value="<?php echo $data->identityNPWP; ?>" />
										</div>
										 <div class="form-group">
										<label for="exampleInputEmail1">PPN(%)</label>
										<input type="text" class="form-control" name="ppn" value="<?php echo $data->identityPPN; ?>" />
										</div>
                                    </div><!-- /.tab-pane -->
									<div class="tab-pane" id="tab_3">
                                       <div class="form-group">
										<label for="exampleInputEmail1">Print Paper Size Penjualan </label>
										<select name="printsale" class="form-control">
											<?php
											
											if($data->identityPrintSale=="1")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->identityPrintSale=="2")
											{
												$selected2="SELECTED";
											}
												else
											{
												$selected2="";
											}
											?>
												<option value="1"  <?php echo $selected1; ?> >Besar (Epson LX-310)</option>
												<option value="2" <?php echo $selected2; ?> >Kecil (Epson TM U220)</option>
										</select>
										</div>
										<div class="form-group">
										<label for="exampleInputEmail1">Print Paper Size Pembelian </label>
										<select name="printbuy" class="form-control">
											<?php
											
											if($data->identityPrintBuy=="1")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->identityPrintBuy=="2")
											{
												$selected2="SELECTED";
											}
												else
											{
												$selected2="";
											}
											?>
												<option value="1"  <?php echo $selected1; ?> >Besar (Epson LX-310)</option>
												<option value="2" <?php echo $selected2; ?> >Kecil (Epson TM U220)</option>
										</select>
										</div>
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        
		
                  <a href="<?php echo base_url(); ?>admin/identitas" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>