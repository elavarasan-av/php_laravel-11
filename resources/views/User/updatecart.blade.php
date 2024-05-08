@extends('layout.user')
@section('user')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- <style>
    button:focus,
    input:focus {
        outline: none;
        box-shadow: none;
    }

    a,
    a:hover {
        text-decoration: none;
    }

    /*--------------------------*/
    .qty-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qty-container .input-qty {
        text-align: center;
        padding: 6px 10px;
        border: 1px solid #d4d4d4;
        max-width: 80px;
    }

    .qty-container .qty-btn-minus,
    .qty-container .qty-btn-plus {
        border: 1px solid #d4d4d4;
        padding: 10px 13px;
        font-size: 10px;
        height: 38px;
        width: 38px;
        transition: 0.3s;
    }

    .qty-container .qty-btn-plus {
        margin-left: -1px;
    }

    .qty-container .qty-btn-minus {
        margin-right: -1px;
    }
</style> -->

<body class="main-layout inner_posituong">

    <div class="contact">
        <div class="container">
<br>
            <div class="card mt-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-header bg-info">
                    <div class="">
                        <h1 class="text-center"><i class="bi bi-calendar2-range"> </i> Update cart</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('cartupdate',$product->ProdId)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group mt-3">
                                    <h2>Product Name :</h2>
                                    <h3 class="text-primary"><b>{{$product->ProductName}}</b></h3>
                                </div>

                                <div class="form-group mt-3">
                                    <h2>Product Quenty :</h2>

                                    <div class="input-group col-md-3">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="Qty" class="form-control input-number" value="{{$product->Qty}}" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <h2><b>Price :</b> <mark><span>Rs.{{$product->Price}}</span></mark> </h4>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2 mb-3">
                                <div class="text-center">
                                    <img src="/images/products/{{$product->Image}}" id="blah" alt="" style="width:80%;height:300px;" class="img-thumbnail" />
                                </div>
                                <input type="hidden" value="{{$product->id}}" name="ProdId">
                                <input type="hidden" value="{{$product->Price}}" name="Price">
                                <input type="hidden" value="{{$product->Prodimg}}" name="Image">
                            </div>

                        </div>
                        <div class="cart-footer">
                            <div class="text-center">
                                <a href="{{url()->previous()}}" class="btn btn-primary m-5"> <i class="bi bi-chevron-left"></i> Back</a>
                                <button class="btn btn-outline-info m-5">
                                    <i class="fa fa-solid fa-pen-to-square fa-shake fa-4x" style="color: #00f531;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>

@endsection