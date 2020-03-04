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
        <h2 style="margin-top:0px">Team_selection_rules Read</h2>
        <table class="table">
	    <tr><td>Categoryid</td><td><?php echo $categoryid; ?></td></tr>
	    <tr><td>Designationid</td><td><?php echo $designationid; ?></td></tr>
	    <tr><td>Allowed Players</td><td><?php echo $allowed_players; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Modified Date</td><td><?php echo $modified_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('team_selection_rules') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>