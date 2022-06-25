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
                    <th>Dish Name</th>
                    <th>Category name</th>
                    <th>Dish Details</th>
                    <th>Dish Image</th>
                    <th>Added on</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($dishes as $dish)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$dish->dish_name}}</td>
                        <td>{{$dish->category_name}}</td>
                        <td>{{$dish->dish_detail}}</td>
                        <td><img src="http://localhost:8000/{{$dish->dish_image}}" style="height: 70px; width: 100px; border-radius: 10%"></td>
                        <td>{{$dish->added_on}}</td>
                        <td>


                            @if($dish->dish_status == 1)
                                <a class="btn btn-outline-success" href="{{route('Inactive_Dish',["dish_id"=>$dish->dish_id])}}">
                                    <i class="fas fa-arrow-up" title="Click to Inactive"></i>
                                </a>
                            @else
                                <a class="btn btn-outline-info" href="{{route('active_Dish',["dish_id"=>$dish->dish_id])}}">
                                    <i class="fas fa-arrow-down" title="Click to Active"></i>
                                </a>
                            @endif
                            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#editDish{{$dish->dish_id}}">
                                <i class="fas fa-edit" title="Click to change it"></i>
                            </a>
                            <a class="btn btn-outline-danger" href="{{route('Dish_delete',["dish_id"=>$dish->dish_id])}}">
                                <i class="fas fa-trash" title="Click to delete"></i>
                            </a>
                        </td>
                    </tr>
                    {{-- ====================================  MODAL START HERE   =============================================--}}

                    <div class="modal fade" id="editDish{{$dish->dish_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('Dish_update',["dish_id"=>$dish->dish_id])}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Dish name:</label>
                                            <input type="text" name="dish_name" class="form-control" value="{{$dish->dish_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control">
                                                <label>------Select Category-----</label>
                                                @foreach($category as $cate)
                                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Details:</label>
                                            <textarea class="form-control" name="dish_detail" id="message-text" rows="3">{{$dish->dish_detail}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Add on:</label>
                                            <input type="date" name="added_on" class="form-control" value="{{$dish->added_on}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Previous image:</label>
                                            <img src="http://localhost:8000/{{$dish->dish_image}}" style="height: 150px; width: 150px; border-radius: 50%">
                                            <input type="file" name="dish_image" class="form-control" accept="image/*">
                                        </div>

                                        <div class="card">
                                            <div class="card-header" > Dish Attributes</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="tex" class="form-control" name="full_price" value="{{$dish->full_price}}">
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <input type="tex" class="form-control" name="half_price" value="{{$dish->half_price}}">
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

                {{-- ====================================  modal end here   =============================================--}}
                @endforeach
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection










