<form action="{{ route('clients.update', $client->id) }}" method="POST" enctype= "multipart/form-data">
 @method('PUT')
 @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel"> {{ $client->client_name }} </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-6 ">
    <div class="form-group {{ $errors->first('client_name', 'has-error')}}">
      <input type="text" class="form-control" name="client_name" placeholder="Client Name" value="{{ $client->client_name }}">
      <span class="help-block">{{ $errors->first('client_name', ':message') }}</span>   
    </div>

    <div class="form-group {{ $errors->first('email', 'has-error')}}">
      <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $client->email }}">
      <span class="help-block">{{ $errors->first('email', ':message') }}</span>   
    </div>

    <div class="form-group {{ $errors->first('country', 'has-error')}}">
      <input type="text" class="form-control" name="country" placeholder="Country" value="{{ $client->country }}">
      <span class="help-block">{{ $errors->first('country', ':message') }}</span>   
    </div>

  <!--   <div class="form-group {{ $errors->first('fax', 'has-error')}}">
      <input type="text" class="form-control" name="fax" placeholder="Fax" value="{{ $client->fax }}">
      <span class="help-block">{{ $errors->first('fax', ':message') }}</span>   
    </div> -->



</div>

<div class="col-md-6 ">
  <div class="form-group {{ $errors->first('contact_name', 'has-error')}}">
    <input type="text" class="form-control" name="contact_name" placeholder="Contact Name" value="{{ $client->contact_name }}">
    <span class="help-block">{{ $errors->first('contact_name', ':message') }}</span>   
  </div>

  <div class="form-group {{ $errors->first('phone', 'has-error')}}">
    <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $client->phone }}">
    <span class="help-block">{{ $errors->first('phone', ':message') }}</span>   
  </div>

  <div class="form-group {{ $errors->first('website', 'has-error')}}">
    <input type="text" class="form-control" name="website" placeholder="Website" value="{{ $client->website }}">
    <span class="help-block">{{ $errors->first('website', ':message') }}</span>   
  </div>


    <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
     <select name="active_flag" class="form-control" required="required">
      <!-- <option value="">-- Select one --</option> -->
      <option value="1" {{ $client->active_flag == 1 ? 'selected' :'' }}>Active</option>
      <option value="0" {{ $client->active_flag == 0 ? 'selected' :'' }}>InActive</option>
    </select>
    <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
  </div>
</div>
<!-- <div class="col-12">
    <div class="form-group {{ $errors->first('address', 'has-error')}}">
    <textarea  name="address" rows="3" class="form-control"  placeholder="Address">{{ $client->address }}</textarea>                                                
    <span class="help-block">{{ $errors->first('address', ':message') }}</span>   
  </div>
</div> -->


</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
  <button type="submit" class="btn btn-primary">Save Changes</button>
</div>

</form>