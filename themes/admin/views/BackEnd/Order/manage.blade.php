@extends('BackEnd.master')
@section('title')
Dish order
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
        <h3 class="card-title">Order Manage</h3><br />
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Customer Name</th>
                    <th>Order total</th>
                    <th>Order status</th>
                    <th>Order Date</th>
                    <th>Order type</th>
                    <th>Payment status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($orders as $order)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->order_total}}</td>
                    <td>{{$order->order_status}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->payment_type}}</td>
                    <td>{{$order->payment_status}}</td>

                    {{--
                        <td><img src="{{config('app.url')}}/{{$dish->dish_image}}" style="height: 70px; width: 100px; border-radius: 10%"></td>
                    --}}

                    <td>
                        <a class="btn btn-outline-success mt-1" href="{{url('/admin/order/detail',$order->order_id)}}">
                            <i class="fas fa-search" title="View Order Detail"></i>
                        </a>

                        <a class="btn btn-outline-info mt-1" href="{{url('/admin/order/invoice',$order->order_id)}}">
                            <i class="fas fa-search-plus" title="View Invoice"></i>
                        </a>

                        <a class="btn btn-outline-primary mt-1" href="{{url('/admin/order/invoiceDownload',$order->order_id)}}">
                            <i class="fas fa-arrow-alt-circle-down" title="Download Invoice"></i>
                        </a>


                        <a class="btn btn-outline-danger mt-1" id="delete" onclick="return confirm('Delete Order ?');" href="{{url('/admin/order/delete',$order->order_id)}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
            <tbody>

                {{-- ====================================  MODAL START HERE   =============================================--}}

                {{--<div class="modal fade" id="editDish{{$dish->dish_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Dish name:</label>
                                    <input type="text" required name="dish_name" class="form-control" value="{{$dish->dish_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" required class="form-control">
                                        <label>------Select Category-----</label>
                                        @foreach($category as $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Details:</label>
                                    <textarea class="form-control" required name="dish_detail" id="message-text" rows="3">{{$dish->dish_detail}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Add on:</label>
                                    <input type="date" required name="added_on" class="form-control" value="{{$dish->added_on}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Previous image:</label>
                                    <img src="{{config('app.url')}}/{{$dish->dish_image}}" style="height: 150px; width: 150px; border-radius: 50%">
                                    <input type="file" required name="dish_image" class="form-control" accept="image/*">
                                </div>

                                <div class="card">
                                    <div class="card-header"> Dish Attributes</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="number" required min="0" class="form-control" name="full_price" value="{{$dish->full_price}}">
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <input type="number" required min="0" class="form-control" name="half_price" value="{{$dish->half_price}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    --}}

    {{-- ====================================  modal end here   =============================================--}}
    @endforeach
    </tbody>
    </table>
    <div class="d-flex justify-content-center" style="margin-top: 70px;margin-bottom: 50px;">
        {{$orders->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>
<!-- /.card-body -->
</div>
@endsection