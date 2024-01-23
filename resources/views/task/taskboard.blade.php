@extends('../layouts/app')

@section('content')
    <div class="well well-sm col-md-offset-3 col-md-6">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-sm btn-link" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
            </div>
            <div class="col-md-6">
                 <a class="btn btn-sm btn-warning pull-right" href="{{ route('categories.edit', $category->id) }}">
                   <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                </a>
            </div>
        </div>
    </div>

<div class="well well-sm col-md-offset-3 col-md-6">
        <div class="row">
            <div class="col-md-6">
               <h5><i class="category icon"></i>Category Name</h5>
            </div>
            <div class="col-md-6">
                  <h5>{{ $category->name }}</h5>
             </div>  
        </div>
        
        
        <div class="row">
        
             <div class="col-md-6">
               <h5><i class="category icon"></i>Status</h5>
            </div>
            <div class="col-md-6">
              @if($category->active_flag == 0)
              Inactive
              @elseif($category->active_flag == 1)
              Active
              @endif

             </div>  
         </div>
        
        </div>
    </div>
@endsection
