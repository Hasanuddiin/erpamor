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
          
			
			 <div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Produk Bolu Amor </a></li>
					  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Produk Mitra </a></li>
					</ul>
					<div class="tab-content">
					  <div class="tab-pane active" id="tab_1">
					<?php $this->load->view('admin/master/produk/produkamor'); ?>
					  </div><!-- /.tab-pane -->
					  
					  <div class="tab-pane" id="tab_2">
						 <?php $this->load->view('admin/master/produk/produkmitra'); ?>
					  </div><!-- /.tab-pane -->
					
					</div><!-- /.tab-content -->
				  </div><!-- nav-tabs-custom -->
		
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
