@extends('../layouts/pages')
<?php 
use App\Category;
?>

@section('content')

<div class="row">
  <div class="col-md-12">

    {!! Form::open(array('route' => 'task.store','files'=>true)) !!}
    
    <div class="form-group col-md-3 ">
      {!! Form::label('name', 'Name:') !!}
      {{ Form::input('text', 'name', null, ['class' => 'form-control','id'=>'exampleInputEmail1']) }}
    </div>
    
    <div class="form-group col-md-3 ">
      
      {!! Form::label('Email', 'Email:') !!}
      {{ Form::input('text', 'email', null, ['class' => 'form-control','id'=>'email']) }}
    </div>
    <div class="form-group col-md-3 ">
     
      <strong>Applied To:</strong>
      {!! Form::select('superior',$employeeinfo, null, array('id'=>'superior','class' => 'form-control','placeholder'=>'-Select Employee -')) !!}
    </div>
    
    
    <div class="form-group col-md-3 ">
      <strong>Start Date:</strong>
      {!! Form::text('taskstart', null, array('id'=>'from_date','postdt' => 'Name','class' => 'form-control dcp')) !!}


    </div>

    
    <div class="form-group col-md-3 ">
      <strong>End Date:</strong>
      {!! Form::text('taskend', null, array('id'=>'to_date','postdt' => 'Name','class' => 'form-control dcp')) !!}
    </div>
    
    
    <div class="form-group">
      {!! Form::label('message', 'Message:') !!}
      
      {!! Form::textarea('message', null, array('placeholder' => 'Request Message','class' => 'form-control')) !!}
    </div>
    
    <div class="well well-sm">
      <button type="submit" class="btn btn-sm btn-primary">Create</button>
      <a class="btn btn-sm btn-link pull-right" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
    </div>
  </form>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $("#superior").on('change',function (e) {
    var superior_id = e.target.value;

    $.get('{{url("/")}}/ajax-employee/'+superior_id,function(data) {

      $("#email").val(data);      
    });
  });



  $(document).ready(function(){

   $('#from_date').datepicker({
    format: 'dd-mm-yyyy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,

  });
   $('#to_date').datepicker({
    format: 'dd-mm-yyyy',
    changeMonth: true,
    changeYear: true,
    autoclose: true,
  });

 });
</script>
@endsection
