@extends('BackEnd.master')
@section('title')
Images Page
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
                    Images
                </div>
                <div class="card-body">
                    <form action="/admin/images/save" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">image:</label>
                            <input type="file" required name="image" class="form-control" value="{{old('image')}}">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <div class="custom-radio">
                                <input type="radio" name="image_status" value="1">Active
                                <input type="radio" name="image_status" value="0">Inactive
                            </div>
                        </div>
                        <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Image add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection