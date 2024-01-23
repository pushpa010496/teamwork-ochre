@extends('../layouts/pages')
@section('header')
<h1>Role / <strong class="text-light-blue small">Show #{!!$role->id !!}</strong></h1> 
@endsection

@section('content')
    <div class="row">

    <!-- Main content -->
    <section class="invoice">

      <div class="row">
            <div class="col-md-6">
                <a class="btn btn-sm btn-default" href="{{ route('roles.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
            </div>

            <div class="col-md-6">
                 <a class="btn btn-sm btn-primary pull-right" href="{{ route('roles.edit', $role->id) }}">
                   <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                </a>
            </div>
        </div>

      <div class="sidebar"></div>

      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Name</th>
                <td>{{ $role->name }}</td>
              </tr>
              <tr>
                <th style="width:50%">Display Name</th>
                <td>{{ $role->display_name }}</td>
              </tr>
              <tr>
                <th style="width:50%">Description</th>
                <td>{{ $role->description }}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="clearfix"></div>

  </div>
@endsection
