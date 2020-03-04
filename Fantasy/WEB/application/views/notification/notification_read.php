<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notification
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">notification</a></li>
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
        <h2 style="margin-top:0px">Notification Read</h2>
        <table class="table">
	    <tr><td>Contest Name</td><td><?php echo $contest->contest_name; ?></td></tr>
        <tr><td>Contest Description</td><td><?php echo $contest->contest_description; ?></td></tr>
        <tr><td>Match</td><td><?php echo $match->title; ?></td></tr>
       
        <tr><td></td><td><a href="<?php echo site_url('notification') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	</div>
	</div>
	</section>
	</div>
      