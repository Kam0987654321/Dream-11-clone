<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Match
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
                              <th>Tean First</th>
                              <th>Tean Second</th>
                              <th>Match Status</th>
                              <th>Match Time</th>
                              <th>Match Type</th>
                              <th>Match Players</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                         <?php
            foreach ($match_data as $match)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php
               $teamone =  $this->Match_model->team_name($match->teamid1);
             echo $teamone->team_name; ?></td>
            <td><?php 
              $teamtwo = $this->Match_model->team_name($match->teamid2);
            echo $teamtwo->team_name; ?></td>
            <td><?php echo $match->match_status; ?></td>
            <td><?php echo $match->time; ?></td>
            <td><?php echo $match->type; ?></td>
            <td><?php echo anchor(site_url('match_players/index/'.$match->match_id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); ?></td>
            
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('match/read/'.$match->match_id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); 
                echo ' '; 
                echo anchor(site_url('match/update/'.$match->match_id),'<button style="border-radius: 6px;" type="button" class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i></button>'); 
                echo ' '; 
                echo anchor(site_url('match/delete/'.$match->match_id),'<button style="border-radius: 6px;" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
      
       
       