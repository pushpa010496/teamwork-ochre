<form action="{{ route('roles.update', $role->id) }}" method="POST">
   @method('PUT')
  @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">{{ $role->display_name }}</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-6 ">
    <div class="form-group {{ $errors->first('display_name', 'has-error')}}">
      <input type="text" class="form-control" name="display_name" placeholder="Display Name" value="{{ $role->display_name }}">
      <span class="help-block">{{ $errors->first('display_name', ':message') }}</span>   
    </div>
  </div>

  <div class="col-md-6 ">
    <div class="form-group {{ $errors->first('name', 'has-error')}}">
      <input type="text" class="form-control" name="name" placeholder="slug" value="{{ $role->name }}">
      <span class="help-block">{{ $errors->first('name', ':message') }}</span>   
    </div>
  </div>

  <div class="col-md-12 ">
    <div class="form-group {{ $errors->first('description', 'has-error')}}">                                    
      <textarea class="form-control" name="description" rows="4" placeholder="Description">{{ $role->description }}</textarea>        
      <span class="help-block">{{ $errors->first('description', ':message') }}</span>
    </div>
  </div>
  
  
  <div class="col-md-12">
    <div class="form-group multiselect_div {{ $errors->first('permissions', 'has-error')}}">                                           
         {!! Form::select('permissions[]', $permissions, $role->perms->pluck('id')->toArray() ,['id'=>'multiselect-edit','class' => 'form-control multiselect multiselect-custom','multiple'=>'multiple'] ) !!}
        <span class="help-block">{{ $errors->first('permissions', ':message') }}</span>
      </div>
  </div>


</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</div>

</form>