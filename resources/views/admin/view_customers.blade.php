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
					<h4>View Details</h4>	
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions" style="margin-left:20px">
							<a href='{{ route("admin.edit_customer", $customer->id) }}' class="btn btn-brand btn-elevate btn-icon-sm">
								<i class="la la-edit"></i>
								Edit Customer
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">
                                <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
									<tr>
										<th>First Name</th>
										<td>{{$customer->firstname}}</td>
									</tr>
									<tr>
										<th>Last Name</th>
										<td>{{$customer->lastname}}</td>
									</tr>
									<tr>
										<th>Email</th>
										<td>{{$customer->email}}</td>
									</tr>
									<tr>
										<th>Phone</th>
										<td>{{$customer->phone}}</td>
									</tr>
									<tr>
										<th>Address</th>
										<td>
										{{$customer->address}},								
										@if($customer->state)
											@php( $state = DB::table('states')->select('iso2', 'name')->where('country_code', '=', $customer->country)->where('iso2', '=', $customer->state)->first() )
										    @if($state)
												{{$state->name}},
											@endif	
										@endif
										@if($customer->country)
											@php( $country = DB::table('countries')->select('iso2', 'name')->where('iso2', '=', $customer->country)->first() )
										    @if($country)
												{{$country->name}},
											@endif	
											
										@endif	
										{{$customer->zip}}</td></tr>
									<tr><th>Created at</th><td>{{$customer->created_at}}</td></tr>
								<table>																
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