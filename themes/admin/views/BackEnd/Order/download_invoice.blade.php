<<!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <style>
            .padding {
                padding: 2rem !important
            }

            .card {
                margin-bottom: 30px;
                border: none;
                -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
                -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
                box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
            }

            .card-header {
                background-color: #fff;
                border-bottom: 1px solid #e6e6f2
            }

            h3 {
                font-size: 20px
            }

            h5 {
                font-size: 15px;
                line-height: 26px;
                color: #3d405c;
                margin: 0px 0px 15px 0px;
                font-family: 'Circular Std Medium'
            }

            .text-dark {
                color: #3d405c !important
            }
        </style>
    </head>

    <body>
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
            <div class="card">
                <div class="card-header p-4">
                    <a class="pt-2 d-inline-block" href="{{url('/')}}" data-abc="true">Staple Food</a>
                    <div class="float-right">
                        <h3 class="mb-0">Invoice #{{$order->order_id}}</h3>
                        Date: {{$order->created_at}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h5 class="mb-3">From:</h5>
                            <h3 class="text-dark mb-1">Staple Food</h3>
                            <div>29, Singla Street</div>
                            <div>Sikeston,New Delhi 110034</div>
                            <div>Email: contact@bbbootstrap.com</div>
                            <div>Phone: +91 9897 989 989</div>
                        </div>
                        <hr />
                        <div class="col-sm-6 ">
                            <h5 class="mb-3">To:</h5>
                            <h3 class="text-dark mb-1">{{ Auth::user()->name }}</h3>
                            <div>{{$shipping->address}}</div>
                            <div>{{ Auth::user()->email }}</div>
                            <div>Phone: {{$shipping->phone_number}}</div>
                        </div>
                    </div>
                    <hr />
                    <div>
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th class="right">Price</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @php($sum = 0)

                                <tr>
                                    <td class="center">{{$i++}}</td>
                                    <td class="left strong">{{$order_detail->dish_name}}</td>
                                    <td class="right">{{$order_detail->dish_price}}</td>
                                    <td class="center">{{$order_detail->dish_qty}}</td>
                                    <td class="right">{{$total = $order_detail->dish_price * $order_detail->dish_qty}}</td>
                                </tr>
                                @php($sum = $sum + $total)
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Subtotal</strong>
                                        </td>
                                        <td class="right">TK. {{$sum}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <p class="mb-0">Staple Food, Sounth Block, New delhi, 110034</p>
                </div>
            </div>
        </div>
    </body>

    </html>