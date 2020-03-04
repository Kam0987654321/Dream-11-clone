<!DOCTYPE html>
<html lang="en" class="wide wow-animation smoothscroll scrollTo desktop landscape rd-navbar-static-linked"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!-- <script type="text/javascript" async="" src="<?php// echo base_url() ?>/institute_assets/js/ec.js" style=""></script><script type="text/javascript" async="" src="<?php// echo base_url() ?>/institute_assets/js/analytics.js"></script> -->
    <!-- Site Title-->
    <title>Home</title>    
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="keywords" content="intense web design multipurpose template">
    <link rel="icon" href="<?php echo base_url() ?>institute_assets/images/favicon.png" type="image/x-icon">
    <!-- Stylesheets-->
    <!-- <link rel="stylesheet" type="text/css" href="./assets/css/css.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>institute_assets/css/style.css">
	<link data-olark="true" rel="stylesheet" href="<?php echo base_url() ?>institute_assets/css/theme.css" type="text/css">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
  <script type="text/javascript"> var BASE_URL = "<?php echo base_url();?>"; </script>
  <script type="text/javascript"> var SITE_URL = "<?php echo site_url(); ?>"; </script>
   <link href="<?php echo base_url('assets/css/plugins/alertify/alertify.core.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/alertify/alertify.default.css');?>" rel="stylesheet">
</head>
<style>
.modal {
	margin-top:10%;
  
}
 .modal-backdrop {
    z-index: 100000 !important;
  }

  .modal {
    z-index: 100001 !important;
  }
  .modal-content  {
    -webkit-border-radius: 0px !important;
    -moz-border-radius: 0px !important;
    border-radius: 0px !important; 
}

