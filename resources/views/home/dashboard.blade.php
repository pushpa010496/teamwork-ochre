
@extends('../layouts/pms')

@section('content')
<style type="text/css">
    .self-mid {
     display: flex;
     align-items: center;
     padding-top: 140px;
     padding-bottom: 140px;
     background-color: #f5f5f5;
     margin: auto;
     /*background-color: #fff;*/
 }
 .Page-Middle {
    width: 100%;
    max-width: 1000px;
    padding: 15px;
    margin: auto;
}
.Main-Btn {padding: 20px 50px; border-radius: 50px; font-size: 20px;}
</style>

<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h1 class="text-danger display-4">Ochre Media Customer Relationship Management</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="self-mid">
                    <div class="body Page-Middle">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12 mt-3 mb-3 text-center">
                                <a href="{{route('webportals')}}" class="btn btn-lg btn-warning font-weight-bold Main-Btn">Web Portals</a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12 mt-3 mb-3 text-center">
                                <a href="" class="btn btn-lg btn-info font-weight-bold Main-Btn">Print Portals</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
@endsection