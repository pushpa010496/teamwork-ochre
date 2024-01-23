<form action="{{ route('company.update', $company->id) }}" method="POST" enctype= "multipart/form-data">
 @method('PUT')
 @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel"> {{ $company->comp_name }} </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-6 ">
    <div class="form-group {{ $errors->first('company_name', 'has-error')}}">
      <input type="text" class="form-control" name="company_name" placeholder="Client Name" value="{{ $company->comp_name }}">
      <span class="help-block">{{ $errors->first('company_name', ':message') }}</span>   
    </div>

    <div class="form-group {{ $errors->first('email', 'has-error')}}">
      <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $company->email }}">
      <span class="help-block">{{ $errors->first('email', ':message') }}</span>   
    </div>

    <div class="form-group {{ $errors->first('country', 'has-error')}}">
      <input type="text" class="form-control" name="country" placeholder="Country" value="{{ $company->country }}">
      <span class="help-block">{{ $errors->first('country', ':message') }}</span>   
    </div>

  <div class="form-group {{ $errors->first('technology', 'has-error')}}">
          <select name="technology" class="form-control" required="required">
                  <option value="1" {{ $company->technology == 1 ? 'selected' :'' }}>PlantAutomation</option>
                  <option value="2" {{ $company->technology == 2 ? 'selected' :'' }}>Packaging</option>
                   <option value="3" {{ $company->technology == 3 ? 'selected' :'' }}>Defence</option>
                   <option value="4" {{ $company->technology == 4 ? 'selected' :'' }}>Pulp&paper</option>
                   <option value="5" {{ $company->technology == 5 ? 'selected' :'' }}>Steel</option>
                  <option value="6" {{ $company->technology == 6 ? 'selected' :'' }}>Hospitals</option>
                   <option value="7" {{ $company->technology == 7 ? 'selected' :'' }}>Sports</option>
                   <option value="8" {{ $company->technology == 8 ? 'selected' :'' }}>Automotive</option>
                  <option value="9" {{ $company->technology == 9 ? 'selected' :'' }}>Pharmaceutical</option>
                  <option value="10" {{ $company->technology == 10 ? 'selected' :'' }}>Plastics</option>
                  <option value="11" {{ $company->technology == 11 ? 'selected' :'' }}>Broadcast</option>
             </select>
          
   <!--  <input type="text" class="form-control" name="services" placeholder="services" value="{{ $company->services }}"> -->
    <span class="help-block">{{ $errors->first('technology', ':message') }}</span>   
  </div>

 <div class="form-group {{ $errors->first('type', 'has-error')}}">                                    
            <select name="type" class="form-control" required="required">
              <option value="1" {{ $company->profile_type == 1 ? 'selected' :'' }}>Blind</option>
              <option value="2" {{ $company->profile_type == 2 ? 'selected' :'' }}>Free</option>
              <option value="3" {{ $company->profile_type == 3 ? 'selected' :'' }}>Paid</option>
            </select>
      <span class="help-block">{{ $errors->first('type', ':message') }}</span>
  </div>

</div>

<div class="col-md-6 ">
  <div class="form-group {{ $errors->first('website', 'has-error')}}">
    <input type="text" class="form-control" name="website" placeholder="Contact Name" value="{{ $company->website }}">
    <span class="help-block">{{ $errors->first('website', ':message') }}</span>   
  </div>

  <div class="form-group {{ $errors->first('phone', 'has-error')}}">
    <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $company->phone }}">
    <span class="help-block">{{ $errors->first('phone', ':message') }}</span>   
  </div>

  <div class="form-group {{ $errors->first('services', 'has-error')}}">
          <select name="services" class="form-control" required="required">
               
            <option value="banner" {{ $company->services == 'banner' ? 'selected' :'' }}>Banner</option>
            <option value="slider" {{ $company->services == 'slider' ? 'selected' :'' }}>Slider</option>
            <option value="e-newsletter" {{ $company->services == 'e-newsletter' ? 'selected' :'' }}>E-newsletter</option>
            <option value="event-newsletter" {{ $company->services == 'event-newsletter' ? 'selected' :'' }}>Event newsletter</option>
            <option value="profile" {{ $company->services == 'profile' ? 'selected' :'' }}>Profile</option>
            <option value="seo-smm" {{ $company->services == 'seo-smm' ? 'selected' :'' }}>Seo/smm</option>
          </select>
   <!--  <input type="text" class="form-control" name="services" placeholder="services" value="{{ $company->services }}"> -->
    <span class="help-block">{{ $errors->first('services', ':message') }}</span>   
  </div>


    <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
     <select name="active_flag" class="form-control" required="required">
      <!-- <option value="">-- Select one --</option> -->
      <option value="1" {{ $company->active_flag == 1 ? 'selected' :'' }}>Active</option>
      <option value="0" {{ $company->active_flag == 0 ? 'selected' :'' }}>InActive</option>
    </select>
    <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
  </div>

    <div class="form-group {{ $errors->first('address', 'has-error')}}">
            <textarea  name="address" rows="3" class="form-control"  placeholder="Address" value="{{ $company->address }}">{{ $company->address }}</textarea>                                                
        <span class="help-block">{{ $errors->first('address', ':message') }}</span>   
                                            </div>
      </div>
<div class="col-md-12 ">
  <div class="form-group {{ $errors->first('start_date', 'has-error').' '. $errors->first('due_date', 'has-error')}}">
       <div class="input-daterange input-group" data-provide="datepicker">
      <input type="text" class="input-sm form-control" name="start_date" placeholder="Start Date" value="{{ $company->start_date }}">
        <span class="input-group-addon range-to">to</span>
       <input type="text" class="input-sm form-control" name="end_date" placeholder="Due Date" value="{{ $company->end_date }}"> 
      <span class="help-block">{{ $errors->first('start_date', ':message') }}</span>  
      </div> 
    </div>
</div>
</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
  <button type="submit" class="btn btn-primary">Save Changes</button>
</div>

</form>