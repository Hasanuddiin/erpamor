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
          
        <div class="col-xs-12">  	
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Komponen Gaji Pokok</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Golongan</a></li>
				  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
		   <div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
					<a href="<?php echo base_url(); ?>hrd/tambah_komponen" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
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
                        <th>Nama Komponen</th>
						<th>Status</th>
						<th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($datakomponen as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->nama_komponen; ?></td>
							<td><?php echo $lihat->komponenStatus; ?></td>
							<td>
							<a href="<?php echo base_url(); ?>hrd/edit_komponen/<?php echo $lihat->komponenID ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url(); ?>hrd/hapus_komponen/<?php echo $lihat->komponenID ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
							</td>
							              		
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
                  </div><!-- /.tab-pane -->
				  
				  
                  <div class="tab-pane" id="tab_2">
                    <div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
					<a href="<?php echo base_url(); ?>hrd/tambah_golongan" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
                  </h3>
                  <div class="box-tools">
                  	
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>Nama Golongan</th>
						<th>Status</th>
						<th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($datagolongan as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->golonganName; ?></td>
							<td><?php echo $lihat->golonganStatus; ?></td>
							<td>
							<a href="<?php echo base_url(); ?>hrd/golongan_komponen?id=<?php echo $lihat->golonganID ?>&nama=<?php echo $lihat->golonganName ?>"  class="btn btn-sm btn-warning btn-flat"><i class="fa fa-list"></i> Komponen</a>
							<a href="<?php echo base_url(); ?>hrd/edit_golongan/<?php echo $lihat->golonganID ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url(); ?>hrd/hapus_golongan/<?php echo $lihat->golonganID ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
							
							</td>
							              		
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
