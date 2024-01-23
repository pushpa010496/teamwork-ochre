@extends('../layouts/pms')
@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/vendor/multi-select/css/multi-select.css')}}">
<style type="text/css">

</style>
@endsection

@section('content')
@php
$ip = $_SERVER['REMOTE_ADDR'];
$timezone = file_get_contents('https://ipapi.co/'.$ip.'/timezone/');
$timezone_name = ($timezone == 'Undefined' || $timezone == '') ? 'Asia/Kolkata' : $timezone;
@endphp

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
@php
  $profile = \DB::table('company_profiles')->where('company_id',$company->id)->orderBy('created_at', 'DESC')->first();
@endphp

  <div class="row clearfix">
    <div class="col-lg-12">

      {{-- project info card --}}
      <div class="card">


        <div class="header">
          <h2>About Company</h2>
        </div>
        <div class="body">
          <div class="row">
            <!-- <div class="col-lg-12">                          
              <h6>#  {{$company->comp_name}}</h6>
            </div> -->

             <div class="col-lg-4 mt-3">
              <label><strong>Company Name</strong></label>
              <p>{{$company->comp_name}}</p>
            </div>

            <div class="col-lg-4 mt-3">
              <label><strong>Contact Name</strong></label>
              <p>{{$company->contact_person}}</p>
            </div>
              <div class="col-lg-4 mt-3">
              <label><strong>Phone</strong></label>
              <p>{{$company->phone}}</p>
            </div>

            <div class="col-lg-4 mt-3">
              <label><strong>Fax</strong></label>
              <p>{{$company->fax}}</p>
            </div>

            <div class="col-lg-4 mt-3">
              <label><strong>Website</strong></label>
              <p>{{$company->website}}</p>
            </div>

            <div class="col-lg-4 mt-3">
              <label><strong>Email</strong></label>
              <p>{{$company->email}}</p>
            </div>

            <div class="col-lg-4 mt-3">
              <label><strong>Sales Person</strong></label>
              <p>{{ucfirst($company->profile->user->name ?? '')}}</p>
            </div>
             @php
            $user= Auth::user()->roles->first();
            if($user->name == 'admin' || $user->name =='manager'){ 
             @endphp
              <div class="col-lg-4 mt-3">
              <label><strong>Value</strong></label>
              <p>$ {{ucfirst($company->profile->deal_amount ?? '')}}</p>
            </div>

            @php } @endphp                                 
           
            <div class="col-lg-4 mt-3">
              <label><strong>Company Type</strong></label>
              <p>{{ucfirst($company->company_type)}}</p>
            </div>

             <div class="col-lg-4 mt-3">
              <label><strong>Profile Start Date</strong></label>
              <p>{{$profile->start_date ?? ''}}</p>
            </div>
             <div class="col-lg-4 mt-3">
              <label><strong>Profile End Date</strong></label>
              <p>{{$profile->end_date ?? ''}}</p>
            </div>
             <div class="col-lg-4 mt-3">
              <label><strong>Total Enquires</strong></label>
              <p>{{$company->company_enquires ?? ''}}</p>
            </div>
             <div class="col-lg-4 mt-3">
              <label><strong>Year Of Inception</strong></label>
              <p>{{$company->inception ?? ''}}</p>
            </div>
           

            <div class="col-lg-4 mt-3">
              <label><strong>Technology</strong></label>
              <p><p>@if($company->technology_id==1){{'Plant Technology'}}
                    @elseif($company->technology_id==2){{'Packaging'}}
                    @elseif($company->technology_id==3){{'Defence'}}
                    @elseif($company->technology_id==4){{'Pulp&paper'}}
                    @elseif($company->technology_id==5){{'Steel technology'}}
                    @elseif($company->technology_id==6){{'Hospital'}}
                    @elseif($company->technology_id==7){{'Sports'}}
                    @elseif($company->technology_id==8){{'Automotive'}}
                    @elseif($company->technology_id==9){{'Pharma'}}
                    @elseif($company->technology_id==10){{'plastic'}}
                    @elseif($company->technology_id==11){{'Broadcast'}}
                    @else{{'Technology Error'}}@endif</p></p>
            </div>
              <div class="col-lg-12 mt-3">
              <label><strong>Booking Details</strong></label>
              <p style="font-weight:400;color: #b30000">{{$company->deals}}</p>
            </div>
          </div>

           <label><strong>Services Offered:</strong></label>
          <div class="panel-group" id="accordion">
	@php

       $faqs=$company->services;

       $result=explode(",",$faqs);

      
	@endphp
