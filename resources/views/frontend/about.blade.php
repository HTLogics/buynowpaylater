@php($layoutface = "front")
@extends('layouts.'.$layoutface)
@section("content")
<section class="inner-banner" style="background-image:url('{{asset('public/assets/frontend')}}/img/banner4.jpg');">


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="banner-title">
<h1>About Us</h1>
</div>
</div>
</div>

</div>


</section>


<section class="home-content">
    <!-- About Start -->
    <div class="container">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
               
                <div class="col-lg-12 about-text wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="p-lg-5 pe-lg-0 text-center">
                        
                        <h1 class="mb-4">About Us</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
						
						
                    </div>
                </div>
            </div>
        </div>
						
    </div>
	
	
	   <!-- About Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('public/assets/frontend')}}/img/about.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <h6 class="text-primary">About Us</h6>
                        <h1 class="mb-4">25+ Years Experience </h1>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Diam dolor diam ipsum</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                        <a href="" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- About End -->
</section>
@endsection


