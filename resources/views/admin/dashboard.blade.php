@extends('layouts.admin')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

		<!--Begin::Dashboard 6-->

		<!--begin:: Widgets/Stats-->
		<div class="kt-portlet">
			<div class="kt-portlet__body  kt-portlet__body--fit">
				<div class="row row-no-padding row-col-separator-lg">
				@if(Session::has('cache'))
				<div class="alert alert-success validation" style="width: 100%; padding-left: 20px; margin: 10px 10px 10px 10px;">        
					<strong>{{ Session::get("cache") }}</strong>
				</div>
				@endif	
				</div>				
			</div>
		</div>
		<!--End::Row-->
		
		<!--Begin::Row-->
		<div class="row">
			<div class="col-xl-12">

				<!--begin:: Widgets/Quick Stats-->
				<div class="row row-full-height">
					<div class="col-sm-12 col-md-12 col-lg-6">					
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-success">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">{{$pendingorders}}</span> 
										<span class="kt-widget26__desc">Orders Pending!</span>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-brand">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">{{$completedorders}}</span>
										<span class="kt-widget26__desc">Orders Completed!</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--end:: Widgets/Quick Stats-->
			</div>
		</div>
        <div class="row">
			<div class="col-xl-12">

				<!--begin:: Widgets/Quick Stats-->
				<div class="row row-full-height">
					<div class="col-sm-12 col-md-12 col-lg-6">					
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-success">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">{{$totalproducts}}</span> 
										<span class="kt-widget26__desc">Total Products!</span>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-warning">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">{{$totalcutomers}}</span>
										<span class="kt-widget26__desc">Total Customers!</span>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>

				<!--end:: Widgets/Quick Stats-->
			</div>
		</div>
        <div class="row">
			<div class="col-xl-12">

				<!--begin:: Widgets/Quick Stats-->
				<div class="row row-full-height">
					<div class="col-sm-12 col-md-12 col-lg-3">					
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-success">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="c-info-box-area">
										<div class="c-info-box box1">
											<p>{{$totalcutomers_last30days}}</p>
										</div>
										<div class="c-info-box-content">
											<h6 class="title">New Customers</h6>
											<p class="text">Last 30 Days</p>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-3">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-warning">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="c-info-box-area">
										<div class="c-info-box box2">
											<p>{{$totalcutomers}}</p>
										</div>
										<div class="c-info-box-content">
											<h6 class="title">Total Customers</h6>
											<p class="text">All Time</p>
										</div>
									</div>
								</div>
							</div>
						</div>						
					</div>
					<div class="col-sm-12 col-md-12 col-lg-3">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-brand">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="c-info-box-area">
										<div class="c-info-box box3">
											<p>{{$totalorders_last30days}}</p>
										</div>
										<div class="c-info-box-content">
											<h6 class="title">Total Orders</h6>
											<p class="text">Last 30 Days</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-3">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-brand">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="c-info-box-area">
										<div class="c-info-box box4">
											<p>{{$totalorders}}</p>
										</div>
										<div class="c-info-box-content">
											<h6 class="title">Total Orders</h6>
											<p class="text">All Time</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end:: Widgets/Quick Stats-->
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<!--begin:: Widgets/Order Statistics-->
				<div class="kt-portlet kt-portlet--height-fluid">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Recent Items
							</h3>
						</div>
					</div>
					
					<div class="kt-portlet__body kt-portlet__body--fluid">
						<div class="kt-widget12">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<td style="width:30%">Name</td>
											<td style="width:24%">Sku</td>
											<td style="width:15%">Price</td>
											<td style="width:15%">Status</td>
											<td style="width:15%" class="kt-align-right">Action</td>
										</tr>
									</thead>
									<tbody>
									    @foreach($products as $product)
										<tr style="line-height: 32px;">
											<td>
												<a href="{{route('admin.edit_item', $product->id)}}" class="kt-widget11__title">{{$product->name}}</a>
											</td>
											<td>{{$product->sku}}</td>
											<td>{{$product->price}}</td>
											<td>
											@if($product->status == 1)
												<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Enable</span>
											@else
												<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Disable</span>
											@endif
											</td>
											<td class="kt-align-right kt-font-brand kt-font-bold"><a class="btn btn-sm btn-success" href="{{route('admin.edit_item', $product->id)}}"><i class="la la-eye"></i></a></td>
										</tr>	
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!--end:: Widgets/Order Statistics-->
			</div>
			<div class="col-md-6">
				<!--begin:: Widgets/Order Statistics-->
				<div class="kt-portlet kt-portlet--height-fluid">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Recent Customers
							</h3>
						</div>
					</div>
					
					<div class="kt-portlet__body kt-portlet__body--fluid">
						<div class="kt-widget12">
							<table class="table">
									<thead>
										<tr>
											<td style="width:20%">First Name</td>
											<td style="width:24%">Email</td>
											<td style="width:25%">Join Date</td>
											<td style="width:15%" class="kt-align-right">Action</td>
										</tr>
									</thead>
									<tbody>
									    @foreach($customers as $customer)
										<tr style="line-height: 32px;">
											<td>{{$customer->firstname}} {{$customer->lastname}}</td>									
											<td>{{$customer->email}}</td>
											<td>{{$customer->created_at}}</td>											
											<td class="kt-align-right kt-font-brand kt-font-bold"><a class="btn btn-sm btn-success" href="{{route('admin.edit_customer', $customer->id)}}"><i class="la la-eye"></i></a></td>
										</tr>	
										@endforeach
									</tbody>
								</table>
						</div>
					</div>
				</div>

				<!--end:: Widgets/Order Statistics-->
			</div>
		</div>
		<!--End::Dashboard 6-->
	</div>

	<!-- end:: Content -->
</div>

@endsection
@section('scripts')

@endsection