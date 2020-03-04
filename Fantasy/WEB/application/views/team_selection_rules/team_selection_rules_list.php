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
        <h2 style="margin-top:0px">Team_selection_rules List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('team_selection_rules/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('team_selection_rules/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('team_selection_rules'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Categoryid</th>
		<th>Designationid</th>
		<th>Allowed Players</th>
		<th>Created Date</th>
		<th>Modified Date</th>
		<th>Action</th>
            </tr><?php
            foreach ($team_selection_rules_data as $team_selection_rules)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $team_selection_rules->categoryid ?></td>
			<td><?php echo $team_selection_rules->designationid ?></td>
			<td><?php echo $team_selection_rules->allowed_players ?></td>
			<td><?php echo $team_selection_rules->created_date ?></td>
			<td><?php echo $team_selection_rules->modified_date ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('team_selection_rules/read/'.$team_selection_rules->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('team_selection_rules/update/'.$team_selection_rules->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('team_selection_rules/delete/'.$team_selection_rules->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>