@extends('../layouts/pms')
@section('styles')
<link rel="stylesheet" href="{{asset('public/assets/vendor/multi-select/css/multi-select.css')}}">
@endsection

@section('content')
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Employees</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employees</li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                                           
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs2">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_departments">Employees</a></li>
                            <li class="nav-item"><a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a></li>                
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                                {!! Form::open(['route' => 'users.store']) !!}
                                    <div class="row clearfix">
                                        <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('name', 'has-error')}}">
                                                <input type="text" class="form-control" name="name" placeholder="Employee Name" value="{{ old('name') }}">
                                                <span class="help-block">{{ $errors->first('name', ':message') }}</span>   
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('email', 'has-error')}}">
                                                <input type="email" class="form-control" name="email" placeholder="Employee Email" value="{{ old('email') }}">
                                                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('password', 'has-error')}}">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                                <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('password_confirmation', 'has-error')}}">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" >
                                                <span class="help-block">{{ $errors->first('password_confirmation', ':message') }}</span>
                                            </div>
                                        </div>
                                      

                                         <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('designation_id', 'has-error')}}">                                    
                                                {!! Form::select('designation_id', $designations, null,['id'=>'','class' => 'form-control','placeholder'=>'Select Designation'] ) !!}
                                              <span class="help-block">{{ $errors->first('designation_id', ':message') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('department_id', 'has-error')}}">                                    
                                                {!! Form::select('department_id', $departments, null,['id'=>'','class' => 'form-control','placeholder'=>'Select Department'] ) !!}
                                              <span class="help-block">{{ $errors->first('department_id', ':message') }}</span>
                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('roles', 'has-error')}}">                                    
                                                {!! Form::select('roles', $roles, null,['id'=>'','class' => 'form-control','placeholder'=>'Select a Role'] ) !!}
                                              <span class="help-block">{{ $errors->first('roles', ':message') }}</span>
                                            </div>
                                        </div>
                                        
                                         <div class="col-md-6">
                                           <div class="form-group multiselect_div {{ $errors->first('technology', 'has-error')}}">                                    
                                                {!! Form::select('technology[]', $technology, null,['id'=>'multiselect','class' => 'form-control multiselect multiselect-custom','multiple'=>'multiple'] ) !!}
                                                <span class="help-block">{{ $errors->first('technology', ':message') }}</span>
                                            </div>
                                         </div>

                                     

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
                                               <select name="active_flag" class="form-control" required="required">
                                                  <option value="">-- Select one --</option>
                                                  <option value="1" {{ old('active_flag') == 1 ? 'selected' :'' }}>Active</option>
                                                  <option value="0" {{ old('active_flag') == 0 ? 'selected' :'' }}>InActive</option>
                                              </select>
                                              <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
                                            </div>
                                        </div>
                                        
                                         <div class="col-md-6">
                                           <div class="form-group multiselect_div {{ $errors->first('company_type', 'has-error')}}">                                    
                                                {!! Form::select('company_type[]', $companyType, null,['id'=>'multiselectcompanyType','class' => 'form-control multiselect multiselect-custom','multiple'=>'multiple'] ) !!}
                                                <span class="help-block">{{ $errors->first('company_type', ':message') }}</span>
                                            </div>
                                         </div>
                                        
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                          
                                             <a href="{{url('users')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
                                        </div>
                                    </div>
                                         </form>
                                </div>
                            </div>
                            <div class="tab-pane show active" id="e_departments">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Designation</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($users->count())
                                                @foreach($users as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td><div class="font-15">{{$value->name}}</div></td>
                                                    <td>{{@$value->department->dept_name }}</td>
                                                    <td>{{@$value->designation->designation_name }}</td>
                                                    <td><div class="font-15">{{$value->email}}</div></td>
                                                    <td>{{$value->active_flag == 1 ? 'Active' : 'In Active' }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-default edit-button" title="Edit" data-toggle="modal"  data-id="{{ $value->id }}" data-target="#basicExampleModal">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                 {{ $users->links() }}
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>



<!--Edit Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="data_edit">
     
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('public/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

@if ($errors->any())
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add_new').click();
        })
    </script>
@endif


<script type="text/javascript">

        $('#multiselect').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });
        $('#multiselectcompanyType').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });
        
    $('.edit-button').on('click',function(){
        $('#data_edit').empty();
        var id =  $(this).attr("data-id");
        var url = "{{ url('users') }}"
        $.ajax({
          url: url + '/' + id +'/edit',
          type: 'get',
          success:function(data){
               $('#data_edit').append(data);
                 $('#multiselect-edit').multiselect({
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                maxHeight: 200
                });
                $('#multiselectcompanyType-edit').multiselect({
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    maxHeight: 200
                });

           }
       });

    })
 
</script>
@endsection