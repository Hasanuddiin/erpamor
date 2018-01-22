<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  	<a href="<?php echo base_url(); ?>admin/tambah_produk" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
                  </h3>
                  <div class="box-tools">
                  	<!--
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    -->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                
                 <table id="example2" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>Kode Produk</th>
						<th>Nama Produk</th>
                        <th>Stok</th>
						<th>Min Stok</th>
						<th>Harga</th>
						<th>Disc/Pot</th>
						<th>Promo</th>
						<th width=150>Action</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->productBarcode; ?></td>
							<td><?php echo $lihat->productName; ?></td>
							<td><?php echo $lihat->productStock; ?></td>
							<td><?php echo $lihat->productminStock; ?></td>
							<td><?php echo $lihat->productSalePrice; ?></td>
							<td><?php echo $lihat->productDiscount; ?></td>
							<td><?php echo $lihat->promo_status; ?></td>
							
                        <td align="center">
                          <div class="btn-group" role="group">
                            <a href="<?php echo base_url(); ?>admin/edit_produk/<?php echo $lihat->productID ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url(); ?>admin/hapus_produk/<?php echo $lihat->productID ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data : <?php echo $lihat->productName; ?> ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                          </div>
                        </td>                  		
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>