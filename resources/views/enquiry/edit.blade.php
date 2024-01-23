@extends('../layouts/app')

@section('header')
    <div class="page-header">
        <h3><i class="glyphicon glyphicon-edit"></i> Category / Edit #{{$designation->id}}</h3>
    </div>
@endsection

@section('content')
   

    <div class="row">
         <div class="col-md-offset-3 col-md-6">
            <form action="{{ route('designation.update', $designation->id) }}" method="POST" enctype= "multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
            	<label for="name-field">Category Name</label>
            	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $designation->designation_name ) }}" />
                </div> 
              
                <div class="form-group">
                    {!! Form::label('status', 'Status:') !!}

                    <select name="active_flag" class="form-control" required="required">
                        <option value="">-- Select one --</option>
                        @if($designation->active_flag == 1)
                        <option value="1" selected="selected">Active</option>
                        <option value="0">InActive</option>
                        @elseif($designation->active_flag == 0)
                        <option value="1">Active</option>
                        <option value="0" selected="selected">InActive</option>
                        @endif
                    </select>
                </div>
                
                
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('designation.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
