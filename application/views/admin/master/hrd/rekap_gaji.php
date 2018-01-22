 <div class="row">   
			<div class="col-md-4">
               <?php echo form_open('hrd/tambah_bonus/?nik='.$nik.'&nama='.$nama.'&harikerja='.$harikerja.''); ?>
									
									<?php foreach ($data_user as $lihat):?>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama</label>
										<input type="text" class="form-control" name="nama" value="<?php echo $lihat->nama_lengkap; ?>" readonly />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kantor</label>
										<input type="text" class="form-control" name="kantor" value="<?php echo $lihat->identityName; ?>" readonly />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Posisi</label>
										<input type="text" class="form-control" name="posisi" value="<?php echo $nama; ?>" readonly />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Golongan</label>
										<input type="text" class="form-control" name="golongan" value="<?php echo $nama; ?>" readonly />
									</div>
									<?php endforeach; ?>
									
                  <button type="submit" name="submit" value="simpan" class="btn btn-info"><i class="fa fa-print"></i> Cetak Slip Gaji</button>
                <?php echo form_close(); ?>
              </div>
			  <div class="col-md-8">
			<div class="box box-info">
			 <div class="box-body table-responsive no-padding">
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <tbody>
                      <tr><td></td><td>Total Hari Kerja</td><td><b><?php echo $harikerja; ?> Hari</b></td></tr>
					<tr><td ></td><td>Total Jam Kerja</td><td><b><?php echo $totalkerja; ?> Jam</b></td></tr>
					<tr><td ></td><td>Total Lembur</td><td><b><?php echo $total; ?> Jam</b></td></tr>
                    </tbody>
					
                  </table>
                  </div>
                </div><!-- /.box-body -->
			</div>
</div>