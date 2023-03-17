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
					<div class="col-sm-12 col-md-12 col-lg-4">					
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-success">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">19</span> 
										<span class="kt-widget26__desc">Orders Pending!</span>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-warning">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">10</span>
										<span class="kt-widget26__desc">Orders Processing!</span>
									</div>
								</div>
							</div>
						</div>						
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-brand">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">10</span>
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
					<div class="col-sm-12 col-md-12 col-lg-4">					
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-success">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">10</span> 
										<span class="kt-widget26__desc">Total Products!</span>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-warning">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">10</span>
										<span class="kt-widget26__desc">Total Customers!</span>
									</div>
								</div>
							</div>
						</div>						
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4">						
						<div class="kt-portlet kt-portlet--height-fluid kt-portlet--border-bottom-brand">
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget26">
									<div class="kt-widget26__content">
										<span class="kt-widget26__number">10</span>
										<span class="kt-widget26__desc">Total Posts!</span>
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
											<p>20</p>
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
											<p>20</p>
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
											<p>20</p>
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
											<p>20</p>
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
		<!--End::Dashboard 6-->
	</div>

	<!-- end:: Content -->
</div>

@endsection
@section('scripts')

@endsection