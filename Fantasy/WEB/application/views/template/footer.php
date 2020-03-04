      <!-- Corporate footer-->
      <footer class="section-40 page-footer bg-catskill">
        <div class="shell">
          <div class="range range-xs-center range-sm-middle text-md-left">
            <div class="cell-xs-10 cell-md-6">
              <!--Footer brand--><a href="index.html" class="reveal-inline-block">
                <div class="unit unit-xs-middle unit-md unit-md-horizontal unit-spacing-xxs">
                  <div class="unit-left"><img src="./assets/images/Logomakr_2580y6.png" alt="" class="img-responsive reveal-inline-block" style="height:50px;"></div>
                  <!--<div class="unit-body text-xl-left">
                    <div>
                      <h6 class="barnd-name text-ubold">Concord High School</h6>
                    </div>
                  </div>-->
                </div></a>
            </div>
            <div class="cell-xs-10 cell-md-6 text-md-right offset-top-20 offset-md-top-0">
              <p class="text-dark">© <span id="copyright-year">2018</span> All Rights Reserved Terms of Use and <a href="privacy.html" class="text-dark">Privacy Policy</a></p>
            </div>
            <!-- {%FOOTER_LINK}-->
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div id="form-output-global" class="snackbars"></div>
    <!-- PhotoSwipe Gallery-->
    <div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
            <button title="Share" class="pswp__button pswp__button--share"></button>
            <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
            <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
          <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Java script-->
    <script src="<?php echo base_url() ?>institute_assets/js/core.min.js"></script>
    <script src="<?php echo base_url() ?>institute_assets/js/script.js"></script>
    <?php if(isset($js_script)){?>
    <script src="<?php echo base_url('institute_assets/js/pages/');?><?=$js_script?>.js"></script>
    <?php } ?>
     <script src="<?php echo base_url('assets/js/plugins/alertify/alertify.min.js');?>"></script>             
     <script src="<?php echo base_url('assets/js/plugins/validate/jquery.validate.min.js');?>"></script>
     <!-- Data picker -->
     <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js');?>"></script>
     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPse1a4x8dFHv1b3GkHnZ1jcFZ3Xy61CQ&callback=initMap">
    </script>
    <script src="<?php echo base_url('assets/js/plugins/sweetalert/sweetalert.min.js');?>"></script>

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

     

      function initMap() {
    //var  latitude=22.7196;
     //var  longitude=75.8577;
        var uluru = {lat:22.7196 , lng:75.8577 };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }

      $(".form").validate({
                 rules: {
                     password: {
                         required: true,
                         minlength: 3
                     },
                     url: {
                         required: true,
                         url: true
                     },
                     number: {
                         required: true,
                         number: true
                     },
                     min: {
                         required: true,
                         minlength: 6
                     },
                     max: {
                         required: true,
                         maxlength: 4
                     }
                 }
             });
    </script>
    


</body></html>