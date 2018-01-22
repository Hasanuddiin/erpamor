<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
		   <h1>
             
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
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form  <?php echo $title; ?></h3>
              </div>
              <div class="box-body">
			  
              <h5>Anda Akan Membuat Produk : </h5> <br/>
			  <h5>
			  Nama Produk : <b><?php echo $namaproduk; ?></b></br>
			  Jumlah : <b><?php echo $qty; ?></b><br>
        Untuk Jumkah Produk : &nbsp;<b><?php echo $qty; ?> &nbsp; Pcs</b>
        </h5>
			  <br/>
			  <a href="<?php echo base_url(); ?>product/plan_cek?produk=<?php echo $produkcode ?>&qty=<?php echo $qty ?>&namapro=<?php echo $namaproduk ?>" class="btn btn-sm btn-primary btn-flat"> <i class="fa fa-plus-next"></i> Selanjutnya </a>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>