@foreach($result as $index => $cmpinfo)
    <div class="panel panel-default"  >
        <div class="panel-heading" style="background-color: #ffeecc">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $index }}">{{ $cmpinfo }}</a>
            </h4>
        </div>
@php
    $id = Request::segment(2);
    $company = App\Company::find($id);
    $profiles=$company->profiles;
    $banners = $company->banners;
    $newsletters=$company->newslatters;
    $articles=$company->articles;
    $interviews=$company->interviews;
    $emailmarketings=$company->emailmarketings;
    $cmpmarketing=$company->contentmarketings;
    $webinars=$company->webinars;
    $socialmedia=$company->socialmediamarketings;
    $guaranteeds=$company->guaranteeds;
@endphp
        <div id="collapse-{{ $index }}" class="panel-collapse collapse in">
            <div class="panel-body">
            	@if($cmpinfo=="Profile")

                @foreach($profiles as $profile)
                	 <div class="row">
                  <div class="col-lg-3 mt-3">
	              <label><strong>Url</strong></label>
	              <p><a href="{{$profile->profile_url}}" target="__blank">{{$profile->profile_url}}</a></p>
	              </div>

	              <div class="col-lg-3 mt-3">
	              <label><strong>Service</strong></label>
	              <p>{{ucfirst($profile->profile_service)}}</p>
	              </div>

	              <div class="col-lg-3 mt-3">
	              <label><strong>Profile Start Date</strong></label>
	              <p>{{$profile->start_date}}</p>
	              </div>
	             <div class="col-lg-3 mt-3">
	              <label><strong>Profile End Date</strong></label>
	              <p>{{$profile->end_date}}</p>
	            </div>
	       		</div>
	            @endforeach
	            @endif

                @if($cmpinfo=="Banners")
                <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead >
                                            <tr style="background-color:#b30000;font-weight:600px;color:#b30000">
                                                <th>#</th>
                                                <th>Banner Name</th>
                                                <th>Banner Type</th>
                                                <th>Banner start</th>
                                                <th>Banner End</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($banners->count())
                                                @foreach($banners as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->banner_name}}</div></td>
                                                    <td><div class="font-15">{{$value->banner_type}}</div></td>

                                                    <td><div class="font-15">{{$value->start_date}}</div></td>
                                                   <td><div class="font-15">{{$value->end_date}}</div></td>
                                                  
                                                   
                                                </tr>
                                                @endforeach
                                                
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                @endif

                @if($cmpinfo=="Interview")
              <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Interview Name</th>
                                                <th>Interview Type</th>
                                                <th>Interview Url</th>
                                                <th>Interview start</th>
                                                <th>Interview End</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($interviews->count())
                                                @foreach($interviews as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->company->comp_name}}</div></td>
                                                    <td><div class="font-15">{{$value->interview_type}}</div></td>

                                                     <td><div class="font-15">{{$value->interview_url}}</div></td>

                                                    <td><div class="font-15">{{$value->start_date}}</div></td>
                                                   <td><div class="font-15">{{$value->end_date}}</div></td>
                                                  
                                                    <td>

                                                         <a class="btn btn-sm btn-warning" href="{{ route('interview.edit', $value->id) }}">
                                                          <i class="fa fa-edit" aria-hidden="true"></i>
                                                          </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                @endif

                 @if($cmpinfo=="Newsletter")
                  <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                             <tr style="background-color:#b30000;font-weight:600px;color:#b30000">
                                                <th>#</th>
                                                <th>Url</th>
                                                <th>Type</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($newsletters->count())
                                                @foreach($newsletters as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->url}}</div></td>
                                                    <td><div class="font-15">{{$value->type}}</div></td>

                                                    <td><div class="font-15">{{$value->start_date}}</div></td>
                                                   <td><div class="font-15">{{$value->end_date}}</div></td>
                                                  
                                                  
                                                </tr>
                                                @endforeach
                                                
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                @endif

                @if($cmpinfo=="Guaranteed RFQ")
               <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr style="background-color:#b30000;font-weight:600px;color:#b30000">
                                                <th>#</th>
                                                <th>Url</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($guaranteeds->count())
                                                @foreach($guaranteeds as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->guaranteed_url}}</div></td>
                                                   
                                                    <td><div class="font-15">{{$value->guaranteed_start_date}}</div></td>
                                                  <td><div class="font-15">{{$value->guaranteed_end_date}}</div></td>
                                                  
                                                </tr>
                                                @endforeach
                                                
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                @endif


                 @if($cmpinfo=="Social Media Marketing")
                   <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                             <tr style="background-color:#b30000;font-weight:600px;color:#b30000">
                                                <th>#</th>
                                                <th>Facebook Date </th>
                                                <th>Facebook image </th>
                                                <th>Twitter Date</th>
                                                <th>Twitter Image</th>
                                                <th>Linkedin Date</th>
                                                <th>Linkedin Iamge</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($socialmedia->count())
                                                @foreach($socialmedia as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->fb_date}}</div></td>
                                                    <td><div class="font-15">{{$value->fb_image}}</div></td>

                                                    <td><div class="font-15">{{$value->twitter_date}}</div></td>
                                                   <td><div class="font-15">{{$value->twitter_image}}</div></td>

                                                   <td><div class="font-15">{{$value->linkedin_date}}</div></td>
                                                   <td><div class="font-15">{{$value->linkedin_image}}</div></td>
                                                  
                                                </tr>
                                                @endforeach
                                               
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>

                 @endif

                 @if($cmpinfo=="Webinars")
           <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr style="background-color:#b30000;font-weight:600px;color:#b30000">
                                                <th>#</th>
                                                <th>Url</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($webinars->count())
                                                @foreach($webinars as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->webinar_url}}</div></td>
                                                   
                                                    <td><div class="font-15">{{$value->webinar_start_date}}</div></td>
                                                   <td><div class="font-15">{{$value->webinar_end_date}}</div></td>
                                                  
                                                    <td>
                                                       <a class="btn btn-sm btn-warning" href="{{ route('webinars.edit', $value->id) }}">
                                                       <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                                @endforeach
                                                
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                 @endif

                 @if($cmpinfo=="Content Marketing")
