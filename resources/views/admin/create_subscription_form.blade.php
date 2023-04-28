<form action="{{route('admin.save_subscription')}}" method="post" name="create_plan" id="create_sub_form">
	<div class="form-group">
		<div class="row">
		    @csrf
		    <input type="hidden" name="customer_id" value="{{$customer_id}}">
		    <input type="hidden" name="cart_id" value="{{$cart_id}}">
			<div class="col-lg-4">Plan Id</div>
			<div class="col-lg-8">{{$plan_id}}<input type="hidden" name="plan_id" class="form-control" value="{{$plan_id}}"/></div>
		</div>	
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create Subscription</button>
	</div>
	<div class="loader"></div>									
	<div class="form-group">
		<div id="message"></div>
	</div>
</form>
<script>
/*form submission event*/
jQuery("#create_sub_form").submit(function(e) {
	
	e.preventDefault();
	jQuery('.loader').show();
	jQuery('.loader').html('<br><div class="loader-text alert alert-warning">Please wait...</div>');
	jQuery("input,select,textarea").css('border','1px solid black');
	jQuery('.mes').remove();
    var url = jQuery(this).attr('action');
	var formData = new FormData(jQuery(this)[0]);

    jQuery.ajax({
	   type: "POST",
	   url: url,
	   data:  formData, 
	   processData: false,
	   dataType:'json',
	   contentType: false,
	   success: function(data)
	   {
		console.log(data); 
		if(data.status== false){
			console.log(data);
			jQuery('#create_sub_form #message').html(data.message);    
			var a= data['errors'];     
			jQuery.each(data.errors, function(key, value){           
				jQuery("#create_sub_form input[name='"+key+"'],#create_sub_form  textarea[name='"+key+"'],#create_sub_form  select[name='"+key+"']").css('border','1px solid red'); 
				jQuery("#create_sub_form  input[name='"+key+"'],#create_sub_form textarea[name='"+key+"'],#create_sub_form  select[name='"+key+"']").after("<small class='mes'>"+value+"</small>");
		   });
		}
		if(data.status==true){
			
			jQuery("#create_sub_form input[type=text],select,textarea").css('border','1px solid #1abb9c').delay( 2000 ).css('border','1px solid #e2e2e4');
			jQuery('#create_sub_form #message').html(data.message);  
			jQuery("#create_sub_form #message").fadeIn(100);
			jQuery("html, body").animate({
				scrollTop: jQuery("#create_sub_form #message").offset().top-100
			}, 1000);
			jQuery("#message").delay(3000);
			jQuery.ajax({
				type: "GET",
				url: "{{route('admin.get_subscriptions_select')}}?customer_id={{$customer_id}}&cart_id={{$cart_id}}",
				success: function(data)
				{
					jQuery('select[name="subscription_id"]').html(data);		
				}
			});				
		}
		jQuery('.loader').hide();
		$('#subscription').modal('hide');
	   }
    });
});
</script>