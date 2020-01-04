<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>/assets/images/favicon.ico">

    <title><?php echo SITE_TITLE; ?></title>
   
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/master_style.css">

    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/skins/_all-skins.css">   
<?php
$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
); ?>   
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>CRICADDA</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo site_url('login');?>" method="post" class="form-element">
      <div class="form-group has-feedback">
        <input type="email" name="loginname" class="form-control" placeholder="Email">
        <span class="ion ion-email form-control-feedback"></span>
      </div>
       <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
      <div class="form-group has-feedback">
        <input type="password" name="loginpassword" class="form-control" placeholder="Password">
        <span class="ion ion-locked form-control-feedback"></span>
      </div>
      <div class="row">
        <!--
        <div class="col-6">
          <div class="checkbox">
            <input type="checkbox" id="basic_checkbox_1" >
            <label for="basic_checkbox_1">Remember Me</label>
          </div>
        </div>
        <!-- /.col 
        <div class="col-6">
         <div class="fog-pwd">
            <a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block btn-flat margin-top-10">SIGN IN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-social-icon btn-circle btn-facebook"><i class="fa fa-facebook"></i></a>
      <a href="#" class="btn btn-social-icon btn-circle btn-google"><i class="fa fa-google-plus"></i></a>
    </div>
    <!-- /.social-auth-links -->

    <!--<div class="margin-top-30 text-center">
        <p>Don't have an account? <a href="register.html" class="text-info m-l-5">Sign Up</a></p>
    </div>
-->
  </div>
  <!-- /.login-box-body -->
</div>

    <script src="<?php echo base_url();?>/assets/vendor_components/jquery/dist/jquery.min.js"></script>

    <script src="<?php echo base_url();?>/assets/vendor_components/popper/dist/popper.min.js"></script>

    <script src="<?php echo base_url();?>/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
