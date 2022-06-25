@extends('FrontEnd.masterPayement')

@section('title')
Stripe | Payement
@endsection

@section('content')




<div class="products ">
    <div class="container ">
        <div class="col-md-9 myCenter2">
            <div class="card" style="margin-right: 50px;">
                <img class="rounded-circle" style="border-radius: 5%;" src="{{asset('/')}}assets/img/pay/st9.jpg" width="100%" height="250" alt="Card image cap">
                <h1 class="card-header">Continue with the payment...!</h1>
                <div class="card-body">
                    <hr />
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-header text-truncate" style="font-size: 28px">Your order has been placed</div>
                            <div class="card-body">
                                <strong class="text-bold" style="font-size: 20px">Your payment amount is
                                    @if(Cart::total() == null)
                                    00 $.
                                    @else
                                    {{presentPrice(Cart::total())}}.
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
                                <script src="https://js.stripe.com/v3/"></script>

                                @if(Session::get('error_message'))
                                <strong class="alert-warning" style="font-size: 28px;">{{Session::get('error_message')}}</strong>
                                @else
                                <div class="card-header text-capitalize text-truncate" style="font-size: 28px">Enter your Cart Info Carefully.</div>
                                @endif
                                <form role="form" action="/user/Stripe-payment" method="post" data-cc-on-file="false" data-stripe-publishable-key="{{env('pk_test_51Id3m9BJ8K5X1Euufm09AW0SbBVy8OA9P04uCHs0fdMwGZtSyldbILY3lr0jGywBEzzYwjvo34SpIavNWkVFBUyZ000vvIfTNj')}}" id="payment-form">

                                    @csrf

                                    <div class="form-row">
                                        <label>
                                            Your Name
                                        </label>
                                        <input type="text" name="name" placeholder="Enter your name" class="form-control">
                                        <label>
                                            Your Amount
                                        </label>
                                        <input type="text" name="grandTotal" value="{{Cart::total()}}" readonly placeholder="Enter your amount" class="form-control">

                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!--A Stripe Element will be inserted here.-->
                                        </div>
                                        <!--Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <button class="btn btn-success mb-2" style="float: right; margin-top: 10px; margin-bottom: 8px;">Submit payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Session::forget('sum')--}}

<script>
    var stripe = Stripe('pk_test_51Id3m9BJ8K5X1Euufm09AW0SbBVy8OA9P04uCHs0fdMwGZtSyldbILY3lr0jGywBEzzYwjvo34SpIavNWkVFBUyZ000vvIfTNj');

    // Create an instance of element
    var elements = stripe.elements();

    //custom styling can be passed to options when creating an element.
    //(Note that this demo uses a wider set of styles than guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue" Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontsize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    //Create an instance of the card Element.

    var card = elements.create('card', {
        style: style
    });

    //Add an instance of the card Element into the 'card-element' <div>.
    card.mount('#card-element');

    //Handle real-time validate errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.classList.add('alert', 'alert-warning');
            displayError.textContent = event.error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning');
            displayError.textContent = '';
        }
    });

    //Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                //Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                //Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        //Insert the ID into the form so it gets submitted to the server

        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        //Submit the form
        form.submit();
    }
</script>
@endsection

@section('scriptJs')

@endsection