@extends('../layouts/pms')
@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/vendor/multi-select/css/multi-select.css')}}">
<style type="text/css">

</style>
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
            <li class="breadcrumb-item "><a href="{{ url('projects') }}">Projects</a></li>
            <li class="breadcrumb-item header-color" aria-current="page"># {{$project->project_name}}</li>
          </ol>
        </nav>
      </div>            
      <div class="col-md-6 col-sm-12 text-right">
        <a href="{{route('projects.taskboard',$project->id)}}" class="btn btn-sm btn-primary" title="">Taskboard</a>

      </div>
    </div>
  </div>


  <div class="row clearfix">
    <div class="col-lg-8">

      {{-- project info card --}}
      <div class="card">


        <div class="header">
          <h2>Project Info</h2>
        </div>
        <div class="body">
          <div class="row">
            <div class="col-lg-12">                          
              <h6>#  {{$project->project_name}}</h6>
            </div>
            <div class="col-lg-6 mt-3">
              <label>Client</label>
              <p>{{$project->client->client_name}}</p>
            </div>

            <div class="col-lg-6 mt-3">
              <label>Project Duration</label>
              <p>{{date('d M Y', strtotime($project->start_date)) . ' - '. date('d M Y', strtotime($project->due_date))}}</p>
            </div>

            {{-- <div class="col-lg-6 mt-3">
              <label>Target Leads</label>
              <p>{{ number_format($project->reached_target) .' / '.  number_format($project->target) }}</p>
            </div> --}}

            <div class="col-lg-6 mt-3">
              <label>Current Status</label>
              <p>{{ $project->active_flag ? ' Active' : 'In Active' }}</p>
            </div>

            <div class="col-lg-12 mt-3">
              <label>Decription</label>
              <p>{{ $project->description }}</p>
            </div>

          </div>


        </div>
      </div>

      {{-- Project info card end --}}

      <div class="row">        
        {{-- project Teams --}}
        <div class="col-lg-6">
          <div class=" card">
            <div class="header">
              <h2 class="header-style">Project Teams <a href="#" class="pull-right btn btn-info btn-sm"  title="Add teams" data-toggle="modal"  data-id="" data-target="#addTeam"><i class="fa fa-plus"></i></a></h2>
            </div>
            <div class="body teams-box">
              <div class="table-responsive">
                <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">

                  <tbody>
                    @if(count($project->teams))
                      @foreach($project->teams as $team)
                        <tr>
                          <td class="td-bg-hash">{{$team->team_name }} <a href="javascript:void(0)"  class="pull-right text-danger remove-team" title="remove from project" data-toggle="modal"  data-id="{{ $team->id }}" data-target="#removeTeam">
                              <i class="fa fa-close"></i>
                            </a>
                          </td>                                    
                        </tr>
                      @endforeach
                    @else
                        <tr>
                          <td> No teams added </td>                                    
                        </tr>
                    @endif  
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        {{-- End Project Teams--}}

         {{-- project Members --}}
        <div class="col-lg-6">
          <div class=" card">
            <div class="header">
              <h2 class="header-style">Project Members <a href="#" class="pull-right btn btn-info btn-sm"  title="Add Members" data-toggle="modal"  data-id="" data-target="#addMember"><i class="fa fa-plus"></i></a></h2>
            </div>
            <div class="body teams-box">
              <div class="table-responsive">
                <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                  <tbody>
                    @if(count($project->employees))                     
                        @foreach($project->employees as $emp)                        
                          <tr>
                              <td class="td-bg-hash">{{$emp->name}} <a href="javascript:void(0)"  class="pull-right text-danger remove-member" title="Remove Member" data-toggle="modal"  data-id="{{ $emp->id }}" data-target="#removeMember">
                                <i class="fa fa-close"></i>
                                </a>
                              </td>                                    
                          </tr>
                      @endforeach
                    @else
                        <tr>
                          <td> Employees are not added </td>                                    
                        </tr>
                    @endif                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        {{-- End Project Members--}}

       
      </div>
    </div>



    <div class="col-lg-4">
      <!-- Activities -->
      <div class="card">
        <div class="header">
          <h2>Comments</h2>                            
        </div>
        <div class="body">
          <form action="{{ route('projects.addComment',$project->id) }}" method="post" >
            @csrf()
            <div class="form-group mb-2 {{ $errors->first('message', 'has-error')}}">
              <textarea class="form-control" name="message" rows="3" placeholder="Add your comment">{{ old('message') }}</textarea>
              <span class="help-block">{{ $errors->first('message', ':message') }}</span>
            </div>
            <div class=" text-right mb-3">                            
              <button type="submit" class="btn btn-info btn-sm">ADD</button>
            </div>
          </form>
          <div class="max-height-555">
          <ul class="timeline">
            @if(count($project->comments))
            @foreach($project->comments as $comment)
            <li class="timeline-item">
              <div class="timeline-info">
                <span>{{date('M d, Y', strtotime($comment->created_at)) }} @ {{date('h:m A', strtotime($comment->created_at)) }}</span>
              </div>
              <div class="timeline-marker"></div>
              <div class="timeline-content">                                       
                <p class="text-muted mt-0 mb-2"># {{ $comment->author['name'] }}</p>
                <p class="font-12">{{ $comment->message }}</p>
              </div>
            </li>
            @endforeach
            @endif
          </ul>
           </div>
        </div>
      </div>
      <!-- End Activities -->
  </div>
