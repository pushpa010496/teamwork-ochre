<!doctype html>
<html lang="en">

<head>
<title>Oculux | 404</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
{{-- <link rel="stylesheet" href="{{ asset('public/assets/vendor/font-awesome/css/font-awesome.min.css')}}"> --}}
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('public/assets/vendor/animate-css/vivify.min.css')}}">

<link rel="stylesheet" href="{{ asset('public/assets/css/site.min.css')}}">

<style type="text/css">
    .auth-main .auth_brand .navbar-brand{
        color: #c1272d;
    }
</style>
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
            <a class="navbar-brand" href="javascript:void(0);"><img src="{{ asset('public/assets/images/ochre-logo.png')}}" width="30" height="30" class="d-inline-block align-top mr-2"  alt="">Ochre Media</a>                                                
        </div>
        <div class="card page-400">
            <div class="body">
                <p class="lead mb-3"><span class="number left">404 </span><span class="text">Oops! <br/>Page Not Found</span></p>
                <p>The page you were looking for could not be found, please <a href="javascript:void(0);">contact us</a> to report this issue.</p>
                <div class="margin-top-30">
                    <a href="javascript:history.go(-1)" class="btn btn-round btn-default btn-block"><i class="fa fa-arrow-left"></i> <span>Go Back</span></a>
                    <a href="{{url('/')}}" class="btn btn-round btn-primary btn-block"><i class="fa fa-home"></i> <span>Home</span></a>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->

<!-- Javascript -->
<script src="{{ asset('public/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{ asset('public/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{ asset('public/assets/bundles/mainscripts.bundle.js')}}"></script>

</body>
</html>