@extends('../layouts/pms')


@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Profile</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                                    <form action="{{ route('profile.update', $profiledata->id) }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row clearfix">
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                <label for="name-field">Profile Url</label>
                                                 <input type="hidden" name="company" value="{{ old('name', $profiledata->company_id ) }}">
                                                <input class="form-control" type="text" name="profile_url" id="profile_url" value="{{ old('name', $profiledata->profile_url ) }}" required="required">
                                               
                                                </div> 
                                           </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                <label for="name-field">Start Date</label>
                                                <input class="form-control" type="text" name="start_date" id="start_date" value="{{ old('name', $profiledata->start_date ) }}" required="required">
                                                </div> 
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label for="name-field">End Date</label>
                                                <input class="form-control" type="text" name="end_date" id="end_date" value="{{ old('name', $profiledata->end_date ) }}" required="required">
                                                </div> 
                                        </div>  
              
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                            <label for="name-field">Service Type</label>
                                                <select name="profile_service" class="form-control" required="required">
                                                    <option value="">-- Select one --</option>
                                                    <option value="basic" {{ $profiledata->profile_service == "basic" ? 'selected' :'' }}>Basic</option>
                                                    <option value="premium" {{ $profiledata->profile_service == "premium" ? 'selected' :'' }}>Premium</option>
                                                
                                                 </select>
                                          </div>  
                                    </div>
<div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('end_date', 'has-error')}}">
                                                <label>Deal Value</label>
                                                <input type="text" class="form-control" name="deal_amount" placeholder="Amount" value="{{$profiledata->deal_amount}}" required="required">
                                                <span class="help-block">{{ $errors->first('deal_amount', ':message') }}</span>   
                                            </div>
                                        </div>


                                        <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('end_date', 'has-error')}}">
                                                <label>Fiscal Year</label>
                                              <!--   <input type="text" class="form-control" name="" placeholder="2019-2020" value="{{ old('fiscal_year') }}" required="required"> -->

                                                 <select class="form-control" name="fiscal_year" required="required">
                                                    <option>Select</option>
                                                    <option value="2019-2020" {{ $profiledata->fiscal_year == "2019-2020" ? 'selected' :'' }}>2019-20</option>
                                                    <option value="2020-2021" {{ $profiledata->fiscal_year == "2020-2021" ? 'selected' :'' }}>2020-21</option>
                                                    <option value="2021-2022" {{ $profiledata->fiscal_year == "2021-2022" ? 'selected' :'' }}>2021-22</option>
                                                    <option value="2022-2023" {{ $profiledata->fiscal_year == "2022-2023" ? 'selected' :'' }}>2022-23</option>
                                                    <option value="2023-2024" {{ $profiledata->fiscal_year == "2023-2024" ? 'selected' :'' }}>2023-24</option>
                                                    <option value="2024-2025" {{ $profiledata->fiscal_year == "2024-2025" ? 'selected' :'' }}>2024-25</option>
                                                    <option value="2025-2026" {{ $profiledata->fiscal_year == "2025-2026" ? 'selected' :'' }}>2025-26</option>
                                                    <option value="2026-2027" {{ $profiledata->fiscal_year == "2026-2027" ? 'selected' :'' }}>2026-27</option>
                                                    <option value="2027-2028" {{ $profiledata->fiscal_year == "2027-2028" ? 'selected' :'' }}>2027-28</option>
                                                    <option value="2028-2029" {{ $profiledata->fiscal_year == "2028-2029" ? 'selected' :'' }}>2028-29</option>
                                                    <option value="2029-2030" {{ $profiledata->fiscal_year == "2029-2030" ? 'selected' :'' }}>2029-30</option>
                                                    <option value="2030-2031" {{ $profiledata->fiscal_year == "2030-2031" ? 'selected' :'' }}>2030-31</option>
                                                    <option value="2031-2032" {{ $profiledata->fiscal_year == "2031-2032" ? 'selected' :'' }}>2031-32</option>
                                                    <option value="2032-2033" {{ $profiledata->fiscal_year == "2032-2033" ? 'selected' :'' }}>2032-33</option>
                                                </select>


                                                <span class="help-block">{{ $errors->first('fiscal_year', ':message') }}</span>   
                                            </div>
                                        </div>
                                       
                                         <div class="col-md-6">

                                            <div class="form-group {{ $errors->first('sale_person', 'has-error')}}">            <label>Sales Person</label>

                                             {!! Form::select('user_id', $users, @$profiledata->user_id ,['id'=>'','class' => 'form-control','placeholder'=>'Select a Sales person'] ) !!}                          
                                               
                                              <span class="help-block">{{ $errors->first('user_id', ':message') }}</span>
                                            </div>
                                        </div>
                                              

                                               <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('end_date', 'has-error')}}">
                                                <label>Profile Category</label>
                                              <!--   <input type="text" class="form-control" name="" placeholder="2019-2020" value="{{ old('fiscal_year') }}" required="required"> -->

                                                 <select class="form-control" name="tech_category" required="required">
                                                    <option>Select</option>
                                                     <option value="web" {{ $profiledata->tech_category == "web" ? 'selected' :'' }}>Web</option>
                                                    <option value="print" {{ $profiledata->tech_category == "print" ? 'selected' :'' }}>print</option>
                                                    
                                                </select>


                                                <span class="help-block">{{ $errors->first('fiscal_year', ':message') }}</span>   
                                            </div>
                                        </div>

                                    <div class="well well-sm">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href=""  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
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