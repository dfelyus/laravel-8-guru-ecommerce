@extends('BackEnd.master')
@section('title')
Package manage
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
        <h3 class="card-title">Package Manage</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>image</th>
                    <th>title</th>
                    <th>subtitle</th>
                    <th>min_personnes</th>
                    <th>max_personnes</th>
                    <th>full_price</th>
                    <th>nb_personnes</th>
                    <th>added_on</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($packages as $pack)
                <tr>
                    <td>{{$i++}}</td>
                    <td><img src="{{config('app.url')}}/{{$pack->image}}" style="height: 70px; width: 100px; border-radius: 10%"></td>
                    <td>{{$pack->title}}</td>
                    <td>{{$pack->subtitle}}</td>
                    <td>{{$pack->min_personnes}}</td>
                    <td>{{$pack->max_personnes}}</td>
                    <td>{{$pack->full_price}}</td>
                    <td>{{$pack->nb_personnes}}</td>
                    <td>{{$pack->added_on}}</td>
                    <td>


                        @if($pack->package_status == 1)
                        <a class="btn btn-outline-success" href="{{url('/admin/package/Inactive',$pack->id)}}">
                            <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                        </a>
                        @else
                        <a class="btn btn-outline-info" href="{{url('/admin/package/active',$pack->id)}}">
                            <i class="fas fa-arrow-down" title="Click to Active"></i>
                        </a>
                        @endif
                        <a class="btn btn-outline-dark" href="{{url('/admin/package/edit',$pack->id)}}">
                            <i class="fas fa-edit" title="Click to change it"></i>
                        </a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Delete package ?');" href="{{url('/admin/package/delete',$pack->id)}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}


                {{-- ====================================  modal end here   =============================================--}}
                @endforeach
                </tfoot>
        </table>
        <div class="d-flex justify-content-center" style="margin-top: 70px;margin-bottom: 50px;">
            {{$packages->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection