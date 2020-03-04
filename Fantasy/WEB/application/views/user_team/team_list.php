<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Team 
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Team</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
     <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body wizard-content"> 
 <div class="ibox-content">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Player Name</th>
                              <th>Team Name</th>
                              <th>Actual role</th>
                              <th>Credit Points</th>        
                              <th>Role</th>
                              <th>Image</th>
                              <th>Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                         <?php
             foreach ($team_data as $team)
            {   $p_id =  $team->player_id;
              $player = $this->players_model->get_by_id($p_id);
              ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php
            
            
            echo $player->name;
              ?></td>
              <td><?php echo $player->team_name ?></td>
              <td><?php echo $player->title ?></td>
            <td><?php echo $player->credit_points ?></td>
            <td><?php if($team->is_vicecaptain =="1")
            { echo "vicecaptain" ;}
            elseif($team->is_captain =="1"){
             echo "captain";}
            else{echo "Field Player";} ?> 
          </td>
            <td><img height="70px" width="70px" src="<?php echo  base_url('uploads/player/'.$player->image);?>"> </td>
            <td><a href="<?php echo base_url('user_team/edit_team/'.$team->id.'/'.$team->my_team_id); ?>" target="_blank"><button style="border-radius: 6px;" type="button" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></button></a></td>
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
      
       
       


       