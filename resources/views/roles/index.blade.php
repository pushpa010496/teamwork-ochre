@extends('../layouts/pms')

@section('styles')
<link rel="stylesheet" href="{{asset('public/assets/vendor/multi-select/css/multi-select.css')}}">
@endsection

@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Roles</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_roles">Roles</a></li>
                            <li class="nav-item"><a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a></li>                
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                                {!! Form::open(['route' => 'roles.store']) !!}
                                    <div class="row clearfix">
                                        <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('display_name', 'has-error')}}">
                                                <input type="text" class="form-control" name="display_name" placeholder="Role Display Name" value="{{ old('display_name') }}">
                                                <span class="help-block">{{ $errors->first('display_name', ':message') }}</span>   
                                            </div>

                                            <div class="form-group {{ $errors->first('name', 'has-error')}}">
                                                <input type="text" class="form-control" name="name" placeholder="Role Slug" value="{{ old('name') }}">
                                                <span class="help-block">{{ $errors->first('name', ':message') }}</span>   
                                            </div>

                                             <div class="form-group multiselect_div {{ $errors->first('permissions', 'has-error')}}">                                    
                                                {!! Form::select('permissions[]', $permissions, null,['id'=>'multiselect','class' => 'form-control multiselect multiselect-custom','multiple'=>'multiple'] ) !!}
                                                <span class="help-block">{{ $errors->first('permissions', ':message') }}</span>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('description', 'has-error')}}">                                    
                                               
                                                <textarea class="form-control" name="description" rows="6" placeholder="Description">{{old('description') }}</textarea>        
                                                <span class="help-block">{{ $errors->first('description', ':message') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                          
                                             <a href="{{url('roles')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
                                        </div>
                                    </div>
                                         </form>
                                </div>
                            </div>
                            <div class="tab-pane show active" id="e_roles">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Role Name</th>
                                                <th>Slug</th>
                                                                                         
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($roles->count())
                                                @foreach($roles as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td><div class="font-15">{{$value->display_name}}</div></td>
                                                    <td>{{ @$value->name }}</td>
                                                                                                      
                                                    <td>
                                              
                                                        <button type="button" class="btn btn-sm btn-default edit-button" title="Edit" data-toggle="modal"  data-id="{{ $value->id }}" data-target="#basicExampleModal">
                                                            <i class="fa fa-edit"></i>
                                                        </button>


                                                    </td>
                                                </tr>
                                                @endforeach

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

    $('.edit-button').on('click',function(){
        $('#data_edit').empty();
        var id =  $(this).attr("data-id");
        var url = "{{ url('roles') }}"
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
           }
       });

    })


 
</script>
@endsection