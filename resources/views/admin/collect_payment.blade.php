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
			    @include('includes.admin.flash-message')
				<form action="" name="update_cart" enctype="multipart/form-data" id="collect_payment" method="post">
				@csrf
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="kt-card">
											<h3 class="kt-card-heading step-title"><i class="la la-credit-card"></i> Payer Details</h3>
											<table class="table table-borderless" style="max-width:600px">
												<tbody>
													<tr>
														<th width="45%">Name</th>
														<th width="10%">:</th>
														<td width="45%">{{$order->customer_name}}</td>
													</tr>
													<tr>
														<th width="45%">Email</th>
														<th width="10%">:</th>
														<td width="45%">{{$order->customer_email}}</td>
													</tr>
													<tr>
														<th width="45%">Phone</th>
														<th width="10%">:</th>
														<td width="45%">{{$order->customer_phone}}</td>
													</tr>
													<tr>
														<th width="45%">Address</th>
														<th width="10%">:</th>
														<td width="45%">
														{{$order->customer_address}},
														
														@if($order->customer_state)
															@php
														       $state = DB::table('states')->select('iso2', 'name')->where('country_code', '=', $order->customer_country)->where('iso2', '=', $order->customer_state)->first()
															@endphp
															@if($state)
																{{$state->name}},
															@endif	
														@endif
														
														@if($order->customer_country)
															@php
																$country = DB::table('countries')->select('iso2', 'name')->where('iso2', '=', $order->customer_country)->first()
															@endphp
															@if($country)
																{{$country->name}},
															@endif
														@endif
														{{$order->customer_zip}}
														</td>
													</tr>
												</tbody>
											</table>
											<div class="text-center"><button id = "rzp-button1" class="btn btn-primary"  type="button">Pay Now</button></div>
										</div>
									</div>
									<div class="col-lg-12">
                                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>									
										<script src = "https://checkout.razorpay.com/v1/checkout.js"></script>
										<script>
										    var SITEURL = '{{URL::to('')}}';
										    var ORDER_ID = '{{$order->id}}';
											$.ajaxSetup({
												headers: {
													'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
												}
											}); 
										  var options = {
											"key": "{{ env('RAZORPAY_KEY') }}",
											"subscription_id": "{{$order->subscription_id}}",
											"name": "Safe Buy",
											"description": "Monthly Plan",
											"image": "{{asset('public/assets/frontend/img/safebuy-logo.webp')}}",
											/*"callback_url": "{{route('admin.payment_response')}}",*/
											"handler": function (response){
												window.location.href = SITEURL +'/'+ 'admin/payment_response?razorpay_payment_id='+response.razorpay_payment_id+'&order_id='+ORDER_ID;
											},
											"prefill": {
											  "name": "{{$order->customer_name}}",
											  "email": "{{$order->customer_email}}",
											  "contact": "{{$order->customer_phone}}"
											},											
											"theme": {
											  "color": "#2a86f3"
											}
										  };
										var rzp1 = new Razorpay(options);
										document.getElementById('rzp-button1').onclick = function(e) {
										  rzp1.open();
										  e.preventDefault();
										}
										</script>
									</div>	
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
$('#rzp-button1').trigger('click');
</script>

@endsection