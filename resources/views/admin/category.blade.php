@extends('layouts.admin')

@section('content')

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
			
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Category
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions" style="margin-left:20px">
						<a href="{{ route('admin.add_category') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							Add New Category
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
				   
					<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="items_table">
						<thead>
							<tr>
								<th>#</th>
								<th>Category</th>
								<th>Slug</th>
								<th>Parent Category</th>
								<th>Status</th>																			
								<th>Action</th>
							</tr>
						</thead>
						<tbody>						    
						<tr role="row" class="odd">
						<td tabindex="0">1</td>
						<td>Sub Category </td>
						<td class="sorting_1">sub_category</td>
						<td>Category 1</td>
						<td><div class="action-list"><span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Active</span></div></td>
						<td><a class="btn btn-sm btn-info" href="#"><i class="la la-eye"></i> View</a> <a class="btn btn-sm btn-warning" href="#"><i class="la la-edit"></i> Edit</a></td>
						</tr>
						
						<tr role="row" class="odd">
						<td tabindex="0"></td>
						<td> </td>
						<td class="sorting_1"></td>
						<td></td>
						<td></td>
						<td></td>
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
