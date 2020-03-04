 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Match
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">My Match</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
     <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body wizard-content">
                    <!-- <div class="ibox-title">
                        <?php //echo anchor(site_url('players/create'),'Create', 'class="btn btn-primary"'); ?>
                     
                    </div> -->
                    
    
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
        <th>Team 1</th>
        <th>Match Status</th>
        <th>Match type</th>
        <th>Time</th>
        <th>Team 2</th>
        <!-- <th>Action</th> -->
            </tr>
            </thead>
            <?php
            foreach ($my_match_data as $match)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php $team1 = $this->My_match_model->getTeam($match->teamid1);
                   echo $team1->team_name;?></td>
            <td><?php echo $match->match_status ?></td>
            <td><?php echo $match->type ?></td>
            <td><?php echo $match->time ?></td>
            <td><?php $team2 = $this->My_match_model->getTeam($match->teamid2); echo $team2->team_name;?></td>
 
            <!-- <td style="text-align:center" width="200px">
                <?php 
              //  echo anchor(site_url('players/read/'.$players->id),'Read'); 
              //  echo ' | '; 
              //  echo anchor(site_url('players/update/'.$players->id),'Update'); 
              //  echo ' | '; 
              //  echo anchor(site_url('players/delete/'.$players->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td> -->
        </tr>
                <?php
            }
            ?>
                        </table>
                         <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
         </div>
            <!-- <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div> -->
        </div> 
                      </div>
                    </div>
                 
                </div>
              </div>
            </div>
      
       
       


       