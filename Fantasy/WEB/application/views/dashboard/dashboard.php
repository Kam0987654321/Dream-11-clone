<div class="content-wrapper" style="min-height: 1147px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard 
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard </li>
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
              <span class="info-box-number"><?php echo $total_contest; ?></span>
              <span class="info-box-text">Total Contest</span>
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
              <span class="info-box-number"><?php echo $total_usresjoin; ?></span>
              <span class="info-box-text">Total User Join</span>
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
              <span class="info-box-number">&#8377; <?php echo round($total_sales->sales,2); ?> </span>
              <span class="info-box-text">Total Sales</span>
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
              <span class="info-box-number"><?php echo $join_members->num_rows; ?></span>
              <span class="info-box-text">Total Join Members</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12 col-xl-4">           
          
          <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Today's Match</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <?php if(!empty($today_match)){
                    foreach($today_match as $match){?>
                   <div class="info-box bg-blue">
           
            <div class="info-box-content no-padding" style="margin-left:5px; text-align:center;">
              <span class="info-box-text"><?php echo $match->title ?></span>
             
                <span class="info-box-number" style="float:left;" ><?php echo $match->type; ?></span>
                <?php if($match->match_status=='Live'){ ?>
                <span class="progress-description pull-right">
                   Live
              </span>
            <?php }else{ ?>
            <span class="progress-description pull-right">
                   Yet to start
              </span>
            <?php } ?>
             
            </div>
            <!-- /.info-box-content -->
          </div>
          <?php 
            } }?>
        
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                
                <!-- /.box-footer -->
              </div>
              </div>
              <div class="col-lg-12 col-xl-4">           
          
          <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Live Match</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <?php if(!empty($Live_matches)){
                    foreach($Live_matches as $matchs){?>
                   <div class="info-box bg-red">
           
            <div class="info-box-content no-padding" style="margin-left:5px; text-align:center;">
              <span class="info-box-text"><?php echo $matchs->title ?></span>
             
                <span class="info-box-number" style="float:left;" ><?php echo $matchs->type; ?></span>
            
                <span class="progress-description pull-right">
                   Live
              </span>
            <a href="<?php echo site_url('dashboard/match_dashboard/'.$matchs->match_id); ?>" class="btn-danger">Match Status</a>
            
             
            </div>
            <!-- /.info-box-content -->
          </div>
          <?php 
            } }?>
        
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                
                <!-- /.box-footer -->
              </div>
              </div>

              <div class="col-lg-12 col-xl-4">           
          
          <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Result Match</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <?php if(!empty($result_matches)){
                    foreach($result_matches as $matchs){?>
                   <div class="info-box bg-red">
           
            <div class="info-box-content no-padding" style="margin-left:5px; text-align:center;">
              <span class="info-box-text"><?php echo $matchs->title ?></span>
             
                <span class="info-box-number" style="float:left;" ><?php echo $matchs->type; ?></span>
            
                <span class="progress-description pull-right">
                   Result
              </span>
            <a href="<?php echo site_url('dashboard/match_dashboard/'.$matchs->match_id); ?>" class="btn-danger">Match Status</a>
            
             
            </div>
            <!-- /.info-box-content -->
          </div>
          <?php 
            } }?>
        
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?php echo base_url('old_match'); ?>" class="uppercase">View All Matches</a>
                </div>
                <!-- /.box-footer -->
              </div>
              </div>
              
             
        <!-- /.col -->
          <!-- /.info-box -->
        
        </div>
        <!-- /.col -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  