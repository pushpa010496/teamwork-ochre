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
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Themeforest update #1</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 18 Jan</span></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 5</a></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-check-square"></i> 11</a></li>
                                                <li class="ml-3 bd-highlight">
                                                    <ul class="list-unstyled sm team-info margin-0">
                                                        <li><img src="{{asset('public/assets/images/placeholder-user.png')}}" alt="Avatar"></li>
                                                        <li><img src="{{asset('public/assets/images/placeholder-user.png')}}" alt="Avatar"></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="2">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Sites to review #2</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 28 Jan</span></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 2</a></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-check-square"></i> 8</a></li>
                                            </ul>
                                        </div>
                                    </li>                                   
                                </ol>
                            </div>
                            <button class="btn btn-primary btn-block" type="button">ADD NEW</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body taskboard b-orange progress_task"  data-id="2">
                            <h6 class="font300 mb-3">In progress <span class="float-right">04</span></h6>
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="3">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Sites to review #3</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 28 Jan</span></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 2</a></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-check-square"></i> 8</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="4">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Client Followup #4</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>It is a long established fact that a reader.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 05 Feb</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="5">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Client Followup #5</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>It is a long established fact that a reader.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 05 Feb</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="6">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Sites to review #6</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 28 Jan</span></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 2</a></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-check-square"></i> 8</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <button class="btn btn-primary btn-block" type="button">ADD NEW</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body taskboard b-green completed_task" data-id="3">
                            <h6 class="font300 mb-3">Complete <span class="float-right">03</span></h6>
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="7">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Themeforest update #7</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 18 Jan</span></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 5</a></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-check-square"></i> 11</a></li>
                                                <li class="ml-3 bd-highlight">
                                                    <ul class="list-unstyled sm team-info margin-0">
                                                        <li><img src="{{asset('public/assets/images/placeholder-user.png')}}" alt="Avatar"></li>
                                                        <li><img src="{{asset('public/assets/images/placeholder-user.png')}}" alt="Avatar"></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="8">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Sites to review #8</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 28 Jan</span></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 2</a></li>
                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-check-square"></i> 8</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="9">
                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                            <div>Client Followup #9</div>
                                            <div class="action">
                                                <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="dd-content p-15">
                                            <p>It is a long established fact that a reader.</p>
                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="fa fa-clock-o"></i> 05 Feb</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <button class="btn btn-primary btn-block" type="button">ADD NEW</button>
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
          onDragStart: function(l,e){
                
            // console.log($(e).attr('data-id'));
            // console.log($(l).closest('.taskboard').attr('data-id'));

         },
          beforeDragStop: function(l,e, p){
            console.log($(e).attr('data-id'));
            console.log($(p).closest('.taskboard').attr('data-id'));
           
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