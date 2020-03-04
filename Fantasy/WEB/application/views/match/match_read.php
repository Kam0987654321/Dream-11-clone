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
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
        <h2 style="margin-top:0px">Match Read</h2>
        <table class="table">
	    <tr><td>Match Status</td><td><?php echo $row->match_status; ?></td></tr>
      <tr><td>Type</td><td><?php echo $row->type; ?></td></tr>
      <tr><td>match Status</td><td><?php echo $row->match_status; ?></td></tr>
      <tr><td>Team First</td><td><?php echo $team1->team_name; ?></td></tr>
      <tr><td>Team Second</td><td><?php echo $team2->team_name; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $row->created_date; ?></td></tr>
	    <tr><td>Modified Date</td><td><?php echo $row->modified_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('match') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	</div>
	</div>
	</section>
	</div>
      