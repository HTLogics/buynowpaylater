@extends('layouts.admin')

@section('content')

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
															<h3 class="kt-card-heading">Order Details</h3>
															<div class="table-responsive-sm">
																<table class="table table-borderless">
																	<tbody>
																		<tr>
																			<th class="45%" width="45%">Order ID</th>
																			<th width="10%">:
																			</th><td class="45%" width="45%">#1001</td>
																		</tr>
																		<tr>
																			<th width="45%">Ordered Date</th>
																			<th width="10%">:
																			</th><td width="45%">2023-03-31 06:21:36</td>
																		</tr>
																																																						
																		<tr>
																			<th width="45%">Total Amount</th>
																			<th width="10%">:
																			</th><td width="45%">R 12000.00</td>
																		</tr>															
																		
																		<tr>
																			<th width="45%">Payment Method</th>
																			<th width="10%">:
																			</th><td width="45%">Credit cards</td>
																		</tr>
																		<tr>
																			<th width="45%">Payment Status</th>
																			<th width="10%">:</th>
																			<td width="45%"><span class="badge badge-success">Paid</span></td>
																		</tr>
																		
																	</tbody>
																</table>
															</div>
														</div>		
													</div>
													<div class="col-lg-6">
														<div class="kt-card">
															<h3 class="kt-card-heading">Billing Details</h3>
															<table class="table table-borderless">
																<tbody>
																	<tr>
																		<th width="45%">Name</th>
																		<th width="10%">:</th>
																		<td width="45%">abc</td>
																	</tr>
																	<tr>
																		<th width="45%">Email</th>
																		<th width="10%">:</th>
																		<td width="45%">abc@gmail.com</td>
																	</tr>
																	<tr>
																		<th width="45%">Phone</th>
																		<th width="10%">:</th>
																		<td width="45%">0123456789</td>
																	</tr>
																	<tr>
																		<th width="45%">Address</th>
																		<th width="10%">:</th>
																		<td width="45%">123 Lorem Ipsum Cont</td>
																	</tr>
																	<tr>
																		<th width="45%">Country</th>
																		<th width="10%">:</th>
																		<td width="45%">xyz</td>
																	</tr>
																	<tr>
																		<th width="45%">City</th>
																		<th width="10%">:</th>
																		<td width="45%">abcd</td>
																	</tr>
																	<tr>
																		<th width="45%">Postal Code</th>
																		<th width="10%">:</th>
																		<td width="45%">0123</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											
												<div class="row">
													<div class="col-lg-12">
														<div class="kt-invoice-card">
															<h3 class="kt-card-heading"> Ordered</h3>
															<div class="table-responsive-sm">
																<table class="table table-borderless invoice-products">
																	<tbody>
																		<tr>
																			<th width="20%">ID</th>
																			<th>Name</th>
																			<th width="20%">Qty</th>
																			<th width="20%">Price</th>
																			<th width="20%" style="text-align: right;">Total Price</th>
																		</tr>
																																																						<tr>
																			<td width="20%">1
																			</td><td>abc
																			</td><td width="20%"><b>Qty</b>: 1
																			</td><td width="20%"><b>Price</b>: R 12000.00
																																		
																			</td><td width="20%" style="text-align: right;">R 12000.00</td>
																		</tr>
																																																					</tbody>
																	<tfoot>
																		
																																																																
																		
																																																						<tr>
																			<td colspan="3"></td>
																			<th>Total</th>
																			<td>R 12000.00
																			</td>
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