@extends('../layouts/pms')
@section('content')

        <div class="container-fluid">
            <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
       <!--  <h1>Company</h1> -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
            <li class="breadcrumb-item "><a href="{{ url('companyinfo') }}">Company</a></li>
          
          </ol>
        </nav>
      </div>            
      <div class="col-md-6 col-sm-12 text-right">
        <a href="{{ url('companyinfo') }}" class="btn btn-sm btn-primary" title=""><< Companies</a>

        

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
                                              <input class="form-check-input" type="checkbox" name="service[]" id="productlunch" value="productlaunch" {{ in_array('productlaunch',$values) ? ' checked' : '' }} onchange="serviceChanged()">
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
                        <option value="rejected"<?php if($company->rejected=='rejected'){ echo "selected"; } ?>>Declined</option>
                        <option value="inactive"<?php if($company->company_type=='inactive'){ echo "selected"; } ?>>Inactive</option>
                    </select>
                    <span class="help-block">{{ $errors->first('company_type', ':message') }}</span>
                  </div>

                <div class="form-group {{ $errors->first('deals', 'has-error')}}">
                      <textarea  name="deals" rows="5" class="form-control"  placeholder="Booking Details">{{$company->deals}}</textarea>                  
                      <span class="help-block">{{ $errors->first('data', ':message') }}</span>  
                </div>

      <div class="form-group {{ $errors->first('No Of Enquiries', 'has-error')}}">
          <input type="text"  name="enquiries" class="form-control"  value="{{$company->company_enquires ?? 0}}" readonly>                  
          <span class="help-block">{{ $errors->first('enquiries', ':message') }}</span>   
      </div>
       <div class="form-group {{ $errors->first('Year of inception', 'has-error')}}">
          <input type="text"  name="inception" class="form-control"  value="{{$company->inception}}" placeholder="Year of inception">                  
          <span class="help-block">{{ $errors->first('inception', ':message') }}</span>   
      </div>

  </div>

      <div class="col-12 text-center">
          <button type="submit" class="btn btn-primary">UPDATE</button>
           <a href="{{url('clients')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
      </div>
    </div>
  </form>
  </div>
</div>
 <!--<div class="col-md-12">-->
 <!--   {!! Form::open(['method'=>'GET','url'=>'company','role'=>'search'])  !!}-->
 <!--       <div id="custom-search-input">-->
 <!--         <div class="input-group col-md-12 pull-right">-->
 <!--             <input type="text" class="search-query form-control" placeholder="Search" name="search" />-->
 <!--             <span class="input-group-btn">-->
 <!--                 <button class="btn btn-danger" type="button">-->
 <!--                     <i class="fa fa-search" aria-hidden="true"></i>-->

 <!--                 </button>-->
 <!--             </span>-->
 <!--         </div>-->
 <!--       </div>-->
 <!--  {!! Form::close() !!}-->
 <!-- </div>-->
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