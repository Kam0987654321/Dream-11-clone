   
// (function() {
//      function IDGenerator(len) {
     
//          this.length = len;
//          this.timestamp = +new Date;
         
//          var _getRandomInt = function( min, max ) {
//             return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
//          }
         
//          this.generate = function() {
//              var ts = this.timestamp.toString();
//              var parts = ts.split( "" ).reverse();
//              var id = "";
             
//              for( var i = 0; i < this.length; ++i ) {
//                 var index = _getRandomInt( 0, parts.length - 1 );
//                 id += parts[index];  
//              }
             
//              return id;
//          }

         
//      }
     
     
//      document.addEventListener( "DOMContentLoaded", function() {
//         var btn = document.querySelector( "#generate" ),
//             output = document.querySelector( "#output" );
            
//         btn.addEventListener( "click", function() {
//             var generator = new IDGenerator(8);
//             output.innerHTML = generator.generate();
//              var unique_id=output.innerHTML;
//              $('#unique_id').val('XMHL'+unique_id);
            
//             // var generator = new IDGenerator(6);
//             // output.innerHTML = generator.generate();
//             //  var password=output.innerHTML;
//             //  $('#Applicantpassword').val(password);
//             myFunctionRegistration();
             
//         }, false); 
         
//      });
     
     
//  })();

function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}


function check_url_exist(url)
{
  if(url!=''){
 $.post( SITE_URL+"superadmin/institute/check_website_url_exist", 
      { url:url })
        .done(function( data ) {
          data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      {
                          $('#checkurl').text( response.msg ); 
                          $('#checkurl').css('color', 'green');
                       }
                      else
                      {   
                          $('#InstituteWebsiteUrl').val('');
                          $('#checkurl').text( response.msg ); 
                          $('#checkurl').css('color', 'red');
                      } 
                   } catch(e) {
                       
                    }

                  }         
        });
      }
}

function check_email_exist(email)
{

  if(email!=''){
 $.post( SITE_URL+"superadmin/institute/check_email_exist", 
      { email:email })
        .done(function( data ) {
          data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      {
                          $('#checkemail').text( response.msg ); 
                          $('#checkemail').css('color', 'green');
                       }
                      else
                      {   
                          $('#InstituteEmail').val('');
                          $('#checkemail').text( response.msg ); 
                          $('#checkemail').css('color', 'red');
                      } 
                   } catch(e) {
                       
                    }

                  }         
        });
      }
}

function check_phone_exist(phone)
{

  if(phone!=''){

 $.post( SITE_URL+"superadmin/institute/check_phone_exist", 
      { phone:phone })
        .done(function( data ) {
          data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      {
                          $('#checkphone').text( response.msg ); 
                          $('#checkphone').css('color', 'green');
                       }
                      else
                      {   
                          $('#InstituteMobileNo').val('');
                          $('#checkphone').text( response.msg ); 
                          $('#checkphone').css('color', 'red');
                      } 
                   } catch(e) {
                       
                    }

                  }         
        });
      }
}

function myFunction(sid) {
        $.post( "sponsor_name_fetch.php", { unique_id:sid })
        .done(function( data ) {
            $('#sponsor_name').val( data ); 
        });
}

$(document).ready(function (e) {
	
    $("#form_institute_registration").on('submit', (function (e) {
    var validate=0;

 e.preventDefault();
 var $form = $(this);
          // check if the input is valid
            if(! $form.valid()) return false;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/superadmin/institute/add_institute', // Url to which the request is send
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
                      if(response.status == '1')
                      {
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
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
