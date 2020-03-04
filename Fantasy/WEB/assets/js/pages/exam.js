$(document).ready(function (e) {
    $("#form_add_exam_category").on('submit', (function (e) {
    var validate=0;


    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    var $form = $(this);
          // check if the input is valid
            if(! $form.valid()) return false;
    $.ajax({
            url: SITE_URL+'/superadmin/exam/save_exam_category', // Url to which the request is send
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
                          $('#exam_category').val('');
                        
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
    $("#form_add_exam_master").on('submit', (function (e) {
    var validate=0;


    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    var $form = $(this);

          // check if the input is valid
            if(! $form.valid()) return false;
    $.ajax({
            url: SITE_URL+'/superadmin/exam/save_exam_master', // Url to which the request is send
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
                          $('#ExamCategoryId').val('');
                          $('#title').val('');
                          $('#icon').val('');
                          $('#description').val('');
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

function get_exam_master(catid){
 // alert(catid);
  $.post(SITE_URL+'/superadmin/questions/get_exam_master_by_examcategoryid',{
        catid:catid
    },function(responsedata,status){
      var response = JSON.parse(responsedata);
      //alert(response.status);
      if(response.status == '1')
          {
            $('#ExamMasterId').html(response.data);
          }
          else
          {   
            $('#ExamMasterId').html(response.data);
          }
    });
}

$(document).ready(function (e) {
    $("#form_add_exam_test").on('submit', (function (e) {
    var validate=0;


    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    var $form = $(this);

          // check if the input is valid
            if(! $form.valid()) return false;
    $.ajax({
            url: SITE_URL+'/superadmin/exam/save_exam_test', // Url to which the request is send
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
                          $('#ExamCategoryId').val('');
                           $('#ExamMasterId').val('');
                            $('#ExamInstructionsId').val('');
                            $('#title').val('');                        
                            $('#duration').val('');
                            $('#TotalQuestions').val('');                        
                            $('#TotalMarks').val('');
                             $('#DifficultyLevelId').val('');
                            $('#description').val('');
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
    $("#form_add_exam_instructions").on('submit', (function (e) {
    var validate=0;
   
    e.preventDefault();
    	var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
         $('#submit').attr('disabled','disabled');
    $.ajax({
            url: SITE_URL+'/superadmin/exam/save_exam_instructions', // Url to which the request is send
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
                           $('#instruction').text('');
                         
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
  
    $("#form_edit_exam_category").on('submit', (function (e) {
    var validate=0;   
    e.preventDefault();
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
        // $('#category').attr('disabled','disabled');
    $.ajax({
            url: SITE_URL+'/superadmin/exam/edit_exam_category', // Url to which the request is send
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
                         // $('#category').attr('enable','enable');
                          //$('#title').val('');
                          // $('#instruction').text('');
                         
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                         // $('#category').attr('enable','enable');
                      }
                    } catch(e) {
                     
                     //$('#category').attr('enable','enable');
                       alertify.alert(e); // error in the above string (in this case, yes)!
                    }
                  }
            }
        });
// validation ends here 
    }));
});

$(document).ready(function (e) {
    $("#form_edit_exam_master").on('submit', (function (e) {
    var validate=0;   
    e.preventDefault();
      var $form = $(this);
        // check if the input is valid
        if(! $form.valid()) return false;
       //  $('#master').attr('disabled','disabled');
    $.ajax({
            url: SITE_URL+'/superadmin/exam/edit_exam_master', // Url to which the request is send
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
});

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
            url: SITE_URL+'/superadmin/exam/edit_exam_instructions', // Url to which the request is send
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
});