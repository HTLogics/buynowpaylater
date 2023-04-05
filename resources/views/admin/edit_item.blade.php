@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/admin/css/bootstrap-tagsinput.css')}}"/>
<script src="{{ asset('public/assets/admin/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<!--Begin::Dashboard 6-->
		<div class="row">
		    <div class="col-lg-12">
			
			</div>
		</div>
		<form action="{{ route('admin.saveproduct') }}" name="productAdd" enctype="multipart/form-data" id="productAdd" method="post">
		<div class="row">		    
			<div class="col-lg-8">			
				<div class="kt-portlet kt-portlet--height-fluid">
				    <div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Create Product
							</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-wrapper">
								<div class="kt-portlet__head-actions" style="margin-left:20px">
									<a href="{{ route('admin.products') }}" class="btn btn-brand btn-elevate btn-icon-sm">
										<i class="la la-arrow-left"></i>
										Back To Products
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">			    
						@csrf														
						<div class="form-group">
							<label>Name</label>										
							<input type="text" name="name" class="form-control" placeholder="Enter Name">
						</div>										
						<div class="form-group">
							<label>Slug</label>										
							<input type="text" name="slug" class="form-control" placeholder="Enter slug">
						</div>														
						<div class="form-group">
							<label>Sku</label>										
							<input type="text" name="sku" class="form-control" placeholder="Enter sku">
						</div>										
						<div class="form-group">
							<label>Short Description</label>
							<textarea rows="10" name="short_description" id="short_description" class="form-control" placeholder="Short Description"></textarea>
						</div>														
						<div class="form-group">
							<label>Description</label>										
							<textarea rows="15" name="description" class="form-control" id="description" placeholder="Description"></textarea>
						</div>										
						<div class="form-group">
							<label>Stock</label>										
							<input type="text" name="stock" class="form-control" placeholder="eg. 5">
						</div>										
						<div class="form-group">
							<label>Price <small>(add price without comma)</small></label>										
							<input type="text" name="price" class="form-control" placeholder="eg. 100">
						</div>										
						<div class="form-group">
							<label>Previous Price <small>(add price without comma)</small></label>										
							<input type="text" name="previous_price" class="form-control" placeholder="eg. 120">
						</div>										
						<div class="kt-checkbox-list form-group">
							<label class="kt-checkbox kt-checkbox--success" for="size-check">
								<input type="checkbox" id="size-check" value="1" name="size_check"> <b>{{ __('Add Product Sizes') }}</b>
								<span></span>
							</label>												
						</div>				
						<div class="showbox form-group" id="size-display">
							<div class="product-size-details" id="size-section">
								<div class="size-area">
									<span class="remove size-remove"><i class="fas fa-times"></i></span>
									<div class="row">
										<div class="col-md-4 col-sm-6">
											<label>
												{{ __('Size Name') }} :
												<span>
													{{ __('(eg. S,M,L)') }}
												</span>
											</label>
											<input type="text" name="size[]" class="form-control"
												placeholder="{{ __('Size Name') }}">
										</div>
										<div class="col-md-4 col-sm-6">
											<label>
												{{ __('Size Qty') }} :
												<span>
													{{ __('(Quantity of size)') }}
												</span>
											</label>
											<input type="number" name="size_qty[]" class="form-control"
												placeholder="{{ __('Size Qty') }}" value="1" min="1">
										</div>
										<div class="col-md-4 col-sm-6">
											<label>
												{{ __('Size Price') }} :
												<span>
													{{ __('(Price of size)') }}
												</span>
											</label>
											<input type="number" name="size_price[]" class="form-control"
												placeholder="{{ __('Size Price') }}" value="0" min="0">
										</div>
									</div>
								</div>
							</div>
							<a href="javascript:;" id="size-btn" class="btn btn-brand btn-elevate btn-icon-sm"><i
									class="la la-plus"></i>{{ __('Add More Size') }} </a>
						</div>										
						<div class="form-group">
							<label>Color</label>										
							<input type="text" name="color" class="form-control" placeholder="eg. Red">
						</div>										
						<div class="form-group">
							<label>Weight</label>										
							<input type="text" name="weight" class="form-control" placeholder="eg. 1kg">
						</div>								
						<div class="form-group">
							<label>Tags</label>										
							<input type="text" name="tags" class="form-control" id="tags-input" value="" data-role="tagsinput" placeholder="Add tags" />
						</div>										
						<div class="form-group">
							<label>Is Featured</label>										
							<select name="featured" class="form-control">
								<option value=""></option>
								<option value="1">Yes</option>
							</select>
						</div>
						<div class="form-group">
							<label>Select Categories</label>
							@foreach($catgory_tree as $tree)
							<ul class="parent-category">
								<li>
								<div class="kt-checkbox-list">
									<label class="kt-checkbox kt-checkbox--success">
										<input type="checkbox" name="category_ids[]" value="{{ $tree['id'] }}"> {{ $tree['name'] }}
										<span></span>
									</label>												
								</div>
								@if($tree['childs'])
									<ul class="sub-category">
									@foreach($tree['childs'] as $sub)
									<li>
									<div class="kt-checkbox-list">
										<label class="kt-checkbox kt-checkbox--success">
											<input type="checkbox" name="category_ids[]" value="{{ $sub['id'] }}"> {{ $sub['name'] }}
											<span></span>
										</label>												
									</div>
									@if($sub['childs'])
									<ul class="sub-category">
										@foreach($sub['childs'] as $sub_child)
										<li>
										<div class="kt-checkbox-list">
											<label class="kt-checkbox kt-checkbox--success">
												<input type="checkbox" name="category_ids[]" value="{{ $sub_child['id'] }}"> {{ $sub_child['name'] }}
												<span></span>
											</label>												
										</div>
										</li>
										@endforeach
									</ul>
									@endif
									</li>
									@endforeach
									</ul>
								@endif
								</li>
							</ul>
							@endforeach											
						</div>										
						<div class="form-group">											
							 <div class="kt-checkbox-list">
								<label class="kt-checkbox">
									<input type="checkbox" name="is_meta" id="is_meta" value="1"> Use Seo Information
									<span></span>
								</label>												
							</div>
						</div>
						<div id="meta-div" style="display:none;">								
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="meta_title" class="form-control">
							</div>										
							<div class="form-group">
								<label>Description</label>
								<textarea rows="8" name="meta_description" id="meta_description" class="form-control" placeholder="Short Description"></textarea>
							</div>
						</div>										
						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="1">Enable</option>
								<option value="0">Disable</option>
							</select>
						</div>
						<input type="hidden" name="photos" id="photos_value"/>
						<div class="form-group">
							<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Add Product"><i class="la la-plus"></i> Add Product</button>
						</div>
						<div class="form-group">
							<div id="message"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div id="image" class="ui-sortable kt-uppy">
					<div class="photo-item photo-add dropzone dropzone-default dropzone-brand dz-clickable">
						<img src="{{asset('/public/assets/admin/product/images/440x440.png')}}" style="max-width: 100%;">
						<span class="fileinput-button">
							<div class="photo-add-inner">
								<i class="flaticon-upload-1"></i>
								<span class="btn-block mb-2">Choose File(JPG, JPEG, PNG, SVG)</span>
								<small class="text-muted">start to upload</small>
							</div>
							<input id="image-upload" type="file" name="photo" multiple="">
						</span>
					</div>										
				</div>								    
				<div class="gallery">
					<h4 class="kt-portlet__head-title mt-4">Add Gallery</h4>
				</div>										
				<div class="progress-wrapper">
					<div class="progress progress-photo rounded-0 hide">
						<div class="progress-bar" style="width: 1%;"></div>
					</div>
				</div>
				<div id="photo" class="ui-sortable mt-2">
					<div class="photo-item photo-add ">
						<img src="{{asset('/public/assets/admin/product/images/440x440.png')}}">
						<span class="fileinput-button">
							<div class="photo-add-inner">
								<span class="btn-block mb-2">Choose File</span>
								<small class="text-muted">start to upload</small>
							</div>
							<input id="photo-upload" type="file" name="image" multiple="">
						</span>
					</div>
				</div>				
			</div>
		</div>		
	</form>
	<!-- end:: Content -->
	</div>
