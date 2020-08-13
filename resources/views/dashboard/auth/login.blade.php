<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
@include('dashboard.includes.head')
{{--<head>--}}
{{--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">--}}
{{--    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">--}}
{{--    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">--}}
{{--    <meta name="author" content="PIXINVENT">--}}
{{--    <title>Login Page - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin--}}
{{--        Dashboard--}}
{{--    </title>--}}
{{--    <link rel="apple-touch-icon" href="{{asset('dashboard/images/ico/apple-icon-120.png')}}">--}}
{{--    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/images/ico/favicon.ico')}}">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"--}}
{{--          rel="stylesheet">--}}
{{--    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"--}}
{{--          rel="stylesheet">--}}
{{--    <!-- BEGIN VENDOR CSS-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/vendors.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/forms/icheck/icheck.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/forms/icheck/custom.css')}}">--}}
{{--    <!-- END VENDOR CSS-->--}}
{{--    <!-- BEGIN MODERN CSS-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/app.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/custom-rtl.css')}}">--}}
{{--    <!-- END MODERN CSS-->--}}
{{--    <!-- BEGIN Page Level CSS-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/core/menu/menu-types/vertical-menu.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/core/colors/palette-gradient.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/pages/login-register.css')}}">--}}
{{--    <!-- END Page Level CSS-->--}}
{{--    <!-- BEGIN Custom CSS-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/style-rtl.css')}}">--}}
{{--    <!-- END Custom CSS-->--}}
{{--</head>--}}
<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="{{asset('dashboard/images/logo/logo-dark.png')}}" alt="branding logo">
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Login with Modern</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal form-simple" method="POST" action="{{ route('login') }}" novalidate>
                                        @csrf
                                        <fieldset class="form-group position-relative has-icon-left mb-2">
                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" id="email" placeholder="Your Email"
                                                   required>
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" id="password"
                                                   placeholder="Enter Password" required>
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" id="remember-me" class="chk-remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label for="remember-me">{{ __('Remember Me') }}</label>
                                                </fieldset>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <div class="col-md-6 col-12 text-center text-md-right"><a href="{{ route('password.request') }}" class="card-link">{{ __('Forgot Your Password?') }}</a></div>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>{{ __('Login') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@include('dashboard.includes.scripts')
</body>
</html>
