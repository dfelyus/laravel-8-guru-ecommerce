@extends('BackEnd.master')
@section('title')
Tray Page
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
                    Tray
                </div>
                <div class="card-body">
                    <form action="/admin/tray/save" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tray Name</label>
                            <input type="text" required class="form-control" name="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label>Small Tray</label>
                            <input type="number" required min="0" class="form-control" name="small" value="{{old('small')}}">
                        </div>
                        <div class="form-group">
                            <label>Medium Tray</label>
                            <input type="number" required min="0" class="form-control" name="medium" value="{{old('medium')}}">
                        </div>
                        <div class="form-group">
                            <label>Semi_large Tray</label>
                            <input type="number" required min="0" class="form-control" name="semi_large" value="{{old('semi_large')}}">
                        </div>
                        <div class="form-group">
                            <label>Large Tray</label>
                            <input type="number" required min="0" class="form-control" name="large" value="{{old('large')}}">
                        </div>
                        <div class="form-group">
                            <label>Extra large Tray</label>
                            <input type="number" required min="0" class="form-control" name="extra_large" value="{{old('extra_large')}}">
                        </div>

                        <div class="form-group">
                            <label>Tray Status</label>
                            <div class="custom-radio">
                                <input type="radio" name="tray_status" value="1">Active
                                <input type="radio" name="tray_status" value="0">Inactive
                            </div>
                        </div>
                        <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Tray add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection