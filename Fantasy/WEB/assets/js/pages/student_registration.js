

$(document).ready(function (e) {
    $("#form_student_registration").on('submit', (function (e) {
    var validate=0;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
      var $form = $(this);

          // check if the input is valid
            if(! $form.valid()) return false;
    $.ajax({
            url: SITE_URL+'/institute_admin/student/add_student', // Url to which the request is send
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


function get_city_list(catid){


  $.post(SITE_URL+'/institute_admin/student/get_city_list',{
        catid:catid


    },function(responsedata,status){
      var response = JSON.parse(responsedata);
      if(response.status == '1')
          {
            $('#studentcity').html(response.data);
          }
          else
          {   
            $('#studentcity').html(response.data);
          }
    });
}




$( "#student_excelupload" ).click(function() {
var valid = 0;
var waaskey = $("#csrfName").val();
var file_data = $("#excelfile").prop("files")[0];
var form_data = new FormData(); 
form_data.append("excelfile", file_data);
form_data.append("waaskey", waaskey);
var table_data = "";

if(valid==0)
{
    $.ajax({
            url: SITE_URL+'/institute_admin/student/UploadExcelRead', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                data = data.trim();
                var response = JSON.parse(data);
                  if(response.status=='1')
                  {
                    $("#excelfile").val('');
                    alertify.alert('Students register successfully');
                  } 
                  else if (response.status=='3')
                  {
                    
                    alertify.alert(response.msg);
                  }
                  else
                  {
                      alertify.alert("Please upload data in proper format.");
                  }
            }
        });
  }

});