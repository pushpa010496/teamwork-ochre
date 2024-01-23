@extends('../layouts/pages')
<?php 
    use App\Category;
 ?>

@section('content')

     <div class="row">
        <div class="col-md-offset-3 col-md-6">

                 {!! Form::open(array('route' => 'leave.store','files'=>true)) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {{ Form::input('text', 'name', null, ['class' => 'form-control','id'=>'exampleInputEmail1']) }}
                </div>
              
               <div class="form-group">
                    {!! Form::label('name', 'No Of Days:') !!}
                    {{ Form::input('text', 'total_days', null, ['class' => 'form-control','id'=>'total_days']) }}
                </div>
                <div class="form-group">
            <strong>Applicable:</strong>
          {!! Form::select('applicable',['--Select--','Male','Female','All'], null, array('class' => 'form-control')) !!}
        </div>
              <div class="form-group">
                {!! Form::label('status', 'Status:') !!}
                <select name="active_flag" class="form-control" required="required">
                  <option value="">-- Select one --</option>
                  <option value="1">Active</option>
                  <option value="0">InActive</option>
                </select>
              </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    <a class="btn btn-sm btn-link pull-right" href="{{ route('leave.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
</script>
@endsection
