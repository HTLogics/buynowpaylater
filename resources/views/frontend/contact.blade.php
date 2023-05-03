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
                        <div class="cont-icon">
                            <i class="fa fa-map-marker-alt me-3"></i>
                        </div>
                        <div class="cont-txt">SCF 12 Suncity, Ropar (1400001), Opposite Kamal Nursing Home</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-box">
                        <div class="cont-icon">
                            <i class="fa fa-phone-alt me-3"></i>
                        </div>
                        <div class="cont-txt">
                            <a href="tel:+918264266734">+918264266734</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-box">
                        <div class="cont-icon">
                            <i class="fa fa-envelope me-3"></i>
                        </div>
                        <div class="cont-txt">
                            <a href="mailto:safebuy95@gmail.com">safebuy95@gmail.com</a>
                        </div>
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
                        <form action="{{route('contact_submit')}}" method="POST" id="contact_form" name="contact_form"> @csrf <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="name" placeholder="Your Name" style="height: 55px;margin: 0;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" name="email" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="mobile" placeholder="Your Mobile" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" name="service" style="height: 55px;">
                                        <option value="" selected>Select A Service</option>
                                        <option value="Service 1">Service 1</option>
                                        <option value="Service 2">Service 2</option>
                                        <option value="Service 3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea name="note" class="form-control border-0" style="min-height: 100px;" placeholder="Note"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                                </div>
                                <div class="col-12">
                                    <div class="loader"></div>
                                    <div id="message"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->
</section> @endsection @section("scripts") <script>
    /*form submission event*/
jQuery("#contact_form").submit(function(e) {
	e.preventDefault();
	jQuery('.loader').show();
	jQuery('.loader').html('<br><div class = "loader-text alert alert-warning" > Please wait... </div>');
		jQuery("input,select,textarea").css('border', '1px solid black'); jQuery('.mes').remove();
		var url = jQuery(this).attr('action');
		var formData = new FormData(jQuery(this)[0]); 
		jQuery.ajax({
		type: "POST",
		url: url,
		data: formData,
		processData: false,
		dataType: 'json',
		contentType: false,
		success: function(data) {
		console.log(data);
		if (data.status == false) {
			console.log(data);
			jQuery('#message').html(data.message);
			var a = data['errors'];
			jQuery.each(data.errors, function(key, value) {
					jQuery("input[name='" + key + "'],select[name='" + key + "'],textarea[name='" + key + "']").css('border', '1px solid red');
					jQuery("input[name='" + key + "'],select[name='" + key + "'],textarea[name='" + key + "']").after("<small class = 'mes'> "+value+"</small>");
					});
			}
			if (data.status == true) {
				jQuery("input[type=text],select,textarea").css('border', '1px solid #1abb9c').delay(2000).css('border', '1px solid #e2e2e4');
				jQuery("input[type=text],select,textarea").val('');
				jQuery('#message').html(data.message);
				jQuery("#message").fadeIn(100);
				jQuery("html, body").animate({
					scrollTop: jQuery("#message").offset().top - 100
				}, 2000);
				jQuery("#message").delay(3000);
			}
			jQuery('.loader').hide();
		}
	});
});
</script> 
@endsection