@extends('../layouts/pms')


@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Newsletter</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
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
                                  <form action="{{ route('newsletter.update', $newsletterdata->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row clearfix">
                <div class="col-md-6 ">
                <div class="form-group">
                <label for="name-field">Url</label>
                   <input type="hidden" name="company" value="{{ old('name', $newsletterdata->company_id ) }}" required="required">

                <input class="form-control" type="text" name="newsletter_url" id="newsletter_url" value="{{ old('name', $newsletterdata->url ) }}"required="required" />
                </div> </div>


                <div class="col-md-6 ">
                <div class="form-group">
                <label for="name-field">Start Date</label>
                <input class="form-control" type="text" name="start_date" id="start_date" value="{{ old('name', $newsletterdata->start_date ) }}" required="required">
                </div> </div>
               

                <div class="col-md-6 ">
                <div class="form-group">
                    <label for="name-field">End Date</label>
                <input class="form-control" type="text" name="end_date" id="end_date" value="{{ old('name', $newsletterdata->end_date ) }}" required="required">
                </div> 
            </div>  
              
                <div class="col-md-6 ">
                <div class="form-group">
                <label for="name-field">Banner Type</label>
                    <select name="newsletter_type" class="form-control" required="required">
        <option value="">-- Select one --</option>
        <option value="banner_general" {{ $newsletterdata->type == "banner_general" ? 'selected' :'' }}>Banner</option>

        <option value="banner_product" {{ $newsletterdata->type == "banner_product" ? 'selected' :'' }}>Article</option>

         <option value="sponsorshipb_general" {{ $newsletterdata->type == "sponsorshipb_general" ? 'selected' :'' }}>Interview </option>

        <!-- <option value="sponsorshipb_product" {{ $newsletterdata->type == "sponsorshipb_product" ? 'selected' :'' }}>Newsletter Sponsorship banner - Product</option> -->

        <option value="presence" {{ $newsletterdata->type == "presence" ? 'selected' :'' }}>Presence</option>


        

        
      </select>


              
              </div>  
                </div>
 <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('Month', 'has-error')}}">
                                                <label>Month</label>
                                                <select class="form-control" name="month">
                                                    <option>Select Month</option>
                                                    @foreach(getMonths() as $key => $value)
                                                     <option value="{{$key}}" <?php echo $key == getSelectMonths($newsletterdata->month) ? 'selected' : '' ?>>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block">{{ $errors->first('banner_position', ':message') }}</span>   
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