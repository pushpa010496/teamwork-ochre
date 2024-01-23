@extends('../layouts/pms')
@section('content')

        <div class="col-md-12">
            <div class="row">
        <div class="box">
            <div class="box-header">   
          <div class="box-body">
         <form action="{{ route('users.update', $user->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {{ Form::input('text', 'name', old('name', $user->name ), ['class' => 'form-control']) }}
                </div>
                 
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {{ Form::input('email', 'email', old('email', $user->email ), ['class' => 'form-control']) }}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('roles', 'Role:') !!}
                    {!! Form::select('roles', $roles, $user->roles->pluck('id')->toArray(),['id'=>'','class' => 'form-control','placeholder'=>'Select a Role'] ) !!}
                </div>              

                <div class="well well-sm">
                    <button type="submit" name="submit_user" class="btn btn-sm btn-primary">Save</button>
                    <a class="btn btn-sm btn-default pull-right" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
</div>
  
@endsection