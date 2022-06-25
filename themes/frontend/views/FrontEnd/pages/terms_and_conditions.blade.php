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



<div class="card" style="margin-bottom: 7%;">
    <div class="card-header>
    <div class=" container">
        <div class="card-header mt-2 bg-dark">
            <div class="d-flex justify-content-center">
                <h1><u>Terms and conditions</u></h1>
            </div>
        </div>
    </div>

    {{--style="background-image: url('{{asset('/')}}assets/img/bg/bg0.jpg'); margin-top: 70px;margin-bottom: 100px;"--}}
    <div class="login-page about" style="background-image: url('{{asset('/')}}assets/img/bg/bg0.jpg');">
        <img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
        <div class="container" style="position: absolute;top: 5%; font-size: 18px;">
            <h3 class=""><u>Contract</u></h3>
            <div class="mr-2" style="color: white;">
                {!!htmlspecialchars_decode($set_->terms_conditions)!!}
            </div>
        </div>
        <div>

        </div>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <button class="btn btn-danger" onclick="redirect()" style="font-size: 22px;top:0px">Close</button>
    </div>
</div>

<script type="text/javascript">
    function redirect() {
        window.location = "{{route('home')}}";
    }
</script>

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