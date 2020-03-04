<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Match Status
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Match Status</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">          
     <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body wizard-content">
            <div class="col-md-4">
                <?php echo anchor(site_url('match_status/create'),'Create', 'class="btn btn-primary"'); ?>
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
                                    <th>Name</th>                                    
                                    <th>CreatedDate</th>
                                    <th>ModifiedDate</th>
                                    <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                         <?php
            foreach ($match_status_data as $match_status)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $match_status->name ?></td>
            <td><?php echo $match_status->created_date ?></td>
            <td><?php echo $match_status->modified_date ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('match_status/read/'.$match_status->id),'Read'); 
                echo ' | '; 
                echo anchor(site_url('match_status/update/'.$match_status->id),'Update'); 
                echo ' | '; 
                echo anchor(site_url('match_status/delete/'.$match_status->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
                          </tbody>
                          <tfoot>
                            <tr>
                             <th>No</th>
                                <th>Name</th>                                
                                <th>CreatedDate</th>
                                <th>ModifiedDate</th>
                                <th>Action</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>                 
                </div>
              </div>
            </div>
