@extends('FrontEnd.master')

@section('title')
    shipping
@endsection

@section('content')
    <!-- shipping-page -->
    <div class="login-page about">
        <img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Enter your shipping informations</h3>
            <p class="w3ls-title w3ls-title1 text-center">You can change yours shipping informations </p>
            <div class="login-agileinfo">
                {{--<form action=<?php Session::get('sum')!=null ? "route('store_shipping')" : "route('/')"; ?> method="post">--}}
                <form action="route('store_shipping')" method="post">
                    @csrf
                    <label>Full name</label>
                    <input class="agile-ltext" type="text" name="name" placeholder="Enter your good name" value="{{$customer->name}}">
                    <label>Email</label>
                    <input class="agile-ltext" type="email" name="email" placeholder="Your Email" value="{{$customer->email}}">
                    <label>Phone Number</label>
                    <input class="agile-ltext" type="text" name="phone_number" placeholder="Your Phone number" value="{{$customer->phone_number}}">
                    <label>Address</label>
                    <input class="agile-ltext" type="text" name="address" placeholder="Enter your address..." >
                    <div class="wthreelogin-text">
                        {{--<ul>
                            <li>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
                                <span> I agree to the terms of service</span>
                            </label>
                            </li>
                        </ul>--}}
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Sign Up">

                </form>
            </div>
        </div>
    </div>
    <!-- //shipping-page -->
@endsection
