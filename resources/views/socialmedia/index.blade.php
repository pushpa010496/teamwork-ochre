@extends('../layouts/pms')
@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>socialmedia</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">socialmedia</li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('companyinfo')}}">Company</a></li>
                            
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
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_socialmedia">socialmedia</a></li>
                            @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                                  <li class="nav-item">
                                    <a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a>
                                </li>
                                @endif            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                              
                                  {!! Form::open(array('route' => 'socialmediamarketing.store','files'=>true)) !!}
                
                                    <div class="row clearfix">
                                       
                                         <div class="col-md-6 ">
                                           <input type="hidden" name="company" value="{{Request::segment(2)}}" >
                                            <div class="form-group {{ $errors->first('fb_date', 'has-error')}}">
                                                <label>Facebook start Date</label>
                                                <input type="date" class="form-control" name="fb_date" placeholder="Start Date" value="{{ old('fb_date') }}">
                                                <span class="help-block">{{ $errors->first('fb_date', ':message') }}</span>   
                                            </div>
                                        </div>

                                     <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('fb_image', 'has-error')}}">
                                                <label>Facebook Image</label>
                                                <input type="file" class="form-control" name="fb_image">
                                                <span class="help-block">{{ $errors->first('fb_image', ':message') }}</span>   
                                            </div>
                                        </div>

                                          <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('fb_date', 'has-error')}}">
                                                <label>Linkedin start Date</label>
                                                <input type="date" class="form-control" name="linkedin_date" placeholder="Start Date" value="{{ old('linkedin_date') }}">
                                                <span class="help-block">{{ $errors->first('linkedin_date', ':message') }}</span>   
                                            </div>
                                        </div>

                                     <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('linkedin_image', 'has-error')}}">
                                                <label>Linkedin Image</label>
                                                <input type="file" class="form-control" name="linkedin_image">
                                                <span class="help-block">{{ $errors->first('linkedin_image', ':message') }}</span>   
                                            </div>
                                        </div>
                                       

                                        <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('twitter_date', 'has-error')}}">
                                                <label>Twiter start Date</label>
                                                <input type="date" class="form-control" name="twitter_date" placeholder="Start Date" value="{{ old('twitter_date') }}">
                                                <span class="help-block">{{ $errors->first('twitter_date', ':message') }}</span>   
                                            </div>
                                        </div>

                                     <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('fb_image', 'has-error')}}">
                                                <label>Twiter Image</label>
                                                <input type="file" class="form-control" name="twitter_image">
                                                <span class="help-block">{{ $errors->first('twitter_image', ':message') }}</span>   
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
                            <div class="tab-pane show active" id="e_socialmedia">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Facebook Date </th>
                                                <th>Facebook image </th>
                                                <th>Twitter Date</th>
                                                <th>Twitter Image</th>
                                                <th>Linkedin Date</th>
                                                <th>Linkedin Iamge</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($socialmedia->count())
                                                @foreach($socialmedia as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->fb_date}}</div></td>
                                                    <td><div class="font-15">{{$value->fb_image}}</div></td>

                                                    <td><div class="font-15">{{$value->twitter_date}}</div></td>
                                                   <td><div class="font-15">{{$value->twitter_image}}</div></td>

                                                   <td><div class="font-15">{{$value->linkedin_date}}</div></td>
                                                   <td><div class="font-15">{{$value->linkedin_image}}</div></td>
                                                  @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                                                    <td>
                                                         <a class="btn btn-sm btn-warning" href="{{ route('banner.edit', $value->id) }}">
                                                           <i class="fa fa-edit" aria-hidden="true"></i>
                                                          </a>

                                                     
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                 {{ $socialmedia->links() }}
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