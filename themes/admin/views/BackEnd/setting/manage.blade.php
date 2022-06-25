@extends('BackEnd.master')
@section('title')
Settings manage
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

    <div class="card-header">
        <h3 class="card-title">Settings Manage</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>title</th>
                    <th>Phone</th>
                    <th>background</th>
                    <th>Logo</th>
                    <th>image slide1</th>
                    <th>image slide2</th>
                    <th>image slide3</th>
                    <th>image footer</th>
                    <th>AboutUsImage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($setting as $set)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$set->Header_message}}</td>
                    <td>{{$set->phone_number}}</td>
                    <td><img src="{{config('app.url')}}/{{$set->bg}}" style="height: 50px; width: 70px; border-radius: 10%"></td>
                    <td><img src="{{config('app.url')}}/{{$set->logo}}" style="height: 50px; width: 70px; border-radius: 10%"></td>
                    <td><img src="{{config('app.url')}}/{{$set->imageslide1}}" style="height: 50px; width: 70px; border-radius: 10%"></td>
                    <td><img src="{{config('app.url')}}/{{$set->imageslide2}}" style="height: 50px; width: 70px; border-radius: 10%"></td>
                    <td><img src="{{config('app.url')}}/{{$set->imageslide3}}" style="height: 50px; width: 70px; border-radius: 10%"></td>
                    <td><img src="{{config('app.url')}}/{{$set->footerlogo}}" style="height: 50px; width: 70px; border-radius: 10%"></td>
                    <td><img src="{{config('app.url')}}/{{$set->about_us_image}}" style="height: 50px; width: 70px; border-radius: 10%"></td>
                    <td>


                        @if($set->setting_status == 1)
                        <a class="btn btn-outline-success" href="{{url('/admin/setting/Inactive',$set->id)}}">
                            <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                        </a>
                        @else
                        <a class="btn btn-outline-info" href="{{url('/admin/setting/active',$set->id)}}">
                            <i class="fas fa-arrow-down" title="Click to Active"></i>
                        </a>
                        @endif
                        <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#editSetting{{$set->id}}">
                            <i class="fas fa-edit" title="Click to change it"></i>
                        </a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Delete Setting ?');" href="{{url('/admin/setting/delete',$set->id)}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}

                <div class="modal fade" id="editSetting{{$set->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body bg-secondary">
                                <form action="{{url('/admin/setting/update',$set->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-lg-12 row">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Header message:</label>
                                                <input type="text" name="Header_message" class="form-control" value="{{$set->Header_message}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Map:</label>
                                                <input type="text" name="map" class="form-control" value="{{$set->map}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Phone number:</label>
                                                <input type="text" name="phone_number" class="form-control" value="{{$set->phone_number}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Background image:</label>
                                                <img src="{{config('app.url')}}/{{$set->bg}}" style="height: 150px; width: 150px; border-radius: 50%">
                                                <input type="file" name="bg" class="form-control" accept="image/*">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Logo image:</label>
                                                <img src="{{config('app.url')}}/{{$set->logo}}" style="height: 150px; width: 150px; border-radius: 50%">
                                                <input type="file" name="logo" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Slide1 image:</label>
                                                <img src="{{config('app.url')}}/{{$set->imageslide1}}" style="height: 150px; width: 150px; border-radius: 50%">
                                                <input type="file" name="imageslide1" class="form-control" accept="image/*">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Slide2 image:</label>
                                                <img src="{{config('app.url')}}/{{$set->imageslide2}}" style="height: 150px; width: 150px; border-radius: 50%">
                                                <input type="file" name="imageslide2" class="form-control" accept="image/*">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Slide2 image:</label>
                                                <img src="{{config('app.url')}}/{{$set->imageslide3}}" style="height: 150px; width: 150px; border-radius: 50%">
                                                <input type="file" name="imageslide3" class="form-control" accept="image/*">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Footer logo:</label>
                                                <img src="{{config('app.url')}}/{{$set->footerlogo}}" style="height: 150px; width: 150px; border-radius: 50%">
                                                <input type="file" name="footerlogo" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" ">
                                        <div class=" form-group">
                                        <label for="recipient-name" class="col-form-label">About Us image:</label>
                                        <img src="{{config('app.url')}}/{{$set->about_us_image}}" style="height: 150px; width: 150px; border-radius: 50%">
                                        <input type="file" name="about_us_image" class="form-control" accept="image/*">
                                    </div>

                            </div>

                            <div class="card card-outline card-info" style="color: black;">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Edit About Us text here !
                                    </h3>
                                </div>
                                <!-- /.card-header -->

                                <textarea id="summernote" class="textarea" name="about_us">
                                {{$set->about_us}}
                                </textarea>
                                <!-- /.card-header -->



                            </div>

                            <div class="card card-outline card-info" style="color: black;">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Edit Our Menu text here !
                                    </h3>
                                </div>
                                <!-- /.card-header -->

                                <textarea id="summernote" class="textarea" name="our_menu">
                                {{$set->our_menu}}
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

                                <textarea id="summernote" class="textarea" name="terms_conditions">
                                {{$set->terms_conditions}}
                                </textarea>
                                <!-- /.card-header -->
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="btn" class="btn btn-primary btn-block">Update</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>

    </div>

    {{-- ====================================  modal end here   =============================================--}}
    @endforeach
    </tfoot>
    </table>
    <div class="d-flex justify-content-center" style="margin-top: 70px;margin-bottom: 50px;">
        {{$setting->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>
<!-- /.card-body -->
</div>
@endsection