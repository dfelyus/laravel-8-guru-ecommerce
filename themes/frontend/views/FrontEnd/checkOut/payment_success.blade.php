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
                    @if ($message = Session::get('success'))
                    <div class="w3-panel w3-green w3-display-container">
                        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                        <p>{!! $message !!}</p>
                    </div>
                    <?php Session::forget('success'); ?>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="w3-panel w3-red w3-display-container">
                        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                        <p>{!! $message !!}</p>
                    </div>
                    <?php Session::forget('error'); ?>
                    @endif


                    <h2 class="text-capitalize">Thanks for your payment.</h2>
                    <p>We will contact you soon...</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection