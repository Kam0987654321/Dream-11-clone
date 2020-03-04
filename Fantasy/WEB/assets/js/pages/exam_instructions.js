
$(document).ready(function (e) {
   
    $("#form_edit_exam_instructions").on('submit', (function (e) {
      
    var validate=0;   
    e.preventDefault();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
       //  $('#master').attr('disabled','disabled');
    $.ajax({
            url: SITE_URL+'/institute_admin/exam/edit_exam_instructions', // Url to which the request is send
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
                    } catch(e) {
                     
                       alertify.alert(e); // error in the above string (in this case, yes)!
                    }
                  }
            }
        });
// validation ends here 
    }));
     $("#form_add_exam_instructions").on('submit', (function (e) {
      
    var validate=0;   
    e.preventDefault();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
       //  $('#master').attr('disabled','disabled');
    $.ajax({
            url: SITE_URL+'/institute_admin/exam/save_exam_instructions', // Url to which the request is send
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
                          $('#title').val('');
                           $('#instruction').val('');
                         // $('#master').attr('enable','enable');
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