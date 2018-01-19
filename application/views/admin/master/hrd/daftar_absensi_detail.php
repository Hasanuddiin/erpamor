<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class=""><a aria-expanded="false" href="#detail" data-toggle="tab">Detail Kehadiran</a></li>
                  <li class=""><a aria-expanded="true" href="#potongan" data-toggle="tab">Potongan</a></li>
				  <li class=""><a aria-expanded="true" href="#cuti" data-toggle="tab">Bonus/Reward</a></li>
				  <li class="active"><a aria-expanded="true" href="#rekap" data-toggle="tab">Rekap Gaji</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane " id="detail">
                  <div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
					
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
                <?php 
				$totalkerja="";
				$jumlah="";
				$lembur="";
				$total="";
				$status = "";
				$totalbonus="";
				$nilaihari="";
				$totalkomponengaji="";
				$totalgaji="";
				$status = "";
				$totalpot="";
				?>
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th width=6>No.</th>
                        <th>Tanggal</th>
						<th>Datang</th>
						<th>Pulang</th>
						<th>Jumlah Jam Kerja</th>
						<th>Lembur</th>
						<th>Keterangan</th>
                    </thead>
                    <tbody>
                      	<?php  if($data) {
                        $no = 1;
                        foreach ($data as $lihat):
						$jumlah=$lihat->def_out-$lihat->def_in;
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $lihat->tanggal; ?></td>
							<td><?php echo $lihat->def_in; ?></td>
							<td><?php echo $lihat->def_out; ?></td>
							<td><?php echo $jumlah; ?></td>
							<td><?php 
							if($jumlah>8)
							{
								$lembur=$jumlah-8;
								$selisih=$jumlah-8;
								$ket="Kelebihan : ".$lembur." jam";
							}
							else if($jumlah<8)
							{
								$lembur="-";
								$selisih=8-$jumlah;
								$ket="Kurang : ".$selisih." jam";
							}
							else if($jumlah=8)
							{
								$lembur="-";
								$ket="-";
							}
							echo $lembur; ?></td>
						<td><?php echo $ket; ?></td>
                    	</tr>
                    	<?php
						$total=$total+$lembur;
						$totalkerja=$totalkerja+$jumlah;
						endforeach; 
						}?>
                    </tbody>
					
                  </table>
                   <a href="<?php echo base_url(); ?>hrd/absensi" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane " id="potongan">
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
                  </div><!-- /.tab-pane -->
				  <div class="tab-pane " id="cuti">
                      <div class="row">   
			<div class="col-md-4">
               <?php echo form_open('hrd/tambah_bonus/?nik='.$nik.'&nama='.$nama.'&harikerja='.$harikerja.''); ?>
									<div class="form-group">
										<input type="hidden" name="nik" value="<?php echo $nik ?>">
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Bonus</label>
										<select name="bonus" class="form-control">
											<?php
											 foreach ($databonus as $databonus):
											 ?>
											 <option value="<?= $databonus->bonusID ?>" ><?php echo $databonus->bonusName ?></option>
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
                        <th>Nama Bonus</th>
						<th>Jumlah</th>
						<th>Aksi</th>
                    </thead>
					<?php if($databonuskaryawan) { ?>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($databonuskaryawan as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->bonusName; ?></td>
							<td>Rp. <?php echo number_format($lihat->jumlah); ?></td>
							
							<td>
                            <a href="<?php echo base_url(); ?>hrd/hapus_bonus_karyawan?id=<?php echo $lihat->detailID ?>&nik=<?php echo $nik ?>&nama=<?php echo $nama ?>&harikerja=<?php echo $harikerja ?>" onclick="javascript: return confirm('Anda akan menghapus <?php echo $lihat->bonusName; ?> ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
							
							</td>
							              		
                    	</tr>
                    	<?php 
						$totalbonus=$totalbonus+$lihat->jumlah;
						endforeach; ?>
                    </tbody>
					<tr><td colspan=2 align=right><b>Total Bonus</b></td><td><b>Rp. <?php echo number_format($totalbonus); ?></b></td></tr>
					<?php } ?>
                  </table>
                  </div>
                </div><!-- /.box-body -->
			</div>
</div>
                  </div><!-- /.tab-pane -->
				   <div class="tab-pane active " id="rekap">
                      <div class="row">   
			<div class="col-md-4">
               <?php echo form_open('hrd/print_slip'); ?>
								<?php foreach ($data_user as $lihat):?>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama</label>
										<input type="text" class="form-control" name="nama" value="<?php echo $lihat->nama_lengkap; ?>" readonly />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kantor / Cabang</label>
										<input type="text" class="form-control" name="kantor" value="<?php echo $lihat->identityName; ?>" readonly />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Posisi</label>
										<input type="text" class="form-control" name="posisi" value="<?php echo $lihat->golonganName; ?>" readonly />
									</div>
									<?php endforeach; ?>
              </div>
			  <div class="col-md-8">
			<div class="box box-info">
			 <div class="box-body table-responsive no-padding">
                 
				  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>Komponen Gaji</th>
						<th>Nilai</th>
                    </thead>
                    <tbody>
                      	<?php  
						if($datagaji) {
                        $no = 1;
                        foreach ($datagaji as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->nama_komponen; ?></td>
							<?php if($lihat->iskalihari=="1")
							{
								$nilaihari=($jumlah/26)*$lihat->nilai;
							}
							else
							{
								$nilaihari=$lihat->nilai;
							}
							
							$totalkomponengaji=$totalkomponengaji+$nilaihari;
								?>
							<td align=right>
							<input type="text" class="form-control" name="jumlah" value="<?php echo number_format($nilaihari); ?>" readonly/>
							</td>
							  		
                    	</tr>
                    	<?php endforeach; }?>
						
                    </tbody>
					
                  </table>
				 
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <tbody>
                      <tr><td>Total Hari Kerja</td><td><b><input style="width:10%;float:left;margin-right:8px;" type="text" class="form-control" name="harikerja" value="<?php echo $harikerja; ?>" readonly />
					    Hari</b></td></tr>
					<tr><td>Total Jam Kerja</td><td><b><input type="text" style="width:12%;float:left;margin-right:8px;" class="form-control" name="totalkerja" value="<?php echo $totalkerja; ?>" readonly /> Jam</b></td></tr>
					<tr><td>Total Lembur (Jam)</td><td><b><input type="text" style="width:10%;float:left;margin-right:8px;" class="form-control" name="total" value="<?php echo $total; ?>" readonly /> </b><?php $totallembur=$total*5000; ?> <input type="text" style="width:30%;float:left;margin-right:8px;" class="form-control" name="totallembur" value="<?php echo number_format($totallembur); ?>" readonly /> </td></tr>
					<?php if($totalbonus<>0){?>
					<tr><td><b>Total Bonus</b></td><td><b><input type="text" style="width:30%;float:left;margin-right:8px;" class="form-control" name="totalbonus" value="<?php echo number_format($totalbonus); ?>" readonly /> </b></td></tr>
					<?php } ?>
					<?php if($totalpot<>0){?>
					<tr><td ><b>Total Potongan</b></td><td><b><input type="text" style="width:30%;float:left;margin-right:8px;" class="form-control" name="totalpot" value="<?php echo number_format($totalpot); ?>" readonly /></b></td></tr>
					<?php } ?>
                    </tbody>
					<?php 
					
					$totalgaji=($totalkomponengaji+$totallembur+$totalbonus)-$totalpot;
					?>
					<tr><td align=right><b style="font-size:18px;"> Total Gaji Diterima </b></td><td><b><input type="text" style="width:50%;float:left;margin-right:8px;font-size:22px;color:red;" class="form-control" name="totalgaji" value="<?php echo number_format($totalgaji); ?>" readonly /></b></td></tr>
                 	<input type="hidden" class="form-control" name="nik" value="<?php echo $nik; ?>" />
									<input type="hidden" class="form-control" name="nama" value="<?php echo $nama; ?>" />
									<input type="hidden" class="form-control" name="golongan" value="<?php echo $golongan; ?>" />
									<input type="hidden" class="form-control" name="jumlah" value="<?php echo $jumlah; ?>" />
									<input type="hidden" class="form-control" name="totalkomponengaji" value="<?php echo $totalkomponengaji; ?>" />
									

				 <tr><td></td><td> <button type="submit" name="submit" value="simpan" class="btn btn-info"><i class="fa fa-print"></i> Cetak Slip Gaji</button></td></tr>
				  </table>
                  </div>
                </div><!-- /.box-body -->
			</div>
</div>
                  </div>
                </div><!-- /.tab-content -->
              </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php echo form_close(); ?>