@extends('../layouts/pms')
@section('content')
@php
$tech = App\Technology::find(Request::segment(2));
@endphp
<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <!-- <h1>Company</h1> -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
           <!--  <li class="breadcrumb-item"><a href="#">Ochre Media</a></li> -->
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('webportals')}}">Webportals</a></li>
            <li class="breadcrumb-item"><a href="#">{{$tech->technologie}}</a></li>
          </ol>
        </nav>
      </div>  
  <div class="col-md-6 col-sm-12 text-right">
        <a href="{{ url('companyinfo') }}" class="btn btn-sm btn-primary" title=""><< Companies</a>

        

      </div>

    </div> 
   
    <br>    
    <div class="row clearfix">
      <div class="col-md-12">
        @php
            $user= Auth::user()->roles->first();
            if($user->name == 'admin' || $user->name =='manager'){ 
        @endphp
            
            <input type="hidden" name="" class="dealamt" value="{{$user->designation_id}}">
             <div class="row">
          <div class="col-md-4">
            <div class="form-group">      
              <select name="fiscalyear" id="fiscalyear" onchange="return techCompanyFilter()" class="form-control" style="border-color:#F95700FF;border-radius: 25px">
                <option value="" >Select Fiscal Year </option>
                 <option value="2019-2020">2019-2020</option>
                <option value="2020-2021">2020-2021</option>
                <option value="2021-2022">2021-2022</option>
                <option value="2022-2023">2022-2023</option>
                <option value="2023-2024">2023-2024</option>
                <option value="2024-2025">2024-2025</option>
              </select>
            </div> 
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <select name="user_id" id="user_id" onchange="return techCompanyFilter()" class="form-control" style="border-color:#F95700FF;border-radius: 25px">
                <option value="">Select sales person</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                
              </select>
            </div> 
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <select name="company" id="company" onchange="return techCompanyFilter()" class="form-control" style="border-color:#F95700FF;border-radius: 25px">
                <option value="">Select Company </option>
                @foreach($technology as $tech)
                <option value="{{$tech->id}}">{{$tech->comp_name}}</option>
                @endforeach()
              </select>
            </div> 
          </div>

        </div>
      
  @php } @endphp
       
      </div>
    </div>
  </div>
</div>


            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="e_departments">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead >
                                            <tr style="color: #e8a920;font-weight: 600">
                                                <th>#</th>
                                                <th>Company Name</th> 
                                                <th>Services</th> 
                                                <!--<th>Type</th> -->
                                                <th>Sales person</th>
                                                <th>Fiscal Year</th>
                                                 @php
                                                  $user= Auth::user()->roles->first();
                                                  if($user->name == 'admin' || $user->name =='manager'){ 
                                              @endphp
                                               <th class="deal">Value</th>
                                                    <input type="hidden" name="" class="dealamt" value="{{$user->designation_id}}">
                                             @php } @endphp
                                               
                                            </tr>
                                        </thead>
                                        <tbody class="result">
                                            @if($data)
                                                @foreach($data as $key => $value)
                                                <tr >
                                                    <td>{{++$key}}</td>
                                                    <td>
                                                      <div class="font-15"><a href="{{ route('company.show',$value->company->id) }}">
                                                      {{$value->company->comp_name}}</a>
                                                      </div>
                                                    </td>
                                                    @if($value->company->services)
                                                    <td>
                                                          <?php foreach(explode(',',$value->company->services) as $ser) {?>
                                                          <a class="btn btn-primary" href="http://teamwork.ochre-media.com/{{strtolower($ser)}}/{{$value->id}}" role="button">{{$ser}}</a>
                                                          <?php } ?>
                                                    </td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <!--<td>{{$value->company->company_type}}</td>-->
                                                    <td><div class="font-15">{{$value->user ? $value->user->name :''}}</div></td>
                                                    <td><div class="font-15">{{$value->fiscal_year}}</div></td>
                                                        @php $user= Auth::user()->roles->first(); if($user->name == 'admin' || $user->name =='manager'){ @endphp
                                                    <td class="">
                                                      <div class="font-15">{{$value->deal_amount}}</div>
                                                    </td>
                                                     @php } @endphp                                 
                                                </tr>
                                                 @endforeach
                                                  @else
                                                      <tr>
                                                        <td colspan="5" id="norecord">No Records found</td>
    
                                                    </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add_new').click();
        })
    </script>
@endif

<script type="text/javascript">
  function techCompanyFilter() {
      
      var fiscalyear=$('#fiscalyear').val();
      var user = $('#user_id').val();
      var company = $('#company').val();
      var technology="{{ Request::segment(2) }}"; 
      var designation=$(".dealamt").val();
        $('.result').empty();
       let x = 1;
        $.ajax({
            url: "{{route('filter-techno-companies')}}",
            type: "POST",
            data:{
              'year':fiscalyear,'technology':technology,'user':user,'company':company,"_token": "{{ csrf_token() }}"
            },
            success: function (data) {
              $('.result').append(data);
            },
         });

}  
</script>
@endsection