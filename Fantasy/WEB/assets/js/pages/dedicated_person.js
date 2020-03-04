$(document).ready(function (e) {
  $("#form_add_person").on('submit', (function (e) {
    var validate=0;
    var $form = $(this);
      // check if the input is valid
      if(! $form.valid()) return false;
        $('#submit').attr('disabled','disabled');
            e.preventDefault();
            $.ajax
            ({
                url: SITE_URL+'/superadmin/dedicated_person/save_dedicated_person', // Url to which the request is send
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
                          $('#PersonName').val('');
                          $('#PersonNumber').val('');
                          //$('#title').val('');                      
                          
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

function assign_institute(DedicatedPersonId,InstituteId,i)
{
     $.post(SITE_URL+'/superadmin/dedicated_person/assign_institute',{
        InstituteId:InstituteId,DedicatedPersonId:DedicatedPersonId
    },function(responsedata,status){
      var response = JSON.parse(responsedata);
      //alert(response.status);
      if(response.status == '1')
          {
            alertify.alert('Successfully Assigned');
            $('#button'+i).css("background-color","#ef6776");
            $('#button'+i).prop(disabled,true);
          }
          else
          {   
            alertify.alert('Fail To Assigned');
          }
    });
}





