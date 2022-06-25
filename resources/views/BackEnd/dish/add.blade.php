@extends('BackEnd.master')
@section('title')
    Dish Page
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
                        Add Dish
                    </div>
                    <div class="card-body">
                        <form action="{{route('Dish_save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Dish Name</label>
                                <input type="text" class="form-control" name="dish_name">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <label>------Select Category-----</label>
                                    @foreach($category as $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Details:</label>
                                <textarea class="form-control" name="dish_detail" id="message-text" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Dish image:</label>
                                <input type="file" name="dish_image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <div class="custom-radio">
                                    <input type="radio" name="dish_status" value="1">Active
                                    <input type="radio" name="dish_status" value="0">Inactive
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" title="You can skip this"> Dish Attributes</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="tex" class="form-control" name="full_price" placeholder="enter full price">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input type="tex" class="form-control" name="half_price" placeholder="enter 2nd price">
                                            </div>
                                        </div>
                                    </div>
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

