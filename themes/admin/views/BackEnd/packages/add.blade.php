@extends('BackEnd.master')
@section('title')
Package Page
@endsection

@section('content')
@php
$categories = $cate_->where('category_status', 1);

$dishes = $dish_->where('dish_status', 1);

@endphp
<div class="container">
    <div class="">
        <div class="">
            @if(Session::get('sms'))
            <div class="alert alert-warning alert-dismissible fade-show" role="alert">
                <strong>{{Session::get('sms')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-success text-lg">
                        NEW PACK
                    </div>
                </div>
                <div class="bg-primary card-header text-center">
                    Add Package
                </div>
                <div class="card-body bg-secondary">
                    <form action="/admin/package/save" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12 row">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title :</label>
                                    {!!$errors->first('title','<br><strong class="text-danger">:message</strong>')!!}
                                    <input type="text" class="form-control" name="title" required value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label>min_personnes :</label>
                                    {!!$errors->first('min_personnes','<br><strong class="text-danger">:message</strong>')!!}
                                    <input type="number" class="form-control" min="0" name="min_personnes" required>
                                </div>
                                <div class=" form-group">
                                    <label>max_personnes :</label>
                                    {!!$errors->first('max_personnes','<br><strong class="text-danger">:message</strong>')!!}
                                    <input type="number" class="form-control" min="0" name="max_personnes" required>
                                </div>

                            </div>

                            <div class=" card-body">
                                <div class="form-group">
                                    <label>full_price :</label>
                                    {!!$errors->first('full_price','<br><strong class="text-danger">:message</strong>')!!}
                                    <input type="number" class="form-control" min="0" name="full_price" required>
                                </div>
                                <div class=" form-group">
                                    <label>nb_personnes :</label>
                                    {!!$errors->first('nb_personnes','<br><strong class="text-danger">:message</strong>')!!}
                                    <input type="number" class="form-control" min="0" name="nb_personnes" required>
                                </div>

                                <div class=" form-group">
                                    <label for="recipient-name" class="col-form-label">Package image:</label>
                                    {!!$errors->first('image','<br><strong class="text-danger">:message</strong>')!!}
                                    <input type="file" name="image" class="form-control">

                                </div>
                            </div>


                        </div>
                        <div class=" col-lg-12 row">
                            <div class="card-body">
                                <div class="">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select2 select2-hidden-accessible" name="categories[]" multiple="" data-placeholder="Select a Category" style="width: 100%;" data-select3-id="8" tabindex="-1" aria-hidden="true">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="">
                                    <div class="form-group">
                                        <label>Dish</label>
                                        <select class="select2 select2-hidden-accessible" name="dishes[]" multiple="" data-placeholder="Select a Dish" style="width: 100%;" data-select3-id="8" tabindex="-1" aria-hidden="true">
                                            @foreach($dishes as $dish)
                                            <option value="{{$dish->id}}">{{$dish->dish_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center bg-primary text-lg">
                            <div class="form-group">
                                <label class="ml-2">Status</label>
                                {!!$errors->first('package_status','<br><strong class="text-danger">:message</strong>')!!}
                                <div class="custom-radio">
                                    <input type="radio" name="package_status" value="1">Active
                                    <input type="radio" name="package_status" value="0">Inactive
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="submit" name="btn" class="btn btn-danger btn-block">add Package</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection