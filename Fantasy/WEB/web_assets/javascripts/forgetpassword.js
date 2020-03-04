$(document).ready(function(){
	

	$("#send_forgot").click(function (e){
		var email = $('#email').val();

	if(email == "")
	{
		$('#for_email_error').html('Email required');
	}
	else
	{
		$.ajax({
			data : $("#forgetpassword").serialize(),
			type : "post",
			url: site_url + 'website/checkmail',
			success : function(data){
				console.log(data);
					if(data) {
					try {
                      var response = JSON.parse(data);                    
                      if(response.status == '1')
                      {     
                      	$('#for_email_success').html('Link send on mail please checkmail');
                      	$('#for_email_error').html('');
                      	$('#email').val('');

                      	setTimeout(function() {
                    		$("#for_close").trigger("click");
                    }, 3000);
                      	

                      	//alert(response.msg);         
                         // alert(response.msg);
                          // window.location = site_url +'website/login';
                       } else {

                       	$('#for_email_success').html('Please Try again');
                       	$('#for_email_error').html('');
	                      	// alert(response.msg);
	                      }  
                    } catch(e) {
                     
                        alert("Something wrong"); // error in the above string (in this case, yes)!
    
                    }
                  }   
				
			} 
		})
	}	
		
	})

});