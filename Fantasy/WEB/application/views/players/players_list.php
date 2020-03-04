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
        
        <!-- /.box-header -->
            <div class="box-body wizard-content">
                <div class="ibox-title">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <select class="form-control" id="team_id" name="team_id">
                                    <option value="">Select Team</option>
                                    <?php foreach ($teams as $team) { ?> <option value="<?php echo $team->team_id;?>"><?php echo  $team->team_name; ?></option><?php 
                                    } ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="varchar">&nbsp;</label>
                                <input class="btn btn-success" onclick="get_players()" type="button" value="View">
                            </div>
                            </div>
                        </div>
                        
                </form>
                    <!-- <?php //echo anchor(site_url('players/create'),'Create', 'class="btn btn-primary"'); ?> -->
                </div>
                    
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div id="player_hide">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Team</th>
                                    <th>Credit Points</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <?php
                                foreach ($players_data as $players) {?>

                                <tr>
                                    <td width="80px"><?php echo ++$start ?></td>
                                    <td><?php echo $players->name ?></td>
                                    <td><?php echo $players->title ?></td>
                                    <td><?php echo $players->team_name ?></td>
                                    <td><?php echo $players->credit_points ?></td>
                                    <td><img src="<?php echo base_url('uploads/player/'.$players->image);?>" style="height: 42px; width: 60px;"></td>
                                    <td style="text-align:center" width="200px">
                                        <?php 
                                        echo anchor(site_url('players/read/'.$players->id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); 
                                        echo " ";
                                        echo anchor(site_url('players/update/'.$players->id),'<button style="border-radius: 6px;" type="button" class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i></button>'); 
                                        echo " ";
                                        echo anchor(site_url('players/delete/'.$players->id),'<button style="border-radius: 6px;" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                                </div>
                                
                            </div> 
                    </div>
                </div> 
                </div> 
                <div id="player_show">
                    
                </div>       
            </div>
        </div>
    </section>
</div>
      
       
       


       