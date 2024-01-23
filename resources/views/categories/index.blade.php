@extends('../layouts/pages')
@section('content')

     
<div class="content-wrapper">
  <section class="content">
       

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category</h3>
          <a class="btn btn-success pull-right" href="{{ route('categories.create') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  Create</a>
            </div>
            <!-- /.box-header -->
       <div class="box-body">
       
            @if($categories->count())
                <table id="example1" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Category Name</th>                           
                             <th>Status</th>                         
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody><?php $i=1; ?>
                        @foreach($categories as $value)
                            <tr>
                                <td class="text-center"><strong>{{$i}}</strong></td>

                                <td>{{$value->name}}</td>
                                 <td>@if($value->active_flag==1) Active @elseif($value->active_flag ==0) Inactive @endif</td>
                                <td class="text-right">

                                    <a class="btn btn-sm btn-primary" href="{{ route('categories.show', $value->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>
                                    
                                    <a class="btn btn-sm btn-warning" href="{{ route('categories.edit', $value->id) }}">
                                       <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                                    </a>

                                    <form action="{{ route('categories.destroy', $value->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-2" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr><?php $i++; ?>

                            <!-- Modal -->
                               
                        @endforeach
                    </tbody>
                </table>
                {!! $categories->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        
      </div>
    </div>
  </div>
    </div>
  </section>
    </div>
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