// make it a global variable so other scripts can access it
var booked_load_calendar_date_booking_options,
	booked_appt_form_options;

;(function($, window, document, undefined) {
	
	var $win = $(window);

	$.fn.spin.presets.booked = {
	 	lines: 10, // The number of lines to draw
		length: 7, // The length of each line
		width: 5, // The line thickness
		radius: 11, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		direction: 1, // 1: clockwise, -1: counterclockwise
		color: '#555', // #rgb or #rrggbb or array of colors
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'booked-spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: '50%', // Top position relative to parent
		left: '50%' // Left position relative to parent
	}
	
	$.fn.spin.presets.booked_top = {
	 	lines: 11, // The number of lines to draw
		length: 10, // The length of each line
		width: 6, // The line thickness
		radius: 15, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		scale: 0.5,
		direction: 1, // 1: clockwise, -1: counterclockwise
		color: '#aaaaaa', // #rgb or #rrggbb or array of colors
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'booked-spinner booked-spinner-top', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: '15px', // Top position relative to parent
		left: '50%' // Left position relative to parent
	}
	
	$.fn.spin.presets.booked_white = {
	 	lines: 13, // The number of lines to draw
		length: 11, // The length of each line
		width: 5, // The line thickness
		radius: 18, // The radius of the inner circle
		scale: 1,
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		direction: 1, // 1: clockwise, -1: counterclockwise
		color: '#fff', // #rgb or #rrggbb or array of colors
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'booked-spinner booked-white', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: '50%', // Top position relative to parent
		left: '50%' // Left position relative to parent
	}
	
	// Adjust the calendar sizing when resizing the window
	$win.on('resize', function(){
		
		adjust_calendar_boxes();
		resize_booked_modal();
		
	});

	$win.on('load', function() {

		var ajaxRequests = [];
		
		// Adjust the calendar sizing on load
		adjust_calendar_boxes();
		
		$('.booked-calendar-wrap').each(function(){
			var thisCalendar = $(this);
			var calendar_month = thisCalendar.find('table.booked-calendar').attr('data-calendar-date');
			thisCalendar.attr('data-default',calendar_month);
			init_tooltips(thisCalendar);
		});
		
		$('.booked-list-view').each(function(){
			var thisList = $(this);
			var list_date = thisList.find('.booked-appt-list').attr('data-list-date');
			thisList.attr('data-default',list_date);
		});
		
		bookedRemoveEmptyTRs();
		init_appt_list_date_picker();

		$('.booked_calendar_chooser').change(function(e){
	
			e.preventDefault();
			
			var $selector 			= $(this),
				thisIsCalendar		= $selector.parents('.booked-calendarSwitcher').hasClass('calendar');	
	
			if (!thisIsCalendar){
				
				var thisCalendarWrap	= $selector.parents('.booked-calendar-shortcode-wrap').find('.booked-list-view'),
				thisDefaultDate			= thisCalendarWrap.attr('data-default'),
				thisIsCalendar			= $selector.parents('.booked-calendarSwitcher').hasClass('calendar');
				
				if (typeof thisDefaultDate == 'undefined'){ thisDefaultDate = false; }
				
				thisCalendarWrap.addClass('booked-loading');
	
				var args = {
					'action'		: 'booked_appointment_list_date',
					'date'		: thisDefaultDate,
					'calendar_id'	: $selector.val()
				};
				
				$(document).trigger("booked-before-loading-appointment-list-booking-options");
				thisCalendarWrap.spin('booked_top');
			
				$.ajax({
					url: booked_js_vars.ajax_url,
					type: 'post',
					data: args,
					success: function( html ) {
						
						thisCalendarWrap.html( html );
						
						init_appt_list_date_picker();
						setTimeout(function(){
							thisCalendarWrap.removeClass('booked-loading');
						},1);
						
					}
				});
				
			} else {
				
				var thisCalendarWrap 	= $selector.parents('.booked-calendar-shortcode-wrap').find('.booked-calendar-wrap'),
				thisDefaultDate			= thisCalendarWrap.attr('data-default');
				if (typeof thisDefaultDate == 'undefined'){ thisDefaultDate = false; }
				
				var args = {
					'action'		: 'booked_calendar_month',
					'gotoMonth'		: thisDefaultDate,
					'calendar_id'	: $selector.val()
				};
			
				savingState(true,thisCalendarWrap);
			
				$.ajax({
					url: booked_js_vars.ajax_url,
					type: 'post',
					data: args,
					success: function( html ) {
						
						thisCalendarWrap.html( html );
						
						adjust_calendar_boxes();
						bookedRemoveEmptyTRs();
						init_tooltips(thisCalendarWrap);
					 	$(window).trigger('booked-load-calendar', args, $selector );
						
					}
				});
				
			}
			
			return false;
			
		});
		
		// Calendar Next/Prev Click
		$('.booked-calendar-wrap').on('click', '.page-right, .page-left, .monthName a', function(e) {

			e.preventDefault();

			var $button 			= $(this),
				gotoMonth			= $button.attr('data-goto'),
				thisCalendarWrap 	= $button.parents('.booked-calendar-wrap'),
				thisCalendarDefault = thisCalendarWrap.attr('data-default'),
				calendar_id			= $button.parents('table.booked-calendar').attr('data-calendar-id');
				
			if (typeof thisCalendarDefault == 'undefined'){ thisCalendarDefault = false; }
			
			var args = {
				'action'		: 'booked_calendar_month',
				'gotoMonth'		: gotoMonth,
				'calendar_id'	: calendar_id,
				'force_default'	: thisCalendarDefault
			};
		
			savingState(true,thisCalendarWrap);
		
			$.ajax({
				url: booked_js_vars.ajax_url,
				type: 'post',
				data: args,
				success: function( html ) {
					
					thisCalendarWrap.html( html );
					
					adjust_calendar_boxes();
					bookedRemoveEmptyTRs();
					init_tooltips(thisCalendarWrap);
					$(window).trigger('booked-load-calendar', args, $button );
					
				}
			});

			return false;

		});

		// Calendar Date Click
		$('.booked-calendar-wrap').on('click', 'tr.week td', function(e) {

			e.preventDefault();

			var $thisDate 				= $(this),
				booked_calendar_table 	= $thisDate.parents('table.booked-calendar'),
				$thisRow				= $thisDate.parent(),
				date					= $thisDate.attr('data-date'),
				calendar_id				= booked_calendar_table.attr('data-calendar-id'),
				colspanSetting			= $thisRow.find('td').length;
				
			if (!calendar_id){ calendar_id = 0; }

			if ($thisDate.hasClass('blur') || $thisDate.hasClass('booked') && !booked_js_vars.publicAppointments || $thisDate.hasClass('prev-date')){

				// Do nothing.

			} else if ($thisDate.hasClass('active')){

				$thisDate.removeClass('active');
				$('tr.entryBlock').remove();
				
				var calendarHeight = booked_calendar_table.height();
				booked_calendar_table.parent().height(calendarHeight);

			} else {

				$('tr.week td').removeClass('active');
				$thisDate.addClass('active');

				$('tr.entryBlock').remove();
				$thisRow.after('<tr class="entryBlock loading"><td colspan="'+colspanSetting+'"></td></tr>');
				$('tr.entryBlock').find('td').spin('booked');

				booked_load_calendar_date_booking_options = {'action':'booked_calendar_date','date':date,'calendar_id':calendar_id};
				$(document).trigger("booked-before-loading-calendar-booking-options");
				
				var calendarHeight = booked_calendar_table.height();
				booked_calendar_table.parent().height(calendarHeight);
				
				$.ajax({
					url: booked_js_vars.ajax_url,
					type: 'post',
					data: booked_load_calendar_date_booking_options,
					success: function( html ) {
						
						$('tr.entryBlock').find('td').html( html );
						
						$('tr.entryBlock').removeClass('loading');
						$('tr.entryBlock').find('.booked-appt-list').fadeIn(300);
						$('tr.entryBlock').find('.booked-appt-list').addClass('shown');
						adjust_calendar_boxes();
						
					}
				});

			}
			
			return;

		});
		
		// Appointment List Next/Prev Date Click
		$('.booked-list-view').on('click', '.booked-list-view-date-prev,.booked-list-view-date-next', function(e) {

			e.preventDefault();

			var $thisLink 			= $(this),
				date				= $thisLink.attr('data-date'),
				thisList			= $thisLink.parents('.booked-list-view'),
				defaultDate			= thisList.attr('data-default'),
				calendar_id			= $thisLink.parents('.booked-list-view-nav').attr('data-calendar-id');
				
			if (typeof defaultDate == 'undefined'){ defaultDate = false; }
				
			if (!calendar_id){ calendar_id = 0; }
			
			thisList.addClass('booked-loading');
	
			var booked_load_list_view_date_booking_options = {
				'action'		: 'booked_appointment_list_date',
				'date'			: date,
				'calendar_id'	: calendar_id,
				'force_default'	: defaultDate
			};
			
			$(document).trigger("booked-before-loading-appointment-list-booking-options");
			thisList.spin('booked_top');
		
			$.ajax({
				url: booked_js_vars.ajax_url,
				type: 'post',
				data: booked_load_list_view_date_booking_options,
				success: function( html ) {
					
					thisList.html( html );
					
					init_appt_list_date_picker();
					setTimeout(function(){
						thisList.removeClass('booked-loading');
					},1);
					
				}
			});
			
			return false;

		});

		// New Appointment Click
		$('.booked-calendar-wrap').on('click', 'button.new-appt', function(e) {

			e.preventDefault();

			var $button 		= $(this),
				title           = $button.attr('data-title'),
				timeslot		= $button.attr('data-timeslot'),
				date			= $button.attr('data-date'),
				$thisTimeslot	= $button.parents('.timeslot'),
				is_list_view	= $button.parents('.booked-calendar-wrap').hasClass('booked-list-view'),
				calendar_id		= $button.parents('table.booked-calendar').attr('data-calendar-id');
				
			if (typeof is_list_view != 'undefined' && is_list_view){
				var calendar_id	= $button.parents('.booked-list-view').find('.booked-list-view-nav').attr('data-calendar-id');
			} else {
				var calendar_id	= $button.parents('table.booked-calendar').attr('data-calendar-id');
			}

			booked_appt_form_options = {'action':'booked_new_appointment_form','date':date,'timeslot':timeslot,'calendar_id':calendar_id,'title':title};
			$(document).trigger("booked-before-loading-booking-form");

			create_booked_modal();
			setTimeout(function(){
				
				$.ajax({
					url: booked_js_vars.ajax_url,
					type: 'post',
					data: booked_appt_form_options,
					success: function( html ) {
						
						$('.bm-window').html( html );
						
						var bookedModal = $('.booked-modal');
						var bmWindow = bookedModal.find('.bm-window');
						bmWindow.css({'visibility':'hidden'});
						bookedModal.removeClass('bm-loading');
						$(document).trigger("booked-on-new-app");
						resize_booked_modal();
						bmWindow.hide();
						$('.booked-modal .bm-overlay').find('.booked-spinner').remove();
						
						setTimeout(function(){
							bmWindow.css({'visibility':'visible'});
							bmWindow.show();
						},50);
						
					}
				});
			
			},100);

			return false;

		});

		// Profile Tabs
		var profileTabs = $('.booked-tabs');

		if (!profileTabs.find('li.active').length){
			profileTabs.find('li:first-child').addClass("active");
		}

		if (profileTabs.length){
			$('.booked-tab-content').hide();
			var activeTab = profileTabs.find('.active > a').attr('href');
			activeTab = activeTab.split('#');
			activeTab = activeTab[1];
			$('#profile-'+activeTab).show();

			profileTabs.find('li > a').on('click', function(e) {

				e.preventDefault();
				$('.booked-tab-content').hide();
				profileTabs.find('li').removeClass('active');

				$(this).parent().addClass('active');
				var activeTab = $(this).attr('href');
				activeTab = activeTab.split('#');
				activeTab = activeTab[1];

				$('#profile-'+activeTab).show();
				return false;

			});
		}

		// Show Additional Information
		$('.booked-profile-appt-list').on('click', '.booked-show-cf', function(e) {
		
			e.preventDefault();
			var hiddenBlock = $(this).parent().find('.cf-meta-values-hidden');
		
			if(hiddenBlock.is(':visible')){
				hiddenBlock.hide();
				$(this).removeClass('booked-cf-active');
			} else {
				hiddenBlock.show();
				$(this).addClass('booked-cf-active');
			}
		
			return false;
		
		});

		// Check Login/Registration/Forgot Password forms before Submitting
		if ($('#loginform').length){
			$('#loginform input[type="submit"]').on('click',function(e) {
				if ($('#loginform input[name="log"]').val() && $('#loginform input[name="pwd"]').val()){
					$('#loginform .booked-custom-error').hide();
				} else {
					e.preventDefault();
					$('#loginform').parents('.booked-form-wrap').find('.booked-custom-error').fadeOut(200).fadeIn(200);
				}
			});
		}

		if ($('#profile-forgot').length){
			$('#profile-forgot input[type="submit"]').on('click',function(e) {
				if ($('#profile-forgot input[name="user_login"]').val()){
					$('#profile-forgot .booked-custom-error').hide();
				} else {
					e.preventDefault();
					$('#profile-forgot').find('.booked-custom-error').fadeOut(200).fadeIn(200);
				}
			});
		}

		// Custom Upload Field
		if ($('.booked-upload-wrap').length){

			$('.booked-upload-wrap input[type=file]').on('change',function(){

				var fileName = $(this).val();
				$(this).parent().find('span').html(fileName);
				$(this).parent().addClass('hasFile');

			});

		}

		// Delete Appointment
		$('.booked-profile-appt-list').on('click', '.appt-block .cancel', function(e) {

			e.preventDefault();

			var $button 		= $(this),
				$thisParent		= $button.parents('.appt-block'),
				appt_id			= $thisParent.attr('data-appt-id');

			confirm_delete = confirm(booked_js_vars.i18n_confirm_appt_delete);
			if (confirm_delete == true){

				var currentApptCount = parseInt($('.booked-profile-appt-list').find('h4').find('span.count').html());
				currentApptCount = parseInt(currentApptCount - 1);
				if (currentApptCount < 1){
					$('.booked-profile-appt-list').find('h4').find('span.count').html('0');
					$('.no-appts-message').slideDown('fast');
				} else {
					$('.booked-profile-appt-list').find('h4').find('span.count').html(currentApptCount);
				}
				
				$('.appt-block').animate({'opacity':0.4},0);

	  			$thisParent.slideUp('fast',function(){
					$(this).remove();
				});

				$.ajax({
					'url' 		: booked_js_vars.ajax_url,
					'method' 	: 'post',
					'data'		: {
						'action'     	: 'booked_cancel_appt',
						'appt_id'     	: appt_id
					},
					success: function(data) {
						$('.appt-block').animate({'opacity':1},150);
					}
				});

			}

			return false;

		});

		$('body').on('touchstart click','.bm-overlay, .bm-window .close, .booked-form .cancel',function(e){
			e.preventDefault();
			close_booked_modal();
			return false;
		});

		$('body')
		.on('focusin', '.booked-form input', function() {
			if(this.title==this.value) {
				$(this).addClass('hasContent');
				this.value = '';
			}
		}).on('focusout', '.booked-form input', function(){
			if(this.value==='') {
				$(this).removeClass('hasContent');
				this.value = this.title;
			}
		});

		$('body').on('change','.booked-form input',function(){

			var condition = $(this).attr('data-condition'),
				thisVal = $(this).val();

			if (condition && $('.condition-block').length) {
				$('.condition-block.'+condition).hide();
				$('#condition-'+thisVal).fadeIn(200);
				resize_booked_modal();
			}

		});

		// Perform AJAX login on form submit
	    $('body').on('submit','form#ajaxlogin', function(e){
		    e.preventDefault();

	        $('form#ajaxlogin p.status').show().html('<i class="fa fa-refresh fa-spin"></i>&nbsp;&nbsp;&nbsp;' + booked_js_vars.i18n_please_wait);
	        resize_booked_modal();

	        $.ajax({
		        type	: 'post',
				url 	: booked_js_vars.ajax_url,
				data	: $('form#ajaxlogin').serialize(),
				success	: function(data) {
					if (data == 'success'){

						var	timeslot		= $('#newAppointmentForm input[name=timeslot]').val(),
							date			= $('#newAppointmentForm input[name=date]').val(),
							calendar_id		= $('#newAppointmentForm').attr('data-calendar-id');
						
						booked_appt_form_options = {'action':'booked_new_appointment_form','date':date,'timeslot':timeslot,'calendar_id':calendar_id};
						$(document).trigger("booked-before-loading-booking-form");

						$.ajax({
							url: booked_js_vars.ajax_url,
							type: 'post',
							data: booked_appt_form_options,
							success: function( html ) {
								
								$('.bm-window').html( html );
								$(document).trigger("booked-on-new-app");
								resize_booked_modal();
								return false;
								
							}
						});
						
					} else {
						$('form#ajaxlogin p.status').show().html('<i class="fa fa-warning" style="color:#E35656"></i>&nbsp;&nbsp;&nbsp;' + booked_js_vars.i18n_wrong_username_pass);
						resize_booked_modal();
					}
	            }
	        });
	        e.preventDefault();
	    });


		// Submit the "Request Appointment" Form
		$('body').on('click','.booked-form input#submit-request-appointment',function(e){
			
			$('form#newAppointmentForm p.status').show().html('<i class="fa fa-refresh fa-spin"></i>&nbsp;&nbsp;&nbsp;' + booked_js_vars.i18n_please_wait);
	        resize_booked_modal();
			
			e.preventDefault();
			
			var customerType 		= $('#newAppointmentForm input[name=customer_type]').val(),
				customerID			= $('#newAppointmentForm input[name=user_id]').val(),
				title				= $('#newAppointmentForm input[name=title]').val(),
				name				= $('#newAppointmentForm input[name=booked_appt_name]').val(),
				email				= $('#newAppointmentForm input[name=booked_appt_email]').val(),
				password			= $('#newAppointmentForm input[name=booked_appt_password]').val(),
				calendar_id			= $('#newAppointmentForm').attr('data-calendar-id'),
				showRequiredError	= false,
				ajaxRequests 		= [];

			$(this).parents('.booked-form').find('input,textarea,select').each(function(i,field){

				var required = $(this).attr('required');

				if (required && $(field).attr('type') == 'hidden'){
					var fieldParts = $(field).attr('name');
					fieldParts = fieldParts.split('---');
					fieldName = fieldParts[0];
					fieldNumber = fieldParts[1].split('___');
					fieldNumber = fieldNumber[0];

					if (fieldName == 'radio-buttons-label'){
						var radioValue = false;
						$('input:radio[name="single-radio-button---'+fieldNumber+'[]"]:checked').each(function(){
							if ($(this).val()){
								radioValue = $(this).val();
							}
						});
						if (!radioValue){
							showRequiredError = true;
						}
					} else if (fieldName == 'checkboxes-label'){
						var checkboxValue = false;
						$('input:checkbox[name="single-checkbox---'+fieldNumber+'[]"]:checked').each(function(){
							if ($(this).val()){
								checkboxValue = $(this).val();
							}
						});
						if (!checkboxValue){
							showRequiredError = true;
						}
					}

				} else if (required && $(field).attr('type') != 'hidden' && $(field).val() == ''){
		            showRequiredError = true;
		        }

		    });

		    if (showRequiredError){
			    $('form#newAppointmentForm p.status').show().html('<i class="fa fa-warning" style="color:#E35656"></i>&nbsp;&nbsp;&nbsp;' + booked_js_vars.i18n_fill_out_required_fields);
				resize_booked_modal();
			    return false;
		    }

			if (customerType == 'current' && customerID || customerType == 'guest'){

				$thisButton = $(this);
				$thisButton.attr('disabled',true);
				$thisButton.parents('form').find('button.cancel').hide();

				$('.booked-form input').each(function(){
					thisDefault = $(this).attr('title');
					thisVal = $(this).val();
					if (thisDefault == thisVal){ $(this).val(''); }
				});

				var $activeTD = $('td.active');

				$.ajax({
					type	: 'post',
					url 	: booked_js_vars.ajax_url,
					data	: $('#newAppointmentForm').serialize(),
					success	: function(data) {

						data = data.split('###');
						var data_result = data[0].substr(data[0].length - 5);

						if (data_result == 'error'){

							$thisButton.attr('disabled',false);
							$thisButton.parents('form').find('button.cancel').show();

							$('.booked-form input').each(function(){
								thisDefault = $(this).attr('title');
								thisVal = $(this).val();
								if (!thisVal){ $(this).val(thisDefault); }
							});

							$('form#newAppointmentForm p.status').show().html('<i class="fa fa-warning" style="color:#E35656"></i>&nbsp;&nbsp;&nbsp;' + data[1]);
							resize_booked_modal();

						} else {
							
							var redirectObj = { redirect : false };
							var redirect = $(document).trigger("booked-on-requested-appointment",[redirectObj]);
							
							if (booked_js_vars.profilePage){
								
								if (!redirectObj.redirect){
									window.location = booked_js_vars.profilePage;
								} else {
									return;
								}
								
							} else {
								
								if ($('.booked-appt-list').length){
									$('.booked-appt-list').each(function(){
										var thisApptList		= $(this),
											date				= thisApptList.attr('data-list-date'),
											thisList			= thisApptList.parents('.booked-list-view'),
											defaultDate			= thisList.attr('data-default'),
											calendar_id			= thisApptList.find('.booked-list-view-nav').attr('data-calendar-id');					
										if (typeof defaultDate == 'undefined'){ defaultDate = false; }		
										if (!calendar_id){ calendar_id = 0; }
										
										thisList.addClass('booked-loading');
	
										var booked_load_list_view_date_booking_options = {
											'action'		: 'booked_appointment_list_date',
											'date'			: date,
											'calendar_id'	: calendar_id,
											'force_default'	: defaultDate
										};
										
										$(document).trigger("booked-before-loading-appointment-list-booking-options");
										thisList.spin('booked_top');
									
										$.ajax({
											url: booked_js_vars.ajax_url,
											type: 'post',
											data: booked_load_list_view_date_booking_options,
											success: function( html ) {
												
												thisList.html( html );
												
												close_booked_modal();
												init_appt_list_date_picker();
												setTimeout(function(){
													thisList.removeClass('booked-loading');
												},1);
												
											}
										});
										
									});
								}
								
								if ($('td.active').length){
									var activeDate = $activeTD.attr('data-date');
									booked_load_calendar_date_booking_options = {'action':'booked_calendar_date','date':activeDate,'calendar_id':calendar_id};
									$(document).trigger("booked-before-loading-calendar-booking-options");
									
									$.ajax({
										url: booked_js_vars.ajax_url,
										type: 'post',
										data: booked_load_calendar_date_booking_options,
										success: function( html ) {
											
											$('tr.entryBlock').find('td').html( html );
											
											close_booked_modal();
											$('tr.entryBlock').removeClass('loading');
											$('tr.entryBlock').find('.booked-appt-list').hide().fadeIn(300);
											$('tr.entryBlock').find('.booked-appt-list').addClass('shown');
											adjust_calendar_boxes();
											
										}
									});
								}
								
							}

						}

					}
				});

				return false;

			}

			if (customerType == 'new' && name && email && password){

				$('.booked-form input').each(function(){
					thisDefault = $(this).attr('title');
					thisVal = $(this).val();
					if (thisDefault == thisVal){ $(this).val(''); }
				});

				$thisButton = $(this);

				$thisButton.attr('disabled',true);
				$thisButton.parents('form').find('button.cancel').hide();

				var $activeTD = $('td.active');

				$.ajax({
					type	: 'post',
					url 	: booked_js_vars.ajax_url,
					data 	: $('#newAppointmentForm').serialize(),
					success: function(data) {

						data = data.split('###');
						var data_result = data[0].substr(data[0].length - 5);

						if (data_result == 'error'){

							$thisButton.attr('disabled',false);
							$thisButton.parents('form').find('button.cancel').show();

							$('.booked-form input').each(function(){
								thisDefault = $(this).attr('title');
								thisVal = $(this).val();
								if (!thisVal){ $(this).val(thisDefault); }
							});

							$('form#newAppointmentForm p.status').show().html('<i class="fa fa-warning" style="color:#E35656"></i>&nbsp;&nbsp;&nbsp;' + data[1]);
							resize_booked_modal();

						} else {
							
							var redirectObj = { redirect : false };
							var redirect = $(document).trigger("booked-on-requested-appointment",[redirectObj]);
							
							if (booked_js_vars.profilePage){
								
								if (!redirectObj.redirect){
									window.location = booked_js_vars.profilePage;
								} else {
									return;
								}
								
							} else {
								
								if ($('.booked-appt-list').length){
									$('.booked-appt-list').each(function(){
										var thisApptList		= $(this),
											date				= thisApptList.attr('data-list-date'),
											thisList			= thisApptList.parents('.booked-list-view'),
											defaultDate			= thisList.attr('data-default'),
											calendar_id			= thisApptList.find('.booked-list-view-nav').attr('data-calendar-id');					
										if (typeof defaultDate == 'undefined'){ defaultDate = false; }		
										if (!calendar_id){ calendar_id = 0; }
										
										thisList.addClass('booked-loading');
	
										var booked_load_list_view_date_booking_options = {
											'action'		: 'booked_appointment_list_date',
											'date'			: date,
											'calendar_id'	: calendar_id,
											'force_default'	: defaultDate
										};
										
										$(document).trigger("booked-before-loading-appointment-list-booking-options");
										thisList.spin('booked_top');
									
										$.ajax({
											url: booked_js_vars.ajax_url,
											type: 'post',
											data: booked_load_list_view_date_booking_options,
											success: function( html ) {
												
												thisList.html( html );
												
												close_booked_modal();
												init_appt_list_date_picker();
												setTimeout(function(){
													thisList.removeClass('booked-loading');
												},1);
												
											}
										});
									});
								}
								
								if ($('td.active').length){
									var activeDate = $activeTD.attr('data-date');
									booked_load_calendar_date_booking_options = {'action':'booked_calendar_date','date':activeDate,'calendar_id':calendar_id};
									$(document).trigger("booked-before-loading-calendar-booking-options");
									
									$.ajax({
										url: booked_js_vars.ajax_url,
										type: 'post',
										data: booked_load_calendar_date_booking_options,
										success: function( html ) {
											
											$('tr.entryBlock').find('td').html( html );
											
											close_booked_modal();
											$('tr.entryBlock').removeClass('loading');
											$('tr.entryBlock').find('.booked-appt-list').hide().fadeIn(300);
											$('tr.entryBlock').find('.booked-appt-list').addClass('shown');
											adjust_calendar_boxes();
											
										}
									});
								}
								
							}

						}
					}
				});

				return false;

			} else if (customerType == 'new' && !name || customerType == 'new' && !email || customerType == 'new' && !password){

				$('form#newAppointmentForm p.status').show().html('<i class="fa fa-warning" style="color:#E35656"></i>&nbsp;&nbsp;&nbsp;' + booked_js_vars.i18n_appt_required_fields);
				resize_booked_modal();

			}

		});

	});
	
	function bookedRemoveEmptyTRs(){
		$('table.booked-calendar').find('tr.week').each(function(){
			if ($(this).children().length == 0){
				$(this).remove();
			}
		});
	}

	// Saving state updater
	function savingState(show,limit_to){

		show = typeof show !== 'undefined' ? show : true;
		limit_to = typeof limit_to !== 'undefined' ? limit_to : false;

		if (limit_to){

			var $savingStateDIV = limit_to.find('li.active .savingState, .topSavingState.savingState, .calendarSavingState');
			var $stuffToHide = limit_to.find('.monthName');
			var $stuffToTransparent = limit_to.find('table.booked-calendar tbody');

		} else {

			var $savingStateDIV = $('li.active .savingState, .topSavingState.savingState, .calendarSavingState');
			var $stuffToHide = $('.monthName');
			var $stuffToTransparent = $('table.booked-calendar tbody');

		}

		if (show){
			$savingStateDIV.fadeIn(200);
			$stuffToHide.hide();
			$stuffToTransparent.animate({'opacity':0.2},100);
		} else {
			$savingStateDIV.hide();
			$stuffToHide.show();
			$stuffToTransparent.animate({'opacity':1},0);
		}

	}

	$(document).ajaxStop(function() {
		savingState(false);
	});
	
	function init_appt_list_date_picker(){
		
		$('.booked_list_date_picker').each(function(){
			var thisDatePicker = $(this);
			var minDateVal = thisDatePicker.parents('.booked-appt-list').attr('data-min-date');
			var maxDateVal = thisDatePicker.parents('.booked-appt-list').attr('data-max-date');
			if (typeof minDateVal == 'undefined'){ var minDateVal = thisDatePicker.attr('data-min-date'); }
		
			thisDatePicker.datepicker({
		        dateFormat: 'yy-mm-dd',
		        minDate: minDateVal,
		        maxDate: maxDateVal,
		        showAnim: false,
		        beforeShow: function(input, inst) {
					$('#ui-datepicker-div').removeClass();
					$('#ui-datepicker-div').addClass('booked_custom_date_picker');
			    },
			    onClose: function(dateText){
					$('.booked_list_date_picker_trigger').removeClass('booked-dp-active'); 
			    },
			    onSelect: function(dateText){
				   
				   	var thisInput 			= $(this),
						date				= dateText,
						thisList			= thisInput.parents('.booked-list-view'),
						defaultDate			= thisList.attr('data-default'),
						calendar_id			= thisInput.parents('.booked-list-view-nav').attr('data-calendar-id');
						
					if (typeof defaultDate == 'undefined'){ defaultDate = false; }
						
					if (!calendar_id){ calendar_id = 0; }
					thisList.addClass('booked-loading');
					
					var booked_load_list_view_date_booking_options = {
						'action'		: 'booked_appointment_list_date',
						'date'			: date,
						'calendar_id'	: calendar_id,
						'force_default'	: defaultDate
					};
					
					$(document).trigger("booked-before-loading-appointment-list-booking-options");
					thisList.spin('booked_top');
				
					$.ajax({
						url: booked_js_vars.ajax_url,
						type: 'post',
						data: booked_load_list_view_date_booking_options,
						success: function( html ) {
							
							thisList.html( html );
							
							init_appt_list_date_picker();
							setTimeout(function(){
								thisList.removeClass('booked-loading');
							},1);
							
						}
					});
					
					return false;
			    }
		    });
		    
		});
		
		$('body').on('click','.booked_list_date_picker_trigger',function(e){
			e.preventDefault();
			if (!$(this).hasClass('booked-dp-active')){
				$(this).addClass('booked-dp-active');
				$(this).parents('.booked-appt-list').find('.booked_list_date_picker').datepicker('show');
			}
			
	    }); 
	    
	}

})(jQuery, window, document);

