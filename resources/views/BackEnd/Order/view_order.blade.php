@extends('BackEnd.master')
@section('title')
    Dish details
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
    <div class="offset-2 col-md-8">
        <div class="card my-5">

            <div class="card-header">
                <h3 class="card-title">Customer Info For this Order</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>Name</th>
                        <td>{{$customer->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$customer->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{$customer->phone_number}}</td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


        <div class="card my-5">

            <div class="card-header">
                <h3 class="card-title">Order details Info For this Order</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>Order no</th>
                        <td>{{$order->order_id}}</td>
                    </tr>
                    <tr>
                        <th>Order Total</th>
                        <td>{{$order->order_total}}</td>
                    </tr>
                    <tr>
                        <th>Order status</th>
                        <td>{{$order->order_status}}</td>
                    </tr>
                </table>
            </div>
        </div>
            <!-- /.card-body -->

        <div class="card my-5">

            <div class="card-header">
                <h3 class="card-title">Shipping Info For this Order</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>Name</th>
                        <td>{{$shipping->adress}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$shipping->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{$shipping->phone_number}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$shipping->address}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card-body -->


        <div class="card my-5">

            <div class="card-header">
                <h3 class="card-title">Payment Info For this Order</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>Payment Type</th>
                        <td>{{$payment->payment_type}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$payment->payment_status}}</td>
                    </tr>
                </table>
            </div>
        </div>
            <!-- /.card-body -->


        <div class="card my-5">

            <div class="card-header">
                <h3 class="card-title">Dish details Info For this Order</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order_detail->dish_id}}</td>
                            <td>{{$order_detail->dish_name}}</td>
                            <td>{{$order_detail->dish_price}}</td>
                            <td>{{$order_detail->dish_qty}}</td>
                            <td>{{$order_detail->dish_price * $order_detail->dish_qty}}</td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


    </div>



@endsection










