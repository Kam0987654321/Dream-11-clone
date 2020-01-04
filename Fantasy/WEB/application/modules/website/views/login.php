
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
    							


    							<div class="col-sm-12 pzero">
    									
    								<div class="match-list-slider">	

    									<div class="fixed-col">
    										
    										<div id="style-15" class="scroll-col style-15">

    											<div class="sign-up-container">

    												<div class="social-sign-up-btns">	

    													<div class="social-btn">

    														<a href=""><span><i class="fab fa-facebook-f"></i><b>Facebook</b></span></a>

    													</div>
    													<!--FACEBOOK-BTN-END-->	

    													<div class="social-btn">

    														<a href=""><span><i class="fab fa-google-plus-g"></i><b>Google</b></span></a>

    													</div>
    													<!--FACEBOOK-BTN-END-->	
    												</div>
    												<!--SOCIAL-SIGN-UP-BTN-END-->	

    												<div class="or-divder">
    													OR
    												</div>
    												<!--OR-DIVDER--END-->	

    												<div class="from-area">	

    													<form onsubmit="return validate(); " method="post" action="<?php echo base_url('website/login_post'); ?>">

    											 <div class="form-group">
									
												    <input type="text" name="email" class="form-control" id="LoginFormEmail" placeholder="Mobile No. OR Email">
                                                     <p style="display: none;" id="loginemailError" class="text-danger" style="margin:5px;">Incorrect Email</p>
												  </div>
												  
    									       	
    						
    						                    <div class="form-group">
									
												    <input type="password"  name="password"class="form-control" id="LoginFormPassword" placeholder="Password">
                                                    <p style="display: none;" id="loginpasswordError" class="text-danger" style="margin:5px;">Incorrect Password</p>

												 </div>
											
							 				  <button type="submit" class="btn btn-success">Login</button>
												  <center><small  class="form-text text-muted">By registering, I agree to UAB League<a href="#"> T&C</a></small></center>
												</form>
												
												<div class="row">
												<div class="col-sm-6">    
                                                    <h6 style="text-align:left;"><a  href="<?php echo base_url('website/registration'); ?>">Signup</a></h6>											    
												</div>    
												<div class="col-sm-6">
												    <!-- Button trigger modal -->
												 <h6 style="text-align:right;"> <a style="text-align:right;"  href="#" data-toggle="modal" data-target="#exampleModal"><!--Forget Password--></a></h6>
												
												    <!-- FORGET-PASSWORD-->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Forget</h5>
                                                        
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                                              </div>
                                                              <input type="text" class="form-control" placeholder="Username" aria-label="Email" aria-describedby="basic-addon1">
                                                            </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Resand Link</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
												    
												</div>
												<!--ROW-END-->
												</div>
												<!--COL-SM-12-->

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
  <script src="<?php echo base_url('design/lib/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('design/lib/bootstrap/js/bootstrap.min.js');?>"></script>    
  <script src="<?php echo base_url('design/lib/bootstrap/js/popper.min.js'); ?>"></script>

  
  
  
  <script>
      

  </script>
    

 <!-- JavaScript main.js -->
  <script src="<?php echo base_url('design/js/main.js'); ?>"></script>
</body>

</html>

<script type="text/javascript">
    function validate() {    
    var email = $('#LoginFormEmail').val(); 
   // var otp = $('#otp').val(); 
    // var email_ckeck = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if(email == "")
    {
       $("#loginemailError").css("display", "block");
       $("#loginemailError").html('Please enter email or mobile number.');
       return false;
    }

    else if(email != "")
    {
       $("#loginemailError").css("display", "none");
       $("#loginemailError").html('');
      
    }

    // else if(!email_ckeck.test( email ))
    // {
    //    $("#loginemailError").css("display", "block");
    //    $("#loginemailError").html('That s not a valid Email ID. ');
    //     return false;
    // }
    
    var password = $('#LoginFormPassword').val();   

    if(password == "")
    {
       $("#loginpasswordError").css("display", "block");
       $("#loginpasswordError").html('Enter a password.');
        return false;
    }

    if(password != "")
    {
       $("#loginpasswordError").css("display", "none");
       $("#loginpasswordError").html('');
        
    }

    else
    {
         $.ajax({
            type : 'post',       
            url: SITE_URL+'website/login_post',
            data : { email : email, password : password,otp : otp },
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

    
};
</script>