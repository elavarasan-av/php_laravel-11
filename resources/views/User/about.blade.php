@extends('Layout.user')
@section('user')


<body class="main-layout inner_posituong contact_page">
    <div class="contact">
        <div class="container">
            <div class="card mb-5" style=" position: relative ;top: 83px;bottom:50px;">

                <div class="row d_flex">
                    <div class="col-md-7">
                        <div class="titlepage mt-4 ms-3">
                            <h1 style="font-size: 30px;font-weight: bold;"> Welcome to Ram Computers</h1>
                            <p>
                                At Ram Computers, we're dedicated to providing top-quality products and exceptional service to meet all your computing needs. Since 2002, we've been serving the Birbhum community with a passion for technology and a commitment to customer satisfaction.</p>
                            <p>
                                <b>
                                    Our Mission is simple:</b> to be your trusted partner in all things tech. Whether you're a seasoned professional or a first-time buyer, we strive to offer expert guidance, reliable products, and personalized support to help you make the most of your technology investments.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="about_img">
                            <figure><img src="{{url('userAsset/images/about-bg.png')}}" alt="#" /></figure>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>


@endsection