<table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                          <tr style="background-color:#b30000;font-weight:600px;color:#b30000">
                                                <th>#</th>
                                                <th>Url</th>
                                                <th>Interview Type</th>
                                                <th>Launch Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($cmpmarketing->count())
                                                @foreach($cmpmarketing as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    
                                                    <td><div class="font-15">{{$value->url}}</div></td>

                                                     <td><div class="font-15">{{$value->content_type}}</div></td>

                                                    <td><div class="font-15">{{$value->launch_date}}</div></td>
                                                   
                                                </tr>
                                                @endforeach
                                                
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                 @endif

                 @if($cmpinfo=="Email Marketing")
                 		<table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                             <tr style="background-color:#b30000;font-weight:600px;color:#b30000">
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($emailmarketings->count())
                                                @foreach($emailmarketings as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->email_url}}</div></td>
                                                   
                                                    <td><div class="font-15">{{$value->email_date}}</div></td>
                                                  
                                                  
                                                </tr>
                                                @endforeach
                                                
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                 @endif

                     @if($cmpinfo=="Article")
                     		 <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr style="background-color:#b30000;font-weight:600px;color:#b30000">
                                                <th>#</th>
                                                <th>Article Name</th>
                                                <th>Article Type</th>
                                                <th>Article Url</th>
                                                <th>Article start</th>
                                                <th>Article End</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($articles->count())
                                                @foreach($articles as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->company->comp_name}}</div></td>
                                                    <td><div class="font-15">{{$value->article_type}}</div></td>

                                                     <td><div class="font-15">{{$value->article_url}}</div></td>

                                                    <td><div class="font-15">{{$value->start_date}}</div></td>
                                                   <td><div class="font-15">{{$value->end_date}}</div></td>
                                                  
                                                    <td>

                                                         <a class="btn btn-sm btn-warning" href="{{ route('article.edit', $value->id) }}">
                                                       <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                     @endif
                 

            </div>
        </div>
    </div>
@endforeach
</div>
<div class="row">
<div class="col-md-6">
  <label><strong>Services Rendered:</strong></label>
  
@foreach($completedservices as $cservice)

<p style="font-weight: 600;color:green;"><i class="fa fa-check-circle" style="color: green;"></i> {{$cservice->type}} - {{date('d-m-Y',strtotime($cservice->start_date))}}</p>

 

@endforeach

</div>

<div class="col-md-6">
   <label><strong>Services Pending:</strong></label>
  @foreach($pendingservices as $pservice)
<p style="font-weight: 600;color: red;"><i class="fa fa-times-circle" style="color:red;"></i> {{$pservice->type}} - {{date('d-m-Y',strtotime($pservice->start_date))}}</p>



@endforeach
  
</div>


</div>

        </div>
      </div>
    </div>







    <div class="col-lg-12">
      <!-- Activities -->
      <div class="card">
        <div class="header">
          <h2>Comments</h2>                            
        </div>
        <div class="body">
          <form action="{{ route('company.addComment',$company) }}" method="post" >
            @csrf()
            <div class="form-group mb-2 {{ $errors->first('message', 'has-error')}}">
              <textarea class="ckeditor form-control" name="message" rows="8" placeholder="Add your comment">{{ old('message') }}</textarea>
              <span class="help-block">{{ $errors->first('message', ':message') }}</span>
            </div>
            <div class=" text-right mb-3">                            
              <button type="submit" class="btn btn-info btn-sm">ADD</button>
            </div>
          </form>
          <div class="max-height-555">
          <ul class="timeline">
            @if(count($company->comments))
            @foreach($company->comments as $comment)
            @php
            $date = $comment->created_at->timezone($timezone_name)->toDateTimeString();
            @endphp
            <li class="timeline-item">
              <div class="timeline-info">
                  <span>{{date('M d, Y', strtotime($comment->created_at->timezone($timezone_name)->toDateTimeString())) }} @ {{date('h:i a', strtotime($date))}}</span>
                <!--<span>{{date('M d, Y', strtotime($comment->created_at->timezone($timezone_name)->toDateTimeString())) }} @ {{date('h:m A', strtotime($comment->created_at->timezone($timezone_name)->toDateTimeString())) }}</span>-->
              </div>
              <div class="timeline-marker"></div>
              <div class="timeline-content">                                       
                <p class="text-muted mt-0 mb-2"># {{ $comment->author['name'] }}</p>
                <p class="font-12">{!! $comment->message !!}</p>
              </div>
            </li>
            @endforeach
            @endif
          </ul>
           </div>
        </div>
      </div>
      <!-- End Activities -->
  </div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{asset('public/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.slimscroll.min.js')}}"></script>
<script type="text/javascript">
   $('#multiselect4-filter,#multiselect3-filter').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });

//Remove Team 
$('.remove-team').on('click',function(){
    var teamId =$(this).attr("data-id");
    var cnf_url = "{{ url('projects')}}"+'/'+ "{{$company->id}}" +'/'+ teamId+'/remove-team';
    $('#team-confirm-remove').attr('href',cnf_url);
});
//Remove Member 
$('.remove-member').on('click',function(){
    var memberId =$(this).attr("data-id");
    var cnf_url = "{{ url('projects')}}"+'/'+ "{{$company->id}}" +'/'+ memberId+'/remove-member';
    $('#member-confirm-remove').attr('href',cnf_url);
});
$('.max-height-555').slimscroll({
        height: '555px',
        size: '5px',
        opacity: 0.2,
        wheelStep : 5,
});
$('.teams-box').slimscroll({
        height: '350px',
        size: '5px',
        opacity: 0.2,
        wheelStep : 5,
});


$(document).ready(function() {
    $('.collapse').on('show.bs.collapse', function() {
        var id = $(this).attr('id');
        $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
        $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
    });
    $('.collapse').on('hide.bs.collapse', function() {
        var id = $(this).attr('id');
        $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
        $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
    });
});
</script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('textarea.ckeditor').ckeditor();
    });
</script>
@endsection