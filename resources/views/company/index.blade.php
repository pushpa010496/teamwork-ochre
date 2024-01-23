@extends('../layouts/pms')
<style type="text/css">
  .paginate_button {
    color: #fff !important;
    font-weight:200;
    
}
.dataTables_info
{
   color: #fff !important;
    font-weight:200;
}
</style>
@section('content')
@php
$companyServices=App\CompanyService::select("company_services.service","company_services.company_id") ->leftJoin("companies", "companies.id", "=", "company_services.company_id")->get();
@endphp
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                                           
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs2">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_departments">Companies</a></li>
                            @if (Auth::user()->can('client_add'))
                             <li class="nav-item"><a class="nav-link" id="import"  href="{{route('companies.export_excel')}}">Export Compains</a></li> 

                            
                            @endif                
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                               <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
                                @csrf
                                    <div class="row clearfix">
                                        <div class="col-md-6 offset-md-3">
                                              <div class="form-group {{ $errors->first('company_name', 'has-error')}}">
                                                  <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                                                  <span class="help-block">{{ $errors->first('company_name', ':message') }}</span>   
                                              </div>

                                              <div class="form-group {{ $errors->first('email', 'has-error')}}">
                                                  <input type="email" class="form-control" name="email" placeholder="Email" >
                                                  <span class="help-block">{{ $errors->first('email', ':message') }}</span>   
                                              </div>

                                              <div class="form-group {{ $errors->first('country', 'has-error')}}">
                                                  <input type="text" class="form-control" name="country" placeholder="Country" >
                                                  <span class="help-block">{{ $errors->first('country', ':message') }}</span>   
                                              </div>
                                            </div>

                                        <div class="col-md-6 offset-md-3">
                                            <div class="form-group {{ $errors->first('contact_name', 'has-error')}}">
                                                <input type="text" class="form-control" name="contact_name" placeholder="Contact Name">
                                                <span class="help-block">{{ $errors->first('contact_name', ':message') }}</span>   
                                            </div>

                                             <div class="form-group {{ $errors->first('phone', 'has-error')}}">
                                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                                            </div>
                                           
                                            <div class="form-group {{ $errors->first('fax', 'has-error')}}">
                                                <input type="text" class="form-control" name="fax" placeholder="Fax">
                                            </div>

                                              <div class="container">
                                                <div class="row">
                                                  <div class="col-sm">
                                                    <div class="form-check form-check-inline" >
                                                      <label class="switch">
                                                        <input class="form-check-input" name="service[]" type="checkbox" id="profile" value="Profile" onchange="serviceChanged()">
                                                        <span class="slider round"></span>
                                                      </label>
                                                        <label class="form-check-label" >Profile</label>
                                                    </div>
                                                  </div>

                                                  <div class="col-sm">
                                                    <div class="form-check form-check-inline">
                                                      <label class="switch">
                                                        <input class="form-check-input" type="checkbox" name="service[]" id="banners" value="Banners" onchange="serviceChanged()">
                                                        <span class="slider round"></span>
                                                      </label>
                                                      <label class="form-check-label" >Banners</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-sm">
                                                     <div class="form-check form-check-inline">
                                                          <label class="switch">
                                                             <input class="form-check-input" type="checkbox" name="service[]" id="newsletter" value="Newsletter" onchange="serviceChanged()">
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
                                                           <input class="form-check-input" type="checkbox" name="service[]" id="article" value="Article" onchange="serviceChanged()">
                                                          <span class="slider round"></span>
                                                        </label>
                                                        <label class="form-check-label" >Article</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-sm">
                                                       <div class="form-check form-check-inline">
                                                          <label class="switch">
                                                             <input class="form-check-input" type="checkbox" name="service[]" id="interview" value="Interview" onchange="serviceChanged()">
                                                            <span class="slider round"></span>
                                                          </label>
                                                          <label class="form-check-label" >Interview</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm">
                                                       <div class="form-check form-check-inline">
                                                        <label class="switch">
                                                           <input class="form-check-input" type="checkbox" name="service[]" id="email" value="Email Marketing" onchange="serviceChanged()">
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
                                                              <input class="form-check-input" type="checkbox" name="service[]" id="content" value="Content Marketing" onchange="serviceChanged()">
                                                            <span class="slider round"></span>
                                                          </label>
                                                          <label class="form-check-label" >Content</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm">
                                                       <div class="form-check form-check-inline">
                                                          <label class="switch">
                                                              <input class="form-check-input" type="checkbox" name="service[]" id="webinars" value="Webinars" onchange="serviceChanged()">
                                                            <span class="slider round"></span>
                                                          </label>
                                                          <label class="form-check-label" >Webinar</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm">
                                                      <div class="form-check form-check-inline">
                                                        <label class="switch">
                                                            <input class="form-check-input" type="checkbox" name="service[]" id="socialmedia" value="Social Media Marketing" onchange="serviceChanged()">
                                                          <span class="slider round"></span>
                                                        </label>
                                                         <label class="form-check-label">Social Media</label>
                                                      </div>
                                                  </div>
                                                </div>
                                              </div><br>

                                              <div class="container">
                                                  <div class="row">
                                                    <div class="col-sm">
                                                         <div class="form-check form-check-inline">
                                                            <label class="switch">
                                                                <input class="form-check-input" type="checkbox" name="service[]" id="guaranteed" value="Guaranteed RFQ" onchange="serviceChanged()">
                                                              <span class="slider round"></span>
                                                            </label>
                                                            <label class="form-check-label" >Guaranteed RFQ</label>
                                                      </div>
                                                    </div>


                                                     <div class="col-sm">
                                                         <div class="form-check form-check-inline">
                                                            <label class="switch">
                                                                <input class="form-check-input" type="checkbox" name="service[]" id="productlunch" value="productlaunch" onchange="serviceChanged()">
                                                              <span class="slider round"></span>
                                                            </label>
                                                            <label class="form-check-label" >Product Launch</label>
                                                      </div>
                                                    </div>


                                                      <div class="col-sm">
                                                         <div class="form-check form-check-inline">
                                                            <label class="switch">
                                                                <input class="form-check-input" type="checkbox" name="service[]" id="others" value="productlunch" onchange="serviceChanged()">
                                                              <span class="slider round"></span>
                                                            </label>
                                                            <label class="form-check-label" >Others</label>
                                                      </div>
                                                    </div>



                                                  </div>
                                                </div><br>

                                                <div class="" style="display: none;" id="show_profile">
                                                  <a href="#">Profile Service</a><br>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="profile_url" placeholder="Profile URL">
                                                       <span class="help-block">{{ $errors->first('profile_url', ':message') }}</span>
                                                    </div> 
                                                    <div class="form-group">
                                                        <select name="profile_service" class="form-control">
                                                            <option value="">-- Select Services --</option>
                                                            <option value="basic">Basic</option>
                                                            <option value="premium">Premium</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-daterange input-group" data-provide="datepicker">
                                                            <input type="text" class="input-sm form-control" name="profile_start_date" placeholder="Profile Start Date">
                                                            <span class="input-group-addon range-to">to</span>
                                                            <input type="text" class="input-sm form-control" name="profile_end_date" placeholder="Profile Due Date">
                                                        </div>
                                                    </div>
                                                    <div class="head-style"></div>
                                                </div><br>
      <div class="" style="display: none;" id="show_banner">
        <a href="#">Banners Service</a><br>
            <div class="form-group">
              {!! Form::label('banner_image', 'Banner Image:') !!}
               {!! Form::file('banner_image', array('class' => '')) !!}
             </div> 

            <div class="container">
                <div class="row">
                  <div class="col">
                       <div class="form-check form-check-inline">
                        <label class="switch">
                          <input type="hidden" name="banner_type[]" id="leaderboard_value" value="" >
                          <input class="form-check-input" type="checkbox"  id="leaderboard" value="leaderboard" onchange="serviceChanged()">
                            <span class="slider"></span>
                        </label>
                        <label class="form-check-label" >Leaderboard banner</label>
                      </div>
                  </div>
                  <div class="col">
                       <div class="form-check form-check-inline">
                          <label class="switch">
                             <input type="hidden" name="banner_type[]" id="square_value" value="">
                             <input class="form-check-input" type="checkbox"  id="square" value="square" onchange="serviceChanged()">
                             <span class="slider"></span>
                          </label>
                          <label class="form-check-label" >Square Banner</label>
                        </div>
                  </div>
                </div>
            </div><br>

            <div class="container">
              <div class="row">
                <div class="col">
                     <div class="form-check form-check-inline">
                    <label class="switch">
                        <input type="hidden" name="banner_type[]" value="" id="slider_value" >
                        <input class="form-check-input" type="checkbox"  id="slider" value="" onchange="serviceChanged()">
                        <span class="slider"></span>
                    </label>
                    
                    <label class="form-check-label">Slider Banner</label>
                  </div>
                </div>
                <div class="col">
                     <div class="form-check form-check-inline">
                      <label class="switch">
                        <input type="hidden" name="banner_type[]" value="" id="category_value">
                       <input class="form-check-input" type="checkbox"  id="category" value="category" onchange="serviceChanged()">
                        <span class="slider"></span>
                      </label>
                      <label class="form-check-label">Category Banner</label>
                    </div>
                </div>
              </div>
          </div><br>

             <div class="form-group" id="show_leaderboard" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="" id="leaderboard_start_date" placeholder="Leaderboard  Banner Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="" id="leaderboard_end_date" placeholder="Leaderboard  Banner End Date">
                </div>
            </div>

            <div class="form-group" id="show_square" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="" id="square_start_date" placeholder="Square  Banner Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="" id="square_end_date" placeholder="Square  Banner End Date">
                </div>
            </div>

             <div class="form-group" id="show_slider" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="" id="slider_start_date" placeholder="Slider  Banner Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="" id="slider_end_date" placeholder="Slider  Banner End Date">
                </div>
            </div>

            <div class="form-group" id="show_category" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="" id="category_start_date" placeholder="Category  Banner Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="" id="category_end_date" placeholder="Category  Banner End Date">
                </div>
            </div>
            <div class="head-style"></div><br><br>
      </div>

    <div class="" style="display: none;" id="show_newsletter">
      <a href="#">Newsletter Service</a><br>
         <div class="form-group ">
            <input type="text" class="form-control" name="newsletter_url" placeholder="Enter Newsletter Url" value="{{ old('url') }}">
            <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
         </div>

        <div class="container">
            <div class="row">
              <div class="col-sm">
                  <div class="form-check form-check-inline">
                    <label class="switch">
                      <input type="hidden" name="newsletter_type[]" id="general_banner_value" value="">
                        <input class="form-check-input" type="checkbox"  id="general_banner" value="general_banner" onchange="serviceChanged()">
                      <span class="slider"></span>
                    </label>
                        <label class="form-check-label" >General</label>
                  </div>
              </div>
              <div class="col-sm">
                    <div class="form-check form-check-inline">
                      <label class="switch">
                         <input type="hidden" name="newsletter_type[]" id="product_banner_value" value="">
                          <input class="form-check-input" type="checkbox" id="product_banner" value="product_banner" onchange="serviceChanged()">
                        <span class="slider"></span>
                      </label>
                          <label class="form-check-label" >Product</label>
                    </div>
              </div>
              <div class="col-sm">
                   <div class="form-check form-check-inline">
                      <label class="switch">
                     <input type="hidden" name="newsletter_type[]" id="general_sponsorship_banner_value" value="">
                        <input class="form-check-input" type="checkbox"  id="general_sponsorship_banner" value="general_sponsorship_banner" onchange="serviceChanged()">
                      <span class="slider"></span>
                    </label>
                        <label class="form-check-label">GeneralSponsorship</label>
                    </div>
              </div>
            </div><br>
            <div class="row">
              <div class="col-sm">
                  <div class="form-check form-check-inline">
                    <label class="switch">
                     <input type="hidden" name="newsletter_type[]" id="product_sponsorship_banner_value" value="">
                      <input class="form-check-input" type="checkbox"  id="product_sponsorship_banner" value="product_sponsorship_banner" onchange="serviceChanged()">
                    <span class="slider"></span>
                   </label>
                      <label class="form-check-label">ProductSponsorship</label>
                </div>
              </div>
              <div class="col-sm">
                  <div class="form-check form-check-inline">
                      <label class="switch">
                      <input type="hidden" name="newsletter_type[]" id="presence_value" value="">
                        <input class="form-check-input" type="checkbox"  id="presence" value="presence" onchange="serviceChanged()">
                      <span class="slider"></span>
                    </label>
                       
                        <label class="form-check-label">Presence</label>
                  </div>
              </div>
            </div>
        </div>



             <div class="form-group" id="show_general_banner" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="general_banner_start_date" placeholder="General Banner Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="general_banner_end_date" placeholder="General Banner End Date">
                </div>
            </div>

            <div class="form-group" id="show_product_banner" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="product_banner_start_date" placeholder="Product Banner Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="product_banner_end_date" placeholder="Product Banner End Date">
                </div>
            </div>

             <div class="form-group" id="show_general_sponsorship_banner" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="general_sponsorship_banner_start_date" placeholder="General Sponsorship Banner Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="general_sponsorship_banner_end_date" placeholder="General Sponsorship Banner End Date">
                </div>
            </div>

            <div class="form-group" id="show_product_sponsorship_banner" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="product_sponsorship_banner_start_date" placeholder="Product Sponsorship Banner Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="product_sponsorship_banner_end_date" placeholder="Product Sponsorship Banner End Date">
                </div>
            </div>

            <div class="form-group" id="show_presence" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="presence_start_date" placeholder="Presence Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="presence_end_date" placeholder="Presence End Date">
                </div>
            </div><br>
            <div class="head-style"></div><br>
    </div>

    <div class="" style="display: none;" id="show_article">
      <a href="#">Article Service</a><br>
         <div class="form-group ">
            <input type="text" class="form-control" name="article_url" placeholder="Enter Article Url" value="{{ old('url') }}">
            <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
         </div>
          <div class="form-group">
              <div class="form-check form-check-inline">
                 <input type="hidden" name="article_type[]" value="" id="article_website_value" >
                 <label class="switch">
                  <input class="form-check-input" type="checkbox"  id="website" value="website" onchange="serviceChanged()">
                  <span class="slider"></span>
                </label>
                  <label class="form-check-label" >Website</label>
                </div>

                <div class="form-check form-check-inline">
                  <input type="hidden" name="article_type[]" value="" id="article_newsletter_value" >
                  <label class="switch">
                    <input class="form-check-input" type="checkbox"  id="article_newsletter" value="newsletter" onchange="serviceChanged()">
                    <span class="slider"></span>
                  </label>
                  <label class="form-check-label" >Newsletter</label>
                </div>
          </div>

             <div class="form-group" id="show_website" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="article_website_start_date" placeholder="Website Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="article_website_end_date" placeholder="Website End Date">
                </div>
            </div>

            <div class="form-group" id="show_article_newsletter" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="article_newslatter_start_date" placeholder="Newsletter Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="article_newslatter_end_date" placeholder="Newsletter End Date">
                </div>
            </div>
            <div class="head-style"></div><br>
    </div>

    <div class="" style="display: none;" id="show_interview">
      <a href="#">Interview Service</a><br>
         <div class="form-group ">
            <input type="text" class="form-control" name="interview_url" placeholder="Enter Interview Url">
            <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
         </div>

         <div class="container">
          <div class="row">
            <div class="col-sm">
                 <div class="form-check form-check-inline">
                  <input type="hidden" name="interview_type[]" value="" id="interview_website_value" >
                  <label class="switch">
                    <input class="form-check-input" type="checkbox"  id="interview_website" value="website" onchange="serviceChanged()">
                    <span class="slider"></span>
                  </label>
                  <label class="form-check-label" >Website</label>
                </div>
            </div>
            <div class="col-sm">
                 <div class="form-check form-check-inline">
                  <input type="hidden" name="interview_type[]" value="" id="interview_newsletter_value" >
                  <label class="switch">
                    <input class="form-check-input" type="checkbox"  id="interview_newsletter" value="newsletter" onchange="serviceChanged()">
                    <span class="slider"></span>
                  </label>
                  <label class="form-check-label" >Newsletter</label>
                </div>
            </div>
          </div>
        </div><br>

             <div class="form-group" id="show_interview_website" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="interview_website_start_date" placeholder="Website Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="interview_website_end_date" placeholder="Website End Date">
                </div>
            </div>

            <div class="form-group" id="show_interview_newsletter" style="display: none;">
                <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="interview_newsletter_start_date" placeholder="Newsletter Start Date">
                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="interview_newslatter_end_date" placeholder="Newsletter End Date">
                </div>
            </div>
            <div class="head-style"></div><br>
    </div>

    <div class="add-on" style="display: none;" id="show_email">
  <a href="#">Email Marketing Servive</a><br>
       <div class="form-group ">
          <input type="text" class="form-control" name="email_url[]" placeholder="Enter Email Url" value="{{ old('url') }}">
          <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
       </div>
        <div class="form-group" >
          <input type="date" class="form-control"  name="email_date[]" placeholder="Email Launch  Date">
        </div>
      <input type="hidden" name="noofemails" value="" id="noofprices">
      <div class="input_fields_wrap text-right">
          <a href="#" class="add_field_button" style="color: green;"><i class="fa fa-plus"></i></a>
      </div>
            
          <div class="head-style"></div><br>
  </div>


    <div class="" style="display: none;" id="show_content">
       <a href="#">Content Marketing Service</a><br>
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="form-check form-check-inline">
                  <input type="hidden" name="content_type[]" id="product_launch_value" value="">
                  <label class="switch">
                    <input class="form-check-input" type="checkbox"  id="product_launch" value="product_launch" onchange="serviceChanged()">
                  <span class="slider"></span>
                   </label>
                  <label class="form-check-label" >Product</label>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-check form-check-inline">
                  <input type="hidden" name="content_type[]" id="press_releases_value" value="">
                  <label class="switch">
                    <input class="form-check-input" type="checkbox" id="press_releases" value="press_releases" onchange="serviceChanged()">
                    <span class="slider"></span>
                  </label>
                  <label class="form-check-label" >PressReleases</label>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-check form-check-inline">
                 <input type="hidden" name="content_type[]" id="interviews_value" value="">
                   <label class="switch">
                   <input class="form-check-input" type="checkbox" id="content_interviews" value="content_interviews" onchange="serviceChanged()">
                  <span class="slider"></span>
                  </label>
                  <label class="form-check-label" >Interviews</label>
                </div>
              </div>
            </div><br>
            <div class="row">
                <div class="col">
                  <div class="form-check form-check-inline">
                     <input type="hidden" name="content_type[]" id="white_papers_value" value="">
                     <label class="switch">
                       <input class="form-check-input" type="checkbox" id="white_papers" value="white_papers" onchange="serviceChanged()">
                      <span class="slider"></span>
                    </label>
                    <label class="form-check-label" >White Papers</label>
                  </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                       <input type="hidden" name="content_type[]" id="casestudy_value" value="">
                       <label class="switch">
                         <input class="form-check-input" type="checkbox"  id="casestudy" value="casestudy" onchange="serviceChanged()">
                        <span class="slider"></span>
                      </label>
                      <label class="form-check-label" >Case Study</label>
                    </div>
                </div><br>
            </div>
          </div>
          <div class="form-group" id="show_product_launch" style="display: none;">

            <div class="form-group ">
              <input type="text" class="form-control" name="product_launch_url" placeholder="Enter Product Url" value="{{ old('url') }}">
              <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
           </div>
            <div class="form-group" >
                <input type="date" class="form-control"  name="product_launch_date" placeholder="Product Launch  Date">
            </div>
          </div>

          <div class="form-group" id="show_press_releases" style="display: none;">
              <div class="form-group ">
              <input type="text" class="form-control" name="press_releases_url" placeholder="Enter Press Releases Url" value="{{ old('url') }}">
              <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
           </div>
            <div class="form-group" >
                <input type="date" class="form-control"  name="press_releases_date" placeholder="Press Releases Launch  Date">
            </div>
          </div>

          <div class="form-group" id="show_content_interviews" style="display: none;">
              <div class="form-group ">
              <input type="text" class="form-control" name="interview_url" placeholder="Enter Interviews Url" value="{{ old('url') }}">
              <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
           </div>
            <div class="form-group" >
                <input type="date" class="form-control" name="interview_date" placeholder="Interviews Launch  Date">
            </div>
          </div>

          <div class="form-group" id="show_white_papers" style="display: none;">
              <div class="form-group ">
              <input type="text" class="form-control" name="whitepaper_url" placeholder="Enter White Paper Url" value="{{ old('url') }}">
              <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
           </div>
            <div class="form-group" >
                <input type="date" class="form-control"  name="whitepaper_date" placeholder="White Paper Launch Date">
            </div>
          </div>

          <div class="form-group" id="show_casestudy" style="display: none;">
              <div class="form-group ">
              <input type="text" class="form-control" name="casestudy_url" placeholder="Enter Casestudy Url" value="{{ old('url') }}">
              <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
           </div>
            <div class="form-group" >
                <input type="date" class="form-control"  name="casestudy_date" placeholder="Casestudy Launch Date">
            </div>
          </div>
          <div class="head-style"></div><br><br>
  </div>

  <div class="" style="display: none;" id="show_webinars">
     <a href="#">Webinars</a><br>
       <div class="form-group ">
          <input type="text" class="form-control" name="webinar_url" placeholder="Enter Webinars Url" value="{{ old('url') }}">
          <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
       </div>
           <div class="form-group">
              <div class="input-daterange input-group" data-provide="datepicker">
                  <input type="text" class="input-sm form-control" name="webinar_start_date" placeholder="Webinar Start Date">
                  <span class="input-group-addon range-to">to</span>
                  <input type="text" class="input-sm form-control" name="webinar_end_date" placeholder="Webinar End Date">
              </div>
          </div>
          <div class="head-style"></div><br>
  </div>


  <div class="" style="display: none;" id="show_socialmedia">
     <a href="#">Social Media Marketing</a><br>
    <div class="form-group" >
        <input type="date" class="form-control"  name="fb_date" placeholder=" FaceBook Launch Date">
    </div>
    <div class="form-group">
            {!! Form::label('fb_image', 'Facebook Screen Shot:') !!}
             {!! Form::file('fb_image', array('class' => '')) !!}
      </div>

      <div class="form-group" >
        <input type="date" class="form-control"  name="linkedin_date" placeholder=" LinkedIn Launch Date">
    </div>
    <div class="form-group">
            {!! Form::label('linkedin_image', 'LinkedIn Screen Shot:') !!}
             {!! Form::file('linkedin_image', array('class' => '')) !!}
      </div>


      <div class="form-group" >
        <input type="date" class="form-control"  name="twitter_date" placeholder=" Twitter Launch Date">
    </div>
    <div class="form-group">
            {!! Form::label('twitter_image', 'Twitter Screen Shot:') !!}
             {!! Form::file('twitter_image', array('class' => '')) !!}
      </div>

      <div class="head-style"></div><br>
  </div>

  <div class="" style="display: none;" id="show_guaranteed">
     <a href="#">Guaranteed RFQ</a><br>
       <div class="form-group ">
          <input type="text" class="form-control" name="guaranteed_url" placeholder="Enter Guaranteed RFQ Url" value="{{ old('url') }}">
          <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
       </div>
           <div class="form-group">
              <div class="input-daterange input-group" data-provide="datepicker">
                  <input type="text" class="input-sm form-control" name="guaranteed_start_date" placeholder="Guaranteed RFQ Start Date">
                  <span class="input-group-addon range-to">to</span>
                  <input type="text" class="input-sm form-control" name="guaranteed_end_date" placeholder=" End Date">
              </div>
          </div>
          <div class="head-style"></div><br>
  </div>

  <div class="" style="display: none;" id="show_socialmedia">
       <div class="form-group ">
          <input type="text" class="form-control" name="socialmedia_url" placeholder="Enter Webinars Url" value="{{ old('url') }}">
          <span class="help-block">{{ $errors->first('url', ':message') }}</span>   
       </div>
           <div class="form-group">
              <div class="input-daterange input-group" data-provide="datepicker">
                  <input type="text" class="input-sm form-control" name="start_date" placeholder="Guaranteed RFQ Start Date">
                  <span class="input-group-addon range-to">to</span>
                  <input type="text" class="input-sm form-control" name="end_date" placeholder="Guaranteed RFQ End Date">
              </div>
          </div>
          <div class="head-style"></div><br>
  </div>
  <span class="help-block">{{ $errors->first('technology', ':message') }}</span>


  <div class="form-group {{ $errors->first('website', 'has-error')}}">
      <input type="text" class="form-control" name="website" placeholder="Website">
      <span class="help-block">{{ $errors->first('website', ':message') }}</span>   
  </div>
       <div class="form-group {{ $errors->first('technology', 'has-error')}}">                                    
         <select name="technology" class="form-control" required="required">
            <option value="">-- Technology --</option>
            <option value="1">Plant Automation</option>
            <option value="2">Packaging</option>
            <option value="3">Defence</option>
            <option value="4">Pulp&paper</option>
            <option value="5">Steel</option>
            <option value="6">Hospitals</option>
            <option value="7">Sports</option>
            <option value="8">Automotive</option>
            <option value="9">Pharmaceutical</option>
            <option value="10">Plastics</option>
            <option value="11">Broadcast</option>
        </select>
        <span class="help-block">{{ $errors->first('technology', ':message') }}</span>
      </div>
      
      <div class="form-group {{ $errors->first('company_type', 'has-error')}}">                                    
         <select name="company_type" class="form-control" required="required">
            <option value="">-- Company Type --</option>
            <option value="blind">Blind</option>
            <option value="free">Free</option>
            <option value="paid">Paid</option>
            <option value="inactive">Inactive</option>>
        </select>
        <span class="help-block">{{ $errors->first('company_type', ':message') }}</span>
      </div>
      
   <div class="form-group {{ $errors->first('address', 'has-error')}}">
          <textarea  name="address" rows="3" class="form-control"  placeholder="Address"></textarea>                  
          <span class="help-block">{{ $errors->first('address', ':message') }}</span>   
      </div>

      <div class="form-group {{ $errors->first('Booking Details', 'has-error')}}">
          <textarea  name="deals" rows="3" class="form-control"  placeholder="Booking Details"></textarea>                  
          <span class="help-block">{{ $errors->first('deals', ':message') }}</span>   
      </div>

      <div class="form-group {{ $errors->first('No Of Enquiries', 'has-error')}}">
          <input type="text"  name="enquiries" class="form-control"  placeholder="Total Enquiries">                  
          <span class="help-block">{{ $errors->first('enquiries', ':message') }}</span>   
      </div>


      <div class="form-group {{ $errors->first('Year of Inception', 'has-error')}}">
          <input type="text"  name="inception" class="form-control"  placeholder="Year of inception">                  
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
           
        <div>&nbsp;<br/></div>
        
        @livewire('search-compaines')
                      
                           
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
  <script src="{{ asset('public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
@if ($errors->any())
    <!--<script type="text/javascript">-->
    <!--    $(document).ready(function(){-->
    <!--      $('#add_new').click();-->
    <!--       $('#example').DataTable();-->
    <!--    })-->
    <!--</script>-->
@endif
<script type="text/javascript">
    $('.edit-button').on('click',function(){
        $('#data_edit').empty();
        var id =  $(this).attr("data-id");
        var url = "{{ url('company') }}"
        $.ajax({
          url: url + '/' + id +'/edit',
          type: 'get',
          success:function(data){
           $('#data_edit').append(data);
           }
       });
    })
</script>
<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>-->



@endsection