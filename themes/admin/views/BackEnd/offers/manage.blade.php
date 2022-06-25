@extends('BackEnd.master')
@section('title')
Offers manage
@endsection

@php
$dishes = $dish_->where('dish_status', 1);
@endphp

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
        <h3 class="card-title">Offers Manage</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>dish name</th>
                    <th>title</th>
                    <th>Subtitle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($offers as $offer)
                <tr>
                    <td>{{$i++}}</td>
                    <td class="card">{{$offer->getOffersRelationDishes->dish_name}}</td>
                    <td class="card">{{$offer->title}}</td>
                    <td class="card">{{$offer->subtitle}}</td>
                    <td>
                        @if($offer->offer_status == 1)
                        <a class="btn btn-outline-success" href="{{url('/admin/offers/inactive',$offer->id)}}">
                            <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                        </a>
                        @else
                        <a class="btn btn-outline-info" href="{{url('/admin/offers/active',$offer->id)}}">
                            <i class="fas fa-arrow-down" title="Click to Active"></i>
                        </a>
                        @endif
                        <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#editOffers{{$offer->id}}">
                            <i class="fas fa-edit" title="Click to change it"></i>
                        </a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Delete offers ?');" href="{{url('/admin/offers/delete',$offer->id)}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}

                <div class="modal fade" id="editOffers{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Or Update Offers</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/admin/offers/update',$offer->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Dish name</label>
                                        <select name="dish_id" class="form-control">
                                            <label>------ Select Dish -----</label>
                                            <option value="{{$offer->getOffersRelationDishes->id}}">{{$offer->getOffersRelationDishes->dish_name}}</option>
                                            @foreach($dishes as $dish)
                                            <option value="{{$dish->id}}">{{$dish->dish_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Edit title:</label>
                                        <input type="text" name="title" class="form-control" value="{{$offer->title}}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Edit subtitle:</label>
                                        <input type="text" name="subtitle" class="form-control" value="{{$offer->subtitle}}" />
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
            {{$offers->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection