@extends('FrontEnd.master')

@section('title')
shipping
@endsection


@section('content')
<!-- shipping-page -->
<div class="login-page about">
    <img class="login-w3img  w3ls-right" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Enter your shipping informations</h3>
        <p class="w3ls-title w3ls-title1 text-center">You can change yours shipping informations </p>
        <div class="login-agileinfo">
            <form action="/user/shipping/store" method="post">
                @csrf
                <label>Full name</label>
                <input class="agile-ltext" type="text" readonly name="name" placeholder="Enter your good name" value="{{ Auth::user()->name }}">
                <label>Email</label>
                <input class="agile-ltext" type="email" readonly name="email" placeholder="Your Email" value="{{ Auth::user()->email }}">
                <label>Phone Number</label>
                <div class="d-flex justify-content-center">
                    {!!$errors->first('phone_number','<br><strong class="text-danger">:message</strong>')!!}
                </div>
                <input class="agile-ltext" type="text" value="{{old('phone_number')}}" name="phone_number" placeholder="Your Phone number" value="">
                <label>Address</label>
                <div class="d-flex justify-content-center">
                    {!!$errors->first('address','<br><strong class="text-danger">:message</strong>')!!}
                </div>
                <input class="agile-ltext" type="text" value="{{old('address')}}" name="address" placeholder="Enter your address...">
                <div class="wthreelogin-text">
                    <ul>
                        <li>

                            <div class="d-flex justify-content-center">
                                {!!$errors->first('terms','<br><strong class="text-danger">:message</strong>')!!}
                            </div>

                            <div class="form-group">
                                <label class="checkbox">
                                    <div class="custom-check">
                                        <input type="checkbox" name="terms"><i></i>
                                        <span> I agree to the <u><a href="{{route('terms_and_conditions')}}">terms of service</a></u></span>
                                    </div>
                                </label>
                            </div>

                        </li>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <input type="submit" value="Sign Up">

            </form>
        </div>
    </div>
</div>
<!-- //shipping-page -->
@endsection