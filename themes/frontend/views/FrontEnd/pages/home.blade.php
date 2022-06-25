@section('head')

<link href="{{asset('/')}}assets/vendor/venobox/venobox.css" rel="stylesheet">

@endsection




@extends('FrontEnd.master')
@section('title')
Home
@endsection

@section('bg-img',asset('assets/img/bg/bg8.jpg'))

@section('content')
{{--
@section('bg-img',asset('assets/img/bg/bg8.jpg'))//par default
@section('bg-img',Storage::disk('local')->url($post->image))//nouvellement chargee
--}}
@section('heading','Home')

@section('sub-heading1','Learn Together and Grow Together.')
@section('sub-heading2','The Best Chef For You.')
@section('sub-heading3','Welcome.'))



<div class="add-products">
    <div class="container">
        <div class="add-products-row">

            <div class="card-header bg-dark">
                <div class="d-flex justify-content-center">
                    <h1><u>Our Story</u></h1>
                </div>
            </div>
            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("{{config('app.url')}}/{{$set_->about_us_image}}");'>
                            <a href="" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                        </div>

                        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

                            <div class="content ml-2" style="font-size: 18px;">
                                {!!htmlspecialchars_decode($set_->about_us)!!}
                            </div>

                        </div>

                    </div>

                </div>
            </section><!-- End About Section -->

            <div class="card-header bg-dark">
                <div class="d-flex justify-content-center">
                    <h1><u>Our Services</u></h1>
                </div>
            </div>

            <!-- ======= Services Section ======= -->
            <section class="services" style="background-image: url('{{asset('/')}}assets/img/bg/bg0.jpg'); margin-top: 70px;margin-bottom: 100px;">
                <div class="container">

                    <div class="row" style="margin-top: 100px;">
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
                    <div class="d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
                        <button class="btn btn-danger" style="font-size: 22px;">Click Here for Packages</button>
                    </div>
                </div>
            </section><!-- End Services Section -->
            <div class="card-header mt-2 bg-dark">
                <div class="d-flex justify-content-center">
                    <h1><u>How To Order Online Food ?</u></h1>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- order -->
<div class="wthree-order">
    <img src="images/i2.jpg" class="w3order-img" alt="" />
    <div class="container">

        <h3 class="w3ls-title" style="color: white;">Just Follow The Next Steps .</h3>
        <p class="w3lsorder-text">Get your favourite food in 4 simple steps.</p>
        <div class="order-agileinfo">
            <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                <div class="order-w3text">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h5 style="color: white;">Go to Menu</h5>
                    <span>1</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                <div class="order-w3text">
                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                    <h5 style="color: white;">Choose Food</h5>
                    <span>2</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                <div class="order-w3text">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <h5 style="color: white;">Pay Money</h5>
                    <span>3</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                <div class="order-w3text">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <h5 style="color: white;">Enjoy Food</h5>
                    <span>4</span>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>






<div class="card" style="margin-bottom: 7%;">
    <div class="card-header>
    <div class=" container">
        <div class="card-header mt-2 bg-dark">
            <div class="d-flex justify-content-center">
                <h1><u>OUR MENU</u></h1>
            </div>
        </div>
    </div>

    {{--style="background-image: url('{{asset('/')}}assets/img/bg/bg0.jpg'); margin-top: 70px;margin-bottom: 100px;"--}}
    <div class="login-page about" style="background-image: url('{{asset('/')}}assets/img/bg/bg0.jpg');">
        <img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
        <div class="container" style="position: absolute;top: 5%; font-size: 18px;">
            <h3 class=""><u>Menu</u></h3>
            <div class="mr-2" style="color: white;">
                {!!htmlspecialchars_decode($set_->our_menu)!!}
            </div>
        </div>
        <div>

        </div>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <button class="btn btn-danger" style="font-size: 22px;top:0px">Check Our Full Menu</button>
    </div>
</div>


<div class="card-header bg-dark">
    <div class="d-flex justify-content-center">
        <h1><u>Event Venue</u></h1>
    </div>
</div>

<!-- ======= Venue Section ======= -->
<section id="venue">

    <div class="container-fluid" data-aos="fade-up">

        <div class="row no-gutters">
            <div class="col-lg-6 venue-map">
                <iframe src="{{asset('/')}}assets/img/screen/res3.jpg" frameborder="0" style="border:0" allowfullscreen></iframe>
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

    <div class="container-fluid venue-gallery-container mt-2" data-aos="fade-up" data-aos-delay="100">
        <div class="row no-gutters">

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="{{asset('/')}}assets/img/screen/res2.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res2.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="{{asset('/')}}assets/img/screen/res3.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res3.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="{{asset('/')}}assets/img/screen/res4.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res4.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="{{asset('/')}}assets/img/screen/res5.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res5.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="{{asset('/')}}assets/img/screen/res6.jpg" class="venobox" data-gall="venue-gallery">
                        <img src="{{asset('/')}}assets/img/screen/res6.jpg" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="venue-gallery">
                    <a href="{{asset('/')}}assets/img/screen/res7.jpg" class="venobox" data-gall="venue-gallery">
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

<script src="{{asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}assets/vendor/venobox/venobox.min.js"></script>
<script src="{{asset('/')}}assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/vendor/aos/aos.js"></script>
<script src="{{asset('/')}}assets/js/main.js"></script>

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
@endsection