@extends('BackEnd.master')
@section('title')
Settings Page
@endsection

@section('content')
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
                <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-warning text-lg">
                        Add set...
                    </div>
                </div>
                <div class="bg-success card-header text-center">
                    Add Configuration
                </div>
                <div class="card-body bg-secondary">
                    <form action="/admin/setting/save" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-lg-12 row">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Header message</label>
                                    <input type="text" required class="form-control" name="Header_message" value="{{old('Header_message')}}">
                                </div>
                                <div class="form-group">
                                    <label>Map</label>
                                    <input type="text" required class="form-control" name="map" value="{{old('map')}}">
                                </div>
                                <div class="form-group">
                                    <label>Phone number : </label>
                                    <input type="text" required class="form-control" name="phone_number" value="{{old('phone_number')}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Background image:</label>
                                    <input type="file" required name="bg" class="form-control" value="{{old('bg')}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Logo image:</label>
                                    <input type="file" required name="logo" class="form-control" value="{{old('logo')}}">
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Slide1 image:</label>
                                    <input type="file" required name="imageslide1" class="form-control" value="{{old('imageslide1')}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Slide2 image:</label>
                                    <input type="file" required name="imageslide2" class="form-control" value="{{old('imageslide2')}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Slide3 image:</label>
                                    <input type="file" required name="imageslide3" class="form-control" value="{{old('imageslide3')}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Footer logo:</label>
                                    <input type="file" required name="footerlogo" class="form-control" value="{{old('footerlogo')}}">
                                </div>
                            </div>
                        </div>

                        <div class="card-body d-flex justify-content-center">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">About Us image:</label>
                                <input type="file" required name="about_us_image" class="form-control" value="{{old('about_us_image')}}">
                            </div>

                        </div>


                        <div class="card card-outline card-info" style="color: black;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Write About Us text here !
                                </h3>
                            </div>
                            <!-- /.card-header -->

                            <textarea required id="summernote" class="textarea" name="about_us">
                                                Place <em>some</em> <u>text</u> <strong>here...</strong>
                                              </textarea>
                            <!-- /.card-header -->



                        </div>

                        <div class="card card-outline card-info" style="color: black;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Write Our Menu text here !
                                </h3>
                            </div>
                            <!-- /.card-header -->

                            <textarea required id="summernote" class="textarea" name="our_menu">
                                                Place <em>some</em> <u>text</u> <strong>here...</strong>
                                              </textarea>
                            <!-- /.card-header -->

                        </div>

                        <div class="card card-outline card-info" style="color: black;">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Write Terms and conditions text here !
                                </h3>
                            </div>
                            <!-- /.card-header -->

                            <textarea required id="summernote" class="textarea" name="terms_conditions">
                                                Place <em>some</em> <u>text</u> <strong>here...</strong>
                                              </textarea>
                            <!-- /.card-header -->

                        </div>

                        <div class="d-flex justify-content-center bg-primary">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="custom-radio">
                                    <input type="radio" name="setting_status" value="1">Active
                                    <input type="radio" name="setting_status" value="0">Inactive
                                </div>
                            </div>
                        </div>


                        <button type="submit" name="btn" class="mt-2 btn btn-danger btn-block">Settings add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection