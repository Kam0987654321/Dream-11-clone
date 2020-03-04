<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Winnig Information
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">winnig information</a></li>
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
        <h2 style="margin-top:0px">Winnig Information Read</h2>
        <table class="table">
	    <tr><td>Contest Name</td><td><?php 
        $contest = $this->Contest_model->get_by_id($contest_id);

        echo $contest->contest_name; ?></td></tr>
        <tr><td>Rank</td><td><?php echo $rank; ?></td></tr>
        <tr><td>price</td><td><?php echo $price; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('contest/winning_information/'.$contest->contest_id) ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	</div>
	</div>
	</section>
	</div>
      