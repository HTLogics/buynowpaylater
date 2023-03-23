@extends('layouts.admin')

@section('content')

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
			
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Order History
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions" style="margin-left:20px">
						<!--<a href="{{ route('admin.add_category') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							Add New Category
						</a>-->
					</div>
				</div>
			</div>
		</div>
		
		<div class="kt-portlet__body">

			<!--begin::Section-->
			<div class="kt-section">
				
				<div class="kt-section__content">
				 @include('includes.admin.flash-message')
				   
					<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="items_table">
						<thead>
							<tr>
								<th>Order Id</th>
								<th>Customer Name</th>
								<th>Order Status</th>
								<th>Amount</th>	
                                <th>Status</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>						    
						<tr role="row" class="odd">
						<td tabindex="0">#1001</td>
						<td>abc</td>
						<td>open</td>
						<td>12000.00</td>
						<td><span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--lg">Processing</span></td>
						<td><a class="btn btn-sm btn-info" href="#"><i class="la la-eye"></i> View</a> </td>
						</tr>
						
						
						</tbody>
					</table>
				</div>
			</div>

			<!--end::Section-->
			
		</div>
	</div>
	<!--end::Portlet-->
</div>
<!-- end:: Content -->
@endsection
