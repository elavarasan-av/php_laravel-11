@extends('Layout.admin')
@section('admin')


<div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <h5><i class="bi bi-journal-richtext"></i> Order Details</h5>
            <a href="#" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Categories</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>S.NO</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>OrderNo</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($order as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->ProductName}}</td>
                    <td>
                        <img src="/images/products/{{$data->Prodimg}}" style="width: 100px;height:80px" alt="Category">
                    </td>
                    <td>{{$data->OrderNo}}</td>
                    <td>
                        <h5 class="mt-3"><span class="badge {{($data->Status)=='Pending'?'bg-warning':'bg-success'}}"> {{($data->Status)}} </span> </h5>
                    </td>
                    <td>

                        <form action="{{route('orderupdate')}}" enctype="multipart/form-data" method="post">
                            @method('put')
                            @csrf
                            <div class="d-flex m-2">
                                <select class="form-select form-select-sm" name="Status" id="Status">
                                    <option value="{{$data->Status}}" selected>{{$data->Status}}</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Dispatch">Dispatch</option>
                                    <option value="Delivery">Delivery</option>
                                </select>
                                <input type="hidden" name="OrderNo" id="OrderNo" value="{{$data->OrderNo}}">
                                <button class="btn btn-warning btn-sm ms-1"><i class="bi bi-pencil-square"></i></button>
                            </div>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$order->links()}}
    </div>

</div>

@endsection