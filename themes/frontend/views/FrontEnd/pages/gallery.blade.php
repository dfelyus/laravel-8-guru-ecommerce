@section('head')

<link href="{{asset('/')}}assets/vendor/venobox/venobox.css" rel="stylesheet">

@endsection



@extends('FrontEnd.master')
@section('title')
Gallery
@endsection

@section('bg-img',asset('assets/img/bg/bg8.jpg'))

@section('heading','Gallery')

@section('sub-heading1','Learn Together and Grow Together.')
@section('sub-heading2','The Best Chef For You.')
@section('sub-heading3','Welcome.')


@section('content')



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



<section id="gallery">
    <div class="container-fluid">
        <div class="section-header">
            <h3 class="section-title">Gallery</h3>
            <span class="section-divider"></span>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row no-gutters">

            @foreach($image as $im)
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item wow fadeInUp">
                    <a href="{{$im->image}}" data-gall="portfolioGallery" class="venobox">
                        <img src="{{$im->image}}" alt="">
                    </a>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section><!-- End Gallery Section -->



@endsection

@section('foot')

<script src="{{asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}assets/vendor/venobox/venobox.min.js"></script>
<script src="{{asset('/')}}assets/js/main.js"></script>

@endsection