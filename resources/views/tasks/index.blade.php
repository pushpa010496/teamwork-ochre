@extends('../layouts/pms')

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/vendor/multi-select/css/multi-select.css')}}">

@endsection

@section('content')

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Tasks</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tasks</li>
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
          <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_departments">Tasks</a></li>
          @if (Auth::user()->can('task_add_member'))
            <li class="nav-item"><a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a></li>
          @endif    
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="e_add">
            <div class="body">
              {!! Form::open(['route' => 'tasks.store']) !!}
              <div class="row clearfix">
                <div class="col-md-6 ">
                  <div class="form-group {{ $errors->first('task_name', 'has-error')}}">
                    <input type="text" class="form-control" name="task_name" placeholder="Task Name" value="{{ old('task_name') }}">
                    <span class="help-block">{{ $errors->first('task_name', ':message') }}</span>   
                  </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group {{ $errors->first('start_date', 'has-error') .' '. $errors->first('due_date', 'has-error')}}">
                  <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="start_date" placeholder="Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="due_date"  placeholder="Due Date">
                  </div>
                  <span class="help-block">{{ $errors->first('start_date', ':message') }}</span>
                  <span class="help-block">{{ $errors->first('due_date', ':message') }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group {{ $errors->first('priority', 'has-error')}}">                                    
                 <select name="priority" class="form-control" required="required">
                  <option value="">-- Set Priority --</option>
                  <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
                  <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                  <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                </select>
                <span class="help-block">{{ $errors->first('priority', ':message') }}</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->first('target', 'has-error')}}">
                <input type="number" class="form-control" name="target" placeholder="Target Leads(Number format)" value="{{ old('target') }}">
                <span class="help-block">{{ $errors->first('target', ':message') }}</span>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group {{ $errors->first('message', 'has-error')}}">
                <textarea class="form-control" name="message" rows="4" placeholder="Message">{{old('message') }}</textarea>        
                <span class="help-block">{{ $errors->first('message', ':message') }}</span>
              </div>
            </div>

            <div class="col-md-6">

              <div class="form-group {{ $errors->first('project_id', 'has-error')}}">                                    
                {!! Form::select('project_id', $projects, null,['id'=>'','class' => 'form-control','placeholder'=>'Select Project'] ) !!}
                <span class="help-block">{{ $errors->first('project_id', ':message') }}</span>
              </div>

              <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
               <select name="active_flag" class="form-control" required="required">
              <!--   <option value="">-- Select one --</option> -->
                <option value="1">Active</option>
                <option value="0">InActive</option>
              </select>
              <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
            </div>


              <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
               <select name="services" class="form-control" required="required">
                <option value="">-- Select services  --</option>

                <option value="Print"  {{ old('services') == 'Print' ? 'selected' : '' }}>Print</option>

               <option value="Banner" {{ old('services') == 'Banner' ? 'selected' : '' }} >Banner</option>
                <option value="Edm" {{ old('services') == 'Edm' ? 'selected' : '' }} >Edm</option>
                <option value="Enewletter banner" {{ old('services') == 'Enewletter banner' ? 'selected' : '' }}>Enewletter banner</option>
                <option value="Article website" {{ old('services') == 'Article website' ? 'selected' : '' }} >Article website</option>
                <option value="Interview website" {{ old('services') == 'Interview website' ? 'selected' : '' }} >Interview website</option>
                <option value="Enewsletter article" {{ old('services') == 'Enewsletter article' ? 'selected' : '' }} >Enewsletter article</option>
                <option value="Enewsletter interview" {{ old('services') == 'Enewsletter interview' ? 'selected' : '' }} >Enewsletter interview</option>
                <option value="ABM" {{ old('services') == 'ABM' ? 'selected' : '' }}>ABM</option>
                <option value="Whitepaper" {{ old('services') == 'Whitepaper' ? 'selected' : '' }} >Whitepaper</option>
                <option value="Webinar" {{ old('services') == 'Webinar' ? 'selected' : '' }} >Webinar</option>
                <option value="Video promotion" {{ old('services') == 'Video promotion' ? 'selected' : '' }}>Video promotion</option>
                <option value="Advertorial AHHM" {{ old('services') == 'Advertorial AHHM' ? 'selected' : '' }} >Advertorial AHHM</option>
                <option value="Advertorial PFA" {{ old('services') == 'Advertorial PFA' ? 'selected' : '' }} >Advertorial PFA</option>
                <option value="Interview AHHM" {{ old('services') == 'Interview AHHM' ? 'selected' : '' }} >Interview AHHM</option>
                <option value="Interveiw PFA" {{ old('services') == 'Interveiw PFA' ? 'selected' : '' }} >Interveiw PFA</option>
        

             
              </select>
              <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
            </div>


          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">ADD</button>
            <a href="{{url('tasks')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
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
            <th>Task Name</th>
            <th>Assign to</th>
            <th>Status</th>
            <th>Project Name</th>
            <th>Priority</th>
            {{-- <th>Progress</th> --}}
            <th>Target Leads</th>
            <th>Acheived Leads</th>     
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          @if($tasks->count())
          @foreach($tasks as $key => $value)
          <tr>
            <td>{{++$key}}</td>
            <td>
              <div class="font-15"> 
                <a href="{{ route('tasks.show',$value->id)}}">  {{$value->task_name}}</a>
              </div>
            </td>

            <td>
              @if(count($value->employees)) 
                <ul class="list-unstyled team-info mb-0 w150">
                  @foreach($value->employees as $emp)
                    <li><img src="{{asset('public/assets/images/placeholder-user.png')}}" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" data-original-title="{{$emp->name}}" aria-describedby="tooltip908524"></li>
                  @endforeach

                </ul>
            @endif          

            </td>
               <td>
                        <span class="badge {{ ($value->progress == '0') ? 'badge-danger' : (($value->progress == '1') ? 'badge-warning' : 'badge-success') }}">  {{ ($value->progress == '1') ? 'Todo' : (($value->progress == '2') ? 'Working' : 'Completed') }} </span>                       

                      </td>
            <td>{{$value->project['project_name']}}</td>
            <td>
                <span class="badge {{ ($value->priority == 'High') ? 'badge-danger' : (($value->priority == 'Medium') ? 'badge-warning' : 'badge-success') }}"> {{ $value->priority }}</span>
            </td>
           {{--  <td>stc</td>  --}}
            <td>{{ $value->target }}</td>
            <td>{{ $value->reached_target }}</td>
           
            <td>{{$value->active_flag == 1 ? 'Active' : 'In Active' }}</td>
            <td>
               @if (Auth::user()->can('task_add_member'))
             <button type="button" class="btn btn-sm btn-default add-user" title="Add Employees to this task" data-toggle="modal"  data-id="{{ $value->id }}" data-target="#addUserModal">
              <i class="fa fa-user-plus"></i>
            </button>
            @endif
             @if (Auth::user()->can('task_edit'))
            <button type="button" class="btn btn-sm btn-default edit-button" title="Edit" data-toggle="modal"  data-id="{{ $value->id }}" data-target="#basicExampleModal">
              <i class="fa fa-edit"></i>
            </button>
            @endif
             @if (Auth::user()->can('task_delete'))
            <!-- <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>    -->
            @endif                        
          </td>
        </tr>
        @endforeach
        {{ $tasks->links() }}
        @else
        <tr>
          <td colspan="8">No Records found</td>

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
<script src="{{ asset('public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
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
  $('.input-daterange').datepicker();

  $('.edit-button').on('click',function(){
    $('#data_edit').empty();
    var id =  $(this).attr("data-id");
    var url = "{{ url('tasks') }}"
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
    var url = "{{ url('tasks') }}"
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