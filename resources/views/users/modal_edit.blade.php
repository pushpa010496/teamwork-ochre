<form action="{{ route('users.update', $user->id) }}" method="POST">
   @method('PUT')
   @csrf()

   <input type="hidden" name="type" value="edit">
   <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">{{ $user->name }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body" id="data_edit">

   <div class="row clearfix">
    <div class="col-md-6 ">
      <div class="form-group {{ $errors->first('name', 'has-error')}}">
        <input type="text" class="form-control" name="name" placeholder="Employee Name" value="{{ $user->name }}">
        <span class="help-block">{{ $errors->first('name', ':message') }}</span>   
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group {{ $errors->first('email', 'has-error')}}">
        <input type="email" class="form-control" name="email" placeholder="Employee Email" value="{{ $user->email }}">
        <span class="help-block">{{ $errors->first('email', ':message') }}</span>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group {{ $errors->first('designation_id', 'has-error')}}">                                    
        {!! Form::select('designation_id', $designations, $user->designation_id,['id'=>'','class' => 'form-control','placeholder'=>'Select Department'] ) !!}
        <span class="help-block">{{ $errors->first('designation_id', ':message') }}</span>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group {{ $errors->first('department_id', 'has-error')}}">                                    
        {!! Form::select('department_id', $departments, $user->department_id,['id'=>'','class' => 'form-control','placeholder'=>'Select Department'] ) !!}
        <span class="help-block">{{ $errors->first('department_id', ':message') }}</span>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group {{ $errors->first('roles', 'has-error')}}">                                    
        {!! Form::select('roles', $roles, @$user->roles->first()->id ,['id'=>'','class' => 'form-control','placeholder'=>'Select a Role'] ) !!}
        <span class="help-block">{{ $errors->first('roles', ':message') }}</span>
      </div>
    </div>
    
    



    <div class="col-md-6">
      <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
       <select name="active_flag" class="form-control" required="required">
        <option value="">-- Select one --</option>
        <option value="1" {{ $user->active_flag == 1 ? 'selected' :'' }}>Active</option>
        <option value="0" {{ $user->active_flag == 0 ? 'selected' :'' }}>InActive</option>
      </select>
      <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
    </div>
  </div>
  
   <div class="col-md-12">
      <div class="form-group {{ $errors->first('password', 'has-error')}}">
        <input type="text" class="form-control" name="password" placeholder="Employee Password" >
        <span class="help-block">{{ $errors->first('password', ':message') }}</span>
      </div>
    </div>
     
  <div class="col-md-12">
       <div class="form-group multiselect_div {{ $errors->first('technology', 'has-error')}}">                                    
            {!! Form::select('technology[]', $technology, explode(",",$user->technology),['id'=>'multiselect-edit','class' => 'form-control multiselect multiselect-custom','multiple'=>'multiple'] ) !!}
            <span class="help-block">{{ $errors->first('technology', ':message') }}</span>
        </div>
     </div>
  
  <div class="col-md-12">
       <div class="form-group multiselect_div {{ $errors->first('company_type', 'has-error')}}">                                    
            {!! Form::select('company_type[]', $companyType, explode(",",$user->company_type),['id'=>'multiselectcompanyType-edit','class' => 'form-control multiselect multiselect-custom','multiple'=>'multiple'] ) !!}
            <span class="help-block">{{ $errors->first('company_type', ':message') }}</span>
        </div>
     </div>

  </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </div>

</form>

