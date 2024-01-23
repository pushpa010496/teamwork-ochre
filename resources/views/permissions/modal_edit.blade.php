<form action="{{ route('permissions.update', $permission->id) }}" method="POST">
   @method('PUT')
  @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">{{ $permission->display_name }}</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-6 ">
    <div class="form-group {{ $errors->first('display_name', 'has-error')}}">
      <input type="text" class="form-control" name="display_name" placeholder="Display Name" value="{{ $permission->display_name }}">
      <span class="help-block">{{ $errors->first('display_name', ':message') }}</span>   
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group {{ $errors->first('name', 'has-error')}}">
      <input type="text" class="form-control" name="name" placeholder="Permission Slug" value="{{ $permission->name }}">
      <span class="help-block">{{ $errors->first('name', ':message') }}</span>
    </div>
  </div>
  <div class="col-md-12">
     <div class="form-group {{ $errors->first('description', 'has-error')}}">
      <textarea  class="form-control" name="description" placeholder="Permission Slug">{{$permission->description }}</textarea>
      <span class="help-block">{{ $errors->first('description', ':message') }}</span>
    </div>
</div>

</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</div>

</form>