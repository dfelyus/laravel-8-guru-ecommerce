@extends('FrontEnd.master')

@section('title')
Sign In
@endsection

@section('tokken')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('content')
<!-- sign up-page -->
<div class="login-page about">
    <img class="login-w3img" src="http://localhost:8000/FrontEndSourceFile/images/img3.jpg" alt="">
    <div class="container">
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <a href="{{route('register')}}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        </div>
        <h3 class="w3ls-title w3ls-title1">Sign In to your account</h3>

        <div class="login-agileinfo">
            <strong class="text-center" style="color: white;"></strong>
            <!-- Center de widget -->
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

                <!-- Color de widget in whyte-->
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <div class="d-flex justify-content-around">
                        <img src="{{asset('login.png')}}" width="150px" height="150px" />
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <a class="float-right" href="{{route('register')}}">Submit</a>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('reset') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //sign up-page -->

@endsection