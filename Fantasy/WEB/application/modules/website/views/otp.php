
    <div class="container-fluid">	
        <div class="main-bg-img" style="background-image: url(<?php echo base_url('design/img/background/main_bg_img.jpg') ?>);">
    		<div class="col-sm-12 pzero">

    				<div class="row">	

    					<div class="col-sm-5 pzero	">

    						<div class="col-sm-12 pzero">

    							<div class="top-header sticky-top">

    								<div class="site-title">

    									<h5>UAB LEAGUE</h5>	

    								</div>	
    								<!--END-SITE-TITLE-->	
                                 <!--<div class="short-nav-bar">
            
                                  <div class="row">
            
                                    <div class="col-sm-4 col-4"><a href="">FIXTURE</div>
                                                  <div class="col-sm-4 col-4"><a href="">LIVE</a></div>
                                                  <div class="col-sm-4 col-4"><a href="">RESULT</a></div>
            
                                  </div>-->
                                  <!--ROW=END-->  
            
                                </div>
                                <!--SHHORT-NAV-BAR-->
    			
    							</div>	
    							<!--HEADER-END-->


    							<div class="col-sm-12 pzero">
    									
    								<div class="match-list-slider">	

    									<div class="fixed-col">
    										
    										<div id="style-15" class="scroll-col style-15">

    											<div class="sign-up-container">

    												<div class="social-sign-up-btns">	

    													<div class="social-btn">

    														<span><i class="fab fa-facebook-f"></i><b>Facebook</b></span>

    													</div>
    													<!--FACEBOOK-BTN-END-->	

    													<div class="social-btn">

    														<span><i class="fab fa-google-plus-g"></i><b>Google</b></span>

    													</div>
    													<!--FACEBOOK-BTN-END-->	
    												</div>
    												<!--SOCIAL-SIGN-UP-BTN-END-->	

    												<div class="or-divder">
    													OR
    												</div>
    												<!--OR-DIVDER--END-->	
                                                    <div id="success_msg" style="text-align: center; color: red">
                                                        <?php if($this->session->flashdata('error')) { echo $this->session->flashdata('error'); } ?>
                                                    </div>

    												<div class="from-area">	

    													<form onsubmit="return validate(); " method="post" action="<?php echo base_url('website/verifyotp'); ?>">

    											 <div class="form-group">
									
												    <input type="text" name="otp" class="form-control" id="otp" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="OTP">
                                                     <p style="display: none;" id="loginotpError" class="text-danger" style="margin:5px;"></p>
												  </div> 				                   											
							 				  <button type="submit" class="btn btn-success">Verify</button>
												  <center>
                                                    <input type="hidden" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
                                                    <small  class="form-text text-muted">By registering, I agree to Cricket Manager's<a href="#"> T&C</a></small></center>

												</form>
												
												<div class="col-sm-12">
												    
												    <h6 style="text-align:right; color: #007bff !important;  cursor: pointer;" onclick="send_otp()"  class="form-text text-muted">Resend Otp</h6>
												    
												</div>

    												</div>
    												<!--FROM-AREA-->	
    											</div>
    											<!--SIHN-UP-CONTAINER-->	
    										</div>
    										<!--SCROLL-COL-->
	
    									</div>
    									<!--FIXED-COL-->	
    								</div>
    								<!--MATCH-LIST-SLIDER-END-->	
    							</div>
    							<!--COL-SM-12-END-->
                                <div class="col-sm-12 pzero">

                        <!--BOTTOM-BAR-NAV-START-->
                                <div class="bottom-nav-bar">
                                        <div class="bottom-menu-item">
                                    <a href="<?php echo base_url('website/registration'); ?>"> 
                                            <div class="icon-container">
                                                
                                                <i class="fas fa-home"></i>

                                            </div>
                                            <!--ICON-CONTAINER-->
                                            <div class="menu-nam">
                                                
                                                <span>Signup</span>

                                            </div>
                                            <!--ICON-CONTAINER-->
                                    </a>
                                    <a href="<?php echo base_url('website/otp'); ?>"> 
                        <div class="icon-container">
                          
                          <i class="fas fa-home"></i>

                        </div>
                        <!--ICON-CONTAINER-->
                        <div class="menu-nam">
                          
                          <span>Forget</span>

                        </div>
                        <!--ICON-CONTAINER-->
                    </a>
                                        </div>
                                        <!--BOTTOM-MENU-ITEEM-->    
                                    <!--NAV-ITEM-END-->

                    

                     
                      <!--BOTTOM-MENU-ITEEM-->  
                    <!--NAV-ITEM-END-->




                                </div>
                                <!--BOTTOM-BAR-NAV-END-->


                            </div>  
                            <!--COL-SM-12-END-->
                        <div>
                        <!--COL-SM-5-END--> 
                            
                        <div class="col-sm-7">
                            

                        </div>  
    						</div>
    						<!--COL-SM-12-->	

    						
    					<!--COL-SM-7-END-->	
    						
    				</div>
    				<!--ROW-END-->	
    		</div>
    		<!--END-COL-SM-12-->	
    </div>	
    <!--BODY-CONTAINER-FLUID-END-->
    

    
   <!-----------------------------------Body code end------------------------->

  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url('design/lib/bootstrap/js/bootstrap.min.js');?>"></script>    
  <script src="<?php echo base_url('design/lib/bootstrap/js/popper.min.js'); ?>"></script>
 <!-- JavaScript main.js -->
  <script src="<?php echo base_url('design/js/main.js'); ?>"></script>
</body>

</html>

<script type="text/javascript">
    function validate() {    
    var otp = $('#otp').val(); 
    var email = $('#mobile').val(); 
    if(otp == "")
    {
       $("#loginotpError").css("display", "block");
       $("#loginotpError").html('Please enter OTP.');
       return false;
    }  

    else
    {
         $.ajax({
            type : 'post',       
            url: SITE_URL+'website/verifyotp',
            data : { email : email,otp : otp },
            success : function(data) {
                var response = JSON.parse(data);
                if(response.status == '1')
                {
                    window.location.href = SITE_URL+"website/leagues";
                }
                else if(response.status == '2')
                {
                    $('#error_login_emailorPass').html('Invalid Email or Password').css("color", "#de4d3b"); 
                }

                else if(response.status == '3')
                {
                    $('#error_login_emailorPass').html('Please verify your otp').css("color", "#de4d3b"); 
                }

                else if(response.status == '4')
                {
                    $('#error_login_emailorPass').html('Invalid otp').css("color", "#de4d3b"); 
                }      
            }
        });
    } 

    
}

function send_otp()
    {
        var mobile = $('#mobile').val();
        $.ajax({
            type : 'post',       
            url: SITE_URL+'website/send_otp',
            data : { mobile : mobile},
            success : function(data) {
                var response = JSON.parse(data);
                if(response.status == '1')
                {
                    $('#success_msg').html('OTP Send on Registered Number'); 
                }

                else if(response.status == '2')
                {
                    $('#success_msg').html('Try Again') 
                }                   
            }
        });
    } 
</script>