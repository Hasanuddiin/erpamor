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
			  
			  <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Main</a></li>
                 
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  <!-- form start -->
                <?php echo form_open('admin/update_bahan'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
				<div class="col-md-6">
									<div class="form-group">
										<input type="hidden" name="id" value="<?php echo $data->bahanID ?>">
										<label for="exampleInputEmail1">Kode Bahan</label>
										<input type="text" class="form-control" name="kode" value="<?php echo $data->bahanBarcode; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Bahan</label>
										<input type="text" class="form-control" name="name" value="<?php echo $data->bahanName; ?>" />
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Suplier</label>
										<select name="suplier" class="form-control">
										<option>- Pilih Supplier</option>
											<?php
											 foreach ($suplier as $suplier):
											 if($suplier->supplierID==$data->supplierID)
											 {
												 ?>
												 <option value="<?php $suplier->supplierID ?>"  SELECTED ><?php echo $suplier->supplierName ?></option>
											 <?php } else { ?>
											 <option value="<?php echo $suplier->supplierID ?>" ><?php echo $suplier->supplierName ?></option>
											 <?php } ?>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kategori</label>
										<select name="kategori" class="form-control">
											<?php
											 foreach ($kategori as $kategori):
											 if($kategori->categoryID==$data->categoryID)
											 {
												 ?>
												 <option value="<?php $kategori->categoryID ?>"  SELECTED ><?php echo $kategori->categoryName ?></option>
											 <?php } else { ?>
											 <option value="<?php echo $kategori->categoryID ?>" ><?php echo $kategori->categoryName ?></option>
											 <?php } ?>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Satuan</label>
										<select name="satuan" class="form-control">
											<?php
											 foreach ($satuan as $satuan):
											 if($satuan->satuanID==$data->bahanSat)
											 {
												 ?>
												 <option value="<?php $satuan->satuanID ?>"  SELECTED ><?php echo $satuan->satuanName ?></option>
											 <?php } else { ?>
											 <option value="<?php echo $satuan->satuanID ?>" ><?php echo $satuan->satuanName ?></option>
											 <?php } ?>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Brand</label>
										<select name="brand" class="form-control">
										<option>- Pilih Brand</option>
											<?php
											 foreach ($brand as $brand):
											 if($brand->brandID==$data->brandID)
											 {
												 ?>
												 <option value="<?php $brand->brandID ?>"  SELECTED ><?php echo $brand->brandName ?></option>
											 <?php } else { ?>
											 
											 <?php } ?>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									
					</div>
					<div class="col-md-6">

									<div class="form-group">
										<label for="exampleInputEmail1">Value</label>
										<input type="text" class="form-control" name="satval" value="<?php echo $data->bahanSatVal; ?>" />
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Harga Beli</label>
										<input type="text" class="form-control" name="beli" value="<?php echo $data->bahanBuyPrice; ?>" />
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputEmail1">Stok</label>
										<input type="text" class="form-control" name="stok" value="<?php echo $data->bahanStock; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Max Stok</label>
										<input type="text" class="form-control" name="maxstok" value="<?php echo $data->bahanmaxStock; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Min Stok</label>
										<input type="text" class="form-control" name="minstok" value="<?php echo $data->bahanminStock; ?>" />
									</div>
									
					</div>
                
                  </div><!-- /.tab-pane -->
				  
                  
				  
                <div>
				
				 <?php endforeach ?>
				   <a href="<?php echo base_url(); ?>admin/bahan" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
               
                <?php echo form_close(); ?>
              </div>	  
            
			  
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>