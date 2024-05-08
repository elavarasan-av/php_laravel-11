@extends('Layout.user')
@section('user')



<body class="main-layout inner_posituong contact_page">

    <div class="contact">
        <div class="container mt-5">
            <br>
            <div class="card mt-2 col-8 offset-2" style=" background-color:#F0F8FF; border-radius:20px; width: 90%;">
                <div class="row">


                    <div class="card-header">
                        <h1 class="text-center" style="font-size: 40px;font-weight: bold;">Login</h1>
                    </div>

                </div>


                <div class="card-body">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{route('logver')}}" class="was-validated" method="post" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="">
                                    <div class="form-group has-validation mt-2">
                                        <input type="email" name="email" id="email" class="form-control {{$errors->has('email')? 'is-invalid':''}}" placeholder="Enter the Email" required value="{{old('email')}}">
                                        @if($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('email')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group has-validation mt-2">
                                        <input type="password" name="password" id="password" class="form-control {{$errors->has('password')? 'is-invalid':''}}" placeholder="Enter the Password" required value="{{old('password')}}">
                                        @if($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('password')}}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <br>
                                    <div class="">

                                        <div class="form-group mt-3 text-center">
                                            <a href="{{route('default')}}" class="btn btn-primary float-left"> <i class="bi bi-chevron-left"></i> Back</a>
                                            <button class="btn btn-success">Sigin</button>
                                            <a href="{{route('registration')}}" class=" float-right"> Are you <span class="badge badge-info"> NewUser?</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>




@endsection