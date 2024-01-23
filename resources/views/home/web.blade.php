@extends('../layouts/pms')

<style type="text/css">
    .finalresult{
       display:none !important;
        background-color:#a8327b;

    }
    .active
    {
        display: block;
    }


</style>
@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                             <h1 class="text-danger display-4">Ochre Media Customer Relationship Management</h1>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    </div>
                </div>
            </div>
            
<div class="row clearfix oncres" id="oncres"></div>
<div class="row clearfix result" id="result">
    @php
     $plant = \App\Technology::find(1);
     $package = \App\Technology::find(2);
     $defence = \App\Technology::find(3);
     $pulp = \App\Technology::find(4);
     $steel = \App\Technology::find(5);
     $hospitals  = \App\Technology::find(6);
     $sports = \App\Technology::find(7);
     $automotive = \App\Technology::find(8);
     $pharma = \App\Technology::find(9);
     $plastic = \App\Technology::find(10);
     $broadcast = \App\Technology::find(11);
     @endphp
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$plant->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
               <?php
                   $user= Auth::user()->roles->first();
                  if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                  <a href="{{url('technocompanies',1)}}" style="font-size:20px;">{{'$ '.$plant->company_profiles->sum('deal_amount')}}</a>
                <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[1,'blind'])}}">{{companyReports('1','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[1,'free'])}}">{{companyReports('1','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[1,'paid'])}}">{{companyReports('1','paid')}}</a></span></div>
                <div class="font-15">In Ative <span class="float-right"><a href="{{url('companyinfo',[1,'inactive'])}}">{{companyReports('1','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('1',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$package->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
                           <?php
                               $user= Auth::user()->roles->first();
                              if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                              <a href="{{url('technocompanies',2)}}" style="font-size:20px;">{{'$ '.$package->company_profiles->sum('deal_amount')}}</a>
                              <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[2,'blind'])}}">{{companyReports('2','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[2,'free'])}}">{{companyReports('2','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[2,'paid'])}}">{{companyReports('2','paid')}}</a></span></div>
                <div class="font-15">In Ative <span class="float-right"><a href="{{url('companyinfo',[1,'inactive'])}}">{{companyReports('2','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('2',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$defence->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
               <?php
                   $user= Auth::user()->roles->first();
                  if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                  <a href="{{url('technocompanies',3)}}" style="font-size:20px;">{{'$ '.$defence->company_profiles->sum('deal_amount')}}</a>
                  <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[3,'blind'])}}">{{companyReports('3','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[3,'free'])}}">{{companyReports('3','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[3,'paid'])}}">{{companyReports('3','paid')}}</a></span></div>
                <div class="font-15">InActive <span class="float-right"><a href="{{url('companyinfo',[3,'inactive'])}}">{{companyReports('3','inactive')}}</a></span></div>

               <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
      		       <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('3',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$pulp->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
                           <?php
                               $user= Auth::user()->roles->first();
                              if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                              <a href="{{url('technocompanies',4)}}" style="font-size:20px;">{{'$ '.$pulp->company_profiles->sum('deal_amount')}}</a>
                              <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[4,'blind'])}}">{{companyReports('4','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[4,'free'])}}">{{companyReports('4','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[4,'paid'])}}">{{companyReports('4','paid')}}</a></span></div>
                <div class="font-15">InActive <span class="float-right"><a href="{{url('companyinfo',[4,'inactive'])}}">{{companyReports('4','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('4',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$steel->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
                           <?php
                               $user= Auth::user()->roles->first();
                              if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin' || $user->name =='Sub Admin') {  ?>
                              <a href="{{url('technocompanies',5)}}" style="font-size:20px;">{{'$ '.$steel->company_profiles->sum('deal_amount')}}</a>
                              <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[5,'blind'])}}">{{companyReports('5','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[5,'free'])}}">{{companyReports('5','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[5,'paid'])}}">{{companyReports('5','paid')}}</a></span></div>
                <div class="font-15">In Ative <span class="float-right"><a href="{{url('companyinfo',[5,'inactive'])}}">{{companyReports('5','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('5',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$hospitals->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
                           <?php
                               $user= Auth::user()->roles->first();
                              if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                              <a href="{{url('technocompanies',6)}}" style="font-size:20px;">{{'$ '.$hospitals->company_profiles->sum('deal_amount')}}</a>
                              <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[6,'blind'])}}">{{companyReports('6','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[6,'free'])}}">{{companyReports('6','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[6,'paid'])}}">{{companyReports('6','paid')}}</a></span></div>
                <div class="font-15">InActive <span class="float-right"><a href="{{url('companyinfo',[6,'inactive'])}}">{{companyReports('6','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('6',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
    
     <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$sports->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
                           <?php
                               $user= Auth::user()->roles->first();
                              if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                              <a href="{{url('technocompanies',7)}}" style="font-size:20px;">{{'$ '.$sports->company_profiles->sum('deal_amount')}}</a>
                              <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[7,'blind'])}}">{{companyReports('7','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[7,'free'])}}">{{companyReports('7','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[7,'paid'])}}">{{companyReports('7','paid')}}</a></span></div>
                <div class="font-15">InActive <span class="float-right"><a href="{{url('companyinfo',[7,'inactive'])}}">{{companyReports('7','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('7',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
    
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$automotive->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
                           <?php
                               $user= Auth::user()->roles->first();
                              if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                              <a href="{{url('technocompanies',8)}}" style="font-size:20px;">{{'$ '.$automotive->company_profiles->sum('deal_amount')}}</a>
                              <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[8,'blind'])}}">{{companyReports('8','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[8,'free'])}}">{{companyReports('8','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[8,'paid'])}}">{{companyReports('8','paid')}}</a></span></div>
                <div class="font-15">InActive <span class="float-right"><a href="{{url('companyinfo',[9,'inactive'])}}">{{companyReports('8','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('8',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
   
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$pharma->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
                           <?php
                               $user= Auth::user()->roles->first();
                              if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                              <a href="{{url('technocompanies',9)}}" style="font-size:20px;">{{'$ '.$pharma->company_profiles->sum('deal_amount')}}</a>
                              <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[9,'blind'])}}">{{companyReports('9','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[9,'free'])}}">{{companyReports('9','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[9,'paid'])}}">{{companyReports('9','paid')}}</a></span></div>
                <div class="font-15">InActive <span class="float-right"><a href="{{url('companyinfo',[9,'inactive'])}}">{{companyReports('9','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('9',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
    	<div class="card">
    		<div class="body">
    			<h6 class="mb-4">{{$plastic->technologie}}</h6>
    		      <div class="card-value text-info float-left mr-3 pr-2 border-right" style="height: 5rem">
                           <?php
                               $user= Auth::user()->roles->first();
                              if($user->name == 'admin' || $user->name =='manager' || $user->name =='sub-admin') {  ?>
                              <a href="{{url('technocompanies',10)}}" style="font-size:20px;">{{'$ '.$plastic->company_profiles->sum('deal_amount')}}</a>
                              <?php  } ?>
    		      </div>
    		       <div class="font-15">Blind <span class="float-right"><a href="{{url('companyinfo',[10,'blind'])}}">{{companyReports('10','blind')}}</a></span></div>
    		       <div class="font-15">Free <span class="float-right"><a href="{{url('companyinfo',[10,'free'])}}">{{companyReports('10','free')}}</a></span></div>
    		       <div class="font-15">Paid <span class="float-right"><a href="{{url('companyinfo',[10,'paid'])}}">{{companyReports('10','paid')}}</a></span></div>
                <div class="font-15">InActive <span class="float-right"><a href="{{url('companyinfo',[10,'inactive'])}}">{{companyReports('10','inactive')}}</a></span></div>
    		       <div class="d-flex  pt-2">
                 <div class="font-15 w-50">{{ $year}}</div>
                 <div class="font-15 w-50 text-right"><p style="display:inline; padding-top: 4px;border-top: 2px solid #007bff">{{ companyCount('10',['blind','free','paid'])}}</p></div>
               </div>
    		</div>
    	</div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    function techCompanyFiscalYearFilter(){
        var year = $('#fiscalyear').val();
        var result = [];
            $.ajax({
            type: "POST",
            url: "{{route('techno-fiscal-year-filter')}}",
            data: {'year':year,"_token": "{{ csrf_token() }}"}, 
            dataType:"json",
            success: function(data){
                //alert(data.success);
                 $("#result").addClass('finalresult');
                  $(".oncres").html('');
               $.each(data, function(key, value) {
                       var url="{{url('technocompanies','')}}"+"/"+value.id;
                            $(".oncres").append(
                            '<div class="col-lg-3 col-md-6" id="ravi">'+
                            '<div class="card">'+
                            '<div class="body">'+
                            '<div class="d-flex align-items-center">'+
                            '<div class="icon-in-bg bg-indigo text-white rounded-circle">'+
                            
                                '<a href='+url+' style="color:#fff;font-weight:500">'+value.company+'</a></div>'+
                            '<div class="ml-4">'+
                            '<span style="color:#ffc107;font-weight:500">'+ value.technology +'</span>'+
                            '<br>'+
                            '<span class="mb-0 font-weight-medium" style="color:#b30000;font-weight:700">'+value.year+'</span>'+
                            '<h4 class="mb-0 font-weight-medium" style="color: #007bff">'+value.dealvalue+'</h4>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'
                        );
               });
            }
        });
    }
</script>>
@endsection