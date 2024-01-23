@extends('../layouts/pms')
<style type="text/css">
  .paginate_button {
    color: #fff !important;
    font-weight:200;
    
}
.dataTables_info
{
   color: #fff !important;
    font-weight:200;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                       
                       <li class="breadcrumb-item active" aria-current="page"><a href="{{url('companyinfo')}}">Company</a></li>
                        </ol>
                    </nav>
                </div>            
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                                       
                </div>
            </div>
        </div>
        <form action="{{route('companies.export_excel.post')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for='technology' class='px-1' style='color:#ffffff;font-weight:bold;'>Technology :</label>
                      <!-- <select name="technology" id="technology"  class="form-control" style="border-color:#F95700FF;border-radius: 25px"> -->
                      <select name="technology_id[]" id="select2Multiple"  class="select2-multiple form-control" multiple="multiple"  style="background: #fff;">
                        <option value="">Select Technology</option>
                        @foreach($technologies as $tech)
                        <option value="{{$tech->id}}">{{$tech->technologie}}</option>
                        @endforeach
                      </select>
                    </div> 
               </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for='technology' class='px-1' style='color:#ffffff;font-weight:bold;'>Company Type :</label>
                    <select name="company_type[]" id="select2Multiple"  class="select2-multiple form-control" multiple="multiple"  style="background: #fff;">
                    <!-- <select name="companytype" id="companytype"  class="form-control" style="border-color:#F95700FF;border-radius: 25px"> -->
                        <option value="">Select Company Type </option>
                        @foreach($companytypes as $type)
                        <option value="{{$type->type}}">{{$type->company}}</option>
                        @endforeach
                      </select>
                    </div> 
              </div>
                <div class="col-md-4 align-self-center">
                    <div class="form-group pt-4">
                      <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div> 
                </div>
            </div>
             </form>
    </div>
<!--Edit Modal -->

@endsection

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style type="text/css">
  .head-style{
    width: 100%;
    height: 1px;
    background-color: #c1272d;
  }
</style>
<script>
        $(document).ready(function() {
            // Select2 Multiple

            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
              
            });

        });

    </script>

@section('scripts')
@endsection