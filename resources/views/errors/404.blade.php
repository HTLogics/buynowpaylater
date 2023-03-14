@if(Request::segment(1) == "admin")
@php($layoutface = "admin")
@else
@php($layoutface = "front")
@endif
@extends('layouts.'.$layoutface)
@section("content")
<section class="promise-sec" style="background:url('{{ asset('public/assets/admin/media/error/bg3.jpg')}}'); min-height: 750px;background-size: cover;">
	<div class="container">
		<div class="row">
		   <div class="col-sm-12 text-center">
			 <h2 class="error404_heading">404</h2>
			 <div class="error404_sub_heading">Oops ! Page Not Found</div>
			 <div class="error404_text">Sorry, The page you are looking for is doesn't exist on this website</div>
		   </div>
		</div>
	</div>
</section>
@endsection


