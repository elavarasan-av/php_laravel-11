@extends('Layout.user')
@section('user')

<body class="main-layout inner_posituong">

    <div class="contact">
        <div class="container">


            <div class="card mt-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-header bg-info">
                    <div class="">
                        <h1 class="text-center"><i class="bi bi-calendar2-range"> </i> Products Details</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('addtocart')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group mt-3">
                                    <h2>Product Name :</h2>
                                    <h3 class="text-primary"><b>{{$product->ProductName}}</b></h3>
                                </div>

                                <div class="form-group mt-3">
                                    <h2>Category :</h2>
                                    <h3 class="text-warning"><b>{{$product->Category}}</b></h3>
                                </div>

                                <div class="form-group mt-3">
                                    <h2>Product Descreption :</h2>
                                    <h3 class="form-control"><b>{{$product->Description}}</b></h3>
                                </div>
                                <div class="form-group mt-3">
                                    <h2><b>Price :</b> <mark><span>Rs.{{$product->Price}}</span></mark> </h4>

                                </div>


                                <div class="form-group mt-5 ms-3 ">
                                    <a href="{{url()->previous()}}" class="btn btn-primary"> <i class="bi bi-chevron-left"></i> Back</a>

                                </div>
                            </div>

                            <div class="col-md-6 mt-2 mb-3">
                                <div class="text-center">
                                    <img src="/images/products/{{$product->Prodimg}}" id="blah" alt="" style="width:80%;height:300px;" class="img-thumbnail" />
                                </div>
                                <input type="hidden" value="{{$product->ProductName}}" name="ProductName">
                                <input type="hidden" value="{{$product->id}}" name="ProdId">
                                <input type="hidden" value="{{$product->Price}}" name="Price">
                                <input type="hidden" value="{{$product->Prodimg}}" name="Image">
                                <br>
                                <div class="form-group mt-5 text-end">

                                    <button class="btn btn-outline-info">
                                        <i class="fa fa-solid fa-cart-plus fa-beat fa-3x" style="color: #12f60e;"></i>
                                    </button>
                                </div>

                            </div>

                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
</body>


@endsection