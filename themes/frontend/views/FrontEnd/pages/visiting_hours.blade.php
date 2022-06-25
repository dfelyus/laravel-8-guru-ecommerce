@section('head')

<link href="{{asset('/')}}FrontEndSourceFile/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="{{asset('/')}}FrontEndSourceFile/css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="{{asset('/')}}FrontEndSourceFile/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('/')}}FrontEndSourceFile/css/owl.carousel.css" type="text/css" media="all" /> <!-- Owl-Carousel-CSS -->
<!-- //Custom Theme files -->

<!-- Bootstrap core CSS -->
<link href="{{asset('/')}}BackEndSourceFile/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="{{asset('/')}}BackEndSourceFile/dist/css/adminlte.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="{{asset('/')}}BackEndSourceFile/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- Custom styles for this template -->
<!-- Styles -->

<!-- js -->
<script src="{{asset('/')}}FrontEndSourceFile/js/jquery-2.2.3.min.js"></script>
<!-- //js -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
<!-- //web-fonts -->


<!--  -->
<!-- Vendor CSS Files -->
<link href="{{asset('/')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/venobox/venobox.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/aos/aos.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Vendor CSS Files -->


<link href="{{asset('/')}}assets/css/style.css" rel="stylesheet">
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid;
        border-radius: 4px;
        background-color: white;

        box-shadow: 8 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 8 1px 3px 8 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }


    .myContainer {
        position: relative;
        text-align: center;
        color: white;
    }

    /* Centered text*/
    .myCenter {
        position: absolute;
        top: 58%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

@endsection














@extends('FrontEnd.master')
@section('title')
Visiting Hours
@endsection

@section('content')
<div class="add-products">
    <div class="container">
        <div class="add-products-row">
            <div class="w3ls-add-grids">
                <a href="menu.html">
                    <h4>Get <span>20%<br>Cashback</span></h4>
                    <h5>Ordered in mobile app only </h5>
                    <h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                </a>
            </div>
            <div class="w3ls-add-grids w3ls-add-grids-right">
                <a href="menu.html">
                    <h4>GET Upto<span><br>40% Offer</span></h4>
                    <h5>Sunday special discount</h5>
                    <h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                </a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //add-products -->
<!-- order -->
<div class="wthree-order">
    <img src="images/i2.jpg" class="w3order-img" alt="" />
    <div class="container">
        <h3 class="w3ls-title">How To Order Online Food</h3>
        <p class="w3lsorder-text">Get your favourite food in 4 simple steps.</p>
        <div class="order-agileinfo">
            <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                <div class="order-w3text">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h5>Search Area</h5>
                    <span>1</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                <div class="order-w3text">
                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                    <h5>Choose Food</h5>
                    <span>2</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                <div class="order-w3text">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <h5>Pay Money</h5>
                    <span>3</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                <div class="order-w3text">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <h5>Enjoy Food</h5>
                    <span>4</span>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //order -->
<!-- deals -->
<div class="w3agile-deals">
    <div class="container">
        <h3 class="w3ls-title">Special Services</h3>
        <div class="dealsrow">
            <div class="col-md-6 col-sm-6 deals-grids">
                <div class="deals-left">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                </div>
                <div class="deals-right">
                    <h4>FREE DELIVERY</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 col-sm-6 deals-grids">
                <div class="deals-left">
                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                </div>
                <div class="deals-right">
                    <h4>Party Orders</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 col-sm-6 deals-grids">
                <div class="deals-left">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="deals-right">
                    <h4>Team up Scheme</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 col-sm-6 deals-grids">
                <div class="deals-left">
                    <i class="fa fa-building" aria-hidden="true"></i>
                </div>
                <div class="deals-right">
                    <h4>corporate orders</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //deals -->
<!-- dishes -->
<div class="w3agile-spldishes">
    <div class="container">
        <h3 class="w3ls-title">Special Foods</h3>
        <div class="spldishes-agileinfo">
            <div class="col-md-3 spldishes-w3left">
                <h5 class="w3ltitle">Staple Specials</h5>
                <p>Vero vulputate enim non justo posuere placerat Phasellus mauris vulputate enim non justo enim .</p>
            </div>
            <div class="col-md-9 spldishes-grids">
                <!-- Owl-Carousel -->
                <div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
                    @foreach($dishes as $dish)
                    <a href="{{route('category_dish',['category_id'=>$dish->category_id])}}" class="item g1">
                        <img class="lazyOwl" src="{{asset(''.$dish->dish_image)}}" style="" title="Our latest gallery" alt="" />
                        <div class="agile-dish-caption">
                            <h4>{{$dish->dish_name}}</h4>
                            <span>{{$dish->dish_detail}}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //dishes -->


<!-- ======= Services Section ======= -->
<section class="services">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                <div class="icon-box icon-box-pink">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box icon-box-green">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4 class="title"><a href="">Magni Dolores</a></h4>
                    <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box icon-box-blue">
                    <div class="icon"><i class="bx bx-world"></i></div>
                    <h4 class="title"><a href="">Nemo Enim</a></h4>
                    <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Services Section -->


<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Portfolio</h2>
            <p>Check our Portfolio</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="{{asset('/')}}assets/img/screen/res9.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="{{asset('/')}}assets/img/screen/res9.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="{{asset('/')}}assets/img/screen/res8.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                            <a href="{{asset('/')}}assets/img/screen/res8.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 2</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 2</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Portfolio Section -->



<section id="faq">
    <div class="container">

        <div class="section-header">
            <h3 class="section-title">Frequently Asked Questions</h3>
            <span class="section-divider"></span>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <ul id="faq-list" class="wow fadeInUp">
            <li>
                <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="ion-android-remove"></i></a>
                <div id="faq1" class="collapse" data-parent="#faq-list">
                    <p>
                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="ion-android-remove"></i></a>
                <div id="faq2" class="collapse" data-parent="#faq-list">
                    <p>
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="ion-android-remove"></i></a>
                <div id="faq3" class="collapse" data-parent="#faq-list">
                    <p>
                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="ion-android-remove"></i></a>
                <div id="faq4" class="collapse" data-parent="#faq-list">
                    <p>
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
                <div id="faq5" class="collapse" data-parent="#faq-list">
                    <p>
                        Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                    </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="ion-android-remove"></i></a>
                <div id="faq6" class="collapse" data-parent="#faq-list">
                    <p>
                        Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                    </p>
                </div>
            </li>

        </ul>

    </div>
</section><!-- End Frequently Asked Questions Section -->



<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">

        <div class="section-title">
            <h2>Team</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="member">
                    <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.1s">
                <div class="member">
                    <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
                <div class="member">
                    <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
                <div class="member">
                    <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Team Section -->



<!-- ======= Venue Section ======= -->
<section id="venue">

    <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
            <h2>Event Venue</h2>
            <p>Event venue location info and gallery</p>
        </div>

        <div class="row no-gutters">
            <div class="col-lg-6 venue-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="col-lg-6 venue-info">
                <div class="row justify-content-center">
                    <div class="col-11 col-lg-8">
                        <h3>Downtown Conference Center, New York</h3>
                        <p>Iste nobis eum sapiente sunt enim dolores labore accusantium autem. Cumque beatae ipsam. Est quae sit qui voluptatem corporis velit. Qui maxime accusamus possimus. Consequatur sequi et ea suscipit enim nesciunt quia velit.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row no-gutters">

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/1.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res2.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/2.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res3.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/3.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res4.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/4.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res5.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/5.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res6.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/6.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res7.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/7.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res8.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="assets/img/venue-gallery/8.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res9.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

        </div>
    </div>

</section><!-- End Venue Section -->





@endsection







@section('foot')
<script src="{{asset('/')}}js/jquery.js"></script>
<script src="{{asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{asset('/')}}assets/vendor/php-email-form/validate.js"></script>
<script src="{{asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}assets/vendor/venobox/venobox.min.js"></script>
<script src="{{asset('/')}}assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/vendor/aos/aos.js"></script>
<script src="{{asset('/')}}assets/js/main.js"></script>

<!-- slide menu JS Files -->
<script src="{{asset('/')}}assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="{{asset('/')}}assets/vendor/counterup/counterup.min.js"></script>


<!-- gallery js -->
<script src="{{asset('/')}}assets/vendor/wow/wow.min.js"></script>
<script src="{{asset('/')}}assets/vendor/superfish/superfish.min.js"></script>
<script src="{{asset('/')}}assets/vendor/hoverIntent/hoverIntent.js"></script>


<!-- Template Main JS File -->
<script src="{{asset('/')}}assets/js/main.js"></script>

<script src="{{asset('/')}}assets/js/jquery-3.3.1.js"></script>


<!-- Template Main JS File -->
<script src="{{asset('/')}}FrontEndSourceFile/js/minicart.js"></script>


<!-- //cart-js -->
<!-- Owl-Carousel-JavaScript -->
<script src="{{asset('/')}}FrontEndSourceFile/js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            items: 3,
            lazyLoad: true,
            autoPlay: true,
            pagination: true,
        });
    });
</script>
<!-- //Owl-Carousel-JavaScript -->
<!-- start-smooth-scrolling -->
<script src="{{asset('/')}}FrontEndSourceFile/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}FrontEndSourceFile/js/move-top.js"></script>
<script type="text/javascript" src="{{asset('/')}}FrontEndSourceFile/js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
    $(document).ready(function() {

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('/')}}FrontEndSourceFile/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@yield('scriptJs')
<script>
    $(function() {
        $("#example1").dataTable();
        $("#example2").dataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWith": false,
        });
    });
</script>
<script>
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it !",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted !',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    });
</script>

@endsection