</div>

@endsection

@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"  crossorigin="anonymous"></script>
<script src="{{ asset('/public/assets/admin/plugins/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/vendor/jquery-ui.js')}}"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/vendor/jquery.ui.widget.js')}}"></script>   
<script src="{{ asset('/public/assets/admin/file_upload/js/jquery.iframe-transport.js')}}"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/jquery.fileupload.js')}}"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/jquery.fileupload-process.js')}}"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/jquery.fileupload-image.js')}}"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/jquery.fileupload-audio.js')}}"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/jquery.fileupload-video.js')}}"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/jquery.fileupload-validate.js')}}"></script>
<script src="{{ asset('/public/assets/admin/file_upload/js/jquery.fileupload-ui.js')}}"></script>

<script>
var jqXHR = new Array();
var $i = 0;
$btnSubmit = $("form[name='productAdd'] button[type='submit']");
var $spinner = '<div class="spinner"><div class="dot1"></div><div class="dot2"></div><div class="dot3"></div></div>';
$("form[name='productAdd'] #photo-upload").fileupload({
	dataType: 'json',
	url: "{{ route('admin.galleryupload')}}",
	sequentialUploads: true,
	add: function (e, data) {
		if( photoMax() ){
			$.each(data.files, function (index, file) {
				var error = 0;
				$i++;
				if (!(/\.(gif|jpe?g|png)$/i).test(file.name)) {
					alert('File type not allowed.');
					error = 1;
				}
				if(file.size > 20971520) {
					alert('File too large. Limit 20MB');
					error = 1;
				}
				if(error == 0) {
					$btnSubmit.prop("disabled", true).html($spinner);
					$(".progress-photo").removeClass("hide");
					data.context = $('<div class="photo-item photo-image">').insertBefore('#photo .photo-add').html(
						'<div class="photo-item-select">' +
						'<img src="{{asset('/public/assets/admin/product/images/440x440.png')}}" class="bg">' +
						$spinner +
						'<a href="#abort" class="abort" data-id="' + $i + '"><i class="fa fa-times"></i></a>' +
						'</div>'
					);
					jqXHR[$i] = data;
					data.submit();
				}
			});
			photoMax();

		}
	},
	progressall: function (e, data) {
		var progress = parseInt(data.loaded / data.total * 100, 10);

		if(progress > 0 && progress < 100) {
			$(".progress-photo").removeClass("hide");
		} else {
			setTimeout(function(){
				$(".progress-photo").addClass("hide");
				$('.progress-photo .progress-bar').css('width', '1%');
			}, 4000);
		}
		$('.progress-photo .progress-bar').css('width', progress + '%');
	},
	done: function (e, data) {
		if(data.result) {
			$(data.context).html( photoTile(data.result.url, data.result.filename) );
		}
		photoChange();
	}
});

