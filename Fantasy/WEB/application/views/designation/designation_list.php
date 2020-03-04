<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Designation
      </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">category</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-default">

            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <div class="ibox-title">
                    <?php echo anchor(site_url('designation/create'),'Create', 'class="btn btn-primary"'); ?>

                </div>

                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>

                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>CreatedDate</th>
                                    <th>ModifiedDate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
             foreach ($designation_data as $designation)
            {
                ?>
                                    <tr>
                                        <td width="80px">
                                            <?php echo ++$start ?>
                                        </td>
                                        <td>
                                            <?php echo $designation->title ?>
                                        </td>
                                        <td>
                                            <?php echo $designation->created_date ?>
                                        </td>
                                        <td>
                                            <?php echo $designation->modified_date ?>
                                        </td>
                                        <td style="text-align:center" width="200px">
                                            <?php 
                echo anchor(site_url('designation/read/'.$designation->id),'<button style="border-radius: 6px;" type="button" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i></button>'); 
                echo ' '; 
                echo anchor(site_url('designation/update/'.$designation->id),'<button style="border-radius: 6px;" type="button" class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true"></i></button>'); 
                echo ' '; 
                echo anchor(site_url('designation/delete/'.$designation->id),'<button style="border-radius: 6px;" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
                                        </td>
                                    </tr>
                                    <?php
            }
            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
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