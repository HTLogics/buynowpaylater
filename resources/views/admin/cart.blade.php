@extends('layouts.admin')

@section('content')
<style>
button#add-items-to-bill, .btn.proceed-to-checkout {
    height: 56px;
    margin-top: -3px;
}
.select-item-qty {
    height: 58px;
    margin-top: -4px;
}
.btn.proceed-to-checkout{
	line-height: 34px;
    padding: 10px 20px;
}
span.select2-selection.select2-selection--single.error {
    border: 1px solid red;
}
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<!--Begin::Dashboard 6-->
		<!--begin:: Widgets/Stats-->
						
		<div class="kt-portlet kt-portlet--height-fluid">
		    <div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h4>Cart</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
			    <form action="{{ route('admin.save_cart') }}" name="generate_bill" enctype="multipart/form-data" id="generateBill" method="post">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">
									<table class="table table-striped- table-bordered table-hover table-checkable dtr-inline" id="product-items">
										<thead>
											<tr class="kt-card-heading">
												<th>Item Name</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<tr class="no-product"">
												<td colspan="4"><center>no product added.</center></td>
											</tr>
										</tbody>
									</table>
								 
									<div class="col-md-12 text-right">
										<div class="form-group">	
											<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm proceed-to-checkout" data-label="Add Product">Save Cart & Next <i class="la la-arrow-right"></i></button>
										</div>										
									</div>
                                    <div class="loader"></div>									
									<div class="form-group">
										<div id="message"></div>
									</div>								
							</div>
						</div>
				</div>
				</form>
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
$("#country").on("change", function(){
	var country_code = this.value;
	$.ajax({
		url: "{{ route('admin.login') }}/states/"+country_code,
		success: function(data){
			jQuery('#state').html(data);
		}
	});
});
$(".form-select").select2({
	containerCssClass: "customer",
	ajax: {
	  url: "{{route('admin.search_customer')}}",
	  dataType: 'json',	  
	},
});
$("#item").select2({
	ajax: {
	  url: "{{route('admin.search_item')}}",
	  dataType: 'json',
	},
});

//add items
$('#add-items-to-bill').on('click', function(e){
	e.preventDefault();
	var item_id = $("#item").val();
	var item_name = $("#item option:selected").text();
	var item_qty = $("#qty").val();	
	$.ajax({
		url: "{{route('admin.login')}}/get_item/"+item_id,
		dataType: 'json',
		success: function(data){
			
            $('.no-product').hide();
			$("tr.product-row").each( function () {
				var pid = $(this).data("id")
				if(pid == item_id){
					var getOldqty  = $(this).find("td:eq(2)").text();
					item_qty = parseInt(item_qty)+parseInt(getOldqty);
					$(this).remove();
					return false;
				}
			});

			$('#product-items tr:last').after('<tr class="product-row" data-id="'+data.product.id+'"><td><input type="hidden" name="id[]" value="'+data.product.id+'">'+data.product.name+'</td><td>'+data.product.price+'</td><td class="qty">'+item_qty+'<input type="hidden" name="qty[]" value="'+item_qty+'"></td><td>'+parseInt(item_qty)*parseFloat(data.product.price)+'</td></tr>');
				
						

				
		    
		}
	});
});


jQuery("#generateBill").submit(function(e) {
	
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
					if(key == "customer"){ 
						$("span.select2-selection.select2-selection--single.customer").css("border","1px solid red");
						jQuery("span.select2-selection.select2-selection--single.customer").after("<small class='mes'>"+value+"</small>");
					    
					}
					if(key == "id"){
						alert('Select atleast one product to proceed.')
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