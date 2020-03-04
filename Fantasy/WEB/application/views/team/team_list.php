<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Team
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Team</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
     <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body wizard-content">
    
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
                              <th>Team Name</th>
                              <th>Team Short Name</th>
                              <th>Team Image</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                         <?php
             foreach ($team_data as $team)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $team->team_name ?></td>
            <td><?php echo $team->team_short_name ?></td>
            <td><img height="70px" width="70px" src="<?php echo  $team->team_image ?>"> </td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('team/read/'.$team->team_id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); 
                echo ' '; 
                echo anchor(site_url('team/update/'.$team->team_id),'<button style="border-radius: 6px;" type="button" class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i></button>'); 
                echo ' '; 
                echo anchor(site_url('team/delete/'.$team->team_id),'<button style="border-radius: 6px;" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
      
       
       


       