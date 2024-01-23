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
                <div class="body">
                  
                   <form action="{{ route('contentmarketing.update', $contentdata->id) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row clearfix">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="name-field">Url</label>
                                <input type="hidden" name="company" value="{{ old('name', $contentdata->company_id ) }}">
                                <input class="form-control" type="text" name="url" id="url" value="{{ old('name', $contentdata->url ) }}" required="required" />
                            </div> </div>
                            

                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="name-field">Launch Date</label>
                                    <input class="form-control" type="date" name="launch_date" id="end_date" value="{{ old('name', $contentdata->launch_date ) }}" required="required" />
                                </div> 
                            </div>  
                            
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="name-field">Content Type</label>
                                    <select name="content_type" class="form-control" required="required">
                                      
                                        <option value="product-launch" {{ $contentdata->content_type == "product-launch" ? 'selected' :'' }}>Product Launch</option>
                                        <option value="press-releases" {{ $contentdata->content_type == "press-releases" ? 'selected' :'' }}>Press Releases</option>

                                        <option value="press-releases" {{ $contentdata->content_type == "interviews" ? 'selected' :'' }}>interviews</option>

                                        <option value="white-papers" {{ $contentdata->content_type == "white-papers" ? 'selected' :'' }}>White Papers</option>

                                        <option value="case-study" {{ $contentdata->content_type == "case-study" ? 'selected' :'' }}>Case Study</option>
                                        
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