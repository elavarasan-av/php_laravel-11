@extends('Layout.admin')
@section('admin')

 <div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
<div class="card-header">
<div class="">
    <h3 class="text-center"><i class="bi bi-calendar2-range"></i> Category Details</h3>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-md-6">

    <div class="form-group mt-5"> 
        <h6>Cetegory Name :</h6>    
       <h5>{{$category->CategoryName}}</h5>

    </div>

     <div class="form-group mt-3">
        <h6>Status</h6>
        <h5>{{($category->Status=='1')?'Active':'Deactive'}}</h5>
    </div>
    <br>
<hr>
    <div class="form-group mt-5 text-center">
        <a href="{{route('home')}}" class="btn btn-primary">Back</a>
    </div>
</div>

<div class="col-md-6">
    <div class="text-center">
       <h3><span class="badge badge-pill bg-primary">Image</span></h3>
        <img src="/images/categories/{{$category->Catimage}}" id="blah" alt="" style="width:80%;height:250px;" class="img-thumbnail" />
    </div>
</div>

</div>
</div>
</div>


@endSection