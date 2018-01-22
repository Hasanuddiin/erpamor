 <div class="row">   
			<div class="col-md-4">
               <?php echo form_open('hrd/tambah_potongan/?nik='.$nik.'&nama='.$nama.'&harikerja='.$harikerja.''); ?>
									<div class="form-group">
										<input type="hidden" name="nik" value="<?php echo $nik ?>">
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Potongan</label>
										<select name="potongan" class="form-control">
											<?php
											 foreach ($datapotongan as $datapotongan):
											 ?>
											 <option value="<?= $datapotongan->potonganID ?>" ><?php echo $datapotongan->potonganName ?></option>
											 <?php endforeach ?>
										</select>
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Jumlah</label>
										<input type="text" class="form-control" name="jumlah" />
									</div>
									
                  <button type="submit" name="submit" value="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
              </div>
			  <div class="col-md-8">
			<div class="box box-info">
			 <div class="box-body table-responsive no-padding">
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>Nama Potongan</th>
						<th>Jumlah</th>
						<th>Aksi</th>
                    </thead>
					<?php if($datapotongankaryawan) { ?>
                    <tbody>
                      	<?php  
                        $no = 1;
						$status = "";
						$totalpot="";
                        foreach ($datapotongankaryawan as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->potonganName; ?></td>
							<td>Rp. <?php echo number_format($lihat->jumlah); ?></td>
							
							<td>
                            <a href="<?php echo base_url(); ?>hrd/hapus_potongan_karyawan?id=<?php echo $lihat->detailID ?>&nik=<?php echo $nik ?>&nama=<?php echo $nama ?>&harikerja=<?php echo $harikerja ?>" onclick="javascript: return confirm('Anda akan menghapus <?php echo $lihat->potonganName; ?> ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
							
							</td>
							              		
                    	</tr>
                    	<?php 
						$totalpot=$totalpot+$lihat->jumlah;
						endforeach; ?>
                    </tbody>
					<tr><td colspan=2 align=right><b>Total Potongan</b></td><td><b>Rp. <?php echo number_format($totalpot); ?></b></td></tr>
					<?php } ?>
                  </table>
                  </div>
                </div><!-- /.box-body -->
			</div>
</div>