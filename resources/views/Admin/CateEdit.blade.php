@extends('Layout.admin')
@section('admin')

  <div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
<div class="card-header">
<div class="">
    <h3 class="text-center"><i class="bi bi-pencil-square"></i>  Update Category</h3>
</div>
</div>
<div class="card-body">
    <form action="{{route('catupdate',$category->id)}}" method="post" class="was-validated" enctype="multipart/form-data" >
    @method('put')    
    @csrf
<div class="row">
<div class="col-md-6">

    <div class="form-group has-validation mt-5">     
        <input type="text" name="categoryName" id="categoryName" class="form-control" placeholder="Enter the Category" required value="{{old('name',$category->CategoryName)}}">
        @if($errors->has('categoryName'))
        <div class="invalid-feedback">{{$errors->first('categoryName')}}</div>
         @endif
    </div>

     <div class="form-group mt-3">
      <label for="" class="form-lable">Select Image</label>
     <input type="file" 
    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="image"   class="form-control mt-2">
    <input type="hidden" name="hidpic" value="{{$category->Catimage}}" >
    </div>

     <div class="form-check form-switch mt-3">
         <input type="checkbox" class="form-check-input" name="status" value="1" {{$category->Status == '1' ? 'checked':''}} role="switch">
         <label for="status" class="form-check-label">Status</label>
    </div>
    <br>
<hr>
    <div class="form-group mt-5 text-center">
        <a href="{{route('home')}}" class="btn btn-primary">Back</a>
<button  class="btn btn-warning">Update</button>
    </div>
</div>

<div class="col-md-6">
    <div class="text-center">
       <h3><span class="badge badge-pill bg-primary">Image</span></h3>
        <img id="blah" alt="" src="/images/categories/{{$category->Catimage}}"  style="width:80%;height:250px;" class="img-thumbnail" />
    </div>
</div>

</div>
</form>


</div>
</div>








@endSection