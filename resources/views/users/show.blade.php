@extends('../layouts/pms')
@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<style type="text/css">

</style>
@endsection

@section('content')

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>User Profile</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>            
            <li class="breadcrumb-item header-color" aria-current="page">{{$user->name}}</li>
          </ol>
        </nav>
      </div>            
      <div class="col-md-6 col-sm-12 text-right hidden-xs">

      </div>
    </div>
  </div>


  <div class="row clearfix">
  <!-- <div class="col-md-12">-->
  <!--  <div class="card social">-->
  <!--    <div class="profile-header d-flex justify-content-between justify-content-center">-->
  <!--      <div class="d-flex">-->
  <!--        <div class="mr-3">-->
  <!--          <img src="{{asset('public/assets/images/user-placeholder-sqr.jpg')}}" class="rounded" alt="">-->
  <!--        </div>-->
  <!--        <div class="details">-->
  <!--          <h5 class="mb-0">{{$user->name}}</h5>-->
  <!--          <span class="text-light">{{@$user->designation->designation_name}}</span>-->
  <!--          <p class="mb-0"><span>{{@$user->department->dept_name}}</span></p>-->
  <!--        </div>                                -->
  <!--      </div>-->

  <!--    </div>-->
  <!--  </div>                    -->
  <!--</div> -->

   <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h2>Info</h2>
                            
                        </div>
                        <div class="body">
                            <small class="text-muted">Full Name: </small>
                            <p>{{$user->name}}</p>
                              <hr>
                            <small class="text-muted">Email address: </small>
                            <p>{{$user->email}}</p>                            
                            <hr>
                            <small class="text-muted">Department: </small>
                            <p>{{$user->department->dept_name}}</p>
                            <hr>
                            <small class="text-muted">Designation: </small>
                            <p class="m-b-0">{{$user->designation->designation_name }}</p>
                            
                          
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-7">
                    <!--<div class="card">-->
                    <!--    <div class="header">-->
                    <!--        <h2>Basic Information</h2>-->
                           
                    <!--    </div>-->
                    <!--    <div class="body">-->
                    <!--        <div class="row clearfix">-->
                    <!--            <div class="col-lg-6 col-md-12">-->
                    <!--                <div class="form-group">                                                -->
                    <!--                    <input type="text" class="form-control" placeholder="First Name" value="{{$user->name}}">-->
                    <!--                </div>-->
                    <!--            </div>-->
                                <!-- <div class="col-lg-6 col-md-12">
                    <!--                <div class="form-group">                                                -->
                    <!--                    <input type="text" class="form-control" placeholder="Last Name" >-->
                    <!--                </div>-->
                    <!--            </div> -->-->
                    <!--            <div class="col-lg-6 col-md-12">-->
                    <!--                <div class="form-group">-->
                    <!--                    <select class="form-control">-->
                    <!--                        <option value="">-- Select Gander --</option>-->
                    <!--                        <option value="AF">Male</option>-->
                    <!--                        <option value="AX">Female</option>-->
                    <!--                    </select>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-lg-6 col-md-12">-->
                    <!--                <div class="form-group">-->
                    <!--                    <div class="input-group">-->
                    <!--                        <div class="input-group-prepend">-->
                    <!--                            <span class="input-group-text"><i class="icon-calendar"></i></span>-->
                    <!--                        </div>-->
                    <!--                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Birthdate">-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                                                                
                    <!--            <div class="col-lg-6 col-md-12">-->
                    <!--                <div class="form-group">-->
                    <!--                    <select class="form-control">-->
                    <!--                        <option value="">-- Select Country --</option>-->
                    <!--                        <option value="AF">Afghanistan</option>                                       -->
                    <!--                        <option value="CF">Central African Republic</option>-->
                    <!--                        <option value="TD">Chad</option>-->
                    <!--                        <option value="CL">Chile</option>-->
                    <!--                        <option value="CN">China</option>                                        -->
                    <!--                        <option value="ZM">Zambia</option>-->
                    <!--                        <option value="ZW">Zimbabwe</option>-->
                    <!--                    </select>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-lg-6 col-md-12">-->
                    <!--                <div class="form-group">-->
                    <!--                    <input type="text" class="form-control" placeholder="State/Province">-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-lg-6 col-md-12">-->
                    <!--                <div class="form-group">-->
                    <!--                    <input type="text" class="form-control" placeholder="City">-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-lg-12 col-md-12">-->
                    <!--                <div class="form-group">                                                -->
                    <!--                    <textarea rows="4" type="text" class="form-control" placeholder="Address">{{$user->address}}</textarea>-->
                    <!--                </div>-->
                    <!--            </div>-->
                               
                    <!--        </div>-->
                    <!--        <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;-->
                    <!--        <button type="button" class="btn btn-round btn-default">Cancel</button>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="card">-->
                    <!--    <div class="header">-->
                    <!--        <h2>Account Data</h2>-->
                    <!--    </div>-->
                    <!--    <div class="body">-->
                    <!--      <form action="{{ route('user.passwordUpdate',Auth::user()->id) }}" method="post" >                            -->
                    <!--        @csrf()-->
                    <!--        <div class="row clearfix">-->
                                                              
                    <!--            <div class="col-lg-12 col-md-12">-->
                                  
                    <!--                <h6>Change Password</h6>-->
                    <!--                <div class="form-group {{ $errors->first('old_password', 'has-error') }}">-->
                    <!--                    <input type="password" name="old_password" class="form-control" placeholder="Current Password">-->
                    <!--                       <span class="help-block">{{ $errors->first('old_password', ':message') }}</span> -->
                                        
                    <!--                    @if(Session::has('message'))                                          -->
                    <!--                         <span class="help-block">{{ Session::get('message') }}</span> -->
                    <!--                    @endif-->
                    <!--                </div>-->
                    <!--                <div class="form-group  {{ $errors->first('password', 'has-error') }}">-->
                    <!--                    <input type="password" name="password" class="form-control" placeholder="New Password">-->
                    <!--                    <span class="help-block">{{ $errors->first('password', ':message') }}</span> -->
                    <!--                </div>-->
                    <!--                <div class="form-group  {{ $errors->first('password_confirmation', 'has-error') }}">-->
                    <!--                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password">-->
                    <!--                    <span class="help-block">{{ $errors->first('password_confirmation', ':message') }}</span> -->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;-->
                    <!--        <button type="button" class="btn btn-round btn-default">Cancel</button>-->
                    <!--      </form>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
</div>


</div>



@endsection
@section('scripts')
<script src="{{asset('public/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>



<script type="text/javascript">
   $('#multiselect4-filter,#multiselect3-filter').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });




</script>
@endsection