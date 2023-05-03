<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Brandlocker</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}" />
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&amp;family=Roboto:wght@500;700;900&amp;display=swap" rel="stylesheet">
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Libraries Stylesheet -->
        <link href="{{asset('public/assets/frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/assets/frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('public/assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Template Stylesheet -->
        <link href="{{asset('public/assets/frontend/css/style.css')}}" rel="stylesheet">
        <style>
            div#kt_content {
                margin-top: 25px;
            }
        </style> @yield('styles')
    </head>
    <body>
        <!-- Spinner Start -->
        <!--<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>-->
        <!-- Spinner End -->
        <!-- Topbar Start -->
        <div class="container-fluid p-0 top-bar">
            <div class="row gx-0 d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <small>Free shipping on all orders above 499 INR</small>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <small class="fa fa-phone-alt me-2"></small>
                        <small>
                            <a href="tel:+918264266734" class="link-footer">+918264266734</a>
                        </small>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center mx-n2">
                        <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" target="__blank" href="https://www.facebook.com/profile.php?id=100076256435901">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" target="__blank" href="https://instagram.com/safebuy95?igshid=ZDdkNTZiNTM=">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" target="__blank" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-square btn-link rounded-0" target="__blank" href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 shadow-sm" style="top: 0px;">
            <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                <figure>
                    <img src="{{asset('public/assets/frontend/img/safebuy-logo.webp')}}" alt="Trulli">
                </figure>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('about')}}" class="nav-item nav-link">About Us</a>
                    <a href="{{route('product')}}" class="nav-item nav-link">Our Products</a>
                    <div class="nav-item dropdown">
                        <a href="{{route('shop')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Shop Now</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="#" class="dropdown-item">Men</a>
                            <a href="#" class="dropdown-item">Women</a>
                        </div>
                    </div>
                    <a href="{{route('outwear')}}" class="nav-item nav-link">Outwear</a>
                    <a href="{{route('contact')}}" class="nav-item nav-link">Contact Us</a>
                </div>
                <a href="{{route('login')}}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Sign In <i class="fa fa-arrow-right ms-3"></i>
                </a>
            </div>
        </nav>
        <!-- Navbar End --> @yield('content') <section class="free-shipping-section">
            <!-- Feature Start -->
            <div class="container-xxl">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                            <div class="icon-flex">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                </div>
                                <div class="text-icons">
                                    <h5>Free Shipping</h5>
                                    <span>Free Shipping for orders over £130.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                            <div class="icon-flex">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box">
                                        <i class="far fa-money-bill-alt"></i>
                                    </div>
                                </div>
                                <div class="text-icons">
                                    <h5>Money Guarantee</h5>
                                    <span>Within 30 days for an exchange.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                            <div class="icon-flex">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box">
                                        <i class="fas fa-headphones-alt"></i>
                                    </div>
                                </div>
                                <div class="text-icons">
                                    <h5>Online Support</h5>
                                    <span>Within 30 days for an exchange.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeIn;">
                            <div class="icon-flex">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box">
                                        <i class="far fa-credit-card"></i>
                                    </div>
                                </div>
                                <div class="text-icons">
                                    <h5>Flexible Payment</h5>
                                    <span>Pay with Multiple Credit Cards.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feature Start -->
        </section>
        <section class="footer-section">
            <!-- Footer Start -->
            <div class="container-fluid text-body footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-white mb-4">Address</h5>
                            <p class="mb-2">
                                <span class="footer-address">
                                    <i class="fa fa-map-marker-alt me-3"></i>
                                </span>SCF 12 Suncity, Ropar (1400001), Opposite Kamal Nursing Home
                            </p>
                            <p class="mb-2">
                                <i class="fa fa-phone-alt me-3"></i>
                                <a href="tel:+918264266734" class="link-footer">+918264266734</a>
                            </p>
                            <p class="mb-2">
                                <i class="fa fa-envelope me-3"></i>
                                <a href="mailto:safebuy95@gmail.com" class="link-footer">safebuy95@gmail.com</a>
                            </p>
                            <div class="d-flex pt-2">
                                <a class="btn btn-square btn-outline-light btn-social" target="_blank" href="https://www.facebook.com/profile.php?id=100076256435901">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="btn btn-square btn-outline-light btn-social" target="_blank" href="https://instagram.com/safebuy95?igshid=ZDdkNTZiNTM=">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="btn btn-square btn-outline-light btn-social" target="_blank" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="btn btn-square btn-outline-light btn-social" target="_blank" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-white mb-4">Quick Links</h5>
                            <a class="btn btn-link" href="{{route('about')}}">About Us</a>
                            <a class="btn btn-link" href="{{route('contact')}}">Contact Us</a>
                            <a class="btn btn-link" href="{{route('shop')}}">Shop Now</a>
                            <a class="btn btn-link" href="{{route('terms')}}">Terms &amp; Condition</a>
                            <a class="btn btn-link" href="{{route('support')}}">Support</a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-white mb-4">Resources</h5>
                            <a class="btn btn-link" href="{{route('about')}}">About Us</a>
                            <a class="btn btn-link" href="{{route('contact')}}">Contact Us</a>
                            <a class="btn btn-link" href="{{route('shop')}}">Shop Now</a>
                            <a class="btn btn-link" href="{{route('terms')}}">Terms &amp; Condition</a>
                            <a class="btn btn-link" href="{{route('support')}}">Support</a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-white mb-4">Newsletter</h5>
                            <p>Subscribe to our newsletter.</p>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                                <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0"> © <a href="#">Brandlocker</a>, All Right Reserved. </div>
                            <div class="col-md-6 text-center text-md-end"> Designed By <a href="https://htlogics.com">HT Logics Pvt. Ltd</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </section>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top" style="">
            <i class="bi bi-arrow-up"></i>
        </a>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('public/assets/frontend/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('public/assets/frontend/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('public/assets/frontend/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('public/assets/frontend/lib/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('public/assets/frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/assets/frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('public/assets/frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
        <!-- Template Javascript -->
        <script src="{{asset('public/assets/frontend/js/main.js')}}"></script>
        <!-- Dashboard Core -->
        <script src="{{asset('public/assets/admin/login/js/vendors/jquery-1.12.4.min.js')}}"></script>
        <!-- AJAX Js-->
        <script src="{{asset('public/assets/admin/login/js/myscript.js')}}"></script>
        <div id="lightboxOverlay" class="lightboxOverlay" style="display: none;"></div>
        <div id="lightbox" class="lightbox" style="display: none;">
            <div class="lb-outerContainer">
                <div class="lb-container">
                    <img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                    <div class="lb-nav">
                        <a class="lb-prev" href=""></a>
                        <a class="lb-next" href=""></a>
                    </div>
                    <div class="lb-loader">
                        <a class="lb-cancel"></a>
                    </div>
                </div>
            </div>
            <div class="lb-dataContainer">
                <div class="lb-data">
                    <div class="lb-details">
                        <span class="lb-caption"></span>
                        <span class="lb-number"></span>
                    </div>
                    <div class="lb-closeContainer">
                        <a class="lb-close"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Page Scripts --> 
		@yield('scripts')
    </body>
    <!-- end::Body -->
</html>