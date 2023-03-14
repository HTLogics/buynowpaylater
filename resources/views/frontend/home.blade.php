@php($layoutface = "front")
@extends('layouts.'.$layoutface)
@section("content")


<section class="banner">


    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('public/assets/frontend')}}/img/banner01.jpg'>">
                <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/banner01.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown">Big patterns are back in fashion</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                <a href="" class="btn btn-primary red-btn rounded-pill py-3 px-5 animated slideInLeft">Shop Now Pay Later</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('public/assets/frontend')}}/img/banner03.jpg'>">
                <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/banner03.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown">The latest men'strends this season</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                <a href="" class="btn btn-primary red-btn rounded-pill py-3 px-5 animated slideInLeft">Shop Now Pay Later</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('public/assets/frontend')}}/img/banner05.jpg'>">
                <img class="img-fluid" src="{{asset('public/assets/frontend')}}/img/banner05.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <!--<h1 class="display-2 text-white animated slideInDown">Renew and Revivalenergy Energy</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


</section>


<section class="home-content">
    <!-- About Start -->
    <div class="container">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
               
                <div class="col-lg-12 about-text wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="p-lg-5 pe-lg-0 text-center">
                        
                        <h1 class="mb-4">Choose How to Shop</h1>
                        <p>At SAFEBUY- Buy Now and Pay Later features we believe money should not be a reason to buy happiness. Hence, we have tied up with Sezzle, ePayLater, LazyPay, Ola Postpaid, Paytm Postpaid and Simpl which offers interest free credit for 14 days and pay at your convenience. Make multiple purchases and pay for all of them in one go.</p>
						
						<div class="sezzle-logo">
						<img src="{{asset('public/assets/frontend')}}/img/sezzle.png" class="sezzle-logo">
						<p>Split your entire online purchase into 4 interest-free payments, over 6 weeks with no impact to your credit.</p>
						</div>
                       
                       <!-- <div class="sezle-banner">
						
						<img src="img/installment-img.png" class="banner-img">
						</div>-->
                    </div>
                </div>
            </div>
			
			
			<div class="row home-icon-row">
			<div class="col-sm-3">
			<div class="box-4 box1">
			<div class="iocn-circle"><h4>1</h4></div>
			<div class="cont-row">
			<h2>25%</h2>
			<p>Today</p>
			</div>
			</div>
			</div>
			
			<div class="col-sm-3">
			<div class="box-4 box2">
			<div class="iocn-circle"><h4>2</h4></div>
			<div class="cont-row">
			<h2>25%</h2>
			<p>Week 2</p>
			</div>
			</div>
			</div>
			
			<div class="col-sm-3">
			<div class="box-4 box1">
			<div class="iocn-circle"><h4>3</h4></div>
			<div class="cont-row">
			<h2>25%</h2>
			<p>Week 4</p>
			</div>
			</div>
			</div>
			
			<div class="col-sm-3">
			<div class="box-4 box2">
			<div class="iocn-circle"><h4>4</h4></div>
			<div class="cont-row">
			<h2>25%</h2>
			<p>Week 6</p>
			</div>
			</div>
			</div>
			
			
			</div>
			
			
        </div>
		
		
		<div class="container px-lg-0">
            <div class="row g-0 mx-lg-0">
               
                <div class="col-lg-12 about-text py-5 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="pe-lg-0 text-center">
                        
                        <h2 class="mb-4">Here's how to Sezzle</h2>
						
						<div class="row py-5">
						<div class="col-sm-4">
						<div class="sezzle-box">
						<img src="{{asset('public/assets/frontend')}}/img/img1.jpg" class="icon-sezzle">
						<h4>Sign Up</h4>
						<p>Its's quick. easy, and approval decisions are instant.</p>
						</div>
						</div>
						
						<div class="col-sm-4">
						<div class="sezzle-box">
						<img src="{{asset('public/assets/frontend')}}/img/img2.jpg" class="icon-sezzle">
						<h4>Shop</h4>
						<p>Choose from over 47,000 brands to shop at.</p>
						</div>
						</div>
						
						<div class="col-sm-4">
						<div class="sezzle-box">
						<img src="{{asset('public/assets/frontend')}}/img/img3.jpg" class="icon-sezzle">
						<h4>Sezzle It</h4>
						<p>Simply select Sezzle at checkout and complete your order.</p>
						</div>
						</div>
						
						</div>
                    </div>
                </div>
            </div>
        </div>
		
		
		
    </div>
    <!-- About End -->
</section>
@endsection


