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
Banquet Facility
@endsection

@section('heading','Banquet facility')

@section('sub-heading1','Learn Together and Grow Together.')
@section('sub-heading2','The Best Chef For You.')
@section('sub-heading3','Welcome.')


@section('content')


<div class="container" style="margin-top: 5%; align-content: center;">
    <div class="card">
        <div class="card-header bg-danger">
            <div class="d-flex justify-content-center">
                <h1>WE HAVE 3 PARTY HALL</h1>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <h3>Bollywood Banquet </h3>
                ---
                <h4><b>40 to 70 peoples </b></h4>
            </div>
            <div class="row">
                <h3>Guru Banquet </h3>
                ---
                <h4><b>60 to 70 peoples</b></h4>
            </div>
            <div class="row">
                <h3>Shagun </h3>
                ---
                <h4><b>50 to 70 peoples </b></h4>
            </div>
        </div>
    </div>
</div>

{{--
<div class="container" style="margin-top: 20px;margin-bottom: 30px;">
    <div class="row">
        <div class="col-sm">
            <button type="button" class="btn btn-danger btn-lg btn-block">Filtrer tout</button>
        </div>
        <div class="col-sm">
            <button type="button" class="btn btn-danger btn-lg btn-block">Banquet de Bolli</button>
        </div>
        <div class="col-sm">
            <button type="button" class="btn btn-danger btn-lg btn-block">Banquet du Guru</button>
        </div>
        <div class="col-sm">
            <button type="button" class="btn btn-danger btn-lg btn-block">Shagun</button>
        </div>
        <div class="col-sm">
            <button type="button" class="btn btn-danger btn-lg btn-block">Nappes</button>
        </div>
        <div class="col-sm">
            <button type="button" class="btn btn-danger btn-lg btn-block">Couleur de la disponibilité des serviettes</button>
        </div>

    </div>
</div>
--}}

{{--
<div class="container" style="margin-top: 7%;">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-center">
                <button class="btn btn-danger" style="font-size: 22px;">Click Here To Download <i class="fas fa-download"></i></button>
            </div>
        </div>
    </div>
</div>
--}}




<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-bollywood">Bollywood Banquet</li>
                    <li data-filter=".filter-napkins">Napkins availability color</li>
                    <li data-filter=".filter-table">Table cloths</li>
                    <li data-filter=".filter-shagun">Shagun</li>
                    <li data-filter=".filter-guru">Guru Banquet</li>

                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">


            @foreach($gallery as $gal)

            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$gal->filter}}">
                <div class="portfolio-wrap">
                    <img src="{{$gal->image}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$gal->filter}}</h4>
                        <p>{{$gal->filter}}</p>
                        <div class="portfolio-links">
                            <a href="{{$gal->image}}" data-gall="portfolioGallery" class="venobox" title="{{$gal->filter}}"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach



        </div>
        <div class="d-flex justify-content-center" style="margin-top: 70px;margin-bottom: 50px;">
            {{$gallery->links()}}
        </div>
    </div>
</section><!-- End Portfolio Section -->

<div class="container" style="margin-bottom: 10%;">
    <div class="card">
        <div class="card-header bg-success d-flex justify-content-center">
            <h1>testimonials</h1>
        </div>
        <div class="card-body" style="color:white; background-image: url('{{asset('/')}}assets/img/bg/bg0.jpg'); ">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="rounded-circle " src="{{asset('/')}}assets/img/screen/res1.jpg" width="80" height="80" alt="Third slide">
                        {!!htmlspecialchars_decode($set_->about_us)!!}
                    </div>
                    @foreach($posts as $post)
                    <div class="carousel-item" style="font-size: 18px;">
                        <img class="rounded-circle " src="{{$post->image}}" width="80" height="80" alt="Third slide">
                        <h2>{{$post->name}}</h2>
                        <h4>{{$post->title}}</h4>
                        <h6>{{$post->subtitle}}</h6>
                        {!!htmlspecialchars_decode($post->subject)!!}
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection


@section('foot')
<script src="{{asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}assets/vendor/venobox/venobox.min.js"></script>
<script src="{{asset('/')}}assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/vendor/aos/aos.js"></script>
<script src="{{asset('/')}}assets/js/main.js"></script>


@endsection