// Create Booked Modal
function create_booked_modal(){
	var windowHeight = jQuery(window).height();
	var windowWidth = jQuery(window).width();
	if (windowWidth > 720){
		var maxModalHeight = windowHeight - 295;
	} else {
		var maxModalHeight = windowHeight;
	}
	
	jQuery('body input, body textarea, body select').blur();
	jQuery('body').addClass('booked-noScroll');
	jQuery('<div class="booked-modal bm-loading"><div class="bm-overlay"></div><div class="bm-window"><div style="height:100px"></div></div></div>').appendTo('body');
	jQuery('.booked-modal .bm-overlay').spin('booked_white');
	jQuery('.booked-modal .bm-window').css({'max-height':maxModalHeight+'px'});
}

var previousRealModalHeight = 100;

function resize_booked_modal(){
	
	var windowHeight = jQuery(window).height();
	var windowWidth = jQuery(window).width();
	
	var common43 = 43;
	
	if (jQuery('.booked-modal .bm-window .booked-scrollable').length){
		var realModalHeight = jQuery('.booked-modal .bm-window .booked-scrollable')[0].scrollHeight;
		
		if (realModalHeight < 100){
			realModalHeight = previousRealModalHeight;
		} else {
			previousRealModalHeight = realModalHeight;
		}
		
	} else {
		var realModalHeight = 0;
	}
	var minimumWindowHeight = realModalHeight + common43 + common43;
	var modalScrollableHeight = realModalHeight - common43;
	var maxModalHeight;
	var maxFormHeight;
	
	if (windowHeight < minimumWindowHeight){
		modalScrollableHeight = windowHeight - common43 - common43;
	} else {
		modalScrollableHeight = realModalHeight;
	}
	
	if (windowWidth > 720){
		maxModalHeight = modalScrollableHeight - 25;
		maxFormHeight = maxModalHeight - 15;
		var modalNegMargin = (maxModalHeight + 78) / 2;
	} else {
		maxModalHeight = windowHeight - common43;
		maxFormHeight = maxModalHeight - 60 - common43;
		var modalNegMargin = (maxModalHeight) / 2;
	}
	
	jQuery('.booked-modal').css({'margin-top':'-'+modalNegMargin+'px'});
	jQuery('.booked-modal .bm-window').css({'max-height':maxModalHeight+'px'});
	jQuery('.booked-modal .bm-window .booked-scrollable').css({'max-height':maxFormHeight+'px'});
	
}

