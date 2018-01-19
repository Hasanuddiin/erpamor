<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $title; ?>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Edit</a></li>
              <li><a href="<?php echo base_url(); ?>admin/zona"> <?php echo $title; ?></a></li>
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
                <?php echo form_open('admin/update_zona'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
									<div class="form-group">
										<input type="hidden" name="id" value="<?php echo $data->zonaID ?>">
										<label for="exampleInputEmail1">Nama Kategori</label>
										<input type="text" class="form-control" name="name" value="<?php echo $data->zonaName; ?>" />
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Status</label>
										<select name="status" class="form-control">
											<?php
											
											if($data->zonaStatus=="Y")
											{
												$selected1="SELECTED";
											}
											else
												$selected1="";
											{
											}
											if($data->zonaStatus=="N")
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
									
                        
                  <a href="<?php echo base_url(); ?>admin/kategori" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>