</style>
  <body>
    <!-- Page-->
    <div class="page text-center">
      <!-- Page Header-->
      <header style="position:absolute; left:0; right:0;top:0" class="page-head">
        <!-- RD Navbar Transparent-->
        <div class="rd-navbar-wrap" style="height: 90px;">
          <nav data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-stick-up-offset="40" class="rd-navbar rd-navbar-transparent rd-navbar-static" data-lg-auto-height="true" data-auto-height="false" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-stick-up="true" data-md-focus-on-hover="false">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
                <h4 class="panel-title veil-lg">Home</h4>
              </div>
              <div class="rd-navbar-menu-wrap clearfix">
                <!--Navbar Brand-->
                <div class="rd-navbar-brand"><a href="index.html" class="reveal-inline-block">
                    <div class="unit unit-xs-middle unit-lg unit-lg-horizontal unit-spacing-xxs">
                      <?php
                     // print_r($institute_data);
                       ?>
                      <div class="unit-left"><img height="100" width=""  src="<?php echo base_url() ?>uploads/logos/<?php echo $institute_data['InstituteLogo']; ?>" alt="<?php echo $institute_data['InstituteFullName']; ?>" class="img-responsive"></div>
                    </div></a></div>
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-mobile-scroll">
                    <div class="rd-navbar-mobile-header-wrap">
                      <!--Navbar Brand Mobile-->
                      <div class="rd-navbar-mobile-brand"><a href="index.html"><img src="<?php echo base_url() ?>institute_assets/images/Logomakr_2580y6.png" alt="XamHALL" class="img-responsive"></a></div>
                    </div>
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                       <li class="active"><a href="<?php echo site_url('coaching/'.$institute_data['InstituteWebsiteUrl']);?>">Home</a></li>
                      <?php if(isset($_SESSION['StudentId'])){?>
                        <li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#"><?php echo $_SESSION['StudentFullName'];?></a>
                        <ul class="rd-navbar-dropdown">
                          <li><a href="<?php echo site_url('Coaching/dashboard');?>">Dashboard</a>
                          </li>                          
                          <li><a href="<?php echo site_url('Coaching/logout');?>">Logout</a>
                          </li>
                        </ul>
                      <span class="rd-navbar-submenu-toggle"></span></li>
                      <?php }else{?>
                        <li><a id="myaccount" href="#loginModal" data-toggle="modal">Login</a></li>
                      <?php }?>
                      <!-- <li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">Elements</a>
                        <ul class="rd-navbar-dropdown">
                          <li><a href="grid.html">Grid</a>
                          </li>
                          <li><a href="icons.html">Icons</a>
                          </li>
                          <li><a href="tables.html">Tables</a>
                          </li>
                          <li><a href="progress-bars.html">Progress bars</a>
                          </li>
                          <li><a href="tabs-and-accordions.html">Tabs &amp; Accordions</a>
                          </li>
                          <li><a href="forms.html">Forms</a>
                          </li>
                          <li><a href="buttons.html">Buttons</a>
                          </li>
                          <li><a href="typography.html">Typography</a>
                          </li>
                        </ul>
                      <span class="rd-navbar-submenu-toggle"></span></li>
                      <li class="rd-navbar--has-megamenu rd-navbar-submenu"><a href="#">Pages</a>
                        <div class="rd-navbar-megamenu">
                          <div class="row section-relative">
                            <ul class="col-lg-3">
                              <li>
                                <h6>Academics</h6>
                                <ul class="list-unstyled offset-lg-top-20">
                                  <li><a href="academic.html#0">Undergraduate Studies</a></li>
                                  <li><a href="academic.html#1">Graduate &amp; Professional Studies</a></li>
                                  <li><a href="academic.html#2">Departments &amp; Programs</a></li>
                                  <li><a href="academic.html#3">Global Education</a></li>
                                  <li><a href="academic.html#4">Summer Session</a></li>
                                  <li><a href="academic.html#5">Non-Degree Offerings</a></li>
                                  <li><a href="academic.html#6">Online Learning</a></li>
                                </ul>
                              </li>
                            </ul>
                            <ul class="col-lg-3">
                              <li>
                                <h6>Pages</h6>
                                <ul class="list-unstyled offset-lg-top-20">
                                  <li><a href="404.html">404</a></li>
                                  <li><a href="privacy.html">Terms of Use</a></li>
                                  <li><a href="maintenance.html">Maintenance</a></li>
                                  <li><a href="login-register.html">Login/Register</a></li>
                                  <li><a href="coming-soon.html">Coming Soon</a></li>
                                  <li><a href="search-results.html">Search Results</a></li>
                                  <li><a href="apply.html">Apply</a></li>
                                </ul>
                              </li>
                            </ul>
                            <ul class="col-lg-3">
                              <li>
                                <h6>Layouts</h6>
                                <ul class="list-unstyled offset-lg-top-20">
                                  <li><a href="header-transparent.html">Header Transparent</a></li>
                                  <li><a href="header-center.html">Header Center, Footer Center</a></li>
                                  <li><a href="header-minimal.html">Header Minimal, Footer Center</a></li>
                                  <li><a href="header-corporate.html">Header Corporate</a></li>
                                  <li><a href="header-hamburger-menu.html">Header Hamburger Menu</a></li>
                                  <li><a href="footer-minimal.html">Footer Minimal</a></li>
                                  <li><a href="footer-widget.html">Footer Widget</a></li>
                                </ul>
                              </li>
                            </ul>
                            <ul class="col-lg-3">
                              <li>
                                <h6>About</h6>
                                <ul class="list-unstyled offset-lg-top-20">
                                  <li><a href="history.html">History</a></li>
                                  <li><a href="people.html">People</a></li>
                                  <li><a href="team-member-profile.html">Team Member Profile</a></li>
                                </ul>
                              </li>
                              <li>
                                <h6>Event Calendar</h6>
                                <ul class="list-unstyled offset-lg-top-20">
                                  <li><a href="calendar.html">Calendar</a></li>
                                  <li><a href="day-event.html">Daily Events</a></li>
                                  <li><a href="event-page.html">Event Page</a></li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                        </div>
                      <span class="rd-navbar-submenu-toggle"></span></li>
                      <li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">News</a>
                        <ul class="rd-navbar-dropdown">
                          <li><a href="classic-news.html">Classic news</a>
                          </li>
                          <li><a href="grid-news.html">Grid News</a>
                          </li>
                          <li><a href="masonry-news.html">Masonry News</a>
                          </li>
                          <li><a href="grid-news-3-columns.html">3 Columns Grid News</a>
                          </li>
                          <li><a href="modern-news.html">Modern News</a>
                          </li>
                          <li><a href="news-post-page.html">News Post Page</a>
                          </li>
                        </ul>
                      <span class="rd-navbar-submenu-toggle"></span></li>
                      <li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">Gallery</a>
                        <ul class="rd-navbar-dropdown">
                          <li><a href="grid-gallery.html">Grid Gallery</a>
                          </li>
                          <li><a href="grid-without-padding-gallery.html">Grid Without Padding Gallery</a>
                          </li>
                          <li><a href="masonry-gallery.html">Masonry Gallery</a>
                          </li>
                          <li><a href="cobbles-gallery.html">Cobbles Gallery</a>
                          </li>
                        </ul>
                      <span class="rd-navbar-submenu-toggle"></span></li>
                      <li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">Shop</a>
                        <ul class="rd-navbar-dropdown">
                          <li><a href="product-catalog.html">Product Catalog</a>
                          </li>
                          <li><a href="single-product.html">Single Product</a>
                          </li>
                          <li><a href="shopping-cart.html">Shopping Cart</a>
                          </li>
                          <li><a href="checkout.html">Checkout</a>
                          </li>
                        </ul>
                      <span class="rd-navbar-submenu-toggle"></span></li>
                      <li><a href="donate.html">Donate</a>
                      </li>
                      <li><a href="contacts.html">Contacts</a>
                      </li>
                      <li class="veil-lg"><a href="shopping-cart.html">Shopping Cart (2)</a></li> -->
                    </ul>
                    <!--RD Navbar Mobile Search
                    <div id="rd-navbar-search-mobile" class="rd-navbar-search-mobile">
                      <form action="search-results.html" method="GET" class="rd-navbar-search-form search-form-icon-right rd-search">
                        <div class="form-group">
                          <label for="rd-navbar-mobile-search-form-input" class="form-label rd-input-label">Search...</label>
                          <input id="rd-navbar-mobile-search-form-input" type="text" name="s" autocomplete="off" class="rd-navbar-search-form-input form-control form-control-gray-lightest">
                        </div>
                        <button type="submit" class="icon fa-search rd-navbar-search-button"></button>
                      </form>
                    </div>-->
                  </div>
                </div>
                <!--RD Navbar Search
                <div class="rd-navbar-search"><a data-rd-navbar-toggle=".rd-navbar-search" href="#" class="rd-navbar-search-toggle mdi"><span></span></a>
                  <form action="search-results.html" data-search-live="rd-search-results-live" method="GET" class="rd-navbar-search-form search-form-icon-right rd-search">
                    <div class="form-group">
                      <label for="rd-navbar-search-form-input" class="form-label rd-input-label">Search</label>
                      <input id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off" class="rd-navbar-search-form-input form-control form-control-gray-lightest">
                      <div id="rd-search-results-live" class="rd-search-results-live"></div>
                    </div>
                  </form>
                </div>-->
                <!--RD Navbar shop
                <div class="rd-navbar-cart"><span class="icon fa-shopping-cart"></span><a href="shopping-cart.html" class="inset-left-10">2</a></div>
              </div>-->
            </div>
          </nav>
        </div>
      </header>
     <div id="loginModal" class="modal" data-easein="flipXIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title theme-text">
					Student Login
				</h4>
			</div>
			<div class="modal-body">
			    <div class="row">
			        <span id="error" style="color:red;"></span>
			    </div>
				<div class="row">
					<div class="col-md-12 form-group">
						<input type="text" class="form-control" id="loginusername" name="loginusername" placeholder="Login Email" value="" autofocus>
					</div>
					<div class="col-md-12 form-group">
						<input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Login Password" value="">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
				<?php $data=$this->session->userdata('InstituteWebsiteUrl'); ?>
				<input class="btn btn-primary" id="login" onclick='login("<?php echo $data; ?>")' type="submit" name="submit" value="Login">
			</div>
		</div>
	</div>
</div> 