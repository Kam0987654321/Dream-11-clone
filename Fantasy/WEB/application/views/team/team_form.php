<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Team
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">team</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
     <div class="box box-default">
   <div class="box-tools ">
                <a href="<?php echo site_url('category') ?>" class="btn btn-primary">Team</a>
          </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
        <h2 style="margin-top:0px">Team <?php echo $button ?></h2>
        <form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Team Name <?php echo form_error('team_name') ?></label>
            <input type="text" class="form-control" name="team_name" id="team_name" placeholder="Team Name" value="<?php echo $team_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Team Short Name <?php echo form_error('team_short_name') ?></label>
            <input type="text" class="form-control" name="team_short_name" id="team_short_name" placeholder="Team Short Name" value="<?php echo $team_short_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Team Image <?php echo form_error('team_image') ?></label>
            <input type="file" class="form-control" name="team_image" id="team_image" placeholder="Team Image"  />
        </div>
	    <input type="hidden" name="team_id" value="<?php echo $team_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('team') ?>" class="btn btn-default">Cancel</a>
	</form>
   
</div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </section>
      </div>