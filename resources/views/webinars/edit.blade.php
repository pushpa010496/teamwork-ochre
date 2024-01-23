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
                            <li class="breadcrumb-item active" aria-current="page">webinars</li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('companies')}}">Company</a></li>
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
                                <div class="body">
                                    <form action="{{ route('webinars.update', $webinardata->id) }}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row clearfix">
                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Webinar url</label>
                                               <input type="hidden" name="company" value="{{ old('name', $webinardata->company_id ) }}">

                                            <input class="form-control" type="text" name="webinar_url" id="webinar_url" value="{{ old('name', $webinardata->webinar_url ) }}" required="required" />
                                            </div> </div>

                                             <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Total Leads</label>
                                               

                                            <input class="form-control" type="text" name="total_leads" id="total_leads" value="{{ old('name', $webinardata->total_leads ) }}" required="required" />
                                            </div> </div>


                                            <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('Month', 'has-error')}}">
                                                <label>Month</label>
                                                <select class="form-control" name="month">
                                                    <option>Select Month</option>
                                                    @foreach(getMonths() as $key => $value)
                                                     <option value="{{$key}}" <?php echo $key == getSelectMonths($webinardata->month) ? 'selected' : '' ?>>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block">{{ $errors->first('banner_position', ':message') }}</span>   
                                            </div>
                                        </div>

                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Start Date</label>
                                            <input class="form-control" type="date" name="start_date" id="start_date" value="{{ old('name', $webinardata->webinar_start_date ) }}" required="required"/>
                                            </div> </div>
                                           

                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="name-field">End Date</label>
                                            <input class="form-control" type="date" name="end_date" id="end_date" value="{{ old('name', $webinardata->webinar_end_date ) }}" required="required"/>
                                            </div> 
                                        </div>  
                                          
                                       

                                            <div class="well well-sm">
                                                <button type="submit" class="btn btn-primary" style="text-align:center;">Save</button>
                                               
                                            </div>
                                        </form>
                                </div>
                            </div>
                        
                </div>
            </div>
        </div>
@endsection
@section('scripts')
@endsection