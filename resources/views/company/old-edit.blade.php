@extends('../layouts/pms')
@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Company</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item"><a href="{{route('company.index')}}">Company</a></li>
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
                        
                        <div class="">
                            <div class="" >
                                <div class="body">
                               <form method="post" action="{{route('company.update',$company->id)}}" enctype="multipart/form-data">
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
                                </div>
                            </div><br>

                              <div class="" style="display: none;" id="show_profile">
                                <a href="#">Profile Service</a><br>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="profile_url" placeholder="Profile URL" value="{{$company->profile->profile_url ?? ''}}">
                                     <span class="help-block">{{ $errors->first('profile_url', ':message') }}</span>
                                  </div> 
                                  <div class="form-group">
                                      <select name="profile_service" class="form-control">
                                          <option value="">-- Select Services --</option>
                                          <option value="basic"<?php if($company->profile->profile_service=='basic'){ echo "selected"; } ?> >Basic</option>
                                          <option value="premium"<?php if($company->profile->profile_service=='premium'){ echo "selected"; } ?>>Premium</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <div class="input-daterange input-group" data-provide="datepicker">
                                          <input type="text" class="input-sm form-control" name="profile_start_date" placeholder="Profile Start Date" value="{{$company->profile->profile_start_date}}">
                                          <span class="input-group-addon range-to">to</span>
                                          <input type="text" class="input-sm form-control" name="profile_end_date" placeholder="Profile Due Date" value="{{$company->profile->profile_end_date}}">
                                      </div>
                                  </div>
                                  <div class="head-style"></div>
                              </div><br>
                      @php  $bannertypes = explode(",",$company->banners->banner_type ?? '');
                      @endphp
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
                                          <input class="form-check-input" type="checkbox"  id="leaderboard" value="leaderboard" {{ in_array('leaderboard',$bannertypes) ? ' checked' : '' }} onchange="serviceChanged()">
                                            <span class="slider"></span>
                                        </label>
                                        <label class="form-check-label" >Leaderboard banner</label>
                                      </div>
                                  </div>
                                  <div class="col">
                                       <div class="form-check form-check-inline">
                                          <label class="switch">
                                             <input type="hidden" name="banner_type[]" id="square_value" value="">
                                             <input class="form-check-input" type="checkbox"  id="square" value="square" {{ in_array('square',$bannertypes) ? ' checked' : '' }} onchange="serviceChanged()">
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
                                        <input class="form-check-input" type="checkbox"  id="slider" value="slider" {{ in_array('slider',$bannertypes) ? ' checked' : '' }} onchange="serviceChanged()">
                                        <span class="slider"></span>
                                    </label>
                                    
                                    <label class="form-check-label">Slider Banner</label>
                                  </div>
                                </div>
                                <div class="col">
                                     <div class="form-check form-check-inline">
                                      <label class="switch">
                                        <input type="hidden" name="banner_type[]" value="" id="category_value">
                                       <input class="form-check-input" type="checkbox"  id="category" value="category" {{ in_array('category',$bannertypes) ? ' checked' : '' }} onchange="serviceChanged()">
                                        <span class="slider"></span>
                                      </label>
                                      <label class="form-check-label">Category Banner</label>
                                    </div>
                                </div>
                              </div>
                          </div><br>
                             
                             <div class="form-group" id="show_leaderboard" style="display: none;">
                                <div class="input-daterange input-group" data-provide="datepicker">
                                    <input type="text" class="input-sm form-control" name="" id="leaderboard_start_date" value="" placeholder="Leaderboard  Banner Start Date">
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
                                          <input type="hidden" name="interview_type[]" value="" id="interview_website_value"  onchange="serviceChanged()">
                                          <label class="switch">
                                            <input class="form-check-input" type="checkbox"  id="interview_website" value="website">
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
                                                <input type="text" class="form-control" name="website" placeholder="Website" value="{{$company->website}}">
                                                <span class="help-block">{{ $errors->first('website', ':message') }}</span>   
                                            </div>
                                           <div class="form-group {{ $errors->first('technology', 'has-error')}}">                                    
                                             <select name="technology" class="form-control" required="required">
                                                <option value="">-- Technology --</option>
                                                <option value="1"<?php if($company->technology=='1'){ echo "selected"; } ?>>PlantAutomation</option>
                                                <option value="2"<?php if($company->technology=='2'){ echo "selected"; } ?>>Packaging</option>
                                                <option value="3"<?php if($company->technology=='3'){ echo "selected"; } ?>>Defence</option>
                                                <option value="4"<?php if($company->technology=='4'){ echo "selected"; } ?>>Pulp&paper</option>
                                                <option value="5"<?php if($company->technology=='5'){ echo "selected"; } ?>>Steel</option>
                                                <option value="6"<?php if($company->technology=='6'){ echo "selected"; } ?>>Hospitals</option>
                                                <option value="7"<?php if($company->technology=='7'){ echo "selected"; } ?>>Sports</option>
                                                <option value="8"<?php if($company->technology=='8'){ echo "selected"; } ?>>Automotive</option>
                                                <option value="9"<?php if($company->technology=='9'){ echo "selected"; } ?>>Pharmaceutical</option>
                                                <option value="10"<?php if($company->technology=='10'){ echo "selected"; } ?>>Plastics</option>
                                                <option value="11"<?php if($company->technology=='11'){ echo "selected"; } ?>>Broadcast</option>
                                            </select>
                                            <span class="help-block">{{ $errors->first('technology', ':message') }}</span>
                                          </div>
                                       <div class="form-group {{ $errors->first('address', 'has-error')}}">
                                              <textarea  name="address" rows="3" class="form-control"  placeholder="Address">{{$company->address}}</textarea>                  
                                              <span class="help-block">{{ $errors->first('address', ':message') }}</span>   
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
  <script src="{{ asset('public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<!-- <script type="text/javascript">
   window.addEventListener('load', function() {
        if($('#profile').is(":checked")){
          $("#show_profile").show();
        }else{
          $("#show_profile").hide();
        }
        // check box Banners functionality
        if($('#banners').is(":checked")){
           $("#show_banner").show();
         }else if($('#banners').prop('checked', false)){
           $('#leaderboard').prop('checked', false);
           $('#square').prop('checked', false);
           $('#slider').prop('checked', false);
           $('#category').prop('checked', false);
           $("#show_banner").hide();
           $("#show_square").hide();
           $("#show_slider").hide();
           $("#show_category").hide();
         }else{
          $("#show_banner").hide();
        }

               // check box Banners hide and show
        if($('#leaderboard').is(":checked")){
          $('#leaderboard_value').val('leaderboard');
          $('#leaderboard_start_date').attr('name', 'leaderboard_start_date');
          $('#leaderboard_end_date').attr('name', 'leaderboard_end_date');
          $("#show_leaderboard").show();
        }else{
          $("#show_leaderboard").hide();
          $('#leaderboard_value').val('');
          $('#leaderboard_start_date').attr('name', '');
          $('#leaderboard_end_date').attr('name', ''); 
         }

        if($('#square').is(":checked")) {
           $("#show_square").show()
           $('#square_value').val('square');
            $('#square_start_date').attr('name', 'square_start_date');
          $('#square_end_date').attr('name', 'square_end_date');
        }else{
          $("#show_square").hide();
          $('#square_value').val('');
           $('#square_start_date').attr('name', '');
          $('#square_end_date').attr('name', '');
        }  
          
        if($('#slider').is(":checked")){
          $("#show_slider").show();
          $('#slider_value').val('slider');
           $('#slider_start_date').attr('name', 'slider_start_date');
          $('#slider_end_date').attr('name', 'slider_end_date');
        }else{
          $("#show_slider").hide();
          $('#slider_value').val('');
          $('#slider_start_date').attr('name', '');
          $('#slider_end_date').attr('name', '');
        }

        if($('#category').is(":checked")){
         $("#show_category").show();
          $('#category_value').val('category');
          $('#category_start_date').attr('name', 'category_start_date');
          $('#category_end_date').attr('name', 'category_end_date');
        }else{
          $("#show_category").hide();
          $('#category_value').val('');
          $('#category_start_date').attr('name', '');
          $('#category_end_date').attr('name', '');
        }
  });
