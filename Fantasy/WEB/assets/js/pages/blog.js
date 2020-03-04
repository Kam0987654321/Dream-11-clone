$(document).ready(function (e) {
    $("#form_add_blogs").on('submit', (function (e) {
    var validate=0;   
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    e.preventDefault();
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
       
    $.ajax({
            url: SITE_URL+'/superadmin/blog/save_blog', // Url to which the request is send
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
                          $('#BlogHeading').val('');
                          $('#BlogPostedBy').val('');
                          $('#BlogImage').val('');
                          $('#BlogPostedOn').val('');
                          $('#editor1').val('');                         
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

function readURL(input) 
{
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blogimg')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    

$(document).ready(function (e) {
    $("#form_update_blog").on('submit', (function (e) {
    var validate=0;   
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    e.preventDefault();
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
       
    $.ajax({
            url: SITE_URL+'/superadmin/blog/update_blog', // Url to which the request is send
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


$(document).ready(function (e) {
    $("#form_add_blog_category").on('submit', (function (e) {
    var validate=0;   
   
    e.preventDefault();
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
       
    $.ajax({
            url: SITE_URL+'/superadmin/blog/save_blog_category', // Url to which the request is send
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

$(document).ready(function (e) {
    $("#form_update_blog_category").on('submit', (function (e) {
    var validate=0;   
   
    e.preventDefault();
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
       
    $.ajax({
            url: SITE_URL+'/superadmin/blog/update_blog_category', // Url to which the request is send
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
    
    
function delete_blog(id)
{
if(id!=='')  
{
    $.post(SITE_URL+'/superadmin/blog/delete_blog',
    {      
      id : id
    },function(data,status)
    {     
                data = data.trim();
                  if(data) 
                  {
                    try {
                      var response = JSON.parse(data);                      
                      if(response.status == '1')
                      { 
                          alertify.alert(response.msg);
                       // $("#add_question_format").html(response.data);   
                       // ckeditor();                                                                     
                      }
                      else{
                        alertify.alert(response.msg);
                      }
                      
                    } catch(e) {
                       //alertify.alert(response.msg); 
                    }
                  }
    }); 
  }
  else
  {
    alertify.alert("Id not Found");
  }
}
    