<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Player
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Player</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
        <div class="box box-default">
            <div class="box-header with-border">
                
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <h2 style="margin-top:0px">Players Read</h2>
                <table class="table">
                    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
                    <tr><td>Designation</td><td><?php echo $designationid; ?></td></tr>
                    <tr><td>Team</td><td><?php echo $teamid; ?></td></tr>
                    <tr><td>Credit Points</td><td><?php echo $credit_points; ?></td></tr>
                    <tr><td>Image</td><td><img src="<?php echo base_url('uploads/player/'.$image);?>" style="height: 42px; width: 60px;"></td></tr>
                    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
                    <tr><td>Modified Date</td><td><?php echo $modified_date; ?></td></tr>
                    <tr><td></td><td><a href="<?php echo site_url('players') ?>" class="btn btn-default">Cancel</a></td></tr>
                </table>
            </div>
        </div>
    </section>
</div>
