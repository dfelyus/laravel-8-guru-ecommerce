@extends('BackEnd.master')
@section('title')
Delivery Boy manage
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
        <h3 class="card-title">Delivery Boy Manage</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($boys as $boy)
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        {{$boy->delivery_boy_name}}
                    </td>
                    <td>{{$boy->delivery_boy_phone_number}}</td>
                    <td>{{$boy->added_on}}</td>
                    <td>


                        @if($boy->delivery_boy_status == 1)
                        <a class="btn btn-outline-success" href="{{url('/admin/delivery/InactiveBoy',$boy->delivery_boy_id)}}">
                            <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                        </a>
                        @else
                        <a class="btn btn-outline-info" href="{{url('/admin/delivery/activeBoy',$boy->delivery_boy_id)}}">
                            <i class="fas fa-arrow-down" title="Click to Active"></i>
                        </a>
                        @endif
                        <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#editBoy{{$boy->delivery_boy_id}}">
                            <i class="fas fa-edit" title="Click to change it"></i>
                        </a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Delete delivery boy ?');" href="{{url('/admin/delivery/delete',$boy->delivery_boy_id)}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}

                <div class="modal fade" id="editBoy{{$boy->delivery_boy_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/admin/delivery/update',$boy->delivery_boy_id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Boy name:</label>
                                        <input type="text" required name="delivery_boy_name" class="form-control" value="{{$boy->delivery_boy_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Phone number:</label>
                                        <input type="number" required name="delivery_boy_phone_number" class="form-control" value="{{$boy->delivery_boy_phone_number}}">
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
        <div class="d-flex justify-content-center" style="margin-top: 70px;margin-bottom: 50px;">
            {{$boys->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection