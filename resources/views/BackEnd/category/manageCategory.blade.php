@extends('BackEnd.master')
@section('title')
    Category manage
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
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Category name</th>
                    <th>Order Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($categories as $cate)
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        {{$cate->category_name}}
                    </td>
                    <td>{{$cate->order_number}}</td>
                    <td>


                                @if($cate->category_status == 1)
                                    <a class="btn btn-outline-success" href="{{route('Inactive_cate',["category_id"=>$cate->category_id])}}">
                                        <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                                    </a>
                                @else
                                    <a class="btn btn-outline-info" href="{{route('active_cate',["category_id"=>$cate->category_id])}}">
                                        <i class="fas fa-arrow-down" title="Click to Active"></i>
                                    </a>
                                @endif
                                <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{$cate->category_id}}">
                                    <i class="fas fa-edit" title="Click to change it"></i>
                                </a>
                                <a class="btn btn-outline-danger" href="{{route('cate_delete',["category_id"=>$cate->category_id])}}">
                                    <i class="fas fa-trash" title="Click to delete"></i>
                                </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}

                <div class="modal fade" id="edit{{$cate->category_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('cate_update',["category_id"=>$cate->category_id])}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Category name:</label>
                                        <input type="text" name="category_name" class="form-control" value="{{$cate->category_name}}">
                                        {{--<input type="hidden" name="category_id" class="form-control" value="{{$cate->category_id}}">--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Order number:</label>
                                        <input type="number" name="order_number" class="form-control" value="{{$cate->order_number}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="btn" class="btn btn-primary">Update</button>
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
        </div>
        <!-- /.card-body -->
    </div>
@endsection










