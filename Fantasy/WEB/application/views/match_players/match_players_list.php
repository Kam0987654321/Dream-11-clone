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
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <!-- <div class="ibox-title">
                    <?php //echo anchor(site_url('match_players/create'),'Create', 'class="btn btn-primary"'); ?>
                </div> -->
                <div class="col-md-4 text-center">
                     <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                     </div>
                </div>

                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Match</th>
                                    <th>Team Name</th>
                                    <th>Player Name</th>
                                    <th>Player Image</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($match_players_data as $match_players)
                            {
                                ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php 
                                $match =$this->db->get_where('match',array('match_id'=>$this->uri->segment('3')))->row();
                                 echo $match->type ?></td>
                                <td><?php echo $match_players->team_name ?></td>
                                <td><?php echo $match_players->name ?></td>
                                <td>
                                    <?php $player_image =$this->db->get_where('players',array('id'=>$match_players->playerid))->row(); ?>
                                    <img height="70px" width="70px" src="<?php echo base_url('uploads/player/'.$match_players->image); ?>"> </td>
                                <td style="" width="200px">
                                    <?php 
                                    echo anchor(site_url('match_players/read/'.$match_players->id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); 
                                    echo ' '; 
                                    // echo anchor(site_url('match_players/update/'.$match_players->id),'<button style="border-radius: 6px;" type="button" class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i></button>'); 
                                    // echo ' '; 
                                    // echo anchor(site_url('match_players/delete/'.$match_players->id),'<button style="border-radius: 6px;" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                            <!-- <div class="col-md-6 text-right">
                                <?php echo $pagination ?>
                            </div> -->
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </section>
</div>