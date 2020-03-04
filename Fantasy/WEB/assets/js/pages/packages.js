
$(document).ready(function (e) {


    $("#form_add_packages").on('submit', (function (e) {
    var validate=0;
 	e.preventDefault();
 	var $form = $(this);

          // check if the input is valid
            if(! $form.valid()) return false;
    $('#submit').attr('disabled','disabled');   
    $.ajax({
            url: SITE_URL+'/superadmin/packages/save_packages', // Url to which the request is send
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
                          $("#PackageName").val('');
                          $("#NumberOfStudents").val('');
                          $("#PackageDuration").val('');
                          $("#PackagePrice").val('');
                          $("#NumberOfExams").val('');
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
 // validation ends here 

    }));
});

$(document).ready(function (e) {
    $("#form_edit_packages").on('submit', (function (e) {
    var validate=0;   
    e.preventDefault();
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
       //  $('#master').attr('disabled','disabled');
    $.ajax({
            url: SITE_URL+'/superadmin/packages/edit_packages', // Url to which the request is send
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
                          //$('#title').val('');
                          // $('#instruction').text('');
                         // $('#master').attr('enable','enable');
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                      }
                    } catch(e) 
                    {                     
                       alertify.alert(e); // error in the above string (in this case, yes)!
                    }
                  }
            }
        });
// validation ends here 
    }));
});
