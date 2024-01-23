@extends('../layouts/pms')
<?php 
    use App\Category;
 ?>

@section('content')

     <div class="tab-pane" id="e_add">
                                <div class="body">
                                {!! Form::open(['route' => 'department.store']) !!}
                                    <div class="row clearfix">
                                        <div class="col-md-12 ">
                                            <div class="form-group {{ $errors->first('dept_name', 'has-error')}}">
                                                <input type="text" class="form-control" name="dept_name" placeholder="Departments Name" value="{{ old('dept_name') }}">
                                                <span class="help-block">{{ $errors->first('dept_name', ':message') }}</span>   
                                            </div>
                                        </div>
                                        
                                      
                                      
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                          
                                             <a href="{{url('department')}}"  class="btn btn-secondary" data-dismiss="modal">CLOSE</a>
                                        </div>
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
