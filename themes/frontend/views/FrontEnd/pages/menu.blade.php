@section('head')



@endsection







@extends('FrontEnd.master')
@section('title')
Menu
@endsection

@section('content')
@php
$categories = $cate_->where('category_status', 1);
$dishes = $dish_->where('dish_status', 1);
@endphp
<div class="container" style="margin-top: 7%;">
    <div class="card">
        <div class="card-header" style="background-color: #9900CC; color: white;">
            <div class="d-flex justify-content-center">
                <h1><b>MENU</b></h1>
            </div>
        </div>
        <div class="card-body" style="border: 5px solid red;">
            <div class="card">
                <div class="card-header d-flex justify-content-center" style="background-color: #996633; color: white;">
                    <h2><u>PACKAGES</u></h2>
                </div>
                <div class="card-body">
                    <div class=" col-lg-12 row">

                        @foreach($packages as $pack)


                        <div class="card-body">
                            <div class="card-body bg-success">
                                <h2>{{$pack->title}}</h2>
                            </div>
                            <div style="background-color: #FFCCFF;">
                                <ul class="fa-ul" style="font-size: 15px; ">
                                    <li><span class="fa-li"></span><b>subtitle </b>: {{$pack->subtitle}}</li>
                                    <li><span class="fa-li"></span><b>min_personnes</b> : {{$pack->min_personnes}}</li>
                                    <li><span class="fa-li"></span><b>max_personnes</b> : {{$pack->max_personnes}}</li>
                                    <li><span class="fa-li"></span><b>full_price</b> : {{$pack->full_price}} $</li>
                                    <li><span class="fa-li"></span><b>nb_personnes</b> : {{$pack->nb_personnes}}</li>
                                    <li><span class="fa-li"></span><b>max_personnes</b> : {{$pack->max_personnes}}</li>

                                    @php
                                    $qty_current_Pack = $quantities->where('id_package', $pack->id);
                                    @endphp

                                    <h2><b><u>Categories</u></b></h2>

                                    @foreach($pack->categories as $packCate)
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>
                                        @foreach($qty_current_Pack as $qt_cate)
                                        @if($packCate->id == $qt_cate->category_id)
                                        {{$qt_cate->qty}}
                                        @endif
                                        @endforeach
                                        -
                                        <b>{{$packCate->category_name}}</b>
                                    </li>
                                    @endforeach

                                    <h2><b><u>Food</u></b></h2>
                                    @foreach($pack->dishes as $packDish)
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>
                                        @foreach($qty_current_Pack as $qt_dish)
                                        @if($packDish->id == $qt_dish->dish_id)
                                        {{$qt_dish->qty}}
                                        @endif
                                        @endforeach
                                        -
                                        <b>{{$packDish->dish_name}}</b>
                                    </li>
                                    @endforeach
                                    <hr />

                                </ul>
                            </div>

                        </div>


                        @endforeach

                    </div>
                </div>
                <div class="d-flex justify-content-center" style="margin-top: 70px;margin-bottom: 50px;">
                    {{$packages->links()}}
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-dark" href="{{route('download_menu','pack')}}" style="font-size: 16px;">Click Here To Download <i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-center" style="background-color: #996633; color: white;">
                    <h2><u>TRAYS TO GO</u></h2>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <table border="1" style="font-size: 20px;">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">Small</th>
                                    <th class="text-center">Medium</th>
                                    <th class="text-center">Semi-large</th>
                                    <th class="text-center">Large</th>
                                    <th class="text-center">Xtra-Large</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trays as $tray)
                                <tr>
                                    <td class="text-center"><b>{{$tray->title}}</b></td>
                                    <td class="text-center">{{$tray->small}} $</td>
                                    <td class="text-center">{{$tray->medium}} $</td>
                                    <td class="text-center">{{$tray->semi_large}} $</td>
                                    <td class="text-center">{{$tray->large}} $</td>
                                    <td class="text-center">{{$tray->extra_large}} $</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-dark" href="{{route('download_menu','tray')}}" style="font-size: 16px;">Click Here To Download <i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-center" style="background-color: #996633; color: white;">
                    <h2><u>CATEGORIES & FOOD</u></h2>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 row justify-content-center">

                        <div class="card">
                            <div class="card-header bg-primary">
                                <h2>ALL CATEGORIES</h2>
                            </div>
                            <div class="card-body" style="font-size: 18px; background-color: #99CCFF; color: black;">
                                <ul class="fa-ul">
                                    @foreach($categories as $cate)
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>{{$cate->category_name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer">
                                Categories
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-success d-flex justify-content-center">
                                <h4><u>All dishes</u></h4>
                            </div>
                            <div class="card-body" style="font-size: 18px; background-color: #FFCCFF; color: black;">
                                <ul class="fa-ul">
                                    @foreach($all_dishes as $dish)
                                    <li><span class="fa-li"><i class="fas fa-circle nav-icon"></i></span><b><u>{{$dish->dish_name}}</u></b> | <b>full_price :</b>
                                        <strike>{{$dish->full_price}} $</strike> | <b>half_price:</b> {{$dish->half_price}} $
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer">
                                Dishes
                            </div>



                        </div>


                    </div>

                </div>
                <div class="d-flex justify-content-center" style="margin-top: 10px;margin-bottom: 10px;">
                    {{$all_dishes->links()}}
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-dark" href="{{route('download_menu','cate_dish')}}" style="font-size: 16px;">Click Here To Download <i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary" href="{{route('products')}}" style="font-size: 18px;">GO TO CHOOSE FOOD <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 5%;margin-bottom: 5%;">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body" style="border: 5px solid red;">
            <div class="col-lg-12">
                <div>
                    <img class="" src="{{asset('/')}}assets/img/screen/res6.jpg" width="100%" alt="">
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>


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
                    <div class="carousel-item">
                        <img class="rounded-circle " src="{{asset('/')}}assets/img/screen/res2.jpg" width="80" height="80" alt="Third slide">
                        {!!htmlspecialchars_decode($set_->about_us)!!}
                    </div>
                    <div class="carousel-item">
                        <div class="">
                            <img class="rounded-circle " src="{{asset('/')}}assets/img/screen/res3.jpg" width="80" height="80" alt="Third slide">
                            {!!htmlspecialchars_decode($set_->about_us)!!}
                        </div>
                    </div>
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


@endsection