@extends('layouts.admin')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<!--Begin::Dashboard 6-->
		<!--begin:: Widgets/Stats-->
		<div class="kt-portlet kt-portlet--height-fluid">
		    <div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h4>Razor Test</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
			    @include('includes.admin.flash-message')
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="card card-default">
											<div class="card-header">
												Laravel - Razorpay Payment Gateway Integration
											</div>
											<div class="card-body text-center">
												<form action="{{ route('admin.razor_response') }}" method="POST" >
													@csrf 
													<script src="https://checkout.razorpay.com/v1/checkout.js"
															data-key="{{ env('RAZORPAY_KEY') }}"
															data-amount="10000"
															data-buttontext="Pay 100 INR"
															data-name="Daljit Katoch"
															data-description="Razorpay payment"
															data-image="{{asset('public/assets/admin/media/razorpay.png')}}"
															data-prefill.name="ABC"
															data-prefill.email="abc@gmail.com"
															data-theme.color="#ff7529">
													</script>
												</form>

											</div>
										</div>
									</div>
								</div>								
								<div class="loader"></div>									
								<div class="form-group">
									<div id="message"></div>
								</div>								
							</div>
						</div>
				</div>
			</div>
		</div>
		<!--End::Row-->

		<!--End::Dashboard 6-->
	</div>
	<!-- end:: Content -->
</div>
@endsection

@section('scripts')
<script>
/*item remove event*/
$('body').on('click', '.remove-item', function(){
	var rowId = $(this).data('rowid');
	var url = $(this).data('url');
	jQuery.ajax({
	   type: "GET",
	   url: url,
	   processData: false,
	   dataType:'json',
	   contentType: false,
	   success: function(data)
	   {
			$(rowId).remove();		
	   }
    });
	
});

/*form submission event*/
jQuery("#update_cart").submit(function(e) {
	
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
			jQuery('#message').html(data.message);    
			var a= data['errors'];     
			jQuery.each(data.errors, function(key, value){           
				jQuery("input[name='"+key+"'],textarea[name='"+key+"']").css('border','1px solid red'); 
				jQuery("input[name='"+key+"'],textarea[name='"+key+"']").after("<small class='mes'>"+value+"</small>");
		   });
		}
		if(data.status==true){       
			jQuery("input[type=text],select,textarea").css('border','1px solid #1abb9c').delay( 2000 ).css('border','1px solid #e2e2e4');
			jQuery('#message').html(data.message);  
			jQuery("#message").fadeIn(100);
			jQuery("html, body").animate({
				scrollTop: jQuery("#message").offset().top-100
			}, 1000);
			jQuery("#message").delay(3000);
			setTimeout(function() {
			   window.location.href = data.redirect;
			}, 3000);		
		}
		jQuery('.loader').hide();			
	   }
    });
});
</script>

@endsection