@extends('layout.user')
@section('user')

<body class="main-layout inner_posituong">

    <div class="contact">
        <div class="container">
            <div class="card mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $data)
                        <tr>
                            <form action="{{route('cartdestroyed',$data->ProdId)}}" method="POST">
                                @csrf
                                @method('delete')
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$data->ProductName}}</td>
                                <td>
                                    <img src="/images/products/{{$data->Image}}" style="width: 100px;height:80px" alt="Category">
                                </td>
                                <td>{{$data->Qty}}</td>
                                <td><i class="bi bi-currency-rupee"></i>{{$data->Price}}.00</td>
                                <td><i class="bi bi-currency-rupee"></i>{{($data->Qty)*($data->Price)}}.00</td>
                                <td>

                                    <a href="{{route('cartshow',$data->ProdId)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> </a>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>

                                </td>
                            </form>
                        </tr>


                        @endforeach
                        <?php
                        $tot = 0;
                        foreach ($cart as $tt) {
                            $tot += (($tt->Qty) * ($tt->Price));
                        }
                        session()->put('tamount', $tot);
                        ?>
                        <tr>
                            <th colspan="5" class="text-end">Amount</th>
                            <th>
                                <i class="bi bi-currency-rupee"></i> {{$tot}}.00
                            </th>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th><a href="{{route('products',3)}}" class="btn btn-info btn-sm">go to purches</a></th>
                            <th colspan="5" class="text-end"> <a href="{{route('payment')}}" class="btn btn-success btn-sm">Buy Now</a>

                            </th>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>


@endsection