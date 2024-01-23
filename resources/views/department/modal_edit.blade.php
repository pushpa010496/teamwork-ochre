<form action="{{ route('department.update', $department->id) }}" method="POST">
   @method('PUT')
  @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">{{ $department->dept_name }}</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-12 ">
    <div class="form-group {{ $errors->first('dept_name', 'has-error')}}">
      <input type="text" class="form-control" name="dept_name" placeholder="Departments Name" value="{{ $department->dept_name }}">
      <span class="help-block">{{ $errors->first('dept_name', ':message') }}</span>   
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group {{ $errors->first('dept_head', 'has-error')}}">                                    
      {!! Form::select('dept_head', $heads, $department->dept_head,['id'=>'','class' => 'form-control','placeholder'=>'Select Head of department'] ) !!}
      <span class="help-block">{{ $errors->first('dept_head', ':message') }}</span>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
     <select name="active_flag" class="form-control" required="required">
      <option value="">-- Select one --</option>
      <option value="1" {{ $department->active_flag == 1 ? 'selected' :'' }}>Active</option>
      <option value="0" {{ $department->active_flag == 0 ? 'selected' :'' }}>InActive</option>
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