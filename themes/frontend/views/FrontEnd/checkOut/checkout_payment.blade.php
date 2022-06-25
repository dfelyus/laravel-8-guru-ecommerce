@extends('FrontEnd.master')

@section('title')
Check Out
@endsection

@section('content')

<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">
            {{--@if(Session::get('sms'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('sms')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif--}}
        <div class="card">
            <div class="card-header text-muted">
                <h3class="text-center" style="color: red;">Dear {{ Auth::user()->name }}</h3>
                    <h4 class="text-center">We've to know which payment method you want.</h4>
            </div>
            <div class="card mt-4">
                <h5 class="card-header mt-4 text-center text-muted">Please select your payment method</h5>
                <div class="card-body">
                    <div class="checkout-left">
                        <div class="address_form_agile mt-sm-5 mt-4">
                            <form action="/user/checkout/new/order" method="post">
                                @csrf
                                <table class="table" style="font-size: 20px;">
                                    <img class="card-img-top" src="{{asset('/')}}assets/img/pay/st6.jpg" width="100%" height="200" alt="Card image cap">
                                    <tr>
                                        <th>Cash On Deliver <img style="margin-left: 30%;" class="logo rounded" src="{{asset('/')}}assets/img/pay/cash1.jpg" width="150" height="50" alt="Card image cap"></th>
                                        <td><input style="width: 30px; height: 30px;" type="radio" name="payment_type" value="Cash"></td>
                                    </tr>
                                    <tr>
                                        <th>Paypal Card <img style="margin-left: 40%;" class="logo rounded" src="{{asset('/')}}assets/img/pay/pp5.jpg" width="150" height="50" alt="Card image cap"></th>
                                        <td><input style="width: 30px; height: 30px;" type="radio" class="mr-5" name="payment_type" value="Paypal"></td>
                                    </tr>
                                    <tr>
                                        <th>Stripe Card <img style="margin-left: 40%;" class="logo rounded" src="{{asset('/')}}assets/img/pay/st4.jpg" width="150" height="50" alt="Card image cap"></th>
                                        <td><input style="width: 30px; height: 30px;" type="radio" class="mr-5" name="payment_type" value="Stripe"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><input type="submit" style="font-size: 20px;" name="btn" class="btn btn-success" value="Confirm Order"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

@endsection