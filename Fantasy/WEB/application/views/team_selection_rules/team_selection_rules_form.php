<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Team_selection_rules <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Categoryid <?php echo form_error('categoryid') ?></label>
            <input type="text" class="form-control" name="categoryid" id="categoryid" placeholder="Categoryid" value="<?php echo $categoryid; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Designationid <?php echo form_error('designationid') ?></label>
            <input type="text" class="form-control" name="designationid" id="designationid" placeholder="Designationid" value="<?php echo $designationid; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Allowed Players <?php echo form_error('allowed_players') ?></label>
            <input type="text" class="form-control" name="allowed_players" id="allowed_players" placeholder="Allowed Players" value="<?php echo $allowed_players; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created Date <?php echo form_error('created_date') ?></label>
            <input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Modified Date <?php echo form_error('modified_date') ?></label>
            <input type="text" class="form-control" name="modified_date" id="modified_date" placeholder="Modified Date" value="<?php echo $modified_date; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('team_selection_rules') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>