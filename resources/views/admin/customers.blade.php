@extends('layouts.admin')

@section('content')

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
			
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Customers
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions" style="margin-left:20px">
						<a href="{{ route('admin.add_customer') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							Create Customer
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
					<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="customers_table">
						<thead>
							<tr>
								<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>							
								<th>Phone</th>							
								<th>Status</th>							
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
function confirm_del(id){
	  var r = confirm("Do you want to delete?");
	  if (r == true) {
		  window.location.href = "{{ route('admin.login') }}/delete_customer/"+id;
	  } else {
		  //do nothing
	 }
}

// begin first table
jQuery(function () {
    var table = $('#customers_table').DataTable({
		responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.customersdata') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'firstname', name: 'firstname'},
            {data: 'lastname', name: 'lastname'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>
@endsection