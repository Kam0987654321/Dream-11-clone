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
   <div class="box-tools ">
                <a href="<?php echo site_url('match') ?>" class="btn btn-primary">Match</a>
          </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
        <h2 style="margin-top:0px">Match <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Team First <?php echo form_error('team_first') ?></label>
            <select name="team_first" id="team_first"  class="form-control">
              <option value="">Select</option>
              <?php foreach ($teams as $team) {
                  ?> 
                  <option value="<?php echo $team->team_id; ?>" <?php if($row->teamid1 ==$team->team_id){echo "selected";} ?>><?php echo $team->team_name; ?></option>
                  <?php 
              } ?>
            </select>
        </div>
         <div class="form-group">
            <label for="varchar">Team Second <?php echo form_error('team_second') ?></label>
           <select name="team_second" id="team_second"  class="form-control">
              <option value="">Select</option>
              <?php foreach ($teams as $team) {
                  ?> 
                  <option value="<?php echo $team->team_id; ?>"<?php if($row->teamid2 ==$team->team_id){echo "selected";} ?>><?php echo $team->team_name; ?></option>
                  <?php 
              } ?>
            </select>
        </div>
         <div class="form-group">
            <label for="varchar">Match Type <?php echo form_error('match_type') ?></label>
            <select name="match_type" id="match_type"  class="form-control">
              <option value="">Select</option>
              <?php foreach ($match_type as $type) {
                  ?>
                  <option value="<?php echo $type->id;?>" <?php if($row->type ==$type->name){echo "selected";} ?>><?php echo $type->name; ?></option>
                  <?php 
              } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Match Status <?php echo form_error('match_status') ?></label>
            <select name="match_status" id="match_status"  class="form-control">
              <option value="">Select</option>
              <?php foreach ($match_status as $type) {
                  ?>
                  <option value="<?php echo $type->id;?>"<?php if($row->match_status ==$type->name){echo "selected";} ?>><?php echo $type->name; ?></option>
                  <?php 
              } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Match Time <?php echo form_error('match_status') ?></label>
            <input autocomplete="off" class="form-control" value="<?php echo $row->time ?>" id="datetimepicker"  type="text" name="datetime" placeholder="Select date time">
        </div>
        <input type="hidden" name="match_id" value="<?php echo $row->match_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('match') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
	  </section>
	  </div>