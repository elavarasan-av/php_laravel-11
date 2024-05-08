@extends('Layout.user')
@section('user')

<section class="banner_main">
   <div id="banner1" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#banner1" data-slide-to="0" class="active"></li>
         <li data-target="#banner1" data-slide-to="1"></li>
         <li data-target="#banner1" data-slide-to="2"></li>
         <li data-target="#banner1" data-slide-to="3"></li>
         <li data-target="#banner1" data-slide-to="4"></li>
      </ol>

      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <div class="carousel-caption">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="text-bg">
                           <span>Computer And Laptop</span>
                           <h1>Storage Solutions</h1>
                           <p>
                              Keep your data safe and accessible with our selection of storage solutions, including external hard drives, SSDs, and memory cards. Whether you need extra storage space for files, photos, or games, we have the right solution for you.
                           </p>
                           <a href="#">Buy Now </a> <a href="contact.html">Contact </a>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="text_img">
                           <figure><img src="{{url('userAsset/images/pct.png')}}" alt="#" /></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <div class="carousel-caption">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="text-bg">
                           <span>Ram Computers</span>
                           <h1>Desktops</h1>
                           <p>
                              Discover the power and versatility of desktop computers tailored to your specifications. Whether you're looking for a compact workstation for your home office or a powerhouse gaming desktop with customizable components, we've got you covered.
                           </p>
                           <a href="#">Buy Now </a> <a href="contact.html">Contact </a>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="text_img">
                           <figure><img src="{{url('userAsset/images/pct.png')}}" alt="#" /></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <div class="carousel-caption">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="text-bg">
                           <span>Computer And Laptop</span>
                           <h1> Laptops</h1>
                           <p>
                              Explore our diverse range of laptops designed to meet your needs, whether you're a student, professional, or gamer. From ultra-portable models for on-the-go productivity to high-performance gaming rigs, we have something for everyone.
                           </p>
                           <a href="#">Buy Now </a> <a href="contact.html">Contact </a>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="text_img">
                           <figure><img src="{{url('userAsset/images/pct.png')}}" alt="#" /></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>


      </div>
      <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
         <i class="fa fa-chevron-left" aria-hidden="true"></i>
      </a>
      <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
         <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
   </div>
</section>



<div class="three_box" style="background-color:#7BF7AC;">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="box_text">
               <i><img src="{{url('userAsset/images/thr.png')}}" alt="#" /></i>
               <h3>Computer</h3>
               <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            </div>
         </div>
         <div class="col-md-4">
            <div class="box_text">
               <i><img src="{{url('userAsset/images/thr1.png')}}" alt="#" /></i>
               <h3>Laptop</h3>
               <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            </div>
         </div>
         <div class="col-md-4">
            <div class="box_text">
               <i><img src="{{url('userAsset/images/thr2.png')}}" alt="#" /></i>
               <h3>Tablet</h3>
               <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="products" style="background-color:#7BF7AC;">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Products</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="our_products">
               <div class="row">
                  @foreach($category as $data)
                  <div class="col-md-6 margin_bottom1">
                     <div class="product_box">
                        <figure><img src="/images/categories/{{$data->Catimage}}" alt="#" /></figure>
                        <h3><a href="{{route('products',$data->CategoryName)}}">{{$data->CategoryName}}</a> </h3>
                     </div>
                  </div>
                  @endforeach


                  <!-- <div class="col-md-12">
                     <a class="read_more" href="#">See More</a>
                  </div> -->

               </div>
            </div>
         </div>
      </div>
   </div>
</div>





@endsection