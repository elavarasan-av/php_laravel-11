<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{url('userAsset/images/logo1.png')}}" type="image/x-icon">

    <title>RamComputers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--  alert msg  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav class="navbar navbar-expand bg-black">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('default')}}" class="navbar-brand text-light">Ram Computers</a>
                </div>
                <div class="col-md-8 d-flex">
                    <ul class="navbar-nav ml-5">
                        <li class="nav-item ms-5">
                            <a href="{{route('home')}}" class="navbar-brand text-light"><i class="bi bi-bag-plus-fill"></i> Categories</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a href="{{route('product.list')}}" class="navbar-brand text-light"><i class="bi bi-folder-plus"></i> Products</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a href="{{route('orderstatus')}}" class="navbar-brand text-light">Users <i class="bi bi-card-list"></i></a>
                        </li>
                        <li class="nav-item ms-5">
                            <a href="{{route('logout')}}" class="navbar-brand text-light">Logout {{Session::get('name')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @if($message=Session::get('success'))
        <script>
            // Swal.fire("{{$message}}");
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{$message}}"
            });
        </script>
        @endif

        <!-- @if($message=Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            <strong>Success </strong> {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif -->

        @yield('admin')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>