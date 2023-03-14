(function($) {
    "use strict";
	   
	// LOGIN FORM

	$("#loginform").on('submit',function(e){
	  e.preventDefault();
	  $('button.submit-btn').prop('disabled',true);
	  $('.alert-info').show();
	  $('.alert-info p').html($('#authdata').val());
		  $.ajax({
		   method:"POST",
		   url:$(this).prop('action'),
		   data:new FormData(this),
		   dataType:'JSON',
		   contentType: false,
		   cache: false,
		   processData: false,
		   success:function(data)
		   {
			  if ((data.errors)) {
			  $('.alert-success').hide();
			  $('.alert-info').hide();
			  $('.alert-danger').show();
			  $('.alert-danger ul').html('');
				for(var error in data.errors)
				{
				  $('.alert-danger p').html(data.errors[error]);
				}
			  }
			  else
			  {
				$('.alert-info').hide();
				$('.alert-danger').hide();
				$('.alert-success').show();
				$('.alert-success p').html('Success !');
				window.location = data;
			  }
			  $('button.submit-btn').prop('disabled',false);
		   }

		  });

	});


	// LOGIN FORM ENDS


	// FORGOT FORM

	$("#forgotform").on('submit',function(e){
	  e.preventDefault();
	  $('button.submit-btn').prop('disabled',true);
	  $('.alert-info').show();
	  $('.alert-info p').html($('#authdata').val());
		  $.ajax({
		   method:"POST",
		   url:$(this).prop('action'),
		   data:new FormData(this),
		   dataType:'JSON',
		   contentType: false,
		   cache: false,
		   processData: false,
		   success:function(data)
		   {
			  if ((data.errors)) {
			  $('.alert-success').hide();
			  $('.alert-info').hide();
			  $('.alert-danger').show();
			  $('.alert-danger ul').html('');
				for(var error in data.errors)
				{
				  $('.alert-danger p').html(data.errors[error]);
				}
			  }
			  else
			  {
				$('.alert-info').hide();
				$('.alert-danger').hide();
				$('.alert-success').show();
				$('.alert-success p').html(data);
				$('input[type=email]').val('');
			  }
			  $('button.submit-btn').prop('disabled',false);
		   }

		  });

	});


	// FORGOT FORM ENDS

	// USER REGISTER NOTIFICATION

	$(document).on('click','#notf_user',function(){
	  $("#user-notf-count").html('0');
	  $('#user-notf-show').load($("#user-notf-show").data('href'));
	});

	$(document).on('click','#user-notf-clear',function(){
	  $(this).parent().parent().trigger('click');
	  $.get($('#user-notf-clear').data('href'));
	});
	
	$(document).on('click','.alert-close',function(){
		$('.alert-close').parent('.validation').hide();
	});
	
	

	// USER REGISTER NOTIFICATION ENDS

	// **************************************  AJAX REQUESTS SECTION ENDS *****************************************


})(jQuery);