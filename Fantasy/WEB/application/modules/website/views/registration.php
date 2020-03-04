
    	
    <div class="container-fluid main-bg-img" style="background-image: url(<?php echo base_url('design/img/background/main_bg_img.jpg') ?>);">	

    		<div class="col-sm-12 pzero">

    				<div class="row">	

    					<div class="col-sm-5 pzero">

    						<div class="col-sm-12 pzero">

    							<div class="top-header sticky-top">

    								<div class="site-title">

    									<h5>UAB LEAGUE</h5>	

    								</div>	
    								<!--END-SITE-TITLE-->	
    								<!-- <div class="short-nav-bar">

    									<div class="row">

    									  <div class="col-sm-4 col-4"><a href="">FIXTURE</div>
		                                  <div class="col-sm-4 col-4"><a href="">LIVE</a></div>
		                                  <div class="col-sm-4 col-4"><a href="">RESULT</a></div>

    									</div>
    									

    								</div> -->
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

    												<div class="from-area">	

    													<form method="post" action="<?php echo base_url('website/reg'); ?>" onsubmit="return registration(); "  >

<!--    											 <div class="form-group">
                                    
                                                    <input type="text"  name="code"  class="form-control" id="code" onblur="check_referral_code(this.value)" placeholder="Refral Code">
                                                    <p style="display: none;" id="regcodeErr" class="text-danger" style="margin:5px;"></p>
                                                  </div>-->
                                                 <div class="form-group">

												    <input type="text" maxlength="10" class="form-control" name="mobile" id="mobile" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="check_mobile(this.value)" placeholder="Mobile No.">
                                                    <p style="display: none;" id="regmobileErr" class="text-danger" style="margin:5px;"></p>
												  </div>		
												  <div class="form-group">
												    <input type="email" onblur="check_email(this.value)" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                                    <p style="display: none;" id="regEmailErr" class="text-danger" style="margin:5px;"></p>
												   <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
												  </div>


												  <div class="form-group">
									
												    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                                    <p style="display: none;" id="signuppasswordError" class="text-danger" style="margin:5px;"></p>
												  </div>
											
												  <button type="submit" class="btn btn-success" style="color: #fff">Signup</button>
												  <center><small  class="form-text text-muted">By registering, I agree to UBA League  T&C</small></center>
												</form>

    												</div>
    												<!--FROM-AREA-->
    										<div class="row">
												<div class="col-sm-6">    
                                                										    
												</div>    
												<div class="col-sm-6">
												  <h6 style="text-align:right;"><a  href="<?php echo base_url('website/login'); ?>">Login</a></h6>	
												</div>
												<!--ROW-END-->
												</div>
												<!--COL-SM-12-->
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
    						</div>
    						<!--COL-SM-12-->	

    
    					<div>
    					<!--COL-SM-5-END-->	
    						
    					<div class="col-sm-7">
    						

    					</div>	
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

<!--   <script src="<?php //echo base_url('design/lib/jquery/jquery.min.js'); ?>"></script> -->
  <script src="<?php echo base_url('design/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('design/lib/bootstrap/js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('design/js/main.js'); ?>"></script>
</body>

</html>


<script type="text/javascript">
    function check_email($value)
    {
        var email = $value; 

        var email_ckeck = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if(email == "")
        {
           $("#regEmailErr").css("display", "block");
           $("#regEmailErr").html('Please enter email.');
           return false;
        }

        else if(!email_ckeck.test( email ))
        {
           $("#regEmailErr").css("display", "block");
           $("#regEmailErr").html('That s not a valid Email ID. ');
            return false;
        }
        else
        {
            var value = $value;
            $.ajax({
                type : 'post',       
                url: SITE_URL+'website/check_email',
                data : { value : value},
                success : function(data) {
                    var response = JSON.parse(data);
                    if(response.status == '2')
                    {                   
                        $('#regEmailErr').html('Email already exist').css("color", "#de4d3b"); 
                        $("#regEmailErr").css("display", "block");
                    }
                    else if(response.status == '1')
                    {                   
                        $('#regEmailErr').html(''); 
                        $("#regEmailErr").css("display", "none");
                    }                       
                }
            });
        }    

        
    }

    function check_mobile($value)
    {   
        if($value =="")
        {
            $('#regmobileErr').html('Please enter Mobile number.').css("color", "#de4d3b"); 
            $("#regmobileErr").css("display", "block");
            return false;
        }   
        else
        {
            var value = $value;
            $.ajax({
                type : 'post',       
                url: SITE_URL+'website/check_mobile',
                data : { value : value},
                success : function(data) {
                    var response = JSON.parse(data);
                    if(response.status == '2')
                    {                    
                        $('#regmobileErr').html('Mobile number already exist').css("color", "#de4d3b"); 
                        $("#regmobileErr").css("display", "block");
                    }
                    else if(response.status == '1')
                    {                    
                        $('#regmobileErr').html(''); 
                        $("#regmobileErr").css("display", "none");
                    }     
                }
            });
        } 
        
    }


    function check_referral_code($value)
    {         
        var value = $value;
         $.ajax({
            type : 'post',       
            url: SITE_URL+'website/check_referral_code',
            data : { value : value },
            success : function(data) {
                var response = JSON.parse(data);
                if(response.status == '2')
                {
                    $('#regcodeErr').html('Not valid Referral code ').css("color", "#de4d3b"); 
                    $("#regcodeErr").css("display", "block");                    
                }   
                else if(response.status == '1')
                {
                    $('#regcodeErr').html(''); 
                    $("#regcodeErr").css("display", "none");                    
                }   
            }
        });
    }


    function isNumber(evt)
    {
       evt = (evt) ? evt : window.event;
       var charCode = (evt.which) ? evt.which : evt.keyCode;
       if (charCode > 32 && (charCode < 48 || charCode > 57)) {
          return false;
        }
        return true;
    }

    function registration()
    {       
    
        var code = $('#code').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var password = $('#password').val();
        if(mobile =="")
        {
            $('#regmobileErr').html('Please enter Mobile number.').css("color", "#de4d3b"); 
            $("#regmobileErr").css("display", "block");
            return false;
        }
        if(email == "")
        {
           $("#regEmailErr").css("display", "block");
           $("#regEmailErr").html('Please enter email.');
           return false;
        }

        
        if(password == "")
        {
           $("#signuppasswordError").css("display", "block");
           $("#signuppasswordError").html('Enter a password.');
            return false;
        }
                                                   
                                                  
                                                 
                                                 
        
    }
</script>