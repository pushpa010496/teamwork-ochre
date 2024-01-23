<!doctype html>

<html lang="en">



<head>

<title>Ochre PMS | Login</title>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">

<meta name="author" content="GetBootstrap, design by: puffintheme.com">



<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- VENDOR CSS -->

<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{ asset('public/assets/vendor/animate-css/vivify.min.css')}}">

<!-- MAIN CSS -->

<link rel="stylesheet" href="{{ asset('public/assets/css/site.min.css')}}">



</head>



<body class="theme-cyan font-montserrat light_version">

<!-- Page Loader -->

<div class="page-loader-wrapper">

    <div class="loader">

        <div class="bar1"></div>

        <div class="bar2"></div>

        <div class="bar3"></div>

        <div class="bar4"></div>

        <div class="bar5"></div>

    </div>

</div>



<div class="auth-main2 particles_js">

    <div class="auth_div vivify fadeInTop">

        <div class="card">            

            <div class="body">

                <div class="login-img">

                    <img class="img-fluid" src="{{ asset('public/assets/images/login-img.png')}}" />

                </div>

                <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                    {{ csrf_field() }}

                    <div class="mb-3">

                        <p class="lead">Login to your account</p>

                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">

                        <label for="signin-email" class="control-label sr-only">Email</label>

                        <input type="email" class="form-control round" id="signin-email" value="{{old('email')}}" placeholder="Email">

                         <span class="help-block">{{ $errors->first('email', ':message') }}</span>

                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">

                        <label for="signin-password" class="control-label sr-only">Password</label>

                        <input type="password" class="form-control round" id="signin-password"  placeholder="Password">

                        <span class="help-block">{{ $errors->first('email', ':message') }}</span>

                    </div>

                    <div class="form-group clearfix">

                        <label class="fancy-checkbox element-left">

                            <input type="checkbox">

                            <span>Remember me</span>

                        </label>								

                    </div>

                    <button type="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>

                    <div class="mt-4">

                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>

                        <span>Don't have an account? <a href="page-register.html">Register</a></span>

                    </div>

                </form>

                <div class="pattern">

                    <span class="red"></span>

                    <span class="indigo"></span>

                    <span class="blue"></span>

                    <span class="green"></span>

                    <span class="orange"></span>

                </div>

            </div>            

        </div>

    </div>

    <div id="particles-js"></div>

</div>

<!-- END WRAPPER -->

    

<script src="{{ asset('public/assets/bundles/libscripts.bundle.js')}}"></script>

<script src="{{ asset('public/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{ asset('public/assets/bundles/mainscripts.bundle.js')}}"></script>

</body>

</html>

