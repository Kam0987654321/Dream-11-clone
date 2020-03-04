 <footer class="container-fluid">
        <div class="row">
            <div class="col-xs-12 tb-footer">
                <div class="row">
                    <div class="col-xs-12 tb-footer-content">               
                 
                        <div class="clearfix bottom-box">
                            <div class="text-gray-14 pull-left">© E&S Comfort</div>
                            <ul class="list-inline pull-right">
                                <li><a href="https://testbook.com/privacy-policy" class="text-gray-9" target="_blank" rel="noopener">Privacy</a></li>
                                <li><a href="https://testbook.com/terms-of-service" class="text-gray-9" target="_blank" rel="noopener">Terms</a></li>
                                <li><a href="https://testbook.com/acceptable-use-policy" class="text-gray-9" target="_blank" rel="noopener">User Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <input id="developMode" value="" type="hidden">
    <input id="CDNURL" value="//testbook.com" type="hidden">
    <input id="isLoggedIn" value="1" type="hidden">
    <input id="go-api-server" value="https://api.testbook.com/api/" type="hidden">
    <input id="env" value="production" type="hidden">
    <input id="tb-signup-modal" value="tbSignUpModal" type="hidden">

    <div class="modal fade custom-login-modal" id="tbSignUpModal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content js-tb-modal-content">
                <div class="modal-body pad-0 js-inject-iframe">
                    <div class="js-inject-iframe-loader" style="position: absolute; left: 0; right: 0; top: 200px;text-align: center;">
                        <img style="height: 90px;display: inline-block;" src="<?php echo base_url('institute_assets/theme/img'); ?>/loader.gif">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade web-notification-alert" id="webNotificationAlert" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="pull-left" style="width: 50px;height: 50px;">

                            </div>
                            <div class="mar-l52 pad-l8 clearfix">
                                <h5 class="mar-t8 mar-b4">Get All Exam Notifications and Updates from Testbook</h5>
                                <p class="mar-v0 font-size-small text-gray-4">You can manage your notifications from browser settings.</p>
                            </div>
                        </div>
                        <div class="col-sm-4 pad-l0 mar-t12 text-right">
                            <button type="button" class="btn btn-sm btn-default js-deny-permission">Not Now</button>
                            <button type="button" class="btn btn-sm btn-success js-allow-permission">Yes, I'm Interested</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('institute_assets/theme/'); ?>/jquery.min.js" type="text/javascript"></script>
<?php if(isset($js_script)){?>
    <script src="<?php echo base_url('institute_assets/js/pages/');?><?=$js_script?>.js"></script>
    <?php } ?>
<script src="<?php echo base_url('institute_assets/theme/'); ?>bootstrap.js"></script>
 <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js');?>"></script>
<script>
     $(document).ready(function() {
      $('.mydatepicker').datepicker({
                        todayBtn: "linked",
                        keyboardNavigation: false,
                        forceParse: false,
                        calendarWeeks: false,
                        autoclose: true,
                        format: "dd-mm-yyyy"
                    });
    });
</script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.20/angular.min.js" type="text/javascript"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url('assets/js/plugins/slick/slick.min.js');?>"></script>
    
    <!--  <script src="<?php echo base_url('assets/js/course-concat.061dbce447fd32c389192f15d4f61797.js');?>"></script>     --><script src="<?php echo base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/tb-sdk.59ff4676295250001bc818f3c1bffab0.js"></script>
      <script src="<?php echo base_url() ?>assets/js/practice-concat.095407ef218ed15875fc985249b3fe6d.js"></script>
      <script src="<?php echo base_url() ?>assets/js/practice-concat.b3930c7740448aa33a568e8bf824d4b3.js"></script>
      <!-- <script src="<?php echo base_url() ?>assets/js/test-service.ebe94c093d13391a9ad20580a74340c8.js"></script>
        <script src="<?php echo base_url() ?>assets/js/defer.b0a0f827ae780e5363ac4a8fa45a8f26.js"></script>-->
      <script>

         $('.practice_arrow').on('click', function(){
           // alert("HELLO");
            
             if ($('#practice_sidebar').hasClass('ps-open')) {
                $('#practice_sidebar').animate({
                    
                     }, 500).removeClass('ps-open');
               
                $('.practice-container').animate({
                     
                     }, 500).removeClass('ps-open');
                
               } else {
                   $('#practice_sidebar').animate({
                    
                     }, 500).addClass('ps-open');
                
                $('.practice-container').animate({
                    
                     }, 500).addClass('ps-open');
  }
});

  $('.slick_demo_1').slick({   
          
           centerMode: false
            });
  
  $('.slick_demo_2').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: false,
                variableWidth: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

<div id="showLoading" class="modal" style="background-color: rgba(26, 26, 26, 0.9); z-index: 1060; display: none;"><div class="modal-dialog"><div class="modal-content" style="max-width: 300px;margin: auto;"><div class="modal-body text-center"><img style="height: 90px;" src="theme_assets/loader.gif"><h4 class="text-center space font-weight-normal">Loading Dashboard, please wait</h4></div></div></div></div><div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div>
<style type="text/css">#webklipper-publisher-widget-container, #webklipper-publisher-widget-container * {overflow:visible; -webkit-box-sizing: content-box; -moz-box-sizing: content-box;  box-sizing: content-box; margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline;}</style></body></html>