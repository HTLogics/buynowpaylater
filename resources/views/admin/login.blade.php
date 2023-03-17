<!doctype html>
<html lang="en" dir="ltr">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Dsk">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Login | Recurring</title>
    <!-- favicon -->
    <link rel="icon"  type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}"/>
    <!-- Bootstrap -->
    <link href="{{asset('public/assets/admin/login/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/login/css/fontawesome.css')}}">
    <!-- icofont -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/login/css/icofont.min.css')}}">
	
    <!-- Main Css -->
    <link href="{{asset('public/assets/admin/login/css/style.css')}}" rel="stylesheet"/>
    @yield('styles')

  </head>
  <body class="login-admin">

    <!-- Login and Sign up Area Start -->
    <section class="login-signup">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="login-area">
              <div class="header-area">
                <h4 class="title">{{ __('Login Now') }}</h4>
                <p class="text">{{ __('Welcome back, please sign in below') }}</p>
              </div>
              <div class="login-form">
                @include('includes.admin.form-login')
                <form id="loginform" action="{{ route('admin.login.submit') }}" method="POST">
                  @csrf
                  <div class="form-input">
                    <input type="text" name="user" class="User Name" placeholder="{{ __('Type User Name') }}" value="" autofocus>
                    <i class="icofont-user-alt-5"></i>
                  </div>
                  <div class="form-input">
                    <input type="password" name="password" class="Password" placeholder="{{ __('Type Password') }}">
                    <i class="icofont-ui-password"></i>
                  </div>
                  <div class="form-forgot-pass">
                    <div class="left">
                      <input type="checkbox" name="remember"  id="rp" {{ old('remember') ? 'checked' : '' }}>
                      <label for="rp">{{ __('Remember Password') }}</label>
                    </div>
                    <div class="right">
                      <a href="{{ route('admin.forgot') }}">
                        {{ __('Forgot Password?') }}
                      </a>
                    </div>
                  </div>
                  <input id="authdata" type="hidden"  value="{{ __('Authenticating...') }}">
                  <button class="submit-btn">{{ __('Login') }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Login and Sign up Area End -->


    <!-- Dashboard Core -->
    <script src="{{asset('public/assets/admin/login/js/vendors/jquery-1.12.4.min.js')}}"></script>

    <!-- AJAX Js-->
    <script src="{{asset('public/assets/admin/login/js/myscript.js')}}"></script>

  </body>

</html>