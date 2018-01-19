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
          <tr>
   

          <!-- Main content -->
          <section class="content">

            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form  <?php echo $title; ?></h3>
                
              </div>
              <div class="box-body">
			  
                <!-- form start -->
                <?php echo form_open('product/plan_cek_confirm'); ?>
				<div class="col-md-6">
								<div class="form-group">

               <div>
    
</div>
    
    </td>
    </tr>
    
    <tr>
    <td colspan="4">

    <div id="text_div" class="col-md-12" >
    <label for="exampleInputEmail1">Status</label>
                    <select name="produk" class="form-control">
                    <option>- Pilih Produk -</option>
                      <?php
                       foreach ($list as $list):
                       ?>
                       <option value="<?= $list->produkID ?>" >
                       <?php echo $list->produkName ?> </option>
                       <?php endforeach ?>
                    </select>
           
    </div>
   
      </td>
    </tr>
								
									
									</div>
                   
				</div>		

				<div class="col-md-2">
                  
									<div class="form-group">
               
										<input type="hidden" name="id" >
										<label for="exampleInputEmail1">QTY</label>
                   	<input type="text" class="form-control" name="qty" />
                    
									</div>

				</div>			




				<div class="col-md-2">	<br/>
				 <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Proses</button>					
                </div>  

                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
           

       
          </section><!-- /.content -->
        </div>
