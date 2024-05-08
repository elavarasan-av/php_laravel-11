@extends('Layout.admin')
@section('admin')


  <div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
<div class="card-header">

     <div class="d-flex justify-content-between">
            <h5><i class="bi bi-journal-richtext"></i> Product Details</h5>
            <a href="{{route('product.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Product</a>
        </div>

</div>
<div class="card-body">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>S.NO</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th width="20%">Action</th>
                
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($prod as $products)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td >
                    <a href="{{route('product.details',$products->id)}}" >{{$products->ProductName}}</a>
                </td>
                <td>
                    <img  src="/images/products/{{$products->Prodimg}}"  style="width: 100px;height:80px" alt="Category">

                </td>
                <td >
                    <h5 class="mt-3"> <span class="badge  {{($products->ProdStatus)==1?'bg-success':'bg-danger'}}"> {{($products->ProdStatus)==1?'Active':'Deactive'}} </span>  </h5>
                </td>
                <td>
                    <div class="d-flex ms-5 mt-3">
                    <a href="{{route('product.edit',$products->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> </a>
                    <form action="{{route('product.delete',$products->id)}}" method="post">
                    @method('delete')   
                    @csrf

                    <input type="hidden" name="pdimg" value="{{$products->Prodimg}}">
                    <button class="btn btn-danger btn-sm ms-3" type="submit"><i class="bi bi-trash"></i></button>
                   </form>
                   </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
       {{$prod->links()}}

</div>

</div>

@endsection
