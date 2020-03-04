<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Utensils</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a>Utensils</a>
            </li>
            <li class="active">
                <strong>Add Utensils</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                     <a class="btn btn-xs btn-info" href="<?php echo site_url('utensils/create'); ?>">Create Utensils</a>
                </div>
    <div class="ibox-content">   
        <h2 style="margin-top:0px">Utensils List</h2>
         <table class="table table-striped table-bordered table-hover dataTables-example" >
                          <thead>
                            <tr>
                               <th>No</th>
                                    <th>Name</th>
                                    <th>Active</th>
                                    <th>CreatedDate</th>
                                    <th>ModifiedDate</th>
                                    <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($utensils_data as $utensils)
            {
                 if($utensils->Active==1){
                    $utensils->Active='No';
                }
                else{
                   $utensils->Active='Yes'; 
                }
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $utensils->Name ?></td>
            <td><?php echo $utensils->Active ?></td>
            <td><?php echo $utensils->CreatedDate ?></td>
            <td><?php echo $utensils->ModifiedDate ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('utensils/read/'.$utensils->id),'Read'); 
                echo ' | '; 
                echo anchor(site_url('utensils/update/'.$utensils->id),'Update'); 
                echo ' | '; 
                echo anchor(site_url('utensils/delete/'.$utensils->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            } ?>
                          </tbody>
                          <tfoot>
                            <tr>
                           <th>No</th>
        <th>Name</th>
        <th>Active</th>
        <th>CreatedDate</th>
        <th>ModifiedDate</th>
        <th>Action</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      