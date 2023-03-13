<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>		
		<meta charset="utf-8" />
		<title>Recurring</title>
		<meta name="description" content="Login Page">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('public/assets/frontend/bootstap.css')}}" rel="stylesheet" type="text/css" /> 		
        <style>
		div#kt_content { margin-top: 25px; }
        </style>
        @yield('styles')		
	</head>
	<!-- end::Head -->
	<!-- begin::Body -->
	<body>
        <header>
		    <img alt="Logo" src="{{asset('public/assets')}}/admin/media/logos/admin-logo.png" style="max-width: 140px;"/>
			<a href="{{route('home')}}">Home</a>
			<a href="{{route('about')}}">About</a>
		</header>	
	    @yield('content')
        <footer>Copyright@2023</footer>  		
        @yield('scripts')    		
	     <!--end::Page Scripts -->
	</body>
	<!-- end::Body -->
</html>