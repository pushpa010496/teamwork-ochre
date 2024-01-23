@extends('../layouts/pms')
@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/vendor/multi-select/css/multi-select.css')}}">
<style type="text/css">

</style>
@endsection

@section('content')

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Projects</h1>


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ochre Media</a></li>
            <li class="breadcrumb-item "><a href="{{ url('projects') }}">Projects</a></li>
            <li class="breadcrumb-item header-color" aria-current="page">#</li>
          </ol>
        </nav>
      </div>            
      <div class="col-md-6 col-sm-12 text-right">
        <a href="" class="btn btn-sm btn-primary" title="">Taskboard</a>

      </div>
    </div>
  </div>


  <div class="row clearfix">
    <div class="col-lg-8">

      {{-- project info card --}}
      <div class="card">


        <div class="header">
          <h2>Company Info</h2>
        </div>
        <div class="body">
          <div class="row">
            <div class="col-lg-12">                          
              <h6>#  {{$company->comp_name}}</h6>
            </div>
            <div class="col-lg-6 mt-3">
              <label><strong>Website</strong></label>
              <p>{{$company->website}}</p>
            </div>

            <div class="col-lg-6 mt-3">
              <label><strong>Phone</strong></label>
              <p>{{$company->phone}}</p>
            </div>

           

            <div class="col-lg-6 mt-3">
              <label><strong>Technology</strong></label>
              <p><p>@if($company->technology==1){{'Plant Technology'}}@else{{'Package'}}@endif</p></p>
            </div>

            <div class="col-lg-6 mt-3">
              <label><strong>Status</strong></label>
              <p>{{$company->active_flag}}</p>
            </div>

          </div>


        </div>
      </div>

      {{-- Project info card end --}}

      <div class="row">        
        {{--  Contacts--}}
        
      {{-- End Contacts--}}

       
       
      </div>
    </div>



    <div class="col-lg-4">
      <!-- Activities -->
      <div class="card">
        <div class="header">
          <h2>Comments</h2>                            
        </div>
        <div class="body">
          <form action="{{ route('company.addComment',$company) }}" method="post" >
            @csrf()
            <div class="form-group mb-2 {{ $errors->first('message', 'has-error')}}">
              <textarea class="form-control" name="message" rows="3" placeholder="Add your comment">{{ old('message') }}</textarea>
              <span class="help-block">{{ $errors->first('message', ':message') }}</span>
            </div>
            <div class=" text-right mb-3">                            
              <button type="submit" class="btn btn-info btn-sm">ADD</button>
            </div>
          </form>
          <div class="max-height-555">
          <ul class="timeline">
            @if(count($company->comments))
            @foreach($company->comments as $comment)
            <li class="timeline-item">
              <div class="timeline-info">
                <span>{{date('M d, Y', strtotime($comment->created_at)) }} @ {{date('h:m A', strtotime($comment->created_at)) }}</span>
              </div>
              <div class="timeline-marker"></div>
              <div class="timeline-content">                                       
                <p class="text-muted mt-0 mb-2"># {{ $comment->author['name'] }}</p>
                <p class="font-12">{{ $comment->message }}</p>
              </div>
            </li>
            @endforeach
            @endif
          </ul>
           </div>
        </div>
      </div>
      <!-- End Activities -->
  </div>
</div>


</div>





@endsection
@section('scripts')
<script src="{{asset('public/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.slimscroll.min.js')}}"></script>
<script type="text/javascript">
   $('#multiselect4-filter,#multiselect3-filter').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });

//Remove Team 
$('.remove-team').on('click',function(){
    var teamId =$(this).attr("data-id");
    var cnf_url = "{{ url('projects')}}"+'/'+ "{{$company->id}}" +'/'+ teamId+'/remove-team';
    $('#team-confirm-remove').attr('href',cnf_url);
});

//Remove Member 
$('.remove-member').on('click',function(){
    var memberId =$(this).attr("data-id");
    var cnf_url = "{{ url('projects')}}"+'/'+ "{{$company->id}}" +'/'+ memberId+'/remove-member';
    $('#member-confirm-remove').attr('href',cnf_url);
});

$('.max-height-555').slimscroll({
        height: '555px',
        size: '5px',
        opacity: 0.2,
        wheelStep : 5,
});

$('.teams-box').slimscroll({
        height: '350px',
        size: '5px',
        opacity: 0.2,
        wheelStep : 5,
});



</script>
@endsection