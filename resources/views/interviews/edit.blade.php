@extends('../layouts/pms')

@section('header')
    <div class="page-header">
        <h3><i class="glyphicon glyphicon-edit"></i> Interview / Edit #{{$interviewdata->id}}</h3>
    </div>
@endsection

@section('content')
   
 <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Interview</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Interview</li>
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
                            <li class="nav-item"><a class="nav-link active show" href="{{url('companyinfo')}}">Company</a></li>
                          </ul>
 <div class="row clearfix">

</div>

    <div class="row" style="background-color: #fff">
         <div class="col-md-offset-3 col-md-6">
            <form action="{{ route('interview.update', $interviewdata->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row clearfix">
                


                <div class="col-md-6 ">
                <div class="form-group">
            	<label for="name-field"> Url</label>
                 <input type="hidden" name="company" value="{{ old('name', $interviewdata->company_id ) }}">
            	<input class="form-control" type="text" name="interview_url" id="interview_url" value="{{ old('name', $interviewdata->interview_url ) }}" required="required" />
               
                </div> </div>
                                       

                <div class="col-md-6 ">
                <div class="form-group">
                <label for="name-field">Start Date</label>
                <input class="form-control" type="text" name="start_date" id="start_date" value="{{ old('name', $interviewdata->start_date ) }}" required="required" />
                </div> </div>
               
     <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('Month', 'has-error')}}">
                                                <label>Month</label>
                                                <select class="form-control" name="month">
                                                    <option>Select Month</option>
                                                    @foreach(getMonths() as $key => $value)
                                                     <option value="{{$key}}" <?php echo $key == getSelectMonths($interviewdata->month) ? 'selected' : '' ?>>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block">{{ $errors->first('banner_position', ':message') }}</span>   
                                            </div>
                                        </div>
                <div class="col-md-6 ">
                <div class="form-group">
                    <label for="name-field">End Date</label>
                <input class="form-control" type="text" name="end_date" id="end_date" value="{{ old('name', $interviewdata->end_date ) }}" required="required" />
                </div> 
            </div>  
              
                <div class="col-md-6 ">
                <div class="form-group">
                <label for="name-field">Service Type</label>
                    <select name="interview_type" class="form-control" required="required">
        <option value="">-- Select one --</option>
        <option value="website" {{ $interviewdata->interview_type == "website" ? 'selected' :'' }}>Website</option>
        <option value="newsletter" {{ $interviewdata->interview_type == "newsletter" ? 'selected' :'' }}>Newsletter</option>
        
      </select>


              
              </div>  
                </div>


                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('department.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
