@extends('../layouts/pms')
@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Guaranteed Rfq</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Guaranteed Rfq</li>
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
                                    <form action="{{ route('guaranteedrfq.update', $rfqdata->id) }}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row clearfix">
                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Url</label>
                                               <input type="hidden" name="company" value="{{ old('name', $rfqdata->company_id ) }}">

                                            <input class="form-control" type="text" name="guaranteed_url" id="guaranteed_url" value="{{ old('name', $rfqdata->guaranteed_url ) }}" required="required" />
                                            </div> </div>


                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Start Date</label>
                                            <input class="form-control" type="date" name="guaranteed_start_date" id="guaranteed_start_date" value="{{ old('name', $rfqdata->guaranteed_start_date ) }}" required="required"/>
                                            </div> </div>

                                            <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">End Date</label>
                                            <input class="form-control" type="date" name="guaranteed_end_date" id="guaranteed_end_date" value="{{ old('name', $rfqdata->guaranteed_end_date ) }}" required="required"/>
                                            </div> </div>
                                           

                                       

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