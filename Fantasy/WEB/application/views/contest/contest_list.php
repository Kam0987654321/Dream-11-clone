<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contest List
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">contest</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
   <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body wizard-content">
                    <div class="ibox-title">
                        <?php echo anchor(site_url('contest/create'),'Create', 'class="btn btn-primary"'); ?>
                     
                    </div>
                    
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
        <th>Contest Name</th>
        <th>Contest Tag</th>
        <th>Winners</th>
        <th>Prize Pool</th>
        <th>Total Team</th>
        <th>Join Team</th>
        <th>Entry</th>
        <th>Contest Description</th>
        <th>Contest Note1</th>
        <th>Contest Note2</th>
        <th>Match Title</th>
        <th>Type</th>
        <th>Contest Image</th>
        <th>Winning Information</th>
        <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                         <?php
             foreach ($contest_data as $contest)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $contest->contest_name ?></td>
            <td><?php echo $contest->contest_tag ?></td>
            <td><?php echo $contest->winners ?></td>
            <td><?php echo $contest->prize_pool ?></td>
            <td><?php echo $contest->total_team ?></td>
            <td><?php echo $contest->join_team ?></td>
            <td><?php echo $contest->entry ?></td>
            <td><?php echo $contest->contest_description ?></td>
            <td><?php echo $contest->contest_note1 ?></td>
            <td><?php echo $contest->contest_note2 ?></td>
            <td><?php echo
            $match = $this->Contest_model->get_match_by_id($contest->match_id);
            echo $match->title;
              ?></td>
            <td><?php echo $contest->type ?></td>
            <td><?php if($contest->contest_image !=""){?><img src="<?php echo base_url('uploads/contest_image/'.$contest->contest_image);?>" style="height: 42px; width: 60px;"><?php } else{?>
                <img src="<?php echo base_url('uploads/trophy.jpg');?>" style="height: 42px; width: 60px;">
                <?php } ?> </td>
            <td><?php echo anchor(site_url('contest/winning_information/'.$contest->contest_id),'Create'); ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('contest/read/'.$contest->contest_id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); 
                echo " ";
                echo anchor(site_url('contest/update/'.$contest->contest_id),'<button style="border-radius: 6px;" type="button" class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i></button>'); 
                                        echo " "; 
                echo anchor(site_url('contest/delete/'.$contest->contest_id),'<button style="border-radius: 6px;" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
                          </tbody>
                          
                        </table>
                      </div>
                    </div>
                 
                </div>
              </div>
            </div>
      
       
       