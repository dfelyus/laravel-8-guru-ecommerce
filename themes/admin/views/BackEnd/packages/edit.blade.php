@extends('BackEnd.master')
@section('title')
Package manage
@endsection




@section('content')
{{-- for display the message--}}
@if(Session::get('sms'))
<div class="alert alert-warning alert-dismissible fade-show" role="alert">
    <strong>{{Session::get('sms')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
{{--end display the message--}}
<div class="card">
    <div class="ribbon-wrapper ribbon-xl">
        <div class="ribbon bg-warning text-lg">
            Update Pack...
        </div>
    </div>
    <div class="card-header bg-success">
        <h3 class="card-title">Edit Package</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body bg-secondary">
        <form action="{{url('/admin/package/update',$packages->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="col-lg-12 row">

                <div class="card-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Package name:</label>
                        <input type="text" name="title" class="form-control" required value="{{$packages->title}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Package subtitle:</label>
                        <input type="text" name="subtitle" class="form-control" required value="{{$packages->subtitle}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">min_personnes:</label>
                        <input type="number" name="min_personnes" min="0" class="form-control" required value="{{$packages->min_personnes}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">max_personnes:</label>
                        <input type="number" name="max_personnes" min="0" class="form-control" required value="{{$packages->max_personnes}}">
                    </div>
                    <!-- /.form-group -->
                    <!-- /.row -->
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">full_price:</label>
                        <input type="number" name="full_price" min="0" class="form-control" required value="{{$packages->full_price}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">nb_personnes:</label>
                        <input type="number" name="nb_personnes" min="0" class="form-control" required value="{{$packages->nb_personnes}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Package Image:</label>
                        <img src="{{config('app.url')}}/{{$packages->image}}" style="height: 150px; width: 150px; border-radius: 50%">
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <!-- /.form-group -->
                    <!-- /.row -->
                </div>
            </div>



            <div class="col-lg-12 row">

                <div class="card-body">
                    <div class="">
                        <div class="form-group">
                            <label>Dishes</label>
                            <select class="select2 select2-hidden-accessible" name="dishes[]" multiple="" data-placeholder="Select dishes" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                @foreach($dish_ as $dish)
                                <option value="{{$dish->id}}" @foreach($packages->dishes as $packDish)
                                    @if($packDish->id == $dish->id)
                                    selected
                                    @endif
                                    @endforeach

                                    >{{$dish->dish_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.row -->
                </div>

                <div class="card-body">
                    <div class="">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="select2 select2-hidden-accessible" name="categories[]" multiple="" data-placeholder="Select categories" style="width: 100%;" data-select3-id="8" tabindex="-1" aria-hidden="true">
                                @foreach($cate_ as $category)
                                <option value="{{$category->id}}" @foreach($packages->categories as $packCate)
                                    @if($packCate->id == $category->id)
                                    selected
                                    @endif
                                    @endforeach

                                    >{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h2><u>Choose the quantity of every items</u></h2>
            </div>

            <div class="col-lg-12 row">
                <div class="card-body bg-success">
                    <div class="">
                        <div class="form-group">
                            @foreach($packages->dishes as $packDish){{--les plats selectionnees--}}
                            @foreach($quantities as $qt){{--donnees du cote des quantités--}}
                            @if($qt->dish_id == $packDish->id ){{--si le plat selectionne correspond du cote des quantités--}}
                            {{--On insere les données correctement du coté des quantités--}}
                            <label>Choose quantities of ----<b>{{$packDish->dish_name}}</b></label>
                            <input type="number" name="qty_dish[]" multiple="" class="form-control" value="{{$qt->qty}}" placeholder="Enter quantity" />
                            <input type="number" name="id_dish[]" multiple="" hidden value="{{$qt->dish_id}}" />
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>

                <div class="card-body bg-dark">
                    <div class="">
                        <div class="form-group">
                            @foreach($packages->categories as $packCate)
                            @foreach($quantities as $qt)
                            @if($qt->category_id == $packCate->id )
                            <label>Choose quantities of ----<b>{{$packCate->category_name}}</b></label>
                            <input type="number" name="qty_category[]" multiple="" class="form-control" value="{{$qt->qty}}" placeholder="Enter quantity" />
                            <input type="number" name="id_category[]" multiple="" hidden value="{{$qt->category_id}}" />
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>

            </div>



            <div class="d-flex justify-content-center mt-2">
                <button type="submit" name="btn" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
        <div class="d-flex justify-content-center mt-2">
            <a href="{{url('admin/package/manage')}}" class="btn btn-success">Back to manage package</a>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection