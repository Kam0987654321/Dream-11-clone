<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Player Update
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Player</a></li>
        <li class="breadcrumb-item active">Update</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
	 <div class="box box-default">
        <div class="box-header with-border">
          
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
        <h2 style="margin-top:0px">Player <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="int">Player Name<?php echo form_error('player') ?></label>
            <select required="required" class="form-control" name="player" id="player">
                <option value="">Select</option>
                <?php foreach ($players as $player) {
                   ?> <option value="<?php echo $player['id']; ?>"><?php echo $player['name']; ?></option><?php 
                } ?>
            </select>
        </div>
	    <input type="hidden" name="player_id" value="<?php echo $this->uri->segment('3'); ?>" /> 
        <input type="hidden" name="team_id" value="<?php echo $this->uri->segment('4'); ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('contest') ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
	  </section>
	  </div>
   