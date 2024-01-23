@extends('../layouts/liveware')
@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                  <div class="col-md-6 col-sm-12">
                   <!--  <h1>Company</h1> -->
            
            
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                        <li class="breadcrumb-item "><a href="http://teamwork.ochre-media.com/companyinfo">Company</a></li>
                      
                      </ol>
                    </nav>
                  </div>            
                  <div class="col-md-6 col-sm-12 text-right">
                    <a href="http://teamwork.ochre-media.com/companyinfo" class="btn btn-sm btn-primary" title=""><< Companies</a>
                  </div>
                </div>
              </div>


            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <div class="">
                            <div class="" >
                                <div class="body">
                               <form method="post" action="{{route('company.update',$company->id)}}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                    <div class="row clearfix">
                                        <div class="col-md-6 offset-md-3">
                                              <div class="form-group {{ $errors->first('company_name', 'has-error')}}">
                                                  <input type="text" class="form-control" name="company_name" placeholder="Company Name" value="{{$company->comp_name}}">
                                                  <span class="help-block">{{ $errors->first('company_name', ':message') }}</span>   
                                              </div>

                                              <div class="form-group {{ $errors->first('email', 'has-error')}}">
                                                  <input type="email" class="form-control" name="email" value="{{$company->email}}" >
                                                  <span class="help-block">{{ $errors->first('email', ':message') }}</span>   
                                              </div>

                                              <div class="form-group {{ $errors->first('country', 'has-error')}}">
                                                  <input type="text" class="form-control" name="country" placeholder="Country" value="{{$company->country}}" >
                                                  <span class="help-block">{{ $errors->first('country', ':message') }}</span>   
                                              </div>
                                            </div>

                                        <div class="col-md-6 offset-md-3">
                                            <div class="form-group {{ $errors->first('contact_name', 'has-error')}}">
                                                <input type="text" class="form-control" name="contact_name" placeholder="Contact Name" value="{{$company->contact_person}}">
                                                <span class="help-block">{{ $errors->first('contact_name', ':message') }}</span>   
                                            </div>

                                             <div class="form-group {{ $errors->first('phone', 'has-error')}}">
                                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$company->phone}}">
                                            </div>
                                            <div class="form-group {{ $errors->first('fax', 'has-error')}}">
                                                <input type="text" class="form-control" name="fax" placeholder="Fax" value="{{$company->fax}}">
                                            </div>
                                     @php  $values = explode(",",$company->services); @endphp
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-sm">
                                          <div class="form-check form-check-inline" >
                                            <label class="switch">
                                              <input class="form-check-input" name="service[]" type="checkbox" id="profile" value="Profile" {{ in_array('Profile',$values) ? ' checked' : '' }}  onchange="serviceChanged()">
                                              <span class="slider round"></span>
                                            </label>
                                              <label class="form-check-label" >Profile</label>
                                          </div>
                                        </div>

                                        <div class="col-sm">
                                          <div class="form-check form-check-inline">
                                            <label class="switch">
                                              <input class="form-check-input" type="checkbox" name="service[]" id="banners" value="Banners" {{ in_array('Banners',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                              <span class="slider round"></span>
                                            </label>
                                            <label class="form-check-label" >Banners</label>
                                          </div>
                                        </div>
                                        <div class="col-sm">
                                           <div class="form-check form-check-inline">
                                                <label class="switch">
                                                   <input class="form-check-input" type="checkbox" name="service[]" id="newsletter" value="Newsletter" {{ in_array('Newsletter',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                                  <span class="slider round"></span>
                                                </label>
                                               <label class="form-check-label" >Newsletter</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div><br>

                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                        <div class="form-check form-check-inline">
                                          <label class="switch">
                                             <input class="form-check-input" type="checkbox" name="service[]" id="article" value="Article" {{ in_array('Article',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                            <span class="slider round"></span>
                                          </label>
                                          <label class="form-check-label" >Article</label>
                                      </div>
                                    </div>
                                    <div class="col-sm">
                                         <div class="form-check form-check-inline">
                                            <label class="switch">
                                               <input class="form-check-input" type="checkbox" name="service[]" id="interview" value="Interview" {{ in_array('Interview',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                              <span class="slider round"></span>
                                            </label>
                                            <label class="form-check-label" >Interview</label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                         <div class="form-check form-check-inline">
                                          <label class="switch">
                                             <input class="form-check-input" type="checkbox" name="service[]" id="email" value="Email Marketing" {{ in_array('Email Marketing',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                            <span class="slider round"></span>
                                          </label>
                                          <label class="form-check-label" style="size: 10px;">Email </label>
                                      </div>
                                    </div>
                                  </div>
                                </div><br>

                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                         <div class="form-check form-check-inline">
                                            <label class="switch">
                                                <input class="form-check-input" type="checkbox" name="service[]" id="content" value="Content Marketing" {{ in_array('Content Marketing',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                              <span class="slider round"></span>
                                            </label>
                                            <label class="form-check-label" >Content</label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                         <div class="form-check form-check-inline">
                                            <label class="switch">
                                                <input class="form-check-input" type="checkbox" name="service[]" id="webinars" value="Webinars" {{ in_array('Webinars',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                              <span class="slider round"></span>
                                            </label>
                                            <label class="form-check-label" >Webinars</label>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-check form-check-inline">
                                          <label class="switch">
                                              <input class="form-check-input" type="checkbox" name="service[]" id="socialmedia" value="Social Media Marketing" {{ in_array('Social Media Marketing',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                            <span class="slider round"></span>
                                          </label>
                                           <label class="form-check-label">SocialMedia</label>
                                        </div>
                                    </div>
                                  </div>
                                </div><br>

                            <div class="container">
                                <div class="row">
                                  <div class="col-sm">
                                       <div class="form-check form-check-inline">
                                          <label class="switch">
                                              <input class="form-check-input" type="checkbox" name="service[]" id="guaranteed" value="Guaranteed RFQ" {{ in_array('Guaranteed RFQ',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                            <span class="slider round"></span>
                                          </label>
                                          <label class="form-check-label" >Guaranteed RFQ</label>
                                    </div>
                                  </div>

                                    <div class="col-sm">
                                                         <div class="form-check form-check-inline">
                                                            <label class="switch">
                                              <input class="form-check-input" type="checkbox" name="service[]" id="productlunch" value="productlaunch" {{ in_array('productlunch',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                            <span class="slider round"></span>
                                          </label>
                                                            <label class="form-check-label" >Product Launch</label>
                                                      </div>
                                                    </div>


                                                      <div class="col-sm">
                                                         <div class="form-check form-check-inline">
                                                            <label class="switch">
                                              <input class="form-check-input" type="checkbox" name="service[]" id="octhers" value="others" {{ in_array('productlunch',$values) ? ' checked' : '' }} onchange="serviceChanged()">
                                            <span class="slider round"></span>
                                          </label>
                                                            <label class="form-check-label" > Others</label>
                                                      </div>
                                                    </div>

                                                    
                                </div>
                            </div><br> 
                                            <span class="help-block">{{ $errors->first('technology', ':message') }}</span>
                                            <div class="form-group {{ $errors->first('website', 'has-error')}}">
                                                <input type="text" class="form-control" name="website" placeholder="Website" value="{{$company->website}}">
                                                <span class="help-block">{{ $errors->first('website', ':message') }}</span>   
                                            </div>
                                           <div class="form-group {{ $errors->first('technology', 'has-error')}}">                                    
                                             <select name="technology" class="form-control" required="required">
                                                <option value="">-- Technology --</option>
                                                <option value="1"<?php if($company->technology_id=='1'){ echo "selected"; } ?>>PlantAutomation</option>
                                                <option value="2"<?php if($company->technology_id=='2'){ echo "selected"; } ?>>Packaging</option>
                                                <option value="3"<?php if($company->technology_id=='3'){ echo "selected"; } ?>>Defence</option>
                                                <option value="4"<?php if($company->technology_id=='4'){ echo "selected"; } ?>>Pulp&paper</option>
                                                <option value="5"<?php if($company->technology_id=='5'){ echo "selected"; } ?>>Steel</option>
                                                <option value="6"<?php if($company->technology_id=='6'){ echo "selected"; } ?>>Hospitals</option>
                                                <option value="7"<?php if($company->technology_id=='7'){ echo "selected"; } ?>>Sports</option>
                                                <option value="8"<?php if($company->technology_id=='8'){ echo "selected"; } ?>>Automotive</option>
                                                <option value="9"<?php if($company->technology_id=='9'){ echo "selected"; } ?>>Pharmaceutical</option>
                                                <option value="10"<?php if($company->technology_id=='10'){ echo "selected"; } ?>>Plastics</option>
                                                <option value="11"<?php if($company->technology_id=='11'){ echo "selected"; } ?>>Broadcast</option>
                                            </select>
                                            <span class="help-block">{{ $errors->first('technology', ':message') }}</span>
                                          </div>
                                       <div class="form-group {{ $errors->first('address', 'has-error')}}">
                                              <textarea  name="address" rows="3" class="form-control"  placeholder="Address">{{$company->address}}</textarea>                  
                                              <span class="help-block">{{ $errors->first('address', ':message') }}</span>   
                                       </div>
                                       
                     <div class="form-group {{ $errors->first('company_type', 'has-error')}}">                                    
                     <select name="company_type" class="form-control" required="required">
                        <option value="">-- Company Type --</option>
                        <option value="blind"<?php if($company->company_type=='blind'){ echo "selected"; } ?>>Blind</option>
                        <option value="free"<?php if($company->company_type=='free'){ echo "selected"; } ?>>Free</option>
                        <option value="paid"<?php if($company->company_type=='paid'){ echo "selected"; } ?>>Paid</option>
                        <option value="inactive"<?php if($company->company_type=='inactive'){ echo "selected"; } ?>>Inactive</option>>
                    </select>
                    <span class="help-block">{{ $errors->first('company_type', ':message') }}</span>
                  </div>

                                       <div class="form-group {{ $errors->first('deals', 'has-error')}}">
        <textarea  name="deals" rows="3" class="form-control"  placeholder="Booking Details">{{$company->deals}}</textarea>                  
                                              <span class="help-block">{{ $errors->first('data', ':message') }}</span>  
      </div>

      <div class="form-group {{ $errors->first('No Of Enquiries', 'has-error')}}">
          <input type="text"  name="enquiries" class="form-control"  value="{{$company->enquiries}}" placeholder="No Of Enquiries">                  
          <span class="help-block">{{ $errors->first('enquiries', ':message') }}</span>   
      </div>
       <div class="form-group {{ $errors->first('Year of inception', 'has-error')}}">
          <input type="text"  name="inception" class="form-control"  value="{{$company->inception}}" placeholder="Year of inception">                  
          <span class="help-block">{{ $errors->first('inception', ':message') }}</span>   
      </div>

  </div>

      <div class="col-12 text-center">
          <button type="submit" class="btn btn-primary">ADD</button>
           <a href="{{url('clients')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
      </div>
    </div>
  </form>
  </div>
</div>
 <div class="col-md-12">
    {!! Form::open(['method'=>'GET','url'=>'company','role'=>'search'])  !!}
        <div id="custom-search-input">
          <div class="input-group col-md-12 pull-right">
              <input type="text" class="search-query form-control" placeholder="Search" name="search" />
              <span class="input-group-btn">
                  <button class="btn btn-danger" type="button">
                      <i class="fa fa-search" aria-hidden="true"></i>

                  </button>
              </span>
          </div>
        </div>
   {!! Form::close() !!}
  </div>
  <div>&nbsp;<br/></div>
                            
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
<style type="text/css">
  .head-style{
    width: 100%;
    height: 1px;
    background-color: #c1272d;
  }
</style>>

@section('scripts')
  <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
@endsection