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

    <div class="mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">RamComputers Invoices</h2>
                <h4 class="text-end">Date : {{$time}}</h4>

            </div>
            <br>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
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

                            <td>{{$data->Qty}}</td>
                            <td>{{$data->Price}}.00</td>
                            <td>{{($data->Qty)*($data->Price)}}.00</td>
                        </tr>
                        <?php
                        @$tm += ($data->Qty) * ($data->Price);
                        ?>
                        @endforeach
                        <br>

                        <tr>
                            <th colspan="4" class="text-end">Amount:</th>
                            <th>
                                {{$tm}}.00
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-end">Shipping</th>
                            <th>
                                20.00
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-end">Total(Incl. taxes)</th>
                            <th>
                                {{20+$tm}}.00
                            </th>
                        </tr>


                    </tbody>


                </table>
            </div>


        </div>

    </div>
</body>

</html>