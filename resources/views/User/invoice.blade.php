<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ram Computer Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">RamComputers Invoices</h2>
                <h4 class="text-end">Date : {{$time}}</h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($cart as $data)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$data->ProductName}}</td>
                            <td>
                                <img src="/images/products/{{$data->Prodimg}}" style="width: 100px;height:80px" alt="Category">
                            </td>
                            <td>{{$data->Qty}}</td>
                            <td><i class="bi bi-currency-rupee"></i>{{$data->Price}}.00</td>
                            <td><i class="bi bi-currency-rupee"></i>{{($data->Qty)*($data->Price)}}.00</td>
                        </tr>
                        <?php
                        @$tm += ($data->Qty) * ($data->Price);
                        ?>
                        @endforeach
                        <tr>
                            <th colspan="5" class="text-end">Amount:</th>
                            <th>
                                <i class="bi bi-currency-rupee"></i> {{$tm}}.00
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-end">Shipping</th>
                            <th>
                                <i class="bi bi-currency-rupee"></i> 20.00
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-end">Total(Incl. taxes)</th>
                            <th>
                                <i class="bi bi-currency-rupee"></i> {{20+$tm}}.00
                            </th>
                        </tr>


                    </tbody>


                </table>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{route('default')}}" class="btn btn-info btn-sm">Home</a>
                    </div>
                    <div class="col text-end">
                        <a href="{{route('pdf')}}" class="btn btn-success btn-sm">Download Invoice</a>
                    </div>


                </div>

            </div>


        </div>

    </div>


</body>

</html>