<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User List
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">user</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
    <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body wizard-content">
                    <!-- <div class="ibox-title">
                        <?php //echo anchor(site_url('contest/create'),'Create', 'class="btn btn-primary"'); ?> 
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
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>User Image</th>
                                <th>Aadhar Image</th>
                                <th>Aadhar name</th>
                                <th>Aadhar dob</th>
                                <th>Aadharcard Status</th>
                                <th>Aadhar Number</th>
                                <th>Pancard Image</th>
                                <th>Pancard name</th>
                                <th>Pancard dob</th>
                                <th>Pancard Status</th>
                                <th>Pancard Number</th>
                            </tr>
                        <tbody>
                            <?php
                                foreach ($user_data as $user)
                                {
                                ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $user->name ?></td>
                                <td><?php echo $user->mobile ?></td>
                                <td><?php echo $user->email ?></td>
                                <td>
                                    <?php if($user->image !=""){?>
                                        <img src="<?php echo base_url('uploads/user/'.$user->image);?>" style="height: 42px; width: 60px;">
                                    <?php }else{?>
                                        <img src="<?php echo base_url('uploads/user/default.jpg');?>" style="height: 42px; width: 60px;">
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($user->aadharcard_image !=""){?>
                                        <img src="<?php echo base_url('uploads/documents/'.$user->aadharcard_image);?>" style="height: 42px; width: 60px;">
                                    <?php }else{?>  
                                        <img src="<?php echo base_url('uploads/documents/default.png');?>" style="height: 42px; width: 60px;">
                                    <?php } ?>
                                </td>
                                <td><?php echo $user->aadhar_card_name ?></td>
                                <td><?php echo $user->aadharcard_dob ?></td>
                                <td>
                                    <select onchange="aadhar_status('<?php echo $user->user_id; ?>', this.value);">
                                        <option value="1" <?php if($user->aadharcard_status =='0'){ echo 'selected'; }?>>Not upload</option>
                                        <option value="1" <?php if($user->aadharcard_status =='1'){ echo 'selected'; }?>>Pending</option>
                                        <option value="2" <?php if($user->aadharcard_status =='2'){ echo 'selected'; }?> >Approved</option>
                                        <option value="3" <?php if($user->aadharcard_status =='3'){ echo 'selected'; }?> >Reject</option>
                                    </select></td>
                                <td><?php echo $user->aadhar ?></td>
                                <td>
                                    <?php if($user->pancard_image !=""){?>
                                        <img src="<?php echo base_url('uploads/documents/'.$user->pancard_image );?>" style="height: 42px; width: 60px;">
                                    <?php }else{?>  
                                        <img src="<?php echo base_url('uploads/documents/default.png');?>" style="height: 42px; width: 60px;">
                                    <?php } ?>
                                </td>
                                <td><?php echo $user->pan_card_name ?></td>
                                <td><?php echo $user->pancard_dob ?></td>
                                <td>
                                    <select onchange="pan_status('<?php echo $user->user_id; ?>', this.value);">
                                        <option value="0" <?php if($user->pancard_status =='0'){ echo 'selected'; }?> >Not Updload</option>
                                        <option value="1" <?php if($user->pancard_status =='1'){ echo 'selected'; }?> >Pending</option>
                                        <option value="2" <?php if($user->pancard_status =='2'){ echo 'selected'; }?>>Approved</option>
                                        <option value="3" <?php if($user->pancard_status =='3'){ echo 'selected'; }?>>Reject</option>
                                    </select>
                                    </td>
                                <td><?php echo $user->pan_number ?></td>
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
    </section>
</div>
      

<script type="text/javascript" src="<?php echo base_url('web_assets/javascripts/forgetpassword.js')?>"></script>

<script type="text/javascript">
    function aadhar_status(user, status)
    {   
        var e = confirm('Are you sure..');
         if(e)
         {
           $.ajax({
            type : 'post',       
            url: SITE_URL+'kyc/aadhar_status',
            data : { user_id : user, status : status},
            success : function(data) {
                var response = JSON.parse(data);
                if(response.status == '1')
                {
                   $('#message').html(response.msg); 
                    setTimeout(function() {
                    location.reload();
                    }, 3000);
                }
                else if(response.status == '2')
                {
                    $('#message').html(response.msg);
                }
            }
        });
         }   
    }

    function pan_status(user, status)
    {   
        var e = confirm('Are you sure..');
         if(e)
         {
           $.ajax({
            type : 'post',       
            url: SITE_URL+'kyc/pan_status',
            data : { user_id : user, status : status},
            success : function(data) {
                var response = JSON.parse(data);
                if(response.status == '1')
                {
                   $('#message').html(response.msg); 
                    setTimeout(function() {
                    location.reload();
                    }, 3000);
                }
                else if(response.status == '2')
                {
                    $('#message').html(response.msg);
                }
            }
        });
         }   
    }
</script>
       
       