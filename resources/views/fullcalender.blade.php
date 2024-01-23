<!doctype html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ochre Media | PMS</title>

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/vendor/animate-css/vivify.min.css')}}">
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('public/assets/css/site.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

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
    <div class="card font_setting">
        <div class="header">
            <h2>Font Settings</h2>
        </div>
        <div>
            <div class="fancy-radio mb-2">
                <label><input name="font" value="font-krub" type="radio"><span><i></i>Krub Google font</span></label>
            </div>
            <div class="fancy-radio mb-2">
                <label><input name="font" value="font-montserrat" type="radio" checked><span><i></i>Montserrat Google font</span></label>
            </div>
            <div class="fancy-radio">
                <label><input name="font" value="font-roboto" type="radio"><span><i></i>Robot Google font</span></label>
            </div>
        </div>
    </div>
    
    <div class="card setting_switch">
        <div class="header">
            <h2>Settings</h2>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                Light Version
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="lv-btn" checked="">
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                RTL Version
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="rtl-btn">
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                Horizontal Henu
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="hmenu-btn" >
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                Mini Sidebar
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="mini-sidebar-btn">
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="form-group">
            <label class="d-block">Traffic this Month <span class="float-right">77%</span></label>
            <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="d-block">Server Load <span class="float-right">50%</span></label>
            <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
            </div>
        </div>
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
            <a href=""><img src="{{ asset('public/assets/images/ochre-logo.png')}}" alt="Ochre Media" class="img-fluid logo"><span>Ochre Media</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="{{ asset('public/assets/images/user-placeholder-sqr.jpg')}}" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ ucfirst(Auth::user()->name)}}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="{{route('users.show',Auth::user()->id)}}"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>                
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>
                    <li><a href="{{url('/')}}"><i class="icon-home"></i><span>Dashboard</span></a></li>
                    @if(Auth::user()->hasRole('admin'))
                    <li {!! (Request::is('department*') ? 'class="active open"' : '') !!}><a href="{{url('department')}}"><i class="icon-grid"></i><span>Departments</span></a></li>
                    
                    <li {!! (Request::is('designation*') ? 'class="active open"' : '') !!}><a href="{{url('designation')}}">
                        <i class="icon-equalizer"></i><span>Designations</span></a></li>

                    <li {!! (Request::is('teams*') ? 'class="active open"' : '') !!}><a href="{{url('teams')}}">
                        <i class="icon-layers"></i><span>Teams</span></a></li>
                    @endif

                    @if(Auth::user()->hasRole('admin') )
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

                  <li {!! (Request::is('docs-upload') ? 'class="active"' : '') !!}><a href="{{url('enquiry')}}"><i class="fa fa-circle-o"></i>Contacts</a></li>
                
                </ul>
            </nav>     
        </div>
    </div>


    <div id="main-content">        
     <div class="container pt-4 pb-4">
       <div id="calendar-78"></div>
      </div>
    </div>
    
</div>

<!-- Javascript -->
<script src="{{ asset('public/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{ asset('public/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{ asset('public/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
</body>
<script>
  window.onload = function() {
    var event =  JSON.parse('<?php echo $calendars ?>')
     var date = Date(y, m, d)
     console.log(date);
     var calEvent = [];
     i=0;
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    new Date(y, m, d);   
    $('#calendar-78').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        editable: false,
        events: event,
       // timeFormat: 'h(:mm)'
    });
};
</script>
</html>
