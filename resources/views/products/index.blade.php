@extends('../layouts/pages')
@section('content')

        <div class="col-md-12 ">                   
            <div class="row">
        <div class="box">
            <div class="box-header">   
              <div class="box-body">
                  {!! Form::open(array('route' => 'products.store','files'=>true, 'id'=>'productForm' )) !!}
                <div class="form-group">
                    {!! Form::label('company_id', 'Company:') !!}
                  {{--   {{ Form::select('company_id', $companylist, null, ['class' => 'form-control width100 col-md-12 select2','required'=>'required','placeholder'=>'Select Company']) }} --}}
                    {{ Form::select('company_id', $companylist, old('company_id',@$company[0]->id), ['class' => 'form-control select2 width100','required'=>'required','placeholder'=>'Select Company']) }}
                
                </div>
                <div class="form-group">
                    {!! Form::label('company_profile_id', 'Select Profile:') !!}
                   {{--  {!! Form::select('company_profile_id',$profiles,old('company_profile_id',@$profiles[0]->id),['class'=>'form-control select2 width100','required'=>'required','placeholder'=>'Select Profile']) !!} --}}

                      <select class="form-control select2 width100" name="company_profile_id" id="company_profile_id">
                        <option value="{{ @$profiles[0]->id }}" select>{{ @$profiles[0]->title }}</option>
                      </select>

                </div>
                <div class="form-group">
              

                    {!! Form::label('category_id', 'Catagory:') !!}
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control select2 width100','required'=>'required','placeholder'=>'Select Category']) }}
                   
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {{ Form::input('text', 'title', null, ['class' => 'form-control','required'=>'required']) }}
                </div>
         

  <div class="form-group col-md-6">
    <label>Small Image</label><br />
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-preview form-control thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
      <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="small_image"></span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
      </div>
    </div>
  </div>
  <div class="form-group  col-md-6">
    <label>Big Image</label><br />
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-preview form-control thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
      <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="big_image"></span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
      </div>
    </div>
</div>



                <div class="form-group">
                    {!! Form::label('alt_tag', 'Alt Tag:') !!}
                    {{ Form::input('text', 'alt_tag', null, ['class' => 'form-control','required'=>'required']) }}
                </div>              
                <div class="form-group">
                    {!! Form::label('title_tag', 'Title Tag:') !!}
                    {{ Form::input('text', 'title_tag', null, ['class' => 'form-control','required'=>'required']) }}
                </div>
               <!--   <div class="form-group">
                    {!! Form::label('tech_spec_pdf', 'Tech spec pdf:') !!}
                     {!! Form::file('tech_spec_pdf', array('class' => '')) !!}
                </div> -->
