<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $title; ?>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Tambah</a></li>
              <li><a href="<?php echo base_url(); ?>admin/produk"> <?php echo $title; ?></a></li>
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
                <?php echo form_open('admin/save_bahan'); ?>
				<div class="col-md-6">
									<div class="form-group">
										<input type="hidden" name="id" ">
										<label for="exampleInputEmail1">Kode Bahan</label>
										<input type="text" class="form-control" name="kode"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Bahan</label>
										<input type="text" class="form-control" name="name"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Suplier</label>
										<select name="suplier" class="form-control">
										<option value="" >Pilih Supplier</option>
											<?php
											 foreach ($suplier as $suplier):
											 ?>
											 <option value="<?= $suplier->supplierID ?>" ><?php echo $suplier->supplierName ?></option>
											 <?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kategori</label>
										<select name="kategori" class="form-control">
											<?php
											 foreach ($kategori as $kategori):
											 ?>
											 <option value="<?= $kategori->categoryID ?>" ><?php echo $kategori->categoryName ?></option>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Satuan</label>
										<select name="satuan" class="form-control">
											<?php
											 foreach ($satuan as $satuan):
											 ?>
											 <option value="<?= $satuan->satuanID ?>" ><?php echo $satuan->satuanName ?></option>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Satuan Value</label>
										<input type="text" class="form-control" name="satval"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Brand</label>
										<select name="brand" class="form-control">
											<?php
											 foreach ($brand as $brand):
											 ?>
											 <option value="<?= $brand->brandID ?>" ><?php echo $brand->brandName ?></option>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									
									
					</div>
					<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Harga Beli</label>
										<input type="text" class="form-control" name="beli"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Stok</label>
										<input type="text" class="form-control" name="stok" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Max Stok</label>
										<input type="text" class="form-control" name="maxstok" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Min Stok</label>
										<input type="text" class="form-control" name="minstok" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Note</label>
										<textarea placeholder="" rows="3" class="form-control" name="note"></textarea>
									</div>
									
									<br>
					</div>
                  <a href="<?php echo base_url(); ?>admin/produk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
		 
        </div>
		
