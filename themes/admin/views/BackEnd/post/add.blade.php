@extends('BackEnd.master')
@section('title')
Post Page
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
                    Add Post
                </div>
                <div class="card-body">
                    <form action="/admin/post/save" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" required name="name" class="form-control" value="{{old('name')}}">
                        </div>*
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" required name="title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Subtitle:</label>
                            <input type="text" required name="subtitle" class="form-control" value="{{old('subtitle')}}">
                        </div>
                        <div class="card card-outline card-info" style="color: black;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Write subject text here !
                                </h3>
                            </div>
                            <!-- /.card-header -->

                            <textarea required id="summernote" class="textarea" name="subject">
                                                Place <em>some</em> <u>text</u> <strong>here...</strong>
                                              </textarea>
                            <!-- /.card-header -->
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">image:</label>
                            <input type="file" required name="image" class="form-control" value="{{old('image')}}">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <div class="custom-radio">
                                <input type="radio" name="post_status" value="1">Active
                                <input type="radio" name="post_status" value="0">Inactive
                            </div>
                        </div>
                        <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Post add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection