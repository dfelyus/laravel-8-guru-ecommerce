@extends('BackEnd.master')
@section('title')
Manage Gold Wedding
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
                    @if($selectdb=='cocktails')
                    <th>TITLE </th>
                    <th>SUBTITLE</th>
                    <th>DESCRIPTION</th>
                    @elseif($selectdb=='buffets')
                    <th>TITLE </th>
                    <th>SUBTITLE</th>
                    @elseif($selectdb=='dessert')
                    <th>TITLE </th>
                    <th>SUBTITLE</th>
                    @elseif($selectdb=='extra')
                    <th>TITLE </th>
                    @endif

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($wedding as $wed)
                <tr>
                    <td>{{$i++}}</td>

                    @if($selectdb=='cocktails')
                    <td>
                        {{$wed->title}}
                    </td>
                    <td>
                        {{$wed->subtitle}}
                    </td>
                    <td>
                        {{$wed->description}}
                    </td>
                    @elseif($selectdb=='buffets')
                    <td>
                        {{$wed->title}}
                    </td>
                    <td>
                        {{$wed->subtitle}}
                    </td>
                    @elseif($selectdb=='dessert')
                    <td>
                        {{$wed->title}}
                    </td>
                    <td>
                        {{$wed->subtitle}}
                    </td>
                    @elseif($selectdb=='extra')
                    <td>
                        {{$wed->title}}
                    </td>
                    @endif

                    <td>
                        <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{$wed->id}}">
                            <i class="fas fa-edit" title="Click to change it"></i>
                        </a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Delete Option ?');" href="{{url('/admin/wedding_deluxe/delete',[$wed->id,$selectdb])}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}

                <div class="modal fade" id="edit{{$wed->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update gold wedding</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/admin/wedding_gold/update',$selectdb)}}" method="post">
                                    @csrf

                                    @if($selectdb=='cocktails')

                                    <h3><u>ADD COCKTAIL HOUR</u></h3>

                                    <div class="form-group">
                                        <label>TITLE</label>
                                        <input type="text" required class="form-control" name="title" value="{{$wed->title}}">
                                    </div>

                                    <input hidden name="id" value="{{$wed->id}}" />

                                    <div class="form-group">
                                        <label>SUBTITLE</label>
                                        <input type="text" required class="form-control" name="subtitle" value="{{$wed->subtitle}}">
                                    </div>
                                    <div class="form-group">
                                        <label>DESCRIPTION</label>
                                        <input type="text" required class="form-control" name="description" value="{{$wed->description}}">
                                    </div>

                                    @elseif($selectdb=='buffets')

                                    <h3><u>ADD BUFFET DINNER</u></h3>

                                    <div class="form-group">
                                        <label>TITLE</label>
                                        <input type="text" required class="form-control" name="title" value="{{$wed->title}}">
                                    </div>

                                    <input hidden name="id" value="{{$wed->id}}" />

                                    <div class="form-group">
                                        <label>SUBTITLE</label>
                                        <input type="text" required class="form-control" name="subtitle" value="{{$wed->subtitle}}">
                                    </div>

                                    @elseif($selectdb=='dessert')

                                    <h3><u>ADD DESSERTS</u></h3>

                                    <div class="form-group">
                                        <label>TITLE</label>
                                        <input type="text" required class="form-control" name="title" value="{{$wed->title}}">
                                    </div>

                                    <input hidden name="id" value="{{$wed->id}}" />

                                    <div class="form-group">
                                        <label>SUBTITLE</label>
                                        <input type="text" required class="form-control" name="subtitle" value="{{$wed->subtitle}}">
                                    </div>

                                    @elseif($selectdb=='extra')

                                    <h3><u>ADD EXTRAS</u></h3>

                                    <div class="form-group">
                                        <label>TITLE</label>
                                        <input type="text" required class="form-control" name="title" value="{{$wed->title}}">
                                    </div>

                                    <input hidden name="id" value="{{$wed->id}}" />

                                    @endif

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
            {{$wedding->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection