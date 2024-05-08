@extends('layout.user')
@section('user')
<!-- <link rel="stylesheet" href="{{url('userAsset/css/payment.css')}}"> -->

<body class="main-layout inner_posituong">

    <div class="contact">
        <div class="container">

            <section class="h-100 h-custom mt-5" style="background-color: #eee; border-radius:10px;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card">
                                <div class="card-body p-4">

                                    <div class="row">

                                        <div class="col-lg-7">
                                            <h4 class="mb-5"><a href="{{route('products',3)}}" class="text-body">

                                                    <i class="bi bi-arrow-left-square-fill fs-4"></i>

                                                    Continue shopping</a></h4>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    <p class="mb-1">Shopping cart</p>
                                                    <p class="mb-0">You have {{session()->get('count')}} items in your cart</p>
                                                </div>

                                            </div>
                                            @foreach($cart as $data)
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img src="/images/products/{{$data->Image}}" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5>{{$data->ProductName}}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0">{{$data->Qty}}</h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0"><i class="bi bi-currency-rupee"></i>{{($data->Qty)*($data->Price)}}</h5>
                                                            </div>
                                                            <a href="#!" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-5">

                                            <div class="card bg-primary text-white rounded-3">
                                                <div class="card-body">
                                                    <h3 style="font-size:40px;color:white;" class="text-center">Card details</h3>

                                                    <a href="#!" type="submit" class="text-white"><i class="fa fa-cc-mastercard fa-2x me-2"></i></a>
                                                    <a href="#!" type="submit" class="text-white"><i class="fa fa-cc-visa fa-2x me-2"></i></a>

                                                    <a href="#!" type="submit" class="text-white"><i class="fa fa-cc-paypal fa-2x"></i></a>

                                                    <form class="mt-4" action="{{route('checkout')}}" method="POST">
                                                        @csrf
                                                        <div data-mdb-input-init class="form-outline form-white mb-3">
                                                            <label class="form-label" for="typeName">Cardholder's Name</label>
                                                            <input type="text" name="CardName" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Cardholder's Name" required />
                                                            @if($errors->has('CardName'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{$errors->first('CardName')}}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div data-mdb-input-init class="form-outline form-white mb-3">
                                                            <label class="form-label" for="typeText">Card Number</label>
                                                            <input type="text" name="CardNo" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="16" maxlength="16" required />
                                                            @if($errors->has('CardNo'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{$errors->first('CardNo')}}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <div data-mdb-input-init class="form-outline form-white">
                                                                    <label class="form-label" for="typeExp">Expiration</label>
                                                                    <input type="text" name="ExpDate" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div data-mdb-input-init class="form-outline form-white">
                                                                    <label class="form-label" for="typeText">Cvv</label>
                                                                    <input type="password" name="Cvv" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="Customerid" value="{{session()->get('id')}}">
                                                        <input type="hidden" name="Amount" value="{{session()->get('tamount')}}">



                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-2">Subtotal</p>
                                                            <p class="mb-2"><i class="bi bi-currency-rupee"></i>{{session()->get('tamount')}}.00</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-2">Shipping</p>
                                                            <p class="mb-2"><i class="bi bi-currency-rupee"></i>20.00</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-4">
                                                            <p class="mb-2">Total(Incl. taxes)</p>
                                                            <p class="mb-2"><i class="bi bi-currency-rupee"></i>{{20+(session()->get('tamount'))}}.00</p>
                                                        </div>

                                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
                                                            <div class="d-flex justify-content-between">
                                                                <span><i class="bi bi-currency-rupee"></i>{{20+session()->get('tamount')}}</span>
                                                                <span>Checkout <i class="fa fa-long-arrow-right fa-lg ms-2"></i></span>
                                                            </div>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
</body>


<!-- <script src="{{url('userAsset/js/payment.js')}}"></script> -->

@endsection