</div>

<div class="row">
   {{-- Project Tasks--}}
        <div class="col-lg-12">
          <div class=" card">
            <div class="header">
              <h2 class="header-style">Tasks 
                {{-- <a href="#" class="pull-right btn btn-info btn-sm"  title="Add Members" data-toggle="modal"  data-id="" data-target="#addMember"><i class="fa fa-plus"></i></a> --}}
              </h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-hover table-bg-hash js-basic-example dataTable table-custom spacing5 mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Task Name</th>
                      <th>Assign to</th>
                      <th>Status</th>
                      <th>Project Name</th>
                      <th>Priority</th>
                      <th>Progress</th>
                      <th>Status</th>
                     
                    </tr>
                  </thead>
                  <tbody>

                    @if($project->tasks)
                    @foreach($project->tasks as $key => $value)
                    <tr>
                      <td>{{++$key}}</td>
                      <td><div class="font-15"><a href="{{ route('tasks.show',$value->id) }}"> {{$value->task_name}}</a></div></td>

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
                        <span class="badge {{ ($value->progress == '0') ? 'badge-danger' : (($value->progress == '1') ? 'badge-warning' : 'badge-success') }}">  {{ ($value->progress == '0') ? 'Todo' : (($value->progress == '1') ? 'Working' : 'Completed') }} </span>                       

                      </td>
                      <td>{{$value->project['project_name']}}</td>
                      <td>
                        <span class="badge {{ ($value->priority == 'High') ? 'badge-danger' : (($value->priority == 'Medium') ? 'badge-warning' : 'badge-success') }}"> {{ $value->priority }}</span>
                      </td>
                      <td>stc</td>
                      <td>{{$value->active_flag == 1 ? 'Active' : 'In Active' }}</td>
                     
                  </tr>
                  @endforeach
                  
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
      {{-- End Project Tasks--}}
</div>
</div>




<!--Add Team Modal-->
<div class="modal fade" id="addTeam" tabindex="-1" role="dialog" aria-labelledby="addTeam"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content" id="data_edit">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add teams</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('projects.addteam', $project->id) }}" method="POST">   
        @csrf()
        <div class="col-12">
          <div class="multiselect_div">
            {{ Form::select('teams[]', $teams,$project->teams()->pluck('id'), [ 'id'=>'multiselect3-filter','class' => 'multiselect multiselect-custom','required'=>'required','multiple'=>'multiple']) }}
          </div>
        </div>
        <div class="col-12 mt-3 text-right">
             <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">No</button>
             <button type="submit" class="btn btn-success">Add Teams</button>             
        </div>                           
      </form>
    </div>
  </div>
</div>
</div>
<!--End Add Team Modal-->



<!--Add Member Modal-->
<div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="addMember"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Add Members</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('projects.addmember', $project->id) }}" method="POST">   
        @csrf()
        <div class="col-12">
          <div class="multiselect_div">
            {{ Form::select('members[]', $members,$project->employees()->pluck('id'), [ 'id'=>'multiselect4-filter','class' => 'multiselect multiselect-custom','required'=>'required','multiple'=>'multiple']) }}
          </div>
        </div>
        <div class="col-12 mt-3 text-right">
             <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
             <button type="submit" class="btn btn-success">Add Mebers</button>             
        </div>                           
      </form>
    </div>
  </div>
</div>
</div>
<!--End Add Member Modal-->

<!--Remove Team Modal-->
<div class="modal fade" id="removeTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content" id="data_edit">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Remove team</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>do you want to remove this team from current project....? </p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close">No</button>
      <a  href="#" id="team-confirm-remove" class="btn btn-danger">Yes</a>  
      
    </div>

  </div>
</div>
</div>
<!--End Remove Team Modal-->


<!--Remove Member Modal-->
<div class="modal fade" id="removeMember" tabindex="-1" role="dialog" aria-labelledby="removeMember"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content" id="data_edit">
    <div class="modal-header">
      <h5 class="modal-title" >Remove Member</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>do you want to remove this Employee from current project....? </p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close">No</button>
      <a  href="#" id="member-confirm-remove" class="btn btn-danger">Yes</a>  
      
    </div>

  </div>
</div>
</div>
<!--End Remove Member Modal-->

@endsection
@section('scripts')
<script src="{{asset('public/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.slimscroll.min.js')}}"></script>
<script type="text/javascript">
   $('#multiselect4-filter,#multiselect3-filter').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });

//Remove Team 
$('.remove-team').on('click',function(){
    var teamId =$(this).attr("data-id");
    var cnf_url = "{{ url('projects')}}"+'/'+ "{{$project->id}}" +'/'+ teamId+'/remove-team';
    $('#team-confirm-remove').attr('href',cnf_url);
});

//Remove Member 
$('.remove-member').on('click',function(){
    var memberId =$(this).attr("data-id");
    var cnf_url = "{{ url('projects')}}"+'/'+ "{{$project->id}}" +'/'+ memberId+'/remove-member';
    $('#member-confirm-remove').attr('href',cnf_url);
});

$('.max-height-555').slimscroll({
        height: '555px',
        size: '5px',
        opacity: 0.2,
        wheelStep : 5,
});

$('.teams-box').slimscroll({
        height: '350px',
        size: '5px',
        opacity: 0.2,
        wheelStep : 5,
});



</script>
@endsection