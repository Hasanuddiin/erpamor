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
                <?php echo form_open('admin/save_brand'); ?>
             
									<div class="form-group">
										<input type="hidden" name="id" >
										<label for="exampleInputEmail1">Kode Akun</label>
										<input type="text" class="form-control" name="name"/>
									</div>
									<div class="form-group">
										<input type="hidden" name="id" >
										<label for="exampleInputEmail1">Nama Akun</label>
										<input type="text" class="form-control" name="name"/>
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Status</label>
										<select name="status" class="form-control">
									
												<option value="Y"  >Y ( Aktif )</option>
												<option value="N" >N ( Tidak Aktif )</option>
										</select>
									</div>
									
                        
                  <a href="<?php echo base_url(); ?>admin/userman" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>