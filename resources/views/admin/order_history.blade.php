@extends('layouts.admin')

@section('content')

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
			
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Orders History
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions" style="margin-left:20px">
						<a href="{{ route('admin.Generate_bill') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							Generate Bill
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="kt-portlet__body">

			<!--begin::Section-->
			<div class="kt-section">
				
				<div class="kt-section__content">
				 @include('includes.admin.flash-message')
				   
					<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="orders_table">
						<thead>
							<tr>
								<th>Sno</th>
								<th>Order Number</th>
								<th>Customer Name</th>
								<th>Customer Email</th>
								<th>Customer Phone</th>
								<th>Order Status</th>
								<th>Total Amount</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>	
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
@section('scripts')
<script>
jQuery(function () {
    var table = $('#orders_table').DataTable({
		responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.order_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'order_number', name: 'order_number'},
            {data: 'customer_name', name: 'customer_name'},
            {data: 'customer_email', name: 'customer_email'},
            {data: 'customer_phone', name: 'customer_phone'},
            {data: 'status', name: 'status'},
            {data: 'total_amount', name: 'total_amount'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>
@endsection
