@extends('../layouts/pages')
@section('header')
<h1>Products / <strong class="text-light-blue small">Show #{!!$product->id !!}</strong></h1> 
@endsection

@section('content')

  <div class="row">
    <!-- Main content -->
    <section class="invoice">
      <div class="row">
          <div class="col-md-6">
              <a class="btn btn-sm btn-primary pull-left" href="{!! route('products.index')  !!}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
          </div>
          <div class="col-md-6">
               <a class="btn btn-sm btn-warning pull-right" href="{!! route('products.edit', $product->id)  !!}">
                 <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
              </a>
          </div>
      </div>

      <div class="sidebar"></div>

      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Company Name</th>
                <td>{!! @$product->company->comp_name !!}</td>
              </tr>
              <tr>
                <th>Profile Name</th>
                <td>{!! @$product->compprofile->title !!}</td>
              </tr>
              <tr>
                <th>Category Name</th>
                <td>
                  @if($product->categories()->count() > 0)
                  <ul>
                    @foreach($product->categories as $list)
                      <li>{{ $list->name }}</li>
                    @endforeach
                    </ul>
                  @endif
                </td>
              </tr>
              <tr>
                <th>Title</th>
                <td>{!! $product->title  !!}</td>
              </tr>
              <tr>
                <th>Small Image</th>
                <td>
                  @if($product->small_image)
                  <img width="100" src="{{config('app.url').'suppliers/'.str_slug($product->company->comp_name).'/products/'.$product->small_image}}">

                  @endif
                </td>
              </tr>
              <tr>
                <th>Big Image</th>
                <td>
                  @if($product->big_image)
                  <img width="100" src="{{config('app.url').'suppliers/'.str_slug($product->company->comp_name).'/products/'.$product->big_image}}">
                  
                  @endif
                </td>
              </tr>

              <tr>
                <th>Tech Spec Pdf</th>
                <td>
                  @if($product->tech_spec_pdf)
                  <a target="_blank" href="{{config('app.url').'temp_companies/'.str_slug($product->company->comp_name).'/products/'.$product->tech_spec_pdf}}" target="_blank">View pdf file</a>
                  @endif
                </td>
              </tr>

              <tr>
                <th>Alt Tag</th>
                <td>{!! $product->alt_tag  !!}</td>
              </tr>

              <tr>
                <th>Title Tag</th>
                <td>{!! $product->title_tag !!}</td>
              </tr>

              <tr>
                <th>Description</th>
                <td>{!! $product->description !!}</td>
              </tr>

              <tr>
                <th>Alt Tag</th>
                <td>{!! $product->alt_tag  !!}</td>
              </tr>
              <tr>
                <th>Status</th>
                <td>
                  @if($product->active_flag == 1)
                  Active
                  @elseif($product->active_flag == 0)
                  Inactive
                  @endif
                </td>
              </tr>
              
              <tr>
                <th>Created Date</th>
                <td>
                  {!! date('j F Y', strtotime($product->created_at))  !!}
                  {!! date('g:i a', strtotime($product->created_at))  !!}
                </td>
              </tr>
              <tr>
                <th>Created By</th>
                <td>{!! @$product->author->name !!}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </section>

</div>

@endsection
