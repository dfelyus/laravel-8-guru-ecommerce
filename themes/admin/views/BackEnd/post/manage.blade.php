@extends('BackEnd.master')
@section('title')
Post manage
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
        <h3 class="card-title">Posts Manage</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Image</th>
                    <th>Added on</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($posts as $post)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->subtitle}}</td>
                    <td><img src="{{config('app.url')}}/{{$post->image}}" style="height: 70px; width: 100px; border-radius: 10%"></td>
                    <td>{{$post->updated_at}}</td>
                    <td>


                        @if($post->post_status == 1)
                        <a class="btn btn-outline-success" href="{{url('/admin/post/Inactive',$post->id)}}">
                            <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                        </a>
                        @else
                        <a class="btn btn-outline-info" href="{{url('/admin/post/active',$post->id)}}">
                            <i class="fas fa-arrow-down" title="Click to Active"></i>
                        </a>
                        @endif
                        <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#editPost{{$post->id}}">
                            <i class="fas fa-edit" title="Click to change it"></i>
                        </a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Delete Post ?');" href="{{url('/admin/post/delete',$post->id)}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}

                <div class="modal fade" id="editPost{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/admin/post/update',$post->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" required name="name" value="{{$post->name}}" class="form-control">
                                    </div>*
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Title:</label>
                                        <input type="text" required name="title" value="{{$post->title}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Subtitle:</label>
                                        <input type="text" required value="{{$post->subtitle}}" name="subtitle" class="form-control">
                                    </div>
                                    <div class="card card-outline card-info" style="color: black;">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Edit subject text here !
                                            </h3>
                                        </div>
                                        <textarea required id="summernote" class="textarea" name="subject">
                                        {{$post->subject}}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Previous image:</label>
                                        <img src="{{config('app.url')}}/{{$post->image}}" style="height: 150px; width: 150px; border-radius: 50%">
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
            {{$posts->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection