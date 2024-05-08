@extends('Layout.admin')
@section('admin')

<div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
    <div class="card-header">
        <div class="">
            <h3 class="text-center">Category</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('catStored')}}" class="was-validated" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group has-validation mt-5">
                        <input type="text" name="CategoryName" id="CategoryName" class="form-control {{$errors->has('CategoryName')? 'is-invalid':''}} " placeholder="Enter the Category" required value="{{old('name')}}">
                        @if($errors->has('CategoryName'))
                        <div class="invalid-feedback">{{$errors->first('CategoryName')}}</div>
                        @endif

                    </div>

                    <div class="form-group mt-3">
                        <label for="" class="form-lable">Select Image</label>
                        <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="Catimage" id="Catimage" class="form-control file is-invalid mt-2" required>

                        @if($errors->has('Catimage'))
                        <div class="invalid-feedback">{{$errors->first('Catimage')}}</div>
                        @endif
                    </div>

                    <div class="form-check form-switch mt-3">
                        <input type="checkbox" class="form-check-input" name="Status" id="Status" value="1" role="switch">
                        <label for="Status" class="form-check-label">Status</label>

                    </div>
                    <br>
                    <hr>
                    <div class="form-group mt-5 text-center">
                        <a href="{{route('home')}}" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-center">
                        <h3><span class="badge badge-pill bg-primary">Image</span></h3>
                        <img id="blah" alt="" style="width:80%;height:300px;" class="img-thumbnail" />
                    </div>
                </div>

            </div>
        </form>


    </div>
</div>








@endSection