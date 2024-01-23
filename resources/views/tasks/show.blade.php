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
        <h1>Tasks</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
            <li class="breadcrumb-item "><a href="{{ url('tasks') }}">Tasks</a></li>
            <li class="breadcrumb-item header-color" aria-current="page"># {{$task->task_name}}</li>
          </ol>
        </nav>
      </div>            
      <div class="col-md-6 col-sm-12 text-right hidden-xs">

      </div>
    </div>
  </div>


  <div class="row clearfix">
    <div class="col-lg-12">

      {{-- project info card --}}
      <div class="card">


        <div class="header">
          <h2>Task Info</h2>
        </div>
        <div class="body">
          <div class="row">
            <div class="col-lg-3 mt-3">                          
              <h6>#  {{$task->task_name}}</h6>
            </div>
       

            <div class="col-lg-3 mt-3">
              <label>Task Duration</label>
              <p>{{date('d M Y', strtotime($task->start_date)) . ' - '. date('d M Y', strtotime($task->due_date))}}</p>
            </div>
  

            <div class="col-lg-3 mt-3">
              <label>Current Status</label>
              <p>{{ ($task->progress == '0') ? 'Todo' : (($task->progress == '1') ? 'In Progress' : 'Completed') }}</p>
            </div>

             <div class="col-lg-3 mt-3">
              <label>Target Leads</label>
              <p>{{ number_format($task->reached_target) .' / '.  number_format($task->target) }}</p>
            </div> 


            <div class="col-lg-12 mt-3">
              <label>Decription</label>
              <p>{{ $task->message }}</p>
            </div>

           
          </div>


        </div>
      </div>


      </div>


     


    <div class="col-lg-12">
        <!-- Activities -->

        <div class="card">
          <div class="header">
            <h2>Comments</h2>                            
          </div>
          <div class="body">
            <form action="{{ route('tasks.addComment',$task->id) }}" method="post" >
              @csrf()
              <div class="form-group mb-2 {{ $errors->first('message', 'has-error')}}">
                <textarea class="form-control" name="message" rows="3" placeholder="Add your comment">{{ old('message') }}</textarea>
                <span class="help-block">{{ $errors->first('message', ':message') }}</span>
              </div>
              <div class=" text-right mb-3">                            
                <button type="submit" class="btn btn-info btn-sm">ADD</button>
              </div>
            </form>

            <ul class="timeline">
              @if(count($task->comments))
              @foreach($task->comments as $comment)
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
        <!-- End Activities -->
         {{-- Project info card end --}}

      <div>
        <div class="col-lg-4">
           <h2 class="header-style"> Members </h2>
        </div>
      </div>
      <div class="row">
         {{-- project Members --}}
        
        @if(count($task->employees))                     
        @foreach($task->employees as $emp)                        
          <div class="col-sm-4 col-md-4 col-lg-4">
           <div class="card c_grid c_yellow">
            <div class="body text-center ribbon">                        
              <div class="circle">
                <img class="rounded-circle" src="{{asset('public/assets/images/placeholder-user.png')}}" alt="{{ $emp->name }}">
              </div>
              <h6 class="mt-3 mb-0">{{ ucfirst($emp->name) }}</h6>
              <p>{{$emp->email}}</p>
              <span>{{$emp->designation->designation_name}}</span><br>
              <span>{{$emp->department->dept_name}}</span> 

           
            </div>
          </div>
        </div>
      @endforeach

      @endif
        </div>
        {{-- End Project Members--}}
    </div>

    

</div>


</div>



@endsection
@section('scripts')
<script src="{{asset('public/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

<script type="text/javascript">
   $('#multiselect4-filter,#multiselect3-filter').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });

//Remove Team 
$('.remove-team').on('click',function(){
    var teamId =$(this).attr("data-id");
    var cnf_url = "{{ url('projects')}}"+'/'+ "{{$task->id}}" +'/'+ teamId+'/remove-team';
    $('#team-confirm-remove').attr('href',cnf_url);
});

//Remove Member 
$('.remove-member').on('click',function(){
    var memberId =$(this).attr("data-id");
    var cnf_url = "{{ url('projects')}}"+'/'+ "{{$task->id}}" +'/'+ memberId+'/remove-member';
    $('#member-confirm-remove').attr('href',cnf_url);
});


</script>
@endsection