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
					<h4>Edit Customer Details</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">								
								<form action="{{ route('admin.update_customer') }}" name="editor" enctype="multipart/form-data" id="customerEdit" method="post">
								    <div class="row">		    
										<div class="col-lg-12">
										@csrf
										<input type="hidden" name="id" value="{{$customer->id}}">
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>First Name*</label>										
												<input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{$customer->firstname}}">
											</div>
										</div>
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>Last Name*</label>										
												<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{$customer->lastname}}">
											</div>
										</div>
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>Email*</label>
												<input type="email" name="email" class="form-control" placeholder="Email Address" value="{{$customer->email}}">
											</div>
										</div>										
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>Phone</label>
												<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{$customer->phone}}">
											</div>
										</div>
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>Address</label>										
												<input type="text" name="address" class="form-control" placeholder="Address" value="{{$customer->address}}">
											</div>
										</div>
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>Country</label>										
												<select name="country" class="form-control" id="country">
													<option value="">Select Country</option>
													@foreach($countries as $country)
														<option value="{{$country->iso2}}" @if($customer->country == $country->iso2) selected @endif>{{$country->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>State</label>										
												<select name="state" class="form-control" id="state">
													<option name="">Select State</option>
													@if($customer->state)
														@php( $states = DB::table('states')->select('iso2','country_code', 'name')->where('country_code', '=', $customer->country)->get() )
													    @foreach($states as $state)
															<option value="{{$state->iso2}}" @if($customer->state == $state->iso2) selected @endif>{{$state->name}}</option>
														@endforeach
													@endif	
												</select>
											</div>
										</div>																				
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>Zip</label>										
												<input type="text" name="zip" class="form-control" placeholder="Zip Code" value="{{$customer->zip}}">
											</div>
										</div>										
										<div class="col-md-12 mb-5">										
											<div class="form-group">
												<label>Status</label>
												<select name="status" class="form-control">
													<option value="1" @if($customer->status == 1) selected @endif>Active</option>
													<option value="0" @if($customer->status == 0) selected @endif>Inactive</option>
												</select>
											</div>
										</div>
										<div class="col-md-12 mb-5">
											<div class="form-group">											
												<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Add Page"><i class="la la-pencil"></i> Edit User</button>
											</div>										
										</div>
									</div>									
								</div>
								</form>
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
<script src="{{ asset('public/assets/admin/ckeditor/ckeditor.js')}}"></script>
<script>
$("#country").on("change", function(){
	var country_code = this.value;
	$.ajax({
		url: "{{ route('admin.login') }}/states/"+country_code,
		success: function(data){
			jQuery('#state').html(data);
		}
	});
});
$('#image-upload').on('change', function(){
	var file = $(this).get(0).files[0]; 
	if(file){
		var reader = new FileReader(); 
		reader.onload = function(){
			$(".post-featured > img").attr("src", reader.result);
		} 
		reader.readAsDataURL(file);
	}
});

jQuery("#customerEdit").submit(function(e) {
	
	e.preventDefault();
	
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
           
            if(data.status== false){
				
				jQuery('#message').html(data.message);    
				var a= data['errors'];     
               jQuery.each(data.errors, function(key, value){           
					jQuery("input[name='"+key+"'],select[name='"+key+"'],textarea[name='"+key+"']").css('border','1px solid red'); 
					jQuery("input[name='"+key+"'],select[name='"+key+"'],textarea[name='"+key+"']").after("<small class='mes'>"+value+"</small>");
					if(key == "for_id"){ 
						$("span.select2-selection.select2-selection--single").css("border","1px solid red")
						jQuery("span.select2-selection.select2-selection--single").after("<small class='mes'>"+value+"</small>");
					}
               });
            }
			if(data.status==true){       
				jQuery("input[type=text],select,textarea").css('border','1px solid #1abb9c').delay( 2000 ).css('border','1px solid #e2e2e4');
				jQuery("input[type=text],select,textarea").val('');				
				jQuery('#message').html(data.message);  
				jQuery("#message").fadeIn(100);
				jQuery("html, body").animate({
					scrollTop: jQuery("#message").offset().top-100
				}, 1000);
				jQuery("#message").delay(3000);
				jQuery("#message").fadeOut(100);
                setTimeout(function() {
                   window.location.href = data.redirect;
                }, 3000);		
			}             
           }
         });
});
$(function(){
	var $ckfield = CKEDITOR.replace( 'details' );
	$ckfield.on('change', function() {
	  $ckfield.updateElement();         
	});
});
</script>

@endsection