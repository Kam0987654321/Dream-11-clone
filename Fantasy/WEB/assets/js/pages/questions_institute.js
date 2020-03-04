  $(document).ready(function (e) {
     
      $("#form_get_filter_list").on('submit', (function (e) {
      $("#get_question_list").DataTable().destroy();
    var validate=0;
     

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    //var testId=$('#universal_TestId').val();
    $('#loader').modal('show');
    $.ajax({
            url: SITE_URL+'/questions/get_filter_questions_list', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {

                data = data.trim();
                $('#loader').modal('hide');
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      {
                          //$('#submit').removeAttr('disabled');
                         // alertify.alert(response.msg);
                          $('#get_filter_data').html(response.data);
                          $('#get_question_list').DataTable({
                          pageLength: 10,
                          responsive: true,
                          dom: '<"html5buttons"B>lTfgitp',
                          buttons: [
                              { extend: 'copy'},
                              {extend: 'csv'},
                              {extend: 'excel', title: 'ExampleFile'},
                              {extend: 'pdf', title: 'ExampleFile'},
                              {extend: 'print',
                              customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');
                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ],
  destroy: true

            }); 
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.data);
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





function get_subject_module_list(subjectid)
{
  $.post(SITE_URL+'/questions/get_subject_module_list',
  {
      subjectid:subjectid
  },
    function(responsedata,status){

      var response = JSON.parse(responsedata);    
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



function get_exam_master(catid){

  $.post(SITE_URL+'/questions/get_exam_master_by_examcategoryid',{
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

  $.post(SITE_URL+'/questions/get_practice_test_id'  ,{
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

  $.post(SITE_URL+'/questions/get_quiz_test_id'  ,{
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
  $.post(SITE_URL+'/questions/get_exam_test_by_examid',{
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

function get_exam_testseries(examid){
 // alert(examid);
  $.post(SITE_URL+'/student/get_exam_testseries',{
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

/*
    $("#form_add_subject_module").on('submit', (function (e) {
    
     $form=$('#form_add_subject_module');

    if(! $form.valid()) return false;

    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/institute_admin/questions/save_subject_module', // Url to which the request is send
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
                         
                          $('#SubjectModuleName').val('');
                          $('#SubjectId').val('');
                           alertify.alert(response.msg);
                           $('#SubjectModuleModal').hide();
                         
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                      }
                    } catch(e) {
                        //alertify.alert(e); // error in the above string (in this case, yes)!
                    }
                  }
            }
        });

    }));*/

        $("#form_edit_subject_module").on('submit', (function (e) {
    
     $form=$('#form_edit_subject_module');

    if(! $form.valid()) return false;
$('#loader').modal('show');
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/questions/edit_subject_module', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('#loader').modal('hide');
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

    }));
 

    $("#form_add_questions").on('submit', (function (e) 
    {
    var validate=0;

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    $form=$('#form_add_questions');

    if(! $form.valid()) return false;

if(validate==0){
    $('#loader').modal('show');
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/questions/save_questions', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('#loader').modal('hide');
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
                           $('#QuestionSolution').val('');
                           $('#QuestionImage').val('');
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
    $('#loader').modal('show');
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/questions/save_subject', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('#loader').modal('hide');
                data = data.trim();
                //alert(data);
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


       $("#form_edit_subject").on('submit', (function (e) {
     
    var validate=0;

if(validate==0){
    $('#loader').modal('show');
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
        
            url: SITE_URL+'/questions/edit_subject', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('#loader').modal('hide');
                data = data.trim();
                //alert(data);
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      {
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                          window.location.replace(SITE_URL+'/institute_admin/questions/subject_list');

                          //$('#SubjectName').val('');                         
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

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

$( "#excelupload" ).click(function() {
var valid = 0;
var waaskey = $("#csrfName").val();
var file_data = $("#excelfile").prop("files")[0];
var form_data = new FormData(); 
form_data.append("excelfile", file_data);
form_data.append("waaskey", waaskey);
var table_data = "";

if(valid==0)
{
    $('#loader').modal('show');
    $.ajax({
            url: SITE_URL+'/questions/UploadExcelRead', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('#loader').modal('hide');
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




$(document).ready(function (e) {
   

$("#form_add_practice_questions").on('submit', (function (e) {
    var validate=0;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/questions/save_practice_questions', // Url to which the request is send
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
            url: SITE_URL+'/institute_admin/practice/add_new_practice_questions', // Url to which the request is send
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
            url: SITE_URL+'/institute_admin/Quiz/add_new_quiz_questions', // Url to which the request is send
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
                         // alert('undone1');
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                         // alert('undone2');
                          alertify.alert(response.msg);
                      }
                    } catch(e) {
                     
                       alertify.alert(e);
                         // alert('undone3');

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
  $.post(SITE_URL+'/questions/get_questions_list_by_id'  ,{
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

CKEDITOR.replace( 'editor1', {
                    extraPlugins: "mathjax,simage",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height: 220,
                    removePlugins : 'image'
                } );


                if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                    document.getElementById( 'ie8-warning' ).className = 'tip alert';
                }

                 CKEDITOR.replace( 'editor2', {
                    extraPlugins: 'mathjax,simage',
                    removePlugins : 'image',
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height:220
                } );

                if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                    document.getElementById( 'ie8-warning' ).className = 'tip alert';
                }






function check_question_type(QuestionTypeId)
{ 
   
  $("#add_question_format").html('');  
  if(QuestionTypeId!='')
  {
    $.post(SITE_URL+'/questions/get_question_format',
    {      
      QuestionTypeId : QuestionTypeId
    },function(data,status)
    {     
                data = data.trim();
                  if(data) 
                  {
                    try {
                      var response = JSON.parse(data);                      
                      if(response.status == '1')
                      { 
                        $("#add_question_format").html(response.data);   
                        ckeditor();                                                                     
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
    alertify.alert("Please Reselect Question Type");
  }
}


function view_question(id)
{
   $("#view_question").html('');  
  
    $.post(SITE_URL+'/questions/view_question',
    {      
      id : id
    },function(data,status)
    {     
                data = data.trim();
                
                      if(data!='')
                      { 
                        $("#view_question").html(data);   
                        //ckeditor();                                       
                         $('#question_modal').modal('show');
                      }
                      else{
                        alertify.alert("ERROR");
                      }
                      
                  
    }); 
  
     
}

$("#form_edit_update_questions").on('submit', (function (e) 
    {
   
// alert('Sanjau');exit;

    var validate=0;

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    $form=$('#form_edit_update_questions');

    if(! $form.valid()) return false;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/questions/update_questions', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
              //alert(data);
                data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      {
                          //$('#submit').removeAttr('disabled');
                         alertify.alert(response.msg);
                        // window.location.replace("site_url('institute_admin/questions/questions_list');");
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

function check_question_type_edit(QuestionTypeId,question_id)
{ 
  //alert(question_id);
  $("#add_question_format").html('');  
  if(QuestionTypeId!='')
  {
    $.post(SITE_URL+'/institute_admin/questions/get_question_format_edit',
    {      
      QuestionTypeId : QuestionTypeId,question_id : question_id
     },function(data,status)
    {     
                data = data.trim();
                  if(data) 
                  {
                    try {
                      var response = JSON.parse(data);                      
                      if(response.status == '1')
                      { 
                        $("#add_question_format").html(response.data);   
                        ckeditor();                                                                     
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
    alertify.alert("Please Reselect Question Type");
  }
}



       
function ckeditor(){
    var path=BASE_URL+'uploads/';
  CKEDITOR.replace( 'editor1', { //image2,codesnippet,uploadimage,
                   extraPlugins: "mathjax,imageuploader",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                     codeSnippet_theme: 'monokai_sublime',
                    height: 300,
                     enterMode: CKEDITOR.ENTER_BR,
                    filebrowserImageUploadUrl : SITE_URL+'/questions/Ck_upload/upload_ck/?type=image&path='+path,
                    height: 220
                } );

                

                 CKEDITOR.replace( 'editor2', {
                    extraPlugins: "mathjax",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height: 120
                    
                } );

                 CKEDITOR.replace( 'editor3', {
                    extraPlugins: "mathjax",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height: 120
                    
                } );
                
                CKEDITOR.replace( 'editor4', {
                    extraPlugins: "mathjax",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height: 120
                    
                } );
                
                CKEDITOR.replace( 'editor5', {
                    extraPlugins: "mathjax",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height: 120
                    
                } );
                
                CKEDITOR.replace( 'editor6', {
                    extraPlugins: "mathjax",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height: 120
                    
                } );
                
                
                CKEDITOR.replace( 'editor7', {
                    extraPlugins: "mathjax",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height: 120
                    
                } );
               
                
                if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                    document.getElementById( 'ie8-warning' ).className = 'tip alert';
                }

                

  }


  

















