@extends('layouts.admin')

@section('content')
<style>
button#add-items-to-bill, .btn.proceed-to-checkout {
    height: 56px;
    margin-top: -3px;
}
.select-item-qty {
    height: 58px;
    margin-top: -4px;
}
.btn.proceed-to-checkout{
	line-height: 34px;
    padding: 10px 20px;
}
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<!--Begin::Dashboard 6-->
		<!--begin:: Widgets/Stats-->
						
		<div class="kt-portlet kt-portlet--height-fluid">
		    <div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h4>Generate Bill</h4>	
				</div>
			</div>
			<div class="kt-portlet__body">
			    <form action="#" name="editor" enctype="multipart/form-data" id="generateBill" method="post">
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">
								    <div class="row">
										@csrf
										<div class="col-sm-12">										
											<div class="form-group">
												<label>Choose Customer</label>										
												<select name="customer" class="form-control form-select" id="customer">
													<option name="">Select Customer</option>
												</select>
											</div>
										</div>
										<div class="col-sm-7">										
											<div class="form-group">
												<label>Choose Items</label>										
												<select name="item" class="form-control form-select" id="item">
													<option name="">Choose Item</option>													
												</select>
											</div>
										</div>
										<div class="col-sm-2 mt-4">
											<div class="form-group form-btn">											
												<input type="number" name="qty" id= "qty" class="form-control select-item-qty" min="1" value="1"/>
											</div>										
										</div>
										<div class="col-sm-3 mt-4">
											<div class="form-group form-btn">											
												<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm" data-label="Save" id="add-items-to-bill"><i class="la la-plus"></i> Add Item</button>
											</div>										
										</div>
									</div>									
								
								</form>
							</div>							
					</div>
				</div>
				<div class="panel panel-success col-h">
					<div class="panel panel-success col-h">							
							<div class="panel-body">
									<table class="table table-striped- table-bordered table-hover table-checkable dtr-inline" id="product-items">
										<thead>
											<tr class="kt-card-heading">
												<th>Item Name</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<tr class="no-product"">
												<td colspan="4"><center>no product added.</center></td>
											</tr>
										</tbody>
									</table>
								 
									<div class="col-md-12 text-right">
										<div class="form-group">	
											<a href="{{ route('admin.payment') }}" class="btn btn-brand btn-elevate btn-icon-sm proceed-to-checkout">Save Cart & Next <i class="la la-arrow-right"></i></a>
										</div>										
									</div>								
                                <div class="form-group">
									<div id="message"></div>
								</div>								
							</div>
						</div>
				</div>
				</form>
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
$("#country").on("change", function(){
	var country_code = this.value;
	$.ajax({
		url: "{{ route('admin.login') }}/states/"+country_code,
		success: function(data){
			jQuery('#state').html(data);
		}
	});
});
$(".form-select").select2({
	ajax: {
	  url: "{{route('admin.search_customer')}}",
	  dataType: 'json',
	},
});
$("#item").select2({
	ajax: {
	  url: "{{route('admin.search_item')}}",
	  dataType: 'json',
	},
});

//add items
$('#add-items-to-bill').on('click', function(e){
	e.preventDefault();
	var item_id = $("#item").val();
	var item_name = $("#item option:selected").text();
	var item_qty = $("#qty").val();	
	$.ajax({
		url: "{{route('admin.login')}}/get_item/"+item_id,
		dataType: 'json',
		success: function(data){
			
            $('.no-product').hide();
			$("tr.product-row").each( function () {
				var pid = $(this).data("id")
				if(pid == item_id){
					var getOldqty  = $(this).find("td:eq(2)").text();
					item_qty = parseInt(item_qty)+parseInt(getOldqty);
					$(this).remove();
					return false;
				}
			});

			$('#product-items tr:last').after('<tr class="product-row" data-id="'+data.product.id+'"><td>'+data.product.name+'</td><td>'+data.product.price+'</td><td class="qty">'+item_qty+'</td><td>'+parseInt(item_qty)*parseFloat(data.product.price)+'</td></tr>');
				
						

				
		    
		}
	});
});
</script>

@endsection