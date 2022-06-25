@extends('FrontEnd.master')

@section('title')
Order | complete
@endsection

@section('content')

<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">
            <div class="card">
                <div class="card-body">
                    @if(Session::get('error_payment'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('sms')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif


                    <h2 class="text-capitalize">Sorry something when rong... for your order.</h2>
                    <p>We will contact you soon...</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection