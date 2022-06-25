<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

use Cart;
use Illuminate\Support\Facades\Auth;
use Session;

class CheckOutController extends Controller
{

    public function payment()
    {
        return view('FrontEnd.checkOut.checkout_payment');
    }

    public function order(Request $request)
    {
        $this->validate($request, [
            'payment_type' => 'required',
        ]);
        if ($request->payment_type == 'Cash') {
            //ON SAUVERGARDE LA COMMANDE DU CLIENT

            $order = new Order();

            $order->user_id = Auth::user()->id;
            $order->shipping_id = Session::get('shipping_id');
            $order->order_total = Cart::total();
            $order->save();

            //ON SAUVERGARDE LE PAYMENT LIEE A LA COMMANDE DU CLIENT

            $payment = new Payment();

            $payment->order_id = $order->order_id;
            $payment->payment_type = $request->payment_type;
            $payment->save();

            $CartDish = Cart::content();

            //ON SAUVERGARDE DES DETAILS DE CHAQUE ARTICLE DE LA COMMANDE DU CLIENT DE FACON SEPAREE

            foreach ($CartDish as $cart) {

                $orderDetail = new OrderDetail();

                $orderDetail->order_id = $order->order_id;
                $orderDetail->dish_id = $cart->id;
                $orderDetail->dish_name = $cart->name;
                if ($cart->half_price == null) {
                    $orderDetail->dish_price = $cart->price;
                } elseif ($cart->half_price != null) {
                    $orderDetail->dish_price = $cart->half_price;
                }
                $orderDetail->dish_qty = $cart->qty;
                $orderDetail->save();
            }

            // Cart::destroy();
            Session::flash('success', 'Your order has been successfully processed');
            return redirect('/user/checkout/order/complete');
        } elseif ($request->payment_type == 'Stripe') {
            Session::put('stypePayment', 'Stripe');
            return redirect('/user/Stripe-payment');
        } elseif ($request->payment_type == 'Paypal') {
            Session::put('stypePayment', 'Paypal');
            return redirect('/user/Paypal-payment');
        } else {
            return redirect('/user/checkout/payment')->with('sms', 'Please precise your payment mode.');
        }
    }

    public function stripe()
    {
        return view('FrontEnd.checkOut.stripe');
    }

    public  function  complete()
    {
        return view('FrontEnd.checkOut.order_complete');
    }
}
