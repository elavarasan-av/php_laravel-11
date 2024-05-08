@extends('Layout.admin')
@section('admin')

<div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
    <div class="card-header">
        <div class="">
            <h3 class="text-center"><i class="bi bi-calendar2-range"></i> Products Details</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group mt-3">
                    <h4>Product Name :</h4>
                    <h5 class="text-primary">{{$product->ProductName}}</h5>
                </div>

                <div class="form-group mt-3">
                    <h4>Category :</h4>
                    <h5 class="text-warning">{{$product->Category}}</h5>
                </div>

                <div class="form-group mt-3">
                    <h4>Product Descreption :</h4>
                    <h6 class="form-control">{{$product->Description}}</h6>
                </div>

                <br>
                <hr>
                <div class="form-group mt-5 ms-3 ">
                    <a href="{{route('product.list')}}" class="btn btn-primary"> <i class="bi bi-chevron-left"></i> Back</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="text-center">
                    <img src="/images/products/{{$product->Prodimg}}" id="blah" alt="" style="width:80%;height:300px;" class="img-thumbnail" />
                </div>

                <div class=" mt-5">
                    <h4>Price : <span>₹ {{$product->Price}}</span> </h4>

                </div>

                <div class="form-group mt-3">
                    <h5>Status :
                        <span class=" badge  {{($product->ProdStatus=='1')?'bg-success':'bg-danger'}}"> {{($product->ProdStatus=='1')?'Active':'Deactive'}} </span>
                    </h5>
                </div>

            </div>

        </div>
    </div>
</div>


@endSection