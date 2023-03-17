<!doctype html>
<html lang="en" dir="ltr">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="author" content="GeniusOcean">
    <!-- Title -->
    <title>Forgot Password | Recurring</title>
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
                <h4 class="title">{{ __('Forgot Password') }}</h4>
              </div>
              <div class="login-form">
                @include('includes.admin.form-login')
                <form id="forgotform" action="{{ route('admin.forgot.submit') }}" method="POST">
                  @csrf
                  <div class="form-input">
                    <input type="email" name="email" class="User Name" placeholder="{{ __('Type Email Address') }}" value="" required="" autofocus>
                    <i class="icofont-user-alt-5"></i>
                  </div>
                  <div class="form-forgot-pass">
                    <div class="right">
                      <a href="{{ route('admin.login') }}">
                        {{ __('Remember Password? Login') }}
                      </a>
                    </div>
                  </div>
                  <input id="authdata" type="hidden"  value="{{ __('Checking...') }}">
                  <button class="submit-btn">{{ __('Submit') }}</button>
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