</script>
<script type="text/javascript">
   
    function serviceChanged(){
      if($('#profile').is(":checked")){
          $("#show_profile").show();
        }else{
          $("#show_profile").hide();
        }
         // check box Banners functionality
        if($('#banners').is(":checked")){
           $("#show_banner").show();
         }else if($('#banners').prop('checked', false)){
           $('#leaderboard').prop('checked', false);
           $('#square').prop('checked', false);
           $('#slider').prop('checked', false);
           $('#category').prop('checked', false);
           $("#show_banner").hide();
           $("#show_square").hide();
           $("#show_slider").hide();
           $("#show_category").hide();
         }else{
          $("#show_banner").hide();
        }
       // check box Banners hide and show
        if($('#leaderboard').is(":checked")){
          $('#leaderboard_value').val('leaderboard');
          $('#leaderboard_start_date').attr('name', 'leaderboard_start_date');
          $('#leaderboard_end_date').attr('name', 'leaderboard_end_date');
          $("#show_leaderboard").show();
        }else{
          $("#show_leaderboard").hide();
          $('#leaderboard_value').val('');
          $('#leaderboard_start_date').attr('name', '');
          $('#leaderboard_end_date').attr('name', ''); 
         }

        if($('#square').is(":checked")) {
           $("#show_square").show()
           $('#square_value').val('square');
            $('#square_start_date').attr('name', 'square_start_date');
          $('#square_end_date').attr('name', 'square_end_date');
        }else{
          $("#show_square").hide();
          $('#square_value').val('');
           $('#square_start_date').attr('name', '');
          $('#square_end_date').attr('name', '');
        }  
          
        if($('#slider').is(":checked")){
          $("#show_slider").show();
          $('#slider_value').val('slider');
           $('#slider_start_date').attr('name', 'slider_start_date');
          $('#slider_end_date').attr('name', 'slider_end_date');
        }else{
          $("#show_slider").hide();
          $('#slider_value').val('');
          $('#slider_start_date').attr('name', '');
          $('#slider_end_date').attr('name', '');
        }

        if($('#category').is(":checked")){
         $("#show_category").show();
          $('#category_value').val('category');
          $('#category_start_date').attr('name', 'category_start_date');
          $('#category_end_date').attr('name', 'category_end_date');
        }else{
          $("#show_category").hide();
          $('#category_value').val('');
          $('#category_start_date').attr('name', '');
          $('#category_end_date').attr('name', '');
        }  
           // check box Newslatter functionality
          if($('#newsletter').is(":checked")){
             $("#show_newsletter").show();
          }else if($('#newsletter').prop('checked', false)){
             $('#general_banner').prop('checked', false);
             $('#product_banner').prop('checked', false);
             $('#general_sponsorship_banner').prop('checked', false);
             $('#product_sponsorship_banner').prop('checked', false);
             $('#presence').prop('checked', false);
             $("#show_general_banner").hide();
             $("#show_product_banner").hide();
             $("#show_general_sponsorship_banner").hide();
             $("#show_product_sponsorship_banner").hide();
             $("#show_presence").hide();
            $("#show_newsletter").hide();
          }else{
            $("#newsletter").hide();
          }



     // check box Newslatter hide and show
        if($('#general_banner').is(":checked")){
           $("#show_general_banner").show();
            $('#general_banner_value').val('general_banner');
        }else{
          $("#show_general_banner").hide();
           $('#general_banner_value').val('');
        }   
          
        
        if($('#product_banner').is(":checked")){
              $("#show_product_banner").show();
              $('#product_banner_value').val('product_banner');
        }else{
             $("#show_product_banner").hide();
             $('#product_banner_value').val('');
        }   
          
        if($('#general_sponsorship_banner').is(":checked")){
              $("#show_general_sponsorship_banner").show();
              $('#general_sponsorship_banner_value').val('general_sponsorship_banner');
        }else{
             $("#show_general_sponsorship_banner").hide();
              $('#general_sponsorship_banner_value').val('');
        }   
          
        if($('#product_sponsorship_banner').is(":checked")){
               $("#show_product_sponsorship_banner").show();
               $('#product_sponsorship_banner_value').val('product_sponsorship_banner');
        }else{
             $("#show_product_sponsorship_banner").hide();
             $('#product_sponsorship_banner_value').val('');
              $('#product_sponsorship_banner_value').val('');
        }   
         
         if($('#presence').is(":checked")){
               $("#show_presence").show();
               $("#presence_value").val('presence');
         }else{
              $("#show_presence").hide();
              $("#presence_value").val('');
         }   
          
          // check box Article functionality
          if($('#article').is(":checked")){
             $("#show_article").show();
          }else if($('#article').prop('checked', false)){
             $('#website').prop('checked', false);
             $('#article_newsletter').prop('checked', false);
             $("#show_website").hide();
             $("#show_article_newsletter").hide();
             $("#show_article").hide();
          }else{
            $("#show_article").hide();
          }
          if($('#website').is(":checked")){
            $("#show_website").show();
            $('#article_website_value').val('website');
          }else{
            $("#show_website").hide();
            $('#article_website_value').val('');
          } 
         if($('#article_newsletter').is(":checked")){
             $("#show_article_newsletter").show();
             $('#article_newsletter_value').val('newsletter');
         }else{
             $("#show_article_newsletter").hide();
             $('#article_newsletter_value').val('');
         }

        // check box Interview functionality
          if($('#interview').is(":checked")){
             $("#show_interview").show();
          }else if($('#interview').prop('checked', false)){
             $('#interview_website').prop('checked', false);
             $('#interview_newsletter').prop('checked', false);
             $("#show_interview_website").hide();
             $("#show_interview_newsletter").hide();
             $("#show_interview").hide();
          }else{
            $("#show_interview").hide();
          }
          if($('#interview_website').is(":checked")){
            $("#show_interview_website").show();
            $('#interview_website_value').val('website');
          }else{
            $("#show_interview_website").hide();
            $('#interview_website_value').val('');
          }
         if($('#interview_newsletter').is(":checked")){
              $("#show_interview_newsletter").show();
              $('#interview_newsletter_value').val('newsletter');
         }else{
             $("#show_interview_newsletter").hide();
             $('#interview_newsletter_value').val('');
         } 
     // check box Interview functionality
        if($('#email').is(":checked"))   
          $("#show_email").show();
        else
          $("#show_email").hide();
        // check box Content Marketing functionality
        if($('#content').is(":checked")){
            $("#show_content").show();
        }else if($('#content').prop('checked', false)){
           $('#product_launch').prop('checked', false);
           $('#press_releases').prop('checked', false);
           $('#content_interviews').prop('checked', false);
           $('#white_papers').prop('checked', false);
           $('#casestudy').prop('checked', false);
           $("#show_product_launch").hide();
           $("#show_press_releases").hide();
           $("#show_content_interviews").hide();
           $("#show_white_papers").hide();
           $("#show_casestudy").hide();
           $("#show_content").hide();
        }else{
          $("#show_content").hide();
        }
        // check box Content Marketing hide and show
        if($('#product_launch').is(":checked")){
          $("#show_product_launch").show();
          $("#product_launch_value").val('product_launch');
        }else{
           $("#show_product_launch").hide();
           $("#product_launch_value").val('');
        }   
        if($('#press_releases').is(":checked")){
            $("#show_press_releases").show();
            $("#press_releases_value").val('press_releases');
        }else{
            $("#show_press_releases").hide();
            $("#press_releases_value").val('');
        }
          
        
          

        if($('#content_interviews').is(":checked")){
            $("#show_content_interviews").show();
             $("#interviews_value").val('interviews');
        }else{
            $("#show_content_interviews").hide();
             $("#interviews_value").val('');
        }   
          
        
         

        if($('#white_papers').is(":checked")){
           $("#show_white_papers").show();
            $("#white_papers_value").val('white_papers');
        }else{
          $("#show_white_papers").hide();
           $("#white_papers_value").val('');
        }   
          
        
          

        if($('#casestudy').is(":checked")){
            $("#show_casestudy").show();
            $("#casestudy_value").val('casestudy');
        }else{
           $("#show_casestudy").hide();
          $("#casestudy_value").val('');
        }   
         
        
          

        // check box Webinars functionality
        if($('#webinars').is(":checked"))   
          $("#show_webinars").show();
        else
          $("#show_webinars").hide();

         // check box Social Media Marketing functionality
        if($('#socialmedia').is(":checked"))   
          $("#show_socialmedia").show();
        else
          $("#show_socialmedia").hide();

         // check box Guaranteed RFQ functionality
        if($('#guaranteed').is(":checked"))   
          $("#show_guaranteed").show();
        else
          $("#show_guaranteed").hide();
 
    }
</script>
<script>
  $(document).ready(function () {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $(add_button).click(function (e) {
      e.preventDefault();
      if (x < max_fields) {
        x++;
        var data =
          `<div>
          <div class="srinivas">
              <div class="form-group">     
                <input type="text" class="form-control" name="email_url[]" placeholder="Enter Email Url" value="{{ old('url') }}">
              </div>
              <div class="form-group" >
                <input type="date" class="form-control"  name="email_date[]" placeholder="Email Launch  Date">
              </div>
          </div>`;
        $(wrapper).append(data +
          '<a href="#" class="remove_field" ><i class="fa fa-remove"></i></a></div>'
        ); //add input box
        $('#noofprices').val(x);
      }
    });
    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
      e.preventDefault();
      $(this).parent('div').remove();
      x--;
      $('#noofprices').val(x);
    })
  });
</script> -->
@endsection