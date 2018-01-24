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
                  <li><a href="#tab_2" data-toggle="tab">Diskon & Promo</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  <!-- form start -->
                <?php echo form_open('admin/update_produk'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
				<div class="col-md-6">
									<div class="form-group">
										<input type="hidden" name="id" value="<?php echo $data->productID ?>">
										<label for="exampleInputEmail1">Kode Produk</label>
										<input type="text" class="form-control" name="kode" value="<?php echo $data->productBarcode; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Produk</label>
										<input type="text" class="form-control" name="name" value="<?php echo $data->productName; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kode Pintas</label>
										<input type="text" class="form-control" name="kodepintas" value="<?php echo $data->productShortcut; ?>" />
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
											 if($satuan->satuanID==$data->productSat)
											 {
												 ?>
												 <option value="<?php $satuan->satuanID ?>"  SELECTED ><?php echo $satuan->satuanName ?></option>
											 <?php } else { ?>
											 <option value="<?php echo $satuan->satuanID ?>" ><?php echo $satuan->satuanName ?></option>
											 <?php } ?>
											 <?php endforeach ?>
											
												
										</select>
									</div>
									
									
					</div>
					<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Note</label>
										<textarea placeholder="" rows="3" class="form-control" name="note"><?php echo $data->productNote; ?></textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Harga Beli</label>
										<input type="text" class="form-control" name="beli" value="<?php echo $data->productBuyPrice; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Harga Jual</label>
										<input type="text" class="form-control" name="jual" value="<?php echo $data->productSalePrice; ?>" />
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Stok</label>
										<input type="text" class="form-control" name="stok" value="<?php echo $data->productStock; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Max Stok</label>
										<input type="text" class="form-control" name="maxstok" value="<?php echo $data->productmaxStock; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Min Stok</label>
										<input type="text" class="form-control" name="minstok" value="<?php echo $data->productminStock; ?>" />
									</div>
									
					</div>
                
                  </div><!-- /.tab-pane -->
				  
                  <div class="tab-pane" id="tab_2">
				  <div class="col-md-6">
				  <br/>
				  <h4><i class="fa fa-tag"></i> Diskon</h4>
				  <div class="form-group">
										<label for="exampleInputEmail1">Status Diskon</label>
										<select name="diskonstatus" class="form-control">
											<?php
											$selected1="";
											$selected2="";
											if($data->discount_status=="1")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->discount_status=="0")
											{
												$selected2="SELECTED";
											}
												
											?>
											 <option value="1" <?php echo $selected1; ?> >Aktif</option>
											  <option value="0" <?php echo $selected2; ?> >Tidak Aktif</option>
											 
										</select>
										
										<label for="exampleInputEmail1">Jumlah Diskon</label>
										<input type="text" class="form-control" name="diskon" value="<?php echo $data->productDiscount; ?>" />
									
											<label for="exampleInputEmail1">Jenis Diskon</label>
										<select name="tipediskon" class="form-control">
											<?php
											
											if($data->productDiscounttype=="1")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->productDiscounttype=="2")
											{
												$selected2="SELECTED";
											}
												else
											{
												$selected2="";
											}
											?>
											 <option value="0" <?php echo $selected2; ?> >Tidak Ada Diskon</option>
											  <option value="1" <?php echo $selected1; ?> >Persentase</option>
											  <option value="2" <?php echo $selected2; ?> >Kurangi Harga</option>
											 
										</select>
										<br/>
										<div class="col-md-6" >
											<div class="form-group">
												<label for="exampleInputEmail1">Mulai Diskon:</label>
												<input type="text" id="diskondatestart" name="diskondatestart" class="form-control" value="<?php echo $data->discount_start; ?>">
											</div>
										</div>
										<div class="col-md-6" >
											<div class="form-group">
												<label for="exampleInputEmail1">Akhir Diskon:</label>
												<input type="text" id="diskondatestop" name="diskondatestop" class="form-control" value="<?php echo $data->discount_end; ?>">
											</div>
										</div>
									</div>
				  </div>
				  
				  <div class="col-md-6">
				  <br/>
				   <h4><i class="fa fa-fw fa-star"></i>Promo</h4>
				    <div class="form-group">
										<label for="exampleInputEmail1">Status Promo</label>
										<select name="statuspromo" class="form-control">
											<?php
											
											if($data->promo_status=="1")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->promo_status=="0")
											{
												$selected2="SELECTED";
											}
												
											?>
											 <option value="1" <?php echo $selected1; ?> >Aktif</option>
											  <option value="0" <?php echo $selected2; ?> >Tidak Aktif</option>
											 
										</select>	
										<label for="exampleInputEmail1">Berlaku untuk pembelian jumlah :</label>
										<input type="text" class="form-control" name="promomaxbuy" value="<?php echo $data->promo_maxbuy; ?>" />
										
											<label for="exampleInputEmail1">Jenis Promo</label>
										<select name="tipepromo" class="form-control" id="tipepromo">
											<?php
											
											if($data->promo_type=="0")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->promo_type=="1")
											{
												$selected2="SELECTED";
											}
												else
											{
												$selected2="";
											}
											?>
											 <option value="0" <?php echo $selected2; ?> >Gratis Barang Sama</option>
											  <option value="1" <?php echo $selected1; ?> >Gratis Barang Lain</option>
										</select>
										 <div class="form-group" id="promodiv">
										 <label for="exampleInputEmail1">Pilih Produk</label>
										 <input type="hidden" class="form-control" name="promo_product" id="kdproduk" />
										 <input type="hidden" class="form-control" name="promo_status" id="nama" />
											Pilih Produk :
											<input type="text" class="form-control" name="" id="kodebarangpromo" value="-" onClick="this.value='';" autofocus />
											 </div>
										<label for="exampleInputEmail1">Jumlah Bonus Produk</label>
										<input type="text" class="form-control" name="promo"  />
										<div class="col-md-6" >
											<div class="form-group">
												<label for="exampleInputEmail1">Mulai Promo:</label>
												<input type="text" id="promodatestart" name="promodatestart" class="form-control" value="<?php echo $data->promo_start; ?>">
											</div>
										</div>
										<div class="col-md-6" >
											<div class="form-group">
												<label for="exampleInputEmail1">Akhir Promo:</label>
												<input type="text" id="promodatestop" name="promodatestop" class="form-control" value="<?php echo $data->promo_end; ?>">
											</div>
										</div>
									</div>
				  </div>
				  
                  </div><!-- /.tab-pane -->
				  
                </div><!-- /.tab-content -->
				
				 <?php endforeach ?>
				   <a href="<?php echo base_url(); ?>admin/produk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
               
                <?php echo form_close(); ?>
              </div>	  
              </div><!-- /.box-body -->
			  
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>