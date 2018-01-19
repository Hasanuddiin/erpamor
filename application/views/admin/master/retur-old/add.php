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
		
		<?php $trxDate = date('d-m-Y'); ?>
          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
              </div>
              <div class="box-body">
			  
			  	  
			  
                <!-- form start -->
                <?php echo form_open('admin/save_produk'); ?>
					<div class="col-md-6">
									
									<div class="form-group">
									ID Supplier :
									<input type="text" class="form-control" name="id" id="produk" autofocus />
									</div>
									<div class="form-group">
									Nama :
									<input type="text" class="form-control" name="nama" id="produk" />
									</div>
									<div class="form-group">
									Alamat :
									<input type="text" class="form-control" name="alamat" id="produk" />
									</div>
									<div class="form-group">
									telp :
									<input type="text" class="form-control" name="telp" id="produk" />
									</div>
									
					</div>
					<div class="col-md-6">
					<div class="form-group">
										<input type="hidden" name="id" ">
										   <h3 class="box-title">No Retur : 1212234343</h3>
										<p>Tanggal : <?php echo $trxDate; ?>
									</div>
									<div class="form-group has-warning">
									Kode Produk :
									<input type="text" class="form-control" name="kode" id="produk" autofocus />
									</div>
									<div class="form-group">
									QTY :
									<input type="text" class="form-control" name="kode" id="produk" />
									<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
									
									</div>
					</div>
					
					<div class="col-md-12">
					
					 <div class="box-body table-responsive no-padding">
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>Kode</th>
						<th>Nama Produk</th>
                        <th>Jumlah</th>
						<th>Harga Supplier</th>
						<th>Disc(%) </th>
						<th>Sub Total</th>
                    </thead>
                    <tbody>
                    	<tr>
							<td></td>
                    		<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
               		
                    	</tr>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
				 <a href="<?php echo base_url(); ?>admin/produk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  
					</div>
                  
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
		 
		 <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui/jquery-ui.min.js"></script>
		  <script>
    $(function(){
  $("#produk").autocomplete({
    source: "admin/get_produk" // path to the get_birds method
  });
});
    </script>
        </div>
		