function close_booked_modal(){
	jQuery('.booked-modal').fadeOut(200);
	jQuery('.booked-modal').addClass('bm-closing');
	jQuery('body').removeClass('booked-noScroll');
	setTimeout(function(){
		jQuery('.booked-modal').remove();
	},300);
}

function init_tooltips(container){
	jQuery('.tooltipster').tooltipster({
		theme: 		'tooltipster-light',
		animation:	'grow',
		speed:		200,
		delay: 		100,
		offsetY:	-13
	});
}

// Function to adjust calendar sizing
function adjust_calendar_boxes(){
	jQuery('.booked-calendar').each(function(){
		
		var windowWidth = jQuery(window).width();
		var smallCalendar = jQuery(this).parents('.booked-calendar-wrap').hasClass('small');
		var boxesWidth = jQuery(this).find('tbody tr.week td').width();
		var calendarHeight = jQuery(this).height();
		boxesHeight = boxesWidth * 1;
		jQuery(this).find('tbody tr.week td').height(boxesHeight);
		jQuery(this).find('tbody tr.week td .date').css('line-height',boxesHeight+'px');
		jQuery(this).find('tbody tr.week td .date .number').css('line-height',boxesHeight+'px');
		if (smallCalendar || windowWidth < 720){
			jQuery(this).find('tbody tr.week td .date .number').css('line-height',boxesHeight+'px');
		} else {
			jQuery(this).find('tbody tr.week td .date .number').css('line-height','');
		}

		var calendarHeight = jQuery(this).height();
		jQuery(this).parent().height(calendarHeight);

	});
}