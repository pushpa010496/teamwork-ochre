@extends('../layouts/pms')
@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Banners</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">banners</li>
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
                                <div class="body">
                                    <form action="{{ route('banners.update', $bannerdata->id) }}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row clearfix">
                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Banner Name</label>
                                               <input type="hidden" name="company" value="{{ old('name', $bannerdata->company_id ) }}">

                                            <input class="form-control" type="text" name="banner_name" id="banner_name" value="{{ old('name', $bannerdata->banner_name ) }}" />
                                            </div> </div>


                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Start Date</label>
                                            <input class="form-control" type="date" name="start_date" id="start_date" value="{{ old('name', $bannerdata->start_date ) }}" />
                                            </div> </div>
                                           

                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="name-field">End Date</label>
                                            <input class="form-control" type="date" name="end_date" id="end_date" value="{{ old('name', $bannerdata->end_date ) }}" />
                                            </div> 
                                        </div>  
                                          
                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Banner Type</label>
                                                <select name="banner_type" class="form-control" required="required">
                                    <option value="">-- Select one --</option>
                                    <option value="leaderboard_banner" {{ $bannerdata->banner_type == "leaderboard_banner" ? 'selected' :'' }}>Leader Board</option>
                                    <option value="slider_banner" {{ $bannerdata->banner_type == "slider_banner" ? 'selected' :'' }}>Slder Banner</option>
                                    
                                    <option value="square_banner" {{ $bannerdata->banner_type == "square_banner" ? 'selected' :'' }}>Squaree Banner</option>

                                    <option value="category_banner" {{ $bannerdata->banner_type == "category_banner" ? 'selected' :'' }}>Category Banner</option>
                                    
                                  </select>
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