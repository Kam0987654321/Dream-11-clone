$(document).ready(function (e) {
    $("#forgetpasswordform").on('submit', (function (e) {
    var validate=0;

 /*  
    var ContactEmail = $('#ContactEmail').val();
    if ($.trim(ContactEmail)!='' && validate==0) {
        if (!valid_emailid.test(ContactEmail)  && validate==0) {
	    	$('#ContactEmail').focus();
	        alertify.alert('Please enter Contact Email properly.');
	        var validate=1;
    	}
    }
*/
   

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/institute/forget_password_email_check', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                data = data.trim();
                  if(data) {
                    try {
                       var response = JSON.parse(data);
                      if(response.status == 'success')
                      {
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                          //window.location.href=SITE_URL+'/stockist/retailer_list';
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                      }
                    } catch(e) {
                        alertify.alert(e); // error in the above string (in this case, yes)!
                    }
                  }
            }
        });
} // validation ends here 

    }));
});


function check_password()
{
	var password=$('#password').val();
	var newpassword=$('#newpassword').val();
	if( password == newpassword)
	{
		$('#spanerror').text('');
	}
	else
	{
		$('#spanerror').text('Password Mismatch');
	}
}

$(document).ready(function (e) {
    $("#resetpasswordform").on('submit', (function (e) {
    var validate=0;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/institute/change_password', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                data = data.trim();
                  if(data) {
                    try {
                       var response = JSON.parse(data);
                      if(response.status == 'success')
                      {
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                          //window.location.href=SITE_URL+'/stockist/retailer_list';
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                      }
                    } catch(e) {
                        alertify.alert(e); // error in the above string (in this case, yes)!
                    }
                  }
            }
        });
} // validation ends here 

    }));
});