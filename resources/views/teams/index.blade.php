@extends('../layouts/pms')

@section('styles')
<link rel="stylesheet" href="{{asset('public/assets/vendor/multi-select/css/multi-select.css')}}">
@endsection

@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Teams</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teams</li>
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
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_departments">Teams</a></li>
                            @if (Auth::user()->can('team_add_member'))
                              <li class="nav-item"><a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a></li>
                            @endif                
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                                {!! Form::open(['route' => 'teams.store']) !!}
                                    <div class="row clearfix">
                                        <div class="col-md-12 ">
                                            <div class="form-group {{ $errors->first('team_name', 'has-error')}}">
                                                <input type="text" class="form-control" name="team_name" placeholder="Team Name" value="{{ old('team_name') }}">
                                                <span class="help-block">{{ $errors->first('team_name', ':message') }}</span>   
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('description', 'has-error')}}">                                    
                                               
                                                <textarea class="form-control" name="description" rows="4" placeholder="Description">{{old('description') }}</textarea>        
                                                <span class="help-block">{{ $errors->first('description', ':message') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->first('department_id', 'has-error')}}">                                    
                                                {!! Form::select('department_id', $departments, null,['id'=>'','class' => 'form-control','placeholder'=>'Select Department'] ) !!}
                                                <span class="help-block">{{ $errors->first('department_id', ':message') }}</span>
                                            </div>

                                            <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
                                               <select name="active_flag" class="form-control" required="required">
                                                  <option value="">-- Select one --</option>
                                                  <option value="1" {{ old('active_flag') == 1 ? 'selected' :'' }}>Active</option>
                                                  <option value="0" {{ old('active_flag') == 0 ? 'selected' :'' }}>InActive</option>
                                              </select>
                                              <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                          
                                             <a href="{{url('teams')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
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
                                                <th>Team Name</th>
                                                <th>Department Name</th>
                                                <th>Total Employees</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($teams->count())
                                                @foreach($teams as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td><div class="font-15">{{$value->team_name}}</div></td>
                                                    <td>{{ @$value->department->dept_name }}</td>
                                                    <td>{{ @$value->employees->count() }}</td>
                                                    <td>{{$value->active_flag == 1 ? 'Active' : 'In Active' }}</td>
                                                    <td>
                                                       @if (Auth::user()->can('team_add_member'))
                                                           <button type="button" class="btn btn-sm btn-default add-user" title="Add Employees to this team" data-toggle="modal"  data-id="{{ $value->id }}" data-target="#addUserModal">
                                                              <i class="fa fa-user-plus"></i>
                                                          </button>
                                                        @endif

                                                         @if (Auth::user()->can('team_add_member'))
                                                          <button type="button" class="btn btn-sm btn-default edit-button" title="Edit" data-toggle="modal"  data-id="{{ $value->id }}" data-target="#basicExampleModal">
                                                              <i class="fa fa-edit"></i>
                                                          </button>
                                                        @endif

                                                       
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>                            
                                                    </td>
                                                </tr>
                                                @endforeach
                                                   {{ $teams->links() }}
                                              @else
                                                  <tr>
                                                    <td colspan="6">No Records found</td>

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

<!--Add users to team Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="data_add_user">
     
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
    
    $('.edit-button').on('click',function(){
        $('#data_edit').empty();
        var id =  $(this).attr("data-id");
        var url = "{{ url('teams') }}"
        $.ajax({
          url: url + '/' + id +'/edit',
          type: 'get',
          success:function(data){
           $('#data_edit').append(data);

           }
       });

    })

    $('.add-user').on('click',function(){
        $('#data_add_user').empty();
        var id =  $(this).attr("data-id");
        var url = "{{ url('teams') }}"
        $.ajax({
          url: url + '/' + id +'/add-users',
          type: 'get',
          success:function(data){
           $('#data_add_user').append(data);
           $('#multiselect4-filter').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });

           }
       });

    })
 
</script>
@endsection