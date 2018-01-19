<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
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
                  	<a href="<?php echo base_url(); ?>admin/tambah_bahan" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
					<a href="<?php echo base_url(); ?>admin/print_bahan" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-print"></i> Cetak</a>
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
                        <th>Kode</th>
						<th>Nama Bahan</th>
                        <th>Stok</th>
						<th>Max Stok</th>
						<th>Min Stok</th>
						<th>Harga Beli</th>
						<th>Satuan</th>
						<th>Action</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->bahanBarcode; ?></td>
							<td><?php echo $lihat->bahanName; ?></td>
							<td><?php echo $lihat->bahanStock; ?></td>
							<td><?php echo $lihat->bahanmaxStock; ?></td>
							<td><?php echo $lihat->bahanminStock; ?></td>
							<td><?php echo number_format($lihat->bahanBuyPrice); ?></td>
							<td><?php echo $lihat->satuanName; ?></td>
							
                        <td align="center">
                          <div class="btn-group" role="group">
                            <a href="<?php echo base_url(); ?>admin/edit_bahan/<?php echo $lihat->bahanID ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                            <?php $levuser=$this->session->userdata('admin_level'); ?>
                             <?php if($levuser=='1' or $levuser=='4')
                              { ?>
                            <a href="<?php echo base_url(); ?>admin/hapus_bahan/<?php echo $lihat->bahanID ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data : <?php echo $lihat->bahanName; ?> ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                            <?php } ?>
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
