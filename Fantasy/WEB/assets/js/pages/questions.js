function get_exam_master(catid){

  $.post(SITE_URL+'/superadmin/questions/get_exam_master_by_examcategoryid',{
        catid:catid


    },function(responsedata,status){
      var response = JSON.parse(responsedata);
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

function  get_practice_test(catid){


  // var ExamMasterId = $('#examoption[value="' + $('#examId').val() + '"]').data('id');
  var ExamMasterId = catid;

  $.post(SITE_URL+'/superadmin/questions/get_practice_test_id'  ,{
    catid:catid
        
    },function(responsedata,status){
      var response = JSON.parse(responsedata);
      if(response.status == '1')
          {
            $('#title_id').html(response.data);
          }
          else
          {   
            $('#title_id').html(response.data);
          }
    });
}


function  get_quiz_test(catid){

  var ExamMasterId = catid;

  $.post(SITE_URL+'/superadmin/questions/get_quiz_test_id'  ,{
    catid:catid
        
    },function(responsedata,status){
      var response = JSON.parse(responsedata);
      if(response.status == '1')
          {
            $('#quiz_test_id').html(response.data);
          }
          else
          {   
            $('#quiz_test_id').html(response.data);
          }
    });
}


function get_exam_test(examid){
  $.post(SITE_URL+'/superadmin/questions/get_exam_test_by_examid',{
        examid:examid
    },function(responsedata,status){
      var response = JSON.parse(responsedata);
      if(response.status == '1')
          {
            $('#ExamTestId').html(response.data);
          }
          else
          {   
            $('#ExamTestId').html(response.data);
          }
    });
}


$(document).ready(function (e) {
    $("#form_add_questions").on('submit', (function (e) {
    var validate=0;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/superadmin/questions/save_questions', // Url to which the request is send
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
                          $('#QuestionText').val('');
                          $('#AnswerOption1').val('');
                          $('#AnswerOption2').val('');
                          $('#AnswerOption3').val('');
                          $('#AnswerOption4').val('');
                          $('#AnswerOption5').val('');
                          $('#QuestionCorrectAnswerId').val('');
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

     $("#form_add_subject").on('submit', (function (e) {
     
    var validate=0;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/superadmin/questions/save_subject', // Url to which the request is send
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
                          $('#SubjectName').val('');                         
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




$( "#excelupload" ).click(function() {

var ExamCategoryId = $("#ExamCategoryId").val();
var ExamMasterId = $("#ExamMasterId").val();
var ExamTestId  = $("#ExamTestId").val();
var valid = 0;

if($.trim(ExamCategoryId)=='' && valid == 0){
  alert('Please select exam category');
  valid=1;
  return false;
}


if($.trim(ExamMasterId)=='' && valid == 0){
  alert('Please select exam ');
  valid=1;
  return false;
}


if($.trim(ExamTestId)=='' && valid == 0){
  alert('Please select exam test');
  valid=1;
  return false;
}
var waaskey = $("#csrfName").val();
var file_data = $("#excelfile").prop("files")[0];
var form_data = new FormData(); 
form_data.append("excelfile", file_data);
form_data.append("waaskey", waaskey);
form_data.append("ExamCategoryId", ExamCategoryId);
form_data.append("ExamMasterId", ExamMasterId);
form_data.append("ExamTestId", ExamTestId);

var table_data = "";

if(valid==0)
{
    $.ajax({
            url: SITE_URL+'/superadmin/questions/UploadExcelRead', // Url to which the request is send
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
                    alert("Questions uploaded successfully.");
                  
                  }else
                  {
                      alert("Please upload data in proper format.");
                  }
            }
        });
  }

});


function get_subject_module_list(subjectid)
{
  $.post(SITE_URL+'/superadmin/questions/get_subject_module_list',
  {
      subjectid:subjectid
  },
    function(responsedata,status){

      var response = JSON.parse(responsedata); 
      
      alert(responsedata);
      if(response.status == '1')
          {
            $('#SubjectModuleId').html(response.data);
          }
          else
          {   
            $('#SubjectModuleId').html(response.data);
          }
    });
}

$(document).ready(function (e) {
   /* $("#form_add_subject_module").on('submit', (function (e) {
    
     $form=$('#form_add_subject_module');

    if(! $form.valid()) return false;

    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/superadmin/questions/save_subject_module', // Url to which the request is send
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
                          $('#SubjectModuleName').val('');
                          $('#SubjectId').val('');
                         
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
        });*/

    });

$("#form_add_practice_questions").on('submit', (function (e) {
    var validate=0;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/superadmin/questions/save_practice_questions', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)
            // A function to be called if request succeeds
            {
                data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      {
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                          $('#QuestionText').val('');
                          $('#AnswerOption1').val('');
                          $('#AnswerOption2').val('');
                          $('#AnswerOption3').val('');
                          $('#AnswerOption4').val('');
                          $('#AnswerOption5').val('');
                          $('#QuestionCorrectAnswerId').val('');
                           $('#AnswerDescription').val('');
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



$(document).ready(function (e) {
    $("#add_new_practice").on('submit', (function (e) {
  var validate=0;
      if(validate==0){
      $('#submit').attr('disabled','disabled');
        e.preventDefault();
        $.ajax({
            url: SITE_URL+'/superadmin/practice/add_new_practice_questions', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                data = data.trim();
                alertify.alert('your  data  save  successfully');
                // window.location.replace(SITE_URL+'/superadmin/practice/practice_test_list
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      console.log(response);
                      if(response.status == '1') {
                          alertify.alert(response.msg);
                          $('#ExamCategoryId').val('');
                          $('#ExamMasterId').val('');
                          $('#title').val('');
                          $('#Tags').val('');
                          $('#duration').val('');
                          $('#description').text('');
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



$(document).ready(function (e) {
    $("#add_new_quiz").on('submit', (function (e) {

      
  var validate=0;
      if(validate==0){
      $('#submit').attr('disabled','disabled');
        e.preventDefault();
        $.ajax({
            url: SITE_URL+'/superadmin/Quiz/add_new_quiz_questions', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                data = data.trim();
                // alert('HELLO');
                alertify.alert('your  data  save  successfully');
                window.location.replace(SITE_URL+'/superadmin/practice/practice_test_list');


                  if(data) {
                alert('HELLO2');

                    try {
                      var response = JSON.parse(data);
                      
                      if(response.status == '1') {
                          alertify.alert(response.msg);
                          $('#ExamCategoryId').val('');
                          $('#ExamMasterId').val('');
                          $('#title').val('');
                          $('#Tags').val('');
                          $('#duration').val('');
                          $('#description').text('');
                          alert('undone1');
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                          alert('undone2');
                          alertify.alert(response.msg);
                      }
                    } catch(e) {
                     
                       alertify.alert(e);
                          alert('undone3');

                        // error in the above string (in this case, yes)!
                    }
                  }
            }
        });
} // validation ends here 

    }));
});



function  get_exam_questions(catid){


  // var ExamMasterId = $('#examoption[value="' + $('#examId').val() + '"]').data('id');
  var ExamMasterId = catid;
  

  $.post(SITE_URL+'/superadmin/questions/get_questions_list_by_id'  ,{
    catid:catid
        
    },function(responsedata,status){
      var response = JSON.parse(responsedata);

      if(response.status == '1')
          {
            $('#table_data').html(response.data);
          }
          else
          {   
            $('#table_data').html(response.data);
          }
    });
}