function photoMax() {
	var $v_items = $("form[name='productAdd'] #photo .photo-image").length;
	$max_photos = 20;
	$("form[name='productAdd'] .photo-numbers").text(($v_items > $max_photos ? $max_photos : $v_items) + " of " + $max_photos);
	$("form[name='productAdd'] #photo .photo-item").each(function( index ){
		if(index > ($max_photos-1)) {
			$(this).addClass("hide");
		} else {
			$(this).removeClass("hide");
		}
	});
	if( $v_items  < $max_photos ){
		return true;
	} else {
		return false;
	}
}

function photoChange() {
	coverPopover();
}


function coverPopover() {
	if(!$("#photo").attr("data-hidetips")) {
		if ($("#photo .photo-item:first-of-type .primary").length > 0) {

		}
	}
}

$("#photo").on("click", ".cover-popover .cover-popover-close", function(e) {
	e.preventDefault();
	$("#photo").attr("data-hidetips", true);
	$("#photo .cover-popover").fadeOut('fast', function() {
		$("#photo .cover-popover").remove();
	});
});

function photoTile(pThumbail, pId) {
	if( $("#photo .spinner").length <= 1 ){
		$btnSubmit.prop("disabled", false).text($btnSubmit.attr('data-label'));
	}
	return(
		'<div class="photo-item-select">' +
		'<img src="{{asset('/public/assets/admin/product/images/440x440.png')}}">' +
		'<div class="image-wrapper"><img src="' + pThumbail + '" class="image"></div>' +
		'<div class="buttons">' +
		'<!--<a href="#rotate" class="rotate" title="Rotate"><i class="fa fa-rotate-left"></i></a>--> ' +
		'<a href="#sort" class="sort" title="Drag to re-order"><i class="fa fa-arrows-alt"></i></a> ' +
		'<!--<a href="#crop" class="crop" title="Crop"><i class="fa fa-crop"></i></a>-->' +
		'</div>' +
		'<a href="#remove" class="remove" title="Remove" data-photo="' + pId + '"><i class="fa fa-times"></i></a>' +
		'<input type="hidden" name="image[]" class="photo_of_list" value="' + pId + '">' +
		'</div>'
	);
}
	
