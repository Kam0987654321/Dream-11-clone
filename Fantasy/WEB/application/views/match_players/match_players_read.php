<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Match Player
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Match Player</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
        <div class="box box-default">
            <div class="box-header with-border">
                
            </div>
            <?php $player =  $this->db->get_where('players',array('id'=>$this->uri->segment('3')))->row(); ?>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <h2 style="margin-top:0px">Match Player Read</h2>
                <table class="table">
                    <tr><td>Match</td><td><?php echo $match_status; ?></td></tr>
                    <tr><td>Team</td><td><?php echo $teamid; ?></td></tr>
                    <tr><td>Player</td><td><?php echo $playerid; ?></td></tr>
                    <tr><td>Dob</td><td><?php echo $player->dob; ?></td></tr>
                    <tr><td>bowls</td><td><?php echo $player->bowls; ?></td></tr>
                    <tr><td>bats</td><td><?php echo $player->bats; ?></td></tr>
                    <tr><td></td><td><a href="<?php echo site_url('match_players/index/'.$matchid) ?>" class="btn btn-default">Cancel</a></td></tr>
                </table>
            </div>
        </div>
    </section>
</div>
