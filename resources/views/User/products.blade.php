@extends('Layout.user')
@section('user')

<body class="main-layout inner_posituong">

    <div class="contact">
        <div class="container-fluide">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage mt-5">
                            <h2>Our {{session()->get('titel')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="our_products" style="background-color:#7BF7AC;">
                            <div class="row">

                                <div class="container">
                                    <div class="row">
                                        @foreach($products as $data)

                                        <div class="col-md-4 mt-5">
                                            <div class="card h-100">
                                                <div class="card-heder h-100 shadow-sm"> <img src="/images/products/{{$data->Prodimg}}" class="card-img-top" alt="...">
                                                </div>
                                                <form action="{{route('addtocart')}}" method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary">{{$data->ProductName}}</span> <span class="float-end"><i class="bi bi-currency-rupee"></i> {{$data->Price}}.00</span> </div>
                                                        <h5 class="card-title">{{$data->Description}}</h5>
                                                        <input type="hidden" value="{{$data->id}}" name="ProdId">
                                                        <input type="hidden" value="{{$data->ProductName}}" name="ProductName">
                                                        <input type="hidden" value="{{$data->Price}}" name="Price">
                                                        <input type="hidden" value="{{$data->Prodimg}}" name="Image">
                                                    </div>
                                                    <div class="card-footer">

                                                        <div class="btn-toolbar justify-content-between">
                                                            <div class=" my-4"> <a href="{{route('details',$data->id)}}" class="btn btn-warning">Check Details</a>
                                                            </div>
                                                            <div class="my-4">
                                                                <button class="btn btn-primary">
                                                                    Add Cart
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

@endsection