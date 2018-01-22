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
                      	<?php  
                        $no = 1;
						$jumlah="";
						$lembur="";
						$total="";
						$totalkerja="";
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
						endforeach; ?>
                    </tbody>
					
                  </table>
                   <a href="<?php echo base_url(); ?>hrd/absensi" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>