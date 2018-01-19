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
		  <div class="col-md-4">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form  <?php echo $title; ?> <b><?php echo $namagolongan; ?></b></h3>
              </div>
              <div class="box-body">
			  
			  	  
			  
                <!-- form start -->
               <?php echo form_open('hrd/golongan_komponen/?id='.$idgolongan.'&nama='.$namagolongan.''); ?>
									<div class="form-group">
										<input type="hidden" name="golongan" value="<?php echo $idgolongan ?>">
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Komponen</label>
										<select name="komponen" class="form-control">
											<?php
											 foreach ($datakomponen as $datakomponen):
											 ?>
											 <option value="<?= $datakomponen->komponenID ?>" ><?php echo $datakomponen->nama_komponen ?></option>
											 <?php endforeach ?>
										</select>
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Jumlah</label>
										<input type="text" class="form-control" name="jumlah" />
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Jumlah (x) Hari Kerja</label>
										<select name="kali" class="form-control">
									
												<option value="1"  >Ya</option>
												<option value="0" >Tidak</option>
										</select>
									</div>
                        
                  <a href="<?php echo base_url(); ?>hrd/konfigurasi" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" name="submit" value="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
			</div>
			<div class="col-md-8">
			<div class="box box-info">
			 <div class="box-body table-responsive no-padding">
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>Nama Komponen</th>
						<th>Jumlah</th>
						<th>(x) Hari</th>
						<th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($datakomponengolongan as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->nama_komponen; ?></td>
							<td>Rp. <?php echo number_format($lihat->nilai); ?></td>
							<td><?php 
									if($lihat->iskalihari=="1")
									{
										$info="Ya";
									}
									else{
										$info="Tidak";
									}
							
							echo $info; ?></td>
							<td>
                            <a href="<?php echo base_url(); ?>hrd/hapus_golongan_komponen/<?php echo $lihat->detailID ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
							
							</td>
							              		
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>
                  </div>
                </div><!-- /.box-body -->
			</div>
          </section><!-- /.content -->
        </div>