@extends('layouts.admin')
@section('content')
<style>
.step-title-2 {
    background-color: #f2f2f2;
    padding: 12px 10px 12px 12px !important;
    font-weight: bold !important;
    font-size: 14px !important;
    color: #333333 !important;
    text-transform: uppercase;
    line-height: 30px;
}
</style>
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
	<!--Begin::Dashboard 6-->
	<!--begin:: Widgets/Stats-->
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<div id="message"></div>
				</div>
			</div>		    
			<div class="col-lg-12">
				<div class="kt-portlet kt-portlet--height-fluid">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Order Details
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="panel panel-success col-h">
							<div class="panel panel-success col-h">							
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-6">
													<div class="kt-card">
														<h3 class="kt-card-heading step-title">Order Details</h3>
														<div class="table-responsive-sm">
															<table class="table table-borderless">
																<tbody>
																	<tr>
																		<th class="45%" width="45%">Order ID</th>
																		<th width="10%">:
																		</th><td class="45%" width="45%">#{{$order_data->order_number}}</td>
																	</tr>
																	<tr>
																		<th width="45%">Ordered Date</th>
																		<th width="10%">:
																		</th><td width="45%">{{$order_data->created_at}}</td>
																	</tr>															
																	<tr>
																		<th width="45%">Total Amount</th>
																		<th width="10%">:
																		</th><td width="45%">{{number_format($order_data->total_amount, 2)}}</td>
																	</tr>
																	<tr>
																		<th width="45%">Payment Gateway</th>
																		<th width="10%">:
																		</th><td width="45%">{{$order_data->method}}</td>
																	</tr>
																	<tr>
																		<th width="45%">Payment Type</th>
																		<th width="10%">:
																		</th><td width="45%">{{$order_data->method_type}}</td>
																	</tr>																	
																	<tr>
																		<th width="45%">Payment Status</th>
																		<th width="10%">:</th>
																		<td width="45%"><span class="badge badge-success">{{$order_data->payment_status}}</span></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>		
												</div>
												<div class="col-lg-6">
													<div class="kt-card">
														<h3 class="kt-card-heading step-title">Billing Details</h3>
														<table class="table table-borderless">
															<tbody>
																<tr>
																	<th width="45%">Name</th>
																	<th width="10%">:</th>
																	<td width="45%">{{$order_data->customer_name}}</td>
																</tr>
																<tr>
																	<th width="45%">Email</th>
																	<th width="10%">:</th>
																	<td width="45%">{{$order_data->customer_email}}</td>
																</tr>
																<tr>
																	<th width="45%">Phone</th>
																	<th width="10%">:</th>
																	<td width="45%">{{$order_data->customer_phone}}</td>
																</tr>
																<tr>
																	<th width="45%">Address</th>
																	<th width="10%">:</th>
																	<td width="45%">{{$order_data->customer_address}}</td>
																</tr>
																<tr>
																	<th width="45%">Country</th>
																	<th width="10%">:</th>
																	<td width="45%">
																	@if($order_data->customer_country)
																		
																		@php
																			$country = DB::table('countries')->select('iso2', 'name')->where('iso2', '=', $order_data->customer_country)->first()
																		@endphp
																		@if($country)
																			{{$country->name}}
																		@endif	
																		
																	@endif
																	</td>
																</tr>
																<tr>
																	<th width="45%">State</th>
																	<th width="10%">:</th>
																	<td width="45%">
																	@if($order_data->customer_state)
																		@php
																			$state = DB::table('states')->select('iso2', 'name')->where('country_code', '=', $order_data->customer_country)->where('iso2', '=', $order_data->customer_state)->first()
																		@endphp
																		@if($state)
																			{{$state->name}}
																		@endif	
																	@endif
																	</td>
																</tr>
																<tr>
																	<th width="45%">Postal Code</th>
																	<th width="10%">:</th>
																	<td width="45%">{{$order_data->customer_zip}}</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											@if($subscription != "")
											<!--<div class="row">
												<div class="col-lg-12">
													<div class="kt-card">
														<h3 class="kt-card-heading step-title">Subscription Details</h3>
														<div class="table-responsive-sm">
														    <div class="col-lg-12">
																<table class="table table-striped- table-bordered">
																	<tr class="step-title-2">
																		<td colspan="2">Plan</td>
																	</tr>    
																	<tr>
																		<th>Plan Id</th>
																		<td>{{$subscription->plan_id}}</td>
																	</tr>
																	<tr>
																		<th>Plan Name</th>
																		<td>{{$plan->item->name}}</td>
																	</tr>
																	<tr>
																		<th>Amount</th>
																		<td>{{$plan->item->currency}} {{number_format($plan->item->amount/100, 2)}}</td>
																	</tr>
																	<tr class="step-title-2">
																		<td colspan="2">Subscription</td>
																	</tr>
																	<tr>
																		<th>Subscription Id</th>
																		<td>{{$subscription->id}}</td>
																	</tr>
																	<tr>
																		<th>Status</th>
																		<td>
																		@if($subscription->status == 'active' || $subscription->status == 'completed')
																			<span class="badge badge-success ">{{$subscription->status}}</span>	
																		@elseif($subscription->status == 'cancelled' || $subscription->status == 'paused' || $subscription->status == 'expired' ||  $subscription->status == 'halted' || $subscription->status == 'pause')
																		    <span class="badge badge-danger">{{$subscription->status}}</span>
																		@else
																			<span class="badge badge-secondary ">{{$subscription->status}}</span>	
																		@endif	
																		</td>
																	</tr>
																	<tr>
																		<th>No of Installments</th>
																		<td>{{$subscription->total_count}}</td>
																	</tr>
																	<tr>
																		<th>No of Paid Installment</th>
																		<td>{{$subscription->paid_count}}</td>
																	</tr>
																	<tr>
																		<th>Subscription Type</th>
																		<td>{{$plan->period}}</td>
																	</tr>
																	<tr>
																		<th>Created Date</th>
																		<td>{{date('d M Y H:i:s', $subscription->created_at)}}</td>
																	</tr>
																</table>
																<div class="table-responsive-sm" style="overflow-x:auto;">
																	<table class="table table-striped- table-bordered">
																		<tr class="step-title-2">
																			<td colspan="7">Transaction details</td>
																		</tr>
																		<tr>
																			<th>Id</th>
																			<th>Order Id</th>
																			<th>Subscription Id</th>
																			<th>Payment Id</th>
																			<th>Status</th>
																			<th>Issued At</th>
																			<th>Paid At</th>
																		</tr>
																		@foreach($invoices->items as $invoice)
																		<tr>
																			<td>{{$invoice->id}}</td>
																			<td>{{$invoice->order_id}}</td>	
																			<td>{{$invoice->subscription_id}}</td>	
																			<td>{{$invoice->payment_id}}</td>	
																			<td>{{$invoice->status}}</td>	
																			<td>{{date('d M Y H:s:i', $invoice->issued_at)}}</td>
																			<td>{{date('d M Y H:i:s', $invoice->paid_at)}}</td>
																		</tr>
																		@endforeach
																	</table>
																</div>
															</div>
														</div>
													</div>		
												</div>
											</div>-->
											@endif;
											<div class="row">
												<div class="col-lg-12">
													<div class="kt-invoice-card">
														<div class="table-responsive-sm">
															<table class="table table-striped- table-bordered table-hover table-checkable dtr-inline">
															    <thead>
																	<tr>
																		<td colspan="5" class="kt-card-heading step-title">
																			<i class="la la-check-circle"></i> Products Ordered
																		</td>
																	</tr>
																	<tr>
																		<td width="20%">Sno</td>
																		<td>Name</td>
																		<td width="20%">Qty</td>
																		<td width="20%">Price</td>
																		<td width="20%">Total Price</td>
																	</tr>
																</thead>
																<tbody>	
																	@php
																		$subtotal = 0;
																		$tax = 0;
																		$i = 0;
																	@endphp
																	@foreach($order_items as $order_item)
																	@php
																		$i++
																	@endphp
																	<tr>
																		<td width="20%">{{$i}}</th>
																		<td>{{$order_item['product']}}</th>
																		<td width="20%">{{$order_item['qty']}}</th>
																		<td width="20%">{{number_format( $order_item['price'], 2)}}</th>
																		@php
																			$total_product_cost = $order_item['price']*$order_item['qty'];
																		@endphp															
																		<td width="20%"> {{number_format($total_product_cost, 2)}}</td>
																	</tr>
																	@php
																		$subtotal += round($total_product_cost, 2);
																	@endphp
																	@endforeach
																</tbody>
																<tfoot>
																	<tr>
																		<td colspan="3"></td>
																		<th>Subtotal</th>
																		<td>{{ number_format($subtotal, 2) }}</td>
																	</tr>																	
																	<tr>
																		<td colspan="3"></td>
																		<th>Total</th>
																		<td>{{ number_format($order_data->total_amount, 2) }}
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>		
												</div>
											</div>
										</div>										
									</div>							
								</div>
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
@endsection
