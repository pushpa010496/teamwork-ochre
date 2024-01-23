@extends('../layouts/pages')

@section('content')


        <div class="col-md-12">
            <div class="row">
        
          <div class="box">
            <div class="box-header">   
          <div class="box-body">
                  <form action="{{ route('roles.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    {!! Form::label('display_name', 'Display Name:') !!}
                    {{ Form::input('text', 'display_name', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Slug:') !!}
                    {{ Form::input('text', 'name', null, ['class' => 'form-control']) }}
                </div>
                 
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {{ Form::textarea('description', null, ['class' => 'form-control','rows'=>3]) }}                    
                </div>
                 <div class="form-group">
                    {!! Form::label('permissions', 'Permissions:') !!}
                    {!! Form::select('permissions[]',$permissions, null,['class'=>'form-control select2','multiple'=>'multiple'] ) !!}
                </div>
                
                <div class="well well-sm">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    <a class="btn btn-sm btn-default pull-right" href="{{ route('roles.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>
       
    </div>
  </div>
</div>
</div>
        </div>
   
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Roles</h3>
             
            </div>
            <!-- /.box-header -->
       <div class="box-body">
           @if($roles->count())
                <table id="example1" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody><?php $i=1; ?>
                        @foreach($roles as $role)
                            <tr>
                                <td class="text-center"><strong>{{$i}}</strong></td>

                                <td>{{$role->name}}</td> <td>{{$role->display_name}}</td> <td>{{$role->description}}</td>
                                
                                <td class="text-right">
                                    <a class="btn btn-sm btn-primary" href="{{ route('roles.show', $role->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>
                                    
                                    <a class="btn btn-sm btn-info" href="{{ route('roles.edit', $role->id) }}">
                                       <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                                    </a>

                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-2" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr><?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
                {!! $roles->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>
</div>
</div>
@endsection