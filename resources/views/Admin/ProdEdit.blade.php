@extends('Layout.admin')
@section('admin')

  <div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
<div class="card-header">
<div class="">
           <h3 class="text-center"><span class="badge badge-pill bg-dark">Edit Product</span></h3>
</div>
</div>
<div class="card-body">
    <form action="{{route('product.upadte',$product->id)}}" class="was-validated" method="post" enctype="multipart/form-data" novalidate >
        @csrf
        @method('put')
<div class="row">
<div class="col-md-6">

    <div class="form-group has-validation mt-2">     
        <input type="text" name="ProductName" id="ProductName" class="form-control {{$errors->has('ProductName')? 'is-invalid':''}}" placeholder="Enter the ProductName" required value="{{old('ProductName',$product->ProductName)}}">
       @if($errors->has('ProductName'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('ProductName')}}</strong>
                        </span>
                        @endif
    </div>

    <div class="form-group has-validation mt-4">     
                 <select class="form-select mb-3" id="categoryName" name="categoryName" required focus >
    <option value=" {{$product->Category}}"  selected> {{$product->Category}} </option>          
    @foreach($category as $category1)
    <option value="{{$category1->CategoryName}}">{{ $category1->CategoryName }}</option>
    @endforeach

                 </select>
        @if($errors->has('categoryName'))
        <div class="invalid-feedback">{{$errors->first('categoryName')}}</div>
         @endif
               
    </div>
    <br>
    <div class="form-group has-validation mt-3">     
        <textarea name="description" id="description" class="form-control {{$errors->has('description')? 'is-invalid':''}}" style="resize:none" cols="20" rows="5" placeholder="Enter the Description" required> {{old('description',$product->Description)}}</textarea>
        @if($errors->has('description'))
        <div class="invalid-feedback">{{$errors->first('description')}}</div>
         @endif
    </div>
      <div class="form-group has-validation mt-4">     
        <input type="number" name="price" id="price" class="form-control" placeholder="Enter the price" required value="{{old('price',$product->Price)}}">
        @if($errors->has('price'))
        <div class="invalid-feedback">{{$errors->first('price')}}</div>
         @endif
    </div>
    <br><br>    
<hr>
    <div class="form-group mt-3 text-center">
        <a href="{{route('product.list')}}" class="btn btn-primary"> <i class="bi bi-chevron-left"></i> Back</a>
        <button  class="btn btn-success">Submit</button>
    </div>
</div>

<div class="col-md-6">
    <div class="text-center">
        <img id="blah" alt="" src="/images/products/{{$product->Prodimg}}" style="width:80%;height:300px;" class="img-thumbnail" />
    </div>

 <div class="form-group has-validation col-md-10 ms-5 mt-3">
      <label for="" class="form-lable">Select Image</label>
     <input type="file" 
    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="prdimage"  class="form-control mt-2"
      >
        <input type="hidden" value="{{$product->Prodimg}}" name="prdpic">
      @if($errors->has('prdimage'))
        <div class="invalid-feedback">{{$errors->first('prdimage')}}</div>
         @endif
    </div>

     <div class="form-check form-switch ms-5 mt-3">
         <input type="checkbox" class="form-check-input" name="prodstatus" value="1" {{$product->ProdStatus == 1 ? 'checked':''}} role="switch">
         <label for="status" class="form-check-label">Status</label>
    </div>
</div>
</div>
</form>


</div>
</div>

@endSection