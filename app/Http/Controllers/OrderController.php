<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use DB;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\OrderDetail;
use App\Models\User;
use PDF;


class OrderController extends Controller
{
    public function manageOrder()
    {

        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('payments', 'orders.order_id', '=', 'payments.order_id')
            ->select('orders.*', 'users.name', 'payments.payment_type', 'payments.payment_status')
            ->paginate(10);

        return view('BackEnd.Order.manage', compact('orders'));
    }

    public function viewOrder($order_id)
    {
        $order = Order::find($order_id);
        $user = User::find($order->user_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->order_id)->first();
        $order_detail = OrderDetail::where('order_id', $order->order_id)->first();

        return view('BackEnd.Order.view_order', compact('order', 'user', 'shipping', 'payment', 'order_detail'));
    }

    public function viewInvoice($order_id)
    {
        $order = Order::find($order_id);
        $user = User::find($order->user_id);
        $shipping = Shipping::find($order->shipping_id);

        $order_detail = OrderDetail::where('order_id', $order->order_id)->first();

        return view('BackEnd.Order.view_order_invoice', compact('order', 'user', 'shipping', 'order_detail'));
    }


    public function downloadInvoice($order_id)
    {
        $order = Order::find($order_id);
        $user = User::find($order->user_id);
        $shipping = Shipping::find($order->shipping_id);

        $order_detail = OrderDetail::where('order_id', $order->order_id)->first();

        $pdf = PDF::loadView('BackEnd.Order.download_invoice', compact('order', 'user', 'shipping', 'order_detail'));

        //return $pdf->download('OrderInvoice.pdf');
        return $pdf->stream('OrderInvoice.pdf');
    }


    public function deleteOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->delete();

        return back()->with('sms', 'Order Deleted Successfully');
    }
}
