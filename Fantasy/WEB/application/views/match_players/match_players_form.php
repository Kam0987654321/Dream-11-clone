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
            <div class="box-tools ">
                <a href="<?php echo site_url('match_players') ?>" class="btn btn-primary">Match Player</a>
            </div>
                <!-- /.box-header -->
            <div class="box-body wizard-content">
                <h2 style="margin-top:0px">Match Players <?php echo $button ?></h2>
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="varchar">Match <?php echo form_error('matchid') ?></label>
                        <select class="form-control" name="matchid" id="matchid" placeholder="matchid">   
                            <option value="">Select Match</option>
                            <?php foreach($match as $m) {?>  
                                <option <?php if($m->match_id == $matchid){ echo 'selected="selected"'; } ?> value="<?php echo $m->match_id ?>"><?php echo $m->match_status?> </option>
                            <?php }?>     
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Team <?php echo form_error('teamid') ?></label>
                        <select class="form-control" name="teamid" id="teamid" placeholder="Teamid"> 
                            <option value="">Select Team</option>
                            <?php foreach($team as $t) {?>  
                                <option <?php if($t->team_id == $teamid){ echo 'selected="selected"'; } ?> value="<?php echo $t->team_id ?>"><?php echo $t->team_name?> </option>
                            <?php }?>   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="int">Players <?php echo form_error('playerid') ?></label>
                        <select class="form-control" name="playerid" id="playerid" placeholder="Playerid">
                            <option value="">Select Player</option>
                            <?php foreach($player as $p) {?>  
                                <option <?php if($p->id == $playerid){ echo 'selected="selected"'; } ?> value="<?php echo $p->id?>"><?php echo $p->name?> </option>
                            <?php }?>
                        </select>
                    </div> 
                    
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('match_players') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
         <!-- /.box-body -->
        </div>
      <!-- /.box -->
    </section>
</div>