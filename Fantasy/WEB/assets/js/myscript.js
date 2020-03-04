//Show Question One on page load
$("#question1").removeClass('hide');

$( "#show_question_paper" ).click(function() {
	if($( "#questionPaper" ).hasClass( "hide" )){
		$( "#questionPaper" ).removeClass('hide');
		$("#questions").addClass('hide');
	}else{
		$( "#questionPaper" ).addClass('hide');
		$("#questions").removeClass('hide');
	}
	//$("#questionPaper").toggleClass('hide');
	//$("#questions").toggleClass('hide');
	$("#instructions").addClass('hide');
});

$( "#show_instructions" ).click(function() {
	if($( "#instructions" ).hasClass( "hide" )){
		$( "#instructions" ).removeClass('hide');
		$("#questions").addClass('hide');
	}else{
		$( "#instructions" ).addClass('hide');
		$("#questions").removeClass('hide');
	}
	$("#questionPaper").addClass('hide');
});

function clearResponse(){
	var current_question_id = $("#current_question_id").val();

	$( ".question"+current_question_id ).each(function() {
		$( this ).removeAttr( "checked" );
	});
	$("#label_question"+current_question_id).removeClass('skipped');
	$("#label_question"+current_question_id).removeClass('attempted ');
	$("#label_question"+current_question_id).removeClass('bookmarked attempted');
	$("#label_question"+current_question_id).removeClass('bookmarked');
	$("#label_question"+current_question_id).addClass('current-question');
}


function bookmarkAndNextBtnPressed(){
	var current_question_id = parseInt($("#current_question_id").val());
	var total_questions = parseInt($("#total_questions").val());
	
	if(current_question_id <= total_questions){

	//console.log($("input[name='option"+current_question_id+"']:checked").val());
		var selected_answer = $("input[name='option"+current_question_id+"']:checked").val();
		
		if(selected_answer!= undefined){
			$("#label_question"+current_question_id).removeClass('current-question');
			$("#label_question"+current_question_id).addClass('bookmarked attempted');		
		}else{
			$("#label_question"+current_question_id).removeClass('current-question');
			$("#label_question"+current_question_id).addClass('bookmarked');		
		}
		//});
		
		var current = current_question_id+1;
		
		$("#head_question_no").html(current);
		
		$( ".que-ans-box").each(function() {
			$( this ).addClass( "hide" );
		});
		
		$("#current_question_id").val(current);
		$("#question"+current).removeClass('hide');
		$("#marks_on_correct_ans").html("+"+$("#current_question"+current+"_correct_ans_marks").val());
		$("#marks_on_wrong_ans").html("-"+$("#current_question"+current+"_wrong_ans_marks").val());
		
		$("li[id^='label_question']").removeClass('current-question');
		$("#label_question"+current).addClass('current-question');
		
/*		
		if(current_question_id==total_questions){
			//$("#bookmarkAndNextBtnPressed").attr('disabled','disabled');
			//alert("You have completed all questions.");
		}
*/		
		
	}
}

function saveAndNextBtnPressed(){
	var current_question_id = parseInt($("#current_question_id").val());
	var total_questions = parseInt($("#total_questions").val());
	
	if(current_question_id <= total_questions){
		

		//$( "input[name='option"+current_question_id+"']").each(function() {
			

		console.log($("input[name='option"+current_question_id+"']:checked").val());
		var selected_answer = $("input[name='option"+current_question_id+"']:checked").val();
		
		if(selected_answer!= undefined){
			$("#label_question"+current_question_id).removeClass('current-question');
			$("#label_question"+current_question_id).addClass('attempted');//answered		
		}else{
			$("#label_question"+current_question_id).removeClass('current-question');
			$("#label_question"+current_question_id).addClass('skipped');//not-answered
		}
		//});
		
		var current = current_question_id+1;
		
		$("#head_question_no").html(current);
		
		$( ".que-ans-box").each(function() {
			$( this ).addClass( "hide" );
			
		});
		
		$("#current_question_id").val(current);
		$("#question"+current).removeClass('hide');
		$("#marks_on_correct_ans").html("+"+$("#current_question"+current+"_correct_ans_marks").val());
		$("#marks_on_wrong_ans").html("-"+$("#current_question"+current+"_wrong_ans_marks").val());
		
		$("li[id^='label_question']").removeClass('current-question');
		$("#label_question"+current).addClass('current-question');
		
		
		if(current_question_id==total_questions){
			//$("#saveAndNextBtnPressed").attr('disabled','disabled');
			alert("You have completed all questions.");
		}
		
	}
}


	function answer_clicked(){
		var current_question_id = parseInt($("#current_question_id").val());
		$("#label_question"+current_question_id).removeClass('current-question');
		$("#label_question"+current_question_id).addClass('attempted ');
	}

	
	function sideBarItemClicked(questionid){
		var current_question_id = parseInt($("#current_question_id").val());
		var questionid = parseInt(questionid);
		
		$("#label_question"+current_question_id).addClass('skipped');//not-answered
		$("li[id^='label_question']").removeClass('current-question');
		$("#label_question"+questionid).addClass('current-question');
		
		$("#head_question_no").html(questionid);
		
		$( ".que-ans-box").each(function() {
			$( this ).addClass( "hide" );			
		});
		
		$("#current_question_id").val(questionid);
		$("#question"+questionid).removeClass('hide');
		
		$("#marks_on_correct_ans").html("+"+$("#current_question"+questionid+"_correct_ans_marks").val());
		$("#marks_on_wrong_ans").html("-"+$("#current_question"+questionid+"_wrong_ans_marks").val());
	}
	
	var timervalue=parseInt($('#timervalue').val());
	//alert(timervalue);
	$('#countdown-1').timeTo(timervalue, function(){
        alert('Countdown finished');
    });
	

	
	$( ".toggle-sidebar-btn" ).click(function() {
		$( this ).toggleClass( "hide_rightsidebar" );
	});

/* 
$( "#filter" ).click(function() {

var month = $("#month").val();

	$.post(SITE_URL+'/employees/employees/filter_list_tour_program',{
        month:month
    },function(responsedata,status){
    	var response = JSON.parse(responsedata);
    	if(response.status == '1')
          {
            $("#tbody").html(response.data);
          }
          else
          {   
            //$('#ExamTestId').html(response.data);
          }
    });
}); 
*/


