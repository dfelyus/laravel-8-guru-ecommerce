<div class="banner">
    <!-- header -->
    <div class="header fixed-top">


        <!-- //header-one -->
        <!-- ======= Header ======= -->
        <header id="header" class="">
            <div class="container-fluid d-flex align-items-center" style="padding: 2%;background-color: #000;">

                <!-- <h1 class="logo mr-auto"><a href="index.html">Day</a></h1>
                Uncomment below if you prefer to use an image logo -->
                <a href="index.html" class=" mr-auto"><img src="{{asset('/')}}assets/img/logo.png" style="width: 70% ; height: 100%;" alt="" class="img-fluid"></a>

                <nav class="nav-menu d-none d-lg-block">
                    <ul class="">
                        @foreach($categories as $cate)
                        <li>
                            <h1><a href="{{route('category_dish',['category_id'=>$cate->category_id])}}">{{$cate->category_name}}</a></h1>
                        </li>
                        @endforeach
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li>
                            <a href="{{route('cart_show')}}" class="" style="margin-left: 20px;">
                                <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                            </a>
                        </li>
                    </ul>

                </nav><!-- .nav-menu -->

            </div>
        </header><!-- End Header -->

        <div class="w3ls-header" style="background-color: #000; opacity: 0.7;">
            <!-- header-one -->
            <div class="container">
                <div class="w3ls-header-left">
                    <p>Free home delivery at your doorstep For Above $30</p>
                </div>
                <div class="w3ls-header-right">
                    <ul>
                        <li class="head-dpdn">
                            <i class="fa fa-phone" aria-hidden="true"></i> Call us: +01 222 33345
                        </li>

                        @if(Session::get('customer_id')){{--SI ON EST DEJA CONNECTEE AVEC NOTRE COMPTE--}}
                        <li class="head-dpdn">
                            <a href="#" onclick="document.getElementById('customerLogout').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                            <form action="{{route('log_out')}}" id="customerLogout" method="POST">
                                @csrf
                            </form>
                        </li>
                        @else {{--SI ON EST PAS CONNECTEE AVEC UN COMPTE--}}
                        <li class="head-dpdn">
                            <a href="{{route('login_in')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        </li>
                        @endif

                        @if(Session::get('customer_id')) {{-- SI ON EST CONNECTEE A NOTRE COMPTE, ON AFFICHE LE NOM D'UTILISATEUR--}}
                        <li class="head-dpdn">
                            <a href="{{--{{route('sign_up')}}--}}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                {{Session::get('customer_name')}}
                            </a>
                        </li>
                        @else
                        <li class="head-dpdn">
                            <a href="{{route('login_in')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Signup</a>
                        </li>
                        @endif



                        <li class="head-dpdn">
                            <a href="offers.html"><i class="fa fa-gift" aria-hidden="true"></i> Offers</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="help.html"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>

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
                    <img src="http://localhost:8000/{{$settings->imageslide1}}" alt="screen1" width="100%" />
                    <div class="carousel-container">
                        <div class="">




                            <section id="" class="container myCenter">
                                <div id="" class="" data-ride="">
                                    <h1>Welcome to GURU</h1>
                                    <div class="row mt-5 justify-content-center aos-init aos-animate" data-aos="zoom-in" data-aos-delay="250">
                                        <div class="col-xl-2 col-md-4 col-6">
                                            <div class="icon-box">
                                                <i class="ri-store-line"></i>
                                                <h3><a href="">Lorem Ipsum</a></h3>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-6 ">
                                            <div class="icon-box">
                                                <i class="ri-bar-chart-box-line"></i>
                                                <h3><a href="">Dolor Sitema</a></h3>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-6 mt-4 mt-md-0">
                                            <div class="icon-box">
                                                <i class="ri-calendar-todo-line"></i>
                                                <h3><a href="">Sedare Perspiciatis</a></h3>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-6 mt-4 mt-xl-0">
                                            <div class="icon-box">
                                                <i class="ri-paint-brush-line"></i>
                                                <h3><a href="">Magni Dolores</a></h3>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-6 mt-4 mt-xl-0">
                                            <div class="icon-box">
                                                <i class="ri-database-2-line"></i>
                                                <h3><a href="">Nemos Enimade</a></h3>
                                            </div>
                                        </div>
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
                    <img src="{{asset('/')}}assets/img/screen/res2.jpg" alt="screen1" width="100%" />
                    <div class="carousel-container">
                        <div class="myCenter">
                            <h1>The Best Chef For You</h1>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="{{asset('/')}}assets/img/screen/res3.jpg" alt="screen1" width="100%" />
                    <div class="carousel-container">
                        <div class="myCenter">
                            <h1>Grow together</h1>
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





</div>