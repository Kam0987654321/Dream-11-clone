<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Player
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Player</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
        <div class="box box-default">
            <div class="box-tools ">
                <a href="<?php echo site_url('players') ?>" class="btn btn-primary">Player</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <h2 style="margin-top:0px">Players <?php echo $button ?></h2>
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="varchar">Name <?php echo form_error('name') ?></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Designation <?php echo form_error('designationid') ?></label>
                        <select class="form-control" name="designationid" id="designationid" placeholder="Designationid">   
                            <option value="">Select Designation</option>
                            <?php foreach($designation as $des) {?>  
                                <option <?php if($des->id == $designationid){ echo 'selected="selected"'; } ?> value="<?php echo $des->id ?>"><?php echo $des->title?> </option>
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
                        <label for="varchar">Credit Points <?php echo form_error('credit_points') ?></label>
                        <input type="text" class="form-control" name="credit_points" id="credit_points" placeholder="Credit Points" value="<?php echo $credit_points; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Image <?php echo form_error('image') ?></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" /> 
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('players') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </section>
</div>