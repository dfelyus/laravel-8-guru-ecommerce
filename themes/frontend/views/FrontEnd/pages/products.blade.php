@section('head')

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
@section('heading','Products show')

@section('sub-heading1','Learn Together and Grow Together.')
@section('sub-heading2','The Best Chef For You.')
@section('sub-heading3','Welcome.')






<!-- products -->
<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">

            <div class="float-right mt-2">
                <form action="{{route('search')}}" method="get" class="d-flex mr-3">
                    @csrf()
                    <div class="form-group mb-0 mr-1">
                        <input type="text" name="q" required class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>


            <div class="product-top">
                <h4>Food Collection</h4>

                <div class="clearfix"> </div>
            </div>
            <div class="products-row">

                @foreach($categoryDish as $cateDish)
                <div class="col-xs-6 col-sm-4 product-grids">
                    <div class="flip-container">
                        <div class="flipper agile-products">
                            <div class="front">
                                <img src="{{asset(''.$cateDish->dish_image)}}" class="img-responsive" alt="img">
                                <div class="agile-product-text {{($cateDish->id == $dish_id) ? 'bg-danger' : ''}}">
                                    <h5 style="white-space: nowrap; overflow: hidden; width: 200px;">{{$cateDish->dish_name}}</h5>
                                </div>
                            </div>
                            <div class="back">
                                <h4 style="white-space: nowrap;">{{$cateDish->dish_name}}</h4>
                                <p style="max-lines: 0">{{$cateDish->dish_detail}}</p>
                                <h3>
                                    <b>Price: <strike>{{$cateDish->full_price}} <sup>TK</sup></strike></b>
                                </h3>

                                @if($cateDish->half_price == null)
                                @else
                                <h6>Half :{{$cateDish->half_price}}<sup>USD</sup></h6>
                                @endif
                                <form action="{{route('add_to_cart')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="w3ls_item" value="Fish salad">
                                    <input type="hidden" name="amount" value="3.00">

                                    <a href="#" data-toggle="modal" data-target="#myModal1{{$cateDish->id}}">
                                        More <span class="w3-agile-line"> </span><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    var ss = "{{$cateDish->id}}";
                </script>



                <!-- modal -->
                <div class="modal video-modal fade" id="myModal1{{$cateDish->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <section>
                                <div class="modal-body">
                                    <div class="col-md-5 modal_body_left">
                                        <img src="{{asset(''.$cateDish->dish_image)}}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="col-md-7 modal_body_right single-top-right">
                                        <h3 class="item_name">{{$cateDish->dish_name}}</h3>
                                        <p>{{$cateDish->dish_detail}}</p>
                                        <div class="single-rating">
                                            <ul>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li class="w3act"><i class="fa fa-star-o" aria-hidden="true"></i></li>

                                            </ul>
                                        </div>
                                        <div class="single-price">
                                            <ul>
                                                <li>
                                                    Half: {{$cateDish->half_price}}
                                                </li>

                                                @if($cateDish->half_price == null)

                                                @else
                                                <li>
                                                    <h5>Price :<strike>{{$cateDish->full_price}} TK </strike></h5>
                                                </li>
                                                @endif

                                                <li>Added on : {{$cateDish->added_on}}</li>
                                            </ul>
                                        </div>

                                        <form id="formPAY" action="{{route('add_to_cart')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="dish_id" value="{{$cateDish->id}}" />
                                            <h4>Quantity</h4><input style="font-size: 18px;" type="number" id="inp{{$cateDish->id}}" class="inp{{$cateDish->id}}" value="1" min="1" name="qty" />
                                            <button type="submit" onclick="newTest()" id="btnsubmitpay{{$cateDish->id}}" class="w3ls-cart swalDefaultSuccess float-right mr-2 mt-2 mb-2">
                                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                Add to cart
                                            </button>

                                        </form>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <!-- //modal -->
                <script src="{{asset('/')}}myjs"></script>

                <script>
                    var tabQty = {};
                    $(document).ready(function() {

                        $("input.inp{{$cateDish->id}}").change(function() {
                            if ($(this).val() >= parseInt("{{$cateDish->qty}}") + 1) {

                                $('#btnsubmitpay{{$cateDish->id}}').attr("disabled", true);
                                $('#btnsubmitpay{{$cateDish->id}}').css('color', 'black');
                                alert("please select quantity under " + "{{$cateDish->qty}}").fadeIn(1000).fadeOut(1000);

                            } else {

                                var qty = document.getElementById('inp{{$cateDish->id}}');
                                tabQty['inp{{$cateDish->id}}'] = $(this).val();
                                alert(tabQty['inp{{$cateDish->id}}']);

                                $('#btnsubmitpay{{$cateDish->id}}').css('color', 'yellow');
                                $('#btnsubmitpay{{$cateDish->id}}').attr("disabled", false);
                            }
                        });

                        $("#formPAYl").submit(function(e) {

                            e.preventDefault();
                            return true;

                        });
                    });
                </script>

                @endforeach


                <div class="clearfix"> </div>
                <div class="d-flex justify-content-center" style="margin-top: 70px;">
                    {{$categoryDish->links()}}
                </div>
            </div>
        </div>




        <div class="col-md-3 rsidebar bg-white flex">





            <div class="sidebar-row ">
                <h4> CATEGORY --- {{$cate_->pluck('category_name')[Request::segment(4)-3]}}<u></u></h4>
                <ul class="">
                    @foreach($categoryDish as $cateDish)
                    <li class="" style="margin-left: 20px; font-size: 18px;">
                        <a href="{{route('search.offers',$cateDish->dish_name)}}">{{$cateDish->dish_name}}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="clearfix"> </div>
                <!-- script for tabs -->

                <!-- script for tabs -->
            </div>







            <div class="sidebar-row" style="font-size: 18px;">
                <h4>ALL CATEGORIES</h4>
                <ul class="faq">
                    @foreach($cate_ as $cate)

                    <li class="item1"><a href="#"> {{$cate->category_name}}<span class="glyphicon glyphicon-menu-down"></span></a>
                        <ul>
                            @foreach($dish_ as $dish)
                            @if( $dish->category_id == $cate->id)
                            <li class="subitem1"><a href="{{route('category_dish',['id'=>$cate->id])}}">{{ $dish->dish_name }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
                <div class="clearfix"> </div>

                <!-- script for tabs -->
                <script type="text/javascript">
                    $(function() {

                        var menu_ul = $('.faq > li > ul'),
                            menu_a = $('.faq > li > a');

                        menu_ul.hide();

                        menu_a.click(function(e) {
                            e.preventDefault();
                            if (!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true, true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true, true).slideUp('normal');
                            }
                        });

                    });
                </script>
                <!-- script for tabs -->
            </div>


        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //products -->
<div class="container">
    <div class="w3agile-deals prds-w3text">
        <h5>Vestibulum maximus quam et quam egestas imperdiet. In dignissim auctor viverra.</h5>
    </div>
</div>




@endsection


@section('foot')

@endsection