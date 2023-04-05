@extends('layouts.admin')

@section('styles')
<script src="{{ asset('public/assets/admin/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<!--Begin::Dashboard 6-->
		<!--begin:: Widgets/Stats-->
		<div class="kt-portlet kt-portlet--height-fluid">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add Category Details
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions" style="margin-left:20px">
							<a href="{{ route('admin.category') }}" class="btn btn-brand btn-elevate btn-icon-sm">
								<i class="la la-arrow-left"></i>
								Back To Categories
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">								
								<form action="{{ route('admin.updatecategory') }}" name="editor" enctype="multipart/form-data" id="categoryAdd" method="post">
								    @csrf
									<input type="hidden" name="id" value="{{$category->id}}">
								    <div class="col-md-12 mb-5">										
										<div class="form-group">
											<label>Category Name</label>										
											<input type="text" name="name" class="form-control" value="{{$category->name}}">
										</div>
									</div>
									<div class="col-md-12 mb-5">										
										<div class="form-group">
											<label>Category Slug</label>										
											<input type="text" name="slug" value="{{$category->slug}}" class="form-control">
										</div>
									</div>
									<div class="col-md-12 mb-5">										
										<div class="form-group">
											<label>Category Description</label>
											<textarea rows="10" name="description" id="description" class="form-control" placeholder="">{{$category->description}}</textarea>
										</div>
									</div>																		
									<div class="col-md-12 mb-5">
										<div class="form-group">
											<label>Select Parent(Optional)</label>	
											<select name="parent" class="form-control">
											<option value="0">--</option>
											@foreach($catgory_tree as $tree)											
												<option value="{{ $tree['id'] }}" @if($category->parent == $tree['id']) selected @endif>{{ $tree['name'] }}</option>
												@if($tree['childs'])
													@foreach($tree['childs'] as $sub)
														<option value="{{ $sub['id'] }}" @if($category->parent == $sub['id']) selected @endif>-{{ $sub['name'] }}</option>
														<?php /* @if($sub['childs'])
															@foreach($sub['childs'] as $subchild)
																<option value="{{ $subchild['id'] }}" @if($category->parent == $subchild['id']) selected @endif>--{{ $subchild['name'] }}</option>
															@endforeach
														@endif */ ?>
													@endforeach
												@endif												
											@endforeach	
											</select>
										</div>										
									</div>
									<div class="col-md-12 mb-5">										
										<div class="form-group">
											<label>Status</label>
											<select name="status" class="form-control">
											    <option value="1" @if($category->status ==1) selected @endif>Enable</option>
												<option value="0" @if($category->status ==0) selected @endif>Disable</option>
											</select>
										</div>
									</div>
 									<div class="col-md-12 mb-5">
										<div class="form-group">
											<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Edit Category"><i class="la la-pencil"></i> Edit Category</button>
										</div>										
									</div>
								</form>
								<div class="form-group">
									<div id="message"></div>
								</div>
								<div class="alert alert-info validation" style="display: none;">
									<p class="text-left"></p> 
								</div>
								<div class="alert alert-success validation" style="display: none;">
									<button type="button" class="close alert-close"><span>×</span></button>
									<p class="text-left"></p> 
								</div>
								<div class="alert alert-danger validation" style="display: none;">
									<button type="button" class="close alert-close"><span>×</span></button>
									<p class="text-left"></p> 
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
<script>

jQuery("#categoryAdd").submit(function(e) {
	
	e.preventDefault();
	
	jQuery("input,select,textarea").css('border','1px solid black');
	jQuery('.mes').remove();
    var url = jQuery(this).attr('action');
	var formData = new FormData(jQuery(this)[0]);

    jQuery.ajax({
           type: "POST",
           url: url,
           data:  formData, 
           processData: false,
           dataType:'json',
           contentType: false,
           success: function(data)
           {
           
            if(data.status== false){
				
				jQuery('#message').html(data.message);    
				var a= data['errors'];     
               jQuery.each(data.errors, function(key, value){           
					jQuery("input[name='"+key+"'],select[name='"+key+"'],textarea[name='"+key+"']").css('border','1px solid red'); 
					jQuery("input[name='"+key+"'],select[name='"+key+"'],textarea[name='"+key+"']").after("<small class='mes'>"+value+"</small>");
					if(key == "for_id"){ 
						$("span.select2-selection.select2-selection--single").css("border","1px solid red")
						jQuery("span.select2-selection.select2-selection--single").after("<small class='mes'>"+value+"</small>");
					}
               });
            }
			if(data.status==true){
       
				jQuery("input[type=text],select,textarea").css('border','1px solid #1abb9c').delay( 2000 ).css('border','1px solid #e2e2e4');
				jQuery('#message').html(data.message);  
				jQuery("#message").fadeIn(100);
				jQuery("html, body").animate({
					scrollTop: jQuery("#message").offset().top-100
				}, 1000);
				jQuery("#message").delay(3000);
				jQuery("#message").fadeOut(100);
                /*setTimeout(function() {
                   window.location.href = data.redirect;
                }, 3000);*/
			}             
           }
         });
});

$(function(){
	var $ckfield = CKEDITOR.replace( 'description' );
	$ckfield.on('change', function() {
	  $ckfield.updateElement();         
	});
});
</script>
@endsection