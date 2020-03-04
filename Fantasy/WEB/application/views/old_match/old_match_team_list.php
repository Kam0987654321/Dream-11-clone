<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Result Match
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">match</a></li>
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
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile No</th>
                              <th>Rank</th>
                              <th>Points</th>
                              <th>View Team players</th>
                          </tr>
                      <tbody>
                          <?php 
                          $i = 1;
                          foreach ($total_teams as $team) {
                          $user = $this->user_model->get_by_id($team->user_id);
                           ?>
                           <tr>
                            <td><?php echo $i++;?></td>

                            <td><?php echo $user->name;?></td>
                            <td><?php echo $user->email;?></td>
                            <td><?php echo $user->mobile;?></td>
                            <td><?php $team_rec =  $this->match_model->get_rank_byid($team->id);
                            //echo $this->db->last_query();
                              echo $team_rec->rank; ?>
                              </td>
                            <td><?php echo  $team_rec->points; ?></td>
                            <td><a href="<?php echo base_url('user_team/team/'.$team->id);?>">View</a></td>
                          </tr>
                           <?php 
                          } ?>
                        </tbody>   
                    </table>
          </div>
        </div>
     
    </div>
  </div>
</div>
      
       
       