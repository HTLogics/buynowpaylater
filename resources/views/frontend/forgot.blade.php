@php($layoutface = "front")
@extends('layouts.'.$layoutface)
@section("content")

<section class="inner-banner" style="background-image:url('{{asset('public/assets/frontend')}}/img/banner4.jpg');">


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="banner-title">
<h1>Forgot Password</h1>
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
                    <div class="p-lg-5 pe-lg-0 ">
                        <!--<div class="text-center">
						 <h1 class="mb-4">{{ __('Login Now') }}</h1>
                <p class="text">{{ __('Welcome back, please sign in below') }}</p>
                        </div>-->
						
  
  
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Forgot Password</label>
		
		<div class="login-form">
			<div class="sign-in-htm">
				
				
				
				@include('includes.admin.form-login')
                <form id="forgotform" action="{{ route('admin.forgot.submit') }}" method="POST">
                  @csrf
                  <div class="group">
                    <input type="email" name="email" class="input" placeholder="{{ __('Type Email Address') }}" value="" required="" autofocus>
                  </div>
                  <div class="group form-forgot-pass">
                    <div class="right">
                      <a href="{{ route('admin.login') }}">
                        {{ __('Remember Password? Login') }}
                      </a>
                    </div>
                  </div>
				  <div class="group">
                  <input id="authdata" type="hidden"  value="{{ __('Checking...') }}">
                  <button class="button submit-btn">{{ __('Submit') }}</button>
				  </div>
                </form>
				
				
			</div>
			
			
			
		</div>
	</div>
</div>
						
						
                    </div>
                </div>
            </div>
        </div>
						
    </div>
	
	

</section>
@endsection


