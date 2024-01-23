@extends('../layouts/pages')
<?php 
    use App\Category;
 ?>


@section('content')
  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New Registration</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


         <div class="row">
             
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Employee Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
               <div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Gender:</strong>
          {!! Form::select('gender',['--Select--','Male','Female'], null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Date Of Birth:</strong>
            {!! Form::text('dateofb', null, array('id'=>'dateofb','postdt' => 'Name','class' => 'form-control dcp')) !!}


        </div>
    </div>

     <div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Blood Group:</strong>
          {!! Form::select('type',['--Select--','O+','O-','A+','A-'], null, array('class' => 'form-control')) !!}
        </div>
    </div>


           <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Employee Contact:</strong>
                    <input type="text" name="contact" class="form-control" placeholder="Contact Number">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Employee Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Contact email">
                </div>
            </div>
          
          <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="text" name="password" class="form-control" placeholder="Access Token">
                </div>
            </div>

<div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Department:</strong>
          {!! Form::select('department',$departments, null, array('class' => 'form-control','placeholder'=>'-select department-')) !!}
        </div>
    </div>
               
   <div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Designation:</strong>
          {!! Form::select('designation',$designation, null, array('class' => 'form-control','placeholder'=>'select designation')) !!}
        </div>
    </div>

    <div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Experience:</strong>
            {!! Form::text('experience', null, array('placeholder' => 'Total Years','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Join Date:</strong>
            {!! Form::text('postdate', null, array('id'=>'postdate','postdt' => 'Name','class' => 'form-control dcp')) !!}


        </div>
    </div>
 <div class="col-xs-3 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Status:</strong>
           
             {!! Form::select('status',['--Select--','active','inactive'], null, array('class' => 'form-control')) !!}
        </div>

       
    </div>
      <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                    <strong>Pan Number:</strong>
                    <input type="text" name="pan" class="form-control" placeholder="Permint Account number">
                </div>
            </div>

          <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>National id:</strong>
                    <input type="text" name="nid" class="form-control" placeholder="National id i.e Adhar">
                </div>
        </div>



               <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Prev Employer:</strong>
                    <input type="text" name="prvemployer" class="form-control" placeholder="Previous Organization    ">
                </div>
            </div>

               <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Prev org Hr:</strong>
                    <input type="text" name="prvhr" class="form-control" placeholder="Organization Hr">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Prev org Contact:</strong>
                    <input type="text" name="prvemployercnt" class="form-control" placeholder="Organization contact">
                </div>
            </div>
  <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>Member Image:</strong>
                        {!! Form::file('profile_img', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            {!! Form::textarea('address', null, array('placeholder' => 'Address for contct.............','class' => 'form-control')) !!}
        </div>
        </div>
        
       <div class="col-xs-12 col-sm-12 col-md-3 text-center">
                    <button type="submit" class="btn btn-primary">Join New Employee</button>
            </div>
        </div>


    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( ".dcp" ).datepicker();
  } );
  </script>
  <script type="text/javascript">
       $(document).ready(function(){

 $('#dateofb').datepicker({
      format: 'dd-mm-yyyy',
        changeMonth: true,
        changeYear: true,
        autoclose: true,

    });
    $('#postdate').datepicker({
      format: 'dd-mm-yyyy',
      changeMonth: true,
        changeYear: true,
        autoclose: true,
    });

  });
  </script>
@stop