@php($layoutface = "front")
@extends('layouts.'.$layoutface)
@section("content")
<section class="inner-banner" style="background-image:url('{{asset('public/assets/frontend')}}/img/banner4.jpg');">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="banner-title">
				<h1>Login</h1>
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
						<div class="login-wrap">
							<div class="login-html">
								<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
								<div class="login-form">
									<div class="sign-in-htm">
										@include('includes.admin.form-login')
										<form id="loginform" action="{{ route('admin.login.submit') }}" method="POST">
										  @csrf
										  <div class="group">
										  <label for="user" class="label">Username</label>
											<input type="text" name="user" class="input" placeholder="{{ __('Type User Name') }}" value="" autofocus>
										  </div>
										  <div class="group">
										  <label for="pass" class="label">Password</label>
											<input type="password" name="password" class="input" placeholder="{{ __('Type Password') }}">
										  </div>
										  <div class="group form-forgot-pass">
											<div class="left">
											  <input type="checkbox" name="remember"  id="rp" {{ old('remember') ? 'checked' : '' }}>
											  <label for="rp">{{ __('Remember Password') }}</label>
											</div>
										  </div>
										  <div class="group">
										  <input id="authdata" type="hidden"  value="{{ __('Authenticating...') }}">
										  <button class="button submit-btn">{{ __('Login') }}</button>
										  </div>
										  <div class="hr"></div>
										   <div class="foot-lnk">
											<a href="{{ route('forgot') }}">
												{{ __('Forgot Password?') }}
											  </a>
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