// Sort
$("form[name='productAdd'] #photo").sortable({
	items: ".photo-image",
	tolerance: "pointer",
	cursor: "move",
	handle: ".sort",
	forcePlaceholderSize: true,
	forceHelperSize: true,
	placeholder: "photo-item photo-placeholder",
	containment: "parent",
	start: function(e, ui){
		$("#photo .cover-popover").remove();
		$("form[name='productAdd'] #photo").children("div").height(ui.item.height());
	},
	stop: function(e, ui){
		$("form[name='productAdd'] #photo").children("div").height('auto');
		photoChange();
	}
}).disableSelection();

$("form[name='productAdd'] #photo").on('dragstart', "img", function(e) {
	e.preventDefault();
});

$("form[name='productAdd'] #photo").on("click touchend", ".remove", function(e){
	e.preventDefault();
	var rmvFile = $(this).attr("data-photo");
	var token = $("input[name=_token]").val();
	$.ajax({
		url: "{{ route('admin.deletefile')}}",
		type: "POST",
		data: { "fileList" : rmvFile, "_token" : token},
		function(data,status){
			
		}		
	});
	$(this).closest(".photo-item").remove();	
	photoMax();
	photoChange();
});

$("form[name='productAdd'] #image-upload").fileupload({
	dataType: 'json',
	url: "{{ route('admin.photoupload')}}",
	sequentialUploads: true,
	add: function (e, data) {
		if( photoMax2() ){
			$.each(data.files, function (index, file) {
				var error = 0;
				$i++;
				if (!(/\.(gif|jpe?g|png)$/i).test(file.name)) {
					alert('File type not allowed.');
					error = 1;
				}
				if(file.size > 20971520) {
					alert('File too large. Limit 20MB');
					error = 1;
				}
				if(error == 0) {
					$btnSubmit.prop("disabled", true).html($spinner);
					data.context = $('<div class="photo-item photo-image tery ma ka ">').insertBefore('#image .photo-add').html(
						'<div class="photo-item-select">' +
						'<img src="{{asset('/public/assets/admin/product/images/440x440.png')}}" class="bg">' +
						$spinner +
						'<a href="#abort" class="abort" data-id="' + $i + '"><i class="fa fa-times"></i></a>' +
						'</div>'
					);
					jqXHR[$i] = data;
					data.submit();
				}
			});
			photoMax2();
		}
	},
	done: function (e, data) {
		if(data.result) {
			$(data.context).html( photoTile2(data.result.url, data.result.filename) );
		}
		photoChange2();
	}
});

function photoMax2() {
	var $v_items = $("form[name='productAdd'] #image .photo-image").length;
	$photoMax2 = 1;
	$("form[name='productAdd'] .photo-numbers").text(($v_items > $photoMax2 ? $photoMax2 : $v_items) + " of " + $photoMax2);
	$("form[name='productAdd'] #image .photo-item").each(function( index ){
		if(index > ($photoMax2-1)) {
			$(this).addClass("hide");
		} else {
			$(this).removeClass("hide");
		}
	});

	if( $v_items  < $photoMax2 ){
		return true;
	} else {
		return false;
	}
}

$("form[name='productAdd'] #image").on("click touchend", ".remove", function(e){
	e.preventDefault();
	var rmvFile = $(this).attr("data-photo");
	var token = $("input[name=_token]").val();
	$.ajax({
		url: "{{ route('admin.deletefile')}}",
		type: "POST",
		data: { "fileList" : rmvFile,  "_token" : token},
		function(data,status){
			
		}		
	});
	$(this).closest(".photo-item").remove();	
	photoMax2();
	photoChange2();
});

