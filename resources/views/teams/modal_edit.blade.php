<form action="{{ route('teams.update', $team->id) }}" method="POST">
   @method('PUT')
  @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">{{ $team->team_name }}</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-12 ">
    <div class="form-group {{ $errors->first('team_name', 'has-error')}}">
      <input type="text" class="form-control" name="team_name" placeholder="Team Name" value="{{ $team->team_name }}">
      <span class="help-block">{{ $errors->first('team_name', ':message') }}</span>   
    </div>
  </div>
  <div class="col-md-12 ">
    <div class="form-group {{ $errors->first('description', 'has-error')}}">                                    

      <textarea class="form-control" name="description" rows="4" placeholder="Description">{{ $team->description }}</textarea>        
      <span class="help-block">{{ $errors->first('description', ':message') }}</span>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->first('department_id', 'has-error')}}">                                    
        {!! Form::select('department_id', $departments, $team->department_id,['id'=>'','class' => 'form-control','placeholder'=>'Select Department'] ) !!}
        <span class="help-block">{{ $errors->first('department_id', ':message') }}</span>
      </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
     <select name="active_flag" class="form-control" required="required">
      <option value="" disabled selected>-- Select one --</option>
      <option value="1" {{ $team->active_flag == 1 ? 'selected' :'' }}>Active</option>
      <option value="0" {{ $team->active_flag == 0 ? 'selected' :'' }}>InActive</option>
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