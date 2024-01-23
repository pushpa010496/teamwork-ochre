@extends('../layouts/pms')
@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
@endsection

@section('content')

<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Projects</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
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
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_departments">Projects</a></li>
                    @if (Auth::user()->can('project_add'))
                        <li class="nav-item"><a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a></li>  
                    @endif              
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="e_add">
                        <div class="body">
                            {!! Form::open(['route' => 'projects.store']) !!}
                            <div class="row clearfix">
                                <div class="col-md-6 ">
                                    <div class="form-group {{ $errors->first('project_name', 'has-error')}}">
                                        <input type="text" class="form-control" name="project_name" placeholder="Project Name" value="{{ old('project_name') }}">
                                        <span class="help-block">{{ $errors->first('project_name', ':message') }}</span>   
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('client_id', 'has-error')}}">                                    
                                        {!! Form::select('client_id', $clients, null,['id'=>'','class' => 'form-control','placeholder'=>'Select Client'] ) !!}
                                        <span class="help-block">{{ $errors->first('client_id', ':message') }}</span>
                                    </div>
                                </div>  

                            <!--     <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('target', 'has-error')}}">
                                        <input type="text" class="form-control" name="target" placeholder="Targets" value="{{ old('target') }}">
                                        <span class="help-block">{{ $errors->first('target', ':message') }}</span>
                                    </div>
                                </div> -->

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
                                    <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
                                         <select name="active_flag" class="form-control" required="required">
                                         <!--  <option value="">-- Select one --</option> -->
                                          <option value="1">Active</option>
                                          <option value="0">InActive</option>
                                      </select>
                                      <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('description', 'has-error')}}">
                                        <textarea class="form-control" name="description" rows="4" placeholder="Description">{{old('description')}}</textarea>
                                        <span class="help-block">{{ $errors->first('description', ':message') }}</span>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">ADD</button>

                                    <a href="{{url('projects')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
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
                                    <th>Project Name</th>
                                    <th>Client Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Priority</th>
                                   <!--  <th>Target Leads</th>
                                    <th>Acheived Leads</th>   -->                                              
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($projects->count())
                                @foreach($projects as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><div class="font-15"><a href="{{ route('projects.show',$value->id) }}"> {{$value->project_name}}</a></div></td>
                                    <td>{{$value->client->client_name}}</td>
                                    <td>{{date('d M Y', strtotime($value->start_date)) }}</td>
                                    <td>{{date('d M Y', strtotime($value->due_date)) }}</td>
                                    <td>
                                        

                                        <span class="badge {{ ($value->priority == 'High') ? 'badge-danger' : (($value->priority == 'Medium') ? 'badge-warning' : 'badge-success') }}"> {{ $value->priority }}</span>

                                    </td>
                                   <!--  <td>{{ $value->target }}</td>
                                    <td>{{ $value->reached_target }}</td> -->
                                    <td>{{$value->active_flag == 1 ? 'Active' : 'In Active' }}</td>
                                    <td>
                                    @if (Auth::user()->can('project_edit'))
                                        <button type="button" class="btn btn-sm btn-default edit-button" title="Edit" data-toggle="modal"  data-id="{{ $value->id }}" data-target="#basicExampleModal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    @endif    

                                    @if (Auth::user()->can('project_remove'))
                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                    @endif    

                                                    </td>
                                                </tr>
                                                @endforeach
                                                {{ $projects->links() }}

                                                @else
                                                <tr>
                                                    <td colspan="9">No Records found</td>

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
        <script src="{{ asset('public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
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
                var url = "{{ url('projects') }}"
                $.ajax({
                  url: url + '/' + id +'/edit',
                  type: 'get',
                  success:function(data){
                     $('#data_edit').append(data);

                 }
             });

            })

        </script>
        @endsection