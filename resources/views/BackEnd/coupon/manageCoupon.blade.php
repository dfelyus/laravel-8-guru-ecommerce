@extends('BackEnd.master')
@section('title')
    Coupon manage
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
                    <th>Code</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Min cart</th>
                    <th>Added on</th>
                    <th>Expired on</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($coupons as $coupon)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            {{$coupon->coupon_code}}
                        </td>
                        <td>
                            @if($coupon->coupon_type == 1)
                                {{"Percentage"}}
                            @else
                                {{"Fixed"}}
                            @endif
                        </td>
                        <td>{{$coupon->coupon_value}}</td>
                        <td>{{$coupon->cart_min_value}}</td>
                        <td>{{$coupon->added_on}}</td>
                        <td>{{$coupon->expired_on}}</td>
                        <td>
                            @if($coupon->coupon_status == 1)
                                <a class="btn btn-outline-success" href="{{route('Inactive_Coupon',["coupon_id"=>$coupon->coupon_id])}}">
                                    <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                                </a>
                            @else
                                <a class="btn btn-outline-info" href="{{route('active_Coupon',["coupon_id"=>$coupon->coupon_id])}}">
                                    <i class="fas fa-arrow-down" title="Click to Active"></i>
                                </a>
                            @endif
                            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{$coupon->coupon_id}}">
                                <i class="fas fa-edit" title="Click to change it"></i>
                            </a>
                            <a class="btn btn-outline-danger" href="{{route('Coupon_delete',["coupon_id"=>$coupon->coupon_id])}}">
                                <i class="fas fa-trash" title="Click to delete"></i>
                            </a>
                        </td>
                    </tr>
                    {{-- ====================================  MODAL START HERE   =============================================--}}

                    <div class="modal fade" id="edit{{$coupon->coupon_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('Coupon_update',["coupon_id"=>$coupon->coupon_id])}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Coupon type</label>
                                            <div class="custom-radio">
                                                <input type="radio" name="coupon_type" value="1">Percentage
                                                <input type="radio" name="coupon_type" value="0">Fixed
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Coupon value:</label>
                                            <input type="number" name="coupon_value" class="form-control" value="{{$coupon->coupon_value}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">cart min value:</label>
                                            <input type="number" name="cart_min_value" class="form-control" value="{{$coupon->cart_min_value}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Expired on:</label>
                                            <input type="date" name="expired_on" class="form-control" value="{{$coupon->expired_on}}">
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










