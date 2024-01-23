@extends('../layouts/pms')
@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/vendor/multi-select/css/multi-select.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/vendor/nestable/jquery-nestable.css')}}">

<style type="text/css">

</style>
@endsection

@section('content')

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Task Board</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
            <li class="breadcrumb-item "><a href="{{ url('projects') }}">Task Board</a></li>
            <li class="breadcrumb-item header-color" aria-current="page"># {{$project->project_name}}</li>
          </ol>
        </nav>
      </div>            
      <div class="col-md-6 col-sm-12 text-right hidden-xs">

      </div>
    </div>
  </div>


  <div class="row clearfix">
     <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body taskboard b-cyan planned_task"  data-id="1" >
                            <h6 class="font300 mb-3">To Do</h6>
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">

                                    @if($project->tasks()->where('progress',1))
                                        @foreach($project->tasks()->where('progress',1)->get() as $task)
                                            <li class="dd-item" data-id="{{$task->id}}">
                                                <div class="dd-handle d-flex justify-content-between align-items-center">
                                                    <div># {{ $task->id }}</div>                                            
                                                </div>
                                                <div class="dd-content p-15">
                                                    <p><a href="{{route('tasks.show',$task->id)}}"> {{$task->task_name}}</a></p>
                                                    <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                        <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> {{date('d M Y', strtotime($task->due_date)) }}</span></li>

                                                        <li class="ml-3 bd-highlight">
                                                            @if(count($task->employees))
                                                                <ul class="list-unstyled sm team-info margin-0">
                                                                 @foreach($task->employees as $emp)
                                                                    <li><img src="{{asset('public/assets/images/placeholder-user.png')}}" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" data-original-title="{{$emp->name}}" aria-describedby="tooltip908524"></li>
                                                                 @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif                                
                                </ol>
                            </div>
                            <a href="{{route('tasks.index')}}" class="btn btn-primary btn-block" >ADD NEW</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body taskboard b-orange progress_task"  data-id="2">
                            <h6 class="font300 mb-3">In progress <span class="float-right">04</span></h6>
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    
                                     @if($project->tasks()->where('progress',2))
                                        @foreach($project->tasks()->where('progress',2)->get() as $task)
                                            <li class="dd-item" data-id="{{$task->id}}">
                                                <div class="dd-handle d-flex justify-content-between align-items-center">
                                                    <div># {{ $task->id }}</div>                                            
                                                </div>
                                                <div class="dd-content p-15">
                                                    <p><a href="{{route('tasks.show',$task->id)}}"> {{$task->task_name}}</a></p>
                                                    <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                        <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> {{date('d M Y', strtotime($task->due_date)) }}</span></li>

                                                        <li class="ml-3 bd-highlight">
                                                            @if(count($task->employees))
                                                                <ul class="list-unstyled sm team-info margin-0">
                                                                 @foreach($task->employees as $emp)
                                                                    <li><img src="{{asset('public/assets/images/placeholder-user.png')}}" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" data-original-title="{{$emp->name}}" aria-describedby="tooltip908524"></li>
                                                                 @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif

                                </ol>
                            </div>
                            <a href="{{route('tasks.index')}}" class="btn btn-primary btn-block" >ADD NEW</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body taskboard b-green completed_task" data-id="3">
                            <h6 class="font300 mb-3">Complete <span class="float-right">03</span></h6>
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                   
                                     @if($project->tasks()->where('progress',3))
                                        @foreach($project->tasks()->where('progress',3)->get() as $task)
                                            <li class="dd-item" data-id="{{$task->id}}">
                                                <div class="dd-handle d-flex justify-content-between align-items-center">
                                                    <div># {{ $task->id }}</div>                                            
                                                </div>
                                                <div class="dd-content p-15">
                                                   <p><a href="{{route('tasks.show',$task->id)}}"> {{$task->task_name}}</a></p>
                                                    <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                        <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> {{date('d M Y', strtotime($task->due_date)) }}</span></li>

                                                        <li class="ml-3 bd-highlight">
                                                            @if(count($task->employees))
                                                                <ul class="list-unstyled sm team-info margin-0">
                                                                 @foreach($task->employees as $emp)
                                                                    <li><img src="{{asset('public/assets/images/placeholder-user.png')}}" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" data-original-title="{{$emp->name}}" aria-describedby="tooltip908524"></li>
                                                                 @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif

                                </ol>
                            </div>
                            <a href="{{route('tasks.index')}}" class="btn btn-primary btn-block" >ADD NEW</a>
                        </div>
                    </div>
                </div>
            
  </div>


</div>



@endsection
@section('scripts')
<script src="{{asset('public/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

{{-- <script src="{{asset('public/assets/vendor/nestable/jquery.nestable.js')}}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script><!-- Jquery Nestable -->
{{-- <script src="{{asset('public/assets/js/pages/ui/sortable-nestable.js')}}"></script> --}}

<script type="text/javascript">
   $('#multiselect4-filter,#multiselect3-filter').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });


$(function () {
    $('.dd').nestable({
         //  onDragStart: function(l,e){
                
         //    // console.log($(e).attr('data-id'));
         //    // console.log($(l).closest('.taskboard').attr('data-id'));

         // },
          beforeDragStop: function(l,e, p){
            console.log($(e).attr('data-id'));
            console.log($(p).closest('.taskboard').attr('data-id'));
            var url = "{{url('projects')}}";
            var taskId = $(e).attr('data-id');
            var progressId = $(p).closest('.taskboard').attr('data-id'); 
            // projects/{project}/taskboard/{task}/{progress}

            $.ajax({                
              url: url +"/{{$project->id}}/taskboard/"+taskId+"/"+progressId,
              type: 'get',              
              success:function(data){
                 $('#main_content').append(data);
                 is_loading = false;

             }
         });                
           
        }

    });

    $('.dd').on('change', function () {
        var $this = $(this);


        $parent = $(this).closest('.taskboard').attr("data-id");
        $card = $(this).closest('.taskboard').attr("data-id");
        // console.log($parent);

  
        var serializedData = window.JSON.stringify($($this).nestable('serialize'));
        // console.log(serializedData)
        $this.parents('div.body').find('textarea').val(serializedData);
    });



   
});
</script>
@endsection