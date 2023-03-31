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
					<h4>Payment</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">								
								<form action="#" name="editor" enctype="multipart/form-data" id="payment" method="post">
								    <div class="row">		    
										<div class="col-sm-12">	
										@csrf
										
										<div class="col-sm-6">										
											<div class="form-group">									
												<p><b>Total Amount:</b> 12000.00</p>
											</div>
										</div>
										
										<div class="col-sm-6">										
											<div class="form-group">
												<label>No. of Installments</label>										
												<input type="text" name="no_of_installments" class="form-control" placeholder="2">
											</div>
										</div>
										
										
										<div class="col-sm-6">										
											<div class="form-group">
												<label>EMI Installments</label>										
												<input type="text" name="no_of_installments" class="form-control" placeholder="6000">
											</div>
										</div>
												
										
                                       
								    </div>									
								</div>
								</form>
								
								
								<table class="table table-striped- table-bordered table-hover table-checkable dtr-inline">
								  <thead>
								  <tr class="kt-card-heading">
									<th>Item Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								  </tr>
								  </thead>
								  <tbody>
								  <tr>
									<td>Item 1</td>
									<td>120.00</td>
									<td>2</td>
									<td>240.00</td>

								  </tr>
								  <tr>
									<td>Item 2</td>
									<td>140.00</td>
									<td>3</td>
									<td>420.00</td>

								  </tr>
								  
								 
								 </tbody>
								 </table>
								 
								 <div class="col-md-12 text-right">
											<div class="form-group">											
												<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Checkout"> Pay</button>
											</div>										
										</div>
							</div>
								<div class="form-group">
									<div id="message"></div>
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