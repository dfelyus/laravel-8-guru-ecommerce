@extends('BackEnd.master')
@section('title')
Manage Optionals Item
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
                    @if($selectdb=='per_peop')
                    <th>TITLE </th>
                    <th>SUBTITLE</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    @elseif($selectdb=='choice_ofs')
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

                    @if($selectdb=='per_peop')
                    <td>
                        {{$wed->title}}
                    </td>
                    <td>
                        {{$wed->subtitle}}
                    </td>
                    <td>
                        {{$wed->description}}
                    </td>
                    <td>
                        {{$wed->price}}
                    </td>
                    @elseif($selectdb=='choice_ofs')
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
                                <h5 class="modal-title" id="exampleModalLabel">Update optionals items</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/admin/wedding_optional/update',$selectdb)}}" method="post">
                                    @csrf

                                    @if($selectdb=='per_peop')

                                    <h3><u>ADD PER PERSON</u></h3>

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
                                    <div class="form-group">
                                        <label>PRICE</label>
                                        <input type="number" required class="form-control" name="price" value="{{$wed->price}}">
                                    </div>

                                    @elseif($selectdb=='choice_ofs')

                                    <h3><u>Add Choice Of Standard Live Actions Station</u></h3>

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