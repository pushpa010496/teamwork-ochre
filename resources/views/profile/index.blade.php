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
                        <ul class="nav nav-tabs2">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_profile">Profile</a></li>
                         @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
            
                                  <li class="nav-item">
                                    <a class="nav-link" id="add_new" data-toggle="tab" href="#e_add">Add</a>
                                </li>    
                                @endif        
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                              
                                  {!! Form::open(array('route' => 'profile.store','files'=>true)) !!}
                
                                    <div class="row clearfix">
                                           <div class="col-md-6 ">
                                             <input type="hidden" name="company" value="{{Request::segment(2)}}" >
                                            <div class="form-group {{ $errors->first('start_date', 'has-error')}}">
                                                <label>Profile Url</label>
                                                <input type="text" class="form-control" name="profile_url" placeholder="Profile Url" value="{{ old('profile_url') }}" required="required">
                                                <span class="help-block">{{ $errors->first('start_date', ':message') }}</span>   
                                            </div>
                                        </div>

                                         <div class="col-md-6 ">

                                            <div class="form-group {{ $errors->first('start_date', 'has-error')}}">
                                                <label>Start Date</label>
                                                <input type="date" class="form-control" name="start_date" placeholder="Start Date" value="{{ old('start_date') }}" required="required">
                                                <span class="help-block">{{ $errors->first('start_date', ':message') }}</span>   
                                            </div>
                                        </div>

                                         <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('end_date', 'has-error')}}">
                                                <label>End Date</label>
                                                <input type="date" class="form-control" name="end_date" placeholder="End Date" value="{{ old('end_date') }}" required="required">
                                                <span class="help-block">{{ $errors->first('end_date', ':message') }}</span>   
                                            </div>
                                        </div>


                                       
                                        

                                       

                                         <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('profile_service', 'has-error')}}">
                                                <label>Profile Type</label>
                                                <select class="form-control" name="profile_service" required="required">
                                                    <option>Select Profile Type</option>
                                                    <option value="basic">Basic</option>
                                                    <option value="premium">Premium</option>
                                                  
                                                </select>
                                                <span class="help-block">{{ $errors->first('profile_service', ':message') }}</span>   
                                            </div>
                                        </div>
  <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('end_date', 'has-error')}}">
                                                <label>Deal Value</label>
                                                <input type="text" class="form-control" name="deal_amount" placeholder="Amount" value="{{ old('deal_value') }}" required="required">
                                                <span class="help-block">{{ $errors->first('deal_value', ':message') }}</span>   
                                            </div>
                                        </div>


                                        <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('end_date', 'has-error')}}">
                                                <label>Fiscal Year</label>
                                              <!--   <input type="text" class="form-control" name="" placeholder="2019-2020" value="{{ old('fiscal_year') }}" required="required"> -->

                                                 <select class="form-control" name="fiscal_year" required="required">
                                                    <option>Select</option>
                                                    <option value="2019-2020">2019-20</option>
                                                    <option value="2020-2021">2020-21</option>
                                                    <option value="2021-2022">2021-22</option>
                                                    <option value="2022-2023">2022-23</option>
                                                    <option value="2023-2024">2023-24</option>
                                                    <option value="2024-2025">2024-25</option>
                                                    <option value="2025-2026">2025-26</option>
                                                    <option value="2026-2027">2026-27</option>
                                                    <option value="2027-2028">2027-28</option>
                                                    <option value="2028-2029">2028-29</option>
                                                    <option value="2029-2030">2029-30</option>
                                                    <option value="2030-2031">2030-31</option>
                                                    <option value="2031-2032">2031-32</option>
                                                    <option value="2032-2033">2032-33</option>
                                                  
                                                </select>


                                                <span class="help-block">{{ $errors->first('fiscal_year', ':message') }}</span>   
                                            </div>
                                        </div>
                                       
                                         <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('sale_person', 'has-error')}}">            <label>Sales Person</label>                          
                                                {!! Form::select('sale_person',$users, null,['id'=>'','class' => 'form-control','placeholder'=>'Sales person'] ) !!}
                                              <span class="help-block">{{ $errors->first('sale_person', ':message') }}</span>
                                            </div>
                                        </div>
                                              

                                               <div class="col-md-6 ">
                                            <div class="form-group {{ $errors->first('end_date', 'has-error')}}">
                                                <label>Profile Category</label>
                                              <!--   <input type="text" class="form-control" name="" placeholder="2019-2020" value="{{ old('fiscal_year') }}" required="required"> -->

                                                 <select class="form-control" name="tech_category" required="required">
                                                    <option>Select</option>
                                                    <option value="web">Web</option>
                                                    <option value="print">Print</option>
                                                    
                                                </select>


                                                <span class="help-block">{{ $errors->first('fiscal_year', ':message') }}</span>   
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                          
                                             <a href="{{url('department')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
                                        </div>
                                    </div>
                                         </form>
                                </div>
                            </div>
                            <div class="tab-pane show active" id="e_profile">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Profile Name</th>
                                                <th>Profile Service</th>
                                                <th>Profile Url</th>
                                                <th>Profile start</th>
                                                <th>Profile End</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($profile->count())
                                                @foreach($profile as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                     <td><div class="font-15">{{$value->company->comp_name}}</div></td>
                                                    <td><div class="font-15">{{$value->profile_service}}</div></td>

                                                     <td><div class="font-15">{{$value->profile_url}}</div></td>

                                                    <td><div class="font-15">{{$value->start_date}}</div></td>
                                                   <td><div class="font-15">{{$value->end_date}}</div></td>
                                                   @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                                                    <td>
                                                         <a class="btn btn-sm btn-warning" href="{{ route('profile.edit', $value->id) }}">
                                                           <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                 {{ $profile->links() }}
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

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

@section('scripts')
@if ($errors->any())
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add_new').click();
        })
    </script>
@endif


<script type="text/javascript">
    $('.edit-button').on('click',function(){
        $('#data_edit').empty();
        var id =  $(this).attr("data-id");
        var url = "{{ url('banneredit') }}"
        $.ajax({
          url: url + '/' + id +'/edit',
          type: 'get',
          success:function(data){
           $('#data_edit').append(data);

           }
       });

    })
 
</script>
@endsection