@extends('Layout.user')
@section('user')

<body class="main-layout inner_posituong">
    <div class="contact">

        <section class="book_section layout_padding">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title mb-4">
                                    <div class="d-flex justify-content-start">
                                        <div class="image-container">

                                            <img id="imgProfile" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" style="width: 150px; height: 150px;" class="img-thumbnail" />
                                            <div class="middle pt-2">
                                                <a href="#" class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>User Details
                                                </a>
                                            </div>
                                        </div>

                                        <div class="userData ml-3">
                                            <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">
                                                {{session()->get('name')}}
                                            </h2>
                                            <h6 class="d-block">
                                                {{session()->get('mobile')}}

                                            </h6>
                                            <h6 class="d-block">
                                                {{session()->get('email')}}

                                            </h6>
                                            <h6 class="d-block">
                                                {{session()->get('date')}}

                                            </h6>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active text-info" id="basicInfo_Tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true"><i class="fa fa-id-badge mr-2"></i>Basic Info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-info" id="connected_Tab" data-toggle="tab" href="#OrderHis" role="tab" aria-controls="connected" aria-selected="false"><i class="fa fa-clock mr-2"></i>Purchased History</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content ml-1" id="myTabContent">
                                            <!-- <%--Basic User Info Starts--%> -->
                                            <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-3 col-5">
                                                        <label style="font-weight: bold;">Name</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        {{session()->get('name')}}
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-3 col-5">
                                                        <label style="font-weight: bold;">Mobile</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        {{session()->get('mobile')}}
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-3 col-5">
                                                        <label style="font-weight: bold;">Email</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        {{session()->get('email')}}
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-3 col-5">
                                                        <label style="font-weight: bold;">Password</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        {{$user->password}}
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                            <!-- <%--Basic User Info End--%> -->




                                            <!-- <%--Order history Starts--%> -->
                                            <div class="tab-pane fade" id="OrderHis" role="tabpanel" aria-labelledby="connected_Tab">

                                                <div class="container">


                                                    <table class="table data-table-export table-responsive-sm table-bordered table-hover">
                                                        <thead class="bg-dark text-white">
                                                            <tr>
                                                                <th>Products Name</th>
                                                                <th>Unit Price</th>
                                                                <th>Quantity</th>
                                                                <th>Total Price</th>
                                                                <th>OrderId</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($order as $data)
                                                            <tr class="text-center">
                                                                <td>
                                                                    {{$data->ProductName}}
                                                                </td>
                                                                <td>
                                                                    <i class="bi bi-currency-rupee"></i> {{$data->Price}}.00
                                                                </td>
                                                                <td>
                                                                    {{$data->Qty}}
                                                                </td>
                                                                <td><i class="bi bi-currency-rupee"></i>{{($data->Qty)*($data->Price)}}.00
                                                                </td>
                                                                <td>
                                                                    {{$data->OrderNo}}
                                                                </td>
                                                                <td>
                                                                    <span class="{{($data->Status=='Pending')?'badge badge-warning':'badge badge-success'}}">{{$data->Status}}</span>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{$order->links()}}
                                                </div>

                                            </div>
                                            <!-- order histry -->
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

</body>



@endsection