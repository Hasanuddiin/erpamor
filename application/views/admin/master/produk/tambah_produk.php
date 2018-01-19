<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $title; ?>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Edit</a></li>
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
                <?php echo form_open('admin/save_produk'); ?>
				<div class="col-md-6">
									<div class="form-group">
										<input type="hidden" name="id" ">
										<label for="exampleInputEmail1">Kode Produk</label>
										<input type="text" class="form-control" name="kode" value="<?php echo $produksiID ?>" />
									</div>
									<div class="form-group" hidden="on">
										<label for="exampleInputEmail1"></label>
										<input type="text" class="form-control" name="productType" value="2" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Produk</label>
										<input type="text" class="form-control" name="name"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kode Pintas</label>
										<input type="text" class="form-control" name="kodepintas"  />
											
												
										</select>
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Mitra</label>
										<select name="suplier" class="form-control">
											<?php
											 foreach ($suplier as $suplier):
											 ?>
											 <option value="<?= $suplier->mitraID ?>" ><?php echo $suplier->mitraName ?></option>
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
										<label for="exampleInputEmail1">Note</label>
										<textarea placeholder="" rows="3" class="form-control" name="note"></textarea>
									</div>
									
					</div>
					<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Harga Beli</label>
										<input type="text" class="form-control" name="beli"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Harga Jual</label>
										<input type="text" class="form-control" name="jual" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Diskon</label>
										<input type="text" class="form-control" name="diskon" />
										<div class="form-group">
										<label for="exampleInputEmail1">Tipe Diskon</label>
										<select name="tipediskon" class="form-control">
											 <option value="1" >Persentase</option>
											  <option value="2" >Kurangi Harga</option>
										</select>
									</div>
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
									
									
									
									<br>
					</div>
                  <a href="<?php echo base_url(); ?>admin/produk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
		 
        </div>
		
