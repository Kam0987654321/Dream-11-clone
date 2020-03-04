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
        <h2 style="margin-top:0px">Team_match Read</h2>
        <table class="table">
	    <tr><td>Teamid1</td><td><?php echo $teamid1; ?></td></tr>
	    <tr><td>Match Status</td><td><?php echo $match_status; ?></td></tr>
	    <tr><td>Type</td><td><?php echo $type; ?></td></tr>
	    <tr><td>Time</td><td><?php echo $time; ?></td></tr>
	    <tr><td>Teamid2</td><td><?php echo $teamid2; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('team_match') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>