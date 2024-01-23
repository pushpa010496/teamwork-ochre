@extends('../layouts/pages')
<?php 
    use App\Category;
 ?>

@section('content')

     <div class="row">
        <div class="col-md-12">

       {{ Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'patch']) }}
        @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
                <div class="form-group col-md-3 ">
                    {!! Form::label('name', 'Name:') !!}
                    {{ Form::input('text', 'task_name', null, ['class' => 'form-control','id'=>'exampleInputEmail1']) }}
                </div>
   
          <div class="form-group col-md-3 ">
            <strong>Alloted:</strong>
           {!! Form::select('alloted',$employeeinfo, null, array('class' => 'form-control','placeholder'=>'-Select Employee -')) !!}
        </div>
 
    
         <div class="form-group col-md-3 ">
            <strong>Start Date:</strong>
            {!! Form::text('start_date', null, array('id'=>'start_date','postdt' => 'Name','class' => 'form-control dcp')) !!}


        </div>

               
          <div class="form-group col-md-3 ">
            <strong>End Date:</strong>
            {!! Form::text('end_date', null, array('id'=>'end_date','postdt' => 'Name','class' => 'form-control dcp')) !!}
         </div>
 <div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Work priority:</strong>
          {!! Form::select('priority',['--Select--','High','Low'], null, array('class' => 'form-control')) !!}
        </div>
    </div>
         
              <div class="form-group">
                {!! Form::label('message', 'Message:') !!}
              
                     {!! Form::textarea('message', null, array('placeholder' => 'Description for task ....','class' => 'form-control')) !!}
              </div>
           
                <div class="well well-sm">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    <a class="btn btn-sm btn-link pull-right" href="{{ route('task.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $("#technology").on('change',function (e) {
        var tech_id = e.target.value;
       $.get('{{url("/")}}/ajax-cate/'+tech_id,function(data) {

            $("#category").empty().append(data);      
       });
    });



$(document).ready(function(){

 $('#start_date').datepicker({
        format: 'dd-mm-yyyy',
        changeMonth: true,
        changeYear: true,
        autoclose: true,

});
$('#end_date').datepicker({
      format: 'dd-mm-yyyy',
      changeMonth: true,
      changeYear: true,
      autoclose: true,
});

});
</script>
@endsection
