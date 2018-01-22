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
                <?php echo form_open('admin/update_member'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
									<div class="form-group">
										<input type="hidden" name="id" value="<?php echo $data->memberID ?>">
										<label for="exampleInputEmail1">Kode Outlet</label>
										<input type="text" class="form-control" name="kode" value="<?php echo $data->memberCode; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Outlet</label>
										<input type="text" class="form-control" name="name" value="<?php echo $data->memberFullName; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Alamat</label>
										<input type="text" class="form-control" name="address" value="<?php echo $data->memberAddress; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Zona</label>
										<select name="zona" class="form-control">
											<?php
											 foreach ($zona as $zona):
											 if($zona->zonaName==$data->memberzone)
											 {
												 ?>
												 <option value="<?php $zona->zonaName ?>"  SELECTED ><?php echo $zona->zonaName ?></option>
											 <?php } else { ?>
											 <option value="<?php echo $zona->zonaName ?>" ><?php echo $zona->zonaName ?></option>
											 <?php } ?>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Telp</label>
										<input type="text" class="form-control" name="phone" value="<?php echo $data->memberPhone; ?>" />
									</div>
									
									
                  <a href="<?php echo base_url(); ?>admin/produk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>