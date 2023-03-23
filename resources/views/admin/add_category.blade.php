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
					<h4>Add Category</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">								
								<form action="#" name="editor" enctype="multipart/form-data" id="customerAdd" method="post">
								    <div class="row">		    
										<div class="col-sm-12">
										@csrf
										<div class="col-md-12 ">										
											<div class="form-group">
												<label>Category Name</label>										
												<input type="text" name="category_name" class="form-control" placeholder="Category Name">
											</div>
										</div>
										<div class="col-md-12 ">										
											<div class="form-group">
												<label>Slug</label>										
												<input type="text" name="slug" class="form-control" placeholder="Slug">
											</div>
										</div>
										
										<div class="col-md-12">										
											<div class="form-group">
												<label>Select Parent Category</label>										
												<select name="country" class="form-control form-select" id="country">
													<option name="">Select Parent</option>
													
														<option value="Country">Category 1</option>
													
												</select>
											</div>
										</div>
																			
										<div class="col-md-12">										
											<div class="form-group">
												<label>Status</label>
												<select name="status" class="form-control form-select">
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
											</div>
										</div>										
										<div class="col-md-12">
											<div class="form-group">											
												<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Add Customer"><i class="la la-plus"></i> Add Category</button>
											</div>										
										</div>
									</div>									
								</div>
								</form>
									<div class="form-group">
									<div id="message"></div>
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
</div>




@endsection

@section('scripts')
<script src="{{ asset('public/assets/admin/ckeditor/ckeditor.js')}}"></script>


@endsection