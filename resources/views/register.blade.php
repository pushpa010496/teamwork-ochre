<!doctype html>
<html lang="en">

<head>
<title>Oculux | Sign Up</title>
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

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>
<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="{{ asset('public/assets/images/login-img.png')}}" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Oculux</a>                                                
        </div>
        <div class="card">
            <div class="body">
                <p class="lead">Create an account</p>
                
                
                <form class="form-auth-small m-t-20" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                    
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" name="name" class="form-control round" placeholder="Your Name">
                        <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control round" placeholder="Your email">
                        <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                    </div>

                    <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }}">                            
                        <input type="password" name="password" class="form-control round" placeholder="Password">
                        <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                    </div>

                    <div class="form-group  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">    
                        <input type="password" name="password_confirmation" class="form-control round" placeholder="password_confirmation">
                        <span class="help-block">{{ $errors->first('password_confirmation', ':message') }}</span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-round btn-block">Register</button>                                
                </form>
                <div class="separator-linethrough"><span>OR</span></div>

                <a href={{route('login')}} class="btn btn-round btn-signin-social"> already have an account?  Login</a>
                <button class="btn btn-round btn-signin-social"><i class="fa fa-facebook-official facebook-color"></i> Sign in with Facebook</button>
                <button class="btn btn-round btn-signin-social"><i class="fa fa-twitter twitter-color"></i> Sign in with Twitter</button>
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