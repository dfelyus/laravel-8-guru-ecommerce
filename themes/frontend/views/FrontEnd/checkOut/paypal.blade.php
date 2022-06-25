@extends('FrontEnd.masterPayement')

@section('title')
Paypal | Payement
@endsection

@section('content')

<!--
<script src="https://www.paypal.com/sdk/js?client-id=ASuA_OuF0dMMIxf6-6a_CmwV12_cjzGeYKeSRoWz_rCekorkjOnO6TqKi0rC4zXorkNXkd-U4QvrCZT5">
    // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
</script>
-->
<div class="product ">
    <div class="container ">
        <div class="col-md-9 myCenter2">
            <div class="row d-flex justify-content-center" style="align-items: center;">
                <div class="card-body ">
                    <img class="card-img-top" src="{{asset('/')}}assets/img/pay/pp3.jpg" width="100%" height="250" alt="Card image cap">
                    <h1 class="card-header">Continue with the payment...!</h1>
                    <div class="card-body ">
                        <hr />
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header text-truncate" style="font-size: 28px">Your order has been placed</div>
                                <div class="card-body">
                                    <strong class="text-bold" style="font-size: 20px">Your payment amount is
                                        @if(Cart::total() == null)
                                        00 TK.
                                        @else
                                        {{Cart::total()}} TK.
                                        @endif
                                    </strong>
                                    <br />
                                    <strong>Please make payment by entering your Credit or Debit cart.</strong>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="background-color: whitesmoke">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header text-capitalize text-truncate" style="font-size: 28px">Click to continious !</div>


                                    @if ($message = Session::get('error'))
                                    <div class="w3-panel w3-red w3-display-container">
                                        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                                        <p>{!! $message !!}</p>
                                    </div>
                                    <?php Session::forget('error'); ?>
                                    @endif

                                    <div class="link">
                                        <div id="paypal-button"></div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://www.paypal.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        //Configure environnment
        env: 'sandbox',
        client: {
            sandbox: 'ASuA_OuF0dMMIxf6-6a_CmwV12_cjzGeYKeSRoWz_rCekorkjOnO6TqKi0rC4zXorkNXkd-U4QvrCZT5',
            production: 'demo_production_client_id'
        },
        //Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'large',
            color: 'gold',
            shape: 'pill',
        },
        //Set up a payment
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: "{{Cart::total()}}",
                        currency: 'USD'
                    }
                }]
            });
        },
        // EXECUTE THE PAYMENT
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                //Show a confirmation message to the bayer
                window.alert('Thank you for your purchase!');
                window.location = "{{route('order_complete')}}";
            });
        }
    }, '#paypal-button');
</script>


@endsection