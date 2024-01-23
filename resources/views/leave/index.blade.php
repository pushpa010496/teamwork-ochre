@extends('../layouts/pages')
@section('content')

     

  <section class="content">
       

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Organisation Leaves information</h3>
          <a class="btn btn-success pull-right" href="{{ route('leave.create') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  Create</a>
            </div>
            <!-- /.box-header -->
       <div class="box-body">
       
            @if($leavesinfo->count())


                <table id="example1" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th> 
                            <th>Total Days</th>                             
                             <th>Status</th>                         
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody><?php $i=1; ?>
                        @foreach($leavesinfo as $value)
                            <tr>
                                <td class="text-center"><strong>{{$i}}</strong></td>

                                <td>{{$value->name}}</td>
                                <td>{{$value->total_days}}</td>
                                 <td>@if($value->access_flag==1) Active @elseif($value->access_flag ==0) Inactive @endif</td>
                                <td class="text-right">

                                    <a class="btn btn-sm btn-primary" href="{{ route('leave.show', $value->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>
                                    
                                    <a class="btn btn-sm btn-warning" href="{{ route('leave.edit', $value->id) }}">
                                       <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                                    </a>

                                    <form action="{{ route('leave.destroy', $value->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                        {{csrf_field()}}
                                        @if($value->access_flag==1)  <button type="submit" class="btn btn-sm btn-danger">In Active</button> @elseif($value->access_flag ==0)
                                           <button type="submit" class="btn btn-sm btn-info">Active</button>
                                         @endif
                                    </form>
                                </td>
                            </tr><?php $i++; ?>

                            <!-- Modal -->
                               
                        @endforeach
                    </tbody>
                </table>
              
            @else
                <h3 class="text-center alert alert-info">No Data Found!</h3>
            @endif

        
      </div>
    </div>
  </div>
    </div>
  </section>
   
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