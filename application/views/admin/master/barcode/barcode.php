<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> S.O</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  	<a href="<?php echo base_url(); ?>admin/addso" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah Barcode</a>
					<a href="<?php echo base_url(); ?>admin/tambah_jenis" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-print"></i> Cetak</a>
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
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
						<th>Kode Produk</th>
                        <th>Nama  Produk</th>
						<th>Kategori</th>
						<th>Brand</th>
						<th>Barcode</th>
						<th>Qty Barcode</th>
						<th>Aksi</th>
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
							<td><?php echo $lihat->categoryName; ?></td>
							<td><?php echo $lihat->brandName; ?></td>
							<td><img src="<?php echo base_url(); ?>assets/barcode/<?php echo $lihat->productBarcode; ?>.png" alt="barcode" /></td>
							<td>10</td>
							
                        <td align="center">
                          <div class="btn-group" role="group">
                            <a href="" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                            <a href="" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
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
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
