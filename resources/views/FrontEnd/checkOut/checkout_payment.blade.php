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
                    <h3class="text-center" style="color: red;">Dear {{Session::get('customer_name')}}</h3><h4 class="text-center">We've to know which payment method you want.</h4>
                </div>
                <div class="card mt-4">
                    <h5 class="card-header mt-4 text-center text-muted">Please select your payment method</h5>
                    <div class="card-body">
                        <div class="checkout-left">
                            <div class="address_form_agile mt-sm-5 mt-4">
                                <form action="{{route('new_order')}}" method="post">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <th>Cash On Deliver</th>
                                            <td><input type="radio" name="payment_type" value="Cash"></td>
                                        </tr>
                                        <tr>
                                            <th>Stripe Card</th>
                                            <td><input type="radio" class="mr-5" name="payment_type" value="Stripe"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><input type="submit" name="btn" class="btn btn-success" value="Confirm Order"></td>
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