function photoChange2() {
	coverPopover2();
}
function coverPopover2() {
	if(!$("#image").attr("data-hidetips")) {
		if ($("#photo .photo-item:first-of-type .primary").length > 0) {

		}
	}
}
function photoTile2(pThumbail, pId) {
	if( $("#image .spinner").length <= 1 ){
		$btnSubmit.prop("disabled", false).text($btnSubmit.attr('data-label'));
	}
	return(
		'<div class="photo-item-select">' +
		'<img src="{{asset('/public/assets/admin/product/images/440x440.png')}}">' +
		'<div class="image-wrapper"><img src="' + pThumbail + '" class="image"></div>' +
		'<a href="#remove" class="remove" title="Remove" data-photo="' + pId + '"><i class="fa fa-times"></i></a>' +
		'<input type="hidden" name="photo" class="photo_of_list" value="' + pId + '">' +
		'</div>'
	);
}
</script>
<script>
jQuery("#is_meta").on("change", function(){
	jQuery("#meta-div").toggle();
});
jQuery("#productAdd").submit(function(e) {	
	var photoValues = $('#photo_val').text();
	$('#photos_value').val(photoValues);
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
					if(key == "store_ids"){
						jQuery(".store_id").after("<small class='mes'>"+value+"</small>");
					}
               });
            }
			if(data.status==true){       
				jQuery("input[type=text],select,textarea").css('border','1px solid #1abb9c').delay( 2000 ).css('border','1px solid #e2e2e4');
				jQuery("input[type=text],select,textarea").val('');				
				jQuery('#message').html(data.message);  
				jQuery("#message").fadeIn(100);
				jQuery("html, body").animate({
					scrollTop: jQuery("#message").offset().top-100
				}, 1000);
				jQuery("#message").delay(3000);
				jQuery("#message").fadeOut(100);
                setTimeout(function() {
                   window.location.href = data.redirect;
                }, 3000);		
			}             
           }
         });
});

// Size Section

$("#size-check").change(function() {
    if(this.checked) {
        $("#size-display").show();
    }
    else
    {
        $("#size-display").hide();
    }
});

$("#size-btn").on('click', function(){

    $("#size-section").append(''+
                            '<div class="size-area">'+
                                '<span class="remove size-remove"><i class="fas fa-times"></i></span>'+
                                    '<div  class="row">'+
                                        '<div class="col-md-4 col-sm-6">'+
                                            '<label>'+
                                            'Size Name :'+
                                                '<span>(eg. S,M,L)</span>'+
                                            '</label>'+
                                            '<input type="text" name="size[]" class="form-control" placeholder="Size Name">'+
                                        '</div>'+
                                        '<div class="col-md-4 col-sm-6">'+
                                            '<label>'+
                                            'Size Qty :'+
                                            '<span>(Quantity of this size)</span>'+
                                            '</label>'+
                                            '<input type="number" name="size_qty[]" class="form-control" placeholder="Size Qty" value="1" min="1">'+
                                        '</div>'+
                                        '<div class="col-md-4 col-sm-6">'+
                                            '<label>'+
                                            'Size Price :'+
                                            '<span>(Price of size)</span>'+
                                            '</label>'+
                                            '<input type="number" name="size_price[]" class="form-control" placeholder="Size Price" value="0" min="0">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            +'');

});

$(document).on('click','.size-remove', function(){

    $(this.parentNode).remove();
    if (isEmpty($('#size-section'))) {

    $("#size-section").append(''+
                            '<div class="size-area">'+
                                '<span class="remove size-remove"><i class="fas fa-times"></i></span>'+
                                    '<div  class="row">'+
                                        '<div class="col-md-4 col-sm-6">'+
                                            '<label>'+
                                            'Size Name :'+
                                                '<span>(eg. S,M,L)</span>'+
                                            '</label>'+
                                            '<input type="text" name="size[]" class="form-control" placeholder="Size Name">'+
                                        '</div>'+
                                        '<div class="col-md-4 col-sm-6">'+
                                            '<label>'+
                                            'Size Qty :'+
                                            '<span>(Quantity of this size)</span>'+
                                            '</label>'+
                                            '<input type="number" name="size_qty[]" class="form-control" placeholder="Size Qty" value="1" min="1">'+
                                        '</div>'+
                                        '<div class="col-md-4 col-sm-6">'+
                                            '<label>'+
                                            'Size Price :'+
                                            '<span>(Price of size)</span>'+
                                            '</label>'+
                                            '<input type="number" name="size_price[]" class="form-control" placeholder="Size Price" value="0" min="0">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            +'');
    }

});

// Size Section Ends
$(function(){
	var $ckfield = CKEDITOR.replace( 'description' );
	$ckfield.on('change', function() {
	  $ckfield.updateElement();         
	});
	var $ckfield2 = CKEDITOR.replace( 'short_description' );
	$ckfield2.on('change', function() {
	  $ckfield2.updateElement();         
	});	
});
</script>
<script src="{{ asset('public/assets/admin/js/bootstrap-tagsinput.js')}}" type="text/javascript"/>
<script>
$(document).ready(function(){        
  var tagInputEle = $('#tags-input');
  tagInputEle.tagsinput();
});
</script>
@endsection