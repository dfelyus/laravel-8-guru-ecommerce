<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class Order_completeController extends Controller
{
    public function index()
    {

        $shipping = new Shipping();
        $shipping->name = Session::get('shipping_name');
        $shipping->email = Session::get('shipping_email');
        $shipping->phone_number = Session::get('shipping_phone_number');
        $shipping->address = Session::get('shipping_address');
        $shipping->save();



        $shippingID = DB::table('shippings')->where('email', '=', Session::get('shipping_email'))
            ->where('name', '=', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();

        Session::put('shipping_id', $shippingID->shipping_id);

        Session::forget('shipping_name');
        Session::forget('shipping_email');
        Session::forget('shipping_phone_number');
        Session::forget('shipping_address');

        //descrement every quantities in ours card product

        $products = Cart::content();
        foreach ($products as $prod) {

            $dish = Dishes::where('dish_name', 'like', "$prod->name")->get()->first();
            $dish->qty = $dish->qty - $prod->qty;
            $dish->save();
        }

        //save order of custommer in our db

        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->shipping_id = Session::get('shipping_id');
        $order->order_total = Cart::total();
        $order->save();

        $payment = new Payment();

        $payment->order_id = $order->order_id;
        $payment->payment_type = Session::get('stypePayment');;

        $payment->save();

        $CartDish = Cart::content();

        foreach ($CartDish as $cart) {
            $orderDetail = new OrderDetail();

            $orderDetail->order_id = $order->order_id;
            $orderDetail->dish_id = $cart->id;
            $orderDetail->dish_name = $cart->name;
            $orderDetail->dish_price = $cart->price;
            $orderDetail->dish_qty = $cart->qty;
            $orderDetail->save();
        }

        $product = $products->toArray();
        Mail::send('FrontEnd.mail.order_complete_mail', $product, function ($message) {
            $message->to(Auth::user()->email); //we send the email into the boxe of the user
            $message->subject('Order complete !!!');
        });



        Cart::destroy();
        Session::forget('shipping_id');
        Session::forget('stypePayment');
        Session::flash('success', 'payment has been successfully processes.');

        return view('FrontEnd.pages.order_complete');
    }
}
