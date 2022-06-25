@extends('BackEnd.master')
@section('title')
Offers Page
@endsection
@php
$dishes = $dish_->where('dish_status', 1);
@endphp

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
                    Add Offers
                </div>
                <div class="card-body">
                    <form action="/admin/offers/save" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Dish name</label>
                            <select name="dish_id" class="form-control">
                                <label>------Select Dish-----</label>
                                @foreach($dishes as $dish)
                                <option value="{{$dish->id}}">{{$dish->dish_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Add a title:</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Add a subtitle:</label>
                            <input type="text" name="subtitle" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>Offers Status</label>
                            <div class="custom-radio">
                                <input type="radio" name="offer_status" value="1">Active
                                <input type="radio" name="offer_status" value="0">Inactive
                            </div>
                        </div>

                        <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Dish add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection