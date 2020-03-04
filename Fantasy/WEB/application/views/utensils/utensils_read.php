<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Utensils</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a>Utensils Level</a>
            </li>
            <li class="active">
                <strong>Utensils Details</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
        <h2 style="margin-top:0px">Utensils Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $Name; ?></td></tr>
	    <tr><td>Active</td><td><?php echo $Active; ?></td></tr>
	    <tr><td>CreatedDate</td><td><?php echo $CreatedDate; ?></td></tr>
	    <tr><td>ModifiedDate</td><td><?php echo $ModifiedDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('utensils') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>