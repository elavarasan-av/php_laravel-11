<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <link rel="icon" href="{{url('userAsset/images/logo1.png')}}" type="image/x-icon">

   <title>RamComputers</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- bootstrap css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <!--  alert msg  -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <link rel="stylesheet" href="{{url('userAsset/css/bootstrap.min.css')}}">
   <!-- style css -->
   <link rel="stylesheet" href="{{url('userAsset/css/style.css')}}">

   <!-- Responsive-->
   <link rel="stylesheet" href="{{url('userAsset/css/responsive.css')}}">
   <!-- fevicon -->
   <link rel="icon" href="{{url('userAsset/images/fevicon.png')}}" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{url('userAsset/css/jquery.mCustomScrollbar.min.css')}}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="{{url('userAsset/images/loading.gif')}}" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a class="navbar-brand" href="{{route('home')}}">
                              <img src="{{url('userAsset/images/logo.png')}}" alt="" width="100px" height="100px" alt="">
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href="{{route('default')}}">Home</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('about')}}">About</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('products',1)}}">Computer</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('products',2)}}">Laptop</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('products',3)}}">Products</a>
                           </li>

                           <li class="nav-item d_none">
                              <a class="nav-link position-relative" href="{{route('cart')}}">
                                 <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                 <span class="position-absolute top-0 start-099 translate-middle badge rounded-pill bg-danger">
                                    {{session()->get('count')}}
                                    <span class="visually-hidden">unread messages</span></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('registration')}}"> <i class="fa fa-user" aria-hidden="true"> </i>
                                 {{session()->get('name')==null?'User': (session()->get('name'))}}</a>
                           </li>
                           <li class="nav-item d_none">
                              <a class="nav-link" href="
                              {{session()->get('name')==null?route('login'):route('logout')}}"> {{session()->get('name')==null?'Login':'Logout' }}</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>

   @if($message=Session::get('infom'))
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
   @if($message=Session::get('error'))
   <script>
      // Swal.fire("{{$message}}");
      const Toast1 = Swal.mixin({
         toast: true,
         position: "top",
         width: "40em",
         icon: "error",
         background: "#F8E76A",
         color: "#020202 ",
         showConfirmButton: false,
         timer: 5000,
         timerProgressBar: true,
         didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
         }
      });
      Toast1.fire({
         icon: "error",
         title: "{{$message}}"
      });
   </script>
   @endif




   @yield('user')



   <footer>
      <div class="footer">
         <div class="container-fluide">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <img class="logo1" src="{{url('userAsset/images/logo.png')}}" alt="#" />
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <h3>About Us</h3>
                  <ul class="about_us">
                     <li>
                        Ready to experience the Ram Computers and Accessories difference? Visit our store today to explore our products, meet our team, and discover how we can help you harness the power of technology. Can't make it in person? Contact us via phone or email for personalized assistance.
                        <br>
                        Thank you for choosing Ram Computers ans Accessories - your trusted source for all things tech!
                     </li>
                  </ul>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <ul class="social_icon">
                     <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                     <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <h6 style="font-size:large;color:white;">© 2002 All Rights Reserved. Design by : <a style="color: green;" href="https://html.design/"> Human Cloud Soft</a></h6>
               </div>
            </div>
         </div>
      </div>
      </div>
   </footer>
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="{{url('userAsset/js/jquery.min.js')}}"></script>
   <script src="{{url('userAsset/js/popper.min.js')}}"></script>
   <script src="{{url('userAsset/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{url('userAsset/js/jquery-3.0.0.min.js')}}"></script>
   <!-- sidebar -->
   <script src="{{url('userAsset/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
   <script src="{{url('userAsset/js/custom.js')}}"></script>



</body>

</html>