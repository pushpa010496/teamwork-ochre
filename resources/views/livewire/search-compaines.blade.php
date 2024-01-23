<div>
    @php
    $techno = \Request::segment(2);
    @endphp
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <select name="technology" id="technology" wire:model="technology" class="form-control" style="border-color:#F95700FF;border-radius: 25px">
            <option value="">Select Technology</option>
            @foreach($technologies as $tech)
            <option value="{!! $tech->id !!}"  wire:key="{{$tech->id}}"  {{ $tech->id == $techno ? 'selected' : ''}} > {{$tech->technologie}} </option>
            @endforeach
          </select>
        </div> 
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <select name="companytype" id="companytype"  wire:model="companytype" class="form-control" style="border-color:#F95700FF;border-radius: 25px">
            <option value="">Select Company Type </option>
            @foreach($companytypes as $type)
            <option value="{{$type->type}}">{{$type->company}}</option>
            @endforeach
          </select>
        </div> 
      </div>
      
      <div class="col-md-4">
        <div class="form-group">
          <input type="text" name="company" id="company" wire:model="company" class="form-control" style="border-color:#F95700FF;border-radius: 25px" placeholder="Search Company">
        </div> 
      </div>
      
   </div>
    <div class="tab-pane show active" id="e_departments">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Company Name</th> 
                                                <th>Technology</th>
                                                <th>Company Type</th>
                                                <th>Enquires</th>
                                                <th>Services</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <tbody id="filter-results">
                                            @if($companies->count())
                                                @foreach($companies as $key => $value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>
                                                        <div class="font-15">
                                                           {{$value->comp_name}}
                                                         </div>
                                                    </td>
                                                    <td>
                                                         @if($value->technology_id==1){{'Plant Technology'}}
                                                          @elseif($value->technology_id==2){{'Packaging'}}
                                                          @elseif($value->technology_id==3){{'Defence'}}
                                                          @elseif($value->technology_id==4){{'Pulp&paper'}}
                                                          @elseif($value->technology_id==5){{'Steel'}}
                                                          @elseif($value->technology_id==6){{'Hospital'}}
                                                          @elseif($value->technology_id==7){{'Sports'}}
                                                          @elseif($value->technology_id==8){{'Automotive'}}
                                                          @elseif($value->technology_id==9){{'Pharma'}}
                                                          @elseif($value->technology_id==10){{'plastic'}}
                                                           @elseif($value->technology_id==11){{'Broadcast'}}
                                                          @else{{'Technology Error'}}@endif
                                                    </td>
                                                    <td>{{ucfirst($value->company_type)}}</td>
                                                    <td>{{$value->company_enquires ?? 0}}</td>
                                                      @if($value->services)
                                                    <td>
                                                          <?php foreach(explode(',',$value->services) as $ser) {?>
                                                          <a class="btn btn-primary" href="http://teamwork.ochre-media.com/{{strtolower($ser)}}/{{$value->id}}" role="button">{{$ser}}</a>
                                                          <?php } ?>
                                                    </td>
                                                      @else
                                                    <td></td>
                                                      @endif
                                                    <td>
                                                       @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('sub-admin'))
                                                       <button type="button" class="btn btn-sm btn-default edit-button" title="Edit">
                                                            <a href="http://teamwork.ochre-media.com/companies/{{$value->id}}/edit"><i class="fa fa-edit"></i></a>
                                                        </button>
                                                        @endif
                                                       <button type="button" class="btn btn-sm btn-default edit-button" title="View">
                                                            <a href="http://teamwork.ochre-media.com/companies/{{$value->id}}"><i class="fa fa-eye"></i></a>
                                                        </button>
                                                         @if (Auth::user()->can('client_delete'))
                                                        @endif                                         
                                                    </td>
                                                </tr>
                                                @endforeach
                                                 
                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                            {{ $companies->links() }}
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
</div>
<script>
    window.addEventListener('load', function() {
    callback()
    });
</script>
