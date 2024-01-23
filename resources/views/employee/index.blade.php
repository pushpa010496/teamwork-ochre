@extends('../layouts/pages')
@section('content')

     
<!-- <div class="content-wrapper"> -->
  <section class="content">
       

   
        <div class="col-xs-12,col-md-12,col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees</h3>
          <a class="btn btn-success pull-right" href="{{ route('employee.create') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  Create</a>
            </div>
            <!-- /.box-header -->
       <div class="box-body">
       
            @if(@$employeeinfo->count())
                <table id="example1" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Employee Name</th> 
                            <th>Designation</th> 
                            <th>Department</th>
                            <th>Date of Birth</th>
                            <th>Contact Address</th>                           
                            <th>Previous Employer</th>                         
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody><?php $i=1; ?>
                        @foreach($employeeinfo as $value)
                            <tr>
                                <td class="text-center"><strong>{{$i}}</strong></td>

                                <td>{{$value->name}}</td>
                                <td>{{$value->designation}}</td>
                                <td>{{$value->departmentrel->dept_name}}</td>
                                <td>{{$value->dob}}</td>
                                <td>{{$value->address}}</td>
                                 <td>{{$value->prv_employer}}</td>
                                <td class="text-right">

                                    <a class="btn btn-sm btn-primary" href="{{ route('categories.show', $value->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>
                                    
                                    
                                    <a class="btn btn-sm btn-warning" href="{{ route('employee.edit', $value->id) }}">
                                       <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                                    </a>

                                    <form action="{{ route('designation.destroy', $value->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                        {{csrf_field()}}

                                        @if($value->access_flag==1)  <button type="submit" class="btn btn-sm btn-danger">In Active</button> @elseif($value->access_flag ==0)
                                           <button type="submit" class="btn btn-sm btn-info">Active</button>
                                         @endif


                                        <input type="hidden" name="_method" value="DELETE">

                                       
                                    </form>

                                  
                                </td>
                            </tr><?php $i++; ?>

                            <!-- Modal -->
                               
                        @endforeach
                    </tbody>
                </table>
               
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        
      </div>
    </div>
  </div>
  
  </section>
    <!-- </div> -->
@section('scripts')
<script type="text/javascript">
    $("#technology").on('change',function (e) {
        var tech_id = e.target.value;
       $.get('{{url("/")}}/ajax-cate/'+tech_id,function(data) {

            $("#category").empty().append(data);      
       });
    });
</script>
@endsection
@endsection 