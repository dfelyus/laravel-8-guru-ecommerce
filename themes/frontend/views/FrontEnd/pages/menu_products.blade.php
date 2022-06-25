@section('head')

@endsection


@extends('FrontEnd.master')
@section('title')
Menu products
@endsection

@section('bg-img',asset('assets/img/bg/bg8.jpg'))

@section('content')
{{--
@section('bg-img',asset('assets/img/bg/bg8.jpg'))//par default
@section('bg-img',Storage::disk('local')->url($post->image))//nouvellement chargee
--}}
@section('heading','Menu products')

@section('sub-heading1','Learn Together and Grow Together.')
@section('sub-heading2','The Best Chef For You.')
@section('sub-heading3','Welcome.')



<!-- breadcrumb -->
<div class="container">
    <ol class="breadcrumb w3l-crumbs">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Menu</li>
    </ol>
</div>
<!-- //breadcrumb -->
<!-- menu list -->

<div class="wthree-menu" style="background-color: white;">
    <img src="images/i2.jpg" class="w3order-img" alt="" />
    <div class="container">
        <h3 class="w3ls-title">Menu</h3>
        <p class="w3lsorder-text">Here your Staple Food Varieties</p>
        <h4 class="text-center">{{Session::get('choose')}}</h4>

        <div class="menu-agileinfo">

            @foreach($cate_ as $cate)
            <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                <a href="{{route('category_dish',['id'=>$cate->id])}}"> {{$cate->category_name}}</a>
            </div>
            @endforeach

            <div class="clearfix"> </div>
        </div>
        {{--
        <div class="w3spl-menu">
            <h3 class="w3ls-title">Seasonal Menu</h3>
            <p class="w3lsorder-text">Here your Staple Food Varieties</p>
            <div class="menu-agileinfo">
                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                    <a href="products.html">Fondue Savoyarde</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                    <a href="products.html">Garbure</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                    <a href="products.html">Poulet</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                    <a href="products.html">Cherry Clafouti</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                    <a href="products.html"> Spinach Soufflé</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                    <a href="products.html">Baeckeoffe</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                    <a href="products.html">Ratatouille</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
                    <a href="products.html">Piperade</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        --}}
    </div>
</div>
<!-- //menu list -->
<!-- add-products -->
<div class="add-products">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Offers</h3>
        <div class="add-products-row">
            @php($h = 1)
            @foreach($offer_ as $offer)
            <div class="w3ls-add-grids {{$h%2==0 ? 'w3ls-add-grids-right':''}}">

                <a href="{{route('search.offers',$offer->getOffersRelationDishes->dish_name)}}">
                    <img class="card-img-top" src="{{asset(''.$offer->getOffersRelationDishes->dish_image)}}" width="10%" height="50%" alt="Card image cap">
                    <h4>{{$offer->getOffersRelationDishes->dish_name}}<span>10%<br>{{$offer->title}}</span></h4>
                    <h5>{{$offer->subtitle}}</h5>
                    <h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                </a>
            </div>

            {{$h++}}
            @endforeach

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //add-products -->
<!-- subscribe -->
<div class="subscribe agileits-w3layouts">
    <div class="container">
        <div class="col-md-6 social-icons w3-agile-icons">
            <h4>Keep in touch</h4>
            <ul>
                <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                <li><a href="#" class="fa fa-rss icon rss"> </a></li>
            </ul>
            <ul class="apps">
                <li>
                    <h4>Download Our app : </h4>
                </li>
                <li><a href="#" class="fa fa-apple"></a></li>
                <li><a href="#" class="fa fa-windows"></a></li>
                <li><a href="#" class="fa fa-android"></a></li>
            </ul>
        </div>
        <div class="col-md-6 subscribe-right">
            <h3 class="w3ls-title">Subscribe to Our <br><span>Newsletter</span></h3>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="Enter your Email..." required="">
                <input type="submit" value="Subscribe">
                <div class="clearfix"> </div>
            </form>
            <img src="images/i1.png" class="sub-w3lsimg" alt="" />
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //subscribe -->
<!-- footer -->
<div class="footer agileits-w3layouts">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
                <h3>company</h3>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="careers.html">Careers</a></li>
                    <li><a href="help.html">Partner With Us</a></li>
                </ul>
            </div>
            <div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
                <h3>help</h3>
                <ul>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="login.html">Returns</a></li>
                    <li><a href="login.html">Order Status</a></li>
                    <li><a href="offers.html">Offers</a></li>
                </ul>
            </div>
            <div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
                <h3>policy info</h3>
                <ul>
                    <li><a href="terms.html">Terms & Conditions</a></li>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                    <li><a href="login.html">Return Policy</a></li>
                </ul>
            </div>
            <div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
                <h3>Menu</h3>
                <ul>
                    <li><a href="menu.html">All Day Menu</a></li>
                    <li><a href="menu.html">Lunch</a></li>
                    <li><a href="menu.html">Dinner</a></li>
                    <li><a href="menu.html">Flavours</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="copyw3-agile">
    <div class="container">
        <p>&copy; 2017 Staple Food. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
    </div>
</div>
<!-- //footer -->
<!-- cart-js -->
<script src="js/minicart.js"></script>
<script>
    w3ls.render();

    w3ls.cart.on('w3sb_checkout', function(evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script>
<!-- //cart-js -->
<!-- start-smooth-scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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
        /*
        var defaults = {
        	containerID: 'toTop', // fading element id
        	containerHoverID: 'toTopHover', // fading element hover id
        	scrollSpeed: 1200,
        	easingType: 'linear' 
        };
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"></script>

Session::forget('choose')
@endsection





@section('foot')

@endsection