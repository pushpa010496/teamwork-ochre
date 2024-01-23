<form action="{{ route('designation.update', $designation->id) }}" method="POST" enctype= "multipart/form-data">
 @method('PUT')
 @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel"> {{ $designation->designation_name }} </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-6 ">
    <div class="form-group {{ $errors->first('designation_name', 'has-error')}}">
      <input type="text" class="form-control" name="designation_name" placeholder="Designation Name" value="{{ $designation->designation_name }}">
      <span class="help-block">{{ $errors->first('designation_name', ':message') }}</span>   
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
     <select name="active_flag" class="form-control" required="required">
      <option value="">-- Select one --</option>
      <option value="1" {{ $designation->active_flag == 1 ? 'selected' :'' }}>Active</option>
      <option value="0" {{ $designation->active_flag == 0 ? 'selected' :'' }}>InActive</option>
    </select>
    <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
  </div>
</div>

</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
  <button type="submit" class="btn btn-primary">Save Changes</button>
</div>

</form>