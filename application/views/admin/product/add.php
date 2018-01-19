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
                <?php echo form_open('product/save_product'); ?>

									<div class="form-group">
										<input type="hidden" name="id" >
										<label for="exampleInputEmail1">Kode Produk</label>
										<input type="text" class="form-control" name="kode" value="<?php echo $produksiID ?>"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Produk</label>
										<input type="text" class="form-control" name="nmproduk" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Deskripsi Produk</label>
										<textarea class="form-control" name="desproduk"  /></textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kategori Produk</label>
										<select name="katproduk" class="form-control">
											<?php
											 foreach ($data_kategori as $data_kategori):
											 ?>
											 <option value="<?= $data_kategori->categoryID ?>" ><?php echo $data_kategori->categoryName ?></option>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									
									
                  <a href="<?php echo base_url(); ?>product/formula" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>

                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>