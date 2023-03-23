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
					<h4>Add New Items</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">								
								<form action="#" name="editor" enctype="multipart/form-data" id="addItems" method="post">
								    <div class="row">		    
										<div class="col-sm-12">
										@csrf
										<div class="col-md-12 ">										
											<div class="form-group">
												<label>Name</label>										
												<input type="text" name="name" class="form-control" placeholder="Name">
											</div>
										</div>
										<div class="col-md-12">										
											<div class="form-group">
												<label>Choose Category</label>										
												<select name="country" class="form-control form-select" id="category">
													<option name="">Choose Category</option>
													
														<option value="category1">Category 1</option>
														<option value="category2">Category 2</option>
													
												</select>
											</div>
										</div>
										<div class="col-md-12">										
											<div class="form-group">
												<label>Price</label>										
												<input type="text" name="price" class="form-control" placeholder="Price">
											</div>
										</div>											
										<div class="col-md-12">										
											<div class="form-group">
												<label>Description</label>	
                                                
												<textarea rows="10" name="description" class="form-control" id="description" placeholder="Description"></textarea>											
												
											</div>
										</div>
																			
										<div class="col-md-12">
											<div class="form-group">											
												<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Save"><i class="la la-plus"></i> Save</button>
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
<script>
// Size Section Ends
$(function(){
	var $ckfield = CKEDITOR.replace( 'description' );
	$ckfield.on('change', function() {
	  $ckfield.updateElement();         
	});

});
</script>

@endsection