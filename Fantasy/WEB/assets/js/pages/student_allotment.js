  function get_exam_master(catid,id)
  {
    $.post(SITE_URL+'/institute_admin/questions/get_exam_master_by_examcategoryid',{
        catid:catid
    },function(responsedata,status){
      var response = JSON.parse(responsedata);
      if(response.status == '1')
          {
            $('#'+id).html(response.data);
          }
          else
          {   
            $('#'+id).html(response.data);
          }
    });
}

function  exam_not_enroll_studentlist(catid)
{

  // var ExamMasterId = $('#examoption[value="' + $('#examId').val() + '"]').data('id');
   $('#loader').modal('show');
  var ExamMasterId = catid;
  $.post(SITE_URL+'/institute_admin/student/get_exam_not_enroll_studentlist' ,{
    catid:catid
        
    },function(responsedata,status){
         $('#loader').modal('hide');
      var response = JSON.parse(responsedata);
      if(response.status == '1')
          {
            $('#table_data').html(response.data);
            $('.dataTables-example').DataTable({
                pageLength: 25,
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
            $('#table_data').html(response.data);
          }
    });
}


var studentids = ''; 
function checkall()
{
	 var checked = $('#checkallid').prop('checked');	
	 if(checked)
	 {
	 	$('.checkalllist').attr('checked',true);
	 }
	 else{
	 	$('.checkalllist').attr('checked',false);
	 }
}


$(document).ready(function (e) {
    
	$("#form_allot_subjects").on('submit', (function (e) 
	{
	     $('#loader').modal('show');
  var ExamMasterId =  $('#ExamMasterId').val();
    $.ajax({
            url: SITE_URL+'/institute_admin/student/add_alloted_exam',  // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                 $('#loader').modal('hide');
                data = data.trim();
                alert(data);
                alertify.alert('your  data  save  successfully');
                // window.location.replace(SITE_URL+'/superadmin/practice/practice_test_list');
                  if(data) {
                	//alert('HELLO2');
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

}));
	});


function get_student_list_by_masterid(masterid)
{
     $('#loader').modal('show');
	  $.post(SITE_URL+'/institute_admin/student/get_student_list_by_masterid',{
        masterid:masterid
    },function(responsedata,status){
         $('#loader').modal('hide');
      var response = JSON.parse(responsedata);
     // alert(response);
      if(response.status == '1')
          {
           $('#student_enroll_table_data').html(response.data);
           
            $('.dataTables-example').DataTable({
                pageLength: 25,
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
            $('#student_enroll_table_data').html(response.data);
          }
    });

}


function enroll_testseries(instituteid,masterid,studentid,testseriesid,serial_no)
{ $('#loader').modal('show');
	
	$.post(SITE_URL+'/institute_admin/student/save_enroll_testseries',{
		instituteid:instituteid,
		studentid:studentid,
        masterid:masterid,
        testseriesid:testseriesid
    },function(responsedata,status){
         $('#loader').modal('hide');
      var response = JSON.parse(responsedata);     
      if(response.status == '1')
          {
          // $('#student_enroll_table_data').html(response.data);           
          alertify.alert("Enrolled");
          $('#testseriesbutton'+serial_no).text('Enrolled');
          $('#testseriesbutton'+serial_no).addClass('btn-danger');          
         $('#testseriesbutton'+serial_no).unbind('click');
          }
       else{
       		alertify.alert(response.msg);
       }   
    });

}


function delete_exam_allotment(id)
    {
         $('#loader').modal('show');
       $.post(SITE_URL+'institute_admin/student/delete_exam_allotment',{
      id:id},
      function (data)   // A function to be called if request succeeds
            {
                 $('#loader').modal('hide');
                data = data.trim();
                alert(data);
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
