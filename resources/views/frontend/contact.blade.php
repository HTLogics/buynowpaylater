@php($layoutface = "front")
@extends('layouts.'.$layoutface)
@section("content")


<section class="inner-banner" style="background-image:url('{{asset('public/assets/frontend')}}/img/banner4.jpg');">


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="banner-title">
<h1>Contact Us</h1>
</div>
</div>
</div>

</div>


</section>


<section class="home-content">
    <!-- About Start -->
    <div class="container">
        <div class="container py-5 about px-lg-0">
            <div class="row g-0 mx-lg-0">
               
                <div class="col-lg-12 about-text wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="p-lg-5 pe-lg-0 text-center">
                        
                        <h1 class="mb-4">Contact Us</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						
						
                    </div>
                </div>
            </div>
			
			
			<div class="row contact-row">             
                <div class="col-sm-4">
				<div class="contact-box">
				<div class="cont-icon"><i class="fa fa-map-marker-alt me-3"></i></div>
				<div class="cont-txt">SCF 12 Suncity, Ropar (1400001), Opposite Kamal Nursing Home</div>
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="contact-box">
				<div class="cont-icon"><i class="fa fa-phone-alt me-3"></i></div>
				<div class="cont-txt"><a href="tel:+918264266734">+918264266734</a></div>
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="contact-box">
				<div class="cont-icon"><i class="fa fa-envelope me-3"></i></div>
				<div class="cont-txt"><a href="mailto:safebuy95@gmail.com">safebuy95@gmail.com</a></div>
				</div>
				</div>
            </div>
			
			
        </div>
						
    </div>
	
	
    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('public/assets/frontend')}}/img/about.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <h6 class="text-primary">Free Quote</h6>
                        <h1 class="mb-4">Get A Free Quote</h1>
                        <p class="mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Mobile" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Special Note"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->
</section>
@endsection


