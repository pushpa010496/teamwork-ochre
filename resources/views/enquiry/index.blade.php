@extends('../layouts/pms')


@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Contacts</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contacts</li>
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
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_departments">Company contacts</a></li>
                            @if (Auth::user()->can('client_add'))
                            <li class="nav-item"><a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a></li>
                              


                            
                            @endif                
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                                {!! Form::open(['route' => 'enquiry.store']) !!}
                                    <div class="row clearfix">
                                        <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('full_name', 'has-error')}}">
                                                <input type="text" class="form-control" name="full_name" placeholder="Name" value="{{ old('full_name') }}">
                                                <span class="help-block">{{ $errors->first('full_name', ':message') }}</span>   
                                            </div>

                                            <div class="form-group {{ $errors->first('email', 'has-error')}}">
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                                <span class="help-block">{{ $errors->first('email', ':message') }}</span>   
                                            </div>

                                              <div class="form-group {{ $errors->first('phone', 'has-error')}}">
                                                <input type="phone" class="form-control" name="phone" placeholder="phone" value="{{ old('phone') }}">
                                                <span class="help-block">{{ $errors->first('phone', ':message') }}</span>   
                                            </div>

                                            <div class="form-group {{ $errors->first('mobile', 'has-error')}}">
                                                <input type="mobile" class="form-control" name="mobile" placeholder="mobile" value="{{ old('mobile') }}">
                                                <span class="help-block">{{ $errors->first('mobile', ':message') }}</span>   
                                            </div>

                                            <div class="form-group {{ $errors->first('job_title', 'has-error')}}">
                                                <input type="job_title" class="form-control" name="job_title" placeholder="job_title" value="{{ old('job_title') }}">
                                                <span class="help-block">{{ $errors->first('job_title', ':message') }}</span>   
                                            </div>



                                            <div class="form-group {{ $errors->first('country', 'has-error')}}">
                                                <input type="text" class="form-control" name="country" placeholder="Country" value="{{ old('country') }}">
                                                <span class="help-block">{{ $errors->first('country', ':message') }}</span>   
                                            </div>

                                            

                                            
                                            
                                        </div>

                                        <div class="col-md-6 ">
                                           
                                           <div class="form-group {{ $errors->first('city', 'has-error')}}">
                                                <input type="city" class="form-control" name="city" placeholder="city" value="{{ old('city') }}">
                                                <span class="help-block">{{ $errors->first('city', ':message') }}</span>   
                                            </div>

                                            <div class="form-group {{ $errors->first('state', 'has-error')}}">
                                                <input type="state" class="form-control" name="state" placeholder="state" value="{{ old('state') }}">
                                                <span class="help-block">{{ $errors->first('state', ':message') }}</span>   
                                            </div>

                                           <div class="form-group {{ $errors->first('technology', 'has-error')}}">                                    
                                               <select name="company" class="form-control" required="required">
                                                  <option value="">-- Select company --</option>
                                                  @foreach($company as $comp)
                                                  <option value="{{$comp->id}}">{{$comp->comp_name}}</option>
                                                 @endforeach
                                                 
                                              </select>
                                              <span class="help-block">{{ $errors->first('technology', ':message') }}</span>
                                            </div>
                                            <div class="form-group {{ $errors->first('address', 'has-error')}}">
                                                <textarea  name="address" rows="3" class="form-control"  placeholder="Address">{{old('address') }}</textarea>                                                
                                                <span class="help-block">{{ $errors->first('address', ':message') }}</span>   
                                            </div>


                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                          
                                             <a href="{{url('clients')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
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
                                                <th>Company</th> 
                                                <th>Person Name</th>     
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Job title</th>
                                                <th>Country</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($data->count())
                                                @foreach($data as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td><div class="font-15">{{@$value->companys->comp_name}}</div></td>
                                                    <td><div class="font-15">{{$value->full_name}}</div></td>
                                                    <td>{{$value->email}}</td>
                                                    <td>{{$value->mobile}}</td>
                                                    <td>{{$value->job_title}}</td>
                                                    <td>{{$value->country}}</td>
                                                    <td>
                                                      
                                                        <button type="button" class="btn btn-sm btn-default edit-button" title="Edit" data-toggle="modal"  data-id="{{ $value->id }}" data-target="#basicExampleModal">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                 

                                                      <!--    @if (Auth::user()->can('client_delete'))
                                                     <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button> 
                                                        @endif                                         
                                                      -->                                       
                                                    </td>  
                                                </tr>
                                                @endforeach

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
        var url = "{{ url('enquiry') }}"
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