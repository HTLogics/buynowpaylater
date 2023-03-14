@php($layoutface = "front")
@extends('layouts.'.$layoutface)
@section("content")

<section class="inner-banner" style="background-image:url('{{asset('public/assets/frontend')}}/img/banner4.jpg');">


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="banner-title">
<h1>Our Products</h1>
</div>
</div>
</div>

</div>


</section>


<section class="home-content">
       <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-4">Our Products</h1>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>							
            </div>
			
			<div class="row g-4">
			
			<div class="col-sm-3">
			<div class="left-sidebar">
			<h3>All Categories</h3>
			<ul class="menu">
			<li class="menu-item"><a href="#">Shirt</a></li>
			<li class="menu-item"><a href="#">T-Shirt</a></li>
			<li class="menu-item"><a href="#">Shoes</a></li>
			<li class="menu-item"><a href="#">Sunglass</a></li>
			<li class="menu-item"><a href="#">Bags</a></li>
			<li class="menu-item"><a href="#">Watches</a></li>
			<li class="menu-item"><a href="#">Wallets</a></li>
			<li class="menu-item"><a href="#">Belts</a></li>
			<li class="menu-item"><a href="#">Accessories</a></li>
            </ul>
			</div>
			</div>
			
			<div class="col-sm-9">
			<div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/product1.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="{{asset('public/assets/frontend')}}/img/product1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">COTTON SHIRT</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">₹250.00</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/product2.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="{{asset('public/assets/frontend')}}/img/product2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">COTTON SHIRT</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">₹250.00</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/product3.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="{{asset('public/assets/frontend')}}/img/product3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">COTTON SHIRT</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">₹250.00</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/product4.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="{{asset('public/assets/frontend')}}/img/product4.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">COTTON SHIRT</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">₹250.00</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/product5.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="{{asset('public/assets/frontend')}}/img/product5.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">COTTON SHIRT</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">₹250.00</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/product6.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="{{asset('public/assets/frontend')}}/img/product6.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">COTTON SHIRT</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">₹250.00</h5>
                    </div>
                </div>
				<div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/product3.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="{{asset('public/assets/frontend')}}/img/product3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">COTTON SHIRT</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">₹250.00</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/product4.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="{{asset('public/assets/frontend')}}/img/product4.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">COTTON SHIRT</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">₹250.00</h5>
                    </div>
                </div>
            </div>
			</div>
			
			</div>

            
        </div>
    </div>
    <!-- Projects End -->
</section>
@endsection


