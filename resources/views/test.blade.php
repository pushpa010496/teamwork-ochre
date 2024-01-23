@extends('../layouts/pms')


@section('content')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Departments</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Departments</li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                        <a href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507" class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs2">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_departments">Departments</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#e_add">Add</a></li>                
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="e_add">
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group">                                    
                                                <input type="text" class="form-control" placeholder="Departments Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">                                    
                                                <input type="text" class="form-control" placeholder="Departments Head">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">                                    
                                                <input type="number" class="form-control" placeholder="No of Employee">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary">ADD</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane show active" id="e_departments">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Department Name</th>
                                                <th>Department Head</th>
                                                <th>Total Employee</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($departmentinfo->count())
                                                @foreach($departmentinfo as $key => $value)
                                                <tr>
                                                    <td>{{$key}}</td>
                                                    <td><div class="font-15">{{$value->dept_name}}</div></td>
                                                    <td>John Smith</td>
                                                    <td>0 stc</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></button>
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>

                                                      {{--   <form action="{{ route('department.destroy', $value->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                                            {{csrf_field()}}
                                                            @if($value->access_flag==1)  <button type="submit" class="btn btn-sm btn-danger">In Active</button> @elseif($value->access_flag ==0)
                                                            <button type="submit" class="btn btn-sm btn-info">Active</button>
                                                            @endif
                                                        </form> --}}
                                                    </td>
                                                </tr>
                                                @endforeach

                                              @else
                                                  <tr>
                                                    <td colspan="5">No Records found</td>

                                                </tr>
                                              @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>

@endsection
