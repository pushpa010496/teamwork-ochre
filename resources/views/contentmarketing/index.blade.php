@extends('../layouts/pms')
@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Content Marketing</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Content Marketing</li>
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
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_article">Content marketing</a></li>
                         
                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                                  <li class="nav-item">
                                    <a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a>
                                </li>        
                                @endif    
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                              
                                  {!! Form::open(array('route' => 'contentmarketing.store','files'=>true)) !!}
                
                                    <div class="row clearfix">
                                          

                                         <div class="col-md-6 ">

                                            <div class="form-group {{ $errors->first('url', 'has-error')}}">
                                                <label>Url</label>
                                                 <input type="hidden" name="company" value="{{Request::segment(2)}}" >
                                                <input type="text" class="form-control" name="url" placeholder="Url" value="{{ old('url') }}" required="required">
                                                <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
                                            </div>
                                        </div>

                                         <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('launch_date', 'has-error')}}">
                                                <label>Launch Date</label>
                                                <input type="date" class="form-control" name="launch_date" placeholder="End Date" value="{{ old('launch_date') }}" required="required">
                                                <span class="help-block">{{ $errors->first('launch_date', ':message') }}</span>   
                                            </div>
                                        </div>
                                        

                                       

                                         <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('content_type', 'has-error')}}">
                                                <label>Type</label>
                                                <select class="form-control" name="interview_type" required="required">
                                                    <option value="product-launch">Product Launch</option>
                                                    <option value="press-releases">Press Releases</option>
                                                    <option value="interviews">Interviews</option>
                                                    <option value="white-papers">White Papers</option>
                                                    <option value="case-study">Case Study</option>
                                                  
                                                </select>
                                                <span class="help-block">{{ $errors->first('article_service', ':message') }}</span>   
                                            </div>
                                        </div>

                                       
                                       
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                          
                                             <a href="{{url('department')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
                                        </div>
                                    </div>
                                         </form>
                                </div>
                            </div>
                            <div class="tab-pane show active" id="e_article">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Url</th>
                                                <th>Interview Type</th>
                                                <th>Launch Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($cmpmarketing->count())
                                                @foreach($cmpmarketing as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    
                                                    <td><div class="font-15">{{$value->url}}</div></td>

                                                     <td><div class="font-15">{{$value->content_type}}</div></td>

                                                    <td><div class="font-15">{{$value->launch_date}}</div></td>
                                                    <td>
                                                      <a class="btn btn-sm btn-warning" href="{{ route('contentmarketing.edit', $value->id) }}">
                                                       <i class="fa fa-edit" aria-hidden="true"></i>
                                                      </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                 {{ $cmpmarketing->links() }}
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
        var url = "{{ url('banneredit') }}"
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