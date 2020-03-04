<style type="text/css">/*	@media (max-width:992px)
{
.col-lg-12 {
    position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    margin-left: -19px;
}}
	@media (min-width:768px)
{
.col-lg-12 {
    position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    margin-left: 0px;
    text-align: center;
}}
@media (max-width:768px){
	.page-head {
		margin-left: 318px;
	}

	.page-head {
    margin-left: 180px;

	}

	.row {
    margin-left: -120px;
    margin-top: 134px;
	margin-bottom:50px;


	}
}
*/

@media (max-width: 768px){
	.row {
	    margin-left: 0px!important;
	     margin-top: 120px!important; 
	     margin-bottom: 120px!important; 
	}
}

@media (max-width: 767px){
	.row {
	    margin-left: 0px!important;
	    margin-top: 120px!important;
	}
}

@media (max-width: 1024px){
	.row {
	    margin: 0px!important;
	    margin-left: 0px!important;
	    margin-top:120px!important;
	    margin-bottom:50px!important;
	}
}

.error {
    color: red;
    float: left;
    font-size: 14px;
    margin: 10px;
}
</style>

<!-------
<div class="section-pad wid-bg">


	<div class="container" style="padding-top:10px">

	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-head text-center" style="color: #00bcac">Contact Us</h1>
			</div>
		</div>

		<div class="row">
		<div class="col-sm-12">

		

			
			<div class="col-sm-6"></div>
				

				 <div class="col-sm-6" 
				 style="margin-top: -99px; margin-left: 274px;">
				 <div class="white-box">

				 

				<form   action="#" method="post"  id="contact_form">

				<input type="hidden" name="_token" value="3a3m3DkkGZmgXXVVQA25picdNpbV6lSYgo1xfFsc">
					 



					



					<div class="form-group">
						<input  name="name" required placeholder="Name" class="form-control"  type="text" placeholder="Name">
					</div>

---------------->

					<!-- Text input-->



					<!-- Text input-->
<!----------
						   <div class="form-group">

					 

						

					  <input name="email" required placeholder="E-Mail Address" class="form-control"  type="email" placeholder="Email">

					 
					</div>



---------->

					<!-- Text input-->

						  <!------------ 

					<div class="form-group">

					 
							

					  <input name="mobile_no"  placeholder="Mobile Number" class="form-control" type="text" pattern="^[789]\d{9}$" required placeholder="Mobile Number">

					 

					</div>

					

					<div class="form-group">

					 
                        
						
							<textarea class="form-control" required name="message" placeholder="Message"></textarea>

					 

					</div>

					<!-- Button -->
<!----------------
					<div class="form-group">

					 

					 <button type="submit" class="btn btn-primary" 
					 style="margin: 10px; font-size: 25px;">  Submit </button>

					  
					</div>



				 

					</form>

					

				</div>
				</div>
				</div>

		

			

			

			<div class="col-sm-6">

		

			

		

		

			</div>	

		

		

		</div>		

		

		

	</div>

     

</div>
--------->
    <!--//page_container-->


<div class="container-fluid" style="overflow-y: hidden;">

	<div class="col-sm-12">

		<div class="row" style="margin-bottom:100px;">

			<div class="col-sm-3 col-xs-12"></div>
			
			<div class="col-sm-6 col-xs-12" style="background:#f37e7e; border-radius:10px; box-shadow: 0px 3px 5px -2px rgba(112,94,112,1);">

				<p><h4 style="margin:8px; color:#fff;"><b>Contact Us<b></h4>
					<span id="success_msg" style="color: #fff;"></span>
				</p>
					<form action="">
					  <div class="form-group">
					    
					    <input type="text" required="required"  class="form-control" id="name" placeholder="Your Name">
					    <span class="error" id="name_err"></span>
					  </div>
					 
					 
					 
					  <div class="form-group">
					    
					    <input type="email" required="required" class="form-control" id="email" placeholder="Email@example.com">
					    <span class="error" id="email_err"></span>
					  </div>

					  <div class="form-group">
					    
					    <input type="number" required="required" class="form-control" id="mobile" placeholder="Phone Number">
					    <span class="error" id="mobile_err"></span>
					  </div>
					  
					  
					  <div class="form-group">
					    
					    <textarea id="message" required="required" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Massage"></textarea>
					    <span class="error" id="message_err"></span>
					  </div>
					 <button style="margin:15px;" type="button" class="btn btn-primary">Submit</button>
					 <!--  <button style="margin:15px;" onclick="contact_form();" type="button" class="btn btn-primary">Submit</button> -->
					</form>
			</div>
			
			<div class="col-sm-3 col-xs-12	" ></div>


		</div>

	</div>

</div>

<script type="text/javascript">
	var SITE_URL = "<?php echo base_url(''); ?>";
</script>
    <!-- <script type="text/javascript">
    	
    	function contact_form()
    {       
    
        var name = $('#name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var message = $('#message').val();
        if(name =="")
        {
        	$('#name_err').html('Name required');
        	return false;
        }
        else if(email =="")
        {
        	$('#email_err').html('Email required');
        	return false;
        }
        else if(name =="")
        {
        	$('#name_err').html('Name required');
        	return false;
        }
        else if(message =="")
        {
        	$('#message_err').html('Message required');
        	return false;
        }
        
        
        else(name !="" && email !="" && mobile !="" && message!="")
        {
        	$.ajax({
            type : 'post',       
            url: SITE_URL+'website/contact_form',
            data : { name:name, message:message ,email:email , mobile:mobile},
            success : function(data) {
                var response = JSON.parse(data);
                if(response.status == '1')
                {
                   $('#success_msg').html(response.msg).css("color", "#de4d3b"); 
                    setTimeout(function() {
                     window.location.reload();
                    }, 2000);
                }
                else
                {
                	$('#success_msg').html(response.msg); 
                }	
                 
                          
            }
        });
        }	
    }
    </script> -->