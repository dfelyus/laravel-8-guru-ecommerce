<div class="card">
    <div class="card-body">
        <table class="table-borderless">
            <tr>
                <td>Dear <strong>{{Auth::user()->name}}</strong></td>
            </tr>
            <tr>
                <td>Your Email Address : <strong>{{Auth::user()->email}}</strong></td>
            </tr>
            <tr>
                <td>Your purchase went well.</td>
            </tr>
            <tr>
                <td>Visit this link to shop more: <a href="{{config('app.url')}}/home">Click to more</a></td>
            </tr>
            <tr>
                <td>
                    <h3><u>Shipping ID :</u> <b>{{Session::get('shipping_id')}}</b> ==== {{Session::get('stypePayment')}}</h3>
                </td>
            </tr>
            <tr>
                <td>Guru place Command</td>
            </tr>
        </table>


        <table id="" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Products name</th>
                    <th>Quantities</th>
                    <th>Price</th>
                    <th>Total price</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach(Cart::content() as $prod)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$prod->name}}</td>
                    <td style="align-content: center;">{{$prod->qty}}</td>
                    <td style="align-content: center;">{{presentPrice($prod->price)}}</td>
                    <td style="align-content: center;">{{presentPrice($prod->price * $prod->qty)}}</td>
                </tr>
                @if($loop->last)
                <tr>

                    <td colspan="4" class="text-center">
                        <hr /><br />total :
                    </td>
                    <td>
                        <hr /><br />{{presentPrice(Cart::subtotal())}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center">
                        Tax :
                    </td>
                    <td>
                        {{presentPrice(Cart::tax())}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center">
                        <hr /><br /><b>Total Price</b>
                    </td>
                    <td>

                        <hr /><br /><b>{{presentPrice(Cart::total())}}</b>
                    </td>
                </tr>
                @endif

                @endforeach
        </table>

        <div class="d-flex justify-content-center">
            <h2><b><u>{{config('app.name')}} thanks you for your purchase !!!</u></b></h2>
        </div>
    </div>
</div>