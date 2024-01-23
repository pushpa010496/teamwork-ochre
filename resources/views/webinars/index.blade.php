@extends('../layouts/pms')
@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Webinars</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Webinars</li>
                            
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
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_webinars">Webinars</a></li>
                            @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                                  <li class="nav-item">
                                    <a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a>
                                </li> 
                                @endif         
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                              
                                  {!! Form::open(array('route' => 'webinars.store','files'=>true)) !!}
                
                                    <div class="row clearfix">
                                        <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('banner_name', 'has-error')}}">
                                                <label>Url</label>
                                                <input type="hidden" name="company" value="{{Request::segment(2)}}" >
                                                <input type="text" class="form-control" name="webinar_url" placeholder="Url" value="{{ old('webinar_url') }}" required="required">
                                                <span class="help-block">{{ $errors->first('webinar_url', ':message') }}</span>   
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('total_leads', 'has-error')}}">
                                                <label>Total Leads</label>
                                               
                                                <input type="text" class="form-control" name="total_leads" placeholder="No of Leads" value="{{ old('total_leads') }}" required="required">
                                                <span class="help-block">{{ $errors->first('total_leads', ':message') }}</span>   
                                            </div>
                                        </div>
                                            <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('Month', 'has-error')}}">
                                                <label>Month</label>
                                                <select class="form-control" name="month">
                                                    <option>Select Month</option>
                                                    @foreach(getMonths() as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <span class="help-block">{{ $errors->first('banner_position', ':message') }}</span>   
                                            </div>
                                            </div>

                                         <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('start_date', 'has-error')}}">
                                                <label>Start Date</label>
                                                <input type="date" class="form-control" name="start_date" placeholder="Start Date" value="{{ old('start_date') }}" required="required">
                                                <span class="help-block">{{ $errors->first('start_date', ':message') }}</span>   
                                            </div>
                                        </div>

                                         <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('end_date', 'has-error')}}">
                                                <label>End Date</label>
                                                <input type="date" class="form-control" name="end_date" placeholder="End Date" value="{{ old('end_date') }}" required="required">
                                                <span class="help-block">{{ $errors->first('end_date', ':message') }}</span>   
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                          
                                           
                                        </div>
                                    </div>
                                         </form>
                                </div>
                            </div>
                            <div class="tab-pane show active" id="e_webinars">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Url</th>
                                                <th>Total Leads</th>
                                                <th>Month</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($webinars->count())
                                                @foreach($webinars as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->webinar_url}}</div></td>
                                                     <td><div class="font-15">{{$value->total_leads}}</div></td>
                                                     <td><div class="font-15">{{$value->month}}</div></td>
                                                   
                                                    <td><div class="font-15">{{$value->webinar_start_date}}</div></td>
                                                   <td><div class="font-15">{{$value->webinar_end_date}}</div></td>
                                                  
                                                    <td>
                                                       <a class="btn btn-sm btn-warning" href="{{ route('webinars.edit', $value->id) }}">
                                                       <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                                @endforeach
                                                 {{ $webinars->links() }}
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