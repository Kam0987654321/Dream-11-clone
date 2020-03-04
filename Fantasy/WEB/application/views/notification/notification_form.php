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
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
        <h2 style="margin-top:0px">Notification <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="int">User Type  <?php echo form_error('user_type') ?></label>
            <select class="form-control" name="user_type" id="user_type">
                <option value="">Select</option>
                <option value="1" <?php if($type == "1"){ echo "selected";} ?>>All</option>
                <option value="2" <?php if($type == "2"){ echo "selected";} ?>>15 Days</option> 
                <option value="3" <?php if($type == "3"){ echo "selected";} ?>>30 Days and more</option>
            </select>
        </div>
        <div class="form-group">
            <label for="int">Title<?php echo form_error('title') ?></label>
            <input class="form-control" type="text" name="title" id="title" value="<?php echo $title; ?>" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="int">Message<?php echo form_error('msg') ?></label>
            <textarea class="form-control" name="msg" id="msg" placeholder="Message"><?php echo $msg; ?></textarea>
        </div>
        <div class="form-group">
            <label for="int">Match  <?php echo form_error('match_id') ?></label>
            <select class="form-control" onchange="get_match(this.value)" name="match_id" id="match_id">
                <option value="">Select</option>
                <?php foreach ($matchs as $match) {
                   ?> <option value="<?php echo $match->match_id; ?>" <?php if($match->match_id == $match_id){echo "selected";} ?>><?php echo $match->title; ?></option><?php 
                } ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Contest Name <?php echo form_error('contest_id') ?></label>
            <select class="form-control"  name="contest_id" id="contest_id">
                <option value="">Select Contest</option>
                <?php 
                if(isset($contest_id)){
                foreach($contests as $contest){ ?>
                            <option <?php if($contest['contest_id'] == $contest_id ){ echo "selected"; }?> value="<?php echo $contest['contest_id']; ?>"><?php echo $contest['contest_name']; ?></option>
                        <?php } }?>
                    </select>
        </div>
	    
	    	    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('notification') ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
	  </section>
	  </div>
   