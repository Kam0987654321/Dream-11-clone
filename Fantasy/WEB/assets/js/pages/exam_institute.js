var QuestionIdForImage=[];
      function set(evt,id){
        QuestionIdForImage.push(id);
        outImage="upfile"+id;
        var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
        // FileReader support
        if (FileReader && files && files.length) 
        {
          var fr = new FileReader();
          fr.onload = function () {
          document.getElementById(outImage).src = fr.result;
          }
          fr.readAsDataURL(files[0]);
        }
        // Not supported
        else 
        {
          document.getElementById(outImage).src = "<?php echo base_url('uploads/addimage.png') ?>";
        }
      }

var paginationHandler = function(){
    // store pagination container so we only select it once
    var $paginationContainer = $(".pagination-container"),
        $pagination = $paginationContainer.find('.pagination ul');

    // click event
    $pagination.find("li a").on('click.pageChange',function(e){
        e.preventDefault();

        // get parent li's data-page attribute and current page
        var parentLiPage = $(this).parent('li').data("page"),

            currentPage = parseInt( $(".pagination-container div[data-page]:visible").data('page') ),
            numPages = $paginationContainer.find("div[data-page]").length;
            $('.visible').removeClass('active');
     
        // make sure they aren't clicking the current page
        if ( parseInt(parentLiPage) !== parseInt(currentPage) ) {
            // hide the current page
            $paginationContainer.find("div[data-page]:visible").hide();

            if ( parentLiPage === '+' ) {
                // next page
                $paginationContainer.find("div[data-page="+( currentPage+1>numPages ? numPages : currentPage+1 )+"]").show();
            } else if ( parentLiPage === '-' ) {
                // previous page
                $paginationContainer.find("div[data-page="+( currentPage-1<1 ? 1 : currentPage-1 )+"]").show();
            } else {
                // specific page
                $paginationContainer.find("div[data-page="+parseInt(parentLiPage)+"]").show();
            }

        }
         $(".pagination-container div[data-page]:visible").addClass('active');
          
    });
};
$( document ).ready( paginationHandler );

$(document).ready(function() {

    var divs = $('.mydivs>div');
    var now = 0; // currently shown div
    divs.hide().first().show(); // hide all divs except first
    $("button[name=next]").click(function() {
        divs.eq(now).hide();
        now = (now + 1 < divs.length) ? now + 1 : 0;
        divs.eq(now).show(); // show next
    });
    $("button[name=prev]").click(function() {
        divs.eq(now).hide();
        now = (now > 0) ? now - 1 : divs.length - 1;
        divs.eq(now).show(); // show previous
    });
});


