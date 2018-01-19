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
                <?php echo form_open('admin/save_proyek'); ?>

									<div class="form-group">
										<input type="hidden" name="id" >
										<label for="exampleInputEmail1">Kode Proyek</label>
										<input type="text" class="form-control" name="kode"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Proyek</label>
										<input type="text" class="form-control" name="name" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Alamat</label>
										<input type="text" class="form-control" name="address"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Zona</label>
										<select name="zona" class="form-control">
											<?php
											 foreach ($zona as $zona):
											 ?>
											 <option value="<?= $zona->zonaName ?>" ><?php echo $zona->zonaName ?></option>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Telp</label>
										<input type="text" class="form-control" name="phone"  />
									</div>
									
									
                  <a href="<?php echo base_url(); ?>admin/produk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>

                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>