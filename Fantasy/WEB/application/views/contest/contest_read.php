<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contest
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">contest</a></li>
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
        <h2 style="margin-top:0px">Contest Read</h2>
        <table class="table">
	    <tr><td>Contest Name</td><td><?php echo $contest_name; ?></td></tr>
        <tr><td>Contest Tag</td><td><?php echo $contest_tag; ?></td></tr>
        <tr><td>Winners</td><td><?php echo $winners; ?></td></tr>
        <tr><td>Prize Pool</td><td><?php echo $prize_pool; ?></td></tr>
        <tr><td>Total Team</td><td><?php echo $total_team; ?></td></tr>
        <tr><td>Join Team</td><td><?php echo $join_team; ?></td></tr>
        <tr><td>Entry</td><td><?php echo $entry; ?></td></tr>
        <tr><td>Contest Description</td><td><?php echo $contest_description; ?></td></tr>
        <tr><td>Contest Note1</td><td><?php echo $contest_note1; ?></td></tr>
        <tr><td>Contest Note2</td><td><?php echo $contest_note2; ?></td></tr>
        <tr><td>Match Title</td><td><?php 
        	$match = $this->Contest_model->get_match_by_id($match_id);
        echo $match->title; ?></td></tr>
        <tr><td>Type</td><td><?php echo $type; ?></td></tr>
        <tr><td>Type</td><td><?php if($contest_image !=""){?>
            <img src="<?php echo base_url('uploads/contest_image/'.$contest_image);?>" style="height: 42px; width: 60px;">
            <?php }else{?>
                <img src="<?php echo base_url('uploads/trophy.jpg');?>" style="height: 42px; width: 60px;">
                <?php } ?> </td></tr>
        <tr><td></td><td><a href="<?php echo site_url('contest') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	</div>
	</div>
	</section>
	</div>
      