<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xamhall</title>
    <link href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
	<div style="text-align:center;">
	<div style="">
		
    </div>
	</div>
    <div class="middle-box text-center loginscreen animated fadeInDown">
    	<?php
    	$flashdata=$this->session->flashdata('error');
    	
    	  if($flashdata!=''){ ?>
    	 
	<div  class="alert alert-danger alert-dismissable" style="font-size:17px;">
		
	<i class="fa fa-exclamation-triangle fa-2x"></i>
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <a class="alert-link" href="#">Expired..!!</a>. Your Reset Password Link has been Expired. Please reprocess again and make sure, Password link will be valid till 2 hours.
		</div>
		<?php } ?>
        <div>
            <div>
               <img src="<?php echo base_url('assets/img/logo-full1.png') ?>"></img>
            </div>
            <?php if(isset($student)) {
           	if($student!=''){
            ?>
            <h3>Welcome to Xamhall</h3>            
            <p>Change Password to Login</p>
            <form class="m-t" role="form" action="javascript;">
           
                <div class="form-group">
                    <input type="password" onblur="check_password()" name="StudentPassword" id="password" class="form-control" placeholder="New Password" required="">
                    <input type="hidden" name="id" value="<?php ?>">
                    <span id="spn" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <input type="password" onblur="check_password()" class="form-control" id="newpassword" placeholder="New Password" required=""><span id="spn1" style="color:red;"></span>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">SAVE</button> 
                             
            </form>            
        </div>
        
   <?php 	}
           } 
           ?>
          
	
 	
    <script src="<?php echo base_url('assets/'); ?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
  <?php if(isset($js_script)){?>
    <script src="<?php echo base_url('institute_assets/js/pages/');?><?=$js_script?>.js"></script>
    <?php } ?>
</body>



</html>