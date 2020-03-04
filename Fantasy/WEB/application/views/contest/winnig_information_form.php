<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Winning Information
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">winning information</a></li>
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
        <h2 style="margin-top:0px">Winning Information <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <input type="hidden" name="contest_name" value="<?php echo $this->uri->segment('3'); ?>">
	    <div class="form-group">
            <label for="varchar">From Rank<?php echo form_error('from_rank') ?></label>
            <input type="text" class="form-control" name="from_rank" id="from_rank" placeholder="From Rank" value="<?php echo $from_rank; ?>" />
      </div>
      <div class="form-group">
            <label for="varchar">To Rank<?php echo form_error('to_rank') ?></label>
            <input type="text" class="form-control" name="to_rank" id="rank" placeholder="To Rank" value="<?php echo $to_rank; ?>" />
      </div>
	    <div class="form-group">
            <label for="int">Price<?php echo form_error('price') ?></label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" />
        </div>
	    
	    <input type="hidden" name="contest_id" value="<?php echo $contest_id; ?>" />
      <input type="hidden" name="winning_info_id" value="<?php echo $winning_info_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <!-- <a href="<?php //echo site_url('contest') ?>" class="btn btn-default">Cancel</a> -->
	</form>
	</div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
	  </section>
	  </div>
   