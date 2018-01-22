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
                  <li class="active"><a aria-expanded="false" href="#detail" data-toggle="tab">Detail Kehadiran</a></li>
                  <li class=""><a aria-expanded="true" href="#potongan" data-toggle="tab">Potongan</a></li>
				  <li class=""><a aria-expanded="true" href="#cuti" data-toggle="tab">Bonus/Reward</a></li>
				  <li class=""><a aria-expanded="true" href="#cuti" data-toggle="tab">Rekap Gaji</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="detail">
                  <?php $this->load->view('admin/master/hrd/detail_absen'); ?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane " id="potongan">
                    <?php $this->load->view('admin/master/hrd/detail_potongan'); ?>
                  </div><!-- /.tab-pane -->
				  <div class="tab-pane " id="cuti">
                     <?php $this->load->view('admin/master/hrd/detail_bonus'); ?>
                  </div><!-- /.tab-pane -->
				   <div class="tab-pane " id="cuti">
                     <?php $this->load->view('admin/master/hrd/rekap_gaji'); ?>
                  </div>
                </div><!-- /.tab-content -->
              </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
