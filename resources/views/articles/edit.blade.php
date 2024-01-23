@extends('../layouts/pms')


@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Article</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Article</li>
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
                                  <form action="{{ route('article.update', $articledata->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row clearfix">
                


                <div class="col-md-6 ">
                <div class="form-group">
                <label for="name-field">Article Url</label>
                 <input type="hidden" name="company" value="{{ old('name', $articledata->company_id ) }}">
                <input class="form-control" type="text" name="article_url" id="article_url" value="{{ old('name', $articledata->article_url ) }}" required>
               
                </div> </div>
                                            <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('Month', 'has-error')}}">
                                                <label>Month</label>
                                                <select class="form-control" name="month">
                                                    <option>Select Month</option>
                                                    @foreach(getMonths() as $key => $value)
                                                     <option value="{{$key}}" <?php echo $key == getSelectMonths($articledata->month) ? 'selected' : '' ?>>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block">{{ $errors->first('banner_position', ':message') }}</span>   
                                            </div>
                                        </div>

                <div class="col-md-6 ">
                <div class="form-group">
                <label for="name-field">Start Date</label>
                <input class="form-control" type="text" name="start_date" id="start_date" value="{{ old('name', $articledata->start_date ) }}" required>
                </div> </div>
               

                <div class="col-md-6 ">
                <div class="form-group">
                    <label for="name-field">End Date</label>
                <input class="form-control" type="text" name="end_date" id="end_date" value="{{ old('name', $articledata->end_date ) }}" required>
                </div> 
            </div>  
              
                <div class="col-md-6 ">
                <div class="form-group">
                <label for="name-field">Service Type</label>
                    <select name="article_type" class="form-control" required="required">
        <option value="">-- Select one --</option>
        <option value="website" {{ $articledata->article_type == "website" ? 'selected' :'' }}>Home Page</option>
        <option value="newsletter" {{ $articledata->article_type == "newletter" ? 'selected' :'' }}>Newsletter</option>
        
      </select>


              
              </div>  
                </div>


                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                   
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