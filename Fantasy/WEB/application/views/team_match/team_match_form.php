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
        <h2 style="margin-top:0px">Team_match <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Teamid1 <?php echo form_error('teamid1') ?></label>
            <input type="text" class="form-control" name="teamid1" id="teamid1" placeholder="Teamid1" value="<?php echo $teamid1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Match Status <?php echo form_error('match_status') ?></label>
            <input type="text" class="form-control" name="match_status" id="match_status" placeholder="Match Status" value="<?php echo $match_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Type <?php echo form_error('type') ?></label>
            <input type="text" class="form-control" name="type" id="type" placeholder="Type" value="<?php echo $type; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Time <?php echo form_error('time') ?></label>
            <input type="text" class="form-control" name="time" id="time" placeholder="Time" value="<?php echo $time; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Teamid2 <?php echo form_error('teamid2') ?></label>
            <input type="text" class="form-control" name="teamid2" id="teamid2" placeholder="Teamid2" value="<?php echo $teamid2; ?>" />
        </div>
	    <input type="hidden" name="match_id" value="<?php echo $match_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('team_match') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>