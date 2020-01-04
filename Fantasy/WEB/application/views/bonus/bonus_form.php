<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Signup Bonus
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Signup Bonus</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
	 <div class="box box-default">
        <div class="box-header with-border">
          
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
        <h2 style="margin-top:0px">Signup Bonus <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    
        <div class="form-group">
             <label for="varchar">Amount <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="value" id="vslue" placeholder="Value" value="<?php echo $value; ?>" /> 
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bonus') ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
	  </section>
	  </div>
   