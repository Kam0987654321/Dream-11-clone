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
                     <a class="btn btn-xs btn-info" href="<?php echo site_url('utensils/'); ?>">Show Utensils</a>
                </div>
    <div class="ibox-content">   
        <h2 style="margin-top:0px">Utensils <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('Name') ?></label>
            <input type="text" class="form-control" name="Name" id="Name" placeholder="Name" value="<?php echo $Name; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Active <?php echo form_error('Active') ?></label>
            <select class="form-control" name="Active" id="Active">
                <option id="0">Yes</option>
                <option id="1">No</option>
            </select>            
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('utensils') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>
</div>
</div>
</div>