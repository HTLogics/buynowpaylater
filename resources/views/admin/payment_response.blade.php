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
					<h4>Payment Response</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
				<form action="" name="update_cart" enctype="multipart/form-data" id="collect_payment" method="post">
				@csrf
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="kt-card">
											<h3 class="kt-card-heading step-title"><i class="la la-credit-card"></i> Payment Status</h3>
											@include('includes.admin.flash-message')
											<table class="table table-borderless" style="max-width:600px">
												<tbody>
													<tr>
														<th width="45%">Transaction Id</th>
														<th width="10%">:</th>
														<td width="45%">{{$response->id}}</td>
													</tr>
													<tr>
														<th width="45%">Paid Amount</th>
														<th width="10%">:</th>
														<td width="45%">{{$response->amount}}</td>
													</tr>
													<tr>
														<th width="45%">Currency</th>
														<th width="10%">:</th>
														<td width="45%">{{$response->currency}}</td>
													</tr>
													<tr>
														<th width="45%">Payment Method</th>
														<th width="10%">:</th>
														<td width="45%">{{$response->method}}</td>
													</tr>
													<tr>
														<th width="45%">Payment Status</th>
														<th width="10%">:</th>
														<td width="45%">{{$response->status}}</td>
													</tr>													
													
													<tr>
														<th width="45%">Payer Email</th>
														<th width="10%">:</th>
														<td width="45%">{{$response->email}}</td>
													</tr>
													
												</tbody>
											</table>
										</div>
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

</script>

@endsection