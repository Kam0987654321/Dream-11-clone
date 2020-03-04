<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Default Contest
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Default contest</a></li>
        <li class="breadcrumb-item active">Create</li>
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
        <h2 style="margin-top:0px">Default Contest <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Contest Name <?php echo form_error('contest_name') ?></label>
            <input type="text" class="form-control" name="contest_name" id="contest_name" placeholder="Contest Name" value="<?php echo $contest_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Contest Tag <?php echo form_error('contest_tag') ?></label>
            <input type="text" class="form-control" name="contest_tag" id="contest_tag" placeholder="Contest Tag" value="<?php echo $contest_tag; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Winners <?php echo form_error('winners') ?></label>
            <input type="text" class="form-control" name="winners" id="winners" placeholder="Winners" value="<?php echo $winners; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Prize Pool <?php echo form_error('prize_pool') ?></label>
            <input type="text" class="form-control" name="prize_pool" id="prize_pool" placeholder="Prize Pool" value="<?php echo $prize_pool; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Team <?php echo form_error('total_team') ?></label>
            <input type="text" class="form-control" name="total_team" id="total_team" placeholder="Total Team" value="<?php echo $total_team; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Join Team <?php echo form_error('join_team') ?></label>
            <input type="text" class="form-control" name="join_team" id="join_team" placeholder="Join Team" value="<?php echo $join_team; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Entry <?php echo form_error('entry') ?></label>
            <input type="text" class="form-control" name="entry" id="entry" placeholder="Entry" value="<?php echo $entry; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Contest Description <?php echo form_error('contest_description') ?></label>
            <textarea rows="4" cols="50" class="form-control" name="contest_description" id="contest_description" placeholder="Contest Description"><?php echo $contest_description;?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Contest Note1 <?php echo form_error('contest_note1') ?></label>
            <input type="text" class="form-control" name="contest_note1" id="contest_note1" placeholder="Contest Note1" value="<?php echo $contest_note1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Contest Note2 <?php echo form_error('contest_note2') ?></label>
            <input type="text" class="form-control" name="contest_note2" id="contest_note2" placeholder="Contest Note2" value="<?php echo $contest_note2; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Match  <?php echo form_error('match_id') ?></label>
            <select class="form-control" name="match_id" id="match_id">
                <option value="">Select</option>
                <?php foreach ($matchs as $match) {
                   ?> <option value="<?php echo $match->match_id; ?>" <?php if($match->match_id == $match_id){echo "selected";} ?>><?php echo $match->title; ?> <?php echo "(".$match->time.")" ; ?></option><?php 
                } ?>
            </select>
        </div>
	    <!-- <div class="form-group">
            <label for="varchar">Type <?php//echo form_error('type') ?></label>
            <input type="text" class="form-control" name="type" id="type" placeholder="Type" value="<?php// echo $type; ?>" />
        </div> -->
        <!--<div class="form-group">
             <label for="varchar">Image <?php echo form_error('image') ?></label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" /> 
        </div>-->
	    <input type="hidden" name="contest_id" value="<?php echo $contest_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('default_contest') ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
	  </section>
	  </div>
   