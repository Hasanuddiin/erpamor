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
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
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
                        <th>Komponen Gaji</th>
						<th>Nilai</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
						$nilaihari="";
						$totalgaji="";
                        foreach ($data as $lihat):
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
							
							$totalgaji=$totalgaji+$nilaihari;
								?>
							<td align=right>
							<input type="text" class="form-control" name="jumlah" value="<?php echo number_format($nilaihari); ?>" readonly/>
							</td>
							  		
                    	</tr>
                    	<?php endforeach; ?>
						
                    </tbody>
					<tr><td></td><td align=right><b style="font-size:18px;"> Total Gaji </b></td><td><b style="font-size:18px;"><?php echo number_format($totalgaji); ?></b></td></tr>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
