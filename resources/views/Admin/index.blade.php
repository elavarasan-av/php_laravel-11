@extends('Layout.admin')
@section('admin')


<div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <h5><i class="bi bi-journal-richtext"></i> Categories Details</h5>
            <a href="{{route('catAdd')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Categories</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>S.NO</th>
                    <th>Name</th>
                    <th width="40%">Image</th>
                    <th>Status</th>
                    <th width="20%">Action</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <a href="{{route('catshow',$category->id)}}">{{$category->CategoryName}}</a>
                    </td>
                    <td>
                        <img src="/images/categories/{{$category->Catimage}}" style="width: 100px;height:80px" alt="Category">

                    </td>
                    <td>
                        <h5 class="mt-3"> <span class="badge  {{($category->Status)==1?'bg-success':'bg-danger'}}"> {{($category->Status)==1?'Active':'Deactive'}} </span> </h5>
                    </td>
                    <td>
                        <div class="d-flex ms-5 mt-3">
                            <a href="{{route('catEdit',$category->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> </a>
                            <form action="{{route('catDelete',$category->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="imgvl" value="{{$category->Catimage}}">
                                <button class="btn btn-danger btn-sm ms-3" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
    </div>

</div>

@endsection