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
				    No Faktur :<b style="color:blue;font-size:18px;"> <?php echo $invoice ?></b><br/>
                  	Konsumen : <b style="color:orange;font-size:18px;"><?php echo $konsumen ?></b><br/><br/>
					<a href="<?php echo base_url(); ?>admin/kpiutang" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-backward"></i> Kembali</a>
                  </h3>
				  <br/><br/>
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
						<th>Tgl</th>
						<th>Bayar</th>
                    </thead>
                    <tbody>
						<?php  
                        $no = 1;
                        foreach ($kpiutang as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->createdDate; ?></td>
							<td><?php echo number_format($lihat->receivablePay); ?></td>         		
                    	</tr>
						<?php endforeach; ?>
                    </tbody>
					<tr><td></td><td><b>DP / UANG MUKA : </b></td><td><b style="color:black;font-size:18px;"><?php echo $dp;?></b></td></tr>
					<tr><td></td><td><b>TOTAL BAYAR : </b></td><td><b style="color:blue;font-size:18px;"><?php echo number_format($totalbayar);?></b></td></tr>
					<tr><td></td><td><b>SISA BAYAR : </b></td><td><b style="color:red;font-size:18px;"><?php echo number_format($sisabayar);?></b></td></tr>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
		  </div>
        </section><!-- /.content -->
		
		
      </div><!-- /.content-wrapper -->

	  