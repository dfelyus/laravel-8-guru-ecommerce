@php
$currentUrl = Request::path();
@endphp
<div class="banner">
    <!-- header -->
    <div class="header fixed-top">


        <!-- //header-one -->
        <!-- ======= Header ======= -->
        <header id="header" class="">
            <div class="container-fluid d-flex align-items-center" style="padding: 2%;background-color: #000;">

                <!-- <h1 class="logo mr-auto"><a href="index.html">Day</a></h1>
                Uncomment below if you prefer to use an image logo -->
                <a href="{{route('home')}}" class=" mr-auto"><img src="{{config('app.url')}}/{{$set_->logo}}" style="width: 70% ; height: 100%;" alt="" class="img-fluid"></a>

                <nav class="navbar navbar-expand-lg mt-2" style="font-size: 20px;">
                    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{($currentUrl == 'home') ? 'bg-white' : ''}}" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{($currentUrl == 'menu') ? 'bg-white' : ''}}" href="{{route('menu')}}">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{($currentUrl == 'banquet_facility') ? 'bg-white' : ''}}" href="{{route('banquet_facility')}}" role="tab" aria-controls="pills-banquet_facility" aria-selected="false">Banquet Facility</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{($currentUrl == 'images') ? 'bg-white' : ''}}" href="{{route('images')}}" role="tab" aria-controls="pills-gallery" aria-selected="true">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{($currentUrl == 'catering') ? 'bg-white' : ''}}" href="{{route('catering')}}" role="tab" aria-controls="pills-catering" aria-selected="true">Catering</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{($currentUrl == 'contact_us') ? 'bg-white' : ''}}" href="{{route('contact_us')}}" role="tab" aria-controls="pills-about_us" aria-selected="false">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-primary {{($currentUrl == 'contact_us') ? 'bg-white' : ''}}" style="color: black;" data-toggle="modal" data-target="#buy-banquet-ticket-modal" role="tab" href="">Banquet</a>
                            </li>
                            <li>
                                <a href="{{route('cart_show')}}" class="nav-link btn-danger {{($currentUrl == 'cart/show') ? 'bg-white' : ''}}" style="margin-left: 10px;color: black;">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true" style="margin-right: 10px;"></i><span class="navbar-badge" style="background-color: blue;font-size: 15px;color: white;border-radius: 10px;"><b>{{Cart::count()?Cart::count():''}}</b></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </header><!-- End Header -->

        <div class="w3ls-header" style="background-color: #000; opacity: 0.7;">
            <!-- header-one -->
            <div class="container">
                <div class="w3ls-header-left">
                    <p>{{$set_->Header_message}}</p>
                </div>
                <div class="w3ls-header-right">
                    <ul class="row">

                        @if(is_object(Auth::user()))
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle ml-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item ml-2" style="color: black;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item ml-2" style="color: black;" href="#">
                                    {{ __('My account') }}
                                </a>
                            </div>
                        </li>
                        @else {{--SI ON EST PAS CONNECTEE AVEC UN COMPTE--}}
                        <li class="head-dpdn">
                            <a href="{{route('login')}}"><i class="fa fa-sign-in ml-2" aria-hidden="true"></i> Login</a>
                        </li>
                        @endif

                        <li class="head-dpdn">
                            <a href="{{route('all_products')}}"><i class="" aria-hidden="true"></i>Food menu</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="{{route('menu_kit_pages')}}"><i class="" aria-hidden="true"></i>Menu kit pages</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="{{route('visiting_hours')}}"><i class="icofont-clock-time icofont-rotate-180" aria-hidden="true"></i> Visiting Hours</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="{{route('terms_and_conditions')}}"><i class="" aria-hidden="true"></i> Terms and conditions</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="{{route('disclaimer')}}"><i class="fa fa-gift" aria-hidden="true"></i> Disclaimer</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="{{route('online_booking')}}"><i class="fa fa-question-circle" aria-hidden="true"></i>Online booking</a>
                        </li>
                        <li class="head-dpdn">
                            <i class="fa fa-phone" aria-hidden="true"> {{$set_->phone_number}}</i>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>

        <a class="btn btn-danger fixed w3ls-header-right" href="{{route('products')}}" style="font-size: 22px; position: relative; width: 20%;top:80px;right: 40px;" class="nav-link">
            See MENU & Order
        </a>

        <script type="text/javascript">
            function redirect() {
                window.location = "{{route('order_complete')}}";
            }
        </script>
        <!-- navigation -->
        <!-- //navigation -->
    </div>
    <!-- //header-end -->


    <section id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade myContainer" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="{{config('app.url')}}/{{$set_->imageslide1}}" alt="screen1" width="100%" height="700" />
                    <div class="carousel-container">
                        <div class="">




                            <section id="" class="container myCenter">
                                <div id="" class="" data-ride="">
                                    <h1>@yield('heading')</h1>
                                    <h2>@yield('sub-heading1')</h2>
                                    <div class="row mt-5 justify-content-center aos-init aos-animate" data-aos="zoom-in" data-aos-delay="250">

                                        @foreach($offer_ as $offer)
                                        <a href="{{route('search.offers',$offer->getOffersRelationDishes->dish_name)}}">
                                            <div class="col-xl-2 col-md-4 col-6">
                                                <div class="icon-box">
                                                    <img class="card-img-top" src="{{asset(''.$offer->getOffersRelationDishes->dish_image)}}" width="10%" height="50%" alt="Card image cap">
                                                    <h3><a href="{{route('search.offers',$offer->getOffersRelationDishes->dish_name)}}">{{$offer->title}}</a></h3>
                                                    <div class="card" style="background-color: black;opacity: 0.4;">
                                                        <h4 style="color: white;">{{$offer->subtitle}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach


                                    </div>

                                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>

                                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>

                                </div>
                            </section><!-- End Hero -->




                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="{{config('app.url')}}/{{$set_->imageslide2}}" alt="screen1" width="100%" height="700" />
                    <div class="carousel-container">
                        <div class="myCenter">
                            <h1>@yield('heading')</h1>
                            <h2>@yield('sub-heading2')</h2>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="{{config('app.url')}}/{{$set_->imageslide3}}" alt="screen1" width="100%" height="700" />
                    <div class="carousel-container">
                        <div class="myCenter">
                            <h1>@yield('heading')</h1>
                            <h2>@yield('sub-heading3')</h2>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </section><!-- End Hero -->



    <!-- Modal Order Form -->
    <div id="buy-banquet-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #FF6600;">
                    <h4 class="modal-title d-flex" style="font-size: 25px;">BOOK A BANQUET</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="form-group">
                            <input style="font-size: 20px;" type="text" required class="form-control" name="name" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" style="font-size: 20px;" required class="form-control" name="email" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <input style="font-size: 20px;" type="text" required class="form-control" name="phone_number" placeholder="Enter Your Number">
                        </div>
                        <div class="form-group">
                            <input type="date" style="font-size: 20px;" required class="form-control" name="date" placeholder="date">
                        </div>
                        <div class="form-group">
                            <input style="font-size: 20px;" type="text" required class="form-control" name="guest" placeholder="Enter Guest">
                        </div>
                        <div class="form-group">
                            <label style="font-size: 18px;">Message</label>
                            <textarea style="font-size: 20px;" required class="form-control" name="message" placeholder="Tape You message">Tape You message...
                            </textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" style="font-size: 18px;" class="btn btn-danger">Send Inquiry</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>