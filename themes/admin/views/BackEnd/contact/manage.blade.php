@extends('BackEnd.master')
@section('title')
Dish manage
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
        <h3 class="card-title">Dish Manage</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Informations</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$i++}}</td>
                    <td class="card"><u><b>Contact Name :</b></u>{{$contact->first_name}} {{$contact->last_name}}</td>
                    <td class="card"><u><b>Role :</b></u>{{$contact->role}}</td>
                    <td class="card"><u><b>Address :</b></u>{{$contact->adress}}</td>
                    <td class="card"><u><b>Twitter link :</b></u>{{$contact->link1}}</td>
                    <td class="card"><u><b>facebook link :</b></u>{{$contact->link2}}</td>
                    <td class="card"><u><b>instagram link :</b></u>{{$contact->link3}}</td>
                    <td class="card"><u><b>linkedin link :</b></u>{{$contact->link4}}</td>
                    <td><img src="{{config('app.url')}}/{{$contact->image}}" style="height: 250px; width: 220px; border-radius: 10%"></td>
                    <td>


                        @if($contact->contact_status == 1)
                        <a class="btn btn-outline-success" href="{{url('/admin/contact/Inactive',$contact->id)}}">
                            <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                        </a>
                        @else
                        <a class="btn btn-outline-info" href="{{url('/admin/contact/active',$contact->id)}}">
                            <i class="fas fa-arrow-down" title="Click to Active"></i>
                        </a>
                        @endif
                        <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#editContact{{$contact->id}}">
                            <i class="fas fa-edit" title="Click to change it"></i>
                        </a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Delete contact ?');" href="{{url('/admin/contact/delete',$contact->id)}}">
                            <i class="fas fa-trash" title="Click to delete"></i>
                        </a>
                    </td>
                </tr>
                {{-- ====================================  MODAL START HERE   =============================================--}}

                <div class="modal fade" id="editContact{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/admin/contact/update',$contact->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name" value="{{$contact->first_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" value="{{$contact->last_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <input type="text" class="form-control" name="role" value="{{$contact->role}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Adress</label>
                                        <input type="text" class="form-control" name="adress" value="{{$contact->adress}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter link</label>
                                        <input type="text" class="form-control" name="link1" value="{{$contact->link1}}">
                                    </div>
                                    <div class="form-group">
                                        <label>facebook link</label>
                                        <input type="text" class="form-control" name="link2" value="{{$contact->link2}}">
                                    </div>
                                    <div class="form-group">
                                        <label>instagram link</label>
                                        <input type="text" class="form-control" name="link3" value="{{$contact->link3}}">
                                    </div>
                                    <div class="form-group">
                                        <label>linkedin link</label>
                                        <input type="text" class="form-control" name="link4" value="{{$contact->link4}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Previous image:</label>
                                        <img src="{{config('app.url')}}/{{$contact->image}}" style="height: 150px; width: 150px; border-radius: 50%">
                                        <input type="file" name="image" class="form-control" accept="image/*">
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
            {{$contacts->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection