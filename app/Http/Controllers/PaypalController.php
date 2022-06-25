<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use Paypal\Api\Details;
use Paypal\Api\Item;


use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use PayPal\Api\PayerInfo;
use Carbon\Carbon;
use PayPal\Exception\PayPalConnectionException;


class PaypalController extends Controller
{
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret']
            )
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }


    public function handleGet()
    {
        return view('FrontEnd.checkOut.paypal');
    }
    /*
    public function handlePost1(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->input('grandTotal'),
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => $request->name
        ]);

        Session::flash('success', 'payment has been successfully processes.');

        return redirect('/user/checkout/order/complete');
    }
*/
    public function handlePost(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        /*
        $item_1 = new Item();
        $item_1->setName('Item 1')
        // item name
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        // unit price 
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
*/
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription($request->get('name'));

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('success.payment'))
            /** Specify return URL **/
            ->setCancelUrl(URL::route('cancel.payment'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        dd($payment->create($this->_api_context)); //exit;
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paypal.payment');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paypal.payment');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paypal.payment');
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::route('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');
            return Redirect::route('/');
        }
        \Session::put('error', 'Payment failed');
        return Redirect::route('/');
    }
}
