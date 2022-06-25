@extends('BackEnd.master')
@section('title')
    Coupon Page
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                @if(Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade-show" role="alert">
                        <strong>{{Session::get('sms')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        Coupon
                    </div>
                    <div class="card-body">
                        <form action="{{route('Coupon_save')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Code name</label>
                                <input type="text" class="form-control" name="coupon_code">
                            </div>
                            <div class="form-group">
                                <label>Coupon value</label>
                                <input type="number" class="form-control" name="coupon_value">
                            </div>
                            <div class="form-group">
                                <label>cart min value</label>
                                <input type="number" class="form-control" name="cart_min_value">
                            </div>
                            <div class="form-group">
                                <label>Added On</label>
                                <input type="date" class="form-control" name="added_on">
                            </div>
                            <div class="form-group">
                                <label>Expired On</label>
                                <input type="date" class="form-control" name="expired_on">
                            </div>
                            <div class="form-group">
                                <label>Coupon status</label>
                                <div class="custom-radio">
                                    <input type="radio" name="coupon_status" value="1">Active
                                    <input type="radio" name="coupon_status" value="0">Inactive
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Coupon type</label>
                                <div class="custom-radio">
                                    <input type="radio" name="coupon_type" value="1">Percentage
                                    <input type="radio" name="coupon_type" value="0">Fixed
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Coupon add</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

