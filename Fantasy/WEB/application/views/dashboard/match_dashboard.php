<div class="content-wrapper" style="min-height: 1147px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $match_record->title; ?> 
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard 2</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Toss Winner</span>
              <span class="info-box-text"><?php echo $toss_winner->team_name; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-thumbsup"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Total contest</span>
              <span class="info-box-text"><?php echo $contests; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-12 col-md-6 col-lg-3">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Participant Count </span>
              <span class="info-box-text"><?php echo $user_count; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Join Team Count</span>
              <span class="info-box-text"><?php echo $total_team; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <!-- /.col -->
          <!-- /.info-box -->
           <!-- TABLE: LATEST ORDERS -->
         <div class="col-lg-6 col-xl-6">               
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Top 3 Users</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-responsive no-margin">
                  <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Rank</th>
                    <th>Points</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($Topranks as $toprank) {
                      ?>
                        <tr>
                    <td><?php
                   $user =  $this->user_model->get_by_id($toprank->user_id);
                     if($user->name !="")
                     {echo $user->name;}else{ echo $user->email;} ?></td>
                    <td><?php echo $toprank->rank; ?></td>
                    <td><?php echo $toprank->points; ?>
                  </tr>
                      <?php 
                    } ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          </div>
          
        </div>
        <div class="row">
          <div class="col-lg-12">
          <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                      <thead>
                          <tr>
                            <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile No</th>
                              <th>View Info</th>
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
        <!-- /.col -->
        </div>

        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>

    <!-- Content Header (Page header) -->
    
      
       
       
  