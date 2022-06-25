@extends('BackEnd.master')
@section('title')
Deluxe wedding Page
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
                    <u>Deluxe wedding</u>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/wedding_deluxe/save',$selectdb)}}" method="post">
                        @csrf
                        @if($selectdb=='cocktails')

                        <h3><u>ADD COCKTAIL HOUR</u></h3>

                        <div class="form-group">
                            <label>TITLE</label>
                            <input type="text" required class="form-control" name="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label>SUBTITLE</label>
                            <input type="text" required class="form-control" name="subtitle" value="{{old('subtitle')}}">
                        </div>
                        <div class="form-group">
                            <label>DESCRIPTION</label>
                            <input type="text" required class="form-control" name="description" value="{{old('description')}}">
                        </div>

                        @elseif($selectdb=='buffets')

                        <h3><u>ADD BUFFET DINNER</u></h3>

                        <div class="form-group">
                            <label>TITLE</label>
                            <input type="text" required class="form-control" name="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label>SUBTITLE</label>
                            <input type="text" required class="form-control" name="subtitle" value="{{old('subtitle')}}">
                        </div>

                        @elseif($selectdb=='dessert')

                        <h3><u>ADD DESSERTS</u></h3>

                        <div class="form-group">
                            <label>TITLE</label>
                            <input type="text" required class="form-control" name="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label>SUBTITLE</label>
                            <input type="text" required class="form-control" name="subtitle" value="{{old('subtitle')}}">
                        </div>

                        @elseif($selectdb=='extra')

                        <h3><u>ADD EXTRAS</u></h3>

                        <div class="form-group">
                            <label>TITLE</label>
                            <input type="text" required class="form-control" name="title" value="{{old('title')}}">
                        </div>

                        @endif

                        <button type="submit" name="btn" class="btn btn-outline-primary btn-block">add wedding</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection