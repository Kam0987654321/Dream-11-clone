<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('plugins/images/favicon.png');?>">
    <title><?php echo SITE_TITLE; ?></title>
    <script type="text/javascript"> var BASE_URL = "<?php echo base_url(); ?>"; </script>
    <script type="text/javascript"> var SITE_URL = "<?php echo site_url(); ?>"; </script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css');?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url('assets/css/animate.css');?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url('assets/css/colors/default.css');?>" id="theme" rel="stylesheet">

    <!--alerts CSS -->
    <link href="<?php echo base_url('plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css');?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box col-xs-12">
                <form class="form-horizontal form-material" id="registration_form" action="">
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="row">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <input class="form-control" type="text" required="" id="personname" name="personname" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <input class="form-control" type="text" required="" id="trading_name" name="trading_name" placeholder="Business Name">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-6">
                            <input class="form-control" type="text" required="" id="personemail" name="personemail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <input class="form-control" type="text" required="" id="tranding_email" name="tranding_email" placeholder="Business Email">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-6">
                            <input class="form-control" type="number" required="" id="" id="landline_number" name="landline_number" placeholder="Landline">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <input class="form-control" type="number" required="" id="mobile_number" name="mobile_number" placeholder="Mobile">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-6">
                            <textarea class="form-control" required="" id="office_address" name="office_address" placeholder="Office Address"></textarea>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" required="" id="state" name="state" placeholder="State">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" required="" id="zipcode" name="zipcode" placeholder="Pincode / Zipcode">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" required="" id="country" name="country" placeholder="Country" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <input class="form-control" type="number" required="" id="total_employees" name="total_employees" placeholder="Number Of Employees">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <select class="form-control" required="" id="industry_type" name="industry_type">
                                <option value="">Industry Type</option>
                                <option value="pharma">Pharma</option>
                            </select>
                        </div>
                    </div>
<!--                     <div class="form-group">
                        <div class="col-xs-6">
                            <input class="form-control" type="password" required="" id="personpassword" name="personpassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <input class="form-control" type="password" required="" id="conf_personpassword" name="conf_personpassword" placeholder="Confirm Password">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" type="checkbox" required="">
                                <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-6">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" id="submit" name="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="<?php echo site_url('login/login');?>" class="text-primary m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?php echo base_url('plugins/bower_components/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/dist/js/tether.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js');?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('assets/js/jquery.slimscroll.js');?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/js/waves.js');?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/js/custom.min.js');?>"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url('plugins/bower_components/styleswitcher/jQuery.style.switcher.js');?>"></script>
    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url('plugins/bower_components/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?php echo base_url('plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js');?>"></script>

    <?php if(isset($js_script)){?>
    <script src="<?php echo base_url('assets/customjs/'.$js_script.'.js');?>"></script>
    <?php }?>
</body>
</html>
