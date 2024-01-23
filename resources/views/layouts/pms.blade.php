<!doctype html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ochre Media | CRM</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="keywords" content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
{{-- <link rel="stylesheet" href="{{ asset('public/assets/vendor/font-awesome/css/font-awesome.min.css')}}"> --}}
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('public/assets/vendor/animate-css/vivify.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/vendor/sweetalert/sweetalert.css')}}">
@livewireStyles
<style>
    .dataTables_length{display: none;}

    .help-block{
        color: #ff6666 !important;
    }
/*Task list css*/
     .new_timeline .bullet, .team-info {
  margin-top: 5px;
}
.w150 {
  width: 150px;
}
.team-info li {
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  display: inline-block;
}
.team-info li img {
  width: 32px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  border: 2px solid #fff;
  box-shadow: 0px 2px 10px 0px rgba(0,0,0,0.2);
}
.team-info li+li {
  margin-left: -10px;
}
/*End Task list css*/
</style>
@yield('styles')
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('public/assets/css/site.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/css/custom.css')}}">

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

<!-- Theme Setting -->
<div class="themesetting">
    <a href="javascript:void(0);" class="theme_btn"><i class="icon-magic-wand"></i></a>
    <div class="card theme_color">
        <div class="header">
            <h2>Theme Color</h2>
        </div>
        <ul class="choose-skin list-unstyled mb-0">
            <li data-theme="green"><div class="green"></div></li>
            <li data-theme="orange"><div class="orange"></div></li>
            <li data-theme="blush"><div class="blush"></div></li>
            <li data-theme="cyan" class="active"><div class="cyan"></div></li>
            <li data-theme="indigo"><div class="indigo"></div></li>
            <li data-theme="red"><div class="red"></div></li>
        </ul>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="index.html"><img src="{{ asset('public/assets/images/ochre-logo.png')}}" alt="Ochre Media" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
            </div>
            
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                       
                        <li><a href="{{ url('logout') }}" title="Logout" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
    </nav>




    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="">
                <img src="{{ asset('public/assets/images/ochre-logo.png')}}" alt="Ochre Media" class="img-fluid logo"><span>Ochre Media</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll" >
            <div class="user-account">
                <div class="user_div">
                    <img src="{{ asset('public/assets/images/user-placeholder-sqr.jpg')}}" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ ucfirst(Auth::user()->name)}}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="{{route('users.show',Auth::user()->id)}}"><i class="icon-user"></i>My Profile</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>                
            </div>  

            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>
                    <li><a href="{{url('')}}"><i class="icon-home"></i><span>Dashboard</span></a></li>

                   <!--  <li><a href="{{url('events')}}"><i class="icon-home"></i><span>Home</span></a></li> -->
                    @if(Auth::user()->hasRole('admin')  || Auth::user()->hasRole('manager') || Auth::user()->hasRole('sub-admin'))
                    <li {!! (Request::is('department*') ? 'class="active open"' : '') !!}><a href="{{url('department')}}"><i class="icon-grid"></i><span>Departments</span></a></li>
                    
                    <li {!! (Request::is('designation*') ? 'class="active open"' : '') !!}><a href="{{url('designation')}}">
                        <i class="icon-equalizer"></i><span>Designations</span></a></li>

                    <li {!! (Request::is('teams*') ? 'class="active open"' : '') !!}><a href="{{url('teams')}}">
                        <i class="icon-layers"></i><span>Teams</span></a></li>
                    @endif

                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                        <li {!! (Request::is('users*') ? 'class="active open"' : '') !!}>
                        <a href="{{url('users')}}"><i class="icon-users"></i><span>Employee</span></a></li>
                    @endif
                     @if(Auth::user()->hasRole('admin') )    
                    <li {!! (Request::is('roles*') ? 'class="active open"' : '') !!}>
                        <a href="{{url('roles')}}"><i class="icon-wallet"></i><span>Roles</span></a></li>        
                    <li {!! (Request::is('permissions*') ? 'class="active open"' : '') !!}>
                        <a href="{{url('permissions')}}"><i class="icon-credit-card"></i><span>Permissions</span></a></li>        

                     @endif   
                     <li {!! (Request::is('get-excel*') ? 'class="active"' : '') !!}><a href="{{url('companyinfo')}}"><i class="fa fa-circle-o"></i>Company</a></li>
                     @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                      <li {!! (Request::is('docs-upload') ? 'class="active"' : '') !!}><a href="{{url('enquiry')}}"><i class="fa fa-circle-o"></i>Contacts</a>
                      </li>
                    @endif
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                      <li {!! (Request::is('docs-upload') ? 'class="active"' : '') !!}><a href="{{url('enquiry')}}"><i class="fa fa-circle-o"></i>plant dasboard</a>
                      </li>
                    @endif
                </ul>
            </nav>     
        </div>
    </div>


    <div id="main-content">        
      @yield('content')
    </div>
    
</div>


<!-- Javascript -->
<script src="{{ asset('public/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{ asset('public/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{ asset('public/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{ asset('public/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{ asset('public/assets/js/pages/ui/dialogs.js')}}"></script>
<!--<script src="{{ asset('public/assets/js/pages/tables/jquery-datatable.js')}}"></script>-->
<script>
    // $('.dataTable').dataTable({searching: false});
</script>
@livewireScripts
@yield('scripts')
</body>
</html>
