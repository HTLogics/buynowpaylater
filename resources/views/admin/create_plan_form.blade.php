<form action="{{route('admin.save_plan')}}" method="post" name="create_plan" id="create_plan_form">
	<div class="form-group">
		<div class="row">
		    @csrf
		    <input type="hidden" name="customer_id" value="{{$customer_id}}">
		    <input type="hidden" name="cart_id" value="{{$cart_id}}">
			<div class="col-lg-4">Plan Name</div>
			<div class="col-lg-8"><input type="text" name="name" class="form-control" placeholder="The name known to your customer."/></div>
		</div>	
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-lg-4">Billing Cycle</div>
			<div class="col-lg-8">
				<select name="period" class="form-control">
					<option value="">select billing cyclye</option>
					<option value="monthly">monthly</option>
				</select>
			</div>
		</div>	
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-lg-4">Amount / Monthly</div>
			<div class="col-lg-8">
				<div class="input-group">
					<div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">INR</span></div>
					<input type="text" name="amount" class="form-control" placeholder="1000" value="{{$amount}}" readonly aria-describedby="basic-addon1">
				</div>
			</div>
		</div>	
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create Plan</button>
	</div>
	<div class="loader"></div>									
	<div class="form-group">
		<div id="message"></div>
	</div>
</form>
<script>
/*form submission event*/
jQuery("#create_plan_form").submit(function(e) {
	
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
			jQuery('#create_plan_form #message').html(data.message);    
			var a= data['errors'];     
			jQuery.each(data.errors, function(key, value){           
				jQuery("#create_plan_form input[name='"+key+"'],#create_plan_form  textarea[name='"+key+"'],#create_plan_form  select[name='"+key+"']").css('border','1px solid red'); 
				jQuery("#create_plan_form  input[name='"+key+"'],#create_plan_form textarea[name='"+key+"'],#create_plan_form  select[name='"+key+"']").after("<small class='mes'>"+value+"</small>");
		   });
		}
		if(data.status==true){       
			jQuery("#create_plan_form input[type=text],select,textarea").css('border','1px solid #1abb9c').delay( 2000 ).css('border','1px solid #e2e2e4');
			jQuery('#create_plan_form #message').html(data.message);  
			jQuery("#create_plan_form #message").fadeIn(100);
			jQuery("html, body").animate({
				scrollTop: jQuery("#create_plan_form #message").offset().top-100
			}, 1000);
			jQuery("#message").delay(3000);
			jQuery.ajax({
				type: "GET",
				url: data.url,
				processData: true,
				contentType: true,
				success: function(data)
				{
					$('#form-subscription').html(data);		
				}
			});		
		}
		jQuery('.loader').hide();			
	   }
    });
});
</script>