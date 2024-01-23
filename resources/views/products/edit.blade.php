@extends('../layouts/pages')
@section('header')
    <h1>Products / <strong class="text-light-blue small">Edit #{{$product->id}}</strong></h1>     
@endsection
@section('content')
@include('error')
      <div class="col-md-12">
        <div class="row">
          <div class="box">
            <div class="box-header">   
                  <div class="box-body">
                      <form action="{{ route('products.update', $product->id) }}" method="POST" enctype= "multipart/form-data" id="productForm">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                       {{--   {!! Form::model($product, ['url' => URL::to('products/'. $product->id.''), 'method' => 'put', 'class' => 'form-horizontal','id'=>'productForm', 'enctype'=>'multipart/form-data','files'=> true]) !!}
                                    {{ csrf_field() }} --}}


                            <div class="form-group">
                                {!! Form::label('company_id', 'Company:') !!}
                                {{ Form::select('company_id', $companylist, old('company_id',$product->company_id), ['class' => 'form-control select2 width100','required'=>'required','placeholder'=>'Select Company']) }}
                               
                            </div>
                            <div class="form-group">
                                {!! Form::label('company_profile_id', 'Select Profile:') !!}
                                {!! Form::select('company_profile_id',$profilelist,old('company_profile_id',$product->company_profile_id),['class'=>'form-control width100 select2']) !!}
                               
                            </div>
                            <div class="form-group">
                                <!-- {!! Form::label('category_id', 'Category:') !!}
                               {!! \App\Category::attr(['name' => 'category_id','class'=>'form-control select2','placeholder'=>'Selcet One','required'=>'required'])
                               ->selected($product->category_id)
                               ->renderAsDropdown() !!} -->


                               {!! Form::label('category_id', 'Catagory: ') !!}
                               
                              {{ Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control select2','required'=>'required','placeholder'=>'Select Company']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::label('title', ' Title:') !!}
                                {{ Form::input('text', 'title', old('title',$product->title), ['class' => 'form-control','required'=>'required']) }}
                            </div>

                            <!--  <div class="form-group">
                                {!! Form::label('small_image', 'Small Image:') !!}
                                 {!! Form::file('small_image', array('class' => '')) !!}
                                  @if($product->small_image)
                                   <img width="100" src="<?php echo config('app.url'); ?>products/<?php echo $product->small_image;?>">
                                 @endif
                            </div> -->
                            <!--   <div class="form-group">
                                {!! Form::label('big_image', 'Big Image:') !!}
                                {!! Form::file('big_image', array('class' => '')) !!}
                                  @if($product->big_image)
                                   <img width="100" src="<?php echo config('app.url'); ?>products/<?php echo $product->big_image;?>">
                                 @endif
                            </div> -->
<div class="form-group col-md-6">
  <label >Small Image</label><br />
  <div class="fileinput fileinput-exists" data-provides="fileinput" data-name="myimage">
    {{-- <input type="hidden" name="small_image" /> --}}
    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
      <img src="{{asset('public/admin/dist/img/user2-160x160.jpg')}}" />

    </div>
    <div class="fileinput-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
  <img src="{{config('app.url').'suppliers/'.str_slug($product->company->comp_name).'/products/'.$product->small_image}}">

    </div>
    <div>
      <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="small_image"/></span>
      {{-- <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> --}}
    </div>
  </div>
</div>
<div class="form-group col-md-6">
  <label >Big Image</label><br />
  <div class="fileinput fileinput-exists" data-provides="fileinput" data-name="myimage">
{{--     <input type="hidden" name="big_image"  /> --}}
    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
      <img src="{{asset('public/admin/dist/img/user2-160x160.jpg')}}" />
    </div>
    <div class="fileinput-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
  <img src="{{config('app.url').'suppliers/'.str_slug($product->company->comp_name).'/products/'.$product->big_image}}">
    </div>
    <div>
      <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="big_image"/></span>
      {{-- <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> --}}
    </div>
  </div>
</div>



                             
                            <div class="form-group">
                                {!! Form::label('title_tag', 'Img Title:') !!}
                                {{ Form::input('text', 'title_tag',  old('title_tag',$product->title_tag), ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::label('alt_tag', 'Img Alt:') !!}
                                {{ Form::input('text', 'alt_tag',  old('alt_tag',$product->alt_tag), ['class' => 'form-control']) }}
                            </div>
                        <!--     <div class="form-group">
                                {!! Form::label('tech_spec_pdf', 'tech spec pdf:') !!}
                                 {!! Form::file('tech_spec_pdf', array('class' => '')) !!}
                                  @if($product->tech_spec_pdf)
                                  <a href="<?php echo config('app.url'); ?>products/<?php echo $product->tech_spec_pdf;?>">View Pdf</a>
                                 @endif
                            </div> -->

                          <label>Tech spec pdf:</label><br />                
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="tech_spec_pdf"></span>
                            <span class="fileinput-filename"></span>
                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                          </div>




                            <div class="form-group">
                                {!! Form::label('description', 'Description:') !!}
                                {{ Form::textarea('description', old('description',$product->description),
                                 ['class' => 'form-control my-editor']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::label('url', 'url:') !!}
                                {{ Form::input('text', 'url', old('url',$product->url), ['class' => 'form-control','required'=>'required']) }}
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
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                       <div class="detail">
                         <div class="form-group">
                              {!! Form::label('googleplus', 'Google Plus:') !!}
                              {{ Form::input('text', 'googleplus', old('googleplus',$product->googleplus), ['class' => 'form-control']) }}
                          </div>              
                          <div class="form-group">
                              {!! Form::label('linkedin', 'Linkedin:') !!}
                              {{ Form::input('text', 'linkedin', old('linkedin',$product->linkedin), ['class' => 'form-control']) }}
                          </div>
                          <div class="form-group">
                              {!! Form::label('twitter', 'Twitter:') !!}
                              {{ Form::input('text', 'twitter', old('twitter',$product->twitter), ['class' => 'form-control']) }}
                          </div>              
                          <div class="form-group">
                              {!! Form::label('facebook', 'Facebook:') !!}
                              {{ Form::input('text', 'facebook', old('facebook',$product->facebook), ['class' => 'form-control']) }}
                          </div>
                      </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less glyphicon glyphicon-plus pull-right"></i>
                        Search Keywords
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="detail">
                       <div class="form-group">
                            {!! Form::label('keyword1', 'Keyword 1:') !!}
                            {{ Form::input('text', 'keyword1', old('keyword1',$product->keyword1), ['class' => 'form-control']) }}
                        </div>              
                       <div class="form-group">
                            {!! Form::label('keyword2', 'Keyword 2:') !!}
                            {{ Form::input('text', 'keyword2', old('keyword2',$product->keyword2), ['class' => 'form-control']) }}
                        </div>              
                       <div class="form-group">
                            {!! Form::label('keyword3', 'Keyword 3:') !!}
                            {{ Form::input('text', 'keyword3', old('keyword3',$product->keyword3), ['class' => 'form-control']) }}
                        </div>              
                       
                       <div class="form-group">
                            {!! Form::label('keyword4', 'Keyword 4:') !!}
                            {{ Form::input('text', 'keyword4', old('keyword4',$product->keyword4), ['class' => 'form-control']) }}
                        </div>              
                       
                       <div class="form-group">
                            {!! Form::label('keyword5', 'Keyword 5:') !!}
                            {{ Form::input('text', 'keyword5', old('keyword5',$product->keyword5), ['class' => 'form-control']) }}
                        </div>              
                    </div>
                </div>
            </div>
        </div>
    </div><!-- panel-group -->





                    
                            <div class="form-group">
                                {!! Form::label('active_flag', 'Status:') !!}

                                <select name="active_flag" class="form-control" required="required">
                                    <option value="">-- Select one --</option>
                                    @if($product->active_flag == 1)
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">InActive</option>
                                    @elseif($product->active_flag == 0)
                                    <option value="1">Active</option>
                                    <option value="0" selected="selected">InActive</option>
                                    @endif
                                </select>
                            </div>
                                           
                            <div class="well well-sm">
                                <button type="submit" class="btn btn-primary">Save</button>
                                
                                 <a class="btn btn-sm btn-default pull-right" href="{{ route('products.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
                            </div>
                      </form>

                  </div>
            </div>
          </div>
        </div>
      </div>

<div class="clearfix"></div>


  @endsection
@section('scripts')


<script src="{{asset('public/build/js/form_validations_edit.js')}}"  type="text/javascript"></script>

<script>
     var options = {
    filebrowserImageBrowseUrl: '<?php echo config("app.url"); ?>article/?type=Images',
    filebrowserImageUploadUrl: '{{public_path("article")}}/?type=Images&_token=',
    filebrowserBrowseUrl: '<?php echo config("app.url"); ?>article/?type=Files',
    filebrowserUploadUrl: '{{public_path("article")}}/?type=Files&_token='
    };
  $('textarea.my-editor').ckeditor(options);

   $('.fileinput').fileinput()
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

 
</script>


@endsection 