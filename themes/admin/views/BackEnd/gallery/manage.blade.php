@extends('BackEnd.master')
@section('title')
Gallery manage
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
        <h3 class="card-title">Gallery Manage</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Image type</th>
                    <th>Image</th>
                    <th>Added on</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($gallery as $gal)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$gal->filter}}</td>
                    <td><img src="{{config('app.url')}}/{{$gal->image}}" style="height: 70px; width: 100px; border-radius: 10%"></td>
                    <td>{{$gal->updated_at}}</td>
                    <td>


                        @if($gal->gallery_status == 1)
                        <a class="btn btn-outline-success" href="{{url('/admin/gallery/Inactive',$gal->id)}}">
                            <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                        </a>
                        @else
                        <a class="btn btn-outline-info" href="{{url('/admin/gallery/active',$gal->id)}}">
                            <i class="fas fa-arrow-down" title="Click to Active"></i>
                        </a>
                        @endif
                        <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#editGallery{{$gal->id}}">
                            <i class="fas fa-edit" title="Click to change it"></i>
                        </a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Delete gallery ?');" href="{{url('/admin/gallery/delete',$gal->id)}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}

                <div class="modal fade" id="editGallery{{$gal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/admin/gallery/update',$gal->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Image Category</label>
                                        <select name="filter" required class="form-control">
                                            <label>------Select Type off image-----</label>
                                            <option value="{{$gal->filter}}">{{$gal->filter}}</option>
                                            <option value="bollywood">Bollywood Banquet</option>
                                            <option value="guru">Guru Banquet</option>
                                            <option value="shagun">Shagun</option>
                                            <option value="table">Table cloths </option>
                                            <option value="napkins">Napkins availability color</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Previous image:</label>
                                        <img src="{{config('app.url')}}/{{$gal->image}}" style="height: 150px; width: 150px; border-radius: 50%">
                                        <input type="file" required name="image" class="form-control" accept="image/*">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Update</button>
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
            {{$gallery->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection