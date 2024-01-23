<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ config('app.url') }}img/favicon.ico" type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/skins/_all-skins.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <!-- <link rel="stylesheet" href="public/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"> -->
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/admin/bower_components/select2/dist/css/select2.min.css')}}">
  <!-- Theme style -->



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="{{asset('public/build/css/jasny-bootstrap.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('public/admin/plugins/validator/bootstrapValidator.min.css')}}">

  <style type="text/css">

    .skin-blue .main-header .logo{
      background-color: #fff !important;
    }


  .form-group.has-error .select2-container--default .select2-selection--single{
    border-color: #dd4b39;
    box-shadow: none;
  }
  .select2-container .select2-selection--single{
    height:34px;
    border-radius: 0;
  }
  .width100, .select2-container{
    width:100% !important;
  }
  .navbar.navbar-static-top{
    box-shadow: 0 5px 6px -6px #545454;
  }
  .form-group.has-error .fileinput .thumbnail {
    border-color: #dd4b39;
  }
  .form-group.has-success .fileinput .thumbnail {
    border-color: #00a65a;
  }
  .fileupload-exists .fileinput-new, .fileinput-new .fileupload-exists {
    display: none;
}
.skin-black .sidebar-menu > li.active > a{
  border-left-color:#92278f;
}
  </style>

</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('products')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{asset('public/admin/dist/img/main-logo-small.png')}}" class="img-fluid" alt="logo" width="40"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{asset('public/admin/dist/img/main-logo.png')}}" class="img-fluid" alt="logo" width="170"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                    @if (Auth::guest())
                    @else
                    <?php if (Auth::user()->can('settings')){ ?>
                    
                   <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-gears"></i>
                          <!-- <span class="label label-danger">9</span> -->
                        </a>
                        <ul class="dropdown-menu">
                         
                          <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                              <?php if (Auth::user()->can('settings')){ ?>
                              <li><a href="{{route('permissions.index')}}">Permission</a></li>                  
                              <li><a href="{{route('roles.index')}}">Role</a></li>                 
                              <li><a href="{{route('users.index')}}">Users</a></li>
                              <?php } ?>
                            </ul>
                          </li>
                          <!-- <li class="footer">
                            <a href="#">View all tasks</a>
                          </li> -->
                        </ul>
                      </li>
                   <?php } ?>
                  @endif
                @guest
                @else
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('public/admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ ucfirst(Auth::user()->name) }}</span>
            </a>
             
            <ul class="dropdown-menu">
               
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('public/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                 {{ ucfirst(Auth::user()->name) }}
                  <small>Ochre-Media</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                 <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
             
            </ul>
          </li> 
          @endguest
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('public/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ config('app.name', 'Clients') }}</p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
      {{--   <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="admin/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li> --}}
        <!-- <li>
          <a href=" {{ url('companyprofile') }}">
            <i class="fa fa-users"></i> <span>Profile</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li> -->

 {{-- 
        <li  {!! (Request::is('products*') ? 'class="active"' : '') !!}>
          <a href="{{ url('products') }}">
            <i class="fa fa-product-hunt"></i> <span>Products</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

             <li  {!! (Request::is('products*') ? 'class="active"' : '') !!}>
          <a href="{{ url('products') }}">
            <i class="fa fa-product-hunt"></i> <span>Employee</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
 <li  {!! (Request::is('companypressrealeses*') ? 'class="active"' : '') !!}>
          <a href="{{url('companypressrealeses') }}">
            <i class="fa fa-newspaper-o"></i> <span>New Tasks</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
        <li  {!! (Request::is('companypressrealeses*') ? 'class="active"' : '') !!}>
          <a href="{{url('companypressrealeses') }}">
            <i class="fa fa-newspaper-o"></i> <span>Sheduled Tasks</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>  
        <li {!! (Request::is('companywhitepapers*') ? 'class="active"' : '') !!}>
          <a href="{{ url('companywhitepapers') }}">
            <i class="fa fa-paper-plane-o"></i> <span>White Papers</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
         <li {!! (Request::is('companycatalogs*') ? 'class="active"' : '') !!}>
          <a href="{{url('companycatalogs')}}">
            <i class="fa fa-book"></i> <span>Catalogues</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
         <li {!! (Request::is('companyvideos*') ? 'class="active"' : '') !!}>
          <a href="{{url('companyvideos')}}">
            <i class="fa fa-video-camera "></i> <span>Videos</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

        <li {!! (Request::is('tickets*') ? 'class="active"' : '') !!}>
          <a href="{{url('tickets')}}">
            <i class="fa fa-tag "></i> <span>Tickets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>   
        <li {!! (Request::is('datamove*') ? 'class="active"' : '') !!}>
          <a href="{{url('datamove')}}">
            <i class="fa fa-tag "></i> <span>Upload Data</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>   

        <li {!! (Request::is('datamove*') ? 'class="active"' : '') !!}>
          <a href="{{url('datamove')}}">
            <i class="fa fa-tag "></i> <span>Brand Info</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>  

        <li>
          <a href="{{url('categories')}}">
            <i class="fa fa-tag "></i> <span>Category Info</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>  

        <li {!! (Request::is('datamove*') ? 'class="active"' : '') !!}>
          <a href="{{url('datamove')}}">
            <i class="fa fa-tag "></i> <span>Product</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li> 
--}} 
      <li  {!! (Request::is('upload*') || Request::is('get-excel*') ? 'class="treeview active"' : 'class="treeview"') !!}>
          <a href="#">
            <i class="fa fa-cloud-upload"></i> <span>Organization</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li {!! (Request::is('get-excel*') ? 'class="active"' : '') !!}><a href="{{url('department')}}"><i class="fa fa-circle-o"></i>Department</a></li>
            <li {!! (Request::is('docs-upload') ? 'class="active"' : '') !!}><a href="{{url('designation')}}"><i class="fa fa-circle-o"></i>Designation</a></li>
            <li {!! (Request::is('upload*') ? 'class="active"' : '') !!}><a href="{{url('employee')}}"><i class="fa fa-circle-o"></i>Employee</a></li>
          </ul>
        </li>  
      

       <li  {!! (Request::is('upload*') || Request::is('get-excel*') ? 'class="treeview active"' : 'class="treeview"') !!}>
          <a href="#">
            <i class="fa fa-cloud-upload"></i> <span>Task Manager</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li {!! (Request::is('get-excel*') ? 'class="active"' : '') !!}><a href="{{url('task')}}"><i class="fa fa-circle-o"></i>New Task</a></li>
            <li {!! (Request::is('docs-upload') ? 'class="active"' : '') !!}><a href="{{url('sheduled')}}"><i class="fa fa-circle-o"></i>Sheduled Tasks</a></li>
           
          </ul>
        </li>  

        <li  {!! (Request::is('upload*') || Request::is('get-excel*') ? 'class="treeview active"' : 'class="treeview"') !!}>
          <a href="#">
            <i class="fa fa-cloud-upload"></i> <span>Leave Manager</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li {!! (Request::is('get-excel*') ? 'class="active"' : '') !!}><a href="{{url('leave')}}"><i class="fa fa-circle-o"></i>New Task</a></li>
            <li {!! (Request::is('docs-upload') ? 'class="active"' : '') !!}><a href="{{url('sheduled')}}"><i class="fa fa-circle-o"></i>Sheduled Tasks</a></li>
           
          </ul>

          <ul class="treeview-menu">

            <li {!! (Request::is('get-excel*') ? 'class="active"' : '') !!}><a href="{{url('company')}}"><i class="fa fa-circle-o"></i>Company</a></li>
            <li {!! (Request::is('docs-upload') ? 'class="active"' : '') !!}><a href="{{url('enquiry')}}"><i class="fa fa-circle-o"></i>Contacts</a></li>
           
          </ul>


        </li>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

        <div class="col-md-offset-3 col-md-6">
            @if(session('message'))
            <div class="alert alert-{{ session('message_type') }} alert-dismissible" id="success-alert" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{@session('message')}}
            </div>
            @endif
        </div>
    
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
       @yield('header')
    </section>

    <!-- Main content -->
    <section class="content">        
        @yield('content')
    </section>

  </div> 
  <!-- =============================================== -->
  
  <!-- /.content-wrapper -->

  <footer class="main-footer text-center">
    <div class="pull-right hidden-xs">
     <!--  <b>Version</b> 2.4.0 -->
    </div>
    Copyright &copy; <?php echo date('Y'); ?> <a href="https://ochre-media.com">Task-Manager</a>. All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- <script src="public/admin/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script src="public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- SlimScroll -->
<script src="{{asset('public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin/dist/js/demo.js')}}"></script>
<script src="{{asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('public/admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('public/admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('public/admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('public/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- bootstrap time picker -->
<script src="{{asset('public/admin/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('public/admin/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ url('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{asset('public/build/js/jasny-bootstrap.min.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('public/admin/plugins/validator/bootstrapValidator.min.js')}}"></script>
 <!-- <script src="{{asset('public/admin/bower_components/ckeditor/ckeditor.js')}}"></script>  -->
<!-- <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script> -->
<script>
  $(document).ready(function () {
    
    $('.sidebar-menu').tree()
  })
</script>
<script>
    $(document).ready(function() {
      /*  function disableBack() { 
          window.history.forward()
           }

        window.onload = disableBack();
        window.onpageshow = function(evt) {
         if (evt.persisted) disableBack() 
       }*/
    });
          $(document).on('change',':text,textarea', function () {
        if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
          this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
        }
      });
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    /*$('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()*/

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
  $('.sidebar-toggle').on('click',function(){
 //       if ($('select').data('select2')) {
   // $('select').select2('destroy');
 // }
    // $("select").select2("destroy");
    setTimeout(function(){
      $("select").select2();
    },200);

   //  if ($('select').data('select2')) {
   // $('select').select2('destroy');
 // }
  });

</script>
<!-- <script type = "text/javascript" >
       function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 10);
        window.onunload=function(){null};
    </script> -->
 @yield('scripts')
</body>
</html>
