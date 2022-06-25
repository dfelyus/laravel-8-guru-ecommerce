@extends('BackEnd.master')
@section('title')
Contact Page
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
                    Add new Contact
                </div>
                <div class="card-body">
                    <form action="/admin/contact/save" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" required class="form-control" name="first_name" value="{{old('first_name')}}">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" required class="form-control" name="last_name" value="{{old('last_name')}}">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" required class="form-control" name="role" value="{{old('role')}}">
                        </div>
                        <div class="form-group">
                            <label>Adress</label>
                            <input type="text" class="form-control" name="adress" value="{{old('adress')}}">
                        </div>
                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" class="form-control" name="link1" value="{{old('link1')}}">
                        </div>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="link2" value="{{old('link2')}}">
                        </div>
                        <div class="form-group">
                            <label>instagram</label>
                            <input type="text" class="form-control" name="link3" value="{{old('link3')}}">
                        </div>
                        <div class="form-group">
                            <label>Linkedin</label>
                            <input type="text" class="form-control" name="link4" value="{{old('link4')}}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">contact image:</label>
                            <input type="file" required name="image" class="form-control" value="{{old('image')}}">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <div class="custom-radio">
                                <input type="radio" name="contact_status" value="1">Active
                                <input type="radio" name="contact_status" value="0">Inactive
                            </div>
                        </div>
                        <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Add contact</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection