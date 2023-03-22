@php($layoutface = "front")
@extends('layouts.'.$layoutface)
@section("content")

<section class="inner-banner" style="background-image:url('{{asset('public/assets/frontend')}}/img/banner4.jpg');">


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="banner-title">
<h1>Add New Items</h1>
</div>
</div>
</div>

</div>


</section>




<section class="home-content">
    <!-- About Start -->
    <div class="container">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
               
                <div class="col-lg-12 about-text wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="p-lg-5 pe-lg-0 ">
                        <!--<div class="text-center">
						 <h1 class="mb-4">{{ __('Login Now') }}</h1>
                <p class="text">{{ __('Welcome back, please sign in below') }}</p>
                        </div>-->
						
<div class="kt-portlet kt-portlet--height-fluid">
		    <div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h4>Add New Items</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">								
								<form action="#" name="editor" enctype="multipart/form-data" id="addItems" method="post">
								    <div class="row">		    
										<div class="col-sm-12">
										@csrf
										<div class="col-md-12 ">										
											<div class="form-group">
												<label>Name</label>										
												<input type="text" name="name" class="form-control" placeholder="Name">
											</div>
										</div>
										
										<div class="col-md-12">										
											<div class="form-group">
												<label>Choose Category</label>										
												<select name="country" class="form-control form-select" id="category">
													<option name="">Choose Category</option>
													
														<option value="category1">Category 1</option>
														<option value="category2">Category 2</option>
													
												</select>
											</div>
										</div>
												
										<div class="col-md-12">										
											<div class="form-group">
												<label>Price</label>										
												<input type="text" name="price" class="form-control" placeholder="Price">
											</div>
										</div>	
										
										<div class="col-md-12">										
											<div class="form-group">
												<label>Description</label>	
                                                <textarea class="form-control" name="description" placeholder="Description" spellcheck="false"></textarea>												
												
											</div>
										</div>

										
										
										</div>										
										<div class="col-md-12">
											<div class="form-group">											
												<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Save"> Save</button>
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
						
						
                    </div>
                </div>
            </div>
        </div>
						
    </div>
	
	

</section>




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

jQuery("#userAdd").submit(function(e) {
	
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