<form action="{{ route('enquiry.update', $enquiry->id) }}" method="POST" enctype= "multipart/form-data">
 @method('PUT')
 @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel"> {{ $enquiry->full_name }} </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-6 ">
    <div class="form-group {{ $errors->first('full_name', 'has-error')}}">
      <input type="text" class="form-control" name="full_name" placeholder=" Name" value="{{ $enquiry->full_name }}">
      <span class="help-block">{{ $errors->first('full_name', ':message') }}</span>   
    </div>

     <div class="form-group {{ $errors->first('phone', 'has-error')}}">
      <input type="text" class="form-control" name="phone" placeholder=" phone" value="{{ $enquiry->phone }}">
      <span class="help-block">{{ $errors->first('phone', ':message') }}</span>   
    </div>

     <div class="form-group {{ $errors->first('email', 'has-error')}}">
      <input type="text" class="form-control" name="email" placeholder=" email" value="{{ $enquiry->email }}">
      <span class="help-block">{{ $errors->first('email', ':message') }}</span>   
    </div>
 



</div>

<div class="col-md-6 ">
   <div class="form-group {{ $errors->first('mobile', 'has-error')}}">
      <input type="text" class="form-control" name="mobile" placeholder=" mobile" value="{{ $enquiry->mobile }}">
      <span class="help-block">{{ $errors->first('mobile', ':message') }}</span>   
    </div>

<div class="form-group {{ $errors->first('job_title', 'has-error')}}">
      <input type="text" class="form-control" name="job_title" placeholder=" job_title" value="{{ $enquiry->job_title }}">
      <span class="help-block">{{ $errors->first('job_title', ':message') }}</span>   
    </div>
  

  <div class="form-group {{ $errors->first('country', 'has-error')}}">
      <input type="text" class="form-control" name="country" placeholder=" country" value="{{ $enquiry->country }}">
      <span class="help-block">{{ $errors->first('country', ':message') }}</span>   
    </div>
    <div class="form-group {{ $errors->first('state', 'has-error')}}">
      <input type="text" class="form-control" name="state" placeholder=" state" value="{{ $enquiry->state }}">
      <span class="help-block">{{ $errors->first('state', ':message') }}</span>   
    </div>


 <div class="form-group {{ $errors->first('city', 'has-error')}}">
      <input type="text" class="form-control" name="city" placeholder=" city" value="{{ $enquiry->city }}">
      <span class="help-block">{{ $errors->first('city', ':message') }}</span>   
    </div>
</div>



</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
  <button type="submit" class="btn btn-primary">Save Changes</button>
</div>

</form>