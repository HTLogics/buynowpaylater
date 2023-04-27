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
					<h4>Checkout</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
			    @include('includes.admin.flash-message')
				<form action="{{ route('admin.place_order', $cart->id) }}" name="update_cart" enctype="multipart/form-data" id="update_cart" method="post">
				@csrf
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="kt-card">
											<h3 class="kt-card-heading step-title"><i class="la la-home"></i> Billing Address</h3>
											<table class="table table-borderless" style="max-width:600px">
												<tbody>
													<tr>
														<th width="45%">Name</th>
														<th width="10%">:</th>
														<td width="45%">{{$customer->firstname}} {{$customer->lastname}}</td>
													</tr>
													<tr>
														<th width="45%">Email</th>
														<th width="10%">:</th>
														<td width="45%">{{$customer->email}}</td>
													</tr>
													<tr>
														<th width="45%">Phone</th>
														<th width="10%">:</th>
														<td width="45%">{{$customer->phone}}</td>
													</tr>
													<tr>
														<th width="45%">Address</th>
														<th width="10%">:</th>
														<td width="45%">
														{{$customer->address}},
														
														@if($customer->state)
															@php
														       $state = DB::table('states')->select('iso2', 'name')->where('country_code', '=', $customer->country)->where('iso2', '=', $customer->state)->first()
															@endphp
															@if($state)
																{{$state->name}},
															@endif	
														@endif
														
														@if($customer->country)
															@php
																$country = DB::table('countries')->select('iso2', 'name')->where('iso2', '=', $customer->country)->first()
															@endphp
															@if($country)
																{{$country->name}},
															@endif
														@endif	
														
														{{$customer->zip}}
														</td>
													</tr>
												</tbody>
											</table>
											<input type="hidden" name="customer_id" value="{{$customer->id}}"/>
											<input type="hidden" name="customer_name" value="{{$customer->firstname}} {{$customer->lastname}}"/>
											<input type="hidden" name="customer_email" value="{{$customer->email}}"/>
											<input type="hidden" name="customer_phone" value="{{$customer->phone}}"/>
											<input type="hidden" name="customer_address" value="{{$customer->address}}"/>
											<input type="hidden" name="customer_state" value="{{$customer->state}}"/>
											<input type="hidden" name="customer_country" value="{{$customer->country}}"/>
											<input type="hidden" name="customer_zip" value="{{$customer->zip}}"/>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="kt-card">
											<h3 class="kt-card-heading step-title"><i class="la la-credit-card"></i> Payment Type</h3>
											<div class="checkout-payment-method">											
												<input type="hidden" name="payment_method" value="razorpay" checked/> 
												<label for="payment_method">
													<!--<img src="{{asset('public/assets/admin/media/razorpay.png')}}"/>-->
													EMI (Easy Installments)<br>
													<small>Pay 25% today and 75% on installments</small>
												</label>
											</div>
											<div class="checkout-payment-method">
												<label>Select Subscription</label>
												<select name="subscription_id" class="form-control">
													<option value="">--Choose Subscription--</option>
													@foreach($subscriptions as $subscription)
														<option value="{{$subscription->subscription_id}}">{{$subscription->subscription_id}}</option>
													@endforeach
												</select>
											</div>
											<!--<div class="checkout-payment-method">
												<button class="btn btn-primary" type="button" name="create_subscription" id="create_plan"><i class="la la-plus"></i> Create New Subscription</button> 
											</div>-->
										</div>
									</div>	
								</div>								
								<table class="table table-striped- table-bordered table-hover table-checkable dtr-inline" id="product-items">
									<thead>
									    <tr>
											<td colspan="4" class="kt-card-heading step-title">
												<i class="la la-check-circle"></i> Order Summary
											</td>
										</td>	
										<tr>
											<th>Item Name</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										@php 
											$total_cart_value = 0;
											$total_qty = 0; 
										@endphp
										@if(count($cart_items)>0)
											@foreach($cart_items as $cart_item)
											<tr id="row{{$cart_item->product_id}}">
												@php 
													$item_data = DB::table('products')->select('id','name', 'price')->where('id', '=', $cart_item->product_id)->first();
												@endphp
												<td><input type="hidden" name=product_id[] value="{{$cart_item->product_id}}"/><input type="hidden" name=product_name[] value="{{$item_data->name}}"/>{{$item_data->name}}</td>
												<td><input type="hidden" name=price[] value="{{number_format($item_data->price,2)}}" min=1 max=100 />{{number_format($item_data->price,2)}}</td>
												@php 													
													$total_qty = $total_qty+$cart_item->qty;
												@endphp
												<td><input type="hidden" name=qty[] value="{{$cart_item->qty}}" min=1 max=100 />{{$cart_item->qty}}</td>
												@php 
													$total_cart_value = $total_cart_value + $cart_item->qty * $item_data->price;
												@endphp
												<td>{{number_format($cart_item->qty * $item_data->price,2)}}</td>
											</tr>
											@endforeach
										@else
											<tr>
												<td colspan="4" rowspan="2"><center style="color: red; line-height: 40px;">Oops! your cart is empty. Add items from <a href="{{route('admin.Generate_bill')}}">here</a></center></td>
											</tr>
										@endif	
									</tbody>
									@if(count($cart_items)>0)
									<tfoot>
										<tr>
											<td colspan="2"></td>
											<th>Total</th>											
											<td>{{number_format($total_cart_value,2)}}</td>
										</tr>
									</tfoot>
									<input type="hidden" name="total_qty" value="{{$total_qty}}" />
									<input type="hidden" name="total_amount" value="{{number_format($total_cart_value,2)}}" />
									@endif	
								</table>
								@if(count($cart_items)>0)
								<div class="col-md-12 text-right mt-30">
									<div class="form-group">
                                        <a href="{{route('admin.cart', $cart->id)}}" class="btn btn-brand btn-elevate btn-icon-sm proceed-to-checkout"><i class="la la-pencil"></i> Edit Cart</a>									
										<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm proceed-to-checkout" data-label="Checkout"><i class="la la-plus"></i> Place order</button>
									</div>										
								</div>
								@endif
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
<div class="modal fade" id="subscription" tabindex="-1" role="dialog" aria-labelledby="subscriptionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Create Plan</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body" id="form-subscription">
			<center>Loading data...</center>
		</div>
    </div>
  </div>
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
				jQuery("input[name='"+key+"'],select[name='"+key+"']").css('border','1px solid red'); 
				jQuery("input[name='"+key+"'],select[name='"+key+"']").after("<small class='mes'>"+value+"</small>");
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

/*create plan*/
$('#create_plan').click(function(){
	$('#subscription').modal({
		backdrop: 'static', keyboard: false, show: true		
	});
	$('#form-subscription').html('<center>Loading data...</center>');
	jQuery.ajax({
		type: "GET",
		url: "{{route('admin.create_plan', ['customer_id'=>$customer->id,'cart_id'=>$cart->id,'amount'=>$total_cart_value])}}",
		processData: true,
		contentType: true,
		success: function(data)
		{
			$('#form-subscription').html(data);		
		}
	});
	
});
</script>

@endsection