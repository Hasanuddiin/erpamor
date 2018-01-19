<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $title; ?>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Edit</a></li>
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
                <?php echo form_open('admin/update_suplier'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
				
				<div class="col-md-6">
									<div class="form-group">
										<input type="hidden" name="id" value="<?php echo $data->supplierID ?>">
										<label for="exampleInputEmail1">Kode Suplier</label>
										<input type="text" class="form-control" name="kode" value="<?php echo $data->supplierCode; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama</label>
										<input type="text" class="form-control" name="name" value="<?php echo $data->supplierName; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Alamat</label>
										<input type="text" class="form-control" name="alamat" value="<?php echo $data->supplierAddress; ?>" />
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Kontak Person</label>
										<input type="text" class="form-control" name="kontak" value="<?php echo $data->supplierContactPerson; ?>" />
									</div>
				</div>
				<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">E-Mail</label>
										<input type="text" class="form-control" name="fax" value="<?php echo $data->supplierFax; ?>" />
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Phone</label>
										<input type="text" class="form-control" name="phone" value="<?php echo $data->supplierPhone; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nomor HP</label>
										<input type="text" class="form-control" name="hp" value="<?php echo $data->supplierCPHp; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Status</label>
										<select name="status" class="form-control">
											<?php
											
											if($data->supplierStatus=="Y")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->supplierStatus=="N")
											{
												$selected2="SELECTED";
											}
												else
											{
												$selected2="";
											}
											?>
												<option value="Y"  <?php echo $selected1; ?> >Y ( Aktif )</option>
												<option value="N" <?php echo $selected2; ?> >N ( Tidak Aktif )</option>
										</select>
									</div>
					</div>				
                        
                  <a href="<?php echo base_url(); ?>admin/suplier" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>