$(document).ready(function (e) {
    $("#form_add_exam_category").on('submit', (function (e) {
    var validate=0;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    $('#loader').modal('show');
    e.preventDefault();
    $.ajax({
            url: SITE_URL+'/exam/save_exam_category', // Url to which the request is send
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
} // validation ends here 

    }));
});


$(document).ready(function (e) {
    $("#form_add_exam_master").on('submit', (function (e) {
    var validate=0;

if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    $('#loader').modal('show');
    $.ajax({
            url: SITE_URL+'/exam/save_exam_master', // Url to which the request is send
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
} // validation ends here 

    }));
});


function negativeMarks()
{
  var negative=$('#setallNegativeMarks').val();
  //alert(negative);
  $('.NegativeMark').val(negative);  
}

function positiveMarks()
{  
  var positive=$('#setallMarks').val();
  $('.PositiveMark').val(positive);
}

function get_subject_module_list(subjectid,id)
{
   
  $.post(SITE_URL+'/questions/get_subject_module_list',
  {
      subjectid:subjectid
  },
    function(responsedata,status){
    $('#loader').modal('hide');
      var response = JSON.parse(responsedata);    
      if(response.status == '1')
          {
            $('#'+id+'SubjectModuleId').html(response.data);
          }
          else
          {   
            $('#'+id+'SubjectModuleId').html(response.data);
          }
    });
}


function get_exam_master(catid){
 // alert(catid);

  $.post(SITE_URL+'/questions/get_exam_master_by_examcategoryid',{
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
  $("#form_add_questions").on('submit', (function (e) {
    var validate=0;
  var testId= $('#universal_TestId').val();
 $('#loader').modal('show');
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $form=$('#form_add_questions');
    if(! $form.valid()) return false;
if(validate==0){
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
                         
                           $('.reset').val('');

                        // }
                       // console.log(response.insert_id);
                        assign_to_test(testId,response.insert_id);
                        /* else{
                            alertify.alert(response.msg);
                         }*/
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

//assign_to_test(1,13);

  function assign_to_test(TestId,QuestionId)
  {
    var result=0;
    $.post(SITE_URL+'/exam/save_test_questions',{
       TestId:TestId, QuestionId:QuestionId
    },function(data,status){    
      $("#tablediv").load(location.href + " #tablediv");
                data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      {                         
                       result=1;
                         alertify.alert(response.msg);
                      }
                      else{
                        alertify.alert(response.msg);
                      }
                      
                    } catch(e) {
                       alertify.alert(response.msg); 
                    }
                  }
            });       
  }
    
    function save_exam_test() {
    var validate=0;
    $form=$('#form_add_exam_test');
    $('#loader').modal('show');
    if(! $form.valid()) return false;
    $('#submit').attr('disabled','disabled');
  var data=$('#form_add_exam_test').serialize();
          
    $.post(SITE_URL+'/exam/save_exam_test',{
      data:data},
      function (data)   // A function to be called if request succeeds
            {
                $('#loader').modal('hide');
                data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                    
                      if(response.status == '1')
                      {
                          //$('#submit').removeAttr('disabled');
                          $('#universal_TestId').val(response.insert_id);
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
                            //setCookie(cname,response.insert_id,);
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
            
        });

    }

    function delete_test_questions(id)
    {
       $.post(SITE_URL+'exam/delete_test_questions',{
      id:id},
      function (data)   // A function to be called if request succeeds
            {
                data = data.trim();
               // alert(data);
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
            
        });
    }

        function edit_exam_test() {
    var validate=0;
    $form=$('#form_edit_exam_test');

    if(! $form.valid()) return false;
    $('#submit').attr('disabled','disabled');
  var data=$('#form_edit_exam_test').serialize();
         $('#loader').modal('show'); 
    $.post(SITE_URL+'/exam/edit_exam_test',{
      data:data},
      function (data)   // A function to be called if request succeeds
            {
                $('#loader').modal('hide');
                data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                    
                      if(response.status == '1')
                      {
                          //does nothing 
                       }
                      else
                      {   
                          //$('#submit').removeAttr('disabled');
                          alertify.alert(response.msg);
                      }
                    } catch(e) {
                     
                     //  alertify.alert(e); // error in the above string (in this case, yes)!
                    }
                  }
            
        });

    }


     function update_exam_test() {
      
    var validate=0;
    TestId=$('#universal_TestId').val();
    $form=$('#form_set_marks');

    if(! $form.valid()) return false;
    $('#submit').attr('disabled','disabled');
    $('#loader').modal('show');
  var data=$('#form_set_marks').serialize();
  var formdata = new FormData();
  for(i=0;i<QuestionIdForImage.length;i++)
  {
     formdata.append( 'file'+QuestionIdForImage[i], $( '#file'+QuestionIdForImage[i] )[0].files[0] );
  } 
  formdata.append('data',data);
  formdata.append('QuestionIdForImage',JSON.stringify(QuestionIdForImage));
  
  //console.log(formdata);
  //debugger;  
   $.ajax({
            url: SITE_URL+'/exam/update_test_questions', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: formdata, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
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
                     assign_to_test_question_array(TestId,response.insert_id);
                    alertify.alert("Questions uploaded successfully.");                    
                  }else
                  {
                      alertify.alert("Please upload data in proper format.");
                  }
            }
        });
    /*$.post(SITE_URL+'institute_admin/exam/update_test_questions',{
      data:data},
      function (data)   // A function to be called if request succeeds
            {
                data = data.trim();
                //alert(data);
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                    
                      if(response.status == '1')
                      {
                        $("#tablediv").load(location.href + " #tablediv");
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
            
        });*/

    }


    function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}


    
      $("body").removeClass();
      $("body").addClass("pace-done mini-navbar");




                function add_exam_test_setting()
                {
                     $form=$('#form_exam_test_setting');

    if(! $form.valid()) return false;
    $('#submit').attr('disabled','disabled');
  var data=$('#form_exam_test_setting').serialize();
          
    $.post(SITE_URL+'/exam/save_exam_test_setting',{
      data:data},
      function (data)   // A function to be called if request succeeds
            {
                data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                    
                      if(response.status == '1')
                      {
                          //$('#submit').removeAttr('disabled');
                          
                          alertify.alert(response.msg);                          
                           

                            //setCookie(cname,response.insert_id,);
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
            
        });
                }

  $(document).ready(function (e) {

    $("#form_get_filter_list").on('submit', (function (e) {
      $("#get_question_list").DataTable().destroy();
    var validate=0;
 $('#loader').modal('show');
if(validate==0){
    $('#submit').attr('disabled','disabled');
    e.preventDefault();
    var testId=$('#universal_TestId').val();
    if(testId=='')
    {

         alertify.alert("Error..!! Add Test First");
         return false;
    }
    $("#form_get_filter_list").append('<input type="hidden" name="testId" value="'+testId+'"/>');
    $.ajax({
            url: SITE_URL+'/exam/get_filter_questions_list', // Url to which the request is send
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
                ]

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

function set_questionid()
{
    if($('.QuestionId').is(":checked"))
    {
     // alert("HELLO");
        $('.QuestionId').prop('checked',false);
    }
    else{
        $('.QuestionId').prop('checked',true); 
    }
}

function save_exam_test_question_method1()
{
  var arr=[];
  var testId= $('#universal_TestId').val();
  
 var cboxes = document.getElementsByName('QuestionId[]');
    var len = cboxes.length;
    for (var i=0; i<len; i++) {
        //alert(i + (cboxes[i].checked?' checked ':' unchecked ') + cboxes[i].value);
        if(cboxes[i].checked){
          arr.push(cboxes[i].value);
        }
    }
  assign_to_test_question_array(testId,arr);

}

function assign_to_test_question_array(TestId,QuestionIds)
{
  //alert(QuestionIds);
   $.post(SITE_URL+'/exam/save_test_questions_array',{
       QuestionIds:QuestionIds,TestId:TestId, 
    },function(data,status){    
      $("#tablediv").load(location.href + " #tablediv");
                data = data.trim();
                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      if(response.status == '1')
                      { 
                        $("#modaltablediv").load(location.href + " #modaltablediv");                        
                       
                         alertify.alert(response.msg);
                      }
                      else{
                      //  alertify.alert(response.msg);
                      }
                      
                    } catch(e) {
                       alertify.alert("Could Not Connect To the Server"); 
                    }
                  }
            });       
}

function upload_excel_choice(){

var waaskey = $("#csrfName").val();
var file_data = $("#excelfile").prop("files")[0];
var form_data = new FormData(); 
form_data.append("excelfile", file_data);
form_data.append("waaskey", waaskey);
var valid=0;
var TestId=$('#universal_TestId').val();
var table_data = "";
$('#loader').modal('show');
if(valid==0)
{
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
                     assign_to_test_question_array(TestId,response.insert_id);
                    alertify.alert("Questions uploaded successfully.");                    
                  }else
                  {
                      alertify.alert(response.msg);
                  }
            }
        });
  }
}

function check_question_type(QuestionTypeId)
{
    $('#loader').modal('show');
  $("#add_question_format").html('');  
  if(QuestionTypeId!='')
  {
    $.post(SITE_URL+'/questions/get_question_format',
    {      
      QuestionTypeId : QuestionTypeId
    },function(data,status)
    {     
        $('#loader').modal('hide');
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

/*function get_excel_buttons()
{   
  $("#excel_upload").html('');
  var QuestionTypeId  = $("#TestUploadQuestionTypeId").val();
  if(QuestionTypeId==1){
    $.post(SITE_URL+'/institute_admin/exam/get_excel_buttons_multiple_choice',{      
    },function(data,status){    
      alert(data);
                data = data.trim();

                  if(data) {
                    try {
                      var response = JSON.parse(data);
                      alert(response.data);
                      if(response.status == '1')
                      { 
                        $("#excel_upload").html(response.data);                                                                        
                      }
                      else{
                        alertify.alert(response.msg);
                      }
                      
                    } catch(e) {
                       alertify.alert(response.msg); 
                    }
                  }
            }); 
  }
}
*/
//removePlugins : 'image'
function ckeditor(){
  CKEDITOR.replace( 'editor1', {
                   extraPlugins: "mathjax",
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
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