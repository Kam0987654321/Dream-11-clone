<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Banners List
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">banners</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
   <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body wizard-content">
                    <div class="ibox-title">
                        <?php echo anchor(site_url('banners/create'),'Create', 'class="btn btn-primary"'); ?>
                     
                    </div>
                    
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
              <div class="ibox-content">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>        
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                         <?php
             foreach ($banners_data as $banner)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>            
            <td><img src="<?php echo base_url('uploads/offers/'.$banner->banner_image);?>" style="height: 42px; width: 60px;"> </td>            
            <td style="text-align:center" width="200px">
                <?php 
               /* echo anchor(site_url('contest/read/'.$banners->id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); 
                echo " ";*/
                echo anchor(site_url('banners/update/'.$banner->id),'<button style="border-radius: 6px;" type="button" class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i></button>'); 
                                        echo " "; 
                echo anchor(site_url('banners/delete/'.$banner->id),'<button style="border-radius: 6px;" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
                          </tbody>
                          
                        </table>
                      </div>
                    </div>
                 
                </div>
              </div>
            </div>
      
       
       