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
		<form action="{{ route('admin.update_item') }}" name="itemAdd" enctype="multipart/form-data" id="itemAdd" method="post">
		<div class="row">		    
			<div class="col-lg-12">			
				<div class="kt-portlet kt-portlet--height-fluid">
				    <div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Edit Item
							</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-wrapper">
								<div class="kt-portlet__head-actions" style="margin-left:20px">
									<a href="{{ route('admin.items') }}" class="btn btn-brand btn-elevate btn-icon-sm">
										<i class="la la-arrow-left"></i>
										Back To Items
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">			    
						@csrf
						<input type="hidden" name="id" value="{{$products['id']}}"/>
						<div class="form-group">
							<label>Name</label>										
							<input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$products['name']}}">
						</div>										
						<div class="form-group">
							<label>Slug</label>										
							<input type="text" name="slug" class="form-control" placeholder="Enter slug" value="{{$products['slug']}}">
						</div>														
						<div class="form-group">
							<label>Sku</label>										
							<input type="text" name="sku" class="form-control" placeholder="Enter sku" value="{{$products['sku']}}">
						</div>												
						<div class="form-group">
							<label>Description</label>										
							<textarea rows="15" name="description" class="form-control" id="description" placeholder="Description">{{$products['description']}}</textarea>
						</div>								
						<div class="form-group">
							<label>Price <small>(add price without comma)</small></label>										
							<input type="text" name="price" class="form-control" placeholder="eg. 100" value="{{$products['price']}}">
						</div>	
						<div class="form-group">
							<label>Select Categories</label>
							@foreach($catgory_tree as $tree)
							<ul class="parent-category">
								<li>
								<div class="kt-checkbox-list">
									<label class="kt-checkbox kt-checkbox--success">
										<input type="checkbox" name="category_ids[]" value="{{ $tree['id'] }}" @if(in_array($tree['id'], explode(",", $products['category_ids']))) checked @endif> {{ $tree['name'] }}
										<span></span>
									</label>												
								</div>
								@if($tree['childs'])
									<ul class="sub-category">
									@foreach($tree['childs'] as $sub)
									<li>
									<div class="kt-checkbox-list">
										<label class="kt-checkbox kt-checkbox--success">
											<input type="checkbox" name="category_ids[]" value="{{ $sub['id'] }}" @if(in_array($sub['id'], explode(",", $products['category_ids']))) checked @endif > {{ $sub['name'] }}
											<span></span>
										</label>												
									</div>
									@if($sub['childs'])
									<ul class="sub-category">
										@foreach($sub['childs'] as $sub_child)
										<li>
										<div class="kt-checkbox-list">
											<label class="kt-checkbox kt-checkbox--success">
												<input type="checkbox" name="category_ids[]" value="{{ $sub_child['id'] }}" @if(in_array($sub_child['id'], explode(",", $products['category_ids']))) checked @endif > {{ $sub_child['name'] }}
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
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="1" @if($products['status'] == 1) selected @endif>Enable</option>
								<option value="0" @if($products['status'] == 0) selected @endif>Disable</option>
							</select>
						</div>
						<input type="hidden" name="photos" id="photos_value"/>
						<div class="form-group">
							<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Add Product"><i class="la la-pencil"></i> Update Item</button>
						</div>
						<div class="form-group">
							<div id="message"></div>
						</div>
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
$btnSubmit = $("form[name='itemAdd'] button[type='submit']");
var $spinner = '<div class="spinner"><div class="dot1"></div><div class="dot2"></div><div class="dot3"></div></div>';


function photoMax() {

	var $v_items = $("form[name='itemAdd'] #photo .photo-image").length;

	$max_photos = 20;


	$("form[name='itemAdd'] .photo-numbers").text(($v_items > $max_photos ? $max_photos : $v_items) + " of " + $max_photos);

	$("form[name='itemAdd'] #photo .photo-item").each(function( index ){

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

$("form[name='itemAdd'] #photo").sortable({
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
		$("form[name='itemAdd'] #photo").children("div").height(ui.item.height());
	},
	stop: function(e, ui){
		$("form[name='itemAdd'] #photo").children("div").height('auto');
		photoChange();
	}
}).disableSelection();

$("form[name='itemAdd'] #photo").on('dragstart', "img", function(e) {
	e.preventDefault();
});

$("form[name='itemAdd'] #photo").on("click touchend", ".remove", function(e){
	e.preventDefault();
	var rmvFile = $(this).attr("data-photo");
	$(this).closest(".photo-item").remove();	
	photoMax();
	photoChange();
});

</script>

<script>
jQuery("#itemAdd").submit(function(e) {
	
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
<script src="{{ asset('public/assets/admin/js/bootstrap-tagsinput.js')}}" type="text/javascript">
<script>
$(document).ready(function(){
  var tagInputEle = $('#tags-input');
  tagInputEle.tagsinput();
});
</script>
@endsection