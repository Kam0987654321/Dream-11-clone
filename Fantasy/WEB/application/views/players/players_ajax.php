<div  class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Designation</th>
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
                                    <td><?php echo $players->credit_points ?></td>
                                    <td><img src="<?php echo base_url('uploads/player/'.$players->image);?>" style="height: 42px; width: 60px;"></td>
                                    <td style="text-align:center" width="200px">
                                        <?php 
                                        echo anchor(site_url('players/read/'.$players->pla_id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); 
                                        echo " ";
                                        echo anchor(site_url('players/update/'.$players->pla_id),'<button style="border-radius: 6px;" type="button" class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i></button>', array('target' => '_blank')); 
                                        echo " ";
                                        echo anchor(site_url('players/delete/'.$players->pla_id),'<button style="border-radius: 6px;" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
                            
                    </div>
                </div> 