<label>Tech spec pdf:</label><br />                
<div class="fileinput fileinput-new" data-provides="fileinput">
  <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="tech_spec_pdf"></span>
  <span class="fileinput-filename"></span>
  <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div>
                 <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {{ Form::textarea('description', null,
                     ['class' => 'form-control my-editor']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('url', 'url:') !!}
                    {{ Form::input('text', 'url', null, ['class' => 'form-control','required'=>'required']) }}
                </div>  




    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default ">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less glyphicon glyphicon-minus pull-right"></i>
                        Social Links
                    </a>
                </h4>
            </div>
           
        </div>

       
    </div><!-- panel-group -->



               
                <!-- <div class="form-group">
                    {!! Form::label('active_flag', 'Status:') !!}
                    <select name="active_flag" class="form-control" required="required">
                        <option value="">-- Select one --</option>
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                </div> -->
               <div class="text-right">
                    <button type="submit" name='save' value="yes" class="btn btn-md btn-primary">Save</button>
                    <button type="submit" name='next' value="yes" class="btn btn-md btn-info">Save & Next</button>
                    <button type="submit" name='moderation' value="yes" class="btn btn-md btn-success">Save & Send for moderation</button>
                   <!--  <a class="btn btn-sm btn-default pull-right" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a> -->
                </div>  

            </form>
    </div>
  </div>
</div>
</div>
        </div>

   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products</h3>
           
            </div>
            <!-- /.box-header -->
       <div class="box-body"> 
            @if($products->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th><h5>Title</h5></th>                           
                            <th><h5>Company Name</h5></th>     
                            <th><h5>Profile Name</h5></th>     
                            <th class="text-center"><h5>Status</h5></th> 
                            <th class="text-right"><h5>OPTIONS</h5></th>
                        </tr>
                    </thead>

                    <tbody><?php $i=1; ?>

                        @foreach($products as $value)
                            <tr>
                                <td class="text-center"><strong><h5>{{$i}}</h5></strong></td>
                                <td><h5>{{$value->title}}</h5></td>
                                <td><h5>{{@$value->company->comp_name}}</h5></td>
                                <td><h5>{{@$value->compprofile->title}}</h5></td>
                                <td class="text-center">
                                    <h5>
                                          @if($value->active_flag ==1) Active @elseif($value->active_flag == 0) Inactive @endif
                                    </h5>
                                </td>
                                <td class="text-right">
                                   <!--  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal{{$value->id}}"> Update Metatags ?</button>
                                    <a class="btn btn-sm btn-success" href="{{ url('products/reactivate', $value->id) }}">
                                         Active ?
                                    </a> -->
                                    <a class="btn btn-sm btn-primary" href="{{ route('products.show', $value->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>
                                    
                                    <a class="btn btn-sm btn-warning" href="{{ route('products.edit', $value->id) }}">
                                       <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $value->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-2" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr><?php $i++; ?>


                              <!-- Modal -->
                                <div id="myModal{{$value->id}}" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update Metatags</h4>
                                      </div>
                                      <div class="modal-body">
                                          {!! Form::open(array('url'=>'products/metatag/'.$value->id)) !!}
                                             @includeIf('./seoform')
                                          {!! Form::close() !!}
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                        @endforeach
                    </tbody>
                </table>
                {!! $products->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

       </div>
    </div>
</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <!-- Modal content-->
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thanks For Adding new product</h4>
        </div>
        <div class="modal-body">
          <p>Product Added Successfully.....</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

   <!-- Modal for same page Success flash -->
  <div class="modal fade" id="saveModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title">Product Added</h4>
        </div>
        <div class="modal-body">
          <p>Product Added Successfully.....</p>
        </div>
        <div class="modal-footer">
           <a href="{{Request::url()}}" class="btn btn-info text-right">Close</a>
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
        </div>
      </div>
      
    </div>
  </div>

<!-- Update Modal -->
<div id="myModalUpdate" class="modal fade" role="dialog">
    <!-- Modal content-->
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product Updated Successfully</h4>
        </div>
        <div class="modal-body">
          <p>Product Updated Successfully.....</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@section('scripts')
<script src="{{asset('public/build/js/form_validations.js')}}"  type="text/javascript"></script>
<script>
     var options = {
    filebrowserImageBrowseUrl: '<?php echo config("app.url"); ?>article/?type=Images',
    filebrowserImageUploadUrl: '{{public_path("article")}}/?type=Images&_token=',
    filebrowserBrowseUrl: '<?php echo config("app.url"); ?>article/?type=Files',
    filebrowserUploadUrl: '{{public_path("article")}}/?type=Files&_token='
    };
  $('textarea.my-editor').ckeditor(options);
</script>


<script type="text/javascript">
  $("select[name='company_id']").change(function(){
      var company_id = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo url('select-ajax') ?>",
          method: 'GET',
          data: {company_id:company_id, _token:token},
          success: function(data) {
            $("select[name='company_profile_id'").html('');
            $("select[name='company_profile_id'").html(data.options);
          }
      });
  });

  $(function() {
  $(".expand").on( "click", function() {
    $(this).next().slideToggle(200);
    $expand = $(this).find(">:first-child");
    
    if($expand.text() == "+") {
      $expand.text("-");
    } else {
      $expand.text("+");
    }
  });
});
</script>
@if(session('next'))
    <script type="text/javascript">           
           $('#myModal').modal('show');
    </script>
@endif
@if(session('save') || session('moderation'))
    <script type="text/javascript">
       /*var url = window.location.href.toString().split(window.location.host)[1];
            window.history.pushState("object or string", "Title",url+"/product-success");*/
           $('#saveModal').modal('show');
    </script>
@endif
@if(session('update'))
    <script type="text/javascript">
           $('#myModalUpdate').modal('show');
    </script>
@endif


@if( Request::segment(1) == 'products-success')
<script type="text/javascript">
  console.log('success');
</script>
@endif
@endsection
@endsection 