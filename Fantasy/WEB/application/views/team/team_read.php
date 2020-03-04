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
        <div class="box-header with-border">
          
         
        </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
        <h2 style="margin-top:0px">Team Read</h2>
        <table class="table">
	    <tr><td>Team Name</td><td><?php echo $team_name; ?></td></tr>
	    <tr><td>Team Short Name</td><td><?php echo $team_short_name; ?></td></tr>
	    <tr><td>Team Image</td><td><img height="50px;" width="50px;" src="<?php echo base_url('uploads/team_image/'.$team_image); ?>"> </td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('team') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
    </div>
    </section>
    </div>
      