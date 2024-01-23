@extends('../layouts/pages')

@section('header')
<h1>Roles / <strong class="text-light-blue small">Edit #{{$role->id}}</strong></h1>
    
@endsection
@section('css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
  <style type="text/css">optgroup, select{color: #333;}</style>
@endsection

@section('content')

        <div class="col-md-12">
            <div class="row">
        <div class="box">
            <div class="box-header">   
          <div class="box-body">
         <form action="{{ route('roles.update', $role->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    {!! Form::label('display_name', 'Display Name:') !!}
                    {{ Form::input('text', 'display_name', old('display_name', $role->display_name ), ['class' => 'form-control']) }}
                    
                </div> <div class="form-group">
                    {!! Form::label('name', 'Slug:') !!}
                    {{ Form::input('text', 'name', old('name', $role->name ), ['class' => 'form-control']) }}
                </div> <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {{ Form::textarea('description', old('description', $role->description ), ['class' => 'form-control','rows'=>3]) }}</textarea>
                </div>
               
                <div class="form-group">
                    {!! Form::label('permissions', 'Permissions:') !!}
                    {!! Form::select('permissions[]',$permissions , $role->perms->pluck('id')->toArray() ,['class'=>'form-control select2','multiple'=>'multiple','data-placeholder'=>'Select a State'] ) !!}
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    <a class="btn btn-sm btn-default pull-right" href="{{ route('roles.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
  </div>
</div>
</div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">

    /*$(document).ready(function() {

        $('#multiple-checkboxes').multiselect();

    });*/

</script>
@endsection