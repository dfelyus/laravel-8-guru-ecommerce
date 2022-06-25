@extends('FrontEnd.master')

@section('title')
cart show item
@endsection


@section('content')

<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">
            <div class="card">
                <h3 class="card-header text-center mt-3" style="background-color: lightyellow; height: 70px;width: auto">
                    Cart Items
                </h3>
                <div class="card-body">
                    <table class="table table-hover" style="font-size: 18px;">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Remove</th>
                                <th scope="col" class="text-success">Dish name</th>
                                <th scope="col">Dish image</th>
                                <th scope="col">Dish price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php($i=1)
                            @foreach($cartsDish as $dish)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <th scope="row">
                                    <a href="{{route('remove_item',['rowId'=>$dish->rowId])}}" onclick="return confirm('Remove item ?');" type="button" class="btn btn-danger">
                                        <span aria-hidden="true"><i class="fa fa-trash"></i></span>
                                    </a>
                                </th>
                                <td>{{$dish->name}}</td>
                                <td><img src="{{config('app.url')}}/{{$dish->options->image}} " style="width: 70px;height: 40px;border-radius: 20%"></td>
                                <td>{{presentPrice($dish->price)}}</td>
                                <td>
                                    <form action="{{route('update_cart',['rowId'=>$dish->rowId])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="rowId" value="{{$dish->rowId}}">
                                        <input type="number" name="qty" value="{{$dish->qty}}" min="1" style="height: auto;width: 50px">
                                        <input type="submit" class="btn btn-success" name="btn" value="Update" style="height: 25px;width: 57px;padding:0px">
                                    </form>
                                </td>
                                <td>{{presentPrice($dish->price * $dish->qty)}}</td>


                            </tr>

                            @if($loop->last)
                            <tr>

                                <td colspan="6" class="text-center">
                                    <hr /><br />total :
                                </td>
                                <td>

                                    <hr /><br />{{presentPrice(Cart::subtotal())}}
                                </td>
                                <?php


                                ?>
                            </tr>
                            <tr>

                                <td colspan="6" class="text-center">
                                    Tax :
                                </td>
                                <td>

                                    {{presentPrice(Cart::tax())}}
                                </td>
                                <?php


                                ?>
                            </tr>
                            <tr>

                                <td colspan="6" class="text-center">
                                    <hr /><br /><b>Total Price</b>
                                </td>
                                <td>

                                    <hr /><br /><b>{{presentPrice(Cart::total())}}</b>
                                </td>
                                <?php
                                ?>
                            </tr>
                            @endif

                            @endforeach
                        </tbody>
                    </table>
                    <button id="bt" class="btn btn-danger" onclick="test()">Click me to test</button>
                    <script>
                        function test() {
                            alert(tabQty['inp14']);
                        }
                    </script>
                </div>
            </div>
        </div>



        @if(is_object(Auth::user()) && Cart::total()!=null){{--SI ON ETAIT DEJA CONNECTEE A NOTRE COMPTE  , ET ON A FAIT DES ACHAT--}}
        {{Session::put('ship','1')}}
        <div class="col-md-9 product-w3ls-right">
            <a href="{{url('/user/shipping')}}" class="btn btn-info" style="float: right; font-size: 20px;">
                <i class="fa fa-shopping-bag"></i>
                checkout
            </a>
        </div>

        @elseif(is_object(Auth::user()) && Cart::total()==null) {{--SI ON N'A PAS FAIT D'ACHATS--}}
        {{Session::put('ship','1')}}
        <div class="col-md-9 product-w3ls-right">
            <a href="{{url('/home')}}" class="btn btn-info" style="float: right; font-size: 20px;">
                <i class="fa fa-shopping-bag"></i>
                checkout
            </a>
        </div>
        @else {{--SOIT ON EST PAS ENREGISTREE SOIT ON A UN COMPTE, MAIS ON EST PAS CONNECTEE--}}
        {{Session::put('ship','0')}}
        <div class="col-md-9 product-w3ls-right">
            <a href="" data-toggle="modal" data-target="#Login_or_register" class="btn btn-info" style="float: right; font-size: 20px;">
                <i class="fa fa-shopping-bag"></i>
                checkout
            </a>
        </div>
        @endif




    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="Login_or_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>
                                Welcome...! To staple Food
                            </h3>
                            <div class="text-center" style="
                                            margin-top: 25px;
                                            height: 160px;
                                            width: 160px;
                                            border-radius: 50%;
                                            background-color: darkblue;
                                            color: ghostwhite;
                                            padding-top: 65px;
                                            font-size: 20px;
                                            ">
                                Keep your smile...
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Are you a new member...!</h4>
                            <a href="{{route('register')}}" class="btn btn-block btn-primary text-center" style="
                                        height: 60px;
                                        width: auto;
                                        padding-top: 12px;
                                        margin-top: 25px;
                                        font-size: 25px;
                                        ">
                                <span class="mt-5">Register</span>
                            </a>
                            <h3 class="mt-lg-5 text-center">Or</h3>
                            <h4>Already have an account... </h4>
                            <a href="{{route('login')}}" class="btn btn-block btn-success text-center" style="
                                                       height: 60px;
                                                       width: auto;
                                                       padding-top: 12px;
                                                       margin-top: 10px;
                                                       font-size: 25px;
                                                        ">
                                <span class="mt-5">Login</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                </div>
                <div class="modal-footer">

                </div>


                {{--
                    <div class="login-page about">
                        <div class="container">
                            <h3 class="w3ls-title w3ls-title1">Sign Up to your account</h3>
                            <div class="login-agileinfo">
                                <form action="#" method="post">
                                    <input class="agile-ltext" type="text" name="Username" placeholder="Username"
                                           required="">
                                    <input class="agile-ltext" type="email" name="email" placeholder="Your Email"
                                           required="">
                                    <input class="agile-ltext" type="email" name="phone_number"
                                           placeholder="Your Phone number" required="">
                                    <input class="agile-ltext" type="password" name="Password" placeholder="Password"
                                           required="">
                                    <input class="agile-ltext" type="password" name="Confirm password"
                                           placeholder="Confirm password" required="">

                                    <div class="wthreelogin-text">
                                        <ul>
                                            <li>
                                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
                                                    <span>I agree to the terms of services</span>
                                                </label>

                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <input type="submit" value="Sign Up">
                                </form>
                                <p>Already have an account ? <a href="Login.html">Login Now !</a></p>
                            </div>
                        </div>
                    </div>